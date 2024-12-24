<?php

use App\Http\Controllers\abmController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Models\Producto;

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

/* ROUTES CATEGORIAS */
Route::get('/categorias', [CategoriaController::class,  'index_cat'])->name('index_cat');

/* ABM CATEGORIAS */
Route::get('/categorias/{id}/productos', [ProductoController::class, 'productosPorCategoria'])->name('productos_por_categoria');

Route::get('/admin/categorias', [CategoriaController::class, 'adminIndex'])->name('admin.categorias'); 
// este es el indice de abm de categorias

Route::get('/admin/categorias/create', [CategoriaController::class, 'create'])->name('admin.categorias.create');

Route::get('/admin/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('admin.categorias.edit');

Route::post('/admin/categorias', [CategoriaController::class, 'store'])->name('admin.categorias.store');

Route::put('/admin/categorias/{id}', [CategoriaController::class, 'update'])->name('admin.categorias.update');

Route::delete('/admin/categorias/{id}', [CategoriaController::class, 'destroy'])->name('admin.categorias.destroy');

Route::get('/admin/categorias/export/excel', [CategoriaController::class, 'exportExcel'])->name('admin.categorias.export.excel');

Route::get('/admin/categorias/export/pdf', [CategoriaController::class, 'exportPDF'])->name('admin.categorias.export.pdf');

Route::get('/admin/categorias/export/csv', [CategoriaController::class, 'exportCSV'])->name('admin.categorias.export.csv');


/* ROUTES PRODUCTO */
//Route::resource("producto", ProductoController::class);

Route::get('/admin/productos/export/excel', [ProductoController::class, 'exportExcel'])->name('admin.productos.export.excel');

Route::get('/admin/productos/export/pdf', [ProductoController::class, 'exportPDF'])->name('admin.productos.export.pdf');

Route::get('/admin/productos/export/csv', [ProductoController::class, 'exportCSV'])->name('admin.productos.export.csv');

Route::get('/admin/productos/{id}/edit', [ProductoController::class, 'edit'])->name('admin.producto.edit');

Route::put('/admin/productos/{id}', [ProductoController::class, 'update'])->name('admin.productos.update');

Route::get('/', [ProductoController::class, 'index'])->name('welcome'); //indice vista inicial

Route::get('/admin/productos', [ProductoController::class, 'admin_productos_index'])->name('admin.productos'); // indice de abm de producto

Route::get('/search', [ProductoController::class, 'search'])->name('search_products');

Route::delete('/admin/productos/{id}', [ProductoController::class, 'destroy'])->name('admin.productos.destroy');

Route::put('/admin/productos/{id}', [ProductoController::class, 'update'])->name('admin.productos.update');

Route::get('/admin/productos/{id}/edit', [ProductoController::class, 'edit'])->name('admin.productos.edit');

Route::post('/admin/productos', [ProductoController::class, 'store'])->name('admin.productos.store');

Route::get('/admin/productos/create', [ProductoController::class, 'create'])->name('admin.productos.create');

Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('producto.show');

/* ROUTES DE LOGIN */
Route::get('/user-log/login', [UserController::class, 'r_view_login_remake'])->name('user-log.r_view_login_remake');

Route::get('/user-log/register', [UserController::class, 'r_view_register_remake'])->name('user-log.r_view_register_remake');

// Tambien tiene sentido que esto hubiera sido un post-login
Route::post('/user-log/authenticate', [UserController::class, 'authenticate'])->name('user-log.authenticate');

Route::post('/user-log/register', [UserController::class, 'register'])->name('user-log.register_remake');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

/* ROUTES DE ADMIN */
Route::get('/admin/welcome', [UserController::class, 'index_abm'])->name('admin.welcome-admin');

Route::get('/abm', [abmController::class, 'abm_list'])->name('admin.abm-list');

// Enrutamiento view about-us
Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

/*
Route::get('/abm', function () {
    return view('abm');
})->name('admin.abm-list');
*/