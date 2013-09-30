<?php

	# Set the ID
	function create_id($prefix,$length){
	   	if( !$length){
			$length = 10;
		}
	   	return $prefix.strtoupper(random($length));
	}
	
	# Set the ID
	function timestamp_string(){
	   	
		return date("YmdHis");
	}
	
	# Generate ID with md5 randomization
	function generate_random_id($length){
		return md5(random($length));
	}
	
	# GENERATE A RANDON STRING
	function random($length){
		$randstr = "";
	  	for($i=0; $i<$length; $i++){
			$randnum = mt_rand(0,61);
			if($randnum < 10){
				$randstr .= chr($randnum+48);
			}else if($randnum < 36){
				$randstr .= chr($randnum+55);
			}else{
				$randstr .= chr($randnum+61);
			}
		}
		return $randstr;
	}

?>