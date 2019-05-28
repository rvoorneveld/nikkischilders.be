<?php
    return view('welcome');
Route::get('/', static function () {
});

Auth::routes();

Route::group(['middleware' => 'auth',], function() {
    Route::get('/appointments', 'AppointmentsController@index')->name('appointments');
    Route::get('/appointments/create', 'AppointmentsController@create')->name('appointments.create');
    Route::get('/appointments/{appointment}', 'AppointmentsController@edit');
    Route::post('/appointments', 'AppointmentsController@store');
    Route::put('appointments/{appointment}', 'AppointmentsController@update');

    Route::get('/availabilities', 'AvailabilitiesController@index')->name('availabilities');
    Route::get('/availabilities/create', 'AvailabilitiesController@create')->name('availabilities.create');
    Route::get('/availabilities/{availability}', 'AvailabilitiesController@edit');
    Route::post('/availabilities', 'AvailabilitiesController@store');
    Route::put('availabilities/{availability}', 'AvailabilitiesController@update');

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
});
