<?php 
include('../../Admin/main/core/init.php');
$Search = sanitize($_GET['searchquery']);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php echo WEBNAME.' - '.$Search; ?></title>
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
								<?php //$movCategory = 'hollywood'; include('sorting.php'); ?>
								
								<div class="clearfix"></div>
								
								<div class="grid-list">
									<div class="row">
									<style>.team-box .team-details p {
				margin-bottom: 10px; font-size:15px; height: 27px !important; text-align:center; padding:5px !important;
                }
				.play-hover p:hover{
					background:radial-gradient(#059002, #5b9d4b);
					font-size:14px;
				}.err-404:before {display:none;}
				</style>
									<?php $results = MoviesSearch($Search,0,20);
									$count = count($results);
									if($count == 0){ ?>
									<div class="not-found">
		    				<p class="hint extraLarge">SEARCH RESULTS FOR:</p>
		    				
		    				<div class="err-404" style="margin-top:-20px;font-size:100px;">
							<img src="images/alert.png" style="width:25%;opacity: 0.8;" />
			    				<?php echo $Search; ?>		
			    			</div>
			    			
			    			<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
			    					
			    		</div>
									<?php }
									      foreach($results as $item)
										 {
										
									?>
								<?php include('movie.php'); ?>
										 <?php } ?>
									</div>
								</div>
								
								
								<div class="clearfix"></div>
								
							</div>
							
							<aside class="cell-3 left-shop">
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
								<!--============== SHOUT BOX ===============--->
				<h3 class="widget-head">Shout Box</h3>
					<?php include('shoutbox.php'); ?>
								
								<!--============== SHOUT BOX ===============--->

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