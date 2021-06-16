<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'customers'], function() {
        Route::post('/','CustomerController@createCustomer');
        Route::put('/{id}', 'CustomerController@updateCustomer');
        Route::delete('/{id}', 'CustomerController@deleteCustomer');
        Route::get('/', 'CustomerController@getAllCustomers');
        Route::get('/{id}', 'CustomerController@getCustomers');
});

Route::group(['prefix' => 'jobs'], function() {
    Route::get('/jobs', function ($id) {
        Route::post('/jobs','JobController@createJob');
        Route::put('/{id}', 'JobController@updateJob');
        Route::delete('/{id}', 'JobController@deleteJob');
        Route::get('/', 'JobController@getAllJobs');
        Route::get('/{id}', 'JobController@getJob');
    });
});