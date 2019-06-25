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

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/', 'Backend\BackendController@index');
Route::get('/firebase','FirebaseController@index');
Route::get('/pHJson','Backend\BackendController@pHJson');
Route::get('/StatusJson','Backend\BackendController@StatusJson');
Route::get('remote-device','Backend\BackendController@remotedevice');
Route::post('status-remote','Backend\BackendController@statusremote');