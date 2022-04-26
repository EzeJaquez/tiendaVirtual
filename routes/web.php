<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\Auth\EditUserController;
use App\Http\Controllers\PedidosController;

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/admin-home',[HomeController::class,'adminHome'])->name('admin-home');
/*---------------------------------------------------------------------------------------------------*/
/*                                    USER-SECTION                                                  */
/*---------------------------------------------------------------------------------------------------*/

/*------------------------------------USER-LOGIN----------------------------------------------*/

Auth::routes();
Route::get('/perfil/edit',[EditUserController::class,'edit'])->name('perfil.edit');
Route::get('/perfil/option',[EditUserController::class,'option'])->name('perfil.option');
Route::patch('/perfil/actualizar', [EditUserController::class,'update'])->name('perfil.update'); 
Route::patch('/perfil/resestpass', [EditUserController::class,'update_pssw'])->name('password.upd');
Route::get('/perfil/new/password', [EditUserController::class,'reset_passwd'])->name('reset.passwd');

/*------------------------------------USER-PEDIDOS----------------------------------------------*/
Route::get('/perfil/pedidos',[PedidosController::class,'index'])->name('perfil.pedidos');
Route::get('/perfil/pedidos/detalle/{pedido}/{precio_total}',[PedidosController::class,'detalle'])->name('perfil.detalle');
/*------------------------------------USER-PRODUCTOS----------------------------------------------*/

Route::get('/producto/{categoria}',[ProductoController::class,'productos_by_categoria'])->name('producto-cat');
Route::post('/producto/search',[ProductoController::class,'filtro_home'])->name('buscador_home');
Route::get('/producto/info/{producto}/{cantidad}/{accion}',[ProductoController::class,'info_producto'])->name('producto-info');

/*------------------------------------CARRO-DE-LA-COMPRA---------------------------------------------*/

Route::post('/carrito/add',[CarroController::class,'add'])->name('card.add');
Route::patch('/carrito/update',[CarroController::class,'update'])->name('card.update');
Route::get('/carrito/checkout',[CarroController::class,'cart'])->name('cart.checkout');
Route::post('/carrito/clear',[CarroController::class,'clear'])->name('cart.clear');
Route::post('/carrito/removeitem',[CarroController::class,'removeitem'])->name('cart.removeitem');
Route::post('/carrito/confirmar',[CarroController::class,'confirmar_compra'])->name('cart.confirmar_compra');


/*---------------------------------------------------------------------------------------------------*/
/*                                    ADMIN-SECTION                                                  */
/*---------------------------------------------------------------------------------------------------*/

/*------------------------------------ADMIN-CATEGORIAS-----------------------------------------------*/
Route::get('/admin-categoria',[CategoriaController::class,'index'])->name('admin-categoria.index');
Route::get('/admin-categoria/create',[CategoriaController::class,'create'])->name('admin-categoria.create');
Route::get('/admin-categoria/{categoria}/editar',[CategoriaController::class,'edit'])->name('admin-categoria.edit');
Route::post('/admin-categoria/store',[CategoriaController::class,'store'])->name('admin-categoria.store');
Route::post('/admin-categoria/filtro',[CategoriaController::class,'filtro'])->name('admin-categoria.filtro');
Route::patch('/admin-categoria/{categoria}/actualizar', [CategoriaController::class,'update'])->name('admin-categoria.update');
/*------------------------------------ADMIN-PRODUCTOS-----------------------------------------------*/
Route::get('/admin-producto',[ProductoController::class,'index'])->name('admin-producto.index');
Route::get('/admin-producto/create',[ProductoController::class,'create'])->name('admin-producto.create');
Route::get('/admin-producto/{producto}/editar',[ProductoController::class,'edit'])->name('admin-producto.edit');
Route::post('/admin-producto/store',[ProductoController::class,'store'])->name('admin-producto.store');
Route::post('/admin-producto/filtro',[ProductoController::class,'filtro'])->name('admin-producto.filtro');
Route::patch('/admin-producto/{producto}/actualizar', [ProductoController::class,'update'])->name('admin-producto.update');
/*------------------------------------ADMIN-PEDIDOS-----------------------------------------------*/
Route::get('/admin-pedidos',[PedidosController::class,'index_admin'])->name('admin-pedidos.index');
Route::get('/admin-pedidos/detalle/{pedido}/{precio_total}',[PedidosController::class,'detalle_admin'])->name('admin-pedidos.detalle');
Route::get('/admin-pedidos/editar/{pedido}',[PedidosController::class,'editar'])->name('admin-pedidos.edit');
Route::patch('/admin-pedidos/{pedido}/actualizar', [PedidosController::class,'update'])->name('admin-pedidos.update');

