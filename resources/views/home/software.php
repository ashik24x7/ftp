<?php 
include('../../Admin/main/core/init.php');
$SOFCategory = sanitize($_GET['Category']);
$SOFSCategor = takeManuID($SOFCategory);
$SOFCategory = $SOFSCategor['id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php echo WEBNAME.' - ' ?></title>
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
	    <div class="page-loader">
	    	<div class="loader-in"></div>
	    </div>
	    <!-- site preloader end -->
	    
	    <div class="pageWrapper">
		    
		    <!-- login box start -->
		
			<!-- login box End -->

			<!-- Header Start -->
	<?php include('includes/header.php'); ?>
			<!-- Header End -->
			
			<!-- Content Start -->
			<div id="contentWrapper">
				<!--<div class="page-title title-1">
					<div class="container">
						<div class="row">
							<div class="cell-12">
								<h1 class="fx" data-animate="fadeInLeft">Services <span>Page</span></h1>
								<div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
									<span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><a href="#">Pages </a><span class="line-separate">/</span><span>Services page</span>
								</div>
							</div>
						</div>
					</div>
				</div>-->
				
				<div class="sectionWrapper">
					<div class="container">
						<div class="row">
						<?php $results = AllSoftwareBYCat($SOFCategory,0,12);
									      foreach($results as $item)
										 {	
									?>
							<div class="cell-2 service-box-2 fx" data-animate="fadeInDown">
								<div class="box-2-cont">
									<i><img src="<?php echo URL.'/'.$item['cover']; ?>" style="margin-top:-50px;width:100px;height:100px;" /></i>
									<h4 style="height:54px;font-size:14px;margin-top:10px;"><?php echo $item['title']; ?></h4>
									<div class="center sub-title main-color"> Filesize: - (<?php echo $item['filesize']; ?>)</div>
									<a class="r-more main-color" href="#">Read More</a>
								</div>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
				
				
				
				<div class="sectionWrapper img-pattern">
					<div class="container">
						<h3 class="block-head">Recent Games</h3>
						<div class="portfolioGallery portfolio">
						<?php $results = GamesCategory(18,0,6);
									      foreach($results as $item)
										 {	
									?>
							<div>
								<div class="portfolio-item">
									<div class="img-holder">
										<div class="img-over">
											<a href="portfolio-single.html" class="fx link"><b class="fa fa-link"></b></a>
											<a href="<?php echo URL.'/'.$item['cover_pic']; ?>" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
										</div>
										<img alt="" src="<?php echo URL.'/'.$item['cover_pic']; ?>">
									</div>
									<div class="name-holder">
											<a href="#" class="project-name" style="font-size:14px;height:40px;" ><?php echo $item['title']; ?></a>
											<span class="project-options"><?php $t = takeQuality($item['con_cat']); echo $t['menu_name']; ?> (<?php echo $item['filesize']; ?>)</span>
										</div>
								</div>
							</div>
						<?php } ?>
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