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
	<style>
		.page-content-white .page-content .page-bar {
			margin-bottom: 15px;
		}
		.chat-form {
			margin-top: 15px;
			margin-left: 65px;
			padding: 0px;
			background-color: #fff;
			overflow: hidden;
		}
	</style>
	
    <!-- END THEME LAYOUT STYLES -->
@stop

@section('content')
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
                    <li>
                        <span>Dashboard</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- BEGIN DASHBOARD STATS 1-->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue">
                        <div class="visual">
                            <i class="fa fa-file-movie-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="" data-value="{{$movies}}">{{$movies}}</span>
                            </div>
                            <div class="desc"> Total Movies </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="" data-value="{{$tvseries}}">{{$tvseries}}</span></div>
                            <div class="desc"> Total TV Series </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
							<!-- counterup -->
                                <span data-counter="" data-value="{{$games}}">{{$games}}</span>
                            </div>
                            <div class="desc"> Total Games </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple">
                        <div class="visual">
                            <i class="fa fa-gear"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="" data-value="{{$softwares}}">{{$softwares}}</span></div>
                            <div class="desc"> Total Softwares </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- END DASHBOARD STATS 1-->
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-bar-chart font-green"></i>
                                <span class="caption-subject font-green bold uppercase">Site Visits</span>
                                <span class="caption-helper">total stats...</span>
                            </div>
                            
                        </div>
                        <div class="portlet-body">
                            <div id="site_statistics_loading">
                                <img src="/backend/global/img/loading.gif" alt="loading" /> </div>
                            <div id="site_statistics_content" class="display-none">
                                <div id="site_statistics" class="chart"> </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
				
                
            </div>
            
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-share font-blue"></i>
                                <span class="caption-subject font-blue bold uppercase">Recent Activities</span>
                            </div>
                            <div class="actions">
                                <div class="btn-group">
                                    <a class="btn btn-sm blue btn-outline btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter By
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                        <label>
                                            <input type="checkbox" /> Finance</label>
                                        <label>
                                            <input type="checkbox" checked="" /> Membership</label>
                                        <label>
                                            <input type="checkbox" /> Customer Support</label>
                                        <label>
                                            <input type="checkbox" checked="" /> HR</label>
                                        <label>
                                            <input type="checkbox" /> System</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                                <ul class="feeds">
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 4 pending tasks.
                                                        <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bar-chart-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-danger">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received with
                                                        <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 30 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-default">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Web server hardware needs to be upgraded.
                                                        <span class="label label-sm label-default "> Overdue </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 2 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-default">
                                                            <i class="fa fa-briefcase"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 4 pending tasks.
                                                        <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-danger">
                                                            <i class="fa fa-bar-chart-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-default">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received with
                                                        <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 30 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Web server hardware needs to be upgraded.
                                                        <span class="label label-sm label-default "> Overdue </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 2 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-briefcase"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="scroller-footer">
                                <div class="btn-arrow-link pull-right">
                                    <a href="javascript:;">See All Records</a>
                                    <i class="icon-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="portlet light tasks-widget bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-share font-green-haze hide"></i>
                                <span class="caption-subject font-green bold uppercase">Tasks</span>
                                <span class="caption-helper">tasks summary...</span>
                            </div>
                            <div class="actions">
                                <div class="btn-group">
                                    <a class="btn green btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> More
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;"> All Project </a>
                                        </li>
                                        <li class="divider"> </li>
                                        <li>
                                            <a href="javascript:;"> AirAsia </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;"> Cruise </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;"> HSBC </a>
                                        </li>
                                        <li class="divider"> </li>
                                        <li>
                                            <a href="javascript:;"> Pending
                                                <span class="badge badge-danger"> 4 </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;"> Completed
                                                <span class="badge badge-success"> 12 </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;"> Overdue
                                                <span class="badge badge-warning"> 9 </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="task-content">
                                <div class="scroller" style="height: 312px;" data-always-visible="1" data-rail-visible1="1">
                                    <!-- START TASK LIST -->
                                    <ul class="task-list">
                                        <li>
                                            <div class="task-checkbox">
                                                <input type="checkbox" class="liChild" value="" /> </div>
                                            <div class="task-title">
                                                <span class="task-title-sp"> Present 2013 Year IPO Statistics at Board Meeting </span>
                                                <span class="label label-sm label-success">Company</span>
                                                <span class="task-bell">
                                                    <i class="fa fa-bell-o"></i>
                                                </span>
                                            </div>
                                            <div class="task-config">
                                                <div class="task-config-btn btn-group">
                                                    <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                        <i class="fa fa-cog"></i>
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-check"></i> Complete </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-pencil"></i> Edit </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-trash-o"></i> Cancel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="task-checkbox">
                                                <input type="checkbox" class="liChild" value="" /> </div>
                                            <div class="task-title">
                                                <span class="task-title-sp"> Hold An Interview for Marketing Manager Position </span>
                                                <span class="label label-sm label-danger">Marketing</span>
                                            </div>
                                            <div class="task-config">
                                                <div class="task-config-btn btn-group">
                                                    <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                        <i class="fa fa-cog"></i>
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-check"></i> Complete </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-pencil"></i> Edit </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-trash-o"></i> Cancel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="task-checkbox">
                                                <input type="checkbox" class="liChild" value="" /> </div>
                                            <div class="task-title">
                                                <span class="task-title-sp"> AirAsia Intranet System Project Internal Meeting </span>
                                                <span class="label label-sm label-success">AirAsia</span>
                                                <span class="task-bell">
                                                    <i class="fa fa-bell-o"></i>
                                                </span>
                                            </div>
                                            <div class="task-config">
                                                <div class="task-config-btn btn-group">
                                                    <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                        <i class="fa fa-cog"></i>
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-check"></i> Complete </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-pencil"></i> Edit </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-trash-o"></i> Cancel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="task-checkbox">
                                                <input type="checkbox" class="liChild" value="" /> </div>
                                            <div class="task-title">
                                                <span class="task-title-sp"> Technical Management Meeting </span>
                                                <span class="label label-sm label-warning">Company</span>
                                            </div>
                                            <div class="task-config">
                                                <div class="task-config-btn btn-group">
                                                    <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                        <i class="fa fa-cog"></i>
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-check"></i> Complete </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-pencil"></i> Edit </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-trash-o"></i> Cancel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="task-checkbox">
                                                <input type="checkbox" class="liChild" value="" /> </div>
                                            <div class="task-title">
                                                <span class="task-title-sp"> Kick-off Company CRM Mobile App Development </span>
                                                <span class="label label-sm label-info">Internal Products</span>
                                            </div>
                                            <div class="task-config">
                                                <div class="task-config-btn btn-group">
                                                    <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                        <i class="fa fa-cog"></i>
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-check"></i> Complete </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-pencil"></i> Edit </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-trash-o"></i> Cancel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="task-checkbox">
                                                <input type="checkbox" class="liChild" value="" /> </div>
                                            <div class="task-title">
                                                <span class="task-title-sp"> Prepare Commercial Offer For SmartVision Website Rewamp </span>
                                                <span class="label label-sm label-danger">SmartVision</span>
                                            </div>
                                            <div class="task-config">
                                                <div class="task-config-btn btn-group">
                                                    <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                        <i class="fa fa-cog"></i>
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-check"></i> Complete </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-pencil"></i> Edit </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-trash-o"></i> Cancel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="task-checkbox">
                                                <input type="checkbox" class="liChild" value="" /> </div>
                                            <div class="task-title">
                                                <span class="task-title-sp"> Sign-Off The Comercial Agreement With AutoSmart </span>
                                                <span class="label label-sm label-default">AutoSmart</span>
                                                <span class="task-bell">
                                                    <i class="fa fa-bell-o"></i>
                                                </span>
                                            </div>
                                            <div class="task-config">
                                                <div class="task-config-btn btn-group dropup">
                                                    <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                        <i class="fa fa-cog"></i>
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-check"></i> Complete </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-pencil"></i> Edit </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-trash-o"></i> Cancel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="task-checkbox">
                                                <input type="checkbox" class="liChild" value="" /> </div>
                                            <div class="task-title">
                                                <span class="task-title-sp"> Company Staff Meeting </span>
                                                <span class="label label-sm label-success">Cruise</span>
                                                <span class="task-bell">
                                                    <i class="fa fa-bell-o"></i>
                                                </span>
                                            </div>
                                            <div class="task-config">
                                                <div class="task-config-btn btn-group dropup">
                                                    <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                        <i class="fa fa-cog"></i>
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-check"></i> Complete </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-pencil"></i> Edit </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-trash-o"></i> Cancel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="last-line">
                                            <div class="task-checkbox">
                                                <input type="checkbox" class="liChild" value="" /> </div>
                                            <div class="task-title">
                                                <span class="task-title-sp"> webacademybd Investment Discussion </span>
                                                <span class="label label-sm label-warning">webacademybd </span>
                                            </div>
                                            <div class="task-config">
                                                <div class="task-config-btn btn-group dropup">
                                                    <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                        <i class="fa fa-cog"></i>
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-check"></i> Complete </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-pencil"></i> Edit </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-trash-o"></i> Cancel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- END START TASK LIST -->
                                </div>
                            </div>
                            <div class="task-footer">
                                <div class="btn-arrow-link pull-right">
                                    <a href="javascript:;">See All Records</a>
                                    <i class="icon-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-cursor font-purple"></i>
                                <span class="caption-subject font-purple bold uppercase">General Stats</span>
                            </div>
                            <div class="actions">
                                <a href="javascript:;" class="btn btn-sm btn-circle red easy-pie-chart-reload">
                                    <i class="fa fa-repeat"></i> Reload </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="easy-pie-chart">
                                        <div class="number transactions" data-percent="55">
                                            <span>+55</span>% </div>
                                        <a class="title" href="javascript:;"> Transactions
                                            <i class="icon-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="margin-bottom-10 visible-sm"> </div>
                                <div class="col-md-4">
                                    <div class="easy-pie-chart">
                                        <div class="number visits" data-percent="85">
                                            <span>+85</span>% </div>
                                        <a class="title" href="javascript:;"> New Visits
                                            <i class="icon-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="margin-bottom-10 visible-sm"> </div>
                                <div class="col-md-4">
                                    <div class="easy-pie-chart">
                                        <div class="number bounce" data-percent="46">
                                            <span>-46</span>% </div>
                                        <a class="title" href="javascript:;"> Bounce
                                            <i class="icon-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-equalizer font-yellow"></i>
                                <span class="caption-subject font-yellow bold uppercase">Server Stats</span>
                                <span class="caption-helper">monthly stats...</span>
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"> </a>
                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                <a href="" class="reload"> </a>
                                <a href="" class="remove"> </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="sparkline-chart">
                                        <div class="number" id="sparkline_bar5"></div>
                                        <a class="title" href="javascript:;"> Network
                                            <i class="icon-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="margin-bottom-10 visible-sm"> </div>
                                <div class="col-md-4">
                                    <div class="sparkline-chart">
                                        <div class="number" id="sparkline_bar6"></div>
                                        <a class="title" href="javascript:;"> CPU Load
                                            <i class="icon-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="margin-bottom-10 visible-sm"> </div>
                                <div class="col-md-4">
                                    <div class="sparkline-chart">
                                        <div class="number" id="sparkline_line"></div>
                                        <a class="title" href="javascript:;"> Load Rate
                                            <i class="icon-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <!-- BEGIN REGIONAL STATS PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-share font-red-sunglo"></i>
                                <span class="caption-subject font-red-sunglo bold uppercase">Regional Stats</span>
                            </div>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-cloud-upload"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-wrench"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div id="region_statistics_loading">
                                <img src="/backend/global/img/loading.gif" alt="loading" /> </div>
                            <div id="region_statistics_content" class="display-none">
                                <div class="btn-toolbar margin-bottom-10">
                                    <div class="btn-group btn-group-circle" data-toggle="buttons">
                                        <a href="" class="btn grey-salsa btn-sm active"> Users </a>
                                        <a href="" class="btn grey-salsa btn-sm"> Orders </a>
                                    </div>
                                    <div class="btn-group pull-right">
                                        <a href="" class="btn btn-circle grey-salsa btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Select Region
                                            <span class="fa fa-angle-down"> </span>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="javascript:;" id="regional_stat_world"> World </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" id="regional_stat_usa"> USA </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" id="regional_stat_europe"> Europe </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" id="regional_stat_russia"> Russia </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" id="regional_stat_germany"> Germany </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="vmap_world" class="vmaps display-none"> </div>
                                <div id="vmap_usa" class="vmaps display-none"> </div>
                                <div id="vmap_europe" class="vmaps display-none"> </div>
                                <div id="vmap_russia" class="vmaps display-none"> </div>
                                <div id="vmap_germany" class="vmaps display-none"> </div>
                            </div>
                        </div>
                    </div>
                    <!-- END REGIONAL STATS PORTLET-->
                </div>
                <div class="col-md-6 col-sm-6">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                                <i class="icon-globe font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">Feeds</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" class="active" data-toggle="tab"> System </a>
                                </li>
                                <li>
                                    <a href="#tab_1_2" data-toggle="tab"> Activities </a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <!--BEGIN TABS-->
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_1">
                                    <div class="scroller" style="height: 339px;" data-always-visible="1" data-rail-visible="0">
                                        <ul class="feeds">
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-success">
                                                                <i class="fa fa-bell-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> You have 4 pending tasks.
                                                                <span class="label label-sm label-info"> Take action
                                                                    <i class="fa fa-share"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> Just now </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <i class="fa fa-bell-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New version v1.4 just lunched! </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 20 mins </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-danger">
                                                                <i class="fa fa-bolt"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> Database server #12 overloaded. Please fix the issue. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 24 mins </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New order received. Please take care of it. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 30 mins </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-success">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New order received. Please take care of it. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 40 mins </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-warning">
                                                                <i class="fa fa-plus"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New user registered. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 1.5 hours </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-success">
                                                                <i class="fa fa-bell-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> Web server hardware needs to be upgraded.
                                                                <span class="label label-sm label-default "> Overdue </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 2 hours </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-default">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New order received. Please take care of it. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 3 hours </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-warning">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New order received. Please take care of it. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 5 hours </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New order received. Please take care of it. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 18 hours </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-default">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New order received. Please take care of it. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 21 hours </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New order received. Please take care of it. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 22 hours </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-default">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New order received. Please take care of it. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 21 hours </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New order received. Please take care of it. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 22 hours </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-default">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New order received. Please take care of it. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 21 hours </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New order received. Please take care of it. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 22 hours </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-default">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New order received. Please take care of it. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 21 hours </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> New order received. Please take care of it. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 22 hours </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_1_2">
                                    <div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible1="1">
                                        <ul class="feeds">
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <i class="fa fa-bell-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New user registered </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> Just now </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <i class="fa fa-bell-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 10 mins </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-danger">
                                                                <i class="fa fa-bolt"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> Order #24DOP4 has been rejected.
                                                                <span class="label label-sm label-danger "> Take action
                                                                    <i class="fa fa-share"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 24 mins </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <i class="fa fa-bell-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New user registered </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> Just now </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <i class="fa fa-bell-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New user registered </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> Just now </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <i class="fa fa-bell-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New user registered </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> Just now </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <i class="fa fa-bell-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New user registered </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> Just now </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <i class="fa fa-bell-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New user registered </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> Just now </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <i class="fa fa-bell-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New user registered </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> Just now </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <i class="fa fa-bell-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New user registered </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> Just now </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--END TABS-->
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet light calendar bordered">
                        <div class="portlet-title ">
                            <div class="caption">
                                <i class="icon-calendar font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">Feeds</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div id="calendar"> </div>
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
                <div class="col-md-6 col-sm-6">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-bubble font-red-sunglo"></i>
                                <span class="caption-subject font-red-sunglo bold uppercase">Chats</span>
                            </div>
                            <div class="actions">
                                <div class="portlet-input input-inline">
                                    <div class="input-icon right">
                                        <i class="icon-magnifier"></i>
                                        <input type="text" class="form-control input-circle" placeholder="search..."> </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body" id="chats">
                            <div class="scroller" style="height: 525px;" data-always-visible="1" data-rail-visible1="1">
                                <ul class="chats">
                                    <li class="out">
                                        <img class="avatar" alt="" src="/backend/layouts/layout/img/avatar2.jpg" />
                                        <div class="message">
                                            <span class="arrow"> </span>
                                            <a href="javascript:;" class="name"> Lisa Wong </a>
                                            <span class="datetime"> at 20:11 </span>
                                            <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                        </div>
                                    </li>
                                    <li class="out">
                                        <img class="avatar" alt="" src="/backend/layouts/layout/img/avatar2.jpg" />
                                        <div class="message">
                                            <span class="arrow"> </span>
                                            <a href="javascript:;" class="name"> Lisa Wong </a>
                                            <span class="datetime"> at 20:11 </span>
                                            <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                        </div>
                                    </li>
                                    <li class="in">
                                        <img class="avatar" alt="" src="/backend/layouts/layout/img/avatar1.jpg" />
                                        <div class="message">
                                            <span class="arrow"> </span>
                                            <a href="javascript:;" class="name"> Bob Nilson </a>
                                            <span class="datetime"> at 20:30 </span>
                                            <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                        </div>
                                    </li>
                                    <li class="in">
                                        <img class="avatar" alt="" src="/backend/layouts/layout/img/avatar1.jpg" />
                                        <div class="message">
                                            <span class="arrow"> </span>
                                            <a href="javascript:;" class="name"> Bob Nilson </a>
                                            <span class="datetime"> at 20:30 </span>
                                            <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                        </div>
                                    </li>
                                    <li class="out">
                                        <img class="avatar" alt="" src="/backend/layouts/layout/img/avatar3.jpg" />
                                        <div class="message">
                                            <span class="arrow"> </span>
                                            <a href="javascript:;" class="name"> Richard Doe </a>
                                            <span class="datetime"> at 20:33 </span>
                                            <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                        </div>
                                    </li>
                                    <li class="in">
                                        <img class="avatar" alt="" src="/backend/layouts/layout/img/avatar3.jpg" />
                                        <div class="message">
                                            <span class="arrow"> </span>
                                            <a href="javascript:;" class="name"> Richard Doe </a>
                                            <span class="datetime"> at 20:35 </span>
                                            <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                        </div>
                                    </li>
                                    <li class="out">
                                        <img class="avatar" alt="" src="/backend/layouts/layout/img/avatar1.jpg" />
                                        <div class="message">
                                            <span class="arrow"> </span>
                                            <a href="javascript:;" class="name"> Bob Nilson </a>
                                            <span class="datetime"> at 20:40 </span>
                                            <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                        </div>
                                    </li>
                                    <li class="in">
                                        <img class="avatar" alt="" src="/backend/layouts/layout/img/avatar3.jpg" />
                                        <div class="message">
                                            <span class="arrow"> </span>
                                            <a href="javascript:;" class="name"> Richard Doe </a>
                                            <span class="datetime"> at 20:40 </span>
                                            <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                        </div>
                                    </li>
                                    <li class="out">
                                        <img class="avatar" alt="" src="/backend/layouts/layout/img/avatar1.jpg" />
                                        <div class="message">
                                            <span class="arrow"> </span>
                                            <a href="javascript:;" class="name"> Bob Nilson </a>
                                            <span class="datetime"> at 20:54 </span>
                                            <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. sed diam nonummy nibh euismod tincidunt ut laoreet. </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat-form">
                                <div class="input-cont">
                                    <input class="form-control" type="text" placeholder="Type a message here..." /> </div>
                                <div class="btn-cont">
                                    <span class="arrow"> </span>
                                    <a href="" class="btn blue icn-only">
                                        <i class="fa fa-check icon-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
@stop
@section('footer')

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
            

@stop