<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $fillable = [
    	'name', 'folder_name', 'category', 'platform', 'size', 'cover', 'views', 'path', 'requirement', 'added_by'
    ];

    public function category_name(){
        return $this->belongsTo('App\Submenu','category');
    }
}
