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
Route::get('/', 'LandingController@index1');
Route::get('/profile/{id}', 'ProfileController@index');
Route::get('/soon', 'SoonController@index');

Route::group(["prefix" => "search"], function (){
    Route::get('/', 'SearchController@index');
    //Route::post('/best_price', 'SearchController@bestPrice')->name('best_price');
    Route::get('/save_order', 'SearchController@saveOrder');
    Route::post('/save_full_order', 'SearchController@saveFullOrder')->name('save_full_order');
    Route::get('/get_categories', 'SearchController@getCategories');
    Route::get('/get_subcategories', 'SearchController@getSubcategories');
    Route::post('/mini_order', 'SearchController@miniOrder')->name('miniOrder');
});

Route::get('/best_price', 'BestPriceController@index');

Route::group(["namespace" => "Auth"], function (){
    Route::get('/login', 'LoginController@showForm');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/confirm', 'LoginController@showFormConfirm');
    Route::post('/confirm', 'LoginController@confirm')->name('confirm');
    Route::get("/logout", 'LoginController@logout');
    Route::get('/registration', 'RegisterController@showForm');
    Route::post('/registration', 'RegisterController@register')->name('register');
    Route::post('/add_info', 'RegisterController@addInfo')->name('add_info')->middleware("client_auth");
});

Route::get('/orders', "ProfileController@orders")->middleware('client_auth');

Route::get('/test_pay', 'TestPayController@index');
//Route::get('/testing', 'Client\OrderController@deleteOrder');
Route::get('/after_pay', 'Client\OrderController@afterPay');


Route::get('/order/{order}', 'ProfileController@oneOrder')->middleware('client_auth');

Route::post('/accept_offer', 'Client\OrderController@acceptMasterOffer')->name('acceptOffer');

Route::post('/get_modal_order', 'Client\OrderController@getModalOrder');
Route::post('/pay_order', 'Client\OrderController@payOrder')->name('pay_order');
Route::post('/cancel_order', 'Client\OrderController@cancelOrder')->name('cancel_order');
Route::post('close_order', 'Client\OrderController@closeOrder')->name('close_order');
Route::post('escalate_order', 'Client\OrderController@escalateOrder')->name('escalate_order');
Route::post('/confirm_additional_service', 'Client\OrderController@confirmAdditionalService')->name('confirm_additional_service');
Route::post('/cancel_additional_service', 'Client\OrderController@cancelAdditionalService')->name('cancel_additional_service');
Route::get('/check_order_status', 'Client\OrderController@checkOrderStatus');
Route::post('/save_report', 'Client\OrderController@saveReport')->name('save_report');

Route::get('/callback', 'Client\OrderController@callback');

Route::get('/customers', function (){
    return view('for_customers');
});




Route::get('/create', function (){
    return view('order_test');
});


Route::get('/next_step', 'SearchController@nextStepOrder');
Route::get('/prev_step', 'SearchController@prevStepOrder');
Route::get('/test_pubnub', 'TestPubnubController@index');

//Route::get('/master', 'SearchController@getMasters');

