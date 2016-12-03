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
        <title>Fileserver | Manual Add Movie</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="Manual Add Movie From tmdb" />
        <meta content="" name="webacademybd" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
		 <link href="../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
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
        <link rel="shortcut icon" href="favicon.ico" /> 
		 <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
		
		</head>
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
                   
           
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title" id="pagetitle"> Manual Add Movie
                        <small id="test"><?php 
              if(isset($_SESSION["infoError"]) != ''){  
                foreach($_SESSION["infoError"] as $message) {
                  echo "<li>".$message."</li>";
                }
                unset($_SESSION["infoError"]);
              }
               ?></small>
						
                    </h3>
					
					
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
					
                    <div class="row">
                        <div class="col-md-3">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-purple-soft"></i>
                                        <span class="caption-subject font-purple-soft bold uppercase">Poster</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_1_1" data-toggle="tab"> <i class="fa fa-plus"></i> Poster </a>
                                        </li>
                                        <li>
                                            <a href="#tab_1_2" data-toggle="tab"> <i class="fa fa-chain"></i> URL </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab_1_1">
                                            <p>
											<style>
											#tab_1_1 > form > div.form-group > div.fileinput.fileinput-new > div.fileinput-preview.fileinput-exists.thumbnail > img{
												max-height:445px;
											}
											</style>
	
	<script>

function validateForm(){
	
	var MovieTitle = document.forms["myForm"]["MovieTitle"].value,
		MovieYear  = document.forms["myForm"]["MovieYear"].value,
		poster     = document.getElementById('poster').value,
		//extension  = poster.split('.').pop().toUpperCase(),
		MovieQuality = document.forms["myForm"]["MovieQuality"].value,
		MovieGenre = document.forms["myForm"]["MovieGenre"].value,
		MovieCategory = document.forms["myForm"]["MovieCategory"].value,
		MovieStory = document.forms["myForm"]["MovieStory"].value,
		MovieWatchLink = document.forms["myForm"]["MovieWatchLink"].value,
		MovieRatings = document.forms["myForm"]["MovieRatings"].value,
		hilightCss = {"border-bottom-color":"red", // for change css
					 "background-color":"#f9e5e5"};
			
		//var inputVal = new Array(MovieTitle,MovieYear,MovieQuality,,MovieGenre,MovieCategory,MovieStory,MovieWatchLink,MovieRatings);
			
/* 		var x = document.forms["myForm"]["MovieTitle"].value,
		    hilightCss = {"border-bottom-color":"red", 
                          "background-color":"#f9e5e5;"};
		 */
		 
		if (MovieTitle == null || MovieTitle == ""){
			$('#MovieTitle').after('<span style="color:red;font-size:12px;"> Please enter Movie Title</span>');
			$('#MovieID').after('<span style="color:red;font-size:12px;"> or enter Movie IMDB ID/TMDB ID</span>');
			$("#MovieTitle").css(hilightCss);
			
		}
		if (MovieYear == null || MovieYear == ""){
			$('#MovieYear').after('<span style="color:red;font-size:12px;"> Please enter Movie Year</span>');
			$("#MovieYear").css(hilightCss);
		}
	   if(MovieQuality == 0 || MovieQuality == ""){
		   $('#MovieQuality').after('<span style="color:red;font-size:12px;">Please Select Movie Quality</span>');
		   $("#MovieQuality").css(hilightCss);
	   }
	   if(MovieGenre == null || MovieGenre == ""){
		   $('#MovieGenre').after('<span style="color:red;font-size:16px;"> Please Choose one Movie Genre</span>');
		   $("#MovieGenre").css(hilightCss);
	   }
	   if(MovieCategory == 0 || MovieCategory == ""){
		   $('#MovieCategory').after('<span style="color:red;font-size:12px;">Please Select Movie Category</span>');
		   $("#MovieCategory").css(hilightCss);
	   }
	   if(MovieStory == null || MovieStory == ""){
		   $('#MovieStory').after('<span style="color:red;font-size:12px;">Please Write Movie Story</span>');
		   $("#MovieStory").css(hilightCss);
	   }
	   if(MovieWatchLink == null || MovieWatchLink == ""){
		   $('#MovieWatchLink').after('<span style="color:red;font-size:12px;">Please Enter Download Link / Watch Link</span>');
		   $("#MovieWatchLink").css(hilightCss);
	   }
	    if(MovieRatings == null || MovieRatings == ""){
		   $('#MovieRatings').after('<span style="color:red;font-size:12px;">Please IMDB rating</span>');
		   $("#MovieRatings").css(hilightCss);
	   }
	   if (poster == null || poster == ""){
			$('#posterError').after('<span style="color:red;font-size:16px;"> Please Upload Movie poster</span>');
		}/* else if (extension!="PNG" && extension!="JPG" && extension!="GIF" && extension!="JPEG"){
           $('#posterError').after('<span style="color:red;font-size:16px;"> Please Upload Image Extension : JPG , GIF , JPEG , PNG</span>');
		  return false;
       } */
	   if((MovieTitle == null || MovieTitle == '') || (MovieYear == null || MovieYear == '') || (MovieQuality == 0 || MovieQuality == "") || (MovieGenre == null || MovieGenre == "") || (MovieCategory == 0 || MovieCategory == "") || (MovieStory == null || MovieStory == "") || (MovieWatchLink == null || MovieWatchLink == "") || (MovieRatings == null || MovieRatings == "") || (poster == null || poster == "")){
		   document.getElementById('allError').innerHTML = '<span style="color:red;font-size:12px;">Please fill all the required* field</span>';
		  return false;
	   }
	    
	    
		
      /*   $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'action/action.php',
            data: $('form').serialize(),
            success: function (result) {
              document.getElementById('test').innerHTML = result
            }
          });

        });

     

	   //AJAX code to submit form.
	return false; */		
	}
											</script>
<!-- ///// form start from here /// -->		
		 <form  action="action/addmovies.php" role="form" method="post" name="myForm" id="myForm" onsubmit="return validateForm()" enctype="multipart/form-data" >
			<div class="form-group">
			<div class="fileinput fileinput-new" data-provides="fileinput">
			<div class="fileinput-new thumbnail">
			<img src="http://www.placehold.it/300x445/EFEFEF/AAAAAA&amp;text=no+image" alt="" id="poster" /> 
			<div class="modal" id="loading" style="display:none;"><!-- Place at bottom of page --></div>
			</div>
																		
	<style>
	.modal {
    display: block;
    position: relative;
    z-index: 1000;
    margin-top: -457px;
    top: -41px;
    height: 447px;
    width: 100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('http://i.stack.imgur.com/FhHRx.gif') 
                50% 50% 
                no-repeat;
}
.loading{
	display:block;
}
div#loading.modal{
	height:498px;
	margin-bottom: -44px;
}
</style>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width:360px; max-height:535px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Select image </span>
                                                                            <span class="fileinput-exists"> Change </span>
<!-- this is Poster Image -->                                               <input type="file" id="poster" name="poster" /> 
                                                                        </span>
                                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix margin-top-10">
                                                                    <span class="label label-danger">NOTE! </span>
                                                                    <span id="posterError"> &nbsp;&nbsp;poster will resize automaticly if it's too big size</span>
                                                                </div>
                                                            </div>
											</p>
                                        </div>
                                        <div class="tab-pane fade" id="tab_1_2">
                                            <p>
											<div class="form-group">
											<label class="control-label" for="posterUrl" >Enter url (optional)</label>
<!-- this is Poster link -->				<input type="url" name="posterUrl" class="form-control" placeholder="Enter url" />
											</div>
											</p>
                                        </div>
                                    </div>
                                    <div class="clearfix margin-bottom-20"> </div>
                                    <ul class="nav nav-tabs tabs-reversed">
                                        <li class="active">
                                            <a href="#tab_reversed_1_1" data-toggle="tab"> Screenshots </a>
                                        </li>
                                        <li>
                                            <a href="#tab_reversed_1_2" data-toggle="tab"> URL </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab_reversed_1_1">
										<script type="text/javascript">
										 $(document).ready(function(){
											$('[data-toggle="tooltip"]').tooltip({
											animated: 'fade',
											placement: 'top',
											
											});
										}); 
										</script>
                                            <p>  
											<span id="result"></span>
											<div class="form-group">
											<label for="files" class="control-label">Select multiple images</label>
<!-- this is scrennshots multiple image -->	<input type="file" id="files" class="form-control" name="screenshots" placeholder="Enter url" multiple />
											</div>
											</p>
                                        </div>
										
                                        <div class="tab-pane fade" id="tab_reversed_1_2">
                                            <p> 
                                        <div class="form-group">
											<label class="control-label">Enter url by seperate comma (optional)</label>
<!-- this is scrennshots multiple links --> <textarea placeholder="http://image.com , http://image2.com , http://image3.com" class="form-control" rows="10"></textarea>
										</div>
											</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
 
                        </div>
                        <div class="col-md-9">
                            <!-- BEGIN TAB PORTLET-->
							
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption col-md-6">
                                        <i class="fa fa-download font-red"></i>
                                        <span class="caption-subject font-red bold uppercase">Publish a Movie</span><br><br>
										<a href="javascript:;" class="btn btn-warning" id="IMDB"><i class="fa fa-info"></i>
										Get info from IMDB                            
                                        </a>
										<a href="#" id="getgoole" class="btn btn-icon-only blue" data-toggle="tooltip" title="Search directly in google if can not get right info you need" target="_blank" >
                                        <i class="fa fa-link"></i>
                                        </a>
										<br><br>
										<a href="javascript:;" class="btn red"><i class="fa fa-info"></i>
										Get info from TMDB                          
                                        </a>
                                    </div>
									 <div class="col-md-3">
                                       <div class="form-group">
											<label for="MovieTitle" class="control-label">Enter Movie Title</label>
<!-- this is Movie Title -->				<input type="text" id="MovieTitle" name="MovieTitle" class="form-control" placeholder="Movie Title"/>
                                            
									   </div>
									</div>
									<div class="col-md-3">
                                       <div class="form-group">
											<label for="MovieYear" class="control-label">Enter Movie Year</label>
<!-- this is Movie Year -->				    <input type="number" id="MovieYear" name="MovieYear" class="form-control" placeholder="Year"/>
										</div>
									</div>
									<div class="col-md-6">
									
											<div class="form-group">
											<label for="MovieID" class="control-label">Enter IMDB ID / TMDB ID</label>
											<input type="text" id="MovieID" name="MovieID" class="form-control" placeholder="tt4383594 , 770672122"/>
											</div>
                                    </div>
                                        </div>
										
										
										
                                </div>

                                <div class="portlet-body">
                                    <p id="allError">Full Movie Information</p>
                                    <div class="tabbable tabbable-tabdrop">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab1" data-toggle="tab"><i class="fa fa-info"></i> information</a>
                                            </li>
                                            <li>
                                                <a href="#tab2" data-toggle="tab"><i class="fa fa-book"></i> Stroy</a>
                                            </li>
                                            <li>
                                                <a href="#tab3" data-toggle="tab"><i class="fa fa-play"></i> Watch Online</a>
                                            </li>
											<li>
                                                <a href="#tab4" data-toggle="tab"><i class="fa fa-youtube-play"></i> Youtube Trailer</a>
                                            </li>
											<li>
                                                <a href="#tab5" data-toggle="tab"><i class="fa fa-file-image-o"></i> Screenshots</a>
                                            </li>
											<li>
                                                <a href="#tab6" data-toggle="tab"><i class="fa fa-users"></i> Cast</a>
                                            </li>
											<li>
                                                <a href="#tab7" data-toggle="tab"><i class="fa fa-user"></i> Crew</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab1">
                                                <p> 
												<!-- ========== Movie Information --============-->
							<div class="col-md-12">				
                                    <div class="col-md-3">
                                       <div class="form-group">
											<label for="MovieQuality" class="control-label">Select Movie Quality</label>
<!-- this is Select Movie Quality -->		<select class="form-control" id="MovieQuality" name="MovieQuality" style="border:1px solid red;">
											<option value="0">Select Quality</option>
											<?php menuRead('quality');?>             
										  </select>
									   </div>
									</div>
									<div class="col-md-9">
									<div class="form-group">
									  <label for="MovieTrailer" class="control-label">Youtube Trailer.</label>
<!-- this is Youtube Trailer -->	 <input type="text" id="MovieTrailer" name="MovieTrailer" class="form-control" placeholder="Enter Youtube Trailer"/>
									</div>
                                    </div> 
                            </div>									
							<div class="col-md-12">
									<div class="col-md-3">
                                       <div class="form-group">
										<label for="MovieCategory" class="control-label">Select Category</label>
<!-- this is Movie Category -->		<select class="form-control" id="MovieCategory" name="MovieCategory" style="border:1px solid red;">
                                              <option value="0">Select Catagory</option>
											  <?php menuRead('movies') ?>
                                        </select>
										</div>
									</div>
									<div class="col-md-3">
                                       <div class="form-group">
										<label for="MovieRatings" class="control-label">IMDB Ratings</label>
<!-- this is IMDB Ratings -->		<input type="text" id="MovieRatings" name="MovieRatings" class="form-control" placeholder="IMDB Ratings" />
									   </div>
									</div>
									
<!-- this is Movie Genre -->		<div class="col-md-6">
                                            <label for="MovieGenre" class="control-label">Movie Genre</label>
                                            <!--<select id="select2-multiple-input-lg" class="form-control input-lg select2-multiple" name="MovieGenre" multiple>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA" selected>Action</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                            </select> -->
											<input type="text" id="MovieGenre" name="MovieGenre" class="form-control" placeholder="Movie Genre" />
                                     </div>
							</div>
							<div class="col-md-12">
									<div class="col-md-3">
                                       <div class="form-group">
										<label for="MovieDate" class="control-label">Movie Release Date</label>
<!-- this is Movie Release Date -->		<input type="text" id="MovieDate" name="MovieDate" class="form-control" value="<?php echo date('d-M-Y'); ?>" />
									   </div>
									</div>
									<div class="col-md-3">
                                       <div class="form-group">
										<label for="Movielang" class="control-label">Movie Language</label>
<!-- this is Movie language -->		    <input type="text" id="Movielang" name="Movielang" class="form-control"  placeholder="Enter Movie Language" />
									   </div>
									</div>
									<div class="col-md-3">
                                       <div class="form-group">
										<label for="Moviehomepage" class="control-label">Movie Homepage(website)</label>
<!-- this is Movie homepage -->		    <input type="text" id="Moviehomepage" name="Moviehomepage" class="form-control"  placeholder="Enter Movie Homepage" />
									   </div>
									</div>
									<div class="col-md-3">
                                       <div class="form-group">
										<label for="MovieRuntime" class="control-label">Movie Runtime</label>
<!-- this is Movie Runtime -->		    <input type="text" id="MovieRuntime" name="MovieRuntime" class="form-control"  placeholder="Enter Movie Runtime" />
									   </div>
									</div>
							</div>
									</p>
									
									<!-- ==========/////// Movie Information END ///// --============-->
                                            </div>
                                            <div class="tab-pane" id="tab2">
									<!-- ========== Movie Story Start --============-->		
                                                <p>
									<div class="col-md-12">
                                       <div class="form-group form-md-line-input">
										<label for="MovieKeywords" class="control-label">Movie Meta Keywords</label>
<!-- this is Movie Meta Keyword -->		<input type="text" id="MovieKeywords" name="MovieKeywords" class="form-control"  placeholder="Enter Movie Keywords" />
									   </div>
									</div>
									<div class="col-md-12">
									<div class="form-group last">
                                                <label class="control-label col-md-2">Full Movie Story
<!-- this is Movie Stroy -->             <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="MovieStory" rows="10" id="MovieStory"></textarea>
                                                    <br>
                                                </div>
                                     </div>
								     </div>	
												</p>
									<!-- ==========/////// Movie Story END ///// --============-->
                                            </div>
                                            <div class="tab-pane" id="tab3">
											<!-- ========== Movie Watch Online --============-->
                                                <p>
									<div class="col-md-12">
                                       <div class="form-group form-md-line-input">
										<label for="MovieWatchLink" class="control-label">Enter Movie Link</label>
<!-- this is Movie Watch Link -->		<input type="url" id="MovieWatchLink" name="MovieWatchLink" class="form-control"  placeholder="Enter Movie Link" />
									   </div>
									</div>
									<div class="col-md-12">
                                       <div class="form-group form-md-line-input">
										<label for="MovieSubtitle" class="control-label">Enter Movie Subtitle Link</label>
<!-- this is Movie Subtitle Link -->		<input type="url" id="MovieSubtitle" name="MovieSubtitle" class="form-control"  placeholder="Enter Movie Subtitle"/>
									   </div>
									</div>
												</p>
											<!-- ==========/////// Movie Watch Online END ///// --============-->
                                            </div>
											 <div class="tab-pane" id="tab4">
											 <div id="youtubetrailers">
											 
											 </div>
											 </div>
											 <div class="tab-pane" id="tab5">
											 <div id="MoviesScreenShots">
											 <input type="text" name="Moviesbackdrops" id="Moviesbackdrops" hidden />
											 </div>
											 </div>
											 <div class="tab-pane" id="tab6">
											 <div id="MoviesCasts">
											 
											 </div>
											 </div>
											 <div class="tab-pane" id="tab7">
											 <div id="MoviesCrew">
											 
											 </div>
											 </div>
                                        </div>
                                    </div>
                           
							<div class="col-md-12">
                                       
<!-- this is SUBMIT -->		<input type="submit" name="MovieSubmit" id="MovieSubmit" class="btn purple btn-block" value="SUBMIT" />
									   
							</div>
							<!-- /// Form END /// --></form>
							
<script>
$('#MovieSubmit').click(function() {  
	function test(){
		alert('test');
     doucment,getElementById('#test').innerHTML = 'test';	
	 return false;
	}
	});

$(document).ready(function() {
	
	
$('#IMDB').click(function() {  
var MovieID = $('#MovieID').val();
if(MovieID == null || MovieID == ""){
        $('#MovieID').after('<span style="font-size:12px;" id="removeSolve">Please Enter Movie Title/IMDB ID first</span>');
		$('#MovieID').css('background-color','#fbb8b8');
 return false;
}else{
	$.post('action/action.php', { url: "http://api.themoviedb.org/3/movie/"+MovieID
+"?append_to_response=credits,images&api_key=f7d5dae12ee54dc9f51ccac094671b00" }, function(data) {
	
	var id = data.id;
    var title = data.title;
    var MovieYear = data.MovieYear;
    var poster = data.poster;
    var overview = data.overview;
    var release_date = data.release_date;
    var vote_average = data.vote_average;
    var runtime = data.runtime;
    var genres = data.genres;
    var youtube = data.youtube;
    var castname = data.castname;
    var castprofile = data.castprofile;
    var finalCastcharacter = data.finalCastcharacter;
	var crewname = data.crewname;
    var crewprofile = data.crewprofile;
    var finalCrewdepartment = data.finalCrewdepartment;
    var homepage = data.homepage;
    var keywords = data.keywords;
    var spokenLanguages = data.spokenLanguages;
    var images = data.images;
   
	    
	document.getElementById('MovieTitle').value = title;
	document.getElementById('MovieYear').value = MovieYear;
	document.getElementById("poster").src = poster;	
	document.getElementById("poster").value = poster;	
	document.getElementById("MovieStory").value = overview;	
	document.getElementById("MovieDate").value = release_date;
	document.getElementById("MovieRatings").value = vote_average;
	document.getElementById("MovieRuntime").value = runtime;
	document.getElementById("MovieGenre").value = genres;
	document.getElementById("MovieTrailer").value = youtube;
	document.getElementById("MovieKeywords").value = keywords;
	document.getElementById("Moviehomepage").value = homepage;
	document.getElementById("Movielang").value = spokenLanguages;
	document.getElementById("Moviesbackdrops").value = images;
		
		
	
		var youtubesplit = youtube.split(',');
		for (i = 0; i < youtubesplit.length; i++){ 
    $('#youtubetrailers').after('<iframe width="315" height="215" src="https://www.youtube.com/embed/'+youtubesplit[i]+'?list=PLJtGgr2nbdeP1NwONuv99vxujk8LZhdVW" frameborder="0" style="margin:10px;" allowfullscreen></iframe>');
    }
	
	var crewprofilesplit = crewprofile.split(',');
	var crewnamesplit = crewname.split(',');
	var finalCrewdepartmentsplit = finalCrewdepartment.split(',');
		for (i = 0; i < crewprofilesplit.length; i++){ 
    $('#MoviesCrew').after('<div class="col-md-2"><div class="thumbnail"><img src="http://image.tmdb.org/t/p/w500/'+crewprofilesplit[i]+'" alt="100%x200" style="width: 100%; height: 200px; display: block;" /><div class="caption"><h3 style="font-size:15px;margin:px 0px -3px 0px;">'+crewnamesplit[i].substr(0,16)+'</h3><p style="font-size:12px;color:#9b9b9b;margin:-6px 0px 0px 0px;">'+finalCrewdepartmentsplit[i]+'</p></div></div></div>');
    }
	
	var castprofilesplit = castprofile.split(',');
	var castnamesplit = castname.split(',');
	var finalCastcharactersplit = finalCastcharacter.split(',');
		for (i = 0; i < castprofilesplit.length; i++){ 
    $('#MoviesCasts').after('<div class="col-md-2"><div class="thumbnail"><img src="http://image.tmdb.org/t/p/w500/'+castprofilesplit[i]+'" alt="100%x200" style="width: 100%; height: 200px; display: block;" /><div class="caption"><h3 style="font-size:15px;margin:px 0px -3px 0px;">'+castnamesplit[i].substr(0,16)+'</h3><p style="font-size:12px;color:#9b9b9b;margin:-6px 0px 0px 0px;">'+finalCastcharactersplit[i]+'</p></div></div></div>');
    }
	
// MoviesScreenShots
var imagessplit = images.split(',');
if(imagessplit.length > 12){
	var lengt = 12;
}else{
	var lengt = imagessplit.length;
}
for (i = 0; i < lengt; i++){ 
    $('#MoviesScreenShots').after('<div class="col-md-3"><a href="#" class="thumbnail"><img src="http://image.tmdb.org/t/p/w500/'+imagessplit[i]+'" alt="100%x180" style="height: 180px; width: 100%; display: block;" > </a></div>');
}

  $('#loading').hide(1000);  
  $('#MovieID').css('background-color','#fff');
  $('#removeSolve').hide(100);
});
}
  });
});

$(document).ready(function(){
    $('#IMDB').click(function() {
       $('#loading').show();
    });
});


$(document).ready(function() {
  $('#getgoole').click(function() {
    var MovieTitle = $('#MovieTitle').val();
	if(MovieTitle==null || MovieTitle == ""){
		$('#MovieTitle').after('<span style="font-size:12px;">Please Enter Movie Title/IMDB ID first</span>');
		$('#MovieTitle').css('background-color','#fbb8b8');
		return false;
	}else{
	$("#getgoole").attr("href", "https://www.google.com/search?q="+MovieTitle+"site:imdb.com");
	}
  });
});
</script>
                                </div>
                            </div>
							
                            <!-- END TAB PORTLET-->
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
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
		
		<script>
		
		
	
	window.onload = function(){
    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
        var filesInput = document.getElementById('files');
        filesInput.addEventListener("change", function(event){
            var files = event.target.files; //FileList object
            var output = document.getElementById('result');
            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];
                //Only pics
                if(!file.type.match('image'))
                    continue;
                var picReader = new FileReader();
                picReader.addEventListener("load",function(event){
                    var picFile = event.target;
                    var div = document.createElement('div');
                    div.innerHTML = "<img style='width:50px;height:50px;margin:5px;float:left;'  src='" + picFile.result + "' />";
                    output.insertBefore(div,null);
                });
                //Read the image
                picReader.readAsDataURL(file);
            }
        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
}
										
										</script>
        <script src="../assets/pages/scripts/profile.js" type="text/javascript"></script>
		 <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
		<script src="../assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
		<
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>