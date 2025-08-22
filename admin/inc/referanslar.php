<?php !defined("admin") ? die("hacking?") : null;?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Referanslar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							Referanslar <a href="?do=referans_ekle" class="btn btn-default" style="float:right;">Referans Ekle</a>
                        </div>
                        <div class="panel-body">    
							    <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Referans Resim</th>
                                            <th>Referans Adı</th>
                                            <th>Referans Tarih</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
								<?php
								
								$query = $db->query("select * from referanslar order by referans_id desc")->fetchALL(PDO::FETCH_ASSOC);
								
								
										foreach($query as $row){
											?>
											<tr>
                                            <td style="line-height:100px;"><img src="<?php echo $row["referans_resim"];?>" width="200" height="100"></td>
                                            <td style="line-height:100px;"><?php echo $row["referans_adi"];?></td>
                                            <td style="line-height:100px;"><?php echo $row["referans_tarih"];?></td>
												<td align="center" style="line-height:100px;"><a href="?do=referans_duzenle&id=<?php echo $row["referans_id"]?>" class="btn btn-primary btn-sm">Düzenle</a><a href="?do=referans_sil&id=<?php echo $row["referans_id"]?>" class="btn btn-danger btn-sm" style="margin-left:5px;">Sil</a></td>
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