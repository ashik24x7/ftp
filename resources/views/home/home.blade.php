<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>E-BOX File Server</title>
		<meta name="description" content="Ebox File Server – Biggest Movie File Server">
		<meta name="author" content="Webacademybd">
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
	    <link rel="shortcut icon" href="images/favicon.ico">
		    	
		<!-- CSS StyleSheets -->
		<link rel="shortcut icon" href="/home/images/favicon.ico">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&amp;amp;subset=latin,latin-ext">
		<link rel="stylesheet" href="/home/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
		 <style>
		 	.team-box .team-details p {
				margin-bottom: 10px;
				font-size:15px;
				height: 20px !important;
				text-align:center;
				padding:1px !important;
            }
			.play-hover p:hover{
				background:radial-gradient(#059002, #5b9d4b);
				font-size:14px;
			}
			a:hover{
				text-decoration:none;
			}
			.block-head:before {
				position: absolute;
				bottom: 0px;
				left: 0px;
				width: 0px;
				height: 0px;
				content: "";
				display: inline-block;
			}
		</style>
	
	</head>
	<body>
	    
	    <!-- site preloader start -->
		
		<div class="page-loader">
			<div class="loader-in"></div>
		</div>
				
	     
	   
	    <div class="pageWrapper fixedPage">
		    
		    <!-- login box start -->
			<!-- no login system in silver package -->
			<!-- login box End -->

			<!-- Header Start -->
			 @include('home.partial.header')
			<!-- Header End -->
			
			<!-- Content Start -->
			<div id="contentWrapper">
				
				<!-- Revolution slider start -->
	           <!-- no sliding system in silver and gold system -->
				<!-- Revolution slider end -->
				
				<!-- Welcome Box start -->
			<style>
				.slick-prev {
				    left: 241px;
				    top: -60px;
				}
				.slick-next {
				    left: 274px;
				    top: -60px;
				}
				.slick-prev,.slick-next{
					margin-top:24px;
				}
				div.team-details > a.play-hover > i {
				    font-size: 55px;
				    margin-left: 37%;
				    margin-bottom: 5px;
				    margin-top: -16px;
				}
				div.team-details > a.play-hover > i:hover {
					color:#fff;
				}
				.block-bg-1:before, .block-bg-2:before, .block-bg-3:before, .block-bg-4:before, .block-bg-5:before {
					display:none;
				}
				span.greenbox {
					position: absolute;
					margin-top: 245px;
					width: 95%;
					margin-left:-1px;
					max-height:30px;
					text-align:center;
					padding: 3px 3px;
					color: rgba(255, 255, 255, 1);
					text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
					font-size: 16px;
					background: #39a739;
					-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
					-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
					box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
					-webkit-border-bottom-right-radius: 3px;
					-webkit-border-bottom-left-radius: 3px;
					-moz-border-radius-bottomright: 3px;
					-moz-border-radius-bottomleft: 3px;
					border-bottom-right-radius: 3px;
					border-bottom-left-radius: 3px;
				}
			</style>
				
				<div class="welcome gry-pattern" style="padding: 9px 0px 17px 0px;">
					<div class="container">
						<h3 class="block-head" style="margin-left:-9px;margin-bottom: 12px;margin-top: 2px;">Recently Added Movies
						<a class="btn btn-md btn-3d main-bg fx animated fadeInUp pull-right" href="/movies" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;-webkit-box-shadow: 0 0 0 0;box-shadow: 0 0 0 0;margin-right: -9px;padding: 2px 10px;">
										<span>View All Movies ({{$total_movies}})</span>
									</a> </h3>
						
						<div class="portfolioGallery portfolio" style="margin-top: -6px;">
						@foreach($movies as $movie)
							<div>
								<div class="team-box" style="">
				    					<div class="team-img" style="margin-right:5px;margin-left:5px;">
				    					@php
				    						$poster_dir = 'storage/'.str_replace('fs1/','',$movie->category_name->drive).'/'.$movie->year.'/'.$movie->poster;
				    						$poster_dir = str_replace('fs2/','',$poster_dir);

				    						$path = 'http://fs.ebox.live/';
				    						$path .= $movie->category_name->drive.'/'.$movie->year.'/'.$movie->title.' ['.$movie->year.']/'.$movie->poster;
				    						$path = str_replace(' ','%20',$path);
				    						$path = str_replace('[','%5B',$path);
				    						$path = str_replace(']','%5D',$path);

				    					@endphp
				    						<img alt="" style="height:274px;" src="{{url($poster_dir)}}">
				    					    <span class="yellowbox">{{$movie->year}}</span>
											<span class="imdb-rating"><b><b class="fa fa-star"></b></b>
											@if($movie->rating > 0)
											{{$movie->rating}}
											@else
												N/A
											@endif
											</span>
											<span class="greenbox">Added: {{$movie->created_at->diffForHumans()}}</span>
										</div>
										@php
											$link = str_replace('-','*',$movie->title);
											$link = str_replace(' ','-',$link);
										
										@endphp
										<a href="/movie/{{strtolower($link)}}">
				    					<div class="team-details"  href="/movie/{{strtolower(str_replace(' ','-',$movie->title))}}" style="height:280px;background-color:rgba(0, 0, 0, 0.5);margin-left:0px;width:97.5%;">
			                               
											<p style="height: 100px !important; margin: -4px 0px 0px 0px;">
											@php 
												$movie->title = ucfirst($movie->title);
											@endphp
											{{ $movie->title.' ['.$movie->year.']' }}
											</p>
											
											@php
												$trailer = explode(",",$movie->trailer);
											@endphp
											<a href="/movie/{{strtolower($link)}}" class="play-hover" ><i class="fa fa-play-circle play-btn"></i></a>
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
						
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- Welcome Box end -->
				
				<!-- FUN Staff start -->
				<div class="fun-staff staff-1 block-bg-2 sectionWrapper" style="height: 355px; min-height: 355px;">
					<div class="container">
						<div class="row">
							
							<div class="portfolio-filterable">
							
							<div class="row" style="margin-top:-70px;margin-bottom:-20px;">
									<!-- staff item start -->
								<h3 class="block-head" style="margin-left:12px;    padding: 0px 3px;">Recently Added Games
								<a class="btn btn-md btn-3d main-bg fx animated fadeInUp pull-right" href="/games" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;-webkit-box-shadow: 0 0 0 0;box-shadow: 0 0 0 0;margin-right: 14px;margin-top: 4px;padding: 2px 10px;">
										<span>View All Games ({{$total_games}})</span>
									</a>
								</h3> 
									<div class="portfolio-items" id="container">
                                @foreach($games as $game)
                                	@php
											$poster_dir = 'storage'.ltrim($game->category_name->drive,'fs1').'/'.$game->cover;
											
											$path = 'http://43.230.123.21/';
				    						$path .= $game->category_name->drive.'/'.$game->name.'/';
				    						$path = str_replace(' ','%20',$path);
				    						$path = str_replace('[','%5B',$path);
				    						$path = str_replace(']','%5D',$path);

				    					@endphp
									<div class="cell-3 seo" data-category="seo" style="position: absolute; left: 877px; top: 0px;">
										<div class="portfolio-item">
											<div class="img-holder">
												<div class="img-over" style="display: none;">
												@php
													$link = str_replace('-','*',$game->name);
													$link = str_replace(' ','-',$link);
												
												@endphp
													<a href="/game/{{strtolower($link)}}" class="fx link undefined animated fadeOutUp"><b class="fa fa-link"></b></a>
													<a href="" class="fx zoom undefined animated fadeOutDown" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
												</div>
												<a href="/game/{{strtolower($link)}}"><img alt="" src="{{$poster_dir}}"></a>
											</div>
											<div class="name-holder">
											<a href="/game/{{strtolower($link)}}" class="project-name" style="height:45px;">{{$game->name}}</a>
											<p style="text-align:center;">
											<span class="project-options"> {{$game->category_name->menu_name}}</span>
											<span class="project-options"> [ {{$game->size}} ]</span>
											<span class="project-options"><i class="fa fa-eye"></i> {{$game->views}}</span>
											</p>
										</div>
										</div>
									</div>
								@endforeach
								</div>
									
									<!-- staff item end -->
									
								</div><!-- .portfolioGallery end -->
							</div>
						</div>
					</div><!-- .container end -->
				</div><!-- .funn-staff end -->
				<!-- FUN Staff end -->
				
	
				<!-- About us and Features container end -->
				

				<!-- Services boxes style 1 start -->
				<div class="gry-pattern_tv">
				<br>
					<div class="container">
						<div class="row">
						<style>
						.shop-item p {
							overflow: hidden;
							padding: -1px 2px;
							max-height: 22px;
							font-size: 17px;
							margin-left: 37px;
							margin-top: -6px;
						}
						</style>
						<h3 class="block-head" style="margin-top:-10px;    padding: 0px 0px 0px 7px;" >Recently Added TV Series
						<a class="btn btn-md btn-3d main-bg fx animated fadeInUp pull-right" href="/tv-series" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;-webkit-box-shadow: 0 0 0 0;box-shadow: 0 0 0 0;margin-right: 8px;margin-top: 4px; padding: 2px 10px;"> <span>View All TV Series ({{$total_tvseries}})</span></a>
						
						<a class="btn btn-md btn-3d main-bg fx animated fadeInUp pull-right" href="/tv-episodes" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;-webkit-box-shadow: 0 0 0 0;box-shadow: 0 0 0 0;margin-right: 20px;margin-top: 4px; padding: 2px 10px;"> <span>View All Episodes ({{$total_episodes}})</span></a>
						</h3> 
					@foreach($episodes as $episode)
					@php
						$poster_dir = ltrim($episode->category_name->drive,'fs1/').'/';
                        $path = $episode->category_name->drive.'/'.$episode->tvseries->title.'/';
                        $path = str_replace(' ','%20',$path);
                    @endphp
					   <div class="cell-2 fx shop-item animated fadeInUp" data-animate="fadeInUp" style="padding-left:0px;padding-right:8px;">
							
							<div class="item-box">
							
								<div class="item-img">
					<a href="/tv-series/{{$episode->tvseries->id}}/season/{{$episode->season}}/episode/{{$episode->episode}}">
					<span class="sale" style="width: 80px;">Episode: {{$episode->episode}}</span>
					<span class="sale2" style="width: 72px;">Seasons: {{$episode->season}}</span>
					
					<img alt="" src="{{\Storage::url($poster_dir.$episode->tvseries->poster)}}"></a>
								</div>
								<h3 class="item-title">
							<a href="/tv-series/{{$episode->tvseries->id}}/season/{{$episode->season}}/episode/{{$episode->episode}}">{{$episode->tvseries->title}}</a>
							</h3>
							</div>
					   </div>
					   
					@endforeach	
										
										
						
						</div>
					</div>
				</div>
				<!-- Services boxes style 1 start -->
							<!-- About us and Features container start -->

				<!-- Portfolio start -->
				<div class="sectionWrapper" style="background-color:#171717;height:330px;min-height: 330px;">
				
					<div class="container" >
					<h3 class="block-head" style="margin-top: -70px;margin-bottom: 28px;" >Recently Added Softwares
						<a class="btn btn-md btn-3d main-bg fx animated fadeInUp pull-right" href="/softwares" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;-webkit-box-shadow: 0 0 0 0;box-shadow: 0 0 0 0;margin-right: -8px;margin-top: 4px;padding: 2px 10px;"><span>View All Softwares ({{$total_softwares}})</span></a>
						
					</h3> 
						<div class="row">
							<div class="cell-12">
			
			             	@foreach($softwares as $software)
                            	@php
								
									$poster_dir = 'storage'.ltrim($software->category_name->drive,'fs1').'/'.$software->cover;
											
									$path = 'http://43.230.123.21/';
		    						$path .= $software->category_name->drive.'/'.$software->name.'/';
		    						$path = str_replace(' ','%20',$path);
		    						$path = str_replace('[','%5B',$path);
		    						$path = str_replace(']','%5D',$path);

		    					@endphp
							<div class="cell-2 service-box-2 fx" data-animate="fadeInDown">
								<div class="box-2-cont">
									@php
										$link = str_replace('-','*',$software->name);
										$link = str_replace(' ','-',$link);
									
									@endphp
									<i><a href="/software/{{strtolower($link)}}"><img src="{{$poster_dir}}" style="margin-top:-50px;width:100px;height:100px;" /></a></i>
									<h4 style="height:54px;font-size:14px;margin-top:10px;">{{$software->name}}</h4>
									<div class="center sub-title main-color"> Filesize: - ({{$software->size}})</div>
									<a class="r-more main-color" href="/software/{{strtolower($link)}}">Details</a>
								</div>
							</div>
							@endforeach
			
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
			
			<!-- Content End -->
			
			<!-- Footer start -->
			@include('home.partial.footer')
		    
			<!-- Back to top Link -->
			<div id="to-top" class="main-bg"><span class="fa fa-chevron-up"></span></div>
		    
	    </div>
	    

	   <script type="text/javascript" src="/home/js/jquery.min.js"></script>
	    
	    <!-- Waypoints script -->
		<script type="text/javascript" src="/home/js/waypoints.min.js"></script>
		
		<!-- SLIDER REVOLUTION SCRIPTS  -->
		<script type="text/javascript" src="/home/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="/home/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		
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
		
		<!-- Tweeter API plugin -->
		<script type="text/javascript" src="/home/js/twitterfeed.js"></script>
		
		<!-- Flickr API plugin -->
		<script type="text/javascript" src="/home/js/jflickrfeed.min.js"></script>

		<!-- MailChimp plugin -->
		<script type="text/javascript" src="/home/js/mailChimp.js"></script>
		
		<!-- NiceScroll plugin -->
		<script type="text/javascript" src="/home/js/jquery.nicescroll.min.js"></script>
		
		<!-- isotope plugin -->
		<script type="text/javascript" src="/home/js/isotope.pkgd.min.js"></script>
		
		<!-- general script file -->
		<script type="text/javascript" src="/home/js/script.js"></script>
		
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',theme:'light_square',slideshow:3000, hideflash: true});
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