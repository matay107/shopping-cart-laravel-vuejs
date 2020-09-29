<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/product/list', 'App\Http\Controllers\Api\ProductController@index');
Route::get('/product/{id}', 'App\Http\Controllers\Api\ProductController@get');
Route::post('/cart/add', 'App\Http\Controllers\Api\CartController@add');
Route::get('/cart/sum', 'App\Http\Controllers\Api\CartController@sumCart');
Route::get('/cart', 'App\Http\Controllers\Api\CartController@getAll');
