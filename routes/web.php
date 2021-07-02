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
	Route::get('editHighlight/{id}','AdminController@showEditHighlightForm')->name('showEditHighlightForm');
	Route::post('updateHighlight','AdminController@updateHighlight')->name('updateHighlight');
	Route::get('deleteHighlight/{id}','AdminController@deleteHighlight')->name('deleteHighlight');
	Route::get('highlightDetails/{id}','AdminController@highlightDetails')->name('highlightDetails');


	Route::get('collections/home_accessories','AdminController@showHomeAccessories')->name('showHomeAccessories');
	Route::get('collections/home_accessories/showHomeAccessoriesForm','AdminController@showHomeAccessoriesForm')->name('showHomeAccessoriesForm');
	Route::post('collection/createHomeAccessories','AdminController@createHomeAccessories')->name('createHomeAccessories');
	Route::get('collections/home_accessories/showHomeAccessoriesEditForm/{id}','AdminController@showHomeAccessoriesEditForm')->name('showHomeAccessoriesEditForm');
	Route::post('collections/updateHomeAccessories','AdminController@updateHomeAccessories')->name('updateHomeAccessories');


	Route::get('collections/furniture','AdminController@showFurniture')->name('showFurniture');
	Route::get('collection/furniture/showFunitureForm','AdminController@showFurnitureForm')->name('showFurnitureForm');
	Route::post('collection/createFurniture','AdminController@createFurniture')->name('createFurniture');

});


