
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php // echo WEBNAME.' - '.$movCategory; ?></title>
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
						    			{{$tvseries->links()}}
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
								@foreach($tvseries as $key)
											@php
												$poster_dir = ltrim($key->category_name->drive,'fs1/').'/'.$key->year.'/'.$key->poster;
												
						                        $path = $key->category_name->drive.'/'.$key->title.'/';
						                        $path = str_replace(' ','%20',$path);
						                    @endphp
											<div class="cell-2 fx shop-item" data-animate="fadeInUp" style="margin-bottom:15px;padding-right: 0px;">
									    			<div class="team-box" style="background-color:#333;margin-right: -10px;">
							    					<div class="team-img" style="margin-right:5px;margin-left:5px;">
							    					@if(!empty($key->poster) && isset($key->poster))
							    						<img alt="" style="height:267px;" src="{{\Storage::url($poster_dir)}}">
							    					@else
														<img alt="" style="height:267px;" src="/home/images/no_image.png">
							    					@endif
							    					    <span class="yellowbox">{{date('Y',strtotime($key->release_date))}}</span>
														<span class="imdb-rating"><b><b class="fa fa-star"></b></b>{{$key->rating}}</span>
													</div>
													@php
														$link = str_replace('-','*',$key->title);
														$link = str_replace(' ','-',$link);
													
													@endphp
													<a href="/tv-series/{{strtolower($link)}}">
							    					<div class="team-details"  href="/tv-series/{{strtolower($link)}}" style="height:267px;background-color:rgba(0, 0, 0, 0.5);margin-left:0px;width:97.5%;">
						                               
														<p style="height: 100px !important; margin: -4px 0px 0px 0px;">
											{{ $key->title }}
											</p>
											
											@php
												$trailer = explode(",",$key->trailer);
											@endphp
											<a href="/tv-series/{{strtolower($link)}}" class="play-hover" ><i class="fa fa-play-circle play-btn" style="font-size: 60px;margin-top: -30px;margin-left: 55px;margin-bottom: 30px;"></i></a>
											<br>
											<p style="background: radial-gradient(#1E8CAB, #09009a); width:40%; font-size:13px;float:right;margin-left:5px;"><i class="fa fa-eye"></i> {{$key->views}}</p>
											<p style="background: radial-gradient(#5bf77d, #1f730a);font-size:13px;width:55%;float:left;"><span style="color:#000;font-family:impact;"></span><span style="font-family:tahoma;font-weight:bold;color:#333;margin-bottom:10%;">{{trim($key->category_name->menu_name,'TV Series')}}</span></p>
														
											<ul class="gallery clearfix">
											<a href="http://www.youtube.com/watch?v={{$trailer[0]}}" rel="prettyPhoto" style="margin: 2.5% 0 5% 30%;width: 40%;"  title="{{$key->title}}" />
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
						    			{{$tvseries->links()}}
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