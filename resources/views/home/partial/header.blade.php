	
	<script>
		$(document).ready(function(){
			$('input[name=search]').on('keyup',function(){
				
				var token = '{{ Session::token() }}';
				var url = '{{ url("/search") }}';
				var search = $(this).val();
					
				if(search != ""){
					console.log(search);
					$.ajax({
						type:"POST",
						url:url,
						data:{str:search,_token:token},
						success:function(e){
							var data = '<div id="searchresults">';
							if(e.movies.data.length >0){
								var movies = e.movies.data;
								data += '<div class="category" style="padding-bottom:10px;"> MOVIES </div>';
								for (var i = 0; i < movies.length ; i++) {
									data += '<a href="/movie/'+movies[i].title.split(' ').join('-').toLowerCase()+'">';
									var path = '/'+movies[i].category_name.drive+'/'+movies[i].year+'/'+movies[i].title+' ['+movies[i].year+']/';
									path = path.split(' ').join('%20');
									path = path.replace('[','%5B');
					    			path = path.replace(']','%5D');
					    			var poster = path+movies[i].poster

									data += '<img src="'+poster+'" alt="" style="width:10.5%;"/>';
									data += '<div class="searchheading" style="margin-top:-10px;font-size:12px;">'+movies[i].title+'</div>';
									data += '<div class="details" style="color:#3D3D3D;font-size:10px;">';
									data += 'Category:'+movies[i].category_name.menu_name+'<br> Quality:'+movies[i].quality+'</div></a>'
								}
							}
							if(e.softwares.data.length > 0){
								var softwares = e.softwares.data;
								data += '<div class="category" style="padding-bottom:10px;"> Softwares </div>';
								for (var i = 0; i < softwares.length ; i++) {
									var path = '/'+softwares[i].category_name.drive+'/'+softwares[i].name+'/';
									path = path.split(' ').join('%20');
									path = path.replace('[','%5B');
					    			path = path.replace(']','%5D');
					    			var cover = path+softwares[i].cover

									data += '<a href="'+path+softwares[i].path+'">';
									data += '<img src="'+cover+'" alt="" style="width:10.5%;"/>';
									data += '<div class="searchheading" style="margin-top:-10px;font-size:12px;">'+softwares[i].name+'</div>';
									data += '<div class="details" style="color:#3D3D3D;font-size:10px;">';
									data += 'Category:'+softwares[i].category_name.menu_name+'<br> Size:'+softwares[i].size+'</div></a>'
								}
							}
							if(e.games.data.length > 0){
								var games = e.games.data;
								data += '<div class="category" style="padding-bottom:10px;"> Games </div>';
								for (var i = 0; i < games.length ; i++) {
									var path = '/'+games[i].category_name.drive+'/'+games[i].name+'/';
									path = path.split(' ').join('%20');
									path = path.replace('[','%5B');
					    			path = path.replace(']','%5D');
					    			var cover = path+games[i].cover

									data += '<a href="'+path+games[i].path+'">';
									data += '<img src="'+cover+'" alt="" style="width:10.5%;"/>';
									data += '<div class="searchheading" style="margin-top:-10px;font-size:12px;">'+games[i].name+'</div>';
									data += '<div class="details" style="color:#3D3D3D;font-size:10px;">';
									data += 'Category:'+games[i].category_name.menu_name+'<br> Size:'+games[i].size+'</div></a>'
								}
							}
							if(e.tvseries.data.length > 0){
								var tvseries = e.tvseries.data;
								data += '<div class="category" style="padding-bottom:10px;"> tvseries </div>';
								for (var i = 0; i < tvseries.length ; i++) {
									var path = '/'+tvseries[i].category_name.drive+'/'+tvseries[i].title+'/';
									path = path.split(' ').join('%20');
									path = path.replace('[','%5B');
					    			path = path.replace(']','%5D');
					    			var poster = path+tvseries[i].poster

									data += '<a href="/tv-series/'+tvseries[i].title.split(' ').join('-').toLowerCase()+'">';
									data += '<img src="'+poster+'" alt="" style="width:10.5%;"/>';
									data += '<div class="searchheading" style="margin-top:-10px;font-size:12px;">'+tvseries[i].title+'</div>';
									data += '<div class="details" style="color:#3D3D3D;font-size:10px;">';
									data += 'Category:'+tvseries[i].category_name.menu_name+'<br> Size:'+tvseries[i].size+'</div></a>'
								}
							}


							data += '</div>';
							$("#suggestions").html(data);
						}
					});
				}

			});
		});
	</script>

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
										<li class="hasChildren"><a href="/{{str_replace(' ','-',strtolower($key->menu_name))}}"><i class="fa fa-film"></i><span>{{$key->menu_name}}</span></a>
									      	<ul style="max-width: 609px;">
										      	@foreach($key->submenu as $submenu)
											    <li style="transition-delay: 0ms;" class="">
											    	<a href="/filter/{{str_replace(' ','-',strtolower($submenu->menu_name))}}">

											    	<i class="fa fa-send"></i>
											    		{{ucwords($submenu->menu_name)}}
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
		
									<form action="" id="searchform" method="get" autocomplete="on">
										<div>
											<input type="text" size="30" value="" name="search" class="txt-box" id="inputString" placeHolder="Enter search keyword here..." />
										</div>
										<div id="suggestions" style="margin-left:10px;">

										</div>
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