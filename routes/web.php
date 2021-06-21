<?php

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

Route::resource('salida_vehiculo', 'Salida_VehiculoController');
Route::resource('ingreso_vehiculo', 'Ingreso_VehiculoController');
Route::resource('vehiculo', 'VehiculoController');
Route::resource('persona', 'PersonaController');
Route::resource('cliente', 'ClienteController');
Route::resource('usuario', 'UserController');
Route::resource('tipo_vehiculo', 'Tipo_VehiculoController');
Route::resource('tarifa', 'TarifaController');
Route::resource('usuario_role', 'UserRoleController');
Route::resource('role', 'RoleController');

//RUTA PARA LOS REPORTES//
//Route::resource('reportes', 'ReportesController');

Route::get('ingreso_vehiculo/estadovehiculo','Ingreso_VehiculoController@estadovehiculo')->name('estadovehiculo');

Route::get('imprimirVehiculos','PdfController@imprimirVehiculos')->name('PdfController.imprimirVehiculos');
Route::get('imprimirVehiculoEspecifico/{id_vehiculo}','PdfController@imprimirVehiculoEspecifico')->name('PdfController.imprimirVehiculoEspecifico');
Route::get('imprimirIngreso_vehiculos','PdfController@imprimirIngreso_vehiculos')->name('PdfController.imprimirIngreso_vehiculos');
Route::get('imprimirIngresoEspecifico/{id_ingreso}','PdfController@imprimirIngresoEspecifico')->name('PdfController.imprimirIngresoEspecifico');
//Route::get('imprimirSalidaEspecifico/{id_ticket}','PdfController@imprimirSalidaEspecifico')->name('PdfController.imprimirSalidaEspecifico');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('Salida_vehiculos/{placa}/{id_ingreso}/{valor}','Salida_VehiculoController@generarSalida')->name('Salida_vehiculos');

//RUTA PARA EL CONTADOR DE LOS VEHICULOS QUE ESTAN DENTRO DEL PARQUEADERO//
Route::get('Ingreso_vehiculos','Ingreso_VehiculoController@cantidadVehiculos')->name('Ingreso_Vehiculo');

Route::get('imprimirSalida/{id_ingreso}','PdfController@imprimirSalida')->name('imprimirSalida');
Route::get('tarifas_inactivas','TarifaController@estadoTarifas')->name('tarifas_inactivas');

Route::get('imprimirVehiculosRetirados','PdfController@imprimirVehiculosRetirados')->name('imprimirVehiculosRetirados');




//Route::post('logout', 'Auth\LoginController@logout')->name('logout');




// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
