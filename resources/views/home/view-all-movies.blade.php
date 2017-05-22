<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title></title>
		
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
	    <link rel="shortcut icon" href="images/favicon.ico">
		
		    	
		<!-- CSS StyleSheets -->
		<link rel="shortcut icon" href="/home/images/favicon.ico">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&amp;amp;subset=latin,latin-ext">
		<link rel="stylesheet" href="css/font-awesome.min.css">

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
	    
	    <div class="pageWrapper fixedPage">
			<!-- Header Start -->
			<?php // include('includes/header.php'); ?>
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
						    		<li><a class="skew25" href=""><i class="fa fa-angle-left"></i></a></li>
						    		<li><a class="skew25" href="">1</a></li>
						    		<li><span class="skew25">...</span></li><li><a class="skew25" href="">
						    		<li><a class="skew25" href=""></a></li>
						    		<li><a class="skew25" href=""></a></li>
						    		<li class="selected"><span class="skew25"></span></li>
						    		<li><a class="skew25" href=""></a></li>
						    		<li><span class="skew25">...</span></li>
						    		<li><a class="skew25" href=""></a></li>
						    		<li><a class="skew25" href=""><i class="fa fa-angle-right"></i></a></li>
						    	</ul>
					    		</div>
								<div class="grid-list">
									<div class="row">
									<style>.team-box .team-details p {
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
								<div class="cell-2 fx shop-item" data-animate="fadeInUp" style="margin-bottom:15px;padding-right: 0px;">
						    			<div class="team-box" style="background-color:#333;margin-right: -10px;">
				    					<div class="team-img" style="margin-right:5px;margin-left:5px;">
				    						<img alt="" style="height:267px;" src="">
				    					    <span class="yellowbox"><?php // //echo $item['MovieYear']; ?></span>
											<span class="imdb-rating"><b><b class="fa fa-star"></b></b> <?php // if($item['MovieRatings'] != 0){echo $item['MovieRatings'];}else{ echo 'N/A'; } ?></span>
										</div>
										
										<a href="single-movie.php?imdbid=<?php // echo $item['MovieID']; ?>">
				    					<div class="team-details"  href="single-movie.php?imdbid=<?php // echo $item['MovieID']; ?>" style="height:267px;background-color:rgba(0, 0, 0, 0.5);margin-left:0px;width:97.5%;">
			                               
											<p style="height: 100px !important; margin: -4px 0px 0px 0px;">
											<?php //  echo $item['MovieTitle'].' ['.$item['MovieYear'].']'; ?>
											</p>
											
											<?php // $oneTrailer = explode(",",$item['MovieTrailer']); ?>
											<a href="single-movie.php?imdbid=<?php // echo $item['MovieID']; ?>" class="play-hover" ><i class="fa fa-play-circle play-btn"></i></a>
											<br>
											<p style="background: radial-gradient(#09009A, #1E8CAB); width:40%; float:right;margin-left:5px;"><i class="fa fa-eye"></i> <?php // echo $item['views']; ?></p>
											
											<p style="background:radial-gradient(#EA0A5D, #5A0000);font-size:13px;"><?php // echo $item['MovieQuality']; ?></p>
											<p style="background: radial-gradient(#5bf77d, #1f730a);font-size:13px;width:60%;float:left;"><span style="color:#000;font-family:impact;"></span><span style="font-family:tahoma;font-weight:bold;color:#333;margin-bottom:10%;"><?php // echo ucfirst($item['MovieCategory']); ?></span></p>
											<p style="background: radial-gradient(#b0e2ff, #337ab7);font-size:13px;width:37%;float:right;"><span style="color:#000;font-family:impact;"></span><span style="font-family:tahoma;font-weight:bold;color:#333;margin-bottom:10%;"><?php // if(strpos($item['MovieSize'], 'GB') !== false){ echo $item['MovieSize'];}else{echo floor($item['MovieSize']).' MB';} ?></span></p>
											
											<ul class="gallery clearfix">
											<a href="http://www.youtube.com/watch?v=<?php // echo $oneTrailer[0]; ?>" rel="prettyPhoto" style="margin: 2.5% 0 5% 30%;width: 40%;"  title="<?php // echo $item['MovieTitle']; ?>">
											<img src="<?php // echo URL.'/themes/'.THEME;?>/trailer.png" style="margin-left: -48px;margin-top:0px;margin-bottom: 10px;" />
											</a>
											</ul>
											
										</div>
										</a>
				    			</div>
						    		</div>
										 <?php // } ?>
									</div>
								</div>
								
								
								<div class="clearfix"></div>							<div class="pager skew-25" style="margin-bottom:20px;">
								
						    		<ul>
						    		<li><a class="skew25" href=""><i class="fa fa-angle-left"></i></a></li>
						    		<li><a class="skew25" href="">1</a></li>
						    		<li><span class="skew25">...</span></li>
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
	    

	    @include('admin.partial.script')

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