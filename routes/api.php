<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Criação de token */
Route::post('/login', function (Request $request) {
    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    $token = $user->createToken('token-name')->plainTextToken;

    return response()->json(['token' => $token]);
});

/* ---------------------------------------- User ---------------------------------------- */
Route::get('/user'         , 'App\Http\Controllers\UserController@getAllUsers')->middleware('auth:sanctum');
Route::get('/user/{$id}'   , 'App\Http\Controllers\UserController@getUser')->middleware('auth:sanctum');
Route::post('/user'        , 'App\Http\Controllers\UserController@createUser')->middleware('auth:sanctum');
Route::patch('/user/{$id}' , 'App\Http\Controllers\UserController@updateUser')->middleware('auth:sanctum');
Route::delete('/user/{$id}', 'App\Http\Controllers\UserController@deleteUser')->middleware('auth:sanctum');

/* ---------------------------------------- Item ---------------------------------------- */
Route::get('/item'                , 'App\Http\Controllers\ItemController@getAllItems')->middleware('auth:sanctum');
Route::get('/item/{$id}'          , 'App\Http\Controllers\ItemController@getItem')->middleware('auth:sanctum');
Route::get('/item/category/{$id}' , 'App\Http\Controllers\ItemController@getItemsByCategory')->middleware('auth:sanctum');
Route::post('/item'               , 'App\Http\Controllers\ItemController@createItem')->middleware('auth:sanctum');
Route::patch('/item/{$id}'        , 'App\Http\Controllers\ItemController@updateItem')->middleware('auth:sanctum');
Route::delete('/item/{$id}'       , 'App\Http\Controllers\ItemController@deleteItem')->middleware('auth:sanctum');

/* ---------------------------------------- Category ---------------------------------------- */
Route::get('/category'           , 'App\Http\Controllers\CategoryController@getAllCategory')->middleware('auth:sanctum');
Route::get('/category/{$id}'     , 'App\Http\Controllers\CategoryController@getCategory')->middleware('auth:sanctum');
Route::post('/category'          , 'App\Http\Controllers\CategoryController@createCategory')->middleware('auth:sanctum');
Route::patch('/category/{$id}'   , 'App\Http\Controllers\CategoryController@updateCategory')->middleware('auth:sanctum');
Route::delete('/category/{$id}'  , 'App\Http\Controllers\CategoryController@deleteCategory')->middleware('auth:sanctum');

/* ---------------------------------------- Cart ---------------------------------------- */
Route::get('/cart'           , 'App\Http\Controllers\CartController@getAllCart')->middleware('auth:sanctum');
Route::get('/cart/user/{$id}', 'App\Http\Controllers\CartController@getCartByUser')->middleware('auth:sanctum');
Route::post('/cart'          , 'App\Http\Controllers\CartController@createCart')->middleware('auth:sanctum');
Route::patch('/cart/{$id}'   , 'App\Http\Controllers\CartController@updateCart')->middleware('auth:sanctum');
Route::delete('/cart/{$id}'  , 'App\Http\Controllers\CartController@deleteCart')->middleware('auth:sanctum');
