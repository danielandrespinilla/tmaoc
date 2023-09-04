<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdmifuncionesController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('cliente/actualizar/{id}','ClientesController@edit')->name('clientes.edit');
Route::get('cliente/update/{id}','ClientesController@update')->name('clientes.update');
Route::get('administrador/actualizar/{id}','AdministradoresController@edit')->name('administradores.edit');
Route::get('administrador/update/{id}','AdministradoresController@update')->name('administradores.update');

Route::get('clientes/index', 'App\Http\Controllers\AdmifuncionesController@index')->name('admifunciones.index');
Route::get('clientes/crear', 'App\Http\Controllers\AdmifuncionesController@create')->name('admifunciones.create');
Route::post('clientes/agregar', 'App\Http\Controllers\AdmifuncionesController@store')->name('admifunciones.store');
Route::get('clientes/editar/{id}', 'App\Http\Controllers\AdmifuncionesController@edit')->name('admifunciones.edit');
Route::get('clientes/actualizar/{id}', 'App\Http\Controllers\AdmifuncionesController@update')->name('admifunciones.update');

Route::get('ingresos/index', 'App\Http\Controllers\IngresosController@index')->name('ingresos.index');
Route::get('ingresos/crear', 'App\Http\Controllers\IngresosController@create')->name('ingresos.create');
Route::post('/ingresos/agregar', 'App\Http\Controllers\IngresosController@store')->name('ingresos.store');
Route::post('/ingresos/salida', 'App\Http\Controllers\IngresosController@salida')->name('ingresos.salida');
Route::get('ingresos/editar/{id}', 'App\Http\Controllers\IngresosController@edit')->name('ingresos.edit');
Route::post('ingresos/actualizar/{id}', 'App\Http\Controllers\IngresosController@update')->name('ingresos.update');
Route::get('ingresos/eliminar/{id}', 'App\Http\Controllers\IngresosController@destroy')->name('ingresos.destroy');





