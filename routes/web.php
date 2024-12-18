<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

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

Route::get('/', [ProductoController::class, 'index'])->name('welcome');
Route::get('/categorias', [CategoriaController::class, 'index_cat'])->name('index_cat');
Route::get('/categorias/{id}/productos', [ProductoController::class, 'productosPorCategoria'])->name('productos_por_categoria');

Route::get('/admin/categorias', [CategoriaController::class, 'adminIndex'])->name('admin.categorias');

Route::get('/admin/categorias/create', [CategoriaController::class, 'create'])->name('admin.categorias.create');

Route::get('/admin/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('admin.categorias.edit');

Route::post('/admin/categorias', [CategoriaController::class, 'store'])->name('admin.categorias.store');
Route::put('/admin/categorias/{id}', [CategoriaController::class, 'update'])->name('admin.categorias.update');
Route::delete('/admin/categorias/{id}', [CategoriaController::class, 'destroy'])->name('admin.categorias.destroy');

