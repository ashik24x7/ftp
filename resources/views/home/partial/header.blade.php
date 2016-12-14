	
	<style>
	.top-nav li li a {
	line-height: 30px;
    }
	</style>
	<div id="headWrapper" class="clearfix">
			    <!-- Logo, global navigation menu and search start -->
			    <header class="top-head" data-sticky="true">
				    <div class="container">
					    <div class="row">
					    	<div class="logo cell-3">
						    	<a href="index.php"></a>
						    </div>
						    <div class="cell-9 top-menu">
							    
							    <!-- top navigation menu start -->
							    <nav class="top-nav mega-menu">
								    <ul>
									
									<li class="hasChildren"><a href="#"><i class="fa fa-film"></i><span>Movies</span></a>
								      	<ul style="max-width: 609px;">
										      
										<?php 
										//menuChange('movies');
										?>
									    <li style="transition-delay: 0ms;" class="hasChildren"><a href="#"><i class="fa fa-send"></i><?php echo strtoupper('More Categories'); ?></a>
										      		<ul style="max-width: 609px;">
														<?php //menuChangeMore('movies'); ?>
										      		</ul>
										</li>
										
										</ul>
								      </li>
								      
								      
								      <li><a href="#"><i class="fa fa-file-movie-o"></i><span>Tv Series</span></a>
								      	  <ul>
										<?php 
										//menuChange('Tv Series');
										?> 
									      </ul>
								      </li>
								      <li><a href="#"><i class="fa fa-gamepad"></i><span>Games</span></a>
									  <ul>
										<?php 
										//menuChange('Games');
										?> 
									  </ul>
									  </li>
								      <li><a href="#"><i class="fa fa-list-alt"></i><span>Software</span></a>
									  <ul>
										<?php 
										//menuChange('Software');
										?> 
									  </ul>
									  </li>
									 <!-- <li><a href="#"><i class="fa fa-gift"></i><span>Quality</span></a>
								      	  <ul>
										<?php 
										//QualityCollect();
										?> 
									      </ul>
								      </li> 
									  <li><a href="#"><i class="fa fa-gift"></i><span>Genre</span></a>
								      	  <ul>
										<?php 
										//GenreCollect();
										?> 
									      </ul>
								      </li> 
								  <li><a href="<?php //echo URL.'/themes/'.THEME.'/coming_soon.php?page=1';?>"><i class="fa fa-play-circle-o"></i><span><b class="menu-hint success">New</b>Coming Soon</span></a>
								      </li> -->
								    </ul>
							    </nav>
							    <!-- top navigation menu end -->
							    
							    <!-- top search start -->
							    <div class="top-search">
						    		<a href="#" class="se"><span class="fa fa-search" style="color:#fff;"></span></a>
							    	<div class="search-box">
							    		<div class="input-box left">
		
									<form action="search.php" id="searchform" method="get" autocomplete="on">
										<div>
											<input type="text" size="30" value="" name="searchquery" class="txt-box" id="inputString" onkeyup="lookup(this.value);" placeHolder="Enter search keyword here..." />
										</div>
										<div id="suggestions" style="margin-left:10px;"></div>
									</form>
									
							    		</div>
							    		<!--<div class="left">
							    			<input type="submit" id="b-search" class="btn main-bg" value="GO" />
							    		</div> -->
							    	</div>
							    </div>
							    <!-- top search end -->
							</div>
					    </div>
				    </div>
			    </header>
			    <!-- Logo, Global navigation menu and search end -->
			    
			</div>