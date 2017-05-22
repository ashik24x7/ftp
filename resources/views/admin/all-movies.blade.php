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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        
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
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="page-title"> View All Movies</h3>
                        </div>

                        <div class="col-md-4">
                            <div class="pull-right" style="margin-top: 30px">
                                <form action="{{ url('/admin/movie/search') }}" method="post">
                                {{csrf_field()}}
                                    <input type="text" id="tags" name="str" @if(isset($history)) value="{{$history}}" @endif>
                                    <input type="submit" value="Search">
                                </form>
                            </div>
                        </div>
                    </div>
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
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i> All Movies </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table" width="100%" id="" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="all">Movie Cover</th>
                                                <th class="min-phone-l">Movie Title</th>
                                                <th class="min-phone-l">IMDB ID</th>
                                                <th class="min-tablet">Movie Category</th>
                                                <th class="min-tablet">Movie Quality</th>
                                                <th class="desktop">Movie Filesize</th>
                                                <th class="min-tablet">Imdb Ratings</th>
                                                <th class="min-tablet">Edit</th>
                                                <th class="min-tablet">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($movies as $movie)
                                            @php
											
												$poster_dir = '/storage/'.ltrim($movie->category_name->drive,'fs1/').'/'.$movie->year.'/'.$movie->poster;
												
                                                $path = '/'.$movie->category_name->drive.'/'.$movie->year.'/'.$movie->title.' ['.$movie->year.']/'.$movie->poster;
                                                $path = str_replace(' ','%20',$path);
                                                $path = str_replace('[','%5B',$path);
                                                $path = str_replace(']','%5D',$path);
                                                $path = str_replace("'",'%27',$path);

                                            @endphp
                                            <tr>
                                                <td><img src="{{$poster_dir}}" width="75px" height="100px"/>
                                                </td>
                                                <td>
                                                {{$movie->title}} [{{$movie->year}}]</td>
                                                <td>
                                                {{$movie->api_id}}</td>
                                                <td><p>{{ucfirst($movie->category_name->menu_name)}}</p></td>
                                                <td><p>{{$movie->quality}}</p></td>
                                                <td><p>{{$movie->size}}</p></td>
                                                <td><p><span style='font-family:tahoma;font-weight:bold;'>{{$movie->rating}}/10</span></p></td>
                                                <td>
                                				<a class="btn purple btn-outline sbold" href="/admin/movie/{{$movie->id}}/edit" data-toggle="tooltip" title="Edit"> <i class="fa fa-edit"></i> </a>
                                				 </td>
                                				<td><a href="/admin/movie/{{$movie->id}}" class="btn btn-warning delete" data-toggle="tooltip" title="delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{$movies->links()}}
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
          $( function() {
            var availableTags = [{!!$search!!}];
            $( "#tags" ).autocomplete({
              source: availableTags
            });
        } );
          </script>

    </body>

</html>