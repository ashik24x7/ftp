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

    	$date = \Carbon\Carbon::today()->subDays(7);
		$data['menu'] = Menu::with(['submenu'])->get();
        $data['movies'] = Movie::with(['category_name'])->orderBy('created_at','DESC')->where('published',1)->paginate(12);
        $data['most_popular_movies'] = Movie::with(['category_name'])->where('published',1)->where('created_at', '>=', $date)->orderBy('views','DESC')->paginate(6);
        

        $data['tvseries'] = Tvseries::with(['category_name'])->orderBy('created_at','DESC')->paginate(12);
        $data['episodes'] = Episode::with(['category_name','tvseries'])->orderBy('id','DESC')->paginate(12);
    	$data['softwares'] = Software::with(['category_name'])->orderBy('id','DESC')->paginate(18);
        $data['games'] = Game::with(['category_name'])->orderBy('id','DESC')->paginate(4);

		$data['total_movies'] = Movie::count();
		$data['total_tvseries'] = Tvseries::count();
		$data['total_episodes'] = Episode::count();
		$data['total_softwares'] = Software::count();
		$data['total_games'] = Game::count();
    	return view('home.home',$data);
    }
	public function main()
    {
		$data['menu'] = Menu::with(['submenu'])->get();
        $data['movies'] = Movie::with(['category_name'])->orderBy('created_at','DESC')->where('published',1)->paginate(18);
        $data['episodes'] = Episode::with(['category_name','tvseries'])->orderBy('id','DESC')->paginate(6);
    	$data['softwares'] = Software::with(['category_name'])->orderBy('id','DESC')->paginate(18);
        $data['games'] = Game::with(['category_name'])->orderBy('id','DESC')->paginate(4);
		
		$data['total_movies'] = Movie::count();
		$data['total_tvseries'] = Tvseries::count();
		$data['total_episodes'] = Episode::count();
		$data['total_softwares'] = Software::count();
		$data['total_games'] = Game::count();
    	return view('home.main',$data);
    }


    public function filter($str, $key = "",$value = "",$order = ""){
		
        $str = str_replace('-', ' ', $str);
		$data['category'] = $str;
        $category = Submenu::with(['mainmenu'])->where('menu_name','like',"%$str%")->first();
        $filter = strtolower($category->mainmenu->menu_name);
		
		if(!empty($order) && $order == "asc"){
			$data['order'] = "desc";
		}elseif(!empty($order) && $order == "desc"){
			$data['order'] = "asc";
		}else{
			$data['order'] = "desc";
			$order = "desc";
		}

        $data['url'] = '/filter/'.$str;
        $data['menu'] = Menu::with(['submenu'])->get();
		$data['years'] =  Movie::where('category','=',$category->id)->groupBy('year')->pluck('year');
		$data['ratings'] =  Movie::where('category','=',$category->id)->groupBy('rating')->pluck('rating');
		$data['qualitys'] =  Movie::where('category','=',$category->id)->groupBy('quality')->pluck('quality');
		$result_genre =  Movie::where('category','=',$category->id)->groupBy('genre')->pluck('genre');
		$result_genre =  str_replace('"','',$result_genre);
		$genre =  explode(',',$result_genre);
		$data['genres'] = [];
		foreach($genre as $genre_key){
			if($genre_key != "["){
				$data['genres'][] = str_replace(']','',$genre_key);
			}
		}
		$data['genres'] = array_unique($data['genres']);

		if(!empty($order) && $order == "asc"){
			$data['order'] = "desc";
		}elseif(!empty($order) && $order == "desc"){
			$data['order'] = "asc";
		}else{
			$data['order'] = "desc";
			$order = "desc";
		}
		
        if(strpos($filter,'mov') !== false){
			if(!empty($key) && !empty($value)){
				$data['movies'] = Movie::with(['category_name'])->where([['category','=',$category->id],[$key,'like','%'.$value.'%']])->orderBy('id',$order)->where('published',1)->paginate(42);
				
				$data['total_movies'] = Movie::with(['category_name'])->where([['category','=',$category->id],[$key,'like','%'.$value.'%']])->count();
				$data['sort'] = ucfirst($key).' [ '.ucfirst($value).' ]';
			}else{
				$data['movies'] = Movie::with(['category_name'])->where('category','=',$category->id)->orderBy('id','DESC')->where('published',1)->paginate(42);
				
				$data['total_movies'] = Movie::with(['category_name'])->where('category','=',$category->id)->count();
			}
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
        //if(DB::table('shouts')->count() > 100){
            //DB::table('shouts')->odrderBy('id','DESC')->skip(100)->delete();
        //}
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
	
	public function shoutReply(Request $request){
		$this->validate($request,[
			'id' => 'required',
			'reply' => 'required'
		]);
		
		$shout = Shout::find($request->id);
		$shout->reply = $request->reply;
		
		if($shout->save()){
			return redirect()->to('/admin/home');
		}else{
			return redirect()->to('/admin/home')->with('messages','There is an error in Reply');
		}
	}
	public function shoutDelete($id){
		$shout = Shout::find($id);
		
		if($shout->delete()){
			return redirect()->to('/admin/home');
		}else{
			return redirect()->to('/admin/home')->with('messages','There is an error While Delete');
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
