
		
$(document).ready(function() {

	$.post('../../Admin/main/action/action.php', { url: "http://api.themoviedb.org/3/movie/<?php echo $imdbid; ?>?append_to_response=credits,images&api_key=<?php echo API_KEY ;?>" }, function(data) {
	
	var id = data.id;
    var youtube = data.youtube;
    var castname = data.castname;
    var castprofile = data.castprofile;
    var finalCastcharacter = data.finalCastcharacter;
	var crewname = data.crewname;
    var crewprofile = data.crewprofile;
    var finalCrewdepartment = data.finalCrewdepartment;
    var images = data.images;
	

	/* 	var youtubesplit = youtube.split(',');
		for (i = 0; i < youtubesplit.length; i++){ 
    $('#youtubetrailers').after('<iframe width="315" height="215" src="https://www.youtube.com/embed/'+youtubesplit[i]+'?list=PLJtGgr2nbdeP1NwONuv99vxujk8LZhdVW" frameborder="0" style="margin:10px;" allowfullscreen></iframe>');
    }
	
	var crewprofilesplit = crewprofile.split(',');
	var crewnamesplit = crewname.split(',');
	var finalCrewdepartmentsplit = finalCrewdepartment.split(',');
		for (i = 0; i < crewprofilesplit.length; i++){ 
    $('#MoviesCrew').after('<div class="col-md-2"><div class="thumbnail"><img src="http://image.tmdb.org/t/p/w500/'+crewprofilesplit[i]+'" alt="100%x200" style="width: 100%; height: 200px; display: block;" /><div class="caption"><h3 style="font-size:15px;margin:px 0px -3px 0px;">'+crewnamesplit[i].substr(0,16)+'</h3><p style="font-size:12px;color:#9b9b9b;margin:-6px 0px 0px 0px;">'+finalCrewdepartmentsplit[i]+'</p></div></div></div>');
    } */
	
	var castprofilesplit = castprofile.split(',');
	var castnamesplit = castname.split(',');
	var finalCastcharactersplit = finalCastcharacter.split(',');
		for (i = 0; i < castprofilesplit.length; i++){ 
    $('#MovieCast').after('<div class="col-md-2"><div class="thumbnail"><img src="http://image.tmdb.org/t/p/w500/'+castprofilesplit[i]+'" alt="100%x200" style="width: 100%; height: 200px; display: block;" /><div class="caption"><h3 style="font-size:15px;margin:px 0px -3px 0px;">'+castnamesplit[i].substr(0,16)+'</h3><p style="font-size:12px;color:#9b9b9b;margin:-6px 0px 0px 0px;">'+finalCastcharactersplit[i]+'</p></div></div></div>');
    }
	
// MoviesScreenShots
var imagessplit = images.split(',');
if(imagessplit.length > 12){
	var lengt = 12;
}else{
	var lengt = imagessplit.length;
}
		for (i = 0; i < lengt; i++) { 
    $('#MoviesScreenShots').after('<div class="col-md-3"><a href="#" class="thumbnail"><img src="http://image.tmdb.org/t/p/w500/'+imagessplit[i]+'" alt="100%x180" style="height: 180px; width: 100%; display: block;" > </a></div>');
}

  $('#loading').hide(1000);  
  $('#MovieID').css('background-color','#fff');
  $('#removeSolve').hide(100);
});

});
		
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});
			