<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use Notifiable;

    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $perPage = 25;

    public $incrementing = true;
    public $timestamps = true;

    protected $guarded = [];

    public function user(){
    	return $this->hasMany('App\User');
    }
}
