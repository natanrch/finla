<?php

Route::post('/form', 'EntryController@form');
Route::post('/add', 'EntryController@addEntry');
Route::post('/list', 'EntryController@list');
Route::get('/choose-entry', 'EntryController@chooseEntry');
Route::get('/choose-list', 'EntryController@chooseList');