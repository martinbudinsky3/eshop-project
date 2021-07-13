<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductDesignPostRequest;
use App\Models\Product;
use App\Models\ProductDesign;
use Illuminate\Http\Request;

class ProductDesignController extends Controller
{
    public function store(ProductDesignPostRequest $request, Product $product)
    {
        $productDesign = ProductDesign::create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'size' => $request->size,
            'color_id' =>  $request->color,
        ]);

        return response()->json([
            'id' => $productDesign->id,
            'success' => 'Variant produktu bol úspešne pridaný'
        ], 201);
    }

    public function update(Request $request, ProductDesign $productDesign)
    {
        return response()->json(null, 204);
    }

    public function destroy(ProductDesign $productDesign)
    {
        return response()->json(null, 204);
    }
}
