<?php 
 
 session_start();
 ob_start();
 
  
  try {
	  
	  $host = "..";
	  $dbname = "..";
	  $kadi = "..";
	  $sifre = "..";
	  
	 $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8",$kadi,$sifre);
	  
  }catch(PDOEXception $mesaj){
	  
	  echo $mesaj->getmessage();
	  
	  
  }
  
    $row = $db->query("select * from ayarlar")->fetch(PDO::FETCH_ASSOC);
    
	define("path",realpath("."));
	 define("tema",path."/tema/".$row["site_tema"]);
	 define("tema_url","/tema/".$row["site_tema"]);
     
   
   
   
   
   
   
   
   
   
   
   
   

?>