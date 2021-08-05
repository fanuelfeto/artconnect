<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectionItem extends Model
{
	protected $table = "collection_items";
	protected $primaryKey = "id";
	protected $perPage = 25;

	public $incrementing = true;
	public $timestamps = true;

	protected $guarded = [];

	protected $fillable = ['name','description','size','price','picture1','picture2','picture3','collection_id'];

	public function collectionItem()
	{
		return $this->belongsTo('App\Collection');
	}

	public function orderItem()
	{
		return $this->hasMany('App\OderItem');
	}
}
