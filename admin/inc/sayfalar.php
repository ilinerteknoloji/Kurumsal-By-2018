<?php !defined("admin") ? die("hacking?") : null;?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							Sayfalar <a href="?do=sayfa_ekle" class="btn btn-default" style="float:right;">Sayfa Ekle</a>
                        </div>
                        <div class="panel-body">    
							    <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sayfa Adı</th>
                                            <th>Sayfa Bilgi</th>
                                            <th>Sayfa Tarih</th>
                                            <th>Sayfa Durum</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
								<?php
								
								$query = $db->query("select * from sayfalar order by sayfa_id desc")->fetchALL(PDO::FETCH_ASSOC);
								
								
										foreach($query as $row){
											?>
											<tr>
                                            <td><?php echo $row["sayfa_adi"];?></td>
                                            <td><?php echo $row["sayfa_bilgi"];?></td>
                                            <td><?php echo $row["sayfa_tarih"];?></td>
                                           <?php
										
											if($row["sayfa_durum"] == 1){
												
												echo '<td style="color:green;">Onaylı</td>';
												
											}else{
												echo '<td style="color:red;">Onaylı Değil</td>';
											}
										   
										   ?>
												<td align="center"><a href="?do=sayfa_duzenle&id=<?php echo $row["sayfa_id"]?>" class="btn btn-primary btn-sm">Düzenle</a><a href="?do=sayfa_sil&id=<?php echo $row["sayfa_id"]?>" class="btn btn-danger btn-sm" style="margin-left:5px;">Sil</a></td>
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