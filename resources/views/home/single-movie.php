<?php 
include('../../Admin/main/core/init.php');
$imdbid = sanitize($_GET['imdbid']);
$results = SingleMovie($imdbid);
$views = $results['views'];
$views++;
MoviesViews($views,$imdbid);
$ext = pathinfo($results['MovieWatchLink'], PATHINFO_EXTENSION);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php echo WEBNAME; ?> - <?php echo $results['MovieTitle']; ?></title>
		<meta name="keywords" content="fileserver – <?php echo $results['MovieKeywords']; ?>">
		<meta name="description" content="fileserver – <?php echo $results['MovieStory']; ?>">
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
	
	<script src="player/jquery.js"></script>	
	<script src="player/mediaelement-and-player.min.js"></script>
	
	<link rel="stylesheet" href="player/mediaelementplayer.min.css" />
	
	</head>
	<body>
	    
	    <!-- site preloader start 
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
			
				
				<div class="sectionWrapper" style="padding:20px 0;">
					<div class="container">
						<div class="row">
					
							<div class="cell-9">
								<div class="cell-12">
									<div class="product-specs price-block list-results">
										<div class="price-box"><span class="product-price"><?php echo $results['MovieTitle'].' ('.$results['MovieYear'].')'; ?></span></div>
										<div>
											<!--<span class="results-rating">
												<?php /* $ratings = floor($results['MovieRatings']);
                                                           for($i=0;$i<=10;$i++){
															   if($i <= $ratings){
																  echo '<span class="fa fa-star"></span>';  
															   }else{
																   echo '<span class="fa fa-star-o"></span>';
															   }
														   } */
														?>
											</span>
											<span><span><?php //echo $results['MovieRatings']; ?>/10 IMDB ratings</span><span class="separator"></span> -->
										</div>
									</div>
									<?php if($ext != 'mp4'){ ?>	
								<div class="box error-box round fx animated fadeInLeft" data-animate="fadeInLeft" style="padding:9px;">
								<a class="close-box" href="#"><i class="fa fa-times"></i></a>
								<h3 style="margin-top:-7px;">Playback Error!</h3>
								<p>This video might not play due to unsupported video format e.g. (*.mkv, *.avi, *.dat) <br>If the video doesn't play please download the file and play with any media player</p>
							</div>	
									<?php } ?>	
								<video width="100%" height="460" id="player2" poster="<?php if($results['poster'] != ''){echo "../../Admin/main/images/".$results['MovieID']."/poster/".$results['poster'];}else{echo 'images/d38bc38ad9ba60f9091aa2a9b3f4190f.png';}?>" controls="controls" preload="none">
	<!-- MP4 source must come first for iOS -->
									<source type="video/mp4" src="<?php echo $results['MovieWatchLink']; ?>" />
									<!-- WebM for Firefox 4 and Opera -->
									<source type="video/webm" src="<?php echo $results['MovieWatchLink']; ?>" />
									<!-- OGG for Firefox 3 -->
									<source type="video/ogg" src="<?php echo $results['MovieWatchLink']; ?>" />
									<source type="video/mkv" src="<?php echo $results['MovieWatchLink']; ?>" />
									<!-- Fallback flash player for no-HTML5 browsers with JavaScript turned off -->
									<object width="100%" height="360" type="application/x-shockwave-flash" data="player/flashmediaelement.swf"> 		
										<param name="movie" value="<?php echo $results['MovieWatchLink']; ?>" /> 
										<param name="flashvars" value="controls=true&amp;file=../media/echo-hereweare.mp4" /> 		
										<!-- Image fall back for non-HTML5 browser with JavaScript turned off and no Flash player installed -->
										<img src="<?php if($results['poster'] != ''){echo "../../Admin/main/images/".$results['MovieID']."/poster/".$results['poster'];}else{echo 'images/d38bc38ad9ba60f9091aa2a9b3f4190f.png';}?>" width="640" height="360" alt="Here we are" 
											title="No video playback capabilities" />
									</object> 	
								</video>
							
							
                           

<script>

$('audio,video').mediaelementplayer({
	//mode: 'shim',
	success: function(player, node) {
		$('#' + node.id + '-mode').html('mode: ' + player.pluginType);
	}
});

</script>
									
									
									<div class="cell-12">
									<div class="cell-9" style="border-right:1px solid #555;">
									<div class="list-results last-list">
									<div class="cell-3" style="padding:0px 0px 0px 0px;margin-left:-27px;">
									<div class="post-img">
									    <?php if($results['poster'] != ''){?>
				    						<img alt="" style="height:203px;" src="../../Admin/main/images/<?php  echo $results['MovieID'].'/poster/'.$results['poster'];?>">
										<?php
										}else{
											echo '<img alt="" style="height:238px;" src="images/d38bc38ad9ba60f9091aa2a9b3f4190f.png">';
										}
										?>
									</div>
									</div>
									<div class="cell-9">
									<div class="product-specs product-block list-results" style="margin-top:-17px;">
									    <label class="control-label"><i class="fa fa-paper-plane-o"></i>Quality:</label>
										<a class="btn btn-md btn-orange btn-outlined fx animated fadeInDown" href="#" data-animate="fadeInDown" data-animation-delay="700" style="animation-delay: 700ms;">
										<span><i class="fa fa-film"></i><?php echo $results['MovieQuality']; ?></span></a>
										<label class="control-label"><i class="fa fa-paper-plane-o"></i>Genre:</label>
										<?php $exp = explode(",",$results['MovieGenre']); for($i=0;$i < count($exp);$i++){ ?>
										<a href="genre.php?genre=<?php echo $exp[$i];?>" class="btn btn-small btn-border"><?php echo $exp[$i]; ?></a>
										<?php } ?>
									</div>
										<label class="control-label"><i class="fa fa-align-justify"></i>Quick Overview:</label>
				                        <div class="showContent hideContent"><?php echo $results['MovieStory']; ?></div>
										<div class="show-more">
        <a href="#">Show more</a>
    </div>
									</div>
									</div>
									</div>
									<div class="cell-3">
									<ul style="width:120%;">
									  <li><br>
									  <label class="control-label">Release Date: <font color="#bbb"> <?php echo $results['MovieDate']; ?></font></label>
									      
									  </li>
									  <li>
									  <label class="control-label">Language: <font color="#bbb"> <?php echo $results['Movielang']; ?> </font></label>
									  </li>
									   <li>
									  <label class="control-label">Runtime:<font color="#bbb"> <?php echo $results['MovieRuntime']; ?></font></label>
									  </li>
									 
									  <li>
									  <label class="control-label">homepage:<font color="#bbb"> <a href="<?php echo $results['Moviehomepage']; ?>">Visit website</a></font></label>
									  </li><br>
									  <li>
									  <a class="btn btn-md btn-3d btn-blue fx animated fadeInUp" href="<?php echo $results['MovieWatchLink']; ?>" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;">
										<span><i class="fa fa-download"></i>Download</span> </a>
									  </li>
									  <li>&nbsp;</li>
									  <li>
									  <a class="btn btn-md btn-3d btn-juicy_pink fx animated fadeInUp" href="<?php echo $results['MovieSubtitle']; ?>" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;">
										<span><i class="fa fa-download"></i>Subtitle</span> </a>
									  </li>
									 
									 </ul>
									</div>
									</div>
									
				
								</div>
								<div class="clearfix"></div>
								<div class="padd-top-20"></div>
								<hr class="hr-style5">
								<div class="clearfix padd-bottom-20"></div>
								<div class="cell-12">
									<div class="row">
										<div id="tabs" class="tabs">
											<ul>
												<li class="skew-25 active"><a href="#" class="skew25">Cast</a></li>
												<li class="skew-25"><a href="#" class="skew25">Crew</a></li>
												<li class="skew-25"><a href="#" class="skew25">Reviews</a></li>
												<li class="skew-25"><a href="#" class="skew25">Trailers</a></li>
												<li class="skew-25"><a href="#" class="skew25">Comments</a></li>
											</ul>
									 <div class="tabs-pane">
								     <div class="tab-panel active"> <!-- /// Cast tab // -->
									 
								   <?php 
								   $link = URL."/Admin/main/images/".$imdbid."/".$imdbid.".json";
								   CollectCast($imdbid,$link); ?>
                                     </div>
									
									   
									<div class="tab-panel">   <!-- Crew //// -->
								   <?php CollectCrew($imdbid,$link); ?>
									</div>
									
												<div class="tab-panel">
													 <div class="reviews">
														<div class="comments">
															
														    <ul class="comment-list">
														       <?php CollectReviews($imdbid); ?>
														</div>
													</div>
												</div>
												<div class="tab-panel">
													 <?php CollectYoutubeTrailers($imdbid); ?>
												</div>
												<div class="tab-panel">
													 <div id="disqus_thread"></div>
<script>


(function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = '//ftpisp-com.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                    
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<style>.widget > p{
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
							</style>
							<aside class="cell-3 left-shop">

							<div class="widget r-posts-w sale-widget fx" data-animate="fadeInRight" style="padding-bottom: 20px;">
							<h3 class="widget-head">Movie Details</h3>
							
<table>
  <tr>
    <td>Category:</td>
    <td><?php echo ucfirst($results['MovieCategory']); ?></td>
  </tr>
  <tr>
    <td>IMDb Rating:</td>
    <td><?php echo $results['MovieRatings']; ?></td>
  </tr>
  <tr>
    <td>Video Quality:</td>
    <td><?php echo $results['MovieQuality']; ?></td>
  </tr>
  <tr>
    <td>File Type:</td>
    <td><?php echo $ext;?></td>
  </tr>
  <tr>
    <td>File Size:</td>
    <td><?php echo $results['MovieSize']; ?></td>
  </tr>
  <tr>
    <td>Total views:</td>
    <td><?php echo $results['views']; ?></td>
  </tr>
</table>
							
							</div>
							
							<div class="widget r-posts-w sale-widget fx" data-animate="fadeInRight">
							<h3 class="widget-head">Shout Box</h3>
			            <?php include('shoutbox.php'); ?>
							</div>
							
							</aside>
						</div>
					</div>
				</div>
				
			<!--	<div class="sectionWrapper gry-pattern similar-products">
					<div class="container">
						<h3 class="block-head">Similar Products</h3>
						<div class="row">
							<div class="cell-4">
			    				<div class="results-box">
			    					<h3 class="results-title"><a href="product.html">Media Tech</a></h3>
			    					<div class="results-img">
			    						<a href="product.html"><img alt="" src="images/shop/pro-1.jpg"></a>
			    					</div>
			    					<div class="results-details">
		                            	<p>Phasellus blandit elementum tellus, nec adipiscing dui elementum non Phasellus blandit elementum tellus, nec adipiscing dui elementum non Phasellus blandit elementum tellus, nec adipiscing dui elementum non</p>
		                            	<div class="right">
		                            		<div class="results-rating">
												<span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span>
											</div>
											<div class="results-price">$50</div>
		                            	</div>
										<div class="left">
											<div class="results-cart">
												<a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i> Add to cart</a>
											</div>
                                            <div class="results-tools">
	                                            <a href="#"><i class="fa fa-heart" data-title="Add to Favourites" data-tooltip="true"></i></a>
	                                            <a href="#"><i class="fa fa-exchange" data-title="Compare" data-tooltip="true"></i></a>
                                            </div>
                                        </div>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="cell-4">
			    				<div class="results-box">
			    					<h3 class="results-title"><a href="product.html">Ultimate Fashion Wear White</a></h3>
			    					<div class="results-img">
			    						<a href="product.html"><img alt="" src="images/shop/pro-2.jpg"></a>
			    					</div>
			    					<div class="results-details">
		                            	<p>Phasellus blandit elementum tellus, nec adipiscing dui elementum non Phasellus blandit elementum tellus, nec adipiscing dui elementum non Phasellus blandit elementum tellus, nec adipiscing dui elementum non</p>
		                            	<div class="right">
		                            		<div class="results-rating">
												<span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span>
											</div>
											<div class="results-price">$150</div>
		                            	</div>
										<div class="left">
											<div class="results-cart">
												<a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i> Add to cart</a>
											</div>
                                            <div class="results-tools">
	                                            <a href="#"><i class="fa fa-heart" data-title="Add to Favourites" data-tooltip="true"></i></a>
	                                            <a href="#"><i class="fa fa-exchange" data-title="Compare" data-tooltip="true"></i></a>
                                            </div>
                                        </div>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="cell-4">
			    				<div class="results-box">
			    					<h3 class="results-title"><a href="product.html">Club Aldo Black Leather</a></h3>
			    					<div class="results-img">
			    						<a href="product.html"><img alt="" src="images/shop/pro-3.jpg"></a>
			    					</div>
			    					<div class="results-details">
				    					<p>Phasellus blandit elementum tellus, nec adipiscing dui elementum non Phasellus blandit elementum tellus, nec adipiscing dui elementum non Phasellus blandit elementum tellus, nec adipiscing dui elementum non</p>
		                            	<div class="right">
		                            		<div class="results-rating">
												<span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span>
											</div>
											<div class="results-price">$80</div>
		                            	</div>
										<div class="left">
											<div class="results-cart">
												<a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i> Add to cart</a>
											</div>
                                            <div class="results-tools">
	                                            <a href="#"><i class="fa fa-heart" data-title="Add to Favourites" data-tooltip="true"></i></a>
	                                            <a href="#"><i class="fa fa-exchange" data-title="Compare" data-tooltip="true"></i></a>
                                            </div>
                                        </div>
			    					</div>
			    				</div>
			    			</div>
						</div>
					</div>
				</div> -->
				
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
		
		<!-- SLIDER REVOLUTION SCRIPTS  -->
	
		<script src="http://vjs.zencdn.net/5.10.7/video.js"></script>
		
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