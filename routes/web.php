<?php

Route::get('/', 'StaticController@mainPage');
Route::get('/details', 'StaticController@details');
Route::post('/form', 'EntryController@form');
Route::post('/add', 'EntryController@addEntry');
Route::post('/list', 'EntryController@listTotal');
Route::get('/choose-entry', 'EntryController@chooseEntry');
Route::get('/choose-list', 'EntryController@chooseList');
Route::post('/list-month', 'EntryController@listMonth');
Route::get('/choose-category', 'CategoryController@choose');
Route::post('/form-category', 'CategoryController@form');
Route::post('/save-category', 'CategoryController@save');
Route::get('/form-discount', 'DiscountController@form');
Route::post('/save-discount', 'DiscountController@save');