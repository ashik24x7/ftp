<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Software;
use App\Game;
use App\Menu;
use App\Shout;
use App\Episode;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $data['menu'] = Menu::with(['submenu'])->get();
        $data['movies'] = Movie::with(['category_name'])->orderBy('id','DESC')->paginate(18);
        $data['episodes'] = Episode::with(['category_name','tvseries'])->orderBy('id','DESC')->paginate(6);
    	$data['softwares'] = Software::with(['category_name'])->orderBy('id','DESC')->paginate(18);
        $data['games'] = Game::with(['category_name'])->orderBy('id','DESC')->paginate(18);
    	return view('home.home',$data);
    }

    public function allMovies()
    {
        $data['menu'] = Menu::with(['submenu'])->get();
        $data['movies'] = Movie::with(['category_name'])->orderBy('id','DESC')->paginate(42);
        return view('home.all-movies',$data);
    }
    
    public function shout(Request $request){

        $this->validate($request,[
            'username' => 'required',
            'message' => 'required',
        ]);
        if(DB::table('shouts')->count() > 100){
            DB::table('shouts')->odrderBy('id','DESC')->skip(100)->delete();
        }
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


    public function allSoftwares(){
        $data['menu'] = Menu::with(['submenu'])->get();
        $data['movies'] = Movie::with(['category_name'])->orderBy('id','DESC')->paginate(42);
        return view('home.all-softwares',$data);
    }
}
