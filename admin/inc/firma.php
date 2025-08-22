<?php !defined("admin") ? die("hacking?") : null;?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Firma</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							Firma
                        </div>
                        <div class="panel-body">    
							    <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
								<div class="alert alert-warning" align="center">Ana Sayfada Firma Bilgilerini Görmek İstemiyorsanız Bütün Firma Bilgilerinden Sekmeyi Kapatınız </div>
                                    <thead>
                                        <tr>
                                            <th>Firma Bilgi</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
								<?php
								
								$query = $db->query("select * from firma order by firma_id desc")->fetchALL(PDO::FETCH_ASSOC);
								
								
										foreach($query as $row){
											?>
											<tr>
                                            <td class="col-md-10"><?php echo $row["firma_bilgi"];?></td>
												<td align="center"><a href="?do=firma_duzenle&id=<?php echo $row["firma_id"]?>" class="btn btn-primary btn-sm">Düzenle</a></td>
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