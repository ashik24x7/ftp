<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Menu;
use App\Shout;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $data['menu'] = Menu::with(['submenu'])->get();
    	$data['movies'] = Movie::with(['category_name'])->orderBy('id','DESC')->paginate(18);
    	return view('home.home',$data);
    }

    public function allMovies()
    {
        $data['menu'] = Menu::with(['submenu'])->get();
        $data['movies'] = Movie::with(['category_name'])->orderBy('id','DESC')->paginate(42);
        return view('home.all-movies',$data);
    }
    public function singleMovie($id)
    {
        $id = str_replace('-', ' ', $id);
        DB::table('movies')->where('title',$id)->increment('views',1);
        $data['menu'] = Menu::with(['submenu'])->get();
        $data['shout'] = Shout::orderBy('created_at','DESC')->paginate(15);
    	$data['movie'] = Movie::with(['category_name'])->where('title',$id)->first();
        return view('home.single-movie',$data);
    }
    public function shout(Request $request){

        $this->validate($request,[
            'username' => 'required',
            'message' => 'required',
        ]);

        $shout = Shout::where([
            ['user_ip','=',$request->ip()],
            ['message','=',$request->message]
        ])->first();

        if(!is_null($shout)){
            return 'You already posted it';
        }

        $data = $request->only('username','message');
        $data['user_ip'] = $request->ip();
        if(Shout::create($data)){
            return 'Successfully posted';
        }else{
            return 'There is an error';
        }

    }
}
