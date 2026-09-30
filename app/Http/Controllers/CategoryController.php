<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
       $data = $request->validated();
       $category = Category::create($data);

        return $category;
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //$category = Category::find($id);

       // if (!$category) {
            //404 Not Found
           // return response()->json([
              //  'mesage' => 'categoria não encontrada',
            //], 404);
        //}

        return $category;
    }

    public function update(Category $category, CategoryUpdateRequest $request)
{
    $data = $request->validated();
    $category->update($data);

    return $category;
}
    
    public function destroy(
        Category $category
    ) {
        $hasProduct = \App\Models\Product::where('category_id', $category->id)->exists();

        if ($hasProduct) {
            // 422 Unprocessable Entity
            return response()->json([
                'mesage' => 'Categoria com produtos relacionados',
            ], 404);
        }


        $category->delete();

        //204 No Content
        return response()->json([
            'mesage' => 'Categoria ecluida',
        ], 204);
    }
}
