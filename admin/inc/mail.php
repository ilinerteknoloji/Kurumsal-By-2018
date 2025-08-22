<?php !defined("admin") ? die("hacking?") : null;?>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mail</h1>
                </div>
				
            </div>
						<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Mail Ayarları
                        </div>
                        <div class="panel-body">
						
					   
<?php

if ($_POST){
	
	$host = p("host",true);
	$port = p("port",true);
	$adresi = p("adresi",true);
	$sifre = p("sifre",true);
	$gonderen = p("gonderen",true);
	$baglanti = p("baglanti",true);
	
	if(!$host || !$port || !$adresi || !$sifre || !$gonderen || !$baglanti){
		
		echo '<div class="alert alert-warning">Gerekli Alanları Doldurmanız Gerekiyor</div>';
		
	}else{
		
		$update = $db->prepare("update iletisim set
		
					mail_host=?,
					mail_port=?,
					mail_adresi=?,
					mail_sifre=?,
					mail_gonderen=?,
					mail_baglanti=? where iletisim_id=?
		
		");
		
		$ok = $update->execute(array($host,$port,$adresi,$sifre,$gonderen,$baglanti,1));
		
			if($ok){
				
				echo '<div class="alert alert-success">Mail Ayarları Başarıyla Güncellenmiştir...</div>';
				
			}else{
				echo '<div class="alert alert-danger">Mail Ayarları Güncellenemedi...</div>';
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
                         <label>Mail Host:</label>
                        <input name="host" value="<?php echo $row["mail_host"];?>" class="form-control">
                                        </div>
						<div class="form-group">
                        <label>Mail Port:</label>
						<select class="form-control" name="port">
						<option  value="587">587</option>
						<option  value="465">465</option>
						</select>
						</div>
						<div class="form-group">
                        <label>Mail Adresi:</label>
						<input name="adresi" value="<?php echo $row["mail_adresi"];?>" class="form-control">
                                 </div>
						<div class="form-group">
                        <label>Mail Şifre:</label>
						<input name="sifre" value="<?php echo $row["mail_sifre"];?>" class="form-control">
                                 </div>
						<div class="form-group">
                        <label>Mail Gözüken Adres:</label>
						<input name="gonderen" value="<?php echo $row["mail_gonderen"];?>" class="form-control"></input>
                                 </div>
						<div class="form-group">
                        <label>Mail Bağlantısı:</label>
						<select class="form-control" name="baglanti">
						<option  value="tls">TLS</option>
						<option  value="ssl">SSL</option>
						</select>
						</div>
						<button type="submit" class="btn btn-primary">Mail Güncelle</button>
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