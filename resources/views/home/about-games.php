<?php 
include('../../Admin/main/core/init.php');
$title = mysqli_real_escape_string($connect_baza,$_GET['t']);
$json = CollectGamesDetails($title);
$views = $json['hit'];
$views++;
GamesViews($views,$title);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php echo WEBNAME; ?> – Games</title>
		<meta name="description" content="EXCEPTION – Responsive Business HTML Template">
		<meta name="author" content="EXCEPTION">
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
	    <link rel="shortcut icon" href="images/favicon.ico">
		    	
		<!-- CSS StyleSheets -->
		<?php include('includes/stylesheet.php'); ?>
	    <style>th, td, caption {
    padding: 5px;
}
table{
	    margin: 0px 0 10px 0;
        width: 95%;
}.my-img img {height:auto;}
</style>
	</head>
	<body>
	    
	    <!-- site preloader start -->
	    <div class="page-loader">
	    	<div class="loader-in"></div>
	    </div>
	    <!-- site preloader end -->
	    
	    <div class="pageWrapper">
		    
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
		<?php include('includes/header.php'); ?>
			<!-- Header End -->
			
			<!-- Content Start -->
			<div id="contentWrapper">
				
				<div class="sectionWrapper" style="padding:10px;">
					<div class="container">
					 <div class="row">
					  <div class="cell-9">
					<h4 class="bold main-color my-name fx" data-animate="slideInDown" style="font-size: 25px;"><?php echo $json['title'];?></h4>
						<div class="my-img">
							<div class="my-details">
							<div class="row">
							   <div class="cell-8">
								<img class="fx" data-animate="fadeInLeft" alt="" src="<?php echo URL.''.$json['cover_pic'];?>" style="width:100%;margin-bottom: 15px;">
							   
							   <h3 class="widget-head" style="margin-top:18px;margin-bottom: -20px;margin-left: 10px;">Game Trailer</h3>
							   <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $json['trailer']; ?>" frameborder="0" allowfullscreen style="margin-top:20px;margin-bottom:10px;"></iframe>
							   
							   </div>
							   <div class="cell-4" style="padding-left: 0px;">
							   <h3 class="widget-head" style="margin-top:12px;">Game Details</h3>
								<table>
  <tr>
    <td>Platform:</td>
    <td><?php $cat = takeQuality($json['con_cat']); echo $cat['menu_name']; ?></td>
  </tr>
  <tr>
    <td>views:</td>
    <td><?php echo $json['hit']; ?></td>
  </tr>
  
  <tr>
    <td>Game Size:</td>
    <td><?php echo $json['filesize']; ?></td>
  </tr>
  <tr>
    <td>Link:</td>
    <td><a class="btn btn-md btn-3d btn-danger fx animated fadeInUp" href="<?php echo $json['download'];?>" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;padding: 15px;    padding: 2px 5px 2px 5px;
    margin-left: 10%;">
							<span><i class="fa fa-download"></i>Download</span> 
	</a></td>
  </tr>
</table>
								
								<ul class="list alt list-bookmark cell-8" style="padding-left:0px;width:100%;">
								<div class="fx" data-animate="fadeInUp"></div>
							<h3 class="widget-head">System Requirements</h3>
							<p style="margin-top:10px;line-height: 18px;">
								<?php echo $json['details']; ?>
							</p>
							
							
						</div>
						</div>
								</ul>
							</div>
						</div>
						
						
						<hr class="hr-style5">
					
							
					</div>
							<aside class="cell-3 left-shop">

							
							
							<div class="widget r-posts-w sale-widget fx" data-animate="fadeInRight">
									<h3 class="widget-head">Recently Added Games</h3>
									<div class="widget-content">
										<ul>
											<?php $results = RecentGames(4);  // this is limit number how many movie you want to show
									    foreach($results as $item)
										 {
									?>
											<li>
												<div class="post-img" style="max-height: 70px inherit;" >
												<img src="<?php echo URL.'/'.$item['cover_pic']; ?>" alt="<?php echo $item2['MovieTitle']; ?>" title="<?php echo $item2['MovieTitle']; ?>" style="height:70px;width: 110px;"/> 
												</div>
												<div class="widget-post-info">
													<h4 style="line-height:1.2;">
														<a href="about-games.php?t=<?php echo str_replace(" ","-",$item['title']); ?>"><?php echo substr($item['title'],0,55); ?></a>
													</h4>
													<div class="meta">
													     <span><?php echo $item['filesize']; ?></span>
													<span> | <?php $cat = takeQuality($json['con_cat']); echo $cat['menu_name']; ?></span>
													     <span>Views: <?php echo $item['hit']; ?></span>
													     
														
													</div>
												</div>
											</li>
										 <?php } ?>
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