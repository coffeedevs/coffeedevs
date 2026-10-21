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
    Route::get('/services', 'HomeController@services')->name('web.services');
    Route::get('/locale/{locale}', 'HomeController@locale')->name('web.locale');
    Route::post('contact', 'ContactController@contact')->name('web.mail');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('password', 'HomeController@changePassword')->name('admin.password.edit');
    Route::post('password', 'HomeController@postPassword')->name('admin.password.change');
    Route::resource('projects', 'ProjectsController')->names('admin.projects')->parameters(['projects'=>'id']);
});

Route::get('login', 'Auth\\AuthController@showLoginForm')->name('login');
Route::post('login', 'Auth\\AuthController@login');
Route::post('logout', 'Auth\\AuthController@logout')->name('logout');
Route::get('register', 'Auth\\AuthController@showRegistrationForm');
Route::post('register', 'Auth\\AuthController@register');
Route::get('password/reset', 'Auth\\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\\PasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\\PasswordController@reset')->name('password.update');
