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

    public function submenu(){
    	return $this->hasMany(Submenu::class,'main_menu');
    }
}
