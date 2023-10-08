<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdmifuncionesController;
use App\Http\Controllers\IngresosController;
use App\Http\Controllers\VehiculosController;
use Illuminate\Support\Facades\Auth;


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


Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('cliente/actualizar/{id}','ClientesController@edit')->name('clientes.edit');
Route::get('cliente/update/{id}','ClientesController@update')->name('clientes.update');
Route::get('administrador/actualizar/{id}','AdministradoresController@edit')->name('administradores.edit');
Route::get('administrador/update/{id}','AdministradoresController@update')->name('administradores.update');

Route::get('clientes/index', 'App\Http\Controllers\AdmifuncionesController@index')->name('admifunciones.index');
Route::get('clientes/crear', 'App\Http\Controllers\AdmifuncionesController@create')->name('admifunciones.create');
Route::post('clientes/agregar', 'App\Http\Controllers\AdmifuncionesController@store')->name('admifunciones.store');
Route::get('clientes/editar/{id}', 'App\Http\Controllers\AdmifuncionesController@edit')->name('admifunciones.edit');
Route::post('clientes/actualizar/{id}', 'App\Http\Controllers\AdmifuncionesController@update')->name('admifunciones.update');
Route::get('/admifunciones/search', [AdmifuncionesController::class, 'search'])->name('admifunciones.search');
Route::get('/admifunciones/desactivar/{id}', [AdmifuncionesController::class, 'desactivarCliente'])->name('admifunciones.desactivarCliente');
Route::get('/admifunciones/buscarciudades/{id}', 'AdmifuncionesController@consultarCiudades');



Route::get('ingresos', [IngresosController::class, 'index'])->name('ingresos.index');
Route::get('ingresos/create', [IngresosController::class, 'create'])->name('ingresos.create');
Route::post('ingresos', [IngresosController::class, 'store'])->name('ingresos.store');
Route::get('ingresos/{ingreso}/edit', [IngresosController::class, 'edit'])->name('ingresos.edit');
Route::put('ingresos/{ingreso}', [IngresosController::class, 'update'])->name('ingresos.update');




Route::get('/vehiculos', [VehiculosController::class, 'index'])->name('vehiculos.index');
Route::get('/vehiculos/create/{numeroplaca}', 'VehiculosController@create')->name('vehiculos.create');
Route::post('/vehiculos/generar-reporte', 'VehiculosController@generarReporte')->name('vehiculos.generar-reporte');
Route::view('/vehiculos/reporte', 'vehiculos.reporte')->name('vehiculos.reporte');












