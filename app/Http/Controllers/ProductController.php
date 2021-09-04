<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDesign;
use App\Models\ProductCategory;
use App\Traits\ProductsTrait;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Image;
use App\Services\ImageService;
use App\Http\Requests\ProductPostRequest;
use App\Http\Requests\ProductPutRequest;
use MeiliSearch\Endpoints\Indexes;
use MeiliSearch\MeiliSearch;


class ProductController extends Controller
{
    use ProductsTrait;

    private $imageService;
    private $client;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
        $this->client = app(\MeiliSearch\Client::class);
    }

    public function index()
    {
        $searchTerm = request()->get('search');

        // filtering based on search term
        $filteredProducts = $this->searchProducts($searchTerm);

        // filter out products without product designs
        $filteredProducts = $filteredProducts->filter(function ($product, $key) {
            return $product->productDesigns->count() > 0;
        });

        if($filteredProducts->count() < 1) {
            return view('templates.product-category')
                ->with('title', 'Vyhľadávanie')
                ->with('products', $filteredProducts)
                ->with('search', true);
        }

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

        // random products
        $recommendedProducts = Product::has('productDesigns')
            ->inRandomOrder()
            ->take(12)
            ->get();

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

    public function list($page)
    {
        $rowsPerPage = request('rowsPerPage', 5);
        $sortBy = request('sortBy', 'name');
        $filter = request('filter', '');
        $descendingBool = request('descending', 'false');

        $sortOrder = $descendingBool === 'true' ? 'desc' : 'asc';

        if($filter === '') {
            $productsQuery = Product::query();
            $rowsNumber = Product::count();
        } else {
            // filtering based on search term
            // TODO what to do if Meilisearch is not accessible at the moment
            $filteredProductsIds = $this->searchProductsIds($filter);
            $productsQuery = Product::whereIn('id', $filteredProductsIds);
            $rowsNumber = count($filteredProductsIds);
        }

        $productsQuery = $productsQuery->orderBy($sortBy, $sortOrder);

        if ($rowsPerPage > 0) {
            $offset = ($page - 1) * $rowsPerPage;
            $productsQuery = $productsQuery->offset($offset)->limit($rowsPerPage);
        }

        $products = $productsQuery->get();

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

            // TODO use attach method
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

        if($product->productDesigns->count() < 1) {
            abort(404);
        }

        // random products from same category
        $similarProducts = Product::whereHas('categories', function ($query) use ($product) {
            $query->where('categories.id', '=', $product->categories->first()->id);
        })->where('id', '!=', $id)->take(12)->get();

        // random products
        if(sizeof($similarProducts) < 12) {
            $similarProducts = Product::where('id', '!=', $id)->inRandomOrder()->take(12)->get();
        }

        // get all unique colors for given product
        $colors = $this->getUniqueColors($product);

        // get selected color
        $selectedColor = request()->get('color', $colors[0]->id);

        // get only product designs of selected color
        $productDesignsOfColor = ProductDesign::where('product_id', $id)->where('color_id', $selectedColor);

        // get all unique sizes of selected color product design
        $sizes = $productDesignsOfColor->distinct()->get(['size']);

        // get selected size
        $selectedSize = request()->get('size', $sizes[0]->size);

        // get available quantity of selected product design
        $productDesign = ProductDesign::where('product_id', $id)
            ->where('color_id', $selectedColor)
            ->where('size', $selectedSize)
            ->first();
        $availableQuantity = $productDesign->quantity;

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
            ->with('sizes', $sizes)
            ->with('quantity', $availableQuantity);
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

    private function searchProductsIds($searchQuery) {
        $searchedProductsIdsArr = $this->client
            ->index('products')
            ->search(
                $searchQuery,
                [
                    'attributesToRetrieve' => ['id'],
                    'limit' => Product::count()
                ]
            )
            ->getHits();

        $searchedProductsIdsFlattenArr = Arr::flatten($searchedProductsIdsArr);

        return collect($searchedProductsIdsFlattenArr);
    }


    //    private function searchProducts($searchQuery) {
//        return Product::search(
//            $searchQuery,
//            function (Indexes $meiliSearch, string $query, array $options) {
//                $options['limit'] = Product::count();
//
//                return $meiliSearch->search($query, $options);
//            }
//        )->get();
//    }
}
