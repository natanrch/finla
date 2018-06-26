<?php

Route::get('/add-entry', 'EarningsController@form');
Route::post('/add', 'EarningsController@addEntry');
Route::get('/list', 'EarningsController@list');