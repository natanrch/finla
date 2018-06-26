<?php

Route::post('/form', 'EntryController@form');
Route::post('/add', 'EntryController@addEntry');
Route::get('/list', 'EntryController@list');
Route::get('/choose-entry', 'EntryController@chooseEntry');