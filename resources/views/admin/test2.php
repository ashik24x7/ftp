<?php 

/* $inp = file_get_contents('test3.json');
$tempArray = json_decode($inp,true);
var_dump($tempArray['Sausage Party']);
$search = array_search('Sausage Party',$tempArray);
var_dump($search); */
 /* $genres = $json['genres'];
			   foreach($genres as $allgenres=>$keygenres){
				   foreach($keygenres as $genresname=>$keynames){
					   if($genresname == 'name'){
						@ $finalgenres .=  $keynames.',';
					   }
				   }
			   }
          echo trim($finalgenres,","); */
		  
		  /* $fp2 = file_get_contents("http://api.themoviedb.org/3/movie/".$imdb."/videos?api_key=f7d5dae12ee54dc9f51ccac094671b00");
				$json2 = json_decode($fp2, true);
				$finaltrailers = '';
				$trailer = $json2['results'];
				
				foreach($trailer as $trailers=>$keytrailers){
					   foreach($keytrailers as $alltrailers=>$allkeytrailers){
						   if($alltrailers == 'key'){
							   if($finaltrailers == ''){
					            $finaltrailers = 'We can\'t fetch any youtube trailer information';
								}else{
									@ $finaltrailers .=  $allkeytrailers.',';
								}
						   
						   }
					   }
				   } */
		  
		  
		  
             
                $fp = file_get_contents("http://api.themoviedb.org/3/movie/tt2975590?append_to_response=credits,images&api_key=f7d5dae12ee54dc9f51ccac094671b00");
				$json = json_decode($fp, true);
				$Cast = $json['credits']['cast'];
				
			   
				 foreach($Cast as $allCast=>$keyCast){
					 if($keyCast['profile_path'] != ''){
					 @$finalCastname .= $keyCast['name'];
					 @$finalCastProfile .= $keyCast['profile_path'];
					 }
			       }

				   
				   echo $finalCastname;
				   
				?>   
				   
				                      <div class="col-md-3">
                                            <div class="thumbnail">
                                                <img src="#" alt="100%x200" style="width: 100%; height: 200px; display: block;"  />
                                                <div class="caption">
                                                    <h3>Thumbnail label</h3>
                                                </div>
                                            </div>
                                        </div>
				   
				   
				   
				   