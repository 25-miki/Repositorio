<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrutaController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AuthController;

// Rutas de autenticación
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {    

    // CRUD de frutas
    Route::resource('frutas', FrutaController::class);
    Route::get('/', [FrutaController::class, 'index'])->name('fruta.index');

    Route::get('frutas/estaciones/{estacion}', [FrutaController::class, 'estaciones'])->name('frutas.estaciones');



    // Rutas para el carrito
    Route::get('carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::post('carrito/eliminar', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::post('carrito/quitar', [CarritoController::class, 'quitar'])->name('carrito.quitar');
});
