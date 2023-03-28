<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Item;

class CartController extends Controller
{
    public function getAllCart()
    {
        $cart = Cart::get()->toJson(JSON_PRETTY_PRINT);
        return response($cart, 200);
    }

    public function getCartByUser($userId)
    {
        $user = User::find($userId);

        if(!$user)
        {
            return response()->json([
                "message" => "User não encontrado..."
            ], 404);
        }

        $cart = Cart::where("user_id", $userId)->get();

        return response()->json($cart);
    }

    public function createCart(Request $request)
    {
        $user = User::find($request->user_id);

        if(!$user)
        {
            return response()->json([
                "message" => "User não encontrado..."
            ], 404);
        }

        $item = Item::find($request->item_id);
        
        if(!$item)
        {
            return response()->json([
                "message" => "Item não encontrado..."
            ], 404);
        }

        $cart = new Cart;
        $cart->user_id = $request->user_id;
        $cart->item_id = $request->item_id;
        $cart->quantity = $request->quantity;
        $cart->save();

        return response()->json([
            "message" => "Carrinho criado com sucesso!"
        ], 201);
    }

    public function updateCart(Request $request, $id)
    {
        $cart = Cart::find($id);

        if(!$cart)
        {
            return response()->json([
                "message" => "Erro ao encontrar carrinho..."
            ]);
        }

        $cart->user_id  = is_null($request->user_id)    ? $cart->user_id    : $request->user_id;
        $cart->item_id  = is_null($request->item_id)    ? $cart->item_id    : $request->item_id;
        $cart->quantity = is_null($request->quantity)   ? $cart->quantity   : $request->quantity;
        $cart->save();

        return response()->json([
            "message" => "Carrinho atualizado com sucesso!"
        ], 201);
    }

    public function deleteCart($id)
    {
        $cart = Cart::find($id);

        if(!$cart)
        {
            return response()->json([
                "message" => "Erro ao encontrar carrinho..."
            ], 404);
        }

        $cart->delete();

        return response()->json([
            "message" => "Carrinho apagado com sucesso!"
        ], 201);
    }
}
