<?php

Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@store');

Auth::routes();

Route::group(['middleware' => 'auth',], static function() {
    Route::get('/appointments', 'Admin\AppointmentsController@index')->name('appointments');
    Route::get('/appointments/create', 'Admin\AppointmentsController@create')->name('appointments.create');
    Route::get('/appointments/{appointment}', 'Admin\AppointmentsController@edit');
    Route::post('/appointments', 'Admin\AppointmentsController@store');
    Route::put('appointments/{appointment}', 'Admin\AppointmentsController@update');

    Route::get('/availabilities', 'Admin\AvailabilitiesController@index')->name('availabilities');
    Route::get('/availabilities/create', 'Admin\AvailabilitiesController@create')->name('availabilities.create');
    Route::get('/availabilities/{availability}', 'Admin\AvailabilitiesController@edit');
    Route::post('/availabilities', 'Admin\AvailabilitiesController@store');
    Route::put('availabilities/{availability}', 'Admin\AvailabilitiesController@update');

    Route::get('/customers', 'Admin\CustomersController@index')->name('customers');
    Route::get('/customers/create', 'Admin\CustomersController@create')->name('customers.create');
    Route::get('/customers/{customer}', 'Admin\CustomersController@edit');
    Route::post('/customers', 'Admin\CustomersController@store');
    Route::put('customers/{customer}', 'Admin\CustomersController@update');

    Route::get('/treatments', 'Admin\TreatmentsController@index')->name('treatments');
    Route::get('/treatments/create', 'Admin\TreatmentsController@create')->name('treatments.create');
    Route::get('/treatments/{treatment}', 'Admin\TreatmentsController@edit');
    Route::post('/treatments', 'Admin\TreatmentsController@store');
    Route::put('treatments/{treatment}', 'Admin\TreatmentsController@update');
});
