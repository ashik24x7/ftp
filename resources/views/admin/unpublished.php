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
        <title>Fileserver | Unpublished Movies Information</title>
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
        <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
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
										 <tr>

   
 <?php $json =AllMovies(1);
									      foreach($json as $jsonm)
										 {
											
				echo $title = "<td><img src='images/".$jsonm['MovieID']."/poster/".$jsonm['poster']."' width='75px' height='100px'/> &nbsp;&nbsp;".$jsonm['MovieTitle'].'</td>';					 
				echo "<td><p style='opacity:1;background:radial-gradient(#EA0A5D, #5A0000); color:#fff; padding:3.3px; max-width:150px;text-align:center;font-size:14px;margin-left:5px;'>".$jsonm['MovieCategory']."</p></td>";
				echo "<td><p style='opacity:1;background:radial-gradient(#F76F76, #FF0000); padding:3.3px; max-width:150px;text-align:center; color:#fff;font-size:14px;margin-left:5px;'>".$jsonm['MovieQuality']."</p></td>";
				echo "<td><p style='opacity:1;background:radial-gradient(#013100, #1F9A00); color:#fff; padding:3.3px; width:75px;text-align:center;font-size:14px;margin-left:5px;float:left;'>".$jsonm['MovieSize']."</p></td>";
				echo "<td><p style='opacity:1;background:radial-gradient(#ffffb8, #ce981d); padding:3px; max-width:150px;text-align:center; color:#000; font-size:14px;margin-left:5px;'><span style='color:#000;font-family:impact;'>IMDb &nbsp;</span> <span style='font-family:tahoma;font-weight:bold;'>".$jsonm['MovieRatings']."/10</span></p></td>";
				?>
                                                
                                                <td><span class="label label-warning"><?php echo $jsonm['uploadedUser']; ?></span></td>
                                                <td>
												<a href="<?php echo URL.'/themes/'.THEME.'/movie/'.$jsonm['MovieID'];?>" target="_blank" class="btn btn-primary" data-toggle="tooltip" title="View" ><i class="fa fa-eye"></i></a>
												<a class="btn purple btn-outline sbold" href="movieeidt.php?id=<?php echo $jsonm['MovieID']; ?>" data-toggle="tooltip" title="Edit"> <i class="fa fa-edit"></i> </a>
												<a class="btn purple btn-outline sbold" href="action/publish.php?id=<?php echo $jsonm['MovieID']; ?>" data-toggle="tooltip" title="Publish"> <i class="fa fa-arrow-circle-up"></i> </a>
												 </td>
                                                <td><a href="action/trash.php?id=<?php echo $jsonm['MovieID']; ?>" class="btn btn-danger delete" data-toggle="tooltip" title="delete"><i class="fa fa-trash"></i></a></td>
                                                <td><?php echo $jsonm['uploadTime']; ?></td>
                                                <td><?php echo $jsonm['MovieID']; ?></td>
												<td><?php echo $jsonm['MovieDate']; ?></td>
												<td><?php echo $jsonm['MovieRuntime']; ?></td>
                                                <td><?php echo $jsonm['Movielang']; ?></td>
                                                <td><?php echo $jsonm['MovieStory']; ?></td>
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
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script>
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