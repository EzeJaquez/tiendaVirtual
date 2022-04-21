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

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/admin-home',[HomeController::class,'adminHome'])->name('admin-home');
/*---------------------------------------------------------------------------------------------------*/
/*                                    USER-SECTION                                                  */
/*---------------------------------------------------------------------------------------------------*/

/*------------------------------------USER-LOGIN----------------------------------------------*/



/*---------------------------------------------------------------------------------------------------*/
/*                                    ADMIN-SECTION                                                  */
/*---------------------------------------------------------------------------------------------------*/

/*------------------------------------ADMIN-CATEGORIAS-----------------------------------------------*/
Route::get('/admin-categoria',[CategoriaController::class,'index'])->name('admin-categoria.index');
Route::get('/admin-categoria/create',[CategoriaController::class,'create'])->name('admin-categoria.create');
Route::get('/admin-categoria/{categoria}/editar',[CategoriaController::class,'edit'])->name('admin-categoria.edit');
Route::post('/admin-categoria/store',[CategoriaController::class,'store'])->name('admin-categoria.store');
Route::post('/admin-categoria/orden',[CategoriaController::class,'orden'])->name('admin-categoria.orden');
Route::patch('/admin-categoria/{categoria}/actualizar', [CategoriaController::class,'update'])->name('admin-categoria.update');
/*------------------------------------ADMIN-PRODUCTOS-----------------------------------------------*/
Route::get('/admin-producto',[ProductoController::class,'index'])->name('admin-producto.index');
Route::get('/admin-producto/create',[ProductoController::class,'create'])->name('admin-producto.create');
Route::get('/admin-producto/{producto}/editar',[ProductoController::class,'edit'])->name('admin-producto.edit');
Route::post('/admin-producto/store',[ProductoController::class,'store'])->name('admin-producto.store');
Route::post('/admin-producto/orden',[ProductoController::class,'orden'])->name('admin-producto.orden');
Route::patch('/admin-producto/{producto}/actualizar', [ProductoController::class,'update'])->name('admin-producto.update');

Auth::routes();

