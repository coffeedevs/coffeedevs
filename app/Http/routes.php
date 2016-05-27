<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['namespace' => 'Web'], function () {
    Route::get('/', 'HomeController@index')->name('web.home');
    Route::post('contact', 'ContactController@contact')->name('web.mail');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('password', 'HomeController@changePassword')->name('admin.password.change');
    Route::post('password', 'HomeController@postPassword')->name('admin.password.change');
    Route::resource('projects', 'ProjectsController');
});

Route::auth();