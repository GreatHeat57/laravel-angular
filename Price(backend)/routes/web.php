<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index');

Route::get('2fa', 'TwoFactorController@showTwoFactorForm');
Route::post('2fa', 'TwoFactorController@verifyTwoFactor');

Route::resource('feed-config', 'FeedConfigController');
Route::post('/feed-config/get-exam-feed', 'FeedConfigController@getExamFeed');
Route::post('/feed-config/get-feed-list', 'FeedConfigController@getFeedList');

Route::resource('category-config', 'CategoryConfigController');
Route::post('/category-config/get-category-list', 'CategoryConfigController@getCategoryList');

Route::get('/import-feeds', 'ImportFeedController@index');
Route::get('/importing-feeds', 'ImportFeedController@importingFeed');

//ng route
Route::get('/get-category-names', 'GetDataForNgController@getCategoryNames');
Route::post('/get-search-items', 'GetDataForNgController@getSearchItembyId');
Route::post('/get-location-items', 'GetDataForNgController@getLocationItembyLocations');
Route::post('/get-service-data', 'GetDataForNgController@getServiceData');
Route::post('/get-detail-data', 'GetDataForNgController@getDetailData');
