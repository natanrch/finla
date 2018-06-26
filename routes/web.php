<?php

Route::post('/add-entry', 'EntryController@form');
Route::post('/add', 'EntryController@addEntry');
Route::get('/list', 'EntryController@list');
Route::get('/choose-entry', 'EntryController@chooseEntry');