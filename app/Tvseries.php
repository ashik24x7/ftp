<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tvseries extends Model
{
    protected $fillable = [
    	'title',
    	'api_id',
    	'category',
    	'trailer',
    	'rating',
    	'genre',
    	'cast',
    	'release_date',
    	'language',
    	'website',
    	'keyword',
    	'story',
    	'poster',
    	'views',
    	'published',
    	'uploaded_by'
    ];

    public function category_name(){
        return $this->belongsTo('App\Submenu','category');
    }

    public function episode(){
        return $this->HasMany('App\Episode','tvseries_id');
    }

}
