<?php

Route::get('/', 'StaticController@mainPage');
Route::get('/details', 'StaticController@details');
Route::post('/form', 'EntryController@form');
Route::post('/add', 'EntryController@addEntry');
Route::get('earnings', 'EntryController@listTotalEarnings');
Route::get('expenses', 'EntryController@listTotalExpenses');
Route::get('/choose-entry', 'EntryController@chooseEntry');
Route::post('/list-month', 'EntryController@listMonth');
Route::get('/choose-category', 'CategoryController@choose');
Route::post('/form-category', 'CategoryController@form');
Route::post('/save-category', 'CategoryController@save');
Route::get('/discounts', 'DiscountController@main');
Route::post('/save-discount', 'DiscountController@save');	