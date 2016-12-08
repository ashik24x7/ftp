<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
    	'menu_name',
    	'position',
    	'visible'
    ];
}
