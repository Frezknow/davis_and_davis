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
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/methods', [
    'uses' => 'views@methods',
    'as' => 'methods',
]);
Route::get('/about', [
    'uses' => 'views@about',
    'as' => 'about',
]);
Route::get('/products', [
    'uses' => 'views@products',
    'as' => 'products',
]);
Route::get('/article', [
    'uses' => 'views@article',
    'as' => 'article',
]);
Route::get('/articles', [
    'uses' => 'views@articles',
    'as' => 'articles',
]);
Route::get('/go', [
    'uses' => 'views@go',
    'as' => 'go',
]);
Route::post('/createArticle', [
    'uses' => 'functions@createArticle',
    'as' => 'createArticle',
]);
Route::post('/contact', [
    'uses' => 'functions@contact',
    'as' => 'contact',
]);
Route::post('/createBusiness', [
    'uses' => 'functions@createBusiness',
    'as' => 'createBusiness',
]);
Route::get('/contactus', [
    'uses' => 'views@contactus',
    'as' => 'contactus',
]);
Route::get('/lg', [
    'uses' => 'views@lg',
    'as' => 'lg',
]);
Route::post('/updateLeads',[
  'uses'=>'functions@updateLeads',
  'as'=>'updateLeads'
]);
Route::post('/DeleteProduct',[
  'uses'=>'functions@DeleteProduct',
  'as'=>'DeleteProduct'
]);
Route::post('/Affiliate_Link', [
    'uses' => 'functions@add_Product_Listing',
    'as' => 'Affiliate_Link',
]);

Route::post('/lead', [
    'uses' => 'functions@lead',
    'as' => 'lead',
]);
/** All Deleting routes below **/

/** End of Route deleting **/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
