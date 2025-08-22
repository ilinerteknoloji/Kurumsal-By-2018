<?php !defined("admin") ? die("hacking?") : null;?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Referans Sil</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							Referans Sil
                        </div>
                        <div class="panel-body">
							<?php
							
							$id = g("id");
							
							if($id){
								
								$query = $db->prepare("select * from referanslar where referans_id=?");
								$query->execute(array($id));
								$row = $query->fetch(PDO::FETCH_ASSOC);
								
								@unlink ($row["referans_resim"]);
								
								$sil = $db->prepare("delete from referanslar where referans_id=?");
								$ok = $sil->execute(array($id));
								
								if($ok){
									
									echo '<div class="alert alert-success">Referans Başarılı Bir Şekilde Silindi Yönlendiriliyorsunuz...</div>';
									
									header("refresh: 2; url=?do=referanslar");
									
								}else{
									
									
									
								}
								
								
								
							}else{
								
								echo '<div class="alert alert-danger">Böyle Bir ID Bulunamadı...</div>';
								
							}
							
							?>
					   </div>
                        <div class="panel-footer">
                            Iliner Teknoloji
                        </div>
                    </div>
                </div>
			
			</div>