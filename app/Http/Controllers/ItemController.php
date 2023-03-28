<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function getAllItems()
    {
        $item= Item::get()->toJson(JSON_PRETTY_PRINT);
        return response($item, 200);
    }

    public function getItemsByCategory($categoryId)
    {
        $category = Category::find($categoryId);

        if(!$category)
        {
            return response()->json([
                "message" => "Erro ao encontrar categoria..."
            ], 404);
        }

        $items = Item::where("category_id", $categoryId)->get();

        return response()->json($items);
    }

    public function listItems()
    {
        $items = Item::all();

        return view('home', compact('items'));
    }

    public function getItem($id)
    {
        $item = Item::find($id);
        
        if(!$item)
        {
            return response()->json([
                "message" => "Erro ao encontrar User..."
            ], 404);
        }

        return response()->json($item);
    }

    public function formItem()
    {
        return view('item');
    }

    public function newItemForm(Request $request)
    {
        $request->validate([
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $item = new Item;
        $item->name         = $request->name;
        $item->ingredients  = $request->ingredients;
        $item->price        = $request->price;
        $item->tag          = $request->tag;
        $item->image_name   = $imageName;
        $item->image_path   = "/images/".$imageName;
        $item->category_id  = $request->category_id;
        $item->save();

        return redirect('/item/adicionado');
    }

    public function itemSuccess()
    {
        return view('itemAdd');
    }

    public function createItem(Request $request)
    {
        $request->validate([
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $item = new Item;
        $item->name         = $request->name;
        $item->ingredients  = $request->ingredients;
        $item->price        = $request->price;
        $item->tag          = $request->tag;
        $item->image_name   = $imageName;
        $item->image_path   = "/images/".$imageName;
        $item->category_id  = $request->category_id;
        $item->save();

        return response()->json([
            "message" => "Item criado com sucesso!"
        ], 201);
    }

    public function updateItem(Request $request, $id)
    {
        $item = Item::find($id);

        if(!$item)
        {
            return response()->json([
                "message" => "Erro ao encontrar item..."
            ], 404);
        }

        $request->validate([
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $item->name         = is_null($request->name)           ? $item->name           : $request->name;
        $item->ingredients  = is_null($request->ingredients)    ? $item->ingredients    : $request->ingredients;
        $item->price        = is_null($request->price)          ? $item->price          : $request->price;
        $item->tag          = is_null($request->tag)            ? $item->tag            : $request->tag;
        $item->image_path   = is_null($request->image)          ? $item->image_path     : "/images/".$imageName;
        $item->image_name   = is_null($request->image)          ? $item->image_name     : $imageName;
        $item->category_id  = is_null($request->category_id)    ? $item->category_id    : $request->category_id;
        $item->save();

        return response()->json([
            "message" => "Item atualizado com sucesso!"
        ], 201);
    }

    public function deleteItem($id)
    {
        $item = Item::find($id);
        
        if(!$item)
        {
            return response()->json([
                "message" => "Erro ao encontrar User..."
            ], 404);
        }

        $item->delete();

        return response()->json([
            "message" => "Item deletado com sucesso!"
        ], 201);
    }
}
