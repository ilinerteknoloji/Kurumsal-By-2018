<?php !defined("admin") ? die("hacking?") : null;?>
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Firma Düzenle</h1>
                </div>
				
            </div>
						<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Firma Düzenle
                        </div>
                        <div class="panel-body">
						
					   
<?php

$id = g("id",true);


	$query = $db->prepare("select * from firma where firma_id=?");
	$query->execute(array($id));
	$row = $query->fetch(PDO::FETCH_ASSOC);

if ($_POST){
			
		$bilgi = p("bilgi",true);
		$aciklama = p("aciklama");
		$durum = p("durum");
		
		if(!$bilgi || !$aciklama || !$durum){
			
			echo '<div class="alert alert-warning">Gerekli Alanları Doldurunuz ...</div>';
			
		}else{
			
			$update = $db->prepare("update firma set 
			
					firma_bilgi=?,
					firma_aciklama=?,
					firma_durum=? where firma_id=?
			
			");
			
			$ok = $update->execute(array($bilgi,$aciklama,$durum,$id));
			
				if($ok){
					
					echo '<div class="alert alert-success">Firma Güncellendi ...</div>';
					
					 header("refresh: 2; url=?do=firma");
					
				}else{
					
					echo '<div class="alert alert-danger">Firma Güncellendirken Hata Oluştu ...</div>';
					
				}
			
		}


	
			
}else{
	
	$query = $db->prepare("select * from firma where firma_id=?");
	$query->execute(array($id));
	$row = $query->fetch(PDO::FETCH_ASSOC);
	
	?>
	<form action="" method="post" enctype="multipart/form-data">
						    <div class="col-lg-6">
					    <div class="form-group">
                         <label>Firma Bilgi</label>
                        <input name="bilgi" value="<?php echo $row["firma_bilgi"];?>" class="form-control">
                                        </div>
						<div class="form-group">
                        <label>Firma Açıklama</label>
						<textarea name="aciklama" rows="8" class="form-control"><?php echo $row["firma_aciklama"];?></textarea>
                                 </div>
						<div class="form-group">
                        <label>Sekme Ayarları</label>
						<select class="form-control" name="durum">
						<option  value="1"<?php echo $row["firma_durum"] == 1 ? ' selected ' : null;?>>Sekme Aç</option>
						<option  value="2" <?php echo $row["firma_durum"] == 2 ? ' selected ' : null;?>>Sekme Kapat</option>
						</select><br>
						<button type="submit" class="btn btn-primary">Firma Güncelle</button>
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