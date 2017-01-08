<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php // echo WEBNAME; ?> - <?php // echo $results['epTitle']; ?></title>
		
		<meta name="author" content="Kamruddin bivob">
		
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
		
		
		
	
	 <link href="http://vjs.zencdn.net/5.10.7/video-js.css" rel="stylesheet">

  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
	</head>
	<body>
	    
	    <!-- site preloader start 
	    <div class="page-loader">
	    	<div class="loader-in"></div>
	    </div>
	    <!-- site preloader end -->
	    
	    <div class="pageWrapper">
		    
		    <!-- login box start 
			<div class="login-box">
				<a class="close-login" href="#"><i class="fa fa-times"></i></a>
				<form>
					<div class="container">
						<p>Hello our valued visitor, We present you the best web solutions and high quality graphic designs with a lot of features. just login to your account and enjoy ...</p>
						<div class="login-controls">
							<div class="skew-25 input-box left">
								<input type="text" class="txt-box skew25" placeholder="User name Or Email" />
							</div>
							<div class="skew-25 input-box left">
								<input type="password" class="txt-box skew25" placeholder="Password" />
							</div>
							<div class="left skew-25 main-bg">
								<input type="submit" class="btn skew25" value="Login" />
							</div>
							<div class="check-box-box">
								<input type="checkbox" class="check-box" /><label>Remember me !</label>
								<a href="#">Forgot your password ?</a>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- login box End -->

			<!-- Header Start -->
			@include('home.partial.header')
			<!-- Header End -->
			
			<!-- Content Start -->
			<div id="contentWrapper">
			
				
				<div class="sectionWrapper" style="padding:20px 0;">
					<div class="container">
						<div class="row">
						@php
							$path = $episode->category_name->drive.'/'.$episode->tvseries->title.'/';
				            $path = str_replace(' ','%20',$path);
						@endphp
							<div class="cell-9">
								<div class="cell-12">
									<div class="product-specs price-block list-results">
										<div class="price-box"><span class="product-price">{{$episode->tvseries->title}} [{{date('Y',strtotime($episode->tvseries->release_date))}}]</span></div>
										<div>
											<span class="results-rating">
												<?php // $ratings = floor($json['vote_average']);
                 //                                           for($i=0;$i<=10;$i++){
															  //  if($i <= $ratings){
																 //  echo '<span class="fa fa-star"></span>';  
															  //  }else{
																 //   echo '<span class="fa fa-star-o"></span>';
															  //  }
														   // }
														?>
											</span>
											<span><span>Episode : {{$episode->episode}} Season: {{$episode->season}} </span><span class="separator"></span>
										</div>
									</div>
									<div class="product-block results-avl list-results">
										<video id="my-video" class="video-js" controls preload="auto"  style="width:100%" height="464"
									  poster="{{'/'.$path.$episode->tvseries->poster}}" data-setup="{}">
										<source src="{{'/'.$path.'Season%20'.$episode->season.'/'.$episode->path}}" type='video/mp4'>
										<source src="{{'/'.$path.'Season%20'.$episode->season.'/'.$episode->path}}" type='video/mkv'>
										<p class="vjs-no-js">
										  To view this video please enable JavaScript, and consider upgrading to a web browser that
										  <a href="#" target="_blank">supports HTML5 video</a>
										</p>
									  </video>
									</div>
									
									
									<div class="cell-12">
									<div class="cell-9" style="border-right:1px solid #555;">
									<div class="list-results last-list">
									<div class="cell-5" style="padding:0px 0px 0px 0px;margin-left:-27px;">
									<div class="post-img">
				    					<img alt="" style="height:138px;" src="{{'/'.$path.$episode->tvseries->poster}}">
									</div>
									</div>
									<div class="cell-7">
									<div class="product-specs product-block list-results" style="margin-top:-17px;">
									    <label class="control-label"><i class="fa fa-paper-plane-o"></i>Quality:</label>
										<a class="btn btn-md btn-orange btn-outlined fx animated fadeInDown" href="#" data-animate="fadeInDown" data-animation-delay="700" style="animation-delay: 700ms;">
										<span><i class="fa fa-film"></i>{{$episode->quality}}</span></a>
									</div>
										<label class="control-label"><i class="fa fa-align-justify"></i>Quick Overview:</label>
				  <div class="show">{{$episode->tvseries->story}}</div>
									</div>
									</div>
									</div>
									<div class="cell-3">
									<ul style="width:120%;">
									  <li><br>
									  <label class="control-label">Release Date: <font color="#bbb"> {{$episode->tvseries->release_date}}</font></label>
									      
									  </li>
									  <li>
									  <label class="control-label">Episode: <font color="#bbb"> {{$episode->episode}} </font></label>
									  </li>
									  <li>
									  <label class="control-label">Season:<font color="#bbb"> {{$episode->season}}</font></label>
									  </li>
									  <li>
									  <label class="control-label">Size:<font color="#bbb"> {{$episode->size}}</font></label>
									  </li>
									  <br>
									  <li>
									  <a class="btn btn-md btn-3d btn-blue fx animated fadeInUp" href="{{'/'.$path.'Season%20'.$episode->season.'/'.$episode->path}}" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;">
										<span><i class="fa fa-download"></i>Download</span> </a>
									  </li>
									  <li>&nbsp;</li>
									  <li>
									 
									  </li>
									 
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
												<li class="skew-25 active"><a href="#" class="skew25">Crew</a></li>
												<li class="skew-25"><a href="#" class="skew25">Guest Stars</a></li>
												<li class="skew-25"><a href="#" class="skew25">Trailers</a></li>
												<li class="skew-25"><a href="#" class="skew25">Comments</a></li>
											</ul>
									 <div class="tabs-pane">
								     <div class="tab-panel active"> <!-- /// Cast tab // -->
								<?php // foreach($json['crew'] as $crew){?>	 
								    <div class="cell-3 fx animated bounceInUp" data-animate="bounceInUp">
									<div class="team-box-2">
				    					<div class="team-img">
				    						<img alt="" src="http://image.tmdb.org/t/p/w342/<?php // echo $crew['profile_path']; ?>">
				    					</div>
				    					<div class="team-details">
			                                <h3 style="font-size:14px;"><?php // echo $crew['name']; ?></h3>
			                                <div class="t-position" style="margin-top:-10px;height:41px;"><?php // echo $crew['department']; ?></div>
				    					</div>
				    				</div>
									</div>
								<?php // } ?>
                                     </div>
									
									   
									<div class="tab-panel">   <!-- Crew //// -->
								   <?php // foreach($json['guest_stars'] as $guest){?>	 
								    <div class="cell-3 fx animated bounceInUp" data-animate="bounceInUp">
									<div class="team-box-2">
				    					<div class="team-img">
				    						<img alt="" src="http://image.tmdb.org/t/p/w342/<?php // echo $guest['profile_path']; ?>">
				    					</div>
				    					<div class="team-details">
			                                <h3 style="font-size:14px;"><?php // echo $guest['name']; ?></h3>
			                                <div class="t-position" style="margin-top:-10px;height:41px;"><?php // echo $guest['character']; ?></div>
				    					</div>
				    				</div>
									</div>
								<?php // } ?>
									</div>
									
												<div class="tab-panel">
													 <div class="reviews">
														<div class="comments">
															
														    <ul class="comment-list">
														       <?php // fetchTVTrailer($tvid,$results['epEpisode'],$results['epSeasons']); ?>
														</div>
													</div>
												</div>
												
												<div class="tab-panel">
													 <div id="disqus_thread"></div>
<script>

/**
 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
/*
var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
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
								<div class="widget r-posts-w sale-widget fx" data-animate="fadeInRight">
									<h3 class="widget-head">Screenshots</h3>
									<div class="widget-content">
									<div class="post-img">
									<ul class="gallery">
									
								<?php // $still = CollectScreenshotsTV($tvid,$results['epEpisode'],$results['epSeasons']); 
					// 			foreach($still as $allimages=>$keyimages){
			  //   foreach($keyimages as $totalimages=>$keytotalimages){
				 //   foreach($keytotalimages as $Totalbackdrops=>$Totalbackdropskeys){ 
				 //   if($Totalbackdrops == 'file_path'){
					// $Totalbackdropskeys
				   
								?>
									<li>
						<a href="http://image.tmdb.org/t/p/w500/<?php // echo $Totalbackdropskeys; ?>" rel="prettyPhoto[gallery1]" title="You can add caption to pictures.">
						<img src="{{'/'.$path.$episode->tvseries->poster}}" alt=""style="width:100%;height:150px;">
						</a>
					</li>
								<?php //  }
				  //  }
			   // }
		   //}?>	
									</ul>
									</div>
									</div>
								</div>
							</aside>
						</div>
					</div>
				</div>
				
			<!--	<div class="sectionWrapper gry-pattern similar-products">
					<div class="container">
						<h3 class="block-head">Similar Products</h3>
						<div class="row">
							<div class="cell-4">
			    				<div class="results-box">
			    					<h3 class="results-title"><a href="product.html">Media Tech</a></h3>
			    					<div class="results-img">
			    						<a href="product.html"><img alt="" src="images/shop/pro-1.jpg"></a>
			    					</div>
			    					<div class="results-details">
		                            	<p>Phasellus blandit elementum tellus, nec adipiscing dui elementum non Phasellus blandit elementum tellus, nec adipiscing dui elementum non Phasellus blandit elementum tellus, nec adipiscing dui elementum non</p>
		                            	<div class="right">
		                            		<div class="results-rating">
												<span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span>
											</div>
											<div class="results-price">$50</div>
		                            	</div>
										<div class="left">
											<div class="results-cart">
												<a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i> Add to cart</a>
											</div>
                                            <div class="results-tools">
	                                            <a href="#"><i class="fa fa-heart" data-title="Add to Favourites" data-tooltip="true"></i></a>
	                                            <a href="#"><i class="fa fa-exchange" data-title="Compare" data-tooltip="true"></i></a>
                                            </div>
                                        </div>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="cell-4">
			    				<div class="results-box">
			    					<h3 class="results-title"><a href="product.html">Ultimate Fashion Wear White</a></h3>
			    					<div class="results-img">
			    						<a href="product.html"><img alt="" src="images/shop/pro-2.jpg"></a>
			    					</div>
			    					<div class="results-details">
		                            	<p>Phasellus blandit elementum tellus, nec adipiscing dui elementum non Phasellus blandit elementum tellus, nec adipiscing dui elementum non Phasellus blandit elementum tellus, nec adipiscing dui elementum non</p>
		                            	<div class="right">
		                            		<div class="results-rating">
												<span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span>
											</div>
											<div class="results-price">$150</div>
		                            	</div>
										<div class="left">
											<div class="results-cart">
												<a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i> Add to cart</a>
											</div>
                                            <div class="results-tools">
	                                            <a href="#"><i class="fa fa-heart" data-title="Add to Favourites" data-tooltip="true"></i></a>
	                                            <a href="#"><i class="fa fa-exchange" data-title="Compare" data-tooltip="true"></i></a>
                                            </div>
                                        </div>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="cell-4">
			    				<div class="results-box">
			    					<h3 class="results-title"><a href="product.html">Club Aldo Black Leather</a></h3>
			    					<div class="results-img">
			    						<a href="product.html"><img alt="" src="images/shop/pro-3.jpg"></a>
			    					</div>
			    					<div class="results-details">
				    					<p>Phasellus blandit elementum tellus, nec adipiscing dui elementum non Phasellus blandit elementum tellus, nec adipiscing dui elementum non Phasellus blandit elementum tellus, nec adipiscing dui elementum non</p>
		                            	<div class="right">
		                            		<div class="results-rating">
												<span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span>
											</div>
											<div class="results-price">$80</div>
		                            	</div>
										<div class="left">
											<div class="results-cart">
												<a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i> Add to cart</a>
											</div>
                                            <div class="results-tools">
	                                            <a href="#"><i class="fa fa-heart" data-title="Add to Favourites" data-tooltip="true"></i></a>
	                                            <a href="#"><i class="fa fa-exchange" data-title="Compare" data-tooltip="true"></i></a>
                                            </div>
                                        </div>
			    					</div>
			    				</div>
			    			</div>
						</div>
					</div>
				</div> -->
				
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
	
		<script src="http://vjs.zencdn.net/5.10.7/video.js"></script>
		
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