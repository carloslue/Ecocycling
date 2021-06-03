<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::resource('comentarios',App\Http\Controllers\ComentarioController::class)->middleware('auth');
Route::resource('informacions',App\Http\Controllers\InformacionController::class)->middleware('auth');
Route::resource('rutas',App\Http\Controllers\RutaController::class)->middleware('auth');
Route::resource('equipos',App\Http\Controllers\EquipoController::class)->middleware('auth');
Route::resource('promociones',App\Http\Controllers\PromocioneController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
