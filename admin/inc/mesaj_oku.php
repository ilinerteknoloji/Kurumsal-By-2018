<?php !defined("admin") ? die("hacking?") : null;?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mesaj Oku</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
							Mesaj Oku
                        </div>
                        <div class="panel-body">
						<?php

						$id = g("id",true);
						
						if($id){
							
							$query = $db->prepare("select * from mesajlar where mesaj_id=? ");
							$query->execute(array($id));
							$row = $query->fetch(PDO::FETCH_ASSOC);
							$kontrol = $query->rowcount();
							
							if($kontrol){
								
								?>
								
								<div class="col">
								<span style="background:#ccc;display:block;padding:10px;margin-bottom:10px;border-radius:5px;">Gönderen: <i><?php echo $row["mesaj_gonderen"];?></i><i style="float:right;">Tarih: <?php echo $tarih[0];?></i></span>
								<p>
								<?php echo $row["mesaj_aciklama"];?>
								</p>
								</div>
								
								<?php
								
							}else{
								
								echo '<div class="alert alert-danger">Mesaj Bulanamadı Silinmiş Olabilir ....</div>';
								
							}
							
							
						}else{
							
							echo '<div class="alert alert-danger">ID Bulanamadı ....</div>';
							
						}
							

						?>                      
					   </div>
                        <div class="panel-footer">
                            Iliner Teknoloji
                        </div>
                    </div>
                </div>
			
			</div>