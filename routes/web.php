<?php

Route::get('/register', 'EarningsController@form');
Route::post('/add', 'EarningsController@add');
Route::get('/list', 'EarningsController@list');