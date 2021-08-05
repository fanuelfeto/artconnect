<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempuser extends Model
{
    protected $table = "temp_user";
    protected $primaryKey = "id";
    protected $perPage = 25;

    public $incrementing = true;
    public $timestamps = true;

    protected $guarded = [];

    protected $fillable = ['name','email','phone_number','address'];
    
}
