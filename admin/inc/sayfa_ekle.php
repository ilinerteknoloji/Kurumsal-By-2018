<?php !defined("admin") ? die("hacking?") : null;?>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sayfa Ekle</h1>
                </div>
				
            </div>
						<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							Sayfa Ekle
                        </div>
                        <div class="panel-body">
						
					   
<?php




if ($_POST){
			
			$adi = p("adi",true);
			
			$query = $db->prepare("select * from sayfalar where sayfa_adi=?");
			$query->execute(array($adi));
			$query->fetch(PDO::FETCH_ASSOC);
			$kontrol = $query->rowcount();
			
			if($kontrol){
				
				echo '<div class="alert alert-danger"><span style="color:red;">'.$adi.'</span> Böyle Bir Sayfa Daha Önce Açılmıştır</div>';
				
			}else{
				
		$adi = p("adi",true);
		$link = seflink($adi);
		$bilgi = p("bilgi",true);
		$aciklama = p("aciklama",true);
		$durum = p("durum",true);
		
		
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
		
		if(!$adi || !$bilgi || !$aciklama || !$durum){
			
			echo '<div class="alert alert-warning">Gerekli Alanları Doldurunuz ...</div>';
			
		}else{
			
			if(@!$resim){
				
				$resim = "";
				
			}
			
			$update = $db->prepare("insert into sayfalar set 
			
					sayfa_adi=?,
					sayfa_link=?,
					sayfa_bilgi=?,
					sayfa_aciklama=?,
					sayfa_resim=?,
					sayfa_durum=?
			
			");
			
			$ok = $update->execute(array($adi,$link,$bilgi,$aciklama,$resim,$durum));
			
				if($ok){
					
					echo '<div class="alert alert-success">Sayfa Başarıyla Eklendi Yönlendiriliyorsunuz ...</div>';
					
				}else{
					
					echo '<div class="alert alert-danger">Sayfa Eklenirken Hata Oluştu...</div>';
					
				}
			
		}


	
			
				
			}
			
}else{
	
	$query = $db->prepare("select * from sayfalar where sayfa_id=?");
	$query->execute(array($id));
	$row = $query->fetch(PDO::FETCH_ASSOC);
	
	?>
	<form action="" method="post" enctype="multipart/form-data">
						    <div class="col-lg-6">
					    <div class="form-group">
                         <label>Sayfa Adı</label>
                        <input name="adi" class="form-control">
                                        </div>
						<div class="form-group">
                        <label>Sayfa Bilgi</label>
						<input name="bilgi" class="form-control">
                                 </div>
						<div class="form-group">
                        <label>Sayfa Açıklama</label>
						<textarea name="aciklama" rows="8" class="form-control"></textarea>
                                 </div>
						<div class="form-group">
                        <label>Sayfa Resim</label>
						<input type="file" name="resim" ></input>
                                 </div>
						<div class="form-group">
                        <label>Sayfa Durum</label>
						<select class="form-control" name="durum">
						<option  value="1">Onaylı</option>
						<option  value="2">Onaylı Değil</option>
						</select><br>
						<button type="submit" class="btn btn-primary">Sayfa Ekle</button>
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