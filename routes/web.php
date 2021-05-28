<?php

use Illuminate\Support\Facades\Route;


Route::get('','AdminController@index')->name('index');
Route::get('highlights','AdminController@highlights')->name('highlights');
		


