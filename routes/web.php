<?php

Route::get('/', 'HomeController@index');
Route::get('/categorie/{categorySlug}', 'CategoryController@index');

Route::get('calendar', 'CalendarController@index');
