<?php

// Illuminate/Routing/Router.php - User Register Disable/Enable
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('logout','Auth\LoginController@logout');

// Admin Authentication Routes...
Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

// Password Password Reset Routes...
Route::post('admin/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/reset', 'Auth\AdminResetPasswordController@reset');
Route::get('admin/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');


Route::group(['middleware'=>'auth:admin'], function() {
    // Admin Home routes
    Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

    /* For MovieShow */
    Route::get('users/getDataTable','UserController@getDataTable');
    Route::resource('users', 'UserController');
});


