<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
    	'title',
    	'year',
    	'api_id',
    	'quality',
    	'category',
    	'trailer',
    	'rating',
    	'genre',
    	'release_date',
    	'language',
    	'website',
        'time',
    	'size',
    	'keyword',
    	'story',
    	'path',
    	'subtitle',
        'poster',
    	'cast',
    	'uploaded_by',
    	'views',
    	'published',
    ];

    public function category_name(){
        return $this->belongsTo('App\Submenu','category');
    }
}
