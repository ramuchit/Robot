<?php
//only four argument to be passed except index.php
if(count($argv) == 5):
	
	 $x=$argv[1];
	 $y=$argv[2];
	 $d=$argv[3];
	 $walk=strtoupper($argv[4]); 
// Differentiate cahracter and numeric
	 $pattern = "/(\d+)/";
	 $walk_array = preg_split($pattern, $walk, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
	 $v=array();
	 if(strtolower($walk_array[0])=='w'){
	 	$v[]['w']=$walk_array[1];
	 }
	 for($i=0;$i<count($walk_array);$i++){
     	  if(!is_numeric($walk_array[$i])){
     	  	$rl=str_split($walk_array[$i]);
     	  	for($k=0;$k<count($rl);$k++){
		     	   if(isset($rl[$k+1]) && strtolower($rl[$k+1])=='w'){
		                 $v[][$rl[$k]]=isset($walk_array[$i+1])?$walk_array[$i+1]:1;
		             }else{
		     	  		$v[][$rl[$k]]=0;
		     	  	}
		     	  }
		     	}
		     }
	 $right=$left=$direction='';
	 //loop for direction and distance calculation
	 foreach($v as $val){
	 	if(isset($val['R']) ){
	 		switch(strtolower($d)){
	 			case 'south': $d='west';$x=$val['R']?$x-$val['R']:$x; break;
	 			case 'west': $d='north';$x=$val['R']?$x+$val['R']:$x; break;
	 			case 'north': $d='east';$x=$val['R']?$x+$val['R']:$x; break;
	 			case 'east': $d='south'; $x=$val['R']?$x-$val['R']:$x; break;
	 			default: $d='No direction Available ';break;
	 		}
	 		

	 	}
	 	if(isset($val['L']) ){
	 		switch(strtolower($d)){
	 			case 'south': $d='east';$y=$val['L']?$y+$val['L']:$y; break;
	 			case 'east': $d='north';$y=$val['L']?$y+$val['L']:$y; break;
	 			case 'north': $d='west';$y=$val['L']?$y-$val['L']:$y; break;
	 			case 'west': $d='south';$y=$val['L']?$y-$val['L']:$y; break;
	 			default: $d='No direction Available ';break;
	 		}
	 		
	 	}
	 	if(isset($val['W']) && $val['W'] > 0){
	 		switch(strtolower($d)){
	 			case 'south': $y=$val['W']?$y-$val['W']:$y; break;
	 			case 'east': $x=$val['W']?$x+$val['W']:$x; break;
	 			case 'north': $y=$val['W']?$y+$val['W']:$y; break;
	 			case 'west': $x=$val['W']?$x-$val['W']:$x; break;
	 			default: $d='No direction Available ';break;
	 		}
	 	}
	 }
	 echo $x.' '.$y.' '.$d;
	else:
		echo"Bad Format";
	endif;

