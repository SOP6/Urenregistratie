<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $table = 'logs';
    protected $fillable = ['hours' , 'work_description' , 'user_id'];
}
