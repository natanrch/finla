<?php

Route::get('/', 'StaticController@mainPage');
Route::get('/details', 'EntryController@details');
Route::post('/details', 'EntryController@details');
Route::post('/add', 'EntryController@addEntry');
Route::get('earnings', 'EntryController@listTotalEarnings');
Route::get('expenses', 'EntryController@listTotalExpenses');
Route::get('/categories', 'CategoryController@allCategories');
Route::post('/save-category', 'CategoryController@save');
Route::get('/discounts', 'DiscountController@main');
Route::post('/save-discount', 'DiscountController@save');	
Route::get('/limits', 'LimitController@main');
Route::post('/save-limit', 'LimitController@save');
Route::get('/test', 'LimitController@formMonthLimits');
Route::post('/new-month-limits', 'LimitController@newMonthLimits');

Route::get('/delete-category', 'CategoryController@delete');
Route::get('/delete-entry', 'EntryController@delete');