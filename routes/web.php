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

Route::get('/', function () {
    return view('front.index');
});

Route::get('/about', function () {
    return view('front.about');
});

Route::get('/contacts', function () {
    return view('front.contacts');
});

Route::name('csm.')->group(function () {
    Route::prefix('cms')->group(function () {
        Route::resources([
            'projects' => 'Projects\ProjectsController',
        ]);
        Route::post('/check', 'CheckController@index')->name('checkAll');
        Route::post('/check/{id}', 'CheckController@checkOne')->name('checkID');
        Route::get('/users', 'UsersViberController@index')->name('users');
    });
});
Route::get('/viber', 'ConnectController@connect');
Route::post('/vb', 'Api\ViberController@getMessage');
