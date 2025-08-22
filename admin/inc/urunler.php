<?php !defined("admin") ? die("hacking?") : null;?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ürünler</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							Ürünler <a href="?do=urun_ekle" class="btn btn-default" style="float:right;">Ürün Ekle</a>
                        </div>
                        <div class="panel-body">    
							    <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Ürün Adı</th>
                                            <th>Ürün Bilgi</th>
                                            <th>Ürün Tarih</th>
                                            <th>Ürün Durum</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
								<?php
								
								$query = $db->query("select * from urunler order by urun_id desc")->fetchALL(PDO::FETCH_ASSOC);
								
								
										foreach($query as $row){
											?>
											<tr>
                                            <td><?php echo $row["urun_adi"];?></td>
                                            <td><?php echo $row["urun_bilgi"];?></td>
                                            <td><?php echo $row["urun_tarih"];?></td>
                                           <?php
										
											if($row["urun_durum"] == 1){
												
												echo '<td style="color:green;">Onaylı</td>';
												
											}else{
												echo '<td style="color:red;">Onaylı Değil</td>';
											}
										   
										   ?>
												<td align="center"><a href="?do=urun_duzenle&id=<?php echo $row["urun_id"]?>" class="btn btn-primary btn-sm">Düzenle</a><a href="?do=urun_sil&id=<?php echo $row["urun_id"]?>" class="btn btn-danger btn-sm" style="margin-left:5px;">Sil</a></td>
											</tr>
											<?php
										}
								?>
                                    </tbody>
                                </table>
                            </div>
					   </div>
                        <div class="panel-footer">
							Iliner Teknoloji
                        </div>
                    </div>
                </div>
			
			</div>