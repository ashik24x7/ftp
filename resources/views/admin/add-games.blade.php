<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Fileserver | Add Games</title>
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
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Add Games</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
					<?php // 
    //           if(isset($_SESSION["infoError"]) && !empty($_SESSION["infoError"]) == true){  
    //             foreach($_SESSION["infoError"] as $error) {
				// 	if(!empty($error) == true){
				// 		echo $error;
				// 	}
					
    //             }
				// unset($_SESSION["infoError"]);
    //           }
               ?>
                    <h3 class="page-title"> Add Games
                    
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
					    <div class="col-md-6 ">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                   
                                    <div class="actions">
                                        
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form role="form" action="{{url('/admin/game/add')}}" role="form" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                        <div class="form-body">
										<div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="">
                                                                        <img src="http://www.placehold.it/600x250/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 600px; max-height: 250px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Select image </span>
                                                                            <span class="fileinput-exists"> Change </span>
                                                                            <input type="file" name="cover"> </span>
                                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control" id="form_control_1" name="name" />
                                                <label for="form_control_1">Games Name</label>
                                                <span class="help-block">Write Games Name</span>
                                            </div>
											<div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control" id="form_control_1" name="folder_name" />
                                                <label for="form_control_1">Folder Name</label>
                                                <span class="help-block">Write Folder Name</span>
                                            </div>
                                            <div class="form-group form-md-line-input form-md-floating-label has-error">
                                                <input type="text" class="form-control" id="form_control_1" name="trailer">
                                                <label for="form_control_1">Youtube Trailer Link</label>
												<span class="help-block">Example - (watch?v=N5wJ3m7UdNk)</span>
                                            </div>
											<div class="form-group form-md-line-input form-md-floating-label">
                                                <textarea class="form-control" rows="3" name="details"></textarea>
                                                <label for="form_control_1">Details</label>
												<span class="help-block">Some Details About Games</span>
                                            </div>
											
                                            <div class="form-group form-md-line-input form-md-floating-label has-info">
                                                <select class="form-control edited" id="form_control_1" name="category">
                                                    @foreach($submenu as $key)
                                                        <option value="{{$key->id}}">{{ucwords($key->menu_name)}}</option>
                                                    @endforeach
                                                </select>
                                                <label for="form_control_1">Select Games Category</label>
                                            </div>

                                        </div>
                                        <div class="form-actions noborder">
                                            <input type="submit" name="submit" class="btn btn-primary" value="submit">
                                            <button type="button" class="btn default">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                            
                    
                            <!-- END SAMPLE FORM PORTLET-->
                        </div>
					
					
                        <div class="col-md-6 ">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light portlet-fit portlet-datatable bordered" id="form_wizard_1">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Recent Games Upload</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th class="table-checkbox">
                                                    <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" /> </th>
                                                <th> Cover Image </th>
                                                <th> Games Title </th>
                                                <th> Download Link </th>
                                                <th> Edit </th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
										<?php // //$games = AllGames(0);
										      //foreach($games as $allGames){
										?>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <input type="checkbox" class="checkboxes" value="1" /> 
												</td>
                                                <td> <img src="<?php // echo URL.'/'.$allGames['cover_pic'];?>" width="132px"> </td>
                                                <td>
                                                    <?php // echo $allGames['title']; ?>
                                                </td>
                                                <td>
                                                    <span class="label label-sm label-success"> <?php // echo substr($allGames['download'],0,20).'...'; ?> </span>
                                                </td>
												<td>
                                                    <a href="action/trashgames.php?id=<?php // echo $allGames['id']; ?>" class="btn btn-danger delete" data-toggle="tooltip" title="delete"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
										<?php // } ?>	
											
                                            
											
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                        </div>
                       
                    </div>
                 
          
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            
            <!-- END QUICK SIDEBAR -->
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