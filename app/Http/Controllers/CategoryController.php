<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getAllCategory()
    {
        $category = Category::get()->toJson(JSON_PRETTY_PRINT);
        return response($category, 200);
    }

    public function getCategory($id)
    {
        $category = Category::find($id);

        if(!$category)
        {
            return response()->json([
                "message" => "Erro ao encontrar categoria"
            ], 404);
        }

        return response()->json($category);
    }

    public function createCategory(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return request()->json([
            "message" => "Categoria criada com sucesso!"
        ], 201);
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);

        if(!$category)
        {
            return response()->json([
                "message" => "Erro ao encontrar categoria..."
            ], 404);
        }

        $category->name = is_null($request->name) ? $category->name : $request->name;
        $category->save();

        return response()->json([
            "message" => "Categoria atualizada com sucesso!"
        ], 201);
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);

        if(!$category)
        {
            return response()->json([
                "message" => "Erro ao encontrar categoria..."
            ], 404);
        }

        $category->delete();

        return response()->json([
            "message" => "Categoria apagada com sucesso!"
        ], 201);
    }
}
