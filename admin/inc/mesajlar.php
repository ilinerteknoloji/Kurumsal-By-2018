<?php !defined("admin") ? die("hacking?") : null;?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mesajlar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							Mesajlar
                        </div>
                        <div class="panel-body">    
							    <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Mesaj Gönderen</th>
                                            <th>Mesaj Başlık</th>
                                            <th>Mesaj Tarih</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
								<?php
								
								$query = $db->query("select * from mesajlar order by mesaj_id desc")->fetchALL(PDO::FETCH_ASSOC);
								
								
										foreach($query as $row){
											?>
											<tr>
                                            <td><?php echo $row["mesaj_gonderen"];?></td>
                                            <td><?php echo $row["mesaj_baslik"];?></td>
                                            <td><?php echo $row["mesaj_tarih"];?></td>
												<td align="center"><a href="?do=mesaj_oku&id=<?php echo $row["mesaj_id"]?>" class="btn btn-primary btn-sm">Oku</a><a href="?do=mesaj_sil&id=<?php echo $row["mesaj_id"]?>" class="btn btn-danger btn-sm" style="margin-left:5px;">Sil</a></td>
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