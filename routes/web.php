<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'LandingController@index');
Route::get('/profile', 'ProfileController@index');
Route::get('/soon', 'SoonController@index');

Route::group(["prefix" => "search"], function (){
    Route::get('/', 'SearchController@index');
    Route::post('/best_price', 'SearchController@bestPrice')->name('best_price');
    Route::get('/save_order', 'SearchController@saveOrder');
    Route::get('/get_categories', 'SearchController@getCategories');
    Route::get('/get_subcategories', 'SearchController@getSubcategories');
});

Route::group(["namespace" => "Auth"], function (){
    Route::get('/login', 'LoginController@showForm');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/confirm', 'LoginController@showFormConfirm');
    Route::post('/confirm', 'LoginController@confirm')->name('confirm');
    Route::get("/logout", 'LoginController@logout');
    Route::get('/registration', 'RegisterController@showForm');
    Route::post('/registration', 'RegisterController@register')->name('register');
});

Route::group(["prefix" => "lk"], function (){
   Route::get('/orders', "ProfileController@orders")->middleware('auth');
});

Route::get('/home', 'HomeController@index');
Route::get('/home1', "SearchController@hh")->middleware("auth");

