<?php !defined("admin") ? die("hacking?") : null;?>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ürün Düzenle</h1>
                </div>
				
            </div>
						<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Ürün Düzenle
                        </div>
                        <div class="panel-body">
						
					   
<?php

$id = g("id",true);


	$query = $db->prepare("select * from urunler where urun_id=?");
	$query->execute(array($id));
	$row = $query->fetch(PDO::FETCH_ASSOC);

if ($_POST){
			
		$adi = p("adi",true);
		$link = seflink($adi);
		$bilgi = p("bilgi",true);
		$aciklama = p("aciklama",true);
		$full = strip_tags(p("full"),"<img></img>");
		$durum = p("durum",true);
		$fiyat = p("fiyat",true);
		
		
		if($_FILES["resim"]["name"]){
			
			
			$maxSize = 700000000;
			$dosyaUzantisi = substr($_FILES["resim"]["name"],-4,4);
			$dosyaAdi = rand(0,999999).$dosyaUzantisi;
			$dosyaYolu = "..".tema_url."/dosya/".$dosyaAdi;
			
			if($_FILES["resim"]["size"]> $maxSize){
				
				echo '<div class="alert alert-warning">Dosya Boyutu 700 KBdan Büyük Olamaz ...</div>';
				
			}else{
				
				$dosya = $_FILES["resim"]["type"];
				
				if($dosya == "image/jpeg" || $dosya == "image/png" || $dosya == "image/gif"){
					
					if(is_uploaded_file($_FILES["resim"]["tmp_name"])){
						
						@unlink($row["sayfa_resim"]);
						
						$ok = move_uploaded_file($_FILES["resim"]["tmp_name"],$dosyaYolu);
						
						if($ok){
							
							$resim = $dosyaYolu;
							
						}else{
							
							echo '<div class="alert alert-warning">Dosya Gönderilmedis ...</div>';
							
						}
						
						
						
					}else{
						echo '<div class="alert alert-warning">Dosya Yüklenemedi ...</div>';
					}
					
				}else{
					
					echo '<div class="alert alert-warning">Dosya Formatı Sadece Resim Olmalıdır ...</div>';
					
				}
				
			}
			
		}
		
		if(!$adi || !$bilgi || !$aciklama || !$full || !$durum || !$fiyat){
			
			echo '<div class="alert alert-warning">Gerekli Alanları Doldurunuz ...</div>';
			
		}else{
			
			if(@!$resim){
				
				$resim = $row["urun_resim"];
				
			}
			
			$update = $db->prepare("update urunler set 
			
					urun_adi=?,
					urun_link=?,
					urun_bilgi=?,
					fiyat=?,
					urun_anasayfa_aciklama=?,
					urun_full_aciklama=?,
					urun_resim=?,
					urun_durum=? where urun_id=?
			
			");
			
			$ok = $update->execute(array($adi,$link,$bilgi,$fiyat,$aciklama,$full,$resim,$durum,$id));
			
				if($ok){
					
					echo '<div class="alert alert-success">Ürün Güncellendi ...</div>';
										 header("refresh: 2; url=?do=urunler");
					
				}else{
					
					echo '<div class="alert alert-danger">Ürün Güncellendirken Hata Oluştu ...</div>';
					
				}
			
		}


	
			
}else{
	
	$query = $db->prepare("select * from urunler where urun_id=?");
	$query->execute(array($id));
	$row = $query->fetch(PDO::FETCH_ASSOC);
	
	?>
	<form action="" method="post" enctype="multipart/form-data">
						    <div class="col-lg-6">
					    <div class="form-group">
                         <label>Ürün Adı</label>
                        <input name="adi" value="<?php echo $row["urun_adi"];?>" class="form-control">
                                        </div>
						<div class="form-group">
                        <label>Ürün Bilgi</label>
						<input name="bilgi" value="<?php echo $row["urun_bilgi"];?>" class="form-control">
                                 </div>
						<div class="form-group">
                        <label>Ürün Fiyat</label>
						<input name="fiyat" value="<?php echo $row["fiyat"];?>" class="form-control">
                                 </div>
						<div class="form-group">
                        <label>Ürün Açıklama</label>
						<textarea name="aciklama" rows="8" class="form-control"><?php echo $row["urun_anasayfa_aciklama"];?></textarea>
                                 </div>
						<div class="form-group">
                        <label>Ürün Full Açıklama</label>
						<textarea name="full" rows="8" class="form-control"><?php echo $row["urun_full_aciklama"];?></textarea>
                                 </div>
						<div class="form-group">
                        <label>Ürün Resim</label>
						<input type="file" name="resim" ></input>
                                 </div>
						<div class="form-group">
                        <label>Ürün Durum</label>
						<select class="form-control" name="durum">
						<option  value="1"<?php echo $row["urun_durum"] == 1 ? ' selected ' : null;?>>Onaylı</option>
						<option  value="2" <?php echo $row["urun_durum"] == 2 ? ' selected ' : null;?>>Onaylı Değil</option>
						</select><br>
						<button type="submit" class="btn btn-primary">Ürünü Güncelle</button>
                                 </div>
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
            </div>