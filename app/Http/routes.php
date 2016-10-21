<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('computer', 'ComputerController@index');
Route::get('computer/create','ComputerController@create');
Route::post('computer','ComputerController@store');
Route::get('computer/{id}','ComputerController@show');
Route::get('computer/{id}/edit','ComputerController@edit');
Route::put('computer/{id}','ComputerController@update');
Route::delete('computer/{id}','ComputerController@destroy');
//Agrega un cliente a la computadora (ambos deben existir)
Route::put('computer/{id}/client/{idClient}','ComputerController@addClientToComputer');

Route::get('monitor', 'MonitorController@index');
Route::get('monitor/create','MonitorController@create');
Route::post('monitor','MonitorController@store');
Route::get('monitor/{id}','MonitorController@show');
Route::get('monitor/{id}/edit','MonitorController@edit');
Route::put('monitor/{id}','MonitorController@update');
Route::delete('monitor/{id}','MonitorController@destroy');
//Agrega un cliente al monitor (ambos deben existir)
Route::put('monitor/{id}/client/{idClient}','MonitorController@addMonitorToClient');

Route::get('client', 'ClientController@index');
Route::get('client/create','ClientController@create');
Route::post('client','ClientController@store');
Route::get('client/{id}','ClientController@show');
Route::get('client/{id}/edit','ClientController@edit');
Route::put('client/{id}','ClientController@update');
Route::delete('client/{id}','ClientController@destroy');
//Listado de todas las computadoras enlazadas al id de cliente
Route::get('client/{id}/computer','ClientController@showClientComputer');
//Listado de todas los monitores enlazados al id de cliente
Route::get('client/{id}/monitor','ClientController@showClientMonitor');

Route::group(['middleware' => ['api','cors'],'prefix' => 'api'], function () {
    Route::post('register', 'APIController@register');
    Route::post('login', 'APIController@login');
    Route::group(['middleware' => 'jwt-auth'], function () {
  	   Route::post('get_user_details', 'APIController@get_user_details');
    });
});
