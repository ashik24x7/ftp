<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Fileserver | Automatic Movie Upload</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="View All Movies Information" />
        <meta content="" name="webacademybd.org" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="/backend/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="/backend/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="/backend/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/backend/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="/backend/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="/backend/layouts/layout/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="/backend/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        @include('admin.partial.top-head')
        <!-- END HEADER -->
       
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
           @include('admin.partial.sidebar')
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                 
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="#">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE--><br>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
							 <div class="col-md-12">
                            <!-- BEGIN Portlet PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Scan Folders</div>
                                </div>
                                <div class="portlet-body" style="height: auto; display: block;">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;"><div class="scroller" style="height:auto; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red" data-initialized="1">
                                        
                                        <br>
										
                                        	<form action="{{url('/admin/movie/auto')}}" method="post">
                                        	   {{csrf_field()}}
                                        	<div class="row">

                                        	<div class="col-md-5">
                                            	<div class="form-group">
                                                      <label>Select Category</label>
                                        			  <select class="form-control" name="category" style="" required="required">
                                        				 <option value="">Select Catagory</option>
                                        				  @foreach($category as $key)
                                                            <option value="{{$key->id}}">{{ucwords($key->menu_name)}}</option>
                                                            @endforeach
                                        			  </select>
                                                </div>
                                        	</div>
                                        	<div class="col-md-3 col-md-offset-1">
                                        	   <div class="form-group">
                                        		<label for="exampleInputPassword1">Movie Year</label>
                                        		<input type="number" name="year" class="form-control" id="exampleInputPassword1" placeholder="Enter Movie Year" value="" required="">
                                                </div>	
                                        	</div>
                                        	<div class="col-md-2">
                                        	<div class="form-group">
                                           
                                        	 <input type="submit" class="btn btn-primary" value="Update" style="margin-top:23px;">
                                        	</div>	
                                        	</div>
                                        			
                                            </div>
                                        	
                                        	</form>
										
										
										
										</div><div class="slimScrollBar" style="background: red; width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 200px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: block; border-radius: 7px; background: blue; opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
                        </div>
							
							
                           <div class="col-md-6">
                                        <!-- BEGIN PORTLET -->
                                        <div class="portlet light" style="border:1px solid #333;">
                                            <div class="portlet-title">
                                                <div class="caption caption-md">
                                                    <i class="icon-bar-chart theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Recent Automatic Uploaded Movies</span>
                                                    <span class="caption-helper hide">weekly stats...</span>
                                                </div>
                                                
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row number-stats margin-bottom-30">
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <div class="stat-left">
                                                            <div class="stat-chart">
                                                                <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                                                <div id="sparkline_bar"><canvas width="90" height="45" style="display: inline-block; width: 90px; height: 45px; vertical-align: top;"></canvas></div>
                                                            </div>
                                                            <div class="stat-number">
                                                                <div class="title"> Total Movie</div>
                                                                <div class="number"> {{ isset($total) ? $total : ""}} </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <div class="stat-right">
                                                            <div class="stat-number">
                                                                <div class="title"> Unpublished Movie </div>
                                                                <div class="number"> {{ isset($unpublish) ? $unpublish : ""}} </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END PORTLET -->
                                    </div>
						
						<div class="col-md-6">
                                        <!-- BEGIN PORTLET -->
                                        <div class="portlet light  tasks-widget" style="border: 1px solid #bfbfbf;">
                                            <div class="portlet-title">
                                                <div class="caption caption-md">
                                                    <i class="icon-bar-chart theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Movies Uploded Erorrs</span>
                                                    <span class="caption-helper">{{count(session('errors'))}} Errors! | {{count(session('messages'))}} Success!</span>
                                                </div>
                                                
                                            </div>
                                            <div class="portlet-body">
                                                <div class="task-content">
                                                    <div class="slimScrollDiv" style="position: relative; width: auto; height: 282px;"><div class="scroller" style="height: 282px; width: auto; overflow: scroll;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2" data-initialized="1">
                                                        <!-- START TASK LIST -->
                                                        <ul class="task-list">
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
                                                        <!-- END START TASK LIST -->
                                                    <!-- </div><div class="slimScrollBar" style="background: rgb(215, 220, 226); width: 7px; position: absolute; top: 60px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 221.515px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div> -->
                                                </div>
                                                <div class="task-footer">
                                                    <div class="btn-arrow-link pull-right">
                                                        <a href="javascript:;">See All Tasks</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END PORTLET -->
                                    </div>
						
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                        
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
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
        <script src="/backend/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="/backend/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/backend/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="/backend/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="/backend/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="/backend/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
		<script>
		$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
		$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure? it will delete the whole information!')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
		</script>
    </body>

</html>