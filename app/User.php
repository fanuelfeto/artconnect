<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

   protected $table = 'users';
   protected $primaryKey = 'id';
   protected $perPage = 25;

   public $incrementing = true;
   public $timestamps = true;

   protected $guarded = [];

   protected $hidden = [
    'password','activation_token','remember_token',
   ];

   public function role(){
    return $this->hasOne('App\Role');
   }
}
