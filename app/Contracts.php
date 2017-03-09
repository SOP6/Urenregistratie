<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    protected $fillable = ["effective_date", "expire_date" , "user_id"];
}
