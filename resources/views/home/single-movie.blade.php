<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Ebox Live</title>
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
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#exordid").focusout(function(){
				var exordid = $("#exordid").val().trim();

				if(exordid == ""){
				   $("#message").text('Name/Id can not be empty');
				}else{
					$("#message").text('');
				}
			})
			$("#text").focusout(function(){
				var text = $("#text").val().trim();
				
				if(text == ""){
				   $("#message").text('Message can not be empty');
				}else{
					$("#message").text('');
				}
			})
			
			$("#submit").click(function(e){
					e.preventDefault();
					
					var exordid = $("#exordid").val().trim();
					var text = $("#text").val().trim();
					
					if(exordid == ""){
					   $("#message").html('Name/Id can not be empty');
					}else{
						$("#message").html('');
					}
					if(text == ""){
					   $("#message").text('Message can not be empty');
					}else{
						$("#message").text('');
					}

					if(exordid != "" && text != ""){
						var url = '{{ url("shout") }}';
						var value = $("#form").serialize();
						console.log(value);
						$.ajax({
							type:"POST",
							url:url,
							data:value,
							success:function(res){
								$("#message").html(res);
							}
						});
					}

					setTimeout(function(){
						$("#load").load(location.href + " #load");
					}, 500);
			})
		})


	</script>
	
	<script src="/home/player/jquery.js"></script>	
	<script src="/home/player/mediaelement-and-player.min.js"></script>
	
	<link rel="stylesheet" href="/home/player/mediaelementplayer.min.css" />
	
	</head>
	<body>
	    <!-- site preloader end -->
	    
	    <div class="pageWrapper">

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
											<!--<span class="results-rating">
												<?php // /* $ratings = floor($results['MovieRatings']);
                  //                                          for($i=0;$i<=10;$i++){
															   // if($i <= $ratings){
																  // echo '<span class="fa fa-star"></span>';  
															   // }else{
																  //  echo '<span class="fa fa-star-o"></span>';
															   // }
														   //} 
														?>
											</span>
											<span><span><?php // //echo $results['MovieRatings']; ?>/10 IMDB ratings</span><span class="separator"></span> -->
										</div>
									</div>
								@if(!strpos($movie->path,'.mp4'))	
									<div class="box error-box round fx animated fadeInLeft" data-animate="fadeInLeft" style="padding:9px;">
									<a class="close-box" href="#"><i class="fa fa-times"></i></a>
									<h3 style="margin-top:-7px;">Playback Error!</h3>
									<p>This video might not play due to unsupported video format e.g. (*.mkv, *.avi, *.dat) <br>If the video doesn't play please download the file and play with any media player</p>
								</div>
								@endif	
								@php
		    						$path = '/fs1/movies/'.$movie->category_name->menu_name.'/'.$movie->year.'/'.$movie->title.' ['.$movie->year.']';
		    						$path = str_replace(' ','%20',$path);
		    						$path = str_replace('[','%5B',$path);
		    						$path = str_replace(']','%5D',$path);

		    					@endphp
								<video width="100%" height="460" id="player2" poster="{{$path.'/'.$movie->poster}}" controls="controls" preload="none">
	<!-- MP4 source must come first for iOS -->
								@if(strpos($movie->path,'.mp4'))	
									<source type="video/mp4" src="{{$path.'/'.$movie->path}}" />
								@elseif(strpos($movie->path,'.webm'))
									<!-- WebM for Firefox 4 and Opera -->
									<source type="video/webm" src="{{$path.'/'.$movie->path}}" />
								@elseif(strpos($movie->path,'.ogg'))
									<!-- OGG for Firefox 3 -->
									<source type="video/ogg" src="{{$path.'/'.$movie->path}}" />
								@elseif(strpos($movie->path,'.mkv'))
									<source type="video/mkv" src="{{$path.'/'.$movie->path}}" />
									<!-- Fallback flash player for no-HTML5 browsers with JavaScript turned off -->
								@else
									<!-- <!-- Fallback flash player for no-HTML5 browsers with JavaScript turned off -->
									<object width="100%" height="360" type="application/x-shockwave-flash" data="player/flashmediaelement.swf"> 		
										<param name="movie" value="{{$path.'/'.$movie->path}}" /> 
										<param name="flashvars" value="controls=true&amp;file=../media/echo-hereweare.mp4" /> 		
										<!-- Image fall back for non-HTML5 browser with JavaScript turned off and no Flash player installed -->
										<img src="{{$path.'/'.$movie->poster}}" width="640" height="360" alt="Here we are" 
											title="No video playback capabilities" />
									</object> -->
								@endif 	
								</video>
							
							
                           

<script>

$('audio,video').mediaelementplayer({
	//mode: 'shim',
	success: function(player, node) {
		$('#' + node.id + '-mode').html('mode: ' + player.pluginType);
	}
});

</script>
									
									
									<div class="cell-12">
									<div class="cell-9" style="border-right:1px solid #555;">
									<div class="list-results last-list">
									<div class="cell-3" style="padding:0px 0px 0px 0px;margin-left:-27px;">
									<div class="post-img">
				    						<img alt="" style="height:203px;" src="{{$path.'/'.$movie->poster}}">
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
									  <label class="control-label">Release Date: <font color="#bbb"> {{$movie->release_date}}</font></label>
									      
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
												<li class="skew-25"><a href="#" class="skew25">Crew</a></li>
												<li class="skew-25"><a href="#" class="skew25">Reviews</a></li>
												<li class="skew-25"><a href="#" class="skew25">Trailers</a></li>
												<li class="skew-25"><a href="#" class="skew25">Comments</a></li>
											</ul>
									 <div class="tabs-pane">
								     <div class="tab-panel active"> <!-- /// Cast tab // -->
								     	<div class="cell-3 fx" data-animate="bounceInUp">
											<div class="team-box-2">
						    					<div class="team-img">
						    						<a href="'.URL.'/themes/'.THEME.'/about-actor.php?id="><img alt="" src=""></a>
						    					</div>
						    					<div class="team-details">
					                                <h3 style="font-size:14px;">amitab</h3>
					                                <div class="t-position" style="margin-top:-10px;height:41px;">amitab</div>
						    					</div>
						    				</div>
										</div>
                                     </div>
									
									   
									<div class="tab-panel">   <!-- Crew //// -->
								   <?php // CollectCrew($imdbid,$link); ?>
									</div>
									
												<div class="tab-panel">
													 <div class="reviews">
														<div class="comments">
															
														    <ul class="comment-list">
														       <?php // CollectReviews($imdbid); ?>
														</div>
													</div>
												</div>
												<div class="tab-panel">
													 <?php // CollectYoutubeTrailers($imdbid); ?>
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
									undefined
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
							
							<div class="widget r-posts-w sale-widget fx" data-animate="fadeInRight">
							<h3 class="widget-head">Shout Box</h3>
			            @include('home.shoutbox')
							</div>
							
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
	</body>
</html>