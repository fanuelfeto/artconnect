<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = "collections";
    protected $primaryKey = "id";
    protected $perPage = 25;

    public $incrementing = true;
    public $timestamps = true;

    protected $guarded = [];

    protected $fillable = ['name'];


    public function collectionItem(){

        return $this->hasMany('App\CollectionItem');

    }
}
