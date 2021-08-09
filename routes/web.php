<?php

use Illuminate\Support\Facades\Route;

Route::get('',function(){
	return redirect()->route('dashboard');
});

Route::get('dashboard','UserPageController@dashboard')->name('dashboard');

Route::get('login','UserAuthController@showLoginForm')->name('login');


Route::get('home_accessories_catalogue','UserPageController@showHomeAccessoriesCatalogue')->name('showHomeAccessoriesCatalogue');
Route::get('home_accessories_catalogue/details/{id}','UserPageController@homeAccessoriesCatalogueDetails')->name('homeAccessoriesCatalogueDetails');

Route::get('highlights_catalogue','UserPageController@showHighlightsCatalogue')->name('showHighlightsCatalogue');

Route::post('cart','CartController@addtoCart')->name('addtoCart');
Route::get('cart','CartController@listCart')->name('listCart');
Route::post('cart/update','CartController@updateCart')->name('updateCart');
Route::get('cart/delete','CartController@deleteCart')->name('deleteCart');
Route::get('cart/payment_form','CartController@showPaymentForm')->name('showPaymentForm');
Route::post('cart/create_payment_form','CartController@createPaymentForm')->name('createPaymentForm');

Route::get('upload-payment','PaymentController@index')->name('payment.index');
Route::post('check-order','PaymentController@checkOrder')->name('payment.checkOrder');
Route::get('upload-payment/{order_id}','PaymentController@showUploadPaymentForm')->name('payment.showUploadPaymentForm');
Route::post('upload-payment/','PaymentController@uploadPayment')->name('payment.uploadPayment');
Route::post('cancel-order/','PaymentController@cancelOrder')->name('payment.cancelOrder');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {

	/* Dashboard Section */
	Route::get('dashboard','AdminController@dashboard')->name('dashboard');

	/* Product Section */
	Route::prefix('product')->name('product.')->group(function() {
		Route::get('', function() {
			return redirect()->route('admin.product.index');
		});
		Route::get('all','AdminProductController@index')->name('index');
		Route::get('home-accessories','AdminProductController@showHomeAccessories')->name('showHomeAccessories');
		Route::get('furnitures','AdminProductController@showFurnitures')->name('showFurnitures');
		Route::get('paintings','AdminProductController@showPaintings')->name('showPaintings');
		Route::get('scultures','AdminProductController@showSculptures')->name('showSculptures');
		
		Route::get('create','AdminProductController@showCreateForm')->name('showCreateForm');
		Route::post('create','AdminProductController@create')->name('create');

		Route::get('edit/{id}','AdminProductController@showEditForm')->name('showEditForm');
		Route::post('update','AdminProductController@update')->name('update');
		Route::post('delete','AdminProductController@delete')->name('delete');
	});

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
});
