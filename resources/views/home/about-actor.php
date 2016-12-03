<?php 
include('../../Admin/main/core/init.php');
$ActoriD = preg_rplc($_GET['id']);
$json = CollectActorDetails($ActoriD);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php echo WEBNAME; ?> – Full Bio Data</title>
		
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
	    <link rel="shortcut icon" href="images/favicon.ico">
		    	
		<!-- CSS StyleSheets -->
		<?php include('includes/stylesheet.php'); ?>
	
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
						<div class="my-img">
							<div class="my-details">
								<img class="fx" data-animate="fadeInLeft" alt="" src="http://image.tmdb.org/t/p/w342<?php echo $json['profile_path'];?>" style="box-shadow: rgb(0, 0, 0) 7px 4px 10px -6px;">
								<h4 class="bold main-color my-name fx" data-animate="slideInDown"><?php echo $json['name'];?></h4>
								<ul class="list alt list-bookmark cell-4">
									<li class="fx" data-animate="slideInDown">Birthdate : <?php echo $json['birthday'];?></li>
									<li class="fx" data-animate="slideInDown" data-animation-delay="100">place of birth : <?php echo $json['place_of_birth'];?></li>
									<li class="fx" data-animate="slideInDown" data-animation-delay="200">imdb id : <?php echo $json['imdb_id'];?></li>
								</ul>
								<ul class="list alt list-bookmark cell-4">
									<li class="fx" data-animate="slideInDown" data-animation-delay="300">homepage : <?php echo $json['homepage'];?></li>
									<li class="fx" data-animate="slideInDown" data-animation-delay="400">popularity : <?php echo $json['popularity'];?></li>
									<li class="fx" data-animate="slideInDown" data-animation-delay="500">gender : <?php if($json['gender'] == 2){ echo 'Male'; }else{ echo 'Female'; }?></li>
								</ul>
								<ul class="list alt list-bookmark cell-8">
								<div class="fx" data-animate="fadeInUp">
							<h3 class="block-head">Full Bio</h3>
							<p>
								<?php echo $json['biography']; ?>
							</p>
						</div>
								</ul>
							</div>
						</div>
						
						
						<hr class="hr-style5">
					
							
					</div>
				</div>
				
				<div class="sectionWrapper gry-bg" style="padding: 27px 0;">
					<div class="container">
					
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
						<?php $results = MoviesBYactor($json['name']);
									      foreach($results as $item)
										 {
											
									?>
											<div class="cell-2 fx shop-item" data-animate="fadeInUp" style="margin-bottom:20px;padding-right: 0px;">
						    			<div class="team-box" >
				    					<div class="team-img" style="margin-right:5px;margin-left:5px;">
				    						<img alt="" style="height:252px;" src="../../Admin/main/images/<?php  echo $item['MovieID'].'/poster/'.$item['poster']; ?>">
				    					    <span class="yellowbox"><?php echo $item['MovieYear']; ?></span>
											<span class="imdb-rating"><b><b class="fa fa-star"></b></b> <?php if($item['MovieRatings'] != 0){echo $item['MovieRatings'];}else{ echo 'N/A'; } ?></span>
										</div>
										
										<a href="single-movie.php?imdbid=<?php echo $item['MovieID']; ?>">
				    					<div class="team-details"  href="single-movie.php?imdbid=<?php echo $item['MovieID']; ?>" style="height:252px;background-color:rgba(0, 0, 0, 0.5);margin-left: 5px;width: 94.5%;">
			                               
											<p style="height: 100px !important; margin: -4px 0px 0px 0px;">
											<?php  echo $item['MovieTitle'].' ['.$item['MovieYear'].']'; ?>
											</p>
											
											<?php $oneTrailer = explode(",",$item['MovieTrailer']); ?>
											<a href="single-movie.php?imdbid=<?php echo $item['MovieID']; ?>" class="play-hover" ><i class="fa fa-play-circle play-btn"></i></a>
											<br>
											<p style="background: radial-gradient(#1E8CAB, #09009a); width:40%; float:right;margin-left:5px;font-size:13px;"><i class="fa fa-eye"></i> <?php echo $item['views']; ?></p>
											
											<p style="background:radial-gradient(#EA0A5D, #5A0000);font-size:13px;"><?php echo $item['MovieQuality']; ?></p>
											<p style="background: radial-gradient(#5bf77d, #1f730a);font-size:13px;width:60%;float:left;"><span style="color:#000;font-family:impact;"></span><span style="font-family:tahoma;font-weight:bold;color:#333;margin-bottom:10%;"><?php echo ucfirst($item['MovieCategory']); ?></span></p>
											<p style="background: radial-gradient(#b0e2ff, #337ab7);font-size:13px;width:37%;float:right;"><span style="color:#000;font-family:impact;"></span><span style="font-family:tahoma;font-weight:bold;color:#333;margin-bottom:10%;"><?php if(strpos($item['MovieSize'], 'GB') !== false){ echo $item['MovieSize'];}else{echo floor($item['MovieSize']).' MB';} ?></span></p>
											
				    					    
											<ul class="gallery clearfix">
											<a href="http://www.youtube.com/watch?v=<?php echo $oneTrailer[0]; ?>" rel="prettyPhoto" style="margin: 2.5% 0 5% 30%;width: 40%;"  title="<?php echo $item['MovieTitle']; ?>">
											<img src="<?php echo URL.'/themes/'.THEME;?>/trailer.png" style="margin-left: -48px;margin-top:0px;margin-bottom: 10px;" />
											</a>
											</ul>
											
										</div>
										</a>
				    			</div>
						    		</div>
										 <?php } ?>
										
						
						</div>
						</div>
						 <div class="clearfix"></div>
						
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