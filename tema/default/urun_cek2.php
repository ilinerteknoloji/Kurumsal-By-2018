
 
<?php

$query = $db->prepare("select * from urunler where urun_durum=? order by urun_id desc limit 6");
$query->execute(array(1));
$liste = $query->fetchALL(PDO::FETCH_ASSOC);

	foreach($liste as $row){
		
		?>
		
		<a href="urunler/<?php echo $row["urun_link"];?>.html">
	 <div class="urun"> 
<?php
if($row["urun_resim"]){
	
	?>
	<img src="<?php echo $row["urun_resim"];?>" width="150" height="140" alt=""/>
	<?php
	
}
?>
	 <h2><?php echo $row["urun_adi"];?></h2>
	 
<p><?php echo $row["fiyat"];?> ₺</p>
	 <a href="urunler/<?php echo $row["urun_link"];?>.html"><div class="devam">Ayrıntılıar</div></a>
	 
	 </div>
	 </a>

		<?php
		
	}

?>

	 
