<?php include('../../Admin/main/core/init.php'); ?>
<div id="searchresults">
<div class="category" style="padding-bottom:10px;"> MOVIES </div>
 <?php      $sql = "SELECT  `MovieTitle`,`MovieQuality`,`MovieCategory`,`MovieID`,`MovieYear`,`poster` 
			FROM  `allmovies` 
			WHERE  `published` =  '0'
			AND  `MovieTitle` LIKE  '%$_POST[queryString]%'
			LIMIT 0 , 5";
        $query = mysqli_query($connect_baza,$sql);
		while($item = mysqli_fetch_array($query)){
			
		
?>

  <a href="single-movie.php?imdbid=<?php echo $item['MovieID']; ?>">
  <img src="http://image.tmdb.org/t/p/w500/<?php  echo $item['poster']; ?>" alt="" style="width:10.5%;"/>
  <div class="searchheading" style="margin-top:-10px;font-size:12px;"><?php  echo $item['MovieTitle'].'&nbsp; ['.$item['MovieYear'].']'; ?></div>
  <div class="details" style="color:#3D3D3D;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:10px;">Category : <?php  echo $item['MovieCategory']; ?> <br> Quality: <?php  echo $item['MovieQuality']; ?></div>
  </a>


		<?php } ?>
		
		
		
		
		
<div class="category" style="padding-bottom:10px;">GAMES</div>
 <?php      $sql = "SELECT  *
			FROM  `games` 
			WHERE  `published` =  '0'
			AND  `title` LIKE  '%$_POST[queryString]%'
			LIMIT 0 , 2";
        $query = mysqli_query($connect_baza,$sql);
		while($item = mysqli_fetch_array($query)){
			
		
?>

  <a href="about-games.php?t=<?php echo str_replace(" ","-",$item['title']); ?>">
  <img src="<?php  echo URL.''.$item['cover_pic']; ?>" alt="" style="width:20%;margin-top:8px;">
  <div class="searchheading" style="margin-top:-10px;font-size:12px;"><?php  echo $item['title']; ?></div>
  <div class="details" style="color:#3D3D3D;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:10px;">Category : <?php  echo $item['con_cat']; ?> <br> filesize: <?php  echo $item['filesize']; ?></div>
  </a>


		<?php } ?>
  
  <br class="break">

</div>
