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
    	'keyword',
    	'story',
    	'path',
    	'subtitle',
    	'poster',
    	'uploaded_by',
    	'views',
    	'published',
    ];
}
