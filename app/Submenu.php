<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $fillable = [
    	'menu_name',
    	'drive',
    	'position',
    	'visible',
    	'main_menu'
    ];

    public function mainmenu(){
    	return $this->belongsTo(Menu::class,'main_menu');
    }

    public function movies(){
        return $this->hasMany(Movie::class,'category');
    }
}
