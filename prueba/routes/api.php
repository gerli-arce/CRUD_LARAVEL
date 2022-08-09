<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/persona', 'App\Http\Controllers\PersonaController@show');// Mostrar los Reguistros
Route::post('/persona', 'App\Http\Controllers\PersonaController@store'); // crear un requistro
Route::put('/persona/{id}', 'App\Http\Controllers\PersonaController@update'); // actualixar un requistro
Route::delete('/persona/{id}', 'App\Http\Controllers\PersonaController@destroy'); // eliminar un reguistro
