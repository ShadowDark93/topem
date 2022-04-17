<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
return $request->user();
}); */

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',

], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('profile', 'App\Http\Controllers\AuthController@profile');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
});

Route::group(['middleware' => ['jwt.verify']], function () {
//productos
    Route::get('productos', 'App\Http\Controllers\ProductoController@index');
    Route::get('productos/{id}', 'App\Http\Controllers\ProductoController@show');
    Route::post('productos', 'App\Http\Controllers\ProductoController@store');
    Route::put('productos/{id}', 'App\Http\Controllers\ProductoController@update');
    Route::put('productos/desactivar/{id}', 'App\Http\Controllers\ProductoController@deactivate');
    Route::put('productos/activar/{id}', 'App\Http\Controllers\ProductoController@activate');

//clientes
    Route::get('clientes','App\Http\Controllers\ClienteController@index');
    Route::get('clientes/{id}','App\Http\Controllers\ClienteController@show');
    Route::post('clientes', 'App\Http\Controllers\ClienteController@store');
    Route::put('clientes/{id}', 'App\Http\Controllers\ClienteController@update');

});