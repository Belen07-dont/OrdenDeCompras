<?php

use App\Http\Controllers\nav;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrearUsuario;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Routing\Router;

Route::get('/', function () {
    return view('index');
});

Route::get('/productos',[ProductController::class, 'index'])->name('productos.index');

Route::post(uri: '/guardar', action:    [CrearUsuario::class, 'guardar']);
Route::post(uri: '/logout', action:     [CrearUsuario::class, 'logout']);
Route::post(uri: '/login', action:      [CrearUsuario::class, 'login']);

//posts para productos
Route::post('/create-product',          [PostController::class, 'createprod']);



// Login 
Route::get('/login', function () {
    return view('login');
});

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/signin', function () {
    return view('sign');
});


Route::get('/carrito', function () {
    return view('carrito');
});