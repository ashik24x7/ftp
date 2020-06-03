@extends('admin.app')

@section('header')

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="/backend/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="/backend/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="/backend/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/backend/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
<link href="/backend/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="/backend/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="/backend/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<link href="/backend/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="/backend/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="/backend/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="/backend/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="/backend/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="/backend/layouts/layout/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="/backend/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
<script src="/backend/global/plugins/jquery.min.js" type="text/javascript"></script>
<style> 
    #tab_1_1 > form > div.form-group > div.fileinput.fileinput-new > div.fileinput-preview.fileinput-exists.thumbnail > img{
        max-height:445px;
    }
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
	
	
	.page-content-wrapper .page-content {
		padding: 1px 20px 10px;
	}
	
	.page-content-white .page-title {
		margin: 12px 0;
	}
	.portlet.light.bordered>.portlet-title {
		border-bottom: 0px solid #eef1f5;
	}
	.portlet.light.bordered {
		height: 65px;
	}
	.portlet.light .portlet-body {
		padding-top: 20px;
	}

 </style>
@stop 


@section('content')
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title" id="pagetitle"> Add Tv Series (Manual)

            <small id="test"></small>
        </h3>
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
                    @foreach(session('messages') as $message)
                        <li>
                            <div class="task-title">
                                <span class="task-title-sp"><i class="fa fa-check-square-o" aria-hidden="true" style="color:green"></i> {!!$message!!}</span>
                                <span class="label label-sm label-success"></span>
                            </div>
                        </li>
                    @endforeach
                @endif
                </ul>
            </div>
        </div>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-3">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-social-dribbble font-purple-soft"></i>
                            <span class="caption-subject font-purple-soft bold uppercase">Poster</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                <i class="icon-cloud-upload"></i>
                            </a>
                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                <i class="icon-wrench"></i>
                            </a>
                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                <i class="icon-trash"></i>
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab">
                                    <i class="fa fa-plus"></i> Poster 
                    
                                </a>
                            </li>
                            <li>
                                <a href="#tab_1_2" data-toggle="tab">
                                    <i class="fa fa-chain"></i> URL 
                    
                                </a>
                            </li>
                        </ul>
                          <div class="tab-content">
                            <div class="tab-pane fade active in" id="tab_1_1">
                                <p>
                                    <!-- ///// form start from here /// -->
                                    <form  action="{{ url('/admin/tv-series/manual')}}" role="form" method="post" name="myForm" id="myForm" enctype="multipart/form-data" >
                                    {{csrf_field()}}
                                        <input type="hidden" id="poster_path" name="poster_path">
                                        <input type="hidden" id="castname" name="cast">
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="http://www.placehold.it/300x445/EFEFEF/AAAAAA&amp;text=no+image" alt="" id="poster" />
                                                    <div class="modal" id="loading" style="display:none;">
                                                        <!-- Place at bottom of page -->
                                                    </div>
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width:360px; max-height:535px; display:none"></div>
                                                <div>
                                                    
                                                    <!-- this is Poster Image -->
                                                    <input type="file" id="poster" name="poster" />
                                                    <!-- <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a> -->
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="tab_1_2">
                                    <p>
                                        <div class="form-group">
                                            <!-- <label class="control-label" for="posterUrl" >Enter url (optional)</label> -->
                                            <!-- this is Poster link -->
                                            <!-- <input type="url" name="poster" class="form-control" placeholder="Enter url" /> -->
                                        </div>
                                    </p>
                                </div>
                            </div>
                            <div class="clearfix margin-bottom-20"></div>
                            
                            <div class="tab-content">
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <!-- BEGIN TAB PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption col-md-4">
                                <i class="fa fa-download font-red"></i>
                                <span class="caption-subject font-red bold uppercase">Search for a tv series</span>
                                <br>
                                    <br>
										<div class="col-md-6">
											
										</div>
										<div class="col-md-6">

										</div>
                                        
                                        <br>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <input type="text" id="TvSeriesName" name="name" class="form-control" placeholder="TvSeries Name" style="border:2px solid #f1c40f"/>
                                            </div>
                                            </div>
											<div class="col-md-2">
                                                <div class="form-group">
                                                <!-- <input type="text" id="TvSeriesID" name="api_id" class="form-control" placeholder="tt4383594 , 770672122" style="border:2px solid #f1c40f"/> -->
                                            </div>
												
                                            </div>
                                            <div class="col-md-2">
                                                <a href="javascript:;" class="btn btn-warning" id="IMDB">
												<i class="fa fa-info"></i>GET</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        
                                        <div class="tabbable tabbable-tabdrop">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab1" data-toggle="tab">
                                                        <i class="fa fa-info"></i> information</a>
                                                </li>
                                                <li>
                                                    <a href="#tab2" data-toggle="tab">
                                                        <i class="fa fa-book"></i> Stroy
              
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab4" data-toggle="tab">
                                                        <i class="fa fa-youtube-play"></i> Youtube Trailer
              
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab6" data-toggle="tab">
                                                        <i class="fa fa-users"></i> Cast
              
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                    <p>
                                                        <!-- ========== TvSeries Information ============-->
                                                        <div class="col-md-12">
                                                            
															<div class="col-md-6">
																<div class="form-group">
																	<label for="TvSeriesTitle" class="control-label">Enter Tv Series Title</label>
																	<!-- this is TvSeries Title -->
																	<input type="text" id="TvSeriesTitle" name="title" class="form-control" placeholder="Tv Series Title" required/>
                                                                    <input type="hidden" name="api_id" id="ID">
																</div>
															</div>
															<div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="TvSeriesTrailer" class="control-label">Youtube Trailer.</label>
                                                                    <!-- this is Youtube Trailer -->
                                                                    <input type="text" id="TvSeriesTrailer" name="trailer" class="form-control" placeholder="Youtube Trailer" required/>
                                                                </div>
                                                            </div>
															
															
															
															
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="TvSeriesCategory" class="control-label">Select Category</label>
                                                                    <!-- this is TvSeries Category -->
                                                                    <select class="form-control" id="TvSeriesCategory" name="category" style="" required="required">
                                                                        <option value="">Select Catagory</option>
                                                                        @foreach($category as $key)
                                                                        <option value="{{$key->id}}">{{ucfirst($key->menu_name)}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="TvSeriesRatings" class="control-label">IMDB Ratings</label>
                                                                    <!-- this is IMDB Ratings -->
                                                                    <input type="text" id="TvSeriesRatings" name="rating" class="form-control" placeholder="IMDB Ratings" required="required" />
                                                                </div>
                                                            </div>
                                                            <!-- this is TvSeries Genre -->
                                                            <div class="col-md-6">
                                                                <label for="TvSeriesGenre" class="control-label">Tv Series Genre</label>
                                                                <input type="text" id="TvSeriesGenre" name="genre" class="form-control" placeholder="Tv Series Genre" required="required" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="TvSeriesDate" class="control-label">Release Date</label>
                                                                    <!-- this is TvSeries Release Date -->
                                                                    <input type="text" id="TvSeriesDate" name="release_date" class="form-control" value="{{\Carbon\Carbon::today()}}" required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="TvSerieslang" class="control-label">Tv Series Language</label>
                                                                        <!-- this is TvSeries language -->
                                                                        <input type="text" id="TvSerieslang" name="language" class="form-control"  placeholder="Enter Tv Series Language" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="TvSerieshomepage" class="control-label">Tv Series Homepage</label>
                                                                        <!-- this is TvSeries homepage -->
                                                                        <input type="text" id="TvSerieshomepage" name="website" class="form-control"  placeholder="Enter Tv Series Homepage" />
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </p>
                                                        <!-- ==========/////// TvSeries Information END ///// ============-->
                                                    </div>
                                                    <div class="tab-pane" id="tab2">
                                                        <!-- ========== TvSeries Story Start ============-->
                                                        <p>
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label for="TvSeriesKeywords" class="control-label">TvSeries Meta Keywords</label>
                                                                    <!-- this is TvSeries Meta Keyword -->
                                                                    <input type="text" id="TvSeriesKeywords" name="keyword" class="form-control"  placeholder="Enter TvSeries Keywords" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group last">
                                                                    <label class="control-label col-md-2">Full TvSeries Story
                  
                                                                        <!-- this is TvSeries Stroy -->
                                                                        <span class="required"> * </span></label>
                                                                    <div class="col-md-10">
                                                                        <textarea class="form-control" name="story" rows="10" id="TvSeriesStory"></textarea>
                                                                        <br>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </p>
                                                            <!-- ==========TvSeries Story END============-->
                                                        </div>
                                                        <div class="tab-pane" id="tab4">
                                                            <div id="youtubetrailers"></div>
                                                        </div>
                                                        <div class="tab-pane" id="tab6">
                                                            <div id="TvSeriesCasts">
                                                                <div class="col-md-12">
                                                                <div class="form-group last">
                                                                    <label class="control-label col-md-2">Cast
                  
                                                                        <!-- this is TvSeries Stroy -->
                                                                        <span class="required"> * </span></label>
                                                                    <div class="col-md-10">
                                                                        <textarea class="form-control" name="cast" rows="10" id="TvSeriesCastName"></textarea>
                                                                        <br>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <!-- this is SUBMIT -->
                                                    <input type="submit" name="TvSeriesSubmit" id="TvSeriesSubmit" class="btn purple btn-block" value="SUBMIT" />
                                                </div>
                                                <!-- /// Form END /// -->
                                            </form>
                                        </div>
                                    </div>
                                    <!-- END TAB PORTLET-->
                                </div>
                            </div>
                        </div>
                        <!-- END CONTENT BODY -->
                    </div>
                    <!-- END CONTENT -->

@stop

@section('footer')
     <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="/backend/global/plugins/respond.min.js"></script>
<script src="/backend/global/plugins/excanvas.min.js"></script> 
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
    <script src="/backend/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="/backend/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/backend/pages/scripts/dashboard.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="/backend/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
    <script src="/backend/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
    <script src="/backend/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
    <script src="/backend/pages/scripts/profile.js" type="text/javascript"></script>
    <script src="/backend/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/backend/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    <
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>


$(document).ready(function() {
    function validateForm(){
        var TvSeriesTitle = document.forms["myForm"]["TvSeriesTitle"].value,
            TvSeriesYear  = document.forms["myForm"]["TvSeriesYear"].value,
            poster     = document.getElementById('poster').value,
            TvSeriesQuality = document.forms["myForm"]["TvSeriesQuality"].value,
            TvSeriesGenre = document.forms["myForm"]["TvSeriesGenre"].value,
            TvSeriesCategory = document.forms["myForm"]["TvSeriesCategory"].value,
            TvSeriesStory = document.forms["myForm"]["TvSeriesStory"].value,
            TvSeriesWatchLink = document.forms["myForm"]["TvSeriesWatchLink"].value,
            TvSeriesRatings = document.forms["myForm"]["TvSeriesRatings"].value,
            hilightCss = {"border-bottom-color":"red", // for change css
                         "background-color":"#f9e5e5"};

            if (TvSeriesTitle == null || TvSeriesTitle == ""){
                $('#TvSeriesTitle').after('<span style="color:red;font-size:12px;"> Please enter TvSeries Title</span>');
                $('#TvSeriesID').after('<span style="color:red;font-size:12px;"> or enter TvSeries IMDB ID/TMDB ID</span>');
                $("#TvSeriesTitle").css(hilightCss);
                
            }
            if (TvSeriesYear == null || TvSeriesYear == ""){
                $('#TvSeriesYear').after('<span style="color:red;font-size:12px;"> Please enter TvSeries Year</span>');
                $("#TvSeriesYear").css(hilightCss);
            }
           if(TvSeriesQuality == 0 || TvSeriesQuality == ""){
               $('#TvSeriesQuality').after('<span style="color:red;font-size:12px;">Please Select TvSeries Quality</span>');
               $("#TvSeriesQuality").css(hilightCss);
           }
           if(TvSeriesGenre == null || TvSeriesGenre == ""){
               $('#TvSeriesGenre').after('<span style="color:red;font-size:16px;"> Please Choose one TvSeries Genre</span>');
               $("#TvSeriesGenre").css(hilightCss);
           }
           if(TvSeriesCategory == 0 || TvSeriesCategory == ""){
               $('#TvSeriesCategory').after('<span style="color:red;font-size:12px;">Please Select TvSeries Category</span>');
               $("#TvSeriesCategory").css(hilightCss);
           }
           if(TvSeriesStory == null || TvSeriesStory == ""){
               $('#TvSeriesStory').after('<span style="color:red;font-size:12px;">Please Write TvSeries Story</span>');
               $("#TvSeriesStory").css(hilightCss);
           }
           if(TvSeriesWatchLink == null || TvSeriesWatchLink == ""){
               $('#TvSeriesWatchLink').after('<span style="color:red;font-size:12px;">Please Enter Download Link / Watch Link</span>');
               $("#TvSeriesWatchLink").css(hilightCss);
           }
            if(TvSeriesRatings == null || TvSeriesRatings == ""){
               $('#TvSeriesRatings').after('<span style="color:red;font-size:12px;">Please IMDB rating</span>');
               $("#TvSeriesRatings").css(hilightCss);
           }
           if (poster == null || poster == ""){
                $('#posterError').after('<span style="color:red;font-size:16px;"> Please Upload TvSeries poster</span>');
            }/* else if (extension!="PNG" && extension!="JPG" && extension!="GIF" && extension!="JPEG"){
               $('#posterError').after('<span style="color:red;font-size:16px;"> Please Upload Image Extension : JPG , GIF , JPEG , PNG</span>');
              return false;
           } */
           if((TvSeriesTitle == null || TvSeriesTitle == '') || (TvSeriesYear == null || TvSeriesYear == '') || (TvSeriesQuality == 0 || TvSeriesQuality == "") || (TvSeriesGenre == null || TvSeriesGenre == "") || (TvSeriesCategory == 0 || TvSeriesCategory == "") || (TvSeriesStory == null || TvSeriesStory == "") || (TvSeriesWatchLink == null || TvSeriesWatchLink == "") || (TvSeriesRatings == null || TvSeriesRatings == "") || (poster == null || poster == "")){
               document.getElementById('allError').innerHTML = '<span style="color:red;font-size:12px;">Please fill all the required* field</span>';
              return false;
           }   
    }






    $('#IMDB').click(function() {  
        // var id = $('#TvSeriesID').val();
        var name = $('#TvSeriesName').val();
        
			$('#TvSeriesID').css('background-color','#fff');
            $('#loading').show();
            var token = '{{ Session::token() }}';
            var route = '{{ url("/tv-series/api") }}';
            $.ajax({
                method:'POST',
                url:route,
                data:{name:name,_token:token}
            }).done(function(e){
                var data = JSON.parse(e);
                
                var id = data.id;
                var title = data.title;
                var poster = data.poster;
                var overview = data.overview;
                var release_date = data.release_date;
                var vote_average = data.vote_average;
                var genres = data.genres;
                var youtube = data.youtube;
                var homepage = data.homepage;
                var keywords = data.keywords;
                var spokenLanguages = data.spokenLanguages;
                var castname = data.castname;
console.log(e);
                document.getElementById('ID').value = id;
                document.getElementById('TvSeriesTitle').value = title;
                document.getElementById("poster").src = poster; 
                document.getElementById("poster_path").value = poster; 
                document.getElementById("poster").value = poster;   
                document.getElementById("TvSeriesStory").value = overview; 
                document.getElementById("TvSeriesDate").value = release_date;
                document.getElementById("TvSeriesRatings").value = vote_average;
                document.getElementById("TvSeriesGenre").value = genres;
                document.getElementById("TvSeriesTrailer").value = youtube;
                document.getElementById("TvSeriesKeywords").value = keywords;
                document.getElementById("TvSerieshomepage").value = homepage;
                document.getElementById("TvSerieslang").value = spokenLanguages;
                document.getElementById("TvSeriesCastName").value = castname;



                var youtubesplit = youtube.split(',');
                for (i = 0; i < youtubesplit.length; i++){ 
                $('#youtubetrailers').after('<iframe width="315" height="215" src="https://www.youtube.com/embed/'+youtubesplit[i]+'?list=PLJtGgr2nbdeP1NwONuv99vxujk8LZhdVW" frameborder="0" style="margin:10px;" allowfullscreen></iframe>');
                }

                // var crewprofilesplit = crewprofile.split(',');
                // var crewnamesplit = crewname.split(',');
                // var finalCrewdepartmentsplit = finalCrewdepartment.split(',');
                // for (i = 0; i < crewprofilesplit.length; i++){ 
                // $('#TvSeriessCrew').after('<div class="col-md-2"><div class="thumbnail"><img src="http://image.tmdb.org/t/p/w500/'+crewprofilesplit[i]+'" alt="100%x200" style="width: 100%; height: 200px; display: block;" /><div class="caption"><h3 style="font-size:15px;margin:px 0px -3px 0px;">'+crewnamesplit[i].substr(0,16)+'</h3><p style="font-size:12px;color:#9b9b9b;margin:-6px 0px 0px 0px;">'+finalCrewdepartmentsplit[i]+'</p></div></div></div>');
                // }

                // var castprofilesplit = castprofile.split(',');
                // var castnamesplit = castname.split(',');
                // var finalCastcharactersplit = finalCastcharacter.split(',');
                // for (i = 0; i < castprofilesplit.length; i++){ 
                // $('#TvSeriessCasts').after('<div class="col-md-2"><div class="thumbnail"><img src="http://image.tmdb.org/t/p/w500/'+castprofilesplit[i]+'" alt="100%x200" style="width: 100%; height: 200px; display: block;" /><div class="caption"><h3 style="font-size:15px;margin:px 0px -3px 0px;">'+castnamesplit[i].substr(0,16)+'</h3><p style="font-size:12px;color:#9b9b9b;margin:-6px 0px 0px 0px;">'+finalCastcharactersplit[i]+'</p></div></div></div>');
                // }

                // TvSeriessScreenShots
                // var imagessplit = images.split(',');
                // if(imagessplit.length > 12){
                //     var lengt = 12;
                // }else{
                //     var lengt = imagessplit.length;
                // }
                // for (i = 0; i < lengt; i++){ 
                // $('#TvSeriessScreenShots').after('<div class="col-md-3"><a href="#" class="thumbnail"><img src="http://image.tmdb.org/t/p/w500/'+imagessplit[i]+'" alt="100%x180" style="height: 180px; width: 100%; display: block;" > </a></div>');
                // }

                $('#loading').hide(1000);  
                $('#TvSeriesID').css('background-color','#fff');
                $('#removeSolve').hide(100);



            })
    });
});

window.onload = function(){
    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
        var filesInput = document.getElementById('files');
        filesInput.addEventListener("change", function(event){
            var files = event.target.files; //FileList object
            var output = document.getElementById('result');
            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];
                //Only pics
                if(!file.type.match('image'))
                    continue;
                var picReader = new FileReader();
                picReader.addEventListener("load",function(event){
                    var picFile = event.target;
                    var div = document.createElement('div');
                    div.innerHTML = "<img style='width:50px;height:50px;margin:5px;float:left;'  src='" + picFile.result + "' />";
                    output.insertBefore(div,null);
                });
                //Read the image
                picReader.readAsDataURL(file);
            }
        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
}



</script>
@stop