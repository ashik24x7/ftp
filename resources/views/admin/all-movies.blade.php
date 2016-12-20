<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Fileserver | All Movies Information</title>
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
                            <li>
                                <a href="#">Movies</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>All Movies</span>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> View All Movies
                        
                    </h3>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i> All Movies </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="all">Movie Title</th>
                                                <th class="min-phone-l">Movie Category</th>
                                                <th class="min-tablet">Movie quality</th>
                                                <th class="desktop">Movie Filesize</th>
                                                <th class="min-tablet">Imdb Ratings</th>
                                                <th class="min-tablet">Uploader</th>
                                                <th class="min-tablet">Edit</th>
                                                <th class="min-tablet">Delete</th>
												<th class="none">uploaded Time</th>
												<th class="none">IMDB id</th>
												<th class="none">release date</th>
												<th class="none">runtime</th>
                                                <th class="none">original language</th>
                                                <th class="none">overview</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($movies as $movie)
                                            <tr>
                                                <td><img src="" width="75px" height="100px"/> &nbsp;&nbsp;{{$movie->title}} [{{$movie->year}}]</td>
                                                <td><p style='opacity:1;background:radial-gradient(#EA0A5D, #5A0000); color:#fff; padding:3.3px; max-width:150px;text-align:center;font-size:14px;margin-left:5px;'>{{$movie->category_name->menu_name}}</p></td>
                                                <td><p style='opacity:1;background:radial-gradient(#F76F76, #FF0000); padding:3.3px; max-width:150px;text-align:center; color:#fff;font-size:14px;margin-left:5px;'>{{$movie->quality}}</p></td>
                                                <td><p style='opacity:1;background:radial-gradient(#013100, #1F9A00); color:#fff; padding:3.3px; width:75px;text-align:center;font-size:14px;margin-left:5px;float:left;'>{{$movie->size}}</p></td>
                                                <td><p style='opacity:1;background:radial-gradient(#ffffb8, #ce981d); padding:3px; max-width:150px;text-align:center; color:#000; font-size:14px;margin-left:5px;'><span style='color:#000;font-family:impact;'>IMDb &nbsp;</span> <span style='font-family:tahoma;font-weight:bold;'>{{$movie->ratings}}/10</span></p></td>
                                                <td><span class="label label-warning">{{$movie->uploaded_by}}</span></td>
                                                <td>
                                                <a href="/admin/movie/{{$movie->title}}" target="_blank" class="btn btn-primary" data-toggle="tooltip" title="View" ><i class="fa fa-eye"></i></a>
                                				<a class="btn purple btn-outline sbold" href="/admin/movie/{{$movie->title}}/edit" data-toggle="tooltip" title="Edit"> <i class="fa fa-edit"></i> </a>
                                				 </td>
                                				<td><a href="/admin/movie/{{$movie->title}}" class="btn btn-warning delete" data-toggle="tooltip" title="delete"><i class="fa fa-trash"></i></a></td>
                                				<td>{{$movie->created_at}}</td>
                                				<td>{{$movie->id}}</td>
                                				<td>{{$movie->release_date}}</td>
                                				<td>{{$movie->time}}</td>
                                				<td>{{$movie->language}}</td>
                                				<td>{{$movie->story}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
        if(!confirm('Are you sure? it will Store in Trash Movies!')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
		</script>
    </body>

</html>