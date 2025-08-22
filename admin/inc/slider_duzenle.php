<?php !defined("admin") ? die("hacking?") : null;?>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slider Düzenle</h1>
                </div>
				
            </div>
						<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Slider Düzenle
                        </div>
                        <div class="panel-body">
						
					   
<?php

$id = g("id",true);


	$query = $db->prepare("select * from slider where slider_id=?");
	$query->execute(array($id));
	$row = $query->fetch(PDO::FETCH_ASSOC);

if ($_POST){
			
		$adi = p("adi",true);
		$aciklama = p("aciklama",true);
		
		
		if(!$adi || !$aciklama){
			
			echo '<div class="alert alert-warning">Gerekli Alanları Doldurunuz ...</div>';
			
		}elseif(!$_FILES["resim"]["name"]){
			
			echo '<div class="alert alert-warning">Resim Alanı Boş Bırakalamaz ...</div>';
			
		}else{
			
			
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
						
						@unlink($row["slider_resim"]);
						
						$ok = move_uploaded_file($_FILES["resim"]["tmp_name"],$dosyaYolu);
						
						if($ok){
							
							$resim = $dosyaYolu;
							
										if(@!$resim){
				
										$resim = $row["slider_resim"];
										
									}
									
									$update = $db->prepare("update slider set 
									
											slider_adi=?,
											slider_aciklama=?,
											slider_resim=? where slider_id=?
									
									");
									
									$ok = $update->execute(array($adi,$aciklama,$resim,$id));
									
										if($ok){
											
											echo '<div class="alert alert-success">Slider Güncellendi ...</div>';
											header("refresh: 2; url=?do=slider");											
											
										}else{
											
											echo '<div class="alert alert-danger">Slider Güncellendirken Hata Oluştu ...</div>';
											
										}
							
							
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
			



	
			
}else{
	
	$query = $db->prepare("select * from slider where slider_id=?");
	$query->execute(array($id));
	$row = $query->fetch(PDO::FETCH_ASSOC);
	
	?>
	<form action="" method="post" enctype="multipart/form-data">
						    <div class="col-lg-6">
					    <div class="form-group">
                         <label>Slider Adı</label>
                        <input name="adi" value="<?php echo $row["slider_adi"];?>" class="form-control">
                                        </div>
						<div class="form-group">
                        <label>Slider Açıklama</label>
						<textarea name="aciklama" rows="8" class="form-control"><?php echo $row["slider_aciklama"];?></textarea>
                                 </div>
						<div class="form-group">
                        <label>Slider Resim</label>
						<input type="file" name="resim" ></input>
                                 </div>
						<button type="submit" class="btn btn-primary">Slider Güncelle</button>
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