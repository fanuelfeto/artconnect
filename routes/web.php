<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {


	/* Auth Section | Login | Logout | Register */
	Route::get('login','AdminAuthController@showLoginForm')->name('showLoginForm');
	Route::post('login','AdminAuthController@login');
	Route::post('logout','AdminAuthController@logout')->name('logout');
	Route::get('register','AdminAuthController@showRegisterForm')->name('showRegisterForm');
	Route::post('register','AdminAuthController@register')->name('register');
});


