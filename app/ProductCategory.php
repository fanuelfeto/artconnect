<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
	protected $table = "product_categories";
	protected $primaryKey = "id";
	protected $perPage = 25;

	public $incrementing = true;
	public $timestamps = true;

	protected $guarded = [];

	public function product()
	{
		return $this->hasMany('App\Product');
	}
}
