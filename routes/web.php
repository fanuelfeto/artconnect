<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {

	/* Dashboard Section */
	Route::get('dashboard','AdminController@dashboard')->name('dashboard');

	/* Auth Section | Login | Logout | Register */
	Route::get('login','AdminAuthController@showLoginForm')->name('login');
	Route::post('post-login','AdminAuthController@login');
	Route::post('logout','AdminAuthController@logout')->name('logout');
	Route::get('register','AdminAuthController@showRegisterForm')->name('showRegisterForm');
	Route::post('register','AdminAuthController@register')->name('register');


	Route::get('highlights','AdminController@showHighlights')->name('highlights');
	Route::get('showHighlightsForm','AdminController@showHighlightsForm')->name('showHighlightsForm');
	Route::post('createHighlights','AdminController@createHighlights')->name('createHighlights');
});


