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
// Home
Route::get('/','HomeController@index')->name('index');

// Customers
Route::get('/customers','CustomersController@index')->name('customers.index')->middleware('auth');
Route::get('/customer/{id}','CustomersController@details')->name('customer.details')->middleware('auth');
Route::get('/customer/create', 'CustomersController@create')->name('customer.create')->middleware('auth');
Route::post('/customer/store', 'CustomersController@store')->name('customer.store');


// employees
Route::get('/employees','HomeController@employees')->name('employees.index')->middleware('auth');
Route::get('/employee','HomeController@employee')->name('employees.details')->middleware('auth');

// orders
Route::get('/orders','HomeController@orders')->name('orders.index')->middleware('auth');
Route::get('/order','HomeController@order')->name('orders.details')->middleware('auth');

// products
Route::get('/products','HomeController@products')->name('products.index')->middleware('auth');

// riders
Route::get('/riders','HomeController@riders')->name('riders.index')->middleware('auth');
Route::get('/rider','HomeController@rider')->name('riders.details')->middleware('auth');

// suppliers
Route::get('/suppliers','HomeController@suppliers')->name('suppliers.index')->middleware('auth');
Route::get('/supplier','HomeController@supplier')->name('suppliers.details')->middleware('auth');

// auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
