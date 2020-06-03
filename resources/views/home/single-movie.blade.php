<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>E-BOX | {{$movie->title}}</title>
		<meta name="keywords" content="fileserver –">
		<meta name="description" content="fileserver –">
		<meta name="author" content="">
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
	    <link rel="shortcut icon" href="images/favicon.ico">
		    	
		<!-- CSS StyleSheets -->
		<link rel="shortcut icon" href="/home/images/favicon.ico">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&amp;amp;subset=latin,latin-ext">
		<link rel="stylesheet" href="/home/css/font-awesome.min.css">

		<link rel="stylesheet" href="/home/css/prettyPhoto.css">
		<link rel="stylesheet" href="/home/css/slick.css">
		<link rel="stylesheet" href="/home/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="/home/css/style.css">
		<link rel="stylesheet" href="/home/css/responsive.css">
		<!-- Skin style (** you can change the link below with the one you need from skins folder in the css folder **) -->
		<link rel="stylesheet" href="/home/css/skins/default.css">
		<link rel="stylesheet" type="text/css" href="/home/css/chat.css" />

		<link rel="stylesheet" type="text/css" href="/home/css/search.css" />
		<script type="text/javascript" src="http://www.google.com/jsapi"></script>
		<script type="text/javascript" src="/home/js/script-search.js"></script>
		

		<link href="http://vjs.zencdn.net/5.19.2/video-js.css" rel="stylesheet">

	  <!-- If you'd like to support IE8 -->
	  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
		
		
		<script type="text/javascript" src="/home/js/jquery.min.js"></script>
		<style>
		.widget > p{
			font-size:16px;
			padding: 10px;
			padding-bottom: 0;
			margin-bottom:-6px;
		}
		.widget > p >span{
			font-weight:bold;
		}
							
		th, td, caption {
			padding: 5px;
		}
		.hideContent {
		    overflow: hidden;
		    line-height: 1em;
		    height: 2em;
		}

		.showContent {
		    line-height: 1em;
		    height: auto;
		}
	</style>

	<script>
		
	</script>
	

	
	<script src="/home/player/jquery.js"></script>	
	<script src="/home/player/mediaelement-and-player.min.js"></script>
	
	<link rel="stylesheet" href="/home/player/mediaelementplayer.min.css" />
	
	<style>
		
.video-js .vjs-big-play-button{
	top: 50%;
    left: 50%;
    margin-top: -22px;
    margin-left: -45px;
	
}
	</style>
	
	</head>
	<body>
	    <!-- site preloader end -->
	    
	    <div class="pageWrapper fixedPage">

			<!-- Header Start -->
			@include('home.partial.header')
			<!-- Header End -->
			
			<!-- Content Start -->
			<div id="contentWrapper">
			
				
				<div class="sectionWrapper" style="padding:20px 0;">
					<div class="container">
						<div class="row">
					
							<div class="cell-9">
								<div class="cell-12">
									<div class="product-specs price-block list-results">
										<div class="price-box"><span class="product-price">{{$movie->title}} ({{$movie->year}})</span></div>
										<div>
										</div>
									</div>
									
								@if(!strpos($movie->path,'.mkv') AND !strpos($movie->path,'.mp4'))	
									<div class="box error-box round fx animated fadeInLeft" data-animate="fadeInLeft" style="padding:9px;">
									<a class="close-box" href="#"><i class="fa fa-times"></i></a>
									<h3 style="margin-top:-7px;">Playback Error!</h3>
									<p>This video might not play due to unsupported video format e.g. (*.avi, *.dat) <br>If the video doesn't play please download the file and play with any media player</p>
								</div>
								@endif	
								@php
									$poster_dir = 'storage/'.strtolower($movie->category_name->drive).'/'.$movie->year.'/'.$movie->poster;

									$path = 'http://fs.ebox.live';
		    						$path .= '/'.$movie->category_name->drive.'/'.$movie->year.'/'.$movie->title.' ['.$movie->year.']';
		    						$path = str_replace(' ','%20',$path);
		    						$path = str_replace('[','%5B',$path);
		    						$path = str_replace(']','%5D',$path);

		    					@endphp
								@if(strpos($movie->path,'.mkv') OR strpos($movie->path,'.mp4'))
								<video id="my-video" class="video-js" controls preload="auto"  style="width:100%" height="464"
									  poster="{{url($poster_dir)}}" data-setup="{}">
									<source src="{{$path.'/'.$movie->path}}" type='video/mp4'>
									<source src="{{$path.'/'.$movie->path}}" type='video/mkv'>
									<p class="vjs-no-js">
									  To view this video please enable JavaScript, and consider upgrading to a web browser that
									  <a href="#" target="_blank">supports HTML5 video</a>
									</p>
								  </video>
								@endif
							
							
                           


									
									
									<div class="cell-12">
									<div class="cell-9" style="border-right:1px solid #555;">
									<div class="list-results last-list">
									<div class="cell-3" style="padding:0px 0px 0px 0px;margin-left:-27px;">
									<div class="post-img">
				    						<img alt="" style="height:203px;" src="{{url($poster_dir)}}">
									</div>
									</div>
									<div class="cell-9">
									<div class="product-specs product-block list-results" style="margin-top:-17px;">
									    <label class="control-label"><i class="fa fa-paper-plane-o"></i>Quality:</label>
										<a class="btn btn-md btn-orange btn-outlined fx animated fadeInDown" href="#" data-animate="fadeInDown" data-animation-delay="700" style="animation-delay: 700ms;">
										<span><i class="fa fa-film"></i>{{$movie->quality}}</span></a>
										<label class="control-label"><i class="fa fa-paper-plane-o"></i>Genre:</label>

										@php
											$genres = explode(",",$movie->genre); 
										@endphp
										@foreach($genres as $genre)
										<a href="genre.php?genre={{$genre}}" class="btn btn-small btn-border">{{$genre}}</a>
										@endforeach
									</div>
										<label class="control-label"><i class="fa fa-align-justify"></i>Quick Overview:</label>
				                        <div class="showContent hideContent">{{$movie->story}}</div>
										<div class="show-more">
									        <a href="#">Show more</a>
									    </div>
									</div>
									</div>
									</div>
									<div class="cell-3">
									<ul style="width:120%;">
									  <li><br>
									  <label class="control-label">Released: <font color="#bbb">
									  
									  </font></label>
									      
									  </li>
									  <li>
									  <label class="control-label">Added: <font color="#bbb"> {{$movie->created_at->diffForHumans()}}</font></label>
									      
									  </li>
									  <li>
									  <label class="control-label">Added Time: <font color="#bbb"> {{$movie->updated_at->format('d-M-Y H:i A')}}</font></label>
									      
									  </li>
									  <li>
									  <label class="control-label">Language: <font color="#bbb"> {{$movie->language}} </font></label>
									  </li>
									   <li>
									  <label class="control-label">Runtime:<font color="#bbb"> {{$movie->time}}</font></label>
									  </li>
									 @if(!empty($movie->website))
									  <li>
									  <label class="control-label">homepage:<font color="#bbb"> <a href="{{$movie->website}}">Visit website</a></font></label>
									  </li><br>
									@endif
									  <li>
									  <br>
									  <a class="btn btn-md btn-3d btn-blue fx animated fadeInUp" href="{{$path.'/'.$movie->path}}" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;">
										<span><i class="fa fa-download"></i>Download</span> </a>
									  </li>
									  <li>&nbsp;</li>
									  @if(!empty($movie->subtitle))
									  <li>
									  <a class="btn btn-md btn-3d btn-juicy_pink fx animated fadeInUp" href="{{$path.'/'.$movie->subtitle}}" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;">
										<span><i class="fa fa-download"></i>Subtitle</span> </a>
									  </li>
									  @endif
									 
									 </ul>
									</div>
									</div>
									
				
								</div>
								<div class="clearfix"></div>
								<div class="padd-top-20"></div>
								<hr class="hr-style5">
								<div class="clearfix padd-bottom-20"></div>
								<div class="cell-12">
									<div class="row">
										<div id="tabs" class="tabs">
											<ul>
												<li class="skew-25 active"><a href="#" class="skew25">Cast</a></li>
												<li class="skew-25"><a href="#" class="skew25">Trailers</a></li>
												<li class="skew-25"><a href="#" class="skew25">Comments</a></li>
											</ul>
									 <div class="tabs-pane">
								     <div class="tab-panel active"> <!-- /// Cast tab // -->
								     	<div class="cell-12 fx" data-animate="bounceInUp" style="padding: 0px;font-size: 16px;line-height: 30px;">
												{{str_replace(',',', ',$movie->cast)}}
										</div>
                                     </div>

									<div class="tab-panel">
										<div class="tab-panel">
										@php 
											$trailer = explode(',',$movie->trailer);
										@endphp	
										@foreach($trailer as $key)
											<iframe width="355" height="260" src="https://www.youtube.com/embed/{{$key}}" frameborder="0" style="margin:10px;" allowfullscreen></iframe>
										@endforeach
										</div>
									</div>
												<div class="tab-panel">
													 <div id="disqus_thread"></div>
<script>


(function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = '//ftpisp-com.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                    
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<aside class="cell-3 left-shop">

							<div class="widget r-posts-w sale-widget fx" data-animate="fadeInRight" style="padding-bottom: 20px;">
							<h3 class="widget-head">Movie Details</h3>
							
							<table>
							  <tr>
							    <td>Category:</td>
							    <td>{{ucfirst($movie->category_name->menu_name)}}</td>
							  </tr>
							  <tr>
							    <td>IMDb Rating:</td>
							    <td>{{$movie->rating}} / 10</td>
							  </tr>
							  <tr>
							    <td>Video Quality:</td>
							    <td>{{$movie->quality}}</td>
							  </tr>
							  <tr>
							    <td>File Type:</td>
							    <td>
							    	@if(strpos($movie->path,'.mp4'))	
									.mp4
									@elseif(strpos($movie->path,'.webm'))
									.webm
									@elseif(strpos($movie->path,'.ogg'))
									.ogg
									@elseif(strpos($movie->path,'.mkv'))
									.mkv
									@else
									Unknown
									@endif
							    </td>
							  </tr>
							  <tr>
							    <td>File Size:</td>
							    <td>{{$movie->size}}</td>
							  </tr>
							  <tr>
							    <td>Total views:</td>
							    <td>{{$movie->views}}</td>
							  </tr>
							</table>
							
							</div>
							
{{--							<div class="widget r-posts-w sale-widget fx" data-animate="fadeInRight">--}}
{{--							<h3 class="widget-head">Shout Box</h3>--}}
{{--			            @include('home.shoutbox')--}}
{{--							</div>--}}
							
							</aside>
						</div>
					</div>
				</div>
			</div>
			<!-- Content End -->
			
			<!-- Footer start -->
		   @include('home.partial.footer')
		    <!-- Footer end -->
		    
		    <!-- Back to top Link -->
	    	<div id="to-top" class="main-bg"><span class="fa fa-chevron-up"></span></div>
	    
	    </div>


	    <!-- Load JS siles -->	
 		@include('home.partial.script')
		
		<!-- SLIDER REVOLUTION SCRIPTS  -->
	
		<script src="/home/player/video.js"></script>
		
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});
			</script>
			<script id="dsq-count-scr" src="//ftpisp-com.disqus.com/count.js" async></script>
			
			 <script src="http://vjs.zencdn.net/5.19.2/video.js"></script>
	</body>
</html>