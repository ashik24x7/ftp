<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php // echo $title; ?>  TV Series</title>
		<meta name="description" content="EXCEPTION – Responsive Business HTML Template">
		<meta name="author" content="EXCEPTION">
		
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
				<style>
				.block-head:before {
    left: 103px;
    bottom: 9px;
}
.block-head:after {
        left: 83px;
    bottom: 11px;
}
img.img-circle {
   background-repeat: no-repeat;
    background-position: 50%;
    border-radius: 50%;
    width: 50px;
    height: 50px;
	margin-top: -6px;
}
				</style>
				<div class="sectionWrapper" style="padding:10px;">
					<div class="container">
						<div class="my-img">
							<div class="my-details" style="background: linear-gradient(to bottom right, #580114, #05023b);">
								@php
									$path = $tvseries->category_name->drive.'/'.$tvseries->title.'/';
						            $path = str_replace(' ','%20',$path);
								@endphp
								<img class="fx" data-animate="fadeInLeft" alt="" src="{{'/'.$path.$tvseries->poster}}" style="box-shadow: rgb(0, 0, 0) 7px 4px 10px -6px;height:450px;">
								<h4 class="bold main-color my-name fx" data-animate="slideInDown" style="font-size:32px;">{{$tvseries->title}} [{{date('Y',strtotime($tvseries->release_date))}}]</h4>
								
								<ul class="list alt list-bookmark cell-4">
								<p style='opacity:1;background:radial-gradient(#ffffb8, #ce981d);padding:3px; max-width:30%;text-align:center; color:#000; font-size:14px;margin-left:15px;'><span style='color:#333;font-family:impact;'><i class="fa fa-star"></i> &nbsp;</span> <span style='font-family:tahoma;font-weight:bold;'>{{$tvseries->rating}}/10</span></p>
								</ul>
								@php 
									$seasons = \DB::table('episodes')->where('tvseries_id',$tvseries->id)->orderBy('season','DESC')->first();
								@endphp
								<ul class="list alt list-bookmark cell-4">
									<li class="fx" data-animate="slideInDown" data-animation-delay="300">Season: {{$season = isset($seasons->season) ? $seasons->season : 0}}</li>
									<li class="fx" data-animate="slideInDown" data-animation-delay="300">Episodes: {{\DB::table('episodes')->where('tvseries_id',$tvseries->id)->count()}}</li>

									<li class="fx" data-animate="slideInDown" data-animation-delay="300">Views: {{$tvseries->views}}</li>
									
								</ul>
								<ul class="list alt list-bookmark cell-8">
								<div class="fx" data-animate="fadeInUp">
							<h3 class="block-head">Overveiw</h3>
							<p style="font-size:16px;line-height: 1.4em;font-family: 'Source Sans Pro', 'Arial', sans-serif;" >
							@if (strlen($tvseries->story) > 500)
								{{substr($tvseries->story, 0, 500)}}
							@else
								{{$tvseries->story}}
							@endif
							</p>
							<h3 class="block-head">Featured</h3>
							<p>
								{{str_replace(',',', ',$tvseries->cast)}}
							</p>
						</div>
						
								</ul>
							</div>
						</div>
						<hr class="hr-style5">
						<div class="cell-12 fx animated fadeInLeft" data-animate="fadeInLeft">
								<div class="row">
									<div id="tabs" class="tabs">
										<h3>All Seasons</h3>
										<style>
										
										</style>
										<ul>
										@for($i=1;$i<=$season;$i++)
											<li class="skew-25 @if($i == 1) active @endif"><a href="#" class="skew25"><i class="fa fa-play"></i> Season: {{$i}}</a>
											</li>
										@endfor
										</ul>
									<div class="tabs-pane">
									@for($i=1;$i<=$season;$i++)
										<div class="tab-panel @if($i == 1) active @endif" style="display: block;">
									@php
										$episodes = \App\Episode::where(['tvseries_id'=>$tvseries->id,'season' => $i])->get();
									@endphp
									@foreach($episodes as $episode)
									<div class="per-episode" style="">   
                                        <div class="image" style="float:left;">
										  <a href="/tv-series/{{$tvseries->id}}/season/{{$episode->season}}/episode/{{$episode->episode}}"><img src="{{'/'.$path.$tvseries->poster}}" style="width:227px;height:127px;" /></a>
										</div>
										<a href="/tv-series/{{$tvseries->id}}/season/{{$episode->season}}/episode/{{$episode->episode}}"><img src="/home/images/play-icon.png" style="width:50px;height:50px;margin-bottom: -85px;margin-top: 19px;margin-left: 72%;" /></a>
									    <div class="info" data-role="tooltip" style="padding:10px;margin-left:0px;margin-top:-18px;width:79%;float: left;height:127px;background: linear-gradient(to bottom right, #580114, #05023b);">
											<div class="title">
											  <a href="/tv-series/{{$tvseries->id}}/season/{{$episode->season}}/episode/{{$episode->episode}}" style="float:left;"><h3>SEASON: {{$episode->season}} , EPISODE: {{$episode->episode}}</h3></a> 
											  <p style="background: radial-gradient(#09009A, #1E8CAB); width:6%;float:left;margin-top: 7px;margin-left: 15px;">&nbsp;&nbsp;{{$episode->quality}}</p>
											  <div class="date" style="clear:left;" >Size: {{$episode->size}}</div>
											</div>

                                         </div>
								    </div>
									@endforeach
									<div style="clear:left;" ></div>
									
									
												
										</div>
									@endfor
									</div>
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
	    

	   	@include('home.partial.script')
		
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