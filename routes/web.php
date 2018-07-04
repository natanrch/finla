<?php

Route::get('/', 'StaticController@mainPage');
Route::post('/form', 'EntryController@form');
Route::post('/add', 'EntryController@addEntry');
Route::post('/list', 'EntryController@listTotal');
Route::get('/choose-entry', 'EntryController@chooseEntry');
Route::get('/choose-list', 'EntryController@chooseList');
Route::post('/list-month', 'EntryController@listMonth');
Route::post('/form-category', 'CategoryController@form');
Route::post('/save', 'CategoryController@save');
Route::get('/choose-category', 'CategoryController@choose');