<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $user = User::get()->toJson(JSON_PRETTY_PRINT);
        return response($user, 200);
    }

    public function getUser($id)
    {
        $user = User::find($id);

        if(!$user)
        {
            return response()->json([
                "message" => "Erro ao encontrar User..."
            ], 404);
        }

        return response()->json($user);
    }

    public function createUser(Request $request)
    {
        $user = new User;
        $user->name         =       $request->name;
        $user->email        =       $request->email;
        $user->password     =       Hash::make($request->password);
        $user->save();

        return response()->json([
            "message" => "User criado com sucesso!"
        ], 201);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        if(!$user)
        {
            return response()->json([
                "message" => "Erro ao encontrar User..."
            ], 404);
        }

        $user->name     = is_null($request->name)       ? $user->name       : $request->name;
        $user->email    = is_null($request->email)      ? $user->email      : $request->email;
        $user->password = is_null($request->password)   ? $user->password   : $request->password;
        $user->save();

        return response()->json([
            "message" => "User atualizado com sucesso!"
        ], 201);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if(!$user)
        {
            return response()->json([
                "message" => "Erro ao encontrar User..."
            ], 404);
        }

        $user->delete();

        return response()->json([
            "message" => "User apagado com sucesso!"
        ], 201);
    }

    public function tokenGenerate()
    {
        return view('tokenGenerate');
    }
}
