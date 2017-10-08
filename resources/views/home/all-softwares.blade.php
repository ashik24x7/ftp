<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php //echo WEBNAME.' - ' ?></title>
		<meta name="description" content="{description}">
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
		
		



	</head>
	<body>
	    
	    <!-- site preloader start -->
	    <div class="page-loader">
	    	<div class="loader-in"></div>
	    </div>
	    <!-- site preloader end -->
	    
	    <div class="pageWrapper fixedPage">
		    
		    <!-- login box start -->
		
			<!-- login box End -->

			<!-- Header Start -->
			@include('home.partial.header')
			<!-- Header End -->
			
			<!-- Content Start -->
			<div id="contentWrapper">
				<!--<div class="page-title title-1">
					<div class="container">
						<div class="row">
							<div class="cell-12">
								<h1 class="fx" data-animate="fadeInLeft">Services <span>Page</span></h1>
								<div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
									<span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><a href="#">Pages </a><span class="line-separate">/</span><span>Services page</span>
								</div>
							</div>
						</div>
					</div>
				</div>-->
				
				<div class="sectionWrapper" style="min-height:700px;">
					<div class="container">
						<div class="row">
						@foreach($softwares as $software)
                            	@php
									$poster_dir = '/storage'.ltrim($software->category_name->drive,'fs1').'/'.$software->cover;
									
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