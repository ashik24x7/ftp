<?php 
include('../../Admin/main/core/init.php');
$TVCategory = sanitize($_GET['Category']);
$page = stripslashes(mysqli_real_escape_string($connect_baza,$_GET['page']));
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php echo WEBNAME.' - '.$movCategory; ?></title>
		<meta name="description" content="{description}">
		<meta name="author" content="Kamruddin bivob">
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
	    <link rel="shortcut icon" href="images/favicon.ico">
		
		    	
		<!-- CSS StyleSheets -->
		<?php include('includes/stylesheet.php'); ?>
		<script type="text/javascript" src="<?php echo URL.'/themes/'.THEME; ?>/js/jquery.min.js"></script>
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

				<div class="sectionWrapper" style="padding: 30px 0;">
					<div class="container">
						<div class="row">
							<div class="box success-box center hidden">Your item was added succesfully.</div>
							<div class="clearfix"></div>
							
							<div class="cell-9">
								
								
								<div class="clearfix"></div>
								<div class="pager skew-25" style="margin-bottom:20px;">
						    		<ul>
<?php 

$num_rec_per_page = 18;

$totalMovie = TotalMovieBYCAT($TVCategory);
$total_pages = ceil($totalMovie['totlaTV'] / $num_rec_per_page); 
$start_from = ($page-1) * $num_rec_per_page;

if($page > 1){
   $previous = $page - 1;
    echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/tv-series.php?page='.$previous.'&Category='.$TVCategory.'"><i class="fa fa-angle-left"></i></a></li>';
}
echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/tv-series.php?page=1&Category='.$TVCategory.'">1</a></li>'; // Goto 1st page  
echo '<li class="selected"><span class="skew25">'.$page.'</span></li>';
				   for ($i= $page+1; $i<=$total_pages; $i++) { 
				   if($page == $i){
				     $class = "selected";
				   }else{
				     $class = "";
				   }
			echo '<li><a class="skew25 '.$class.'" href="'.URL.'/themes/'.THEME.'/tv-series.php?page='.$i.'&Category='.$TVCategory.'">'.$i.'</a></li>'; 
			if($i >= $page+5){
			   break;
			}
}
echo '<li><span class="skew25">...</span></li>'; // Goto last page
echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/comingsoon/'.$total_pages.'">'.$total_pages.'</a></li>'; // Goto last page
if($page != $total_pages){
   $next = $page + 1;
   echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/tv-series.php?page='.$next.'&Category='.$TVCategory.'"><i class="fa fa-angle-right"></i></a></li>'; // Goto next page  
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
									<?php $results = TVCategory($TVCategory,$start_from,$num_rec_per_page);
									      foreach($results as $item)
										 {
											
									?>
									<div class="cell-3 fx shop-item" data-animate="fadeInUp" style="margin-bottom:20px;">
						    		<div class="team-box">
				    					<div class="team-img">
				    						<img alt="" style="height:284px;" src="../../Admin/main/TVseries/<?php echo $item['TVtitle'].'/'.$item['TVID'].'/poster/'.$item['TVposter']; ?>">
				    					</div>
										<a href="single-tvseries.php?tvid=<?php echo $item['TVID']; ?>">
				    					<div class="team-details"  href="single-tvseries.php?tvid=<?php echo $item['TVID']; ?>" style="background-color:rgba(0, 0, 0, 0.5);">
			                               
											<p style="height: 100px !important; margin: 4px 0px 9px 0px;" data-title="Watch Now" data-tooltip="true">
											<?php  echo $item['TVtitle'].' ['.$item['TVrelease'].']'; ?>
											</p>
											
											<?php $oneTrailer = explode(",",$item['TVtrailer']); ?>
											<ul class="gallery clearfix">
											<a href="http://www.youtube.com/watch?v=<?php echo $oneTrailer[0]; ?>" rel="prettyPhoto" style="margin: 2.5% 0 5% 30%;width: 40%;"  title="YouTube demo">
											<img src="<?php echo URL.'/themes/'.THEME;?>/trailer.png" style="margin-left: -48px;margin-top: -17px;margin-bottom: 20px;" />
											</a>
											</ul>
											<p style="background:radial-gradient(#ffffb8, #ce981d);"><span style="color:#000;font-family:impact;">IMDb &nbsp;</span><span style="font-family:tahoma;font-weight:bold;color:#333;"><?php echo $item['TVRatings']; ?>/10</span></p>
											<p style="background:radial-gradient(#EA0A5D, #5A0000);"><?php echo $item['TVcategory']; ?></p>
											<a href="single-tvseries.php?tvid=<?php echo $item['TVID']; ?>" class="play-hover" ><p style="background: radial-gradient(#013100, #1F9A00); width:48%; float:left;"><i class="fa fa-play-circle"></i> Play</p></a>
											<p style="background: radial-gradient(#09009A, #1E8CAB); width:48%; float:right;"><i class="fa fa-eye"></i> <?php echo $item['views']; ?></p>
				    					</div>
										</a>
				    				</div>
						    		</div>
										 <?php } ?>
									</div>
								</div>
								
								
								<div class="clearfix"></div>
																							<div class="pager skew-25" style="margin-bottom:20px;">
								
						    		<ul>
<?php 

$num_rec_per_page = 18;

$totalMovie = TotalMovieBYCAT($TVCategory);
$total_pages = ceil($totalMovie['totlaTV'] / $num_rec_per_page); 
$start_from = ($page-1) * $num_rec_per_page;

if($page > 1){
   $previous = $page - 1;
    echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/tv-series.php?page='.$previous.'&Category='.$TVCategory.'"><i class="fa fa-angle-left"></i></a></li>';
}
echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/tv-series.php?page=1&Category='.$TVCategory.'">1</a></li>'; // Goto 1st page  
echo '<li class="selected"><span class="skew25">'.$page.'</span></li>';
				   for ($i= $page+1; $i<=$total_pages; $i++) { 
				   if($page == $i){
				     $class = "selected";
				   }else{
				     $class = "";
				   }
			echo '<li><a class="skew25 '.$class.'" href="'.URL.'/themes/'.THEME.'/tv-series.php?page='.$i.'&Category='.$TVCategory.'">'.$i.'</a></li>'; 
			if($i >= $page+5){
			   break;
			}
}
echo '<li><span class="skew25">...</span></li>'; // Goto last page
echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/comingsoon/'.$total_pages.'">'.$total_pages.'</a></li>'; // Goto last page
if($page != $total_pages){
   $next = $page + 1;
   echo '<li><a class="skew25" href="'.URL.'/themes/'.THEME.'/tv-series.php?page='.$next.'&Category='.$TVCategory.'"><i class="fa fa-angle-right"></i></a></li>'; // Goto next page  
}				   
?>
						    		</ul>
					    		</div>
							</div>
							
							<aside class="cell-3 left-shop">
								
								<!--============== SHOUT BOX ===============--->
<style>
#exordid,#text {
    width: 100%;
    height: 30px;
    padding: 9px 10px;
    border: 1px solid #337ab7;
    border-radius: 4px;
    background: #fff;
    font-size: 14px;
    line-height: 20px;
    color: #333;
    -ms-box-sizing: border-box;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-appearance: none;
}
</style>
								<h3 class="widget-head">Shout Box</h3>
					            <?php include('shoutbox.php');?>
								
								<!--============== SHOUT BOX ===============--->
								
								
								
								
								
								<div class="widget r-posts-w sale-widget fx" data-animate="fadeInRight" style="padding-bottom: 16px;" >
									<h3 class="widget-head">Recent TV series Uploaded</h3>
									<div class="widget-content">
										<ul>
											<?php $results = RecentTVseries(4);  // this is limit number how many movie you want to show
									    foreach($results as $item)
										 {
									?>
											<li>
												<div class="post-img" style="max-height:70px inherit;" >
													<a href="single-tvseries.php?tvid=<?php echo $item['TVID']; ?>">
													<img src="../../Admin/main/TVseries/<?php echo $item['TVtitle'].'/'.$item['TVID'].'/poster/'.$item['TVposter']; ?>" alt="<?php echo $item['TVtitle']; ?>" title="<?php echo $item['TVtitle']; ?>" />
												    </a>
												</div>
												<div class="widget-post-info">
													<h4>
														<a href="single-tvseries.php?tvid=<?php echo $item['TVID']; ?>"><?php echo $item['TVtitle']; ?></a>
													</h4>
													<div class="meta">
													
													<span><?php echo $item['TVcategory']; ?></span>
													    <br> <span>Views: <?php echo $item['views']; ?></span>
														<div class="item-rating">
															<?php 
														   $ratings = floor($item['TVRatings']);
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
									<h3 class="widget-head">Popular TV series</h3>
									<div class="widget-content">
										<ul>
											<?php $results = PopularTVseries(4);  // this is limit number how many movie you want to show
									    foreach($results as $item)
										 {
									?>
											<li>
												<div class="post-img" style="max-height:70px inherit;" >
													<a href="single-tvseries.php?tvid=<?php echo $item['TVID']; ?>">
													<img src="../../Admin/main/TVseries/<?php echo $item['TVtitle'].'/'.$item['TVID'].'/poster/'.$item['TVposter']; ?>" alt="<?php echo $item['TVtitle']; ?>" title="<?php echo $item['TVtitle']; ?>" />
												    </a>
												</div>
												<div class="widget-post-info">
													<h4>
														<a href="single-tvseries.php?tvid=<?php echo $item['TVID']; ?>"><?php echo $item['TVtitle']; ?></a>
													</h4>
													<div class="meta">
													
													<span><?php echo $item['TVcategory']; ?></span>
													    <br> <span>Views: <?php echo $item['views']; ?></span>
														<div class="item-rating">
															<?php 
														   $ratings = floor($item['TVRatings']);
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