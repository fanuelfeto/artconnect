<?php

use Illuminate\Support\Facades\Route;

Route::get('',function(){
	return redirect()->route('dashboard');
});

Route::get('dashboard','UserPageController@dashboard')->name('dashboard');

Route::get('login','UserAuthController@showLoginForm')->name('login');


Route::get('highlights_catalogue','UserPageController@showHighlightCatalogue')->name('showHighlightCatalogue');

Route::get('home_accessories_catalogue','UserPageController@showHomeAccessoriesCatalogue')->name('showHomeAccessoriesCatalogue');
Route::get('home_accessories_catalogue/details/{id}','UserPageController@homeAccessoriesCatalogueDetails')->name('homeAccessoriesCatalogueDetails');

Route::get('highlights_catalogue','UserPageController@showHighlightsCatalogue')->name('showHighlightsCatalogue');

Route::post('cart','CartController@addtoCart')->name('addtoCart');
Route::get('cart','CartController@listCart')->name('listCart');
Route::post('cart/update','CartController@updateCart')->name('updateCart');
Route::get('cart/delete','CartController@deleteCart')->name('deleteCart');


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
	Route::get('collections/home_accessories/create','AdminController@showHomeAccessoriesForm')->name('showHomeAccessoriesForm');
	Route::post('collection/create','AdminController@createHomeAccessories')->name('createHomeAccessories');
	Route::get('collections/home_accessories/edit/{id}','AdminController@showHomeAccessoriesEditForm')->name('showHomeAccessoriesEditForm');
	Route::post('collections/home_accessories/update','AdminController@updateHomeAccessories')->name('updateHomeAccessories');
	Route::get('collections/home_accessories/delete/{id}','AdminController@deleteHomeAccessories')->name('deleteHomeAccessories');


	Route::get('collections/furniture','AdminController@showFurniture')->name('showFurniture');
	Route::get('collections/furniture/create','AdminController@showFurnitureForm')->name('showFurnitureForm');
	Route::post('collections/furniture/create','AdminController@createFurniture')->name('createFurniture');
	Route::get('collections/furniture/edit/{id}','AdminController@showFurnitureEditForm')->name('showFurnitureEditForm');
	Route::post('collections/furniture/update','AdminController@updateFurniture')->name('updateFurniture');
	Route::get('collections/delete/{id}','AdminController@deleteFurniture')->name('deleteFurniture');

	Route::get('collections/paintings','AdminController@showPaintings')->name('showPaintings');
	Route::get('collections/paintings/create','AdminController@showPaintingsForm')->name('showPaintingsForm');
	Route::post('collections/paintings/create','AdminController@createPaintings')->name('createPaintings');
	Route::get('collections/paintings/edit/{id}','AdminController@showPaintingsEditForm')->name('showPaintingsEditForm');
	Route::post('collections/paintings/update','AdminController@updatePaintings')->name('updatePaintings');
	Route::get('collections/paintings/delete/{id}','AdminController@deletePaintings')->name('deletePaintings');

	Route::get('collections/sculpture','AdminController@showSculpture')->name('showSculpture');
	Route::get('collections/sculpture/create','AdminController@showSculptureForm')->name('showSculptureForm');
	Route::post('collections/sculpture/create','AdminController@createSculpture')->name('createSculpture');
	Route::get('collections/sculpture/edit/{id}','AdminController@showSculptureEditForm')->name('showSculptureEditForm');
	Route::post('collections/sculpture/update','AdminController@updateSculpture')->name('updateSculpture');
	Route::get('collections/sculpture/delete/{id}','AdminController@deleteSculpture')->name('deleteSculpture');

});


