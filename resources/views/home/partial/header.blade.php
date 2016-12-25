	
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
						    	<a href="/"></a>
						    </div>
						    <div class="cell-9 top-menu">
							    
							    <!-- top navigation menu start -->
							    <nav class="top-nav mega-menu">
								<ul>
									@foreach($menu as $key)
										<li class="hasChildren"><a href="/{{strtolower($key->menu_name)}}"><i class="fa fa-film"></i><span>{{$key->menu_name}}</span></a>
									      	<ul style="max-width: 609px;">
										      	@foreach($key->submenu as $submenu)
											    <li style="transition-delay: 0ms;" class="">
											    	<a href="/admin/filter/{{strtolower($submenu->menu_name)}}">

											    	<i class="fa fa-send"></i>
											    		{{ucfirst($submenu->menu_name)}}
											    	</a>
												</li>
												@endforeach
											
											</ul>
									      </li>
									@endforeach   
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