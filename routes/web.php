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
Route::get('create/database', 'DataBaseController@create');

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin/products'], function(){
    Route::get('', 'ProductController@index')->name('product.index');
    Route::get('create', 'ProductController@create')->name('product.create');
    Route::post('store', 'ProductController@store')->name('product.store');
    Route::get('edit/{product}', 'ProductController@edit')->name('product.edit');
    Route::post('update/{product}', 'ProductController@update')->name('product.update');
    Route::post('delete/{product}', 'ProductController@destroy')->name('product.destroy');
    Route::get('show/{product}', 'ProductController@show')->name('product.show');
 });

 Route::get('/', 'FrontController@home')->name('front.home');
 Route::post('add', 'FrontController@add')->name('front.add');
Route::post('remove', 'FrontController@remove')->name('front.remove');

Route::resource('category', 'CategoryController');

Route::post('add-js', 'FrontController@addJs')->name('front.add-js');


Route::post('add-js', 'FrontController@addJs')->name('front.add-js');

 
Route::group(['prefix' => 'categories'], function(){
    Route::get('', 'CategoryController@index')->name('category.index');
    Route::get('create', 'CategoryController@create')->name('category.create');
    Route::post('store', 'CategoryController@store')->name('category.store');
    Route::get('edit/{category}', 'CategoryController@edit')->name('category.edit');
    Route::post('update/{category}', 'CategoryController@update')->name('category.update');
    Route::post('delete/{category}', 'CategoryController@destroy')->name('category.destroy');
 });

  
Route::group(['prefix' => 'tags'], function(){
    Route::get('', 'TagController@index')->name('tag.index');
    Route::get('create', 'TagController@create')->name('tag.create');
    Route::post('store', 'TagController@store')->name('tag.store');
    Route::get('edit/{tag}', 'TagController@edit')->name('tag.edit');
    Route::post('update/{tag}', 'TagController@update')->name('tag.update');
    Route::post('delete/{tag}', 'TagController@destroy')->name('tag.destroy');
 });

 Route::group(['prefix' => 'customers'], function(){
    Route::get('', 'CustomerController@index')->name('customer.index');
    Route::get('create', 'CustomerController@create')->name('customer.create');
    Route::post('store', 'CustomerController@store')->name('customer.store');
    Route::get('edit/{customer}', 'CustomerController@edit')->name('customer.edit');
    Route::post('update/{customer}', 'CustomerController@update')->name('customer.update');
    Route::post('delete/{customer}', 'CustomerController@destroy')->name('customer.destroy');
    Route::get('show/{customer}', 'CustomerController@show')->name('customer.show');
 });
 
