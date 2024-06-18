<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\CarritoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Rutas de la página de inicio
Route::get('/', HomeController::class);

//Rutas de la cafetería
Route::controller(CafeController::class)->group(function(){
    Route::get('cafe', 'index')->name('cafe.index');
    Route::get('cafe/create', 'create')->name('cafe.create');
    Route::post('cafe','store')->name('cafe.store');
    //Rutas de productos
    Route::get('cafe/burritos', 'burritos')->name('cafe.burritos');
    Route::get('cafe/pan', 'pan')->name('cafe.pan');
    Route::get('cafe/papitas', 'papitas')->name('cafe.papitas');
    Route::get('cafe/bebidas', 'bebidas')->name('cafe.bebidas');
    Route::get('cafe/productos', 'productos')->name('cafe.productos');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'showLoginForm')->name('login.form');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

// Rutas del carrito de compras
Route::middleware('auth')->group(function () {
    Route::controller(CarritoController::class)->group(function () {
        Route::get('/carrito', 'index')->name('carrito.index');
        Route::post('/carrito/add/{producto}', 'add')->name('carrito.add');
        Route::post('/carrito/remove/{item}', 'remove')->name('carrito.remove');
    });
});
   





