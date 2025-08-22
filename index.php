<?php

	require("sistem/ayar.php");
	require("sistem/sistem.php");
	
	if($row["site_durum"] == 1){
		
		 require(tema."/index.php"); 
	
		
	}else{
		echo '<h2>Site Kapalı</h2>';
	}


	
?>