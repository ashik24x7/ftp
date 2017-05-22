<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = [
    	'quality',
    	'category',
    	'tvseries_id',
    	'size',
    	'path',
    	'episode',
    	'views',
    	'published',
    	'uploaded_by',
    	'season'
    ];
	
	protected $dates = [
        'release_date'
    ];

    public function category_name(){
        return $this->belongsTo('App\Submenu','category');
    }
    public function tvseries(){
        return $this->belongsTo('App\Tvseries','tvseries_id');
    }

}
