<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class FtpController extends Controller
{
    public function ftp(){
    	$path = 'fs1/movies/bollywood/1990/';
    	echo '<pre>';
    	if (Storage::disk('ftp')->exists($path)){
    		$data = Storage::disk('ftp')->directories($path);
    		foreach ($data as $value) {

	    		$dir = explode("/",$value);
	    		$movie = end($dir);
	    		$tmp = Storage::disk('ftp')->files($value);
    			
    			var_dump(Storage::disk('public')->get('movies/hollywood/1994/Ace_Ventura_-_Pet_Detective.png'));
    		}
    	}
    	
    	
    	
    }
}
