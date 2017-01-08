<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php // // echo WEBNAME.' - '.$GAMESCategory; ?></title>
		<meta name="description" content="">
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
				
				<div class="sectionWrapper">
					<div class="container">
						<div class="portfolio-filterable">
							<div class="row" style="margin-top: -50px;">
								
								<div class="pager skew-25" style="margin-bottom:20px;">
						    		<ul>
						    			{{$games->links()}}
						    		</ul>
								</div>
								
								<div class="portfolio-items" id="container">
                                @foreach($games as $game)
                                	@php
			    						$path = '/'.$game->category_name->drive.'/'.$game->name.'/';
			    						$path = str_replace(' ','%20',$path);
			    						$path = str_replace('[','%5B',$path);
			    						$path = str_replace(']','%5D',$path);

			    					@endphp
									<div class="cell-3 seo" data-category="seo" style="position: absolute; left: 877px; top: 276px;">
										<div class="portfolio-item" style="margin-top: 5px;margin-bottom:10px;">
											<div class="img-holder">
												<div class="img-over" style="display: none;">
													<a href="{{$path.$game->path}}" class="fx link undefined // animated fadeOutUp"><b class="fa fa-link"></b></a>
													<a href="{{$path.$game->path}}" class="fx zoom undefined animated fadeOutDown" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
												</div>
												<img alt="" src="{{$path.$game->cover}}">
											</div>
											<div class="name-holder">
											<a href="{{$path.$game->path}}" class="project-name" style="height:45px;" >{{$game->name}}</a>
											<span class="project-options">{{$game->category_name->menu_name}} ({{$game->size}})</span>
										</div>
										</div>
									</div>
								@endforeach
								</div>
								
								<div class="clearfix"></div>
											<div class="pager skew-25" style="margin-bottom:20px;">
						    		<ul>
						    			{{$games->links()}}
						    		</ul>
								</div>
								
								
							</div>
						</div>
					</div>
					
					
					
					
				</div>
			</div>
			
			<!-- Content End -->
			
			<!-- Footer start -->
		    @include('admin.partial.footer')
		    <!-- Footer end -->
		    
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

		
		
	</body>
</html>