<?php 
include('core/init.php');
?>
<?php protect_page();?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Unpublish tv series | fileserver</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="Kamruddin bivob" />
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
                                <a href="dashboard.php">Dashboard</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="tvseries.php">Tv Series</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Unpublished Tv Series</span>
                            </li>
                        </ul>
                
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Unpublished TV SERIES
                        
                    </h3>
                    <!-- END PAGE TITLE-->
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
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Unpublished TV series</span>
										<a href="action/ungames.php?TVID=publish" class="btn btn-danger publishALL" data-toggle="tooltip" title="" data-original-title="publish"><i class="fa fa-reply"></i> Publish All </a>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Ratings</th>
                                                <th>Uploaded By</th>
                                                <th>Add Episodes</th>
                                                <th>Edit</th>
                                                <th>Publish</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php $json =AllTVseries(1);
									     foreach($json as $jsonm)
										 {
										?>
                                            <tr>
                                                <td><img src='http://image.tmdb.org/t/p/w500/<?php  echo $jsonm['TVposter']; ?>' width='75px' height='100px'/> <?php echo $jsonm['TVtitle']; ?></td>
                                                <td> <?php echo $jsonm['TVcategory']; ?> </td>
                                                <td> <?php echo $jsonm['TVRatings']; ?> </td>
                                                <td> <?php echo $jsonm['uploadedUser']; ?> </td>
                                                <td> <a href="#" class="btn btn-primary delete" data-toggle="tooltip" title="" data-original-title="Add Episodes"><i class="fa fa-plus"></i> Add Episodes</a> </td>
                                                <td>
				<a href="<?php echo URL.'/themes/'.THEME.'/single-tv.php?tvid='.$jsonm['TVID'];?>" target="_blank" class="btn btn-primary" data-toggle="tooltip" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
				<a class="btn purple btn-outline sbold" href="#large<?php echo $jsonm['TVID']; ?>" data-toggle="modal" title="Edit"> <i class="fa fa-edit"></i> </a>
				<a href="action/trash.php?id=tt3685622" class="btn btn-warning delete" data-toggle="tooltip" title="" data-original-title="delete"><i class="fa fa-trash"></i></a>
				 </td>
				 <td><a href="action/ungames.php?STVID=<?php echo $jsonm['TVID'];?>" class="btn btn-danger publishs" data-toggle="tooltip" title="" data-original-title="publish"><i class="fa fa-reply"></i></a></td>
                                            </tr>
                                        <?php } ?>   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->

                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

			
					   			<?php $games = AllTVseries(0);
									     foreach($json as $jsonm)
										 {
			?>
		  <div class="modal fade bs-modal-lg" id="large<?php echo $jsonm['TVID']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
									<i class="fa fa-gift"></i>Update TV Series</div>
								<div class="tools">
									<a href="javascript:;" class="remove"> </a>
								</div>
							</div>
							<div class="portlet-body form">
								<!-- BEGIN FORM-->
								   <form role="form" action="action/edittvseries.php" role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-body">
										<div class="form-group">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" style="width:200px;">
													<img src="http://image.tmdb.org/t/p/w500/<?php  echo $jsonm['TVposter']; ?>" alt="" /> </div>
												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 600px; max-height: 250px;"> </div>
												<div>
													<span class="btn default btn-file">
														<span class="fileinput-new"> Select image </span>
														<span class="fileinput-exists"> Change </span>
														<input type="file" name="TVCover"> </span>
													<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
												</div>
											</div>
											<input type="text" name="coverpic" value="<?php  echo $jsonm['TVposter']; ?>" style="display:none;" />
											<input type="text" name="id" value="<?php  echo $jsonm['TVID']; ?>" style="display:none;" />
										</div>
										<div class="margin-top-10">
											<input type="submit" class="btn green" value="Change Now">
											
										</div>
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control" id="form_control_1" name="TVTitle" value="<?php echo $jsonm['TVtitle'];?>" />
                                                <label for="form_control_1">TV Series Title</label>
                                                <span class="help-block">TV Series Title</span>
                                            </div>
                                            
                                            <div class="form-group form-md-line-input form-md-floating-label has-error">
                                                <input type="text" class="form-control" id="form_control_1" name="YoutubeTrailer" value="<?php echo $jsonm['TVtrailer'];?>" >
                                                <label for="form_control_1">Youtube Trailer Link</label>
												<span class="help-block">example - (https://www.youtube.com/watch?v=N5wJ3m7UdNk)</span>
                                            </div>
                                            <div class="form-group form-md-line-input form-md-floating-label has-info">
                                                <input type="text" class="form-control" id="form_control_1" name="TVactors" value="<?php echo $jsonm['TVactors'];?>">
                                                <label for="form_control_1">Tv Actors</label>
                                            </div>
											<div class="form-group form-md-line-input form-md-floating-label has-info">
                                                <input type="text" class="form-control" id="form_control_1" name="TVgenre" value="<?php echo $jsonm['TVgenre'];?>">
                                                <label for="form_control_1">Tv Genres</label>
                                            </div>
											
											<div class="form-group form-md-line-input form-md-floating-label">
                                                <textarea class="form-control" rows="3" name="TVstory"><?php echo $jsonm['TVstory'];?></textarea>
                                                <label for="form_control_1">Story</label>
												<span class="help-block">Short Story</span>
                                            </div>
											
                                            <div class="form-group form-md-line-input form-md-floating-label has-info">
                                                <select class="form-control edited" id="form_control_1" name="TVcategory">
                                                    <option value=""></option>
                                                    <option value="<?php echo $jsonm['TVcategory'];?>" selected>Select TV Series Category</option>
                                                    <?php menuRead('TV Series'); ?>
                                                </select>
                                                <label for="form_control_1">Select TV Series Category</label>
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
        if(!confirm('Are you sure? it will Store in Trash Games!')){
            e.preventDefault();
            return false;
        }
        return true;
    });
	
	$("a.publishALL").click(function(e){
        if(!confirm('Are you sure? it will Publish All Tv Series!')){
            e.preventDefault();
            return false;
        }
        return true;
    });
	
	$("a.publishs").click(function(e){
        if(!confirm('Are you sure? it will Publish The Tv Series!')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
		</script>
    </body>

</html>