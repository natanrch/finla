<?php

Route::post('/add-entry', 'EarningsController@form');
Route::post('/add', 'EarningsController@addEntry');
Route::get('/list', 'EarningsController@list');
Route::get('/choose', 'EarningsController@choose');