<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php // echo $json['name']; ?> | Add Episode</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="Kamruddin bivob" />
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
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="/backend/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/backend/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="/backend/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
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
                                <a href="dashboard.php">Dashboard</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="tvseries.php">Tv Series</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Add Episodes</span>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE--><br>
                    @php
                        $path = $tvseries->category_name->drive.'/'.$tvseries->title.'/';
                        $path = str_replace(' ','%20',$path);

                    @endphp
					<div class="col-md-6">
    					 <img class="fx" data-animate="fadeInLeft" alt="" src="{{'/'.$path.$tvseries->poster}}" style="box-shadow: rgb(0, 0, 0) 7px 4px 10px -6px;height:250px;float: left;margin: 30px 10px 0px 0px;">
    					
                        <h3 class="page-title">{{$tvseries->title}}</h3><h5>{{$tvseries->cast}}</h5>{{$tvseries->story}}
					</div>
					
                    
                    <div class="col-md-6">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered" style="margin-top:10px;">
                                <div class="portlet-body">
                                  
                                  <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Add Episode</div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="tabbable-custom nav-justified">
                                        <ul class="nav nav-tabs nav-justified">
                                        <?php // for($i=1;$i<=$json['number_of_seasons'];$i++){?>
                                            <li class="<?php // if($i == $json['number_of_seasons'] ){echo 'active';}?>">
                                                <a href="#tab_1_1_<?php // echo $i; ?>" data-toggle="tab" aria-expanded="true"> <?php // echo 'Season: '.$i; ?> </a>
                                            </li>
                                        <?php // } ?>
                                        </ul>
                                        @php
                                            $path_dir = public_path($tvseries->category_name->drive.'/'.$tvseries->title);
                                        @endphp
                                        <form action="{{url('/admin/episode/auto',$tvseries->id)}}" method="post">
                                        {{csrf_field()}}
                                          <input type="hidden" name="path" value="{{$path_dir}}">
                                          <input type="hidden" name="category" value="{{$tvseries->category}}">
                                          <input type="hidden" name="tvseries" value="{{$tvseries->id}}">
                                        <div class="form-group">
                                            <select class="form-control" name="session">
                                            
                                            @if (is_dir($path_dir))
                                                @php
                                                    $files = scandir($path_dir);
                                                    sort($files);
                                                @endphp
                                                @foreach($files as $file)
                                                @unless(stripos($file,'.png') || stripos($file,'.jpg') || $file == '.' || $file == '..')
                                                <option value="{{$file}}">{{$file}}</option>
                                                @endunless
                                                @endforeach
                                            @endif 
                                            </select>
                                        </div>
                                        <div class="box-footer">
                                            <input type="submit" name="submit" class="btn btn-primary" value="submit">
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                
                                </div>
                            </div>
                                  
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->

                    <div class="col-md-6" style="clear: left;height: 380px;">
                    </div>
                    <div class="col-md-6">
                         <!-- BEGIN PORTLET -->
                                        <div class="portlet light  tasks-widget" style="border: 1px solid #bfbfbf;">
                                            <div class="portlet-title">
                                                <div class="caption caption-md">
                                                    <i class="icon-bar-chart theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Uploded Erorrs</span>
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
                                                </div>
                                                <div class="task-footer">
                                                    
                                                </div>
                                            </div>
                                        </div>
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
        <script src="/backend/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
		<script src="/backend/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
		<script src="/backend/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="/backend/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="/backend/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/backend/pages/scripts/profile.min.js" type="text/javascript"></script>
		<script src="/backend/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
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
        if(!confirm('Are you sure? it will Store in Trash Games!')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
		</script>
    </body>

</html>