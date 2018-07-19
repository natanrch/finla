<?php

Route::get('/', 'StaticController@mainPage');
Route::get('/details', 'StaticController@details');
Route::post('/add', 'EntryController@addEntry');
Route::get('earnings', 'EntryController@listTotalEarnings');
Route::get('expenses', 'EntryController@listTotalExpenses');
Route::post('/list-month', 'EntryController@listMonth');
Route::get('/categories', 'CategoryController@allCategories');
Route::post('/save-category', 'CategoryController@save');
Route::get('/discounts', 'DiscountController@main');
Route::post('/save-discount', 'DiscountController@save');	
Route::get('/limits', 'LimitController@main');