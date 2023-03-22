<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\AutorLibroController;
use App\Http\Controllers\DetalleCompraController;
use App\Http\Controllers\UserController_created;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\PagoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::resource('categorias', CategoriaController::class);
Route::resource('libros', LibroController::class);
Route::resource('autores', AutorController::class);
Route::resource('autorLibro', AutorLibroController::class);
Route::resource('user', UserController_created::class);
Route::resource('detalleCompra', DetalleCompraController::class);
Route::resource('compra', CompraController::class);
Route::resource('pago', PagoController::class);









