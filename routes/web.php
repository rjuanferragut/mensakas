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
// administration & index
Route::get('/','Panelcontroller@index')->name('index');

Route::get('/dashboard','Panelcontroller@dashboard')->name('dashboard')->middleware('auth');

// customers

Route::get('/customers','Panelcontroller@customers')->name('customers.index')->middleware('auth');
Route::get('/customer','Panelcontroller@customer')->name('customers.details')->middleware('auth');

// employees
Route::get('/employees','Panelcontroller@employees')->name('employees.index')->middleware('auth');
Route::get('/employee','Panelcontroller@employee')->name('employees.details')->middleware('auth');

// orders
Route::get('/orders','Panelcontroller@orders')->name('orders.index')->middleware('auth');
Route::get('/order','Panelcontroller@order')->name('orders.details')->middleware('auth');

// products
Route::get('/products','Panelcontroller@products')->name('products.index')->middleware('auth');

// riders
Route::get('/riders','Panelcontroller@riders')->name('riders.index')->middleware('auth');
Route::get('/rider','Panelcontroller@rider')->name('riders.details')->middleware('auth');

// suppliers
Route::get('/suppliers','Panelcontroller@suppliers')->name('suppliers.index')->middleware('auth');
Route::get('/supplier','Panelcontroller@supplier')->name('suppliers.details')->middleware('auth');

// auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
