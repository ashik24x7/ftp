<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Fileserver | Edit - </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
		 <link href="/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
		<link href="/backend/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="/backend/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/backend/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
		 
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="/backend/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="/backend/layouts/layout/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="/backend/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
		
		</head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
          @include('admin.partial.top-head')
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                  @include('admin.partial.sidebar')
                <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
          				

<div class="row">
    <div class="col-md-12">
        <ul class="task-list" style="list-style: none">
        @if(session('errors'))
            @foreach(session('errors') as $error)
                <li>
                    <div class="task-title">
                        <span class="task-title-sp" style="color: red"><i class="fa fa-times" aria-hidden="true"></i> {!!$error!!}</span>
                        <span class="label label-sm label-danger"></span>
                    </div>
                </li>
            @endforeach
        @endif
        @if(session('messages'))
                <li>
                    <div class="task-title">
                        <span class="task-title-sp"><i class="fa fa-check-square-o" aria-hidden="true" style="color:green"></i> {{session('messages')}}</span>
                        <span class="label label-sm label-success"></span>
                    </div>
                </li>
        @endif
        </ul>
    </div>
</div>


		                 <div class="row">
                        <div class="col-md-3">
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_1_1" data-toggle="tab"> <i class="fa fa-plus"></i> Poster </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab_1_1">
                                            <p>
											<style>
											#tab_1_1 > form > div.form-group > div.fileinput.fileinput-new > div.fileinput-preview.fileinput-exists.thumbnail > img{
												max-height:445px;
											}
											</style>

<!-- ///// form start from here /// -->		
		 <form  action="{{url('/admin/movie/update')}}" role="form" method="post" name="myForm" id="myForm" enctype="multipart/form-data" >
		 	{{csrf_field()}}
			<div class="form-group">
			<div class="fileinput fileinput-new" data-provides="fileinput">
			<div class="fileinput-new thumbnail">
			@php
				
				$poster_dir = '/storage/'.str_replace('fs1/','',$movies->category_name->drive).'/'.$movies->year.'/';
                $poster_dir = strtolower($poster_dir);
                $poster_dir .= $movies->poster;
				$poster_dir = str_replace('fs2/','',$poster_dir);
				
				$path = '/'.$movies->category_name->drive.'/'.$movies->year.'/'.$movies->title.' ['.$movies->year.']/';
                $path = str_replace(' ','%20',$path);
                $path = str_replace('[','%5B',$path);
                $path = str_replace(']','%5D',$path);
            @endphp
			<img src="{{$poster_dir}}" alt="" id="poster" /> 
			<div class="modal" id="loading" style="display:none;"><!-- Place at bottom of page --></div>
			</div>
																		
	<style>
	.modal {
    display: block;
    position: relative;
    z-index: 1000;
    margin-top: -457px;
    top: -41px;
    height: 447px;
    width: 100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('http://i.stack.imgur.com/FhHRx.gif') 
                50% 50% 
                no-repeat;
	}
	.loading{
	display:block;
	}
	div#loading.modal{
	height:498px;
	margin-bottom: -44px;
	}
</style>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width:360px; max-height:535px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Select image </span>
                                                                            <span class="fileinput-exists"> Change </span>
<!-- this is Poster Image --> <input type="file" id="poster" name="new_poster" value="<?php // echo $results['poster']; ?>" /> 
                                                                        </span>
                                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix margin-top-10">
                                                                    <span class="label label-danger">NOTE! </span>
                                                                    <span id="posterError"> &nbsp;&nbsp;poster will resize automaticly if it's too big size</span>
                                                                </div>
                                                            </div>
											</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        
 
                        </div>
                        <div class="col-md-9">
                            <!-- BEGIN TAB PORTLET-->
							
                          

                                <div class="portlet-body">
                                    <p id="allError">Edit Full Movie Information</p>
                                    <div class="tabbable tabbable-tabdrop">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab1" data-toggle="tab"><i class="fa fa-info"></i> information</a>
                                            </li>
                                            <li>
                                                <a href="#tab2" data-toggle="tab"><i class="fa fa-book"></i> Stroy</a>
                                            </li>
                                            <li>
                                                <a href="#tab3" data-toggle="tab"><i class="fa fa-play"></i>Path</a>
                                            </li>
											<li>
                                                <a href="#tab4" data-toggle="tab"><i class="fa fa-youtube-play"></i> Youtube Trailer</a>
                                            </li>
											<li>
                                                <a href="#tab5" data-toggle="tab"><i class="fa fa-file-image-o"></i> Screenshots</a>
                                            </li>
											<li>
                                                <a href="#tab6" data-toggle="tab"><i class="fa fa-users"></i> Cast</a>
                                            </li>
											<li>
                                                <a href="#tab7" data-toggle="tab"><i class="fa fa-user"></i> Crew</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab1">
                                                <p> 
												<!-- ========== Movie Information============-->
							<div class="col-md-12">				
                                    
									<div class="col-md-6">
									<div class="form-group">
									 <label for="MovieTrailer" class="control-label">Youtube Trailer.</label>
<!-- this is Youtube Trailer --><input type="text" id="MovieTrailer" name="trailer" class="form-control" placeholder="Enter Youtube Trailer" value="{{$movies->trailer}}" required />
									</div>
                                    </div> 
									
									<div class="col-md-3">
									<div class="form-group">
									 <label for="MovieTitle" class="control-label">Movie Title</label>
<!-- this is Movie Title --> <input type="text" id="MovieTitle" name="title" class="form-control" placeholder="Enter Movie Title" value="{{$movies->title}}" required />
<!-- this is Movie Title --> <input type="text" id="MovieID" name="id" class="form-control" style="display:none;" value="{{$movies->id}}" />
									</div>
                                    </div> 
									
									<div class="col-md-3">
									<div class="form-group">
									 <label for="MovieYear" class="control-label">Movie Year</label>
<!-- this is Movie Year --> <input type="text" id="MovieYear" name="year" class="form-control" placeholder="Enter Movie Year" value="{{$movies->year or ''}}" required/>
									</div>
                                    </div> 
                            </div>									
							<div class="col-md-12">
									<div class="col-md-3">
                                       <div class="form-group">
										<label for="MovieCategory" class="control-label">Select Category</label>
<!-- this is Movie Category -->		<select class="form-control" id="category" name="category" required>
											@foreach($category as $key)
                                              <option value="{{$key->id}}">{{ucwords($key->menu_name)}}</option>
                                            @endforeach
                                        </select>
										</div>
									</div>
									<div class="col-md-3">
                                       <div class="form-group">
										<label for="MovieRatings" class="control-label">IMDB Ratings</label>
<!-- this is IMDB Ratings -->		<input type="text" id="MovieRatings" name="rating" class="form-control" placeholder="IMDB Ratings" value="{{$movies->rating}}" required/>
									   </div>
									</div>
									<div class="col-md-3">
                                       <div class="form-group">
										<label for="Published" class="control-label">Published</label>
<!-- this is Movie Category -->		<select class="form-control" id="Published" name="published" required>
                                              <option value="1">Yes</option>
                                              <option value="0">No</option>
                                        </select>
										</div>
									</div>
									
<!-- this is Movie Genre -->		<div class="col-md-3">
                                            <label for="MovieGenre" class="control-label">Movie Genre</label>
											<input type="text" id="MovieGenre" name="genre" class="form-control" placeholder="Movie Genre" value="{{$movies->genre or ''}}"/>
                                     </div>
							</div>
							<div class="col-md-12">
									<div class="col-md-6">
                                       <div class="form-group">
										<label for="Movielang" class="control-label">Movie Language</label>
<!-- this is Movie language -->		    <input type="text" id="Movielang" name="language" class="form-control"  placeholder="Enter Movie Language" value="{{$movies->language}}"  />
									   </div>
									</div>
									<div class="col-md-3">
                                       <div class="form-group">
										<label for="Moviehomepage" class="control-label">Website</label>
<!-- this is Movie homepage --><input type="text" id="Moviehomepage" name="website" class="form-control"  placeholder="Enter Movie Homepage" value="{{$movies->website}}"/>
									   </div>
									</div>
									<div class="col-md-3">
                                       <div class="form-group">
										<label for="MovieRuntime" class="control-label">Movie Runtime</label>
<!-- this is Movie Runtime --><input type="text" id="MovieRuntime" name="time" class="form-control"  placeholder="Enter Movie Runtime" value="{{$movies->time}}" required/>
									   </div>
									</div>
							</div>
									</p>
									
									<!-- ==========/////// Movie Information END ///// --============-->
                                            </div>
                                            <div class="tab-pane" id="tab2">
									<!-- ========== Movie Story Start --============-->		
                                                <p>
									<div class="col-md-12">
                                       <div class="form-group form-md-line-input">
										<label for="MovieKeywords" class="control-label">Movie Meta Keywords</label>
<!-- this is Movie Meta Keyword --><input type="text" id="MovieKeywords" name="kewyword" class="form-control"  placeholder="Enter Movie Keywords" value="{{$movies->kewyword}}"/>
									   </div>
									</div>
									<div class="col-md-12">
									<div class="form-group last">
                                                <label class="control-label col-md-2">Full Movie Story
<!-- this is Movie Stroy -->             <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
         <textarea class="form-control" name="story" rows="10" id="MovieStory" required>{{$movies->story}}</textarea>
                                                    <br>
                                                </div>
                                     </div>
								     </div>	
												</p>
									<!-- ==========/////// Movie Story END ///// ============-->
                                            </div>
                                            <div class="tab-pane" id="tab3">
											<!-- ========== Movie Watch Online============-->
                                                <p>
									<div class="col-md-12">
                                       <div class="form-group form-md-line-input">
										<label for="MovieWatchLink" class="control-label">File Path</label>
<!-- this is Movie Watch Link -->		<input type="text" id="MovieWatchLink" name="path" class="form-control"  placeholder="Enter Movie Link" value="{{$movies->path}}" required />
									   </div>
									</div>
									<div class="col-md-12">
                                       <div class="form-group form-md-line-input">
										<label for="MovieSubtitle" class="control-label">Poster Path</label>
<!-- this is Movie Subtitle Link --><input type="text" id="MovieSubtitle" name="poster" class="form-control"  placeholder="" value="{{$movies->poster}}" />
									   </div>
									</div>
												</p>
											<!-- ==========/////// Movie Watch Online END ///// --============-->
                                            </div>
											 <div class="tab-pane" id="tab4">
											 <div id="youtubetrailers">
											 <?php // echo CollectYoutubeTrailers($imdbid); ?>
											 </div>
											 </div>
											 <div class="tab-pane" id="tab5">
											 <div id="MoviesScreenShots">
											 <input type="text" name="sbackdrops" id="Moviesbackdrops" hidden />
											 <style>li{padding:10px;}</style>
											 <div class="col-md-3" style="list-style-type:none;"><?php // echo CollectScreenshots($imdbid,$link); ?></div>
											 </div>
											 </div>
											 <div class="tab-pane" id="tab6">
											 <div id="MoviesCasts">
											 <div class="col-md-3">
											      <?php // echo CollectCast($imdbid,$link); ?>
											  </div>
											 </div>
											 </div>
											 <div class="tab-pane" id="tab7">
											 <div id="MoviesCrew">
											   <div class="col-md-3">
											      <?php // echo CollectCrew($imdbid,$link); ?>
											    </div>
											 </div>
											 </div>
                                        </div>
                                    </div>
                           
							<div class="col-md-12">
                                       
<!-- this is SUBMIT -->		<input type="submit" name="submit" id="MovieSubmit" class="btn purple btn-block" value="SUBMIT" />
									   
							</div>
							<!-- /// Form END /// --></form>
							

                                </div>
                            </div>
							
                            <!-- END TAB PORTLET-->
                        </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        @include('admin.partial.footer')
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="..//backend/global/plugins/respond.min.js"></script>
<script src="..//backend/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="/backend/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
			<script src="/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="/backend/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="/backend/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/backend/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="/backend/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="/backend/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="/backend/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            var db_option = '{{$movies->category}}';
            $('#category option').each(function() {
                var option = $(this).val();
                if(option == db_option){
                    $(this).prop("selected", "selected");
                }
                
            });
        </script>
    </body>

</html>