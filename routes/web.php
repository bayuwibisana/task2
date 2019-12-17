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

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/gaji', function () {
//     $name = 'gaji';
//     return view('gaji',['name'=>$name]);
// });


Route::get('/', 'HomeController@gaji');
Route::get('/gaji', 'HomeController@gaji');
Route::post('/get_gaji', 'HomeController@get_gaji');
Route::post('/gaji/add', 'HomeController@post');
