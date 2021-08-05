<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
	protected $table = "order_items";
	protected $primaryKey = "id";
	protected $perPage = 25;

	public $incrementing = true;
	public $timestamps = true;

	protected $guarded = [];

	public function order()
	{
		return $this->belongsTo('App\Order');
	}

	public function collectionItem()
	{
		return $this->belongsTo('App\CollectionItem');
	}
}
