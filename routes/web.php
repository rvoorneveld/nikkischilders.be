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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth',], function() {
    Route::get('/customers', 'CustomersController@index')->name('customers');
    Route::get('/customers/create', 'CustomersController@create')->name('customers.create');
    Route::get('/customers/{customer}', 'CustomersController@edit');
    Route::post('/customers', 'CustomersController@store');
    Route::put('customers/{customer}', 'CustomersController@update');

    Route::get('/treatments', 'TreatmentsController@index')->name('treatments');
    Route::get('/treatments/create', 'TreatmentsController@create')->name('treatments.create');
    Route::get('/treatments/{treatment}', 'TreatmentsController@edit');
    Route::post('/treatments', 'TreatmentsController@store');
    Route::put('treatments/{treatment}', 'TreatmentsController@update');

    Route::get('/appointments', 'AppointmentsController@index')->name('appointments');
    Route::get('/appointments/create', 'AppointmentsController@create')->name('appointments.create');
    Route::get('/appointments/{appointment}', 'AppointmentsController@edit');
    Route::post('/appointments', 'AppointmentsController@store');
    Route::put('appointments/{appointment}', 'AppointmentsController@update');
});
