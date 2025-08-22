<?php !defined("admin") ? die("hacking?") : null;?>
<?php 

 session_destroy();
 
 header("refresh: 2; url=/admin/");


?>


<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Çıkış</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							Çıkış Yap
                        </div>
                        <div class="panel-body">
                      <div class="alert alert-success">Başarıyla Çıkış Yaptınız Yönlendiriliyorsunuz...</div>                       
					   </div>
                        <div class="panel-footer">
                            Iliner Teknoloji
                        </div>
                    </div>
                </div>
			
			</div>