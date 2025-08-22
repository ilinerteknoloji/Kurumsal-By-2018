<?php !defined("admin") ? die("hacking?") : null;?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Referans Ekle</h1>
                </div>
                
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Referans Ekle
                        </div>
                        <div class="panel-body">
                        <?php 
						
						
						
						
						
						
						if($_POST){ 
						$adi      = p("adi",true);	
							
						$query = $db->prepare("select * from referanslar where referans_adi=?");
						$query->execute(array($adi));
                        $query->fetch(PDO::FETCH_ASSOC);
						$kontrol = $query->rowCount(); 
						
						if($kontrol){
							
						echo '<div class="alert alert-warning"> <span style="color: red">'.$adi.'</span> Böyle Bir Referans Daha Önce Eklenmiştir </div>';	
							
						}else {
							
							  $adi      = p("adi",true);
							 
							 
							  $aciklama = p("aciklama",true);
							  
						  
						  
						 if(!$adi || !$aciklama){ 
						 
			   echo '<div class="alert alert-warning">Gerekli Alanları Doldurmalısınız</div>';

						 
						 
						 }elseif(!$_FILES["resim"]["name"]){
							 
			 echo '<div class="alert alert-warning"> Resim Alanı Boş Bırakılamaz ...</div>';
	
							 
						 }else{
							 
							$maxSize = 7000000;
							$dosyaUzantisi = substr($_FILES["resim"]["name"],-4,4);
                            $dosyaAdi      = rand(0,999999).$dosyaUzantisi;
                            $dosyaYolu     = "..".tema_url."/dosya/".$dosyaAdi;  
                        				  
							
							if($_FILES["resim"]["size"]> $maxSize){
								
	            echo '<div class="alert alert-warning">Dosya Boyutu 700 KBdan Büyük Olamaz..</div>';
	
								
							}else {
								
								$dosya = $_FILES["resim"]["type"];
								
								
								if($dosya == "image/jpeg" || $dosya == "image/png" || $dosya == "image/gif"){
									
									
									if(is_uploaded_file($_FILES["resim"]["tmp_name"])){
										 
										 
										
										$ok = move_uploaded_file($_FILES["resim"]["tmp_name"],$dosyaYolu);
										
										if($ok){  
										
										$resim = $dosyaYolu; 
										
										
										// veritabanı yukleme
										 if(@!$resim){
								
							        $resim = "";	
								
							}
						  
							  
							  $update = $db->prepare("insert into referanslar set  
							  
							          referans_adi =?,
									  referans_aciklama=?,
									  referans_resim=?
									  
									 
							  ");
							  
							$ok =  $update->execute(array($adi,$aciklama,$resim)); 
							  
							  if($ok){
								  
			 echo '<div class="alert alert-success">Referans Eklenmiştir Yönlendiriliyorsunuz...</div>';
			 
			  header("refresh: 2; url=?do=referanslar");
				  
								  
							  }else {
								  
								  echo '<div class="alert alert-danger">Referans Eklenirken Hata Oluştu ...</div>';
								   
								 
								   
							  }
										
										// veritabanı yukleme bitis
										
										
										
										
											
										}else {
											
			          echo '<div class="alert alert-warning">Dosya Gönderilmedi...</div>';

											
										}
										
										
									}else {
										
										
			       echo '<div class="alert alert-warning">Dosya Yüklenmedi..</div>';

										
									}
									
									
								}else {
									
									echo '<div class="alert alert-warning">Dosya Formatı Resim Olmalıdır...</div>';
									
								}
								
								
								
							}
							
						 }
							
							 
						  
						  
						  
						  
						  
						  
						
							  
							
							  
						
						  
						   
							  
							  
						  
						  
							
							
							
							
							
							
						}
						
						
						}else { 
						
						 
							?>
							<form action="" method="post" enctype="multipart/form-data">
							<div class="col-lg-8">
						<div class="form-group">
						<label>Referans Adı</label>
						<input name="adi"  class="form-control">
						</div>
					
						<div class="form-group">
						<label>Referans Açıklaması</label>
						<textarea name="aciklama" rows="8" class="form-control" ></textarea>
						</div>
						<div class="form-group">
						<label>Referans Resim</label>
                           <input type="file" name="resim" />
						</div>
						
						<button type="submit" class="btn btn-primary">Referans Ekle</button>
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