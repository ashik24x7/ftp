<?php 
include('core/init.php');
$TVID = mysqli_real_escape_string($connect_baza,$_GET['tvid']);
$json = singleTVseries($TVID);
?>
<?php protect_page();?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $json['name']; ?> | Add Episode</title>
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
                                <span>Add Episodes</span>
                            </li>
                        </ul>
                
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE--><br>
					<div class="col-md-1">
					 <img class="fx" data-animate="fadeInLeft" alt="" src="http://image.tmdb.org/t/p/w300/<?php echo $json['poster_path']; ?>" style="box-shadow: rgb(0, 0, 0) 7px 4px 10px -6px;height:150px;">
					</div>
					<div class="col-md-11" style="margin-top:-15px;">
                    <h3 class="page-title"> <?php echo $json['name']; ?></h3>
					<?php echo $json['overview']; ?>
					</div>
					
                    <!-- END PAGE TITLE-->
                  <?php 
              if(isset($_SESSION["infoError"]) && !empty($_SESSION["infoError"]) == true){  
                foreach($_SESSION["infoError"] as $error) {
					if(!empty($error) == true){
						echo $error;
						//exit;
					}
					
                }
				unset($_SESSION["infoError"]);
              }
               ?>
                    <div class="row">
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
				<script>
				$(document).ready(function() {
					var max_fields      = 200; //maximum input boxes allowed
					var wrapper         = $(".input_fields_wrap"); //Fields wrapper
					var add_button      = $(".add_field_button"); //Add button ID
					
					var x = 1; //initlal text box count
					$(add_button).click(function(e){ //on add input button click
						e.preventDefault();
						if(x < max_fields){ //max input box allowed
							x++; //text box increment
							$(wrapper).append('<div><div class="col-xs-4"><input type="text" class="form-control" name="text_array[]" id="textbox" placeholder="Episode download link".col-xs-5/></div><div class="col-xs-4"><input type="text" class="form-control" name="quality[]" id="textbox" value="TVrip".col-xs-5/></div><div class="col-xs-4"><input type="text" class="form-control" name="SOO[]" id="textbox" placeholder="Add Episode Name"  value='+x+' /><input type="number" class="form-control" name="TVID[]" id="textbox" value="<?php echo $TVID; ?>" style="display:none;" .col-xs-5 /></div>&nbsp;<a href="#" class="remove_field">Remove</a></div>'); //add input box
						}
					});
					
					$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
						e.preventDefault(); $(this).parent('div').remove(); x--;
					})
					
				});
				</script>

                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered" style="margin-top:10px;">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">add Episodes in - <?php echo $json['name']; ?></span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                  
								  <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i><?php echo $json['name']; ?> - All Seasons</div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="tabbable-custom nav-justified">
                                        <ul class="nav nav-tabs nav-justified">
										<?php for($i=1;$i<=$json['number_of_seasons'];$i++){?>
                                            <li class="<?php if($i == $json['number_of_seasons'] ){echo 'active';}?>">
                                                <a href="#tab_1_1_<?php echo $i; ?>" data-toggle="tab" aria-expanded="true"> <?php echo 'Season: '.$i; ?> </a>
                                            </li>
										<?php } ?>
                                        </ul>
										<form action="action/addepisodes.php" method="post">
						
										<div class="form-group">
                       <select class="form-control" name="sessionid">
					   <?php for($i=1;$i<=$json['number_of_seasons'];$i++){?>				
					  <option value="<?php echo $i; ?>">Season <?php echo $i; ?></option> 
					  <?php } ?>
					  </select>
                </div>
						
                                        <div class="tab-content">
										<?php for($i=1;$i<=$json['number_of_seasons'];$i++){?>

				<div class="tab-pane <?php if($i == $json['number_of_seasons'] ){echo 'active';}?>" id="tab_1_1_<?php echo $i; ?>">
                          <br>            
                <div class="input_fields_wrap">
					<button class="add_field_button btn btn-default">Add More Episodes</button><br><br>
					<div class="form-group">
                      
					   <div class="col-xs-4">
					            <input type="text" class="form-control" name="text_array[]" id="textbox" placeholder="Episode download link".col-xs-5/>
					   </div>
					   <div class="col-xs-4">
					            <input type="text" class="form-control" name="quality[]" id="textbox" value="TVrip".col-xs-5/>
					   </div>
					   <div class="col-xs-4">
					           <input type="number" class="form-control" name="SOO[]" id="textbox" value="1".col-xs-5 />
					           <input type="number" class="form-control" name="TVID[]" id="textbox" value="<?php echo $TVID; ?>" style="display:none;" .col-xs-5 />
					           
					   </div><p>&nbsp;</p>
					</div>
				</div>
                                            </div>
                                        <?php } ?>
										
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

                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

			
					   			
					<!-- /.modal-dialog -->
		  </div>
			
       
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
});
		</script>
    </body>

</html>