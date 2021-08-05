<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = "orders";
	protected $primaryKey = "id";
	protected $perPage = 25;

	public $incrementing = true;
	public $timestamps = true;

	protected $guarded = [];

	public function orderItem()
	{
		return $this->hasMany('App\OrderItem');
	}
}
