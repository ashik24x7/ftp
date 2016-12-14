<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class HomeController extends Controller
{
    public function index()
    {
    	$data['movies'] = Movie::with(['category_name'])->get();
    	return view('home.home',$data);
    }
}
