<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = "products";
	protected $primaryKey = "id";
	protected $perPage = 25;

	public $incrementing = true;
	public $timestamps = true;

	protected $guarded = [];

	public function productCategory()
	{
		return $this->belongsTo('App\ProductCategory');
	}

	public function productGallery()
	{
		return $this->hasMany('App\ProductGallery');
	}

	public function orderItem()
	{
		return $this->hasMany('App\OderItem');
	}
}
