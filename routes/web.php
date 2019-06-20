<?php

Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@store');

//Route::get('/', static function () {
//    $treatments = \App\Treatment::all();
//    $availabilities = \App\Availability::all();
//    return view('layouts.default', compact('treatments', 'availabilities'));
//});
//
//Route::post('/', static function(\App\Http\Requests\BookFormRequest $request){
//    var_dump($request);exit;
//    \App\Appointment::create($request);
//});

Auth::routes();

Route::group(['middleware' => 'auth',], static function() {
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
