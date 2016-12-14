<?php 
include('../../Admin/main/core/init.php');
$page = stripslashes(mysqli_real_escape_string($connect_baza,$_GET['page']));
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Coming Soon Movies – <?php echo WEBNAME; ?></title>
		<meta name="description" content="EXCEPTION – Responsive Business HTML Template">
		<meta name="author" content="EXCEPTION">
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
	  
		    	
		<!-- CSS StyleSheets -->
		<?php include('includes/stylesheet.php'); ?>
		
	   
	</head>
	<body>
	    
	    <!-- site preloader start -->
	    
	    <!-- site preloader end -->
	    
	    <div class="pageWrapper">
		    
		    <!-- login box start -->
	
			<!-- login box End -->

			<!-- Header Start -->
			<?php include('includes/header.php'); ?>
			<!-- Header End -->
			
			<!-- Content Start -->
			<div id="contentWrapper">

				<div class="sectionWrapper" style="padding: 30px 0;">
					<div class="container">
						<div class="row">
							<div class="box success-box center hidden">Your item was added succesfully.</div>
							<div class="clearfix"></div>
							
							<div class="cell-12">
								<div class="toolsBar">
									<div class="cell-10 left products-filter-top">
									<div class="left">
											<a class="btn btn-md btn-square btn-pink fx animated fadeInDown" href="#" data-animate="fadeInDown" data-animation-delay="300" style="animation-delay: 300ms;">
										<span><i class="fa fa-bookmark selectedI"></i>Coming Soon</span>
									         </a>
										</div>
										<div class="left">
										&nbsp;&nbsp;&nbsp;
											<a class="btn btn-md btn-square main-bg fx animated fadeInDown" href="#" data-animate="fadeInDown" data-animation-delay="300" style="animation-delay: 300ms;">
										<span><i class="fa fa-bookmark"></i>Now Playing ..</span>
									         </a>
										</div>
										<div class="left">
										&nbsp;&nbsp;&nbsp;
											<a class="btn btn-md btn-square main-bg fx animated fadeInDown" href="#" data-animate="fadeInDown" data-animation-delay="300" style="animation-delay: 300ms;">
										<span><i class="fa fa-bookmark selectedI"></i>Top Rated</span>
									         </a>
										</div>
										<div class="left">
										&nbsp;&nbsp;&nbsp;
											<a class="btn btn-md btn-square main-bg fx animated fadeInDown" href="#" data-animate="fadeInDown" data-animation-delay="300" style="animation-delay: 300ms;">
										<span><i class="fa fa-bookmark selectedI"></i>Popular Movies</span>
									         </a>
										</div>
									</div>
									<div class="right cell-2 list-grid">
										<a class="list-btn" href="#" data-title="List view" data-tooltip="true"><i class="fa fa-list"></i></a>
									</div>
								</div>
								
								<div class="clearfix"></div>
								<div class="pager skew-25" style="margin-bottom:20px;">
								
						    		<ul>
<?php 
$total_pages = 7; 
if($page > 1){
   $previous = $page - 1;
    echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/comingsoon/'.$previous.'"><i class="fa fa-angle-left"></i></a></li>';
}
echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/comingsoon/1"">1</a></li>'; // Goto 1st page  
echo '<li class="selected"><span class="skew25">'.$page.'</span></li>';
				   for ($i= $page+1; $i<=$total_pages; $i++) { 
				   if($page == $i){
				     $class = "selected";
				   }else{
				     $class = "";
				   }
			echo '<li><a class="skew25 '.$class.'" href="'.URL.'/themes/'.THEME.'/comingsoon/'.$i.'">'.$i.'</a></li>'; 
			if($i >= $page+4){
			   break;
			}
}
echo '<li><span class="skew25">...</span></li>'; // Goto last page
echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/comingsoon/'.$total_pages.'">'.$total_pages.'</a></li>'; // Goto last page
if($page != $total_pages){
   $next = $page + 1;
   echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/comingsoon/'.$next.'"><i class="fa fa-angle-right"></i></a></li>'; // Goto next page  
}				   
?>
						    		</ul>
					    		</div>
								<div class="grid-list">
									<div class="row" id="test2">
									<style>.team-box .team-details p {
				margin-bottom: 10px; font-size:15px; height: 27px !important; text-align:center; padding:5px !important;
                }
				.play-hover p:hover{
					background:radial-gradient(#059002, #5b9d4b);
					font-size:14px;
				}
				.none{
					display:none;
				}
				</style>
									<?php 
									$url = file_get_contents("http://api.themoviedb.org/3/movie/upcoming?page=$page&api_key=".API_KEY);
										$json = json_decode($url, true);
										$results = $json['results'];
									foreach($results as $allresults){
										//echo $allresults['original_title'].'<br>';
										$trailer = $allresults['id'].'<br>';
									?>
									
									<div class="cell-2 fx shop-item" data-animate="fadeInUp" style="margin-bottom:20px;">
						    				<div class="team-box">
				    					<div class="team-img">
										<?php if($allresults['poster_path'] != ''){?>
				    						<img alt="" style="height:238px;" src="http://image.tmdb.org/t/p/w342/<?php echo $allresults['poster_path'];?>">
										<?php
										}else{
											echo '<img alt="" style="height:238px;" src="'.URL.'/themes/'.THEME.'/images/d38bc38ad9ba60f9091aa2a9b3f4190f.png">';
										}
										?>
				    						<h3><?php if(strlen($allresults['original_title']) < 20){ echo $allresults['original_title'];}else{ echo "<marquee style='margin-bottom:-10px;' scrolldelay='100'>".$allresults['original_title']."</marquee>";}  ?></h3>
				    					</div>
										<a href="#">
				    					<div class="team-details"  href="#" style="background-color:rgba(0, 0, 0, 0.5);">
			                                <h3 class="gry-bg"><?php if(strlen($allresults['original_title']) < 20){ echo $allresults['original_title'];}else{ echo "<marquee style='margin-bottom:-10px;'>".$allresults['original_title']."</marquee>";}  ?></h3>
			                                <p style="height: 100px !important; margin: 4px 0px 9px 0px;" data-title="read More.." data-tooltip="true"><?php echo substr($allresults['overview'],0,73).'..'; ?></p>
											<?php //$oneTrailer = explode(",",$allresults['MovieTrailer']); ?>
											<ul class="gallery clearfix">
											<a href="http://www.youtube.com/watch?v=<?php echo fetchTrailer($trailer); ?>" rel="prettyPhoto" style="margin: 2.5% 0 5% 30%;width: 40%;" class="btn btn-small btn-border selected" title="YouTube demo"><i class="fa fa-youtube-play" style="font-size:16px;margin-top:10px;"></i></a>
											</ul>
											<p style="background:radial-gradient(#ffffb8, #ce981d);"><span style="color:#000;font-family:impact;">IMDb &nbsp;</span><span style="font-family:tahoma;font-weight:bold;color:#333;"><?php echo $allresults['vote_average']; ?>/10</span></p>
											<p style="background:radial-gradient(#fff0e5, #b7b7b7);" data-title="Release Date" data-tooltip="true"><span style="color:#000;font-family:impact;"></span><span style="font-family:tahoma;font-weight:bold;color:#333;"><?php echo $allresults['release_date']; ?></span></p>
											
				    					</div>
										</a>
										
				    				</div>
						    		</div>
									
									<?php } ?>
									</div>
								</div>
								
								
								<div class="clearfix"></div>
								<div class="pager skew-25">
						    		<ul>
						    			<?php 
$total_pages = 7; 
if($page > 1){
   $previous = $page - 1;
    echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/comingsoon/'.$previous.'"><i class="fa fa-angle-left"></i></a></li>';
}
echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/comingsoon/1"">1</a></li>'; // Goto 1st page  
echo '<li class="selected"><span class="skew25">'.$page.'</span></li>';
				   for ($i= $page+1; $i<=$total_pages; $i++) { 
				   if($page == $i){
				     $class = "selected";
				   }else{
				     $class = "";
				   }
			echo '<li><a class="skew25 '.$class.'" href="'.URL.'/themes/'.THEME.'/comingsoon/'.$i.'">'.$i.'</a></li>'; 
			if($i >= $page+4){
			   break;
			}
}
echo '<li><span class="skew25">...</span></li>'; // Goto last page
echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/comingsoon/'.$total_pages.'">'.$total_pages.'</a></li>'; // Goto last page
if($page != $total_pages){
   $next = $page + 1;
   echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/comingsoon/'.$next.'"><i class="fa fa-angle-right"></i></a></li>'; // Goto next page  
}				   
?>
						    		</ul>
					    		</div>
							</div>
							
							
							
						</div>
					</div>
				</div>
				
			</div>
			<!-- Content End -->
			
			<!-- Footer start -->
		    <?php include('includes/footer.php'); ?>
		    <!-- Footer end -->
		    
		    <!-- Back to top Link -->
	    	<div id="to-top" class="main-bg"><span class="fa fa-chevron-up"></span></div>
	    
	    </div>
	    
       <?php include('includes/scripts.php'); ?>
	    <!-- Load JS siles -->	
		
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
	    <!-- Waypoints script -->
		
	</body>
</html>