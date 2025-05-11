<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TiendaController;
use Illuminate\Support\Facades\Auth;





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


//RUTAS PARA EL MODULO DE COMPRAS

Route::get('/admin/compras', [App\Http\Controllers\CompraController::class, 'index'])->name('admin.compras.index')->middleware('auth');
Route::get('/admin/compras/create', [App\Http\Controllers\CompraController::class, 'create'])->name('admin.compras.create')->middleware('auth');
Route::post('/admin/compras/create', [App\Http\Controllers\CompraController::class, 'store'])->name('admin.compras.store')->middleware('auth');
Route::get('/admin/compras/{id}', [App\Http\Controllers\CompraController::class, 'show'])->name('admin.compras.show')->middleware('auth');
Route::delete('/admin/compras/{id}', [App\Http\Controllers\CompraController::class, 'destroy'])->name('admin.compras.destroy')->middleware('auth');


//RUTAS PARA EL MODULO DE CLIENTES

Route::get('/admin/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('admin.clientes.index')->middleware('auth');
Route::get('/admin/clientes/create', [App\Http\Controllers\ClienteController::class, 'create'])->name('admin.clientes.create')->middleware('auth');
Route::post('/admin/clientes/create', [App\Http\Controllers\ClienteController::class, 'store'])->name('admin.clientes.store')->middleware('auth');
Route::get('/admin/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'show'])->name('admin.clientes.show')->middleware('auth');
Route::get('/admin/clientes/{id}/edit', [App\Http\Controllers\ClienteController::class, 'edit'])->name('admin.clientes.edit')->middleware('auth');
Route::put('/admin/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'update'])->name('admin.clientes.update')->middleware('auth');
Route::delete('/admin/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'destroy'])->name('admin.clientes.destroy')->middleware('auth');



//RUTAS PARA EL MODULO DE VENTAS

Route::get('/admin/ventas', [App\Http\Controllers\VentaController::class, 'index'])->name('admin.ventas.index')->middleware('auth');
Route::get('/admin/ventas/create', [App\Http\Controllers\VentaController::class, 'create'])->name('admin.ventas.create')->middleware('auth');
Route::post('/admin/ventas/create', [App\Http\Controllers\VentaController::class, 'store'])->name('admin.ventas.store')->middleware('auth');
Route::get('/admin/ventas/{id}', [App\Http\Controllers\VentaController::class, 'show'])->name('admin.ventas.show')->middleware('auth');
Route::get('/admin/ventas/pdf/{id}', [App\Http\Controllers\VentaController::class, 'pdf'])->name('admin.ventas.pdf')->middleware('auth');

Route::get('/admin/ventas/{id}/edit', [App\Http\Controllers\VentaController::class, 'edit'])->name('admin.ventas.edit')->middleware('auth');
Route::put('/admin/ventas/{id}', [App\Http\Controllers\VentaController::class, 'update'])->name('admin.ventas.update')->middleware('auth');
Route::delete('/admin/ventas/{id}', [App\Http\Controllers\VentaController::class, 'destroy'])->name('admin.ventas.destroy')->middleware('auth');



//RUTAS PARA LAS VENTAS TEMPORALES

Route::post('/admin/ventas/create/tmp', [App\Http\Controllers\TmpVentaController::class, 'tmp_ventas'])->name('admin.ventas.tmp_ventas')->middleware('auth');
Route::delete('/admin/ventas/create/tmp/{id}', [App\Http\Controllers\TmpVentaController::class, 'destroy'])->name('admin.ventas.tmp_ventas.destroy')->middleware('auth');
Route::post('/admin/ventas/create/tmp/{id}/aplicar-oferta', [App\Http\Controllers\TmpVentaController::class, 'aplicarOferta'])->name('tmpventa.aplicarOferta');

//RUTAS PARA EL DETALLE DE VENTAS

Route::post('/admin/ventas/detalle/create', [App\Http\Controllers\DetalleVentaController::class, 'store'])->name('admin.detalles.ventas.store')->middleware('auth');
Route::delete('/admin/ventas/detalle/{id}', [App\Http\Controllers\DetalleVentaController::class, 'destroy'])->name('admin.detalles.ventas.destroy')->middleware('auth');

//RUTAS PARA EL MODULO DE ARQUEOS

Route::get('/admin/arqueos', [App\Http\Controllers\ArqueoController::class, 'index'])->name('admin.arqueos.index')->middleware('auth');
Route::get('/admin/arqueos/create', [App\Http\Controllers\ArqueoController::class, 'create'])->name('admin.arqueos.create')->middleware('auth');
Route::post('/admin/arqueos/create', [App\Http\Controllers\ArqueoController::class, 'store'])->name('admin.arqueos.store')->middleware('auth');
Route::get('/admin/arqueos/{id}', [App\Http\Controllers\ArqueoController::class, 'show'])->name('admin.arqueos.show')->middleware('auth');
Route::get('/admin/arqueos/{id}/edit', [App\Http\Controllers\ArqueoController::class, 'edit'])->name('admin.arqueos.edit')->middleware('auth');
Route::get('/admin/arqueos/{id}/ingreso_egreso', [App\Http\Controllers\ArqueoController::class, 'ingresoegreso'])->name('admin.arqueos.ingresoegreso')->middleware('auth');
Route::post('/admin/arqueos/create_ingreso_egreso', [App\Http\Controllers\ArqueoController::class, 'store_ingreso_egreso'])->name('admin.arqueos.storeingresoegreso')->middleware('auth');
Route::put('/admin/arqueos/{id}', [App\Http\Controllers\ArqueoController::class, 'update'])->name('admin.arqueos.update')->middleware('auth');
Route::delete('/admin/arqueos/{id}', [App\Http\Controllers\ArqueoController::class, 'destroy'])->name('admin.arqueos.destroy')->middleware('auth');
Route::get('/admin/arqueos/{id}/cierre', [App\Http\Controllers\ArqueoController::class, 'cierre'])->name('admin.arqueos.cierre')->middleware('auth');
Route::post('/admin/arqueos/create_cierre', [App\Http\Controllers\ArqueoController::class, 'store_cierre'])->name('admin.arqueos.storecierre')->middleware('auth');









//RUTAS PARA EL MODULO DE TIENDA

Route::get('/', [TiendaController::class, 'index'])->name('tienda.index');
Route::get('/productos/{id}', [TiendaController::class, 'show'])->name('tienda.detalle');


//Route::get('/productos/{id}', [ProductoController::class, 'detalle'])->name('tienda.productos.detalle');
Route::get('/oferta', [ProductoController::class, 'ofertas'])->name('ofertas');
Route::get('/productos', [TiendaController::class, 'productos'])->name('productos');
//Route::get('/tienda', [TiendaController::class, 'index'])->name('tienda.index');