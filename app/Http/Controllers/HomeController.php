<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Software;
use App\Game;
use App\Menu;
use App\Submenu;
use App\Shout;
use App\Episode;
use App\Tvseries;
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


    public function filter($str){
        $str = str_replace('-', ' ', $str);
        $category = Submenu::with(['mainmenu'])->where('menu_name','like',"%$str%")->first();
        $filter = strtolower($category->mainmenu->menu_name);

        $data['menu'] = Menu::with(['submenu'])->get();

        if(strpos($filter,'mov') !== false){
            $data['movies'] = Movie::with(['category_name'])->where('category','=',$category->id)->orderBy('id','DESC')->paginate(42);
            return view('home.all-movies',$data);
        }elseif(strpos($filter,'tv') !== false){
            $data['tvseries'] = Tvseries::with(['category_name'])->where('category','=',$category->id)->orderBy('id','DESC')->paginate(18);
            return view('home.all-tv-series',$data);
        }elseif(strpos($filter,'gam') !== false){
            $data['games'] = Game::with(['category_name'])->where('category','=',$category->id)->orderBy('id','DESC')->paginate(18);
            return view('home.all-games',$data);
        }elseif(strpos($filter,'soft') !== false){
            $data['softwares'] = Software::with(['category_name'])->where('category','=',$category->id)->orderBy('id','DESC')->paginate(18);

            $data['games'] = Game::with(['category_name'])->orderBy('id','DESC')->paginate(8);
            return view('home.all-softwares',$data);
        }else{
            return redirect()->back();
        }
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

    public function search(Request $request){
        $this->validate($request,[
            'str' => 'required'
        ]);

        $data['movies'] = Movie::with(['category_name'])->where('title','like',"%$request->str%")->orderBy('id','DESC')->paginate(2);
        $data['softwares'] = Software::with(['category_name'])->where('name','like',"%$request->str%")->orderBy('id','DESC')->paginate(2);
        $data['games'] = Game::with(['category_name'])->where('name','like',"%$request->str%")->orderBy('id','DESC')->paginate(2);
        $data['tvseries'] = Tvseries::with(['category_name'])->where('title','like',"%$request->str%")->orderBy('id','DESC')->paginate(2);
        return $data;

    }


    public function allSoftwares(){
        $data['menu'] = Menu::with(['submenu'])->get();
        $data['movies'] = Movie::with(['category_name'])->orderBy('id','DESC')->paginate(42);
        return view('home.all-softwares',$data);
    }
}
