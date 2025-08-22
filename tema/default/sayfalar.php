	<?php
	
	$link = g("link");
	
	
	if($link){
		
		$query = $db->prepare("select * from sayfalar where sayfa_link=? and sayfa_durum =?");
		$query->execute(array($link,1));
		$row = $query->fetch(PDO::FETCH_ASSOC);
		$kontrol = $query->rowcount();
		
		if($kontrol){
			
			?>
			
				 <div class="icerikler"> 
	    		
	  <div class="aciklama"> 

	  <p> 
<center><h2 style="color:#BBBBBB; font-weight:bold; font-size:20px;"><?php echo $row["sayfa_adi"];?>:</h2></center>
<br>
   <span style="color:#888888; font-family:calibri;"><?php echo $row["sayfa_aciklama"];?>	  </span>
	  </p>
<?php

if($row["sayfa_resim"]){
	
			?>
		 <img src="<?php echo $row["sayfa_resim"];?>" width="400" height="300" alt="" style="margin-left:320px;"/>
			<?php
}


?>	
	  
	  </div>
	   
	   </div>
			
			<?php
			
		}else{
			echo 'Sayfa Bulunamadı';
		}
		
		
		
	}else{
		
		$hata = "Sayfa Değeri Yok";
		require(tema."/hata");
		
	}
	
	?>

