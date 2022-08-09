<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controlles\PersonaController;
use App\Http\Controllers\PersonaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('persona/agregar', [PersonaController::class, 'create'])->name('persona.create');
Route::get('persona/listar', [PersonaController::class, 'index'])->name('persona.list');
Route::get('persona/{persona}/editar', [PersonaController::class, 'edit'])->name('persona.edit');


