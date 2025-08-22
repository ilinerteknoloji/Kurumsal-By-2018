<?php !defined("admin") ? die("hacking?") : null;?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slider</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							Slider <a href="?do=slider_ekle" class="btn btn-default" style="float:right;">Slider Ekle</a>
                        </div>
                        <div class="panel-body">    
							    <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Slider Resim</th>
                                            <th>Slider Adı</th>
                                            <th>Slider Tarih</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
								<?php
								
								$query = $db->query("select * from slider order by slider_id desc")->fetchALL(PDO::FETCH_ASSOC);
								
								
										foreach($query as $row){
											?>
											<tr>
                                            <td><img src="<?php echo $row["slider_resim"];?>" width="200" height="100"></td>
                                            <td><?php echo $row["slider_adi"];?></td>
                                            <td><?php echo $row["slider_tarih"];?></td>
												<td align="center"><a href="?do=slider_duzenle&id=<?php echo $row["slider_id"]?>" class="btn btn-primary btn-sm">Düzenle</a><a href="?do=slider_sil&id=<?php echo $row["slider_id"]?>" class="btn btn-danger btn-sm" style="margin-left:5px;">Sil</a></td>
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