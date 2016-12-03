<?php 
include('../../Admin/main/core/init.php');

$page = stripslashes(mysqli_real_escape_string($connect_baza,$_GET['page']));
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php echo WEBNAME.' - '.$GAMESCategory; ?></title>
		<meta name="description" content="{description}">
		<meta name="author" content="Kamruddin bivob">
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
	    <link rel="shortcut icon" href="images/favicon.ico">
		
		    	
		<!-- CSS StyleSheets -->
		<?php include('includes/stylesheet.php'); ?>
		
		



	</head>
	<body>
	    
	    <!-- site preloader start -->
	   
	    <!-- site preloader end -->
	    
	    <div class="pageWrapper">
		    
			<!-- Header Start -->
		<?php include('includes/header.php'); ?>
			<!-- Header End -->
			
			<!-- Content Start -->
			<div id="contentWrapper">
				
				<div class="sectionWrapper">
					<div class="container">
						<div class="portfolio-filterable">
							<div class="row" style="margin-top: -50px;">
								
								<div class="pager skew-25" style="margin-bottom:20px;">
						    		<ul>
<?php 

$num_rec_per_page = 12;

$totlaGame = TotalGames();
$total_pages = ceil($totlaGame['totlaGames'] / $num_rec_per_page); 
$start_from = ($page-1) * $num_rec_per_page;

if($page > 1){
   $previous = $page - 1;
    echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/allgames.php?page='.$previous.'"><i class="fa fa-angle-left"></i></a></li>';
}
echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/allgames.php?page=1">1</a></li>'; // Goto 1st page  
echo '<li class="selected"><span class="skew25">'.$page.'</span></li>';
				   for ($i= $page+1; $i<=$total_pages; $i++) { 
				   if($page == $i){
				     $class = "selected";
				   }else{
				     $class = "";
				   }
			echo '<li><a class="skew25 '.$class.'" href="'.URL.'/themes/'.THEME.'/allgames.php?page='.$i.'">'.$i.'</a></li>'; 
			if($i >= $page+5){
			   break;
			}
}
echo '<li><span class="skew25">...</span></li>'; // Goto last page
echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/allgames.php?page=/'.$total_pages.'">'.$total_pages.'</a></li>'; // Goto last page
if($page != $total_pages){
   $next = $page + 1;
   echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/allgames.php?page='.$next.'"><i class="fa fa-angle-right"></i></a></li>'; // Goto next page  
}				   
?>
								</div>
								
								<div class="portfolio-items" id="container">
                                <?php $results = AllGames2(0,$start_from,$num_rec_per_page);
									      foreach($results as $item)
										 {
											
									?>
									<div class="cell-3 seo" data-category="seo" style="position: absolute; left: 877px; top: 276px;">
										<div class="portfolio-item" style="margin-top: 5px;margin-bottom:10px;">
											<div class="img-holder">
												<div class="img-over" style="display: none;">
													<a href="about-allgames.php?t=<?php echo str_replace(" ","-",$item['title']);?>" class="fx link undefined animated fadeOutUp"><b class="fa fa-link"></b></a>
													<a href="<?php echo URL.'/'.$item['cover_pic']; ?>" class="fx zoom undefined animated fadeOutDown" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
												</div>
												<img alt="" src="<?php echo URL.'/'.$item['cover_pic']; ?>">
											</div>
											<div class="name-holder">
											<a href="about-allgames.php?t=<?php echo str_replace(" ","-",$item['title']);?>" class="project-name" style="height:45px;" ><?php echo $item['title']; ?></a>
											<span class="project-options"><?php $t = takeQuality($item['con_cat']); echo $t['menu_name']; ?> (<?php echo $item['filesize']; ?>)</span>
										</div>
										</div>
									</div>
										 <?php } ?>
								</div>
								
								<div class="clearfix"></div>
											<div class="pager skew-25" style="margin-bottom:20px;">
						    		<ul>
<?php 

$num_rec_per_page = 12;

$totlaGame = TotalGames();
$total_pages = ceil($totlaGame['totlaGames'] / $num_rec_per_page); 
$start_from = ($page-1) * $num_rec_per_page;

if($page > 1){
   $previous = $page - 1;
    echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/allgames.php?page='.$previous.'"><i class="fa fa-angle-left"></i></a></li>';
}
echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/allgames.php?page=1">1</a></li>'; // Goto 1st page  
echo '<li class="selected"><span class="skew25">'.$page.'</span></li>';
				   for ($i= $page+1; $i<=$total_pages; $i++) { 
				   if($page == $i){
				     $class = "selected";
				   }else{
				     $class = "";
				   }
			echo '<li><a class="skew25 '.$class.'" href="'.URL.'/themes/'.THEME.'/allgames.php?page='.$i.'">'.$i.'</a></li>'; 
			if($i >= $page+5){
			   break;
			}
}
echo '<li><span class="skew25">...</span></li>'; // Goto last page
echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/allgames.php?page=/'.$total_pages.'">'.$total_pages.'</a></li>'; // Goto last page
if($page != $total_pages){
   $next = $page + 1;
   echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/allgames.php?page='.$next.'"><i class="fa fa-angle-right"></i></a></li>'; // Goto next page  
}				   
?>
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
	    

	   <script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/js/jquery.min.js"></script>
	    
	    <!-- Waypoints script -->
		<script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/js/waypoints.min.js"></script>
		
		<!-- SLIDER REVOLUTION SCRIPTS  -->
		<script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		
		<!-- Animate numbers increment -->
		<script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/js/jquery.animateNumber.min.js"></script>
		
		<!-- slick slider carousel -->
		<script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/js/slick.min.js"></script>
		
		<!-- Animate numbers increment -->
		<script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/js/jquery.easypiechart.min.js"></script>
		
		<!-- PrettyPhoto script -->
		<script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/js/jquery.prettyPhoto.js"></script>
		
		<!-- Share post plugin script -->
		<script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/js/jquery.sharrre.min.js"></script>
		
		<!-- Product images zoom plugin -->
		<script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/js/jquery.elevateZoom-3.0.8.min.js"></script>
		
		<!-- Input placeholder plugin -->
		<script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/js/jquery.placeholder.js"></script>
		
		<!-- Tweeter API plugin -->
		<script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/js/twitterfeed.js"></script>
		
		<!-- Flickr API plugin -->
		<script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/js/jflickrfeed.min.js"></script>

		<!-- MailChimp plugin -->
		<script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/js/mailChimp.js"></script>
		
		<!-- NiceScroll plugin -->
		<script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/js/jquery.nicescroll.min.js"></script>
		
		<!-- isotope plugin -->
		<script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/js/isotope.pkgd.min.js"></script>
		
		<!-- general script file -->
		<script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/js/script.js"></script>

		
		
	</body>
</html>