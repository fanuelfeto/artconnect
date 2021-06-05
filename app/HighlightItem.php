<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HighlightItem extends Model
{
    protected $table = "highlight_items";
    protected $primaryKey = "id";
    protected $perPage = 25;

    public $incrementing = true;
    public $timestamps = true;

    protected $guarded = [];

}