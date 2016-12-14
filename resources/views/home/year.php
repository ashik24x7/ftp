<?php 
include('../../Admin/main/core/init.php');
$year = sanitize($_GET['year']);
$movCategory = preg_rplc($_GET['Category']);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>– Fileserver <?php echo $movquality; ?></title>
		<meta name="description" content="Fileserver – all <?php echo $movquality; ?> Movies">
		<meta name="author" content="webacademybd.com">
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
	    <link rel="shortcut icon" href="images/favicon.ico">
		    	
		<!-- CSS StyleSheets -->
		<?php include('includes/stylesheet.php'); ?>
	   
	</head>
	<body>
	    
	    <!-- site preloader start 
	    <div class="page-loader">
	    	<div class="loader-in"></div>
	    </div>
	    <!-- site preloader end -->
	    
	    <div class="pageWrapper">
		    
		    <!-- login box start -->
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
			<?php include('includes/header.php'); ?>
			<!-- Header End -->
			
			<!-- Content Start -->
			<div id="contentWrapper">

				<div class="sectionWrapper" style="padding: 30px 0;">
					<div class="container">
						<div class="row">
							<div class="box success-box center hidden">Your item was added succesfully.</div>
							<div class="clearfix"></div>
							
							<div class="cell-9">
							<?php include('sorting.php'); ?>
								
								<div class="clearfix"></div>
								<div class="pager skew-25" style="margin-bottom:20px;">
						    		<ul>
<?php 

$num_rec_per_page = 20;

$totalMovie = TotalMovieBYCAT($movCategory);

$total_pages = ceil($totalMovie['totlaMovie'] / $num_rec_per_page); 
$start_from = ($page-1) * $total_pages;

if($page > 1){
   $previous = $page - 1;
    echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/categories.php?page='.$previous.'&Category='.$movCategory.'"><i class="fa fa-angle-left"></i></a></li>';
}
echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/categories.php?page=1&Category='.$movCategory.'">1</a></li>'; // Goto 1st page  
echo '<li class="selected"><span class="skew25">'.$page.'</span></li>';
				   for ($i= $page+1; $i<=$total_pages; $i++) { 
				   if($page == $i){
				     $class = "selected";
				   }else{
				     $class = "";
				   }
			echo '<li><a class="skew25 '.$class.'" href="'.URL.'/themes/'.THEME.'/categories.php?page='.$i.'&Category='.$movCategory.'">'.$i.'</a></li>'; 
			if($i >= $page+5){
			   break;
			}
}
echo '<li><span class="skew25">...</span></li>'; // Goto last page
echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/categories.php?page='.$total_pages.'">'.$total_pages.'</a></li>'; // Goto last page
if($page != $total_pages){
   $next = $page + 1;
   echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/categories.php?page='.$next.'&Category='.$movCategory.'"><i class="fa fa-angle-right"></i></a></li>'; // Goto next page  
}				   
?>
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
									<?php $results = MoviesYear($year,$movCategory);
									      foreach($results as $item)
										 {
											
									?>
									<?php include('movie.php'); ?>
										 <?php } ?>
									</div>
								</div>
								
								
								<div class="clearfix"></div>
																							<div class="pager skew-25" style="margin-bottom:20px;">
								
						    		<ul>
<?php 

$num_rec_per_page = 20;

$totalMovie = TotalMovieBYCAT($movCategory);
$total_pages = ceil($totalMovie['totlaMovie'] / $num_rec_per_page); 
$start_from = ($page-1) * $total_pages;

if($page > 1){
   $previous = $page - 1;
    echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/categories.php?page='.$previous.'&Category='.$movCategory.'"><i class="fa fa-angle-left"></i></a></li>';
}
echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/categories.php?page=1&Category='.$movCategory.'">1</a></li>'; // Goto 1st page  
echo '<li class="selected"><span class="skew25">'.$page.'</span></li>';
				   for ($i= $page+1; $i<=$total_pages; $i++) { 
				   if($page == $i){
				     $class = "selected";
				   }else{
				     $class = "";
				   }
			echo '<li><a class="skew25 '.$class.'" href="'.URL.'/themes/'.THEME.'/categories.php?page='.$i.'&Category='.$movCategory.'">'.$i.'</a></li>'; 
			if($i >= $page+5){
			   break;
			}
}
echo '<li><span class="skew25">...</span></li>'; // Goto last page
echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/comingsoon/'.$total_pages.'">'.$total_pages.'</a></li>'; // Goto last page
if($page != $total_pages){
   $next = $page + 1;
   echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/categories.php?page='.$next.'&Category='.$movCategory.'"><i class="fa fa-angle-right"></i></a></li>'; // Goto next page  
}				   
?>
						    		</ul>
					    		</div>
							</div>
							
							<aside class="cell-3 left-shop">
								

								<h3 class="widget-head">Shout Box</h3>
		                        <?php include('shoutbox.php'); ?>
								<!--============== SHOUT BOX ===============--->
								
								
								
								
								
								<div class="widget r-posts-w sale-widget fx" data-animate="fadeInRight" style="padding-bottom: 16px;" >
									<h3 class="widget-head">Recent Movies</h3>
									<div class="widget-content">
										<ul>
											<?php $results = RecentMovies(4);  // this is limit number how many movie you want to show
									    foreach($results as $item2)
										 {
									?>
											<li>
												<div class="post-img" style="max-height:70px inherit;" >
													<img src="http://image.tmdb.org/t/p/w500/<?php  echo $item2['poster']; ?>" alt="<?php echo $item2['MovieTitle']; ?>" title="<?php echo $item2['MovieTitle']; ?>" />
												</div>
												<div class="widget-post-info">
													<h4>
														<a href="single-movie.php?imdbid=<?php echo $item2['MovieID']; ?>"><?php echo $item2['MovieTitle']; ?></a>
													</h4>
													<div class="meta">
													<span>Quality: <?php echo $item2['MovieQuality']; ?></span>
													<span><?php echo $item2['MovieCategory']; ?></span>
													     <span>| Views: <?php echo $item2['views']; ?></span>
														<div class="item-rating">
															<?php 
														   $ratings = floor($item2['MovieRatings']);
                                                           for($i=0;$i<=9;$i++){
															   if($i <= $ratings){
																  echo '<span class="fa fa-star"></span>';  
															   }else{
																   echo '<span class="fa fa-star-o"></span>';
															   }
														   }
														   ?>
														</div>
													</div>
												</div>
											</li>
										 <?php } ?>
										</ul>
									</div>
								</div>
								
								
								<div class="widget r-posts-w sale-widget fx" data-animate="fadeInRight">
									<h3 class="widget-head">Popular Movies</h3>
									<div class="widget-content">
										<ul>
											<?php $results = PopularMovies(4);  // this is limit number how many movie you want to show
									    foreach($results as $item2)
										 {
									?>
											<li>
												<div class="post-img" style="max-height: 70px inherit;" >
												<img src="http://image.tmdb.org/t/p/w500/<?php  echo $item2['poster']; ?>" alt="<?php echo $item2['MovieTitle']; ?>" title="<?php echo $item2['MovieTitle']; ?>" /> 
												</div>
												<div class="widget-post-info">
													<h4>
														<a href="single-movie.php?imdbid=<?php echo $item2['MovieID']; ?>"><?php echo $item2['MovieTitle']; ?></a>
													</h4>
													<div class="meta">
													     <span>Quality: <?php echo $item2['MovieQuality']; ?></span>
													<span><?php echo $item2['MovieCategory']; ?></span>
													     <span>| Views: <?php echo $item2['views']; ?></span>
													     
														<div class="item-rating">
														<?php $ratings = round($item2['MovieRatings']);
                                                           for($i=0;$i<=9;$i++){
															   if($i <= $ratings){
																  echo '<span class="fa fa-star"></span>';  
															   }else{
																   echo '<span class="fa fa-star-o"></span>';
															   }
														   }
														?>
														</div>
													</div>
												</div>
											</li>
										 <?php } ?>
										</ul>
									</div>
								</div>
								<div class="widget blog-cat-w fx" data-animate="fadeInRight" style="margin-top:-30px;">
									<h3 class="widget-head">categories</h3>
									<div class="widget-content">
										<ul class="list list-ok alt">
										<?php CetegoriesCollect($movCategory); ?>
										</ul>
									</div>
								</div>
							</aside>
							
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
	    

	    <!-- Load JS siles -->	
		<?php include('includes/scripts.php'); ?>
		
		
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