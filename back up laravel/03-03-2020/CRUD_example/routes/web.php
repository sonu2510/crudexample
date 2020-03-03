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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product', 'ProductController@index')->name('product');
Route::get('/add_product', 'ProductController@create')->name('product_create');
Route::get('/product_edit/{id}', 'ProductController@product_edit');
Route::get('/product_delete/{id}', 'ProductController@delete');
Route::post('/store', 'ProductController@store')->name('store');

Route::get('/product/upload_file/{id}', 'ProductController@product_upload_view')->name('product.upload');
//Route::get('image/upload','ProductController@fileCreate');
Route::post('image/upload/store','ProductController@fileStore');
Route::get('image/delete','ProductController@fileDestroy');


/*datatable*/
Route::get('/product/datatable','ProductController@datatable_product')->name('product.datatable');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
