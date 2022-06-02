<?php

use App\temporada;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/facturas_detalle','FacturasController@detalle')->name('facturas.detalle');

Route::resource('facturas','FacturasController');

Route::get('/factura_pdf/{fac_id}','FacturasController@facturas_pdf')->name('facturas.pdf');;


Route::get('/reporte','reporteController@index')->name('reporte');
Route::post('/reporte/reporte','reporteController@reporte')->name('reporte.reporte');




Route::get('/temporada','temporadaController@index')->name('temporada');
route::post('/temporada/store','temporadaController@store')->name('temporada.store');
route::post('/temporada/update/{tem_id}','temporadaController@update')->name('temporada.update');
route::post('/temporada/destroy/{tem_id}','temporadaController@destroy')->name('temporada.destroy');

Route::get('/tipos','TiposController@index')->name('tipos');
Route::post('/tipos/store','TiposController@store')->name('tipos.store');
Route::post('/tipos/update/{tip_id}','TiposController@update')->name('tipos.update');
Route::post('/tipos/destroy/{tip_id}','TiposController@destroy')->name('tipos.destroy');
Route::post('/tipos/todo','TiposController@todo')->name('tipos.todo');


Route::get('/recepcionistas','RecepcionistasController@index')->name('recepcionistas');
Route::post('/recepcionistas/store/','RecepcionistasController@store')->name('recepcionistas.store');
Route::post('/recepcionistas/update/{usu_id}','RecepcionistasController@update')->name('recepcionistas.update');
Route::post('/recepcionistas/destroy/{usu_id}','RecepcionistasController@destroy')->name('recepcionistas.destroy');




Route::get('/temporada','TemporadaController@index')->name('temporada');
Route::get('/habitaciones','HabitacionesController@index')->name('habitaciones');
Route::get('/habitaciones/edit/{hab_id}','HabitacionesController@edit')->name('habitaciones.edit');
route::post('/habitaciones/store','HabitacionesController@store')->name('habitaciones.store');
route::post('/habitaciones/search','HabitacionesController@search')->name('habitaciones.search');
route::post('/habitaciones/update/{hab_id}','HabitacionesController@update')->name('habitaciones.update');
route::get('/habitaciones/liberar/{hab_id}','HabitacionesController@liberar')->name('habitaciones.liberar');
route::post('/habitaciones/liberarup','HabitacionesController@liberarup')->name('habitaciones.liberarup');



Route::get('/clientes','ClientesController@index')->name('clientes');
route::post('/clientes/search','clientesController@search')->name('clientes.search');
Route::get('/clientes/create','ClientesController@create')->name('clientes.create');
Route::post('/clientes/store','clientesController@store')->name('clientes.store');
Route::get('/clientes/edit/{cli_id}','ClientesController@edit')->name('clientes.edit');
route::post('/clientes/update/{cli_id}','ClientesController@update')->name('clientes.update');
Route::post('/clientes/destroy/{cli_id}','ClientesController@destroy')->name('clientes.destroy');

Route::get('/reservaciones/create/{hab_id}','ReservacionesController@create')->name('reservaciones.create');
route::post('/reservaciones/store','ReservacionesController@store')->name('reservaciones.store');
Route::get('/reservaciones/edit/{hab_id}','ReservacionesController@edit')->name('reservaciones.edit');
Route::post('/reservaciones/update/','ReservacionesController@update')->name('reservaciones.update');
