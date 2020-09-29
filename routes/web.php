<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/view/{id}','App\Http\Controllers\ProductController@viewProduct');
Route::get('/book','App\Http\Controllers\ProductController@book');

Route::get('/cart/list','App\Http\Controllers\CartController@list');
