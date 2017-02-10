<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function setPasswordAttribute($pass){

        $this->attributes['password'] = Hash::make($pass);

    }

    protected $fillable = [
        'first_name', 'last_name' , 'email',  'id' , 'role' , 'password',
//        'last_name' , 'email',  'id' , 'role' , 'password',
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
