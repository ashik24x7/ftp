<?php 
include('../../Admin/main/core/init.php');
$TVID = mysqli_real_escape_string($connect_baza,$_GET['tvid']);
$json = singleTVseries($TVID);
$results = SingleTVviews($TVID);
$views = $results['views'];
$views++;
TVViews($views,$TVID);
$title = $json['name'];

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php echo $title; ?>  TV Series</title>
		<meta name="description" content="EXCEPTION – Responsive Business HTML Template">
		<meta name="author" content="EXCEPTION">
		
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
				<style>
				.block-head:before {
    left: 103px;
    bottom: 9px;
}
.block-head:after {
        left: 83px;
    bottom: 11px;
}
img.img-circle {
   background-repeat: no-repeat;
    background-position: 50%;
    border-radius: 50%;
    width: 50px;
    height: 50px;
	margin-top: -6px;
}
				</style>
				<div class="sectionWrapper" style="padding:10px;">
					<div class="container">
						<div class="my-img">
							<div class="my-details" style="background: linear-gradient(to bottom right, #580114, #05023b);">
								<img class="fx" data-animate="fadeInLeft" alt="" src="http://image.tmdb.org/t/p/w300/<?php echo $json['poster_path']; ?>" style="box-shadow: rgb(0, 0, 0) 7px 4px 10px -6px;height:450px;">
								<h4 class="bold main-color my-name fx" data-animate="slideInDown" style="font-size:32px;"><?php echo $json['original_name'];?> <?php echo '['.date("Y", strtotime($json['first_air_date'])).'-'.date("Y", strtotime($json['last_air_date'])).']';?></h4>
								
								<ul class="list alt list-bookmark cell-4">
								<p style='opacity:1;background:radial-gradient(#ffffb8, #ce981d);padding:3px; max-width:30%;text-align:center; color:#000; font-size:14px;margin-left:15px;'><span style='color:#333;font-family:impact;'><i class="fa fa-star"></i> &nbsp;</span> <span style='font-family:tahoma;font-weight:bold;'><?php echo $json['vote_average']; ?>/10</span></p>
								</ul>
								<ul class="list alt list-bookmark cell-4">
									<li class="fx" data-animate="slideInDown" data-animation-delay="300">Season: <?php echo $json['number_of_seasons'];?></li>
									<li class="fx" data-animate="slideInDown" data-animation-delay="300">Episodes: <?php echo $json['number_of_episodes'];?></li>
									
								</ul>
								<ul class="list alt list-bookmark cell-8">
								<div class="fx" data-animate="fadeInUp">
							<h3 class="block-head">Overveiw</h3>
							<p style="font-size:16px;line-height: 1.4em;font-family: 'Source Sans Pro', 'Arial', sans-serif;" >
								<?php $string = strip_tags($json['overview']);

							if (strlen($string) > 500) {

								// truncate string
								$stringCut = substr($string, 0, 500);

								// make sure it ends in a word so assassinate doesn't become ass...
								$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
							}
							echo $string; ?>
							</p>
							<h3 class="block-head">Featured Crew</h3>
							<?php foreach($json['created_by'] as $crew){ 
							$profile_path = '';
							$profile_path = $crew['profile_path'];
							?>
							<p style="float:left;padding-right:20px;"><a href="about-actor.php?id=<?php echo $crew['id']; ?>">
							<?php if($profile_path != ''){ ?>
							<img src="https://image.tmdb.org/t/p/w132_and_h132_bestv2/<?php echo $profile_path; ?>" class="img-circle"/>
							<?php }else{
							echo '<img src="images/avatar.png" class="img-circle"/>';	
							} ?>
							</a><span style="margin-left: 14px;
    vertical-align: -webkit-baseline-middle;"><?php echo $crew['name']; ?> </span>
	</p>
	<?php } ?>
						</div>
						
								</ul>
							</div>
						</div>
						<hr class="hr-style5">
						<div class="cell-12 fx animated fadeInLeft" data-animate="fadeInLeft">
								<div class="row">
									<div id="tabs" class="tabs">
										<h3>All Seasons</h3>
										<style>
										
										</style>
										<ul>
										<?php for($i=1;$i<=$json['number_of_seasons'];$i++){?>
											
											<li class="skew-25 <?php if($i == $json['number_of_seasons'] ){echo 'active';}?>"><a href="#" class="skew25"><i class="fa fa-play"></i> <?php echo 'Season: '.$i; ?></a>
											</li>
											
										<?php }?>
										</ul>
									<div class="tabs-pane">
									<?php for($i=1;$i<=$json['number_of_seasons'];$i++){
										
										?>
										<div class="tab-panel <?php if($i == $json['number_of_seasons'] ){echo 'active';}?>" style="display: block;">
											
                                    
									<?php $items = CollectEpisode($TVID,$i);
										foreach($items as $item){?>
									<div class="per-episode" style="margin-top:<?php if($item['epEpisode'] == 1){echo '10px';}else{ echo '115px';}?>;">   
                                        <div class="image" style="float:left;">
										  <a href="single_episode.php?tvid=<?php echo $TVID; ?>&s=<?php echo $i; ?>&e=<?php echo $item['epEpisode']; ?>"><img src="http://image.tmdb.org/t/p/w300/<?php echo $item['epPoster']; ?>" style="width:227px;height:127px;" /></a>
										</div>
										<a href="single_episode.php?tvid=<?php echo $TVID; ?>&s=<?php echo $i; ?>&e=<?php echo $item['epEpisode']; ?>"><img src="images/play-icon.png" style="width:50px;height:50px;margin-bottom: -85px;margin-top: 19px;margin-left: 72%;" /></a>
									    <div class="info" data-role="tooltip" style="padding:10px;margin-left:0px;margin-top:-18px;width:79%;float: left;height:127px;background: linear-gradient(to bottom right, #580114, #05023b);">
											<div class="title">
											  <a href="single_episode.php?tvid=<?php echo $TVID; ?>&s=<?php echo $i; ?>&e=<?php echo $item['epEpisode']; ?>" style="float:left;"><h3><span class="episode_number"><?php echo $item['epEpisode']; ?></span> <?php echo $item['epTitle']; ?></h3></a> 
											  <p style="background: radial-gradient(#09009A, #1E8CAB); width:6%;float:left;margin-top: 7px;margin-left: 15px;">&nbsp;&nbsp;<?php echo $item['epQuality']; ?></p>
											  <div class="date" style="clear:left;" >SEASON <?php echo $item['epSeasons']; ?> , EPISODE <?php echo $item['epEpisode']; ?></div>
											</div>

                                           <div class="overview is-truncated" style="word-wrap: break-word;">
              
                                           <p style="display: block;"><?php echo substr($item['epStory'],0,110); ?><a class="read_more open" episode="3" href="single_episode.php?tvid=<?php echo $TVID; ?>&s=<?php echo $i; ?>&e=<?php echo $item['epEpisode']; ?>" style="display: inline;">..Read More</a>
										   </p>
				                           </div>

                                         </div>
								    </div>
										<?php } ?>
									<div style="clear:left;" ></div>
									
									
												
										</div>
										<?php } ?>
									</div>
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