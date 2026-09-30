<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    public function index()
    {
        return Product::paginate();
    }

    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();
        $product = Product::create($data);

        return $product;
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(Product $product, ProductUpdateRequest $request)
    {
        $data = $request->validated();
        $product->update($data);

        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'message' => 'Produto excluído',
        ], 204);
    }
}