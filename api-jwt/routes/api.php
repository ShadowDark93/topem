<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

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
'prefix' => 'auth'

], function ($router) {

Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::post('logout', 'App\Http\Controllers\AuthController@logout');
Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
Route::post('profile', 'App\Http\Controllers\AuthController@profile');
Route::post('register', 'App\Http\Controllers\AuthController@register');
});

Route::group(['middleware' => ['jwt.verify']], function() {
//productos
Route::get('productos', 'App\Http\Controllers\ProductoController@index');
Route::post('productos', 'App\Http\Controllers\ProductoController@store');
Route::put('productos/{id}', 'App\Http\Controllers\ProductoController@update');

});