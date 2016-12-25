<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
    	'name', 'category', 'platform', 'size', 'cover', 'trailer', 'views', 'path', 'details', 'added_by'
    ];

    public function category_name(){
        return $this->belongsTo('App\Submenu','category');
    }
}
