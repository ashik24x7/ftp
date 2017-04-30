<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Ebox Live</title>
		
		
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
		<style>
			.team-box .team-details p {
			margin-bottom: 10px; font-size:15px; height: 20px !important; text-align:center; padding:1px !important;
			}
			.play-hover p:hover{
			background:radial-gradient(#059002, #5b9d4b);
			font-size:14px;
			}


			div.team-details > a.play-hover > i {
			font-size: 55px;
			margin-left: 37%;
			margin-bottom: 5px;
			margin-top: -16px;
			}
			div.team-details > a.play-hover > i:hover {color:#fff;}
			
		</style>


	</head>
	<body>
	    
	    <!-- site preloader start -->
	   
	    <!-- site preloader end -->
	    
	    <div class="pageWrapper">
			<!-- Header Start -->
			@include('home.partial.header')
			<!-- Header End -->
			
			<!-- Content Start -->
			<div id="contentWrapper">

				<div class="sectionWrapper" style="padding: 30px 0;">
					<div class="container">
						<div class="row">
							<div class="box success-box center hidden">Your item was added succesfully.</div>
							<div class="clearfix"></div>
							
							<div class="cell-12">
				            
								
								<div class="clearfix"></div>
								<div class="pager skew-25" style="margin-bottom:20px;">
						    		<ul>
						    			{{$movies->links()}}
						    		</ul>
					    		</div>
								<div class="grid-list">
									<div class="row">
										@foreach($movies as $movie)
											@php
												$poster_dir = 'storage/'.ltrim($movie->category_name->drive,'fs1/').'/'.$movie->year.'/'.$movie->poster;

												$path = 'http://43.230.123.21';
					    						$path .= '/'.$movie->category_name->drive.'/'.$movie->year.'/'.$movie->title.' ['.$movie->year.']/'.$movie->poster;
					    						$path = str_replace(' ','%20',$path);
					    						$path = str_replace('[','%5B',$path);
					    						$path = str_replace(']','%5D',$path);
					    					@endphp
											<div class="cell-2 fx shop-item" data-animate="fadeInUp" style="margin-bottom:15px;padding-right: 0px;">
									    			<div class="team-box" style="background-color:#333;margin-right: -10px;">
							    					<div class="team-img" style="margin-right:5px;margin-left:5px;">
							    					@if(!empty($movie->poster) && isset($movie->poster))
							    						<img alt="" style="height:267px;" src="{{url($poster_dir)}}">
							    					@else
														<img alt="" style="height:267px;" src="/home/images/no_image.png">
							    					@endif
							    					    <span class="yellowbox">{{$movie->year}}</span>
														<span class="imdb-rating"><b><b class="fa fa-star"></b></b>{{$movie->rating}}</span>
													</div>
													
													<a href="/movie/{{strtolower(str_replace(' ','-',$movie->title))}}">
							    					<div class="team-details"  href="/movie/{{strtolower(str_replace(' ','-',$movie->title))}}" style="height:267px;background-color:rgba(0, 0, 0, 0.5);margin-left:0px;width:97.5%;">
						                               
														<p style="height: 100px !important; margin: -4px 0px 0px 0px;">
											{{ $movie->title.' ['.$movie->year.']' }}
											</p>
											
											@php
												$trailer = explode(",",$movie->trailer);
											@endphp
											<a href="/movie/{{strtolower(str_replace(' ','-',$movie->title))}}" class="play-hover" ><i class="fa fa-play-circle play-btn"></i></a>
											<br>
											<p style="background: radial-gradient(#1E8CAB, #09009a); width:40%; font-size:13px;float:right;margin-left:5px;"><i class="fa fa-eye"></i> {{$movie->views}}</p>
											
											<p style="background:radial-gradient(#EA0A5D, #5A0000);font-size:13px;">{{$movie->quality}}</p>
											<p style="background: radial-gradient(#5bf77d, #1f730a);font-size:13px;width:60%;float:left;"><span style="color:#000;font-family:impact;"></span><span style="font-family:tahoma;font-weight:bold;color:#333;margin-bottom:10%;">{{$movie->category_name->menu_name}}</span></p>
											<p style="background: radial-gradient(#b0e2ff, #337ab7);font-size:13px;width:37%;float:right;"><span style="color:#000;font-family:impact;"></span><span style="font-family:tahoma;font-weight:bold;color:#333;margin-bottom:10%;">{{$movie->size}}</span></p>
														
											<ul class="gallery clearfix">
											<a href="http://www.youtube.com/watch?v={{$trailer[0]}}" rel="prettyPhoto" style="margin: 2.5% 0 5% 30%;width: 40%;"  title="{{$movie->title}}" />
											<img src="/home/images/trailer.png" style="top: 70px;margin-left: -50px;" />
											</a>
											</ul>
														
										</div>
										</a>
							    			</div>
									    		</div>
									    @endforeach
									</div>
								</div>
								
								
								<div class="clearfix"></div>
								<div class="pager skew-25" style="margin-bottom:20px;">
								<ul>
									{{$movies->links()}}
								</ul>
					    		</div>
							</div>
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
		<script type="text/javascript" src="/home/js/jquery.min.js"></script>
	    
	    <!-- Waypoints script -->
		<script type="text/javascript" src="/home/js/waypoints.min.js"></script>

		<!-- Animate numbers increment -->
		<script type="text/javascript" src="/home/js/jquery.animateNumber.min.js"></script>
		
		<!-- slick slider carousel -->
		<script type="text/javascript" src="/home/js/slick.min.js"></script>
		
		<!-- Animate numbers increment -->
		<script type="text/javascript" src="/home/js/jquery.easypiechart.min.js"></script>
		
		<!-- PrettyPhoto script -->
		<script type="text/javascript" src="/home/js/jquery.prettyPhoto.js"></script>
		
		<!-- Share post plugin script -->
		<script type="text/javascript" src="/home/js/jquery.sharrre.min.js"></script>
		
		<!-- Product images zoom plugin -->
		<script type="text/javascript" src="/home/js/jquery.elevateZoom-3.0.8.min.js"></script>
		
		<!-- Input placeholder plugin -->
		<script type="text/javascript" src="/home/js/jquery.placeholder.js"></script>
				
		
		
		<!-- Flickr API plugin -->
		<script type="text/javascript" src="/home/js/jflickrfeed.min.js"></script>

		<!-- MailChimp plugin -->
		<script type="text/javascript" src="/home/js/mailChimp.js"></script>

		<!-- NiceScroll plugin -->
		<script type="text/javascript" src="/home/js/jquery.nicescroll.min.js"></script>
		
		<!-- general script file -->
		<script type="text/javascript" src="/home/js/script.js"></script>

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
	</body>
</html>