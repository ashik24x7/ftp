
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php // echo WEBNAME.' - '.$movCategory; ?></title>
		<meta name="description" content="{description}">
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
						var value = $("#form").serialize();
						console.log(value);
						$.ajax({
							type:"POST",
							url:"shout_process.php",
							data:value,
							success:function(res){
								$("#message").html(res);
							}
						});
						
					}
				  setInterval(function(){
					$("#load").load("chat_view.php").fadeIn("slow");
				  },1000)
			})


      $("#load").load("menu_view.php").fadeIn("slow");
      





		})

	</script>
	<style>
		.item-img img {
			height: 280px;
		}
	</style>
	</head>
	<body>
	    
	    <!-- site preloader start -->
	   
	    <!-- site preloader end -->
	    
	    <div class="pageWrapper fixedPage">
		    
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

				<div class="sectionWrapper" style="padding: 30px 0;">
					<div class="container">
						<div class="row">
							<div class="box success-box center hidden">Your item was added succesfully.</div>
							<div class="clearfix"></div>
							
							<div class="cell-12">
								
								
								<div class="clearfix"></div>
								<div class="pager skew-25" style="margin-bottom:20px;">
						    		<ul>
						    			{{$episodes->links()}}
						    		</ul>
					    		</div>
								<div class="grid-list">
									<div class="row">
									<style>.team-box .team-details p {
				margin-bottom: 10px; font-size:15px; height: 27px !important; text-align:center; padding:5px !important;
                }
				.play-hover p:hover{
					background:radial-gradient(#059002, #5b9d4b);
					font-size:14px;
				}
				</style>
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
							<a href="/tv-series/{{$episode->tvseries->id}}/season/{{$episode->season}}/episode/{{$episode->episode}}">
							
							{{substr($episode->tvseries->title,0,18)}}
								@if(strlen($episode->tvseries->title) > 19)
									[..]
								@endif
							</a>
							</h3>
							</div>
					   </div>
					   
				@endforeach	
									</div>
								</div>
								
								
								<div class="clearfix"></div>
								<div class="pager skew-25" style="margin-bottom:20px;">
						    		<ul>
						    			{{$episodes->links()}}
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