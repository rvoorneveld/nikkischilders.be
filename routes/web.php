<?php

Route::get('/', 'HomeController@index');
Route::get('/categorie/{categorySlug}', 'CategoryController@index');
