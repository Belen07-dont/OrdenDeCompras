<?php

use App\Http\Controllers\nav;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/',         [nav::class, 'index'])      ->name('index');
Route::get('/productos',[nav::class, 'productos'])  ->name('productos');
Route::get('/pedidos',  [nav::class, 'pedidos'])    ->name('pedidos');
Route::get('/perfil',   [nav::class, 'perfil'])     ->name('perfil');