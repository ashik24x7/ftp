<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $fillable = [
    	'menu_name',
    	'position',
    	'visible',
    	'main_menu'
    ];
}
