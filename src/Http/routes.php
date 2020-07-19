<?php

use Illuminate\Support\Facades\Route;

Route::post('operations', 'UdsController@createTransaction');
Route::post('operations/{id}/refund', 'UdsController@refundTransaction');
Route::post('operations/calc', 'UdsController@getTransactionInformation');

Route::get('customers/find', 'UdsController@customersFind');
Route::get('customers/{id}', 'UdsController@customers');

Route::get('settings', 'UdsController@settings');
