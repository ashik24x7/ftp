<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Ebox File Server</title>
		<meta name="description" content="Ebox File Server – Biggest Movie File Server">
		<meta name="author" content="Webacademybd">
		
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
		</style>
	
	</head>
	<body>
	    
	    <!-- site preloader start -->
		
		<div class="page-loader">
			<div class="loader-in"></div>
		</div>
				
	     
	   
	    <div class="pageWrapper">
		    
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
			</style>
				
				<div class="welcome gry-pattern" style="padding: 9px 0px 17px 0px;">
					<div class="container">
						<h3 class="block-head" style="margin-left:-9px;margin-bottom: 12px;margin-top: 2px;">Recently Added Movies 
						<a class="btn btn-md btn-3d main-bg fx animated fadeInUp pull-right" href="allmovies.php?page=1" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;-webkit-box-shadow: 0 0 0 0;box-shadow: 0 0 0 0;margin-right: -9px;padding: 2px 10px;">
										<span>View All Movies</span>
									</a></h3>
						
						<div class="portfolioGallery portfolio" style="margin-top: -6px;">
						@foreach($movies as $movie)
							<div>
								<div class="team-box" style="">
				    					<div class="team-img" style="margin-right:5px;margin-left:5px;">
				    						<img alt="" style="height:274px;" src="{{$path = 'fs1'.'/Hollywood'.'/2006/'.$movie->title.' [2006]/'.$movie->poster}}">
				    					    <span class="yellowbox">{{$movie->year}}</span>
											<span class="imdb-rating"><b><b class="fa fa-star"></b></b>{{$movie->rating}}</span>
										</div>

										<a href="single-movie.php?imdbid=<?php // echo $item['MovieID']; ?>">
				    					<div class="team-details"  href="single-movie.php?imdbid=<?php // echo $item['MovieID']; ?>" style="height:280px;background-color:rgba(0, 0, 0, 0.5);margin-left:0px;width:97.5%;">
			                               
											<p style="height: 100px !important; margin: -4px 0px 0px 0px;">
											{{ $movie->title.' ['.$movie->year.']' }}
											</p>
											
											<?php // $oneTrailer = explode(",",$item['MovieTrailer']); ?>
											<a href="single-movie.php?imdbid=<?php // echo $item['MovieID']; ?>" class="play-hover" ><i class="fa fa-play-circle play-btn"></i></a>
											<br>
											<p style="background: radial-gradient(#1E8CAB, #09009a); width:40%; font-size:13px;float:right;margin-left:5px;"><i class="fa fa-eye"></i> {{$movie->views}}</p>
											
											<p style="background:radial-gradient(#EA0A5D, #5A0000);font-size:13px;">{{$movie->quality}}</p>
											<p style="background: radial-gradient(#5bf77d, #1f730a);font-size:13px;width:60%;float:left;"><span style="color:#000;font-family:impact;"></span><span style="font-family:tahoma;font-weight:bold;color:#333;margin-bottom:10%;">{{$movie->category}}</span></p>
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
						@endforeach
						</div>
						
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- Welcome Box end -->
				
				<!-- FUN Staff start -->
				<div class="fun-staff staff-1 block-bg-2 sectionWrapper" style="height: 345px;">
					<div class="container">
						<div class="row">
							
							<div class="portfolio-filterable">
							
							<div class="row" style="margin-top:-70px;margin-bottom:-20px;">
									<!-- staff item start -->
								<h3 class="block-head" style="margin-left:12px;">Recently Added Games
								<a class="btn btn-md btn-3d main-bg fx animated fadeInUp pull-right" href="allgames.php?page=1" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;-webkit-box-shadow: 0 0 0 0;box-shadow: 0 0 0 0;margin-right: 14px;margin-top: 4px;padding: 2px 10px;">
										<span>View All Games</span>
									</a>
								</h3> 
									<div class="portfolio-items" id="container">
                                <?php // $results = GamesCategory(18,0,4);
									      //foreach($results as $item)
										// {
										
									?>
									<div class="cell-3 seo" data-category="seo" style="position: absolute; left: 877px; top: 0px;">
										<div class="portfolio-item">
											<div class="img-holder">
												<div class="img-over" style="display: none;">
													<a href="about-games.php?t=<?php // echo str_replace(" ","-",$item['title']);?>" class="fx link undefined animated fadeOutUp"><b class="fa fa-link"></b></a>
													<a href="<?php // echo URL.'/'.$item['cover_pic']; ?>" class="fx zoom undefined animated fadeOutDown" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
												</div>
												<a href="about-games.php?t=<?php // echo str_replace(" ","-",$item['title']);?>"><img alt="" src="<?php // echo URL.'/'.$item['cover_pic']; ?>"></a>
											</div>
											<div class="name-holder">
											<a href="about-games.php?t=<?php // echo str_replace(" ","-",$item['title']);?>" class="project-name" style="height:45px;"><?php // echo $item['title']; ?></a>
											<span class="project-options"><?php // $t = takeQuality($item['con_cat']); echo $t['menu_name']; ?> (<?php // echo $item['filesize']; ?>)</span>
										</div>
										</div>
									</div>
										 <?php // } ?>
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
				<div class="gry-pattern">
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
						<h3 class="block-head" style="margin-top:-10px;" >Recently Added TV Series
						<a class="btn btn-md btn-3d main-bg fx animated fadeInUp pull-right" href="alltvseries.php?page=1" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;-webkit-box-shadow: 0 0 0 0;box-shadow: 0 0 0 0;margin-right: 8px;margin-top: 4px;
    padding: 2px 10px;">
										<span>View All TV Series</span>
									</a>
						</h3> 
					<?php // $items = tvSeries(6); 
					//foreach($items as $item){
					?>
		
					   <div class="cell-2 fx shop-item animated fadeInUp" data-animate="fadeInUp" style="padding-left:0px;padding-right:8px;">
							
							<div class="item-box">
							
								<div class="item-img">
					<a href="single_episode.php?tvid=<?php // echo $item['TVID']; ?>&s=<?php // echo $item['epSeasons']; ?>&e=<?php // echo $item['epEpisode']; ?>">
					<span class="sale" style="width: 80px;">Episode: <?php // echo $item['epEpisode']; ?></span>
					<span class="sale2" style="width: 72px;">Seasons: <?php // echo $item['epSeasons']; ?></span>
					<img alt="" src="../../Admin/main/TVseries/<?php // echo $item['TVtitle'].'/'.$item['TVID'].'/poster/'.$item['TVposter']; ?>"></a>
								</div>
								<h3 class="item-title">
							<a href="single_episode.php?tvid=<?php // echo $item['TVID']; ?>&s=<?php // echo $item['epSeasons']; ?>&e=<?php // echo $item['epEpisode']; ?>"><?php // echo $item['TVtitle']; ?></a>
							</h3>
							</div>
					   </div>
					   
					<?php // } ?>	
										
										
						
						</div>
					</div>
				</div>
				<!-- Services boxes style 1 start -->
							<!-- About us and Features container start -->

				<!-- Portfolio start -->
				<div class="sectionWrapper" style="background-color:#171717;height:330px;">
				
					<div class="container" >
					<h3 class="block-head" style="margin-top: -70px;margin-bottom: 28px;" >Recently Added Softwares</h3> 
						<div class="row">
							<div class="cell-12">
			
			                <?php // $results = AllSoftwareBYCat(0,0,12);
									      //foreach($results as $item)
										 //{	
									?>
							<div class="cell-2 service-box-2 fx" data-animate="fadeInDown">
								<div class="box-2-cont">
									<i><img src="<?php // echo URL.'/'.$item['cover']; ?>" style="margin-top:-50px;width:100px;height:100px;" /></i>
									<h4 style="height:54px;font-size:14px;margin-top:10px;"><?php // echo $item['title']; ?></h4>
									<div class="center sub-title main-color"> Filesize: - (<?php // echo $item['filesize']; ?>)</div>
									<a class="r-more main-color" href="<?php // echo $item['downLink']; ?>">Download</a>
								</div>
							</div>
						<?php // } ?>
			
							</div>
						</div>
					</div>
				</div>
				<!-- Portfolio end 
			
							<div class="sectionWrapper">
					<div class="container">
					
                        <div class="portfolioGallery portfolio" style="margin-top:-65px;margin-bottom:-35px;">
						<h3 class="block-head" style="margin-left:-10px;">Populer Movies</h3> 
						<?php // //$results = PopularMovies(6);  // this is limit number how many movie you want to show
									   // foreach($results as $item)
										// {
									?>
							<div>
									<div class="team-box" style="background-color:#333;">
				    					<div class="team-img" style="margin-right:5px;margin-left:5px;">
				    						<img alt="" style="height:280px;" src="http://image.tmdb.org/t/p/w500/<?php //  //echo $item['poster']; ?>">
				    					    <span class="yellowbox"><?php // //echo $item['MovieYear']; ?></span>
											<span class="imdb-rating"><b><b class="fa fa-star"></b></b> <?php // //echo $item['MovieRatings']; ?></span>
										</div>

										<a href="single-movie.php?imdbid=<?php // //echo $item['MovieID']; ?>">
				    					<div class="team-details"  href="single-movie.php?imdbid=<?php // //echo $item['MovieID']; ?>" style="height:280px;background-color:rgba(0, 0, 0, 0.5);margin-left:0px;width:97.5%;">
			                               
											<p style="height: 100px !important; margin: -4px 0px 0px 0px;">
											<?php //  //echo $item['MovieTitle'].' ['.$item['MovieYear'].']'; ?>
											</p>
											
											<?php // //$oneTrailer = explode(",",$item['MovieTrailer']); ?>
											<a href="single-movie.php?imdbid=<?php // //echo $item['MovieID']; ?>" class="play-hover" ><i class="fa fa-play-circle play-btn"></i></a>
											<br>
											<p style="background: radial-gradient(#09009A, #1E8CAB); width:40%; float:right;margin-left:5px;"><i class="fa fa-eye"></i> <?php //// echo $item['views']; ?></p>
											<p style="background:radial-gradient(#EA0A5D, #5A0000);"><?php // //echo $item['MovieQuality']; ?></p>
											
											<p style="background:radial-gradient(#ffffb8, #ce981d);"><span style="color:#000;font-family:impact;">IMDb &nbsp;</span><span style="font-family:tahoma;font-weight:bold;color:#333;margin-bottom:10%;"><?php // //echo $item['MovieRatings']; ?>/10</span></p>
											
				    					    
											<ul class="gallery clearfix">
											<a href="http://www.youtube.com/watch?v=<?php //// echo $oneTrailer[0]; ?>" rel="prettyPhoto" style="margin: 2.5% 0 5% 30%;width: 40%;"  title="<?php //// echo $item['MovieTitle']; ?>">
											<img src="<?php // //echo URL.'/themes/'.THEME;?>/trailer.png" style="margin-left: -48px;margin-top:0px;margin-bottom: 10px;" />
											</a>
											</ul>
											
										</div>
										</a>
				    			</div>
							</div>
							<?php //// } ?>
							
							
							
						</div>
					</div>
				</div> -->
				
				
		
				
			</div>
			
			
			
			<!-- Content End -->
			
			<!-- Footer start -->
	<?php // include('includes/footer.php'); ?>
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