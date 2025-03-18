<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TiendaController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('tienda.index'); // O cualquier vista de tu tienda.
});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');


//RUTAS PARA EL MODULO DE CONFIGURACION

Route::get('/admin/configuracion', [App\Http\Controllers\ConfiguracionController::class, 'edit'])->name('admin.configuracion.edit')->middleware('auth');
Route::put('/admin/configuracion/{id}', [App\Http\Controllers\ConfiguracionController::class, 'update'])->name('admin.configuracion.update')->middleware('auth');


//RUTAS PARA EL MODULO DE ROLES

Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.index')->middleware('auth');
Route::get('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('admin.roles.create')->middleware('auth');
Route::post('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store')->middleware('auth');
Route::get('/admin/roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('auth');
Route::put('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.roles.update')->middleware('auth');
Route::delete('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('auth');


//RUTAS PARA EL MODULO DE USUARIOS

Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth');
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware('auth');
Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware('auth');
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.usuarios.show')->middleware('auth');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware('auth');
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware('auth');


//RUTAS PARA EL MODULO CATEGORIA

Route::get('/admin/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->name('admin.categorias.index')->middleware('auth');
Route::get('/admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create'])->name('admin.categorias.create')->middleware('auth');
Route::post('/admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'store'])->name('admin.categorias.store')->middleware('auth');

Route::get('/admin/categorias/{id}/edit', [App\Http\Controllers\CategoriaController::class, 'edit'])->name('admin.categorias.edit')->middleware('auth');
Route::put('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'update'])->name('admin.categorias.update')->middleware('auth');
Route::delete('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'destroy'])->name('admin.categorias.destroy')->middleware('auth');


//RUTAS PARA EL MODULO DE MARCAS

Route::get('/admin/marcas', [App\Http\Controllers\MarcaController::class, 'index'])->name('admin.marcas.index')->middleware('auth');
Route::get('/admin/marcas/create', [App\Http\Controllers\MarcaController::class, 'create'])->name('admin.marcas.create')->middleware('auth');
Route::post('/admin/marcas/create', [App\Http\Controllers\MarcaController::class, 'store'])->name('admin.marcas.store')->middleware('auth');
Route::get('/admin/marcas/{id}', [App\Http\Controllers\MarcaController::class, 'show'])->name('admin.marcas.show')->middleware('auth');
Route::get('/admin/marcas/{id}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('admin.marcas.edit')->middleware('auth');
Route::put('/admin/marcas/{id}', [App\Http\Controllers\MarcaController::class, 'update'])->name('admin.marcas.update')->middleware('auth');
Route::delete('/admin/marcas/{id}', [App\Http\Controllers\MarcaController::class, 'destroy'])->name('admin.marcas.destroy')->middleware('auth');


//RUTAS PARA EL MODULO DE PRODUCTOS

Route::get('/admin/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('admin.productos.index')->middleware('auth');
Route::get('/admin/productos/create', [App\Http\Controllers\ProductoController::class, 'create'])->name('admin.productos.create')->middleware('auth');
Route::post('/admin/productos/create', [App\Http\Controllers\ProductoController::class, 'store'])->name('admin.productos.store')->middleware('auth');
Route::get('/admin/productos/{id}', [App\Http\Controllers\ProductoController::class, 'show'])->name('admin.productos.show')->middleware('auth');
Route::get('/admin/productos/{id}/edit', [App\Http\Controllers\ProductoController::class, 'edit'])->name('admin.productos.edit')->middleware('auth');
Route::put('/admin/productos/{id}', [App\Http\Controllers\ProductoController::class, 'update'])->name('admin.productos.update')->middleware('auth');
Route::delete('/admin/productos/{id}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('admin.productos.destroy')->middleware('auth');
Route::get('/admin/get-marcas/{categoriaId}', [AdminController::class, 'getMarcas']);



//RUTAS PARA EL MODULO DE SALIDAS

Route::get('/admin/salidas', [App\Http\Controllers\SalidaController::class, 'index'])->name('admin.salidas.index')->middleware('auth');
Route::get('/admin/salidas/create', [App\Http\Controllers\SalidaController::class, 'create'])->name('admin.salidas.create')->middleware('auth');
Route::post('/admin/salidas/create', [App\Http\Controllers\SalidaController::class, 'store'])->name('admin.salidas.store')->middleware('auth');
Route::get('/admin/salidas/{id}', [App\Http\Controllers\SalidaController::class, 'show'])->name('admin.salidas.show')->middleware('auth');
Route::delete('/admin/salidas/{id}', [App\Http\Controllers\SalidaController::class, 'destroy'])->name('admin.salidas.destroy')->middleware('auth');




//RUTAS PARA EL MODULO DE TIENDA

Route::get('/', [TiendaController::class, 'index'])->name('tienda.index');
Route::get('/productos/{id}', [TiendaController::class, 'show'])->name('tienda.detalle');