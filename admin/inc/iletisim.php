<?php !defined("admin") ? die("hacking?") : null;?>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">İletişim</h1>
                </div>
				
            </div>
						<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           İletişim Ayarları
                        </div>
                        <div class="panel-body">
						
					   
<?php

if ($_POST){
	
	$email = p("email",true);
	$telefon = p("telefon",true);
	$site = p("site",true);
	$ilce = p("ilce",true);
	$adres = p("adres",true);
	$facebook = p("facebook",true);
	$twitter = p("twitter",true);
	$instagram = p("instagram",true);
	
	if(!$email || !$telefon || !$site || !$ilce || !$adres || !$facebook || !$twitter || !$instagram){
		
		echo '<div class="alert alert-warning">Gerekli Alanları Doldurmanız Gerekiyor</div>';
		
	}else{
		
		$update = $db->prepare("update iletisim set
		
					email=?,
					telefon=?,
					site=?,
					ilce=?,
					adres=?,
					facebook=?,
					twitter=?,
					instagram=? where iletisim_id=?
		
		");
		
		$ok = $update->execute(array($email,$telefon,$site,$ilce,$adres,$facebook,$twitter,$instagram,1));
		
			if($ok){
				
				echo '<div class="alert alert-success">İletişim Ayarları Başarıyla Güncellenmiştir...</div>';
				
			}else{
				echo '<div class="alert alert-danger">İletişim Ayarları Güncellenemedi...</div>';
			}
		
	}

}else{
	
	$query = $db->prepare("select * from iletisim where iletisim_id=?");
	$query->execute(array(1));
	$row = $query->fetch(PDO::FETCH_ASSOC);
	
	?>
	<form action="" method="post">
						    <div class="col-lg-6">
					    <div class="form-group">
                         <label>E-Mail</label>
                        <input type="email" name="email" value="<?php echo $row["email"];?>" class="form-control">
                                        </div>
						<div class="form-group">
                        <label>Telefon Numarası:</label>
						<input type="number" name="telefon" value="<?php echo $row["telefon"];?>" class="form-control">
                                 </div>
						<div class="form-group">
                        <label>Site Adresi:</label>
						<input name="site" value="<?php echo $row["site"];?>" class="form-control">
                                 </div>
						<div class="form-group">
                        <label>İlçe:</label>
						<input name="ilce" value="<?php echo $row["ilce"];?>" class="form-control">
                                 </div>
						<div class="form-group">
                        <label>Adres:</label>
						<textarea name="adres" rows="4" class="form-control"><?php echo $row["adres"];?></textarea>
                                 </div>
						<div class="form-group">
                        <label>Facebook Adresi:</label>
						<input name="facebook" value="<?php echo $row["facebook"];?>" class="form-control">
                                 </div>
						<div class="form-group">
                        <label>Twitter Adresi:</label>
						<input name="twitter" value="<?php echo $row["twitter"];?>" class="form-control">
                                 </div>
						<div class="form-group">
                        <label>İnstagram Adresi:</label>
						<input name="instagram" value="<?php echo $row["instagram"];?>" class="form-control">
                                 </div>
						<button type="submit" class="btn btn-primary">İletişim Güncelle</button>
                                   </div>
								   </form>
	<?php
	
}

?>
								      </div>
									  
										
                        <div class="panel-footer">
                            Iliner Teknoloji
                        </div>
                    </div>
                </div>	
				<div style="clear:both;"></div>
            </div>