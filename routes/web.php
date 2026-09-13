<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    $productos = DB::table('productos')
        ->select('id_producto', 'nombre', 'descripcion', 'precio')
        ->orderBy('nombre')
        ->get();
    return view('welcome', compact('productos'));
});

Route::get('/carrito', function () {
    return view('carrito');
});

Route::get('/admin', function () {
    return view('admin');
})->middleware('admin');

Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login.form');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login');

Route::post('/register', [RegisterController::class, 'register'])
    ->name('register');

use App\Http\Controllers\ProductoController;

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/crear', [ProductoController::class, 'crear'])->name('productos.crear');
Route::post('/productos/guardar', [ProductoController::class, 'guardar'])->name('productos.guardar');
