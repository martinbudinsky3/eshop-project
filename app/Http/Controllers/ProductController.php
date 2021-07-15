<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDesign;
use App\Models\ProductCategory;
use App\Traits\ProductsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Services\ImageService;
use App\Http\Requests\ProductPostRequest;
use App\Http\Requests\ProductPutRequest;


class ProductController extends Controller
{
    use ProductsTrait;

    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        // random products
        $recommendedProducts = Product::inRandomOrder()->take(12)->get();

        $searchTerm = request()->get('search');

        // filtering based on search term
        $filteredProducts = Product::all()->filter(function ($product) use ($searchTerm) {
            if (Str::is('*' . $this->transformString($searchTerm) . '*', $this->transformString($product->name))) {
                return $product;
            };
        });

        // get unique attributes for filtered products
        $colors = $this->getUniqueColors($filteredProducts);
        $brands = $this->getUniqueBrands($filteredProducts);
        $sizes = $this->getUniqueSizes($filteredProducts);

        // get filtered products ids
        $filteredProductsIds = $filteredProducts->map(function ($product) {
            return $product->id;
        });

        // query filtered products
        $products = Product::whereIn('id', $filteredProductsIds);
        $products = $this->filterProducts($products);
        $products = $this->sortProducts($products);
        $products = $products->paginate(12)->appends(request()->query());

        return view('templates.product-category')
            ->with('title', 'Vyhľadávanie')
            ->with('products', $products)
            ->with('recommendedProducts', $recommendedProducts)
            ->with('colors', $colors)
            ->with('brands', $brands)
            ->with('sizes', $sizes)
            ->with('search', true);
    }

    public function indexDesigns(Product $product) {
        $product->load('productDesigns.color');

        return response()->json(['productDesigns' => $product->productDesigns], 200);
    }

    public function list($page) {

        // get rowsPerPage from query parameters (after ?), if not set => 5
        $rowsPerPage = request('rowsPerPage', 5);

        // get sortBy from query parameters (after ?), if not set => name
        $sortBy = request('sortBy', 'name');

        // get descending from query parameters (after ?), if not set => false
        $descendingBool = request('descending', 'false');
        // convert descending true|false -> desc|asc
        $descending = $descendingBool === 'true' ? 'desc' : 'asc';

        $filter = request('filter', '');

        // filtering based on search term
        $filteredProducts = Product::orderBy($sortBy, $descending)->get()->filter(function ($product) use ($filter) {
            if (Str::is('*' . $this->transformString($filter) . '*', $this->transformString($product->name))) {
                return $product;
            };
        });

        if ($rowsPerPage > 0) {
            $offset = ($page - 1) * $rowsPerPage;
            $products = $filteredProducts->slice($offset, $rowsPerPage)->values();

        } else {
            $products = $filteredProducts;
        }

        $rowsNumber = count($filteredProducts);

        return response()->json(['rows' => $products, 'rowsNumber' => $rowsNumber]);
    }

    public function store(ProductPostRequest $request)
    {
        DB::transaction(function() use ($request, &$product) {
            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'brand_id' =>  $request->brand,
                'material' => $request->material
            ]);

            ProductCategory::create([
                'product_id' => $product->id,
                'category_id' => $request->category
            ]);

            $this->imageService->store($request->file('images'), $product->id);
        });

        return response()->json(['id' => $product->id, 'success' => 'Produkt bol úspešne vytvorený']);
    }

    public function show($id)
    {
        $product = Product::find($id);

        // random products from same category
        $similarProducts = Product::whereHas('categories', function ($query) use ($product) {
            $query->where('categories.id', '=', $product->categories->first()->id);
        })->where('id', '!=', $id)->take(12)->get();

        if(sizeof($similarProducts) < 12) {
            $similarProducts = Product::where('id', '!=', $id)->inRandomOrder()->take(12)->get();
        }

        // get all unique colors for given product
        $colors = $this->getUniqueColors($product);

        // get selected color
        $selectedColor = request()->get('color');
        if (!$selectedColor) {
            $selectedColor = $colors[0]->id;
        }

        // get only product designs of selected color
        $productDesignsOfColor = ProductDesign::where('product_id', '=', $id)->where('color_id', '=', $selectedColor);

        // get all unique sizes of selected color product design
        $sizes = $productDesignsOfColor->distinct()->get(['size']);

        // get product images
        $images = [];
        foreach ($product->images as $image) {
            array_push($images, $image->path);
        }

        return view('templates.product-detail')
            ->with('product', $product)
            ->with('similarProducts', $similarProducts)
            ->with('images', $images)
            ->with('colors', $colors)
            ->with('sizes', $sizes);
    }

    public function edit($id)
    {

        $product = Product::with('categories.parentCategories', 'productDesigns.color', 'brand')->find($id);

        $images = $this->imageService->getProductImages($product->id);

        return response()->json(array(
            'product' => $product,
            'images' => $images,
        ));
    }

    public function update(ProductPutRequest $request, $id)
    {
        // TODO duck type product
        DB::transaction(function() use($request, $id) {

            // update product
            $product = Product::find($id);

            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->brand_id = $request->brand;
            $product->material = $request->material;

            $product->save();

            // update product category
            $oldProductCategory = ProductCategory::where('product_id', $id)->first();
            $oldProductCategory->category_id = $request->category;

            $oldProductCategory->save();

            // store new images
            if($request->has('images')) {
                $this->imageService->store($request->images, $id);
            }

            // delete images
            if(!is_null($request->deleted_images)) {
                $this->imageService->deleteImages($request->deleted_images);
            }

        });

        return response()->json(['success' => 'Produkt bol úspešne editovaný']);
    }

    public function destroy($id)
    {
        $imagesToDelete = Image::where('product_id', $id)->get();
        $product = Product::find($id);

        DB::transaction(function() use($product, $imagesToDelete) {
            $product->delete();
            $this->imageService->deleteImages($imagesToDelete);
        });

        return response()->json([
            'status' => 'success',
            'msg' => 'Product deleted successfully'
        ]);
    }

    private function transformString($str)
    {
        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $str = preg_replace('/[^a-zA-Z0-9]/', '', $str);
        $str = strtolower($str);

        return $str;
    }
}
