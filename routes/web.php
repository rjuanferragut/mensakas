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

Route::get('/adminpanel', function () {
    return view('adminpanel');
});
Route::get('/userpanel', function () {
    return view('userpanel');
});
Route::get('/businesspanel', function () {
    return view('businesspanel');
});
Route::get('/menuspanel', function () {
    return view('menuspanel');
});
Route::get('/orderspanel', function () {
    return view('orderspanel');
});
Route::get('/deliverspanel', function () {
    return view('deliverspanel');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
