<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shout extends Model
{
    protected $fillable = [
    	'username','user_ip','message','replay'
    ];
}
