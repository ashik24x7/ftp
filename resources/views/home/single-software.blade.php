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
		a:hover{
			text-decoration:none;
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
										<div class="price-box"><span class="product-price">{{$software->name}}</span></div>
										
									</div>
						
								@php
									$poster_dir = 'storage'.ltrim($software->category_name->drive,'fs1').'/'.$software->cover;

									$path = 'http://43.230.123.21';
		    						$path .= '/'.$software->category_name->drive.'/'.$software->folder_name;
		    						$path = str_replace(' ','%20',$path);
		    						$path = str_replace('[','%5B',$path);
		    						$path = str_replace(']','%5D',$path);

		    					@endphp
									
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
									    <label class="control-label"><i class="fa fa-paper-plane-o"></i>Category:</label>
										<a class="btn btn-md btn-orange btn-outlined fx animated fadeInDown" href="#" data-animate="fadeInDown" data-animation-delay="700" style="animation-delay: 700ms;">
										<span><i class="fa fa-film"></i>{{$software->category_name->menu_name}}</span></a>
										<label class="control-label"><i class="fa fa-paper-plane-o"></i>Platform:</label>
										<a href="" class="btn btn-small btn-border">{{$software->platform}}</a>
									</div>
										<label class="control-label"><i class="fa fa-align-justify"></i>Requirment:</label>
				                        <div class="showContent hideContent">{!! nl2br($software->requirement) !!}</div>
										
									</div>
									</div>
									</div>
									<div class="cell-3">
									<ul style="width:120%;">
									  <li><br>
									  <label class="control-label">Uploaded: <font color="#bbb"> {{$software->created_at->diffForHumans()}}</font></label>
									      
									  </li>
									  <label class="control-label">Size: {{$software->size}}<font color="#bbb"></font></label>
									  </li>
									  <br>
									  <li>
									  <a class="btn btn-md btn-3d btn-blue fx animated fadeInUp" href="" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;" data-toggle="modal" data-target="#myModal">
										<span><i class="fa fa-download"></i>Download</span> </a>
									  </li>
									  <li>&nbsp;</li>
									 
									 </ul>


									<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top:150px;width: 700px;margin-left: -95px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">{{$software->folder_name}}</h4>
        </div>
        <div class="modal-body">
           <iframe src="{{$path}}" width="100%" height="200" frameborder="0" allowtransparency="true" ></iframe> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 									 
									</div>
									</div>
									
				
								</div>
								<div class="clearfix"></div>
								
							</div>
							
							<aside class="cell-3 left-shop">

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