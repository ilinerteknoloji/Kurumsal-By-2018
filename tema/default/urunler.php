	<?php
	
	$link = g("link");
	
	
	if($link){
		
		$query = $db->prepare("select * from urunler where urun_link=? and urun_durum =?");
		$query->execute(array($link,1));
		$row = $query->fetch(PDO::FETCH_ASSOC);
		$kontrol = $query->rowcount();
		
		if($kontrol){
			
			?>
			
				 <div class="icerikler"> 
	    	
	  <div class="aciklama"> 
<?php

if($row["urun_resim"]){
	
			?>
		   <img src="<?php echo $row["urun_resim"];?>" width="400" height="300" alt="" />
			<?php
}


?>	   
<p style="font-size:18px; color:#BBBBBB; font-weight:bold;">Ürün Özellikleri:</p><br>
	  		 <span style="font-size:17px; color:#BBBBBB; font-weight:bold;">Ürün İsmi: </span><?php echo $row["urun_adi"];?><br><br><br>
	   <span style="font-size:17px; color:#BBBBBB; font-weight:bold;"> Diğer Özellikler: </span>
<?php echo $row["urun_full_aciklama"];?>	<br><br>
	  </p>
	  <span style="font-size:17px; color:#BBBBBB; font-weight:bold;">Ürün Fiyatı: </span> <?php echo $row["fiyat"];?>   ₺

	  </div>
	   
	   </div>
			
			<?php
			
		}else{
			echo '<div class="alert alert-warning>Sayfa Bulunamadı</div>';
		}
		
		
		
	}else{
		
		$hata = "Sayfa Değeri Yok";
		require(tema."/hata");
		
	}
	
	?>

