		<div class="cell-3 fx shop-item" data-animate="fadeInUp" style="margin-bottom:20px;padding-right: 0px;">
						    			<div class="team-box" style="background-color:#333;">
				    					<div class="team-img" style="margin-right:5px;margin-left:5px;">
				    						<img alt="" style="height:288px;" src="../../Admin/main/images/<?php  echo $item['MovieID'].'/poster/'.$item['poster']; ?>">
				    					    <span class="yellowbox"><?php echo $item['MovieYear']; ?></span>
											<span class="imdb-rating"><b><b class="fa fa-star"></b></b> <?php if($item['MovieRatings'] != 0){echo $item['MovieRatings'];}else{ echo 'N/A'; } ?></span>
										</div>
										
										<a href="single-movie.php?imdbid=<?php echo $item['MovieID']; ?>">
				    					<div class="team-details"  href="single-movie.php?imdbid=<?php echo $item['MovieID']; ?>" style="height:288px;background-color:rgba(0, 0, 0, 0.5);margin-left:0px;width:97.5%;">
			                               
											<p style="height: 100px !important; margin: -4px 0px 0px 0px;">
											<?php  echo $item['MovieTitle'].' ['.$item['MovieYear'].']'; ?>
											</p>
											
											<?php $oneTrailer = explode(",",$item['MovieTrailer']); ?>
											<a href="single-movie.php?imdbid=<?php echo $item['MovieID']; ?>" class="play-hover" ><i class="fa fa-play-circle play-btn"></i></a>
											<br>
											<p style="background: radial-gradient(#1E8CAB, #09009a); width:40%; float:right;margin-left:5px;font-size:13px;"><i class="fa fa-eye"></i> <?php echo $item['views']; ?></p>
											
											<p style="background:radial-gradient(#EA0A5D, #5A0000);font-size:13px;"><?php echo $item['MovieQuality']; ?></p>
											<p style="background: radial-gradient(#5bf77d, #1f730a);font-size:13px;width:60%;float:left;"><span style="color:#000;font-family:impact;"></span><span style="font-family:tahoma;font-weight:bold;color:#333;margin-bottom:10%;"><?php echo ucfirst($item['MovieCategory']); ?></span></p>
											<p style="background: radial-gradient(#b0e2ff, #337ab7);font-size:13px;width:37%;float:right;"><span style="color:#000;font-family:impact;"></span><span style="font-family:tahoma;font-weight:bold;color:#333;margin-bottom:10%;"><?php if(strpos($item['MovieSize'], 'GB') !== false){ echo $item['MovieSize'];}else{echo floor($item['MovieSize']).' MB';} ?></span></p>
											
				    					    
											<ul class="gallery clearfix">
											<a href="http://www.youtube.com/watch?v=<?php echo $oneTrailer[0]; ?>" rel="prettyPhoto" style="margin: 2.5% 0 5% 30%;width: 40%;"  title="<?php echo $item['MovieTitle']; ?>">
											<img src="<?php echo URL.'/themes/'.THEME;?>/trailer.png" style="margin-left: -48px;margin-top:0px;margin-bottom: 10px;" />
											</a>
											</ul>
											
										</div>
										</a>
				    			</div>
						    		</div>