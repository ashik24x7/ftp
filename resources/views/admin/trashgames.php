<?php 
include('core/init.php');
?>
<?php protect_page();?>
<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Fileserver | All Unpublished Games Information</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="View All Movies Information" />
        <meta content="" name="webacademybd.org" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
         <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout/css/themes/<?php echo $user_data['theme']; ?>.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <?php include('includes/top_head.php'); ?>
        <!-- END HEADER -->
       
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?php include('includes/sidebar.php'); ?>
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
                                <a href="#">Games</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>All Trash Games</span>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- END PAGE BAR --><br>
                    <!-- BEGIN PAGE TITLE--><a class="btn red btn-outline sbold pull-right" href="action/trashgames.php?alldel=2" data-toggle="modal" title="published"> <i class="fa fa-times"></i> Delete All</a>
                    <h3 class="page-title"> View All Trash Games
                        
                    </h3>
					
                    
                    <?php 
              if(isset($_SESSION["infoError"]) && !empty($_SESSION["infoError"]) == true){  
                foreach($_SESSION["infoError"] as $error) {
					if(!empty($error) == true){
						echo $error;
					}
					
                }
				unset($_SESSION["infoError"]);
              }
               ?>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i> All Trash Games </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="all">Games Title</th>
                                                <th class="min-phone-l">Games Category</th>
                                                <th class="min-tablet">Games Uploader</th>
                                                <th class="desktop">Games Filesize</th>
                                                <th class="min-tablet">Games Download</th>
                                                <th class="min-tablet">Edit</th>
                                                <th class="min-tablet">Delete</th>
												<th class="none">Games Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										 <tr>
										<?php $games = AllGames(2);
									     foreach($games as $allGames)
										 {
			    $q = takeQuality($allGames['con_cat']);
				echo "<td><img src=".URL.'/'.$allGames['cover_pic']." width=\"105px\" height=\"50px\"/> &nbsp;&nbsp;".$allGames['title'].'</td>';					 
				echo "<td>".$q['menu_name']."</td>";
				echo "<td><span class=\"label label-warning\">".$allGames['uploader']."</span></td>";
				echo "<td>".$allGames['filesize']."</td>";
				echo "<td>".substr($allGames['download'],0,20)."</td>";
				?>
                                                
				
				<td>
				<a href="<?php echo URL.'/themes/'.THEME.'/Games/'.$allGames['title'];?>" target="_blank" class="btn btn-primary" data-toggle="tooltip" title="View" ><i class="fa fa-eye"></i></a>
				<a class="btn purple btn-outline sbold" href="#large<?php echo $allGames['id']; ?>" data-toggle="modal" title="Edit"> <i class="fa fa-edit"></i> </a>
				<a class="btn purple btn-outline sbold" href="action/ungames.php?restore=<?php echo $allGames['id']; ?>" data-toggle="modal" title="restore"> <i class="fa fa-undo"></i> </a>
				 </td>
				<td><a href="action/trashgames.php?delpid=<?php echo $allGames['id']; ?>" class="btn btn-danger delete" data-toggle="tooltip" title="Delete permanently"><i class="fa fa-trash"></i></a></td>
				<td><?php echo $allGames['details']; ?></td>
                                            </tr>				
                <?php } ?>			
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
           
		   
		   			<?php $games = AllGames(2);
									     foreach($games as $allGames)
										 {
			?>
		  <div class="modal fade bs-modal-lg" id="large<?php echo $allGames['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title"><?php echo $allGames['title']; ?></h4>
							</div>
							<div class="modal-body"> 
<div class="portlet box yellow">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i>Update Games</div>
								<div class="tools">
									<a href="javascript:;" class="remove"> </a>
								</div>
							</div>
							<div class="portlet-body form">
								<!-- BEGIN FORM-->
								   <form role="form" action="action/editGames.php" role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-body">
										<div class="form-group">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" style="width: 600px; height: 250px;">
													<img src="<?php echo URL.'/'.$allGames['cover_pic']; ?>" alt="" /> </div>
												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 600px; max-height: 250px;"> </div>
												<div>
													<span class="btn default btn-file">
														<span class="fileinput-new"> Select image </span>
														<span class="fileinput-exists"> Change </span>
														<input type="file" name="GamesCover"> </span>
													<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
												</div>
											</div>
											<input type="text" name="coverpic" value="<?php echo $allGames['cover_pic'];?>" style="display:none;" />
											<input type="text" name="id" value="<?php echo $allGames['id'];?>" style="display:none;" />
										</div>
										<div class="margin-top-10">
											<input type="submit" class="btn green" value="Change Now">
											
										</div>
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control" id="form_control_1" name="GamesTitle" value="<?php echo $allGames['title'];?>" />
                                                <label for="form_control_1">Games Title</label>
                                                <span class="help-block">Give Unique Games Title</span>
                                            </div>
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control" id="form_control_1" name="filesize" value="<?php echo $allGames['filesize'];?>">
                                                <label for="form_control_1">filesize :</label>
                                                <span class="help-block">Give Full Folder Size:</span>
                                            </div>
                                            
                                            <div class="form-group form-md-line-input form-md-floating-label has-error">
                                                <input type="text" class="form-control" id="form_control_1" name="YoutubeTrailer" value="<?php echo $allGames['trailer'];?>" >
                                                <label for="form_control_1">Youtube Trailer Link</label>
												<span class="help-block">example - (https://www.youtube.com/watch?v=N5wJ3m7UdNk)</span>
                                            </div>
                                            <div class="form-group form-md-line-input form-md-floating-label has-info">
                                                <input type="text" class="form-control" id="form_control_1" name="DownloadLink" value="<?php echo $allGames['download'];?>">
                                                <label for="form_control_1">Download link</label>
                                            </div>
											
											<div class="form-group form-md-line-input form-md-floating-label">
                                                <textarea class="form-control" rows="3" name="GamesDetails"><?php echo $allGames['details'];?></textarea>
                                                <label for="form_control_1">Details</label>
												<span class="help-block">Some Details About Games</span>
                                            </div>
											
                                            <div class="form-group form-md-line-input form-md-floating-label has-info">
                                                <select class="form-control edited" id="form_control_1" name="GamesCate">
                                                    <option value=""></option>
                                                    <option value="<?php echo $allGames['con_cat'];?>" selected>Select Games Category</option>
                                                    <?php menuRead('games'); ?>
                                                </select>
                                                <label for="form_control_1">Select Games Category</label>
                                            </div>
											<div class="form-group form-md-line-input form-md-floating-label has-info">
                                                <select class="form-control edited" id="form_control_1" name="Published">
                                                    <option value="0">yes</option>
                                                    <option value="1">Unpublished</option>
                                                </select>
                                                <label for="form_control_1">Published</label>
                                            </div>

                                        </div>
                                        <div class="form-actions noborder">
                                            <input type="submit" name="submit" class="btn btn-primary" value="submit">
                                        </div>
                                    </form>
								<!-- END FORM-->
							</div>
						</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
		  </div>
			<?php } ?>
		   
		   
		   
		   
		   
		   
		   
		   
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
       <?php include('includes/footer.php'); ?>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
             <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
		<script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
		<script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/profile.min.js" type="text/javascript"></script>
		<script src="../assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
		<script>
		$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
		$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure? it will permanetly Delete this Games!')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
		</script>
    </body>

</html>