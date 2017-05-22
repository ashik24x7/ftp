@extends('admin.app')
@section('header')
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="/backend/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="/backend/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
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
		ul li:last-child{
			border-bottom:0px solid;
		}
	</style>
    <!-- END THEME LAYOUT STYLES -->
@stop

@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
		
        <div class="page-content">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>View All Menu</div>
                </div>
				
                <div class="portlet-body form">
					<div class="col-md-12">
						<ul class="task-list" style="list-style: none;padding: 10px 4px 3px 0px;">
						@if(session('error'))
								<li>
									<div class="task-title">
										<span class="task-title-sp" style="color: red"><i class="fa fa-times" aria-hidden="true"></i> {!!session('error')!!}</span>
										<span class="label label-sm label-danger"></span>
									</div>
								</li>
						@endif
						@if(session('message'))
								<li>
									<div class="task-title">
										<span class="task-title-sp"><i class="fa fa-check-square-o" aria-hidden="true" style="color:green"></i> {!!session('message')!!}</span>
										<span class="label label-sm label-success"></span>
									</div>
								</li>
						@endif
						</ul>
					</div>
                    <table class="table table-bordered">
						<thead>
							<tr>
								<th class="all">Menu Name</th>
								<th class="min-phone-l">Sub Menu</th>
								<th class="min-tablet ">Edit</th>
								<th class="min-tablet">Delete</th>
							</tr>
						</thead>
						<tbody>
						@foreach($menu as $key)
							<tr>
								<td>{{$key->menu_name}}</td>
								<td>
									<ul style="padding:0px">
									@foreach($key->submenu as $submenu)
										<li style="border-bottom: 1px solid #e7ecf1;padding: 5px 0px;list-style: none;">{{$submenu->menu_name}} 
											<span style="float:right">
												<a href="/admin/submenu/edit/{{$submenu->id}}">Edit</a>
											</span>
										</li>
									@endforeach
									</ul>
								</td>
								<td>
									<a class="btn purple btn-outline sbold pull-right" href="/admin/menu/edit/{{$key->id}}" data-toggle="tooltip" title="Edit"> <i class="fa fa-edit"></i> </a>
								</td>
								<td>
									<a href="/admin/menu/delete/{{$key->id}}" class="btn red btn-outline delete" onclick="return confirm('Are you sure you want to delete submenu?')"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
@stop
@section('footer')

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
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="/backend/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/backend/pages/scripts/form-samples.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="/backend/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
    <script src="/backend/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
    <script src="/backend/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
            

@stop