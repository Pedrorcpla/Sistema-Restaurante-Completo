<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

/* ------------------------ Criação de token ------------------------ */
Route::post('/token', function (Request $request) {
    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        $message = ['message' => 'Unauthorized'];
        return view('token')->with('message', $message);
    }

    $token = $user->createToken('token-name')->plainTextToken;

    $message = ['token' => $token];
    return view('token')->with('message', $message);
});
Route::get('/newtoken', 'App\Http\Controllers\UserController@tokenGenerate');

/* ------------------------ Novo item ------------------------ */
Route::get('/item/create', 'App\Http\Controllers\ItemController@formItem');
Route::post('/item', 'App\Http\Controllers\ItemController@newItemForm');
Route::get('/item/adicionado', 'App\Http\Controllers\ItemController@itemSuccess');

/* ------------------------ Home ------------------------ */
Route::get('/', 'App\Http\Controllers\ItemController@listItems');