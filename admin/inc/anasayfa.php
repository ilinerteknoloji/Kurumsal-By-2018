<?php !defined("admin") ? die("hacking?") : null;?>

       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Anasayfa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php sayi("mesajlar");?></div>
                                    <div>Mesajlar</div>
                                </div>
                            </div>
                        </div>
                        <a href="?do=mesajlar">
                            <div class="panel-footer">
                                <span class="pull-left">Devamını Görüntüle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php sayi("sayfalar");?></div>
                                    <div>Sayfalar</div>
                                </div>
                            </div>
                        </div>
                        <a href="?do=sayfalar">
                            <div class="panel-footer">
                                <span class="pull-left">Devamını Görüntüle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php sayi("urunler");?></div>
                                    <div>Ürünler</div>
                                </div>
                            </div>
                        </div>
                        <a href="?do=urunler">
                            <div class="panel-footer">
                                <span class="pull-left">Devamını Görüntüle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-slideshare fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php sayi("slider");?></div>
                                    <div>Slider</div>
                                </div>
                            </div>
                        </div>
                        <a href="?do=slider">
                            <div class="panel-footer">
                                <span class="pull-left">Devamını Görüntüle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-picture-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php sayi("referanslar");?></div>
                                    <div>Referanslar</div>
                                </div>
                            </div>
                        </div>
                        <a href="?do=referanslar">
                            <div class="panel-footer">
                                <span class="pull-left">Devamını Görüntüle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-wrench fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Ayarlar</div>
                                </div>
                            </div>
                        </div>
                        <a href="?do=ayarlar">
                            <div class="panel-footer">
                                <span class="pull-left">Devamını Görüntüle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-inbox fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>İletişim</div>
                                </div>
                            </div>
                        </div>
                        <a href="?do=iletisim">
                            <div class="panel-footer">
                                <span class="pull-left">Devamını Görüntüle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-earphone fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Mail Ayarları</div>
                                </div>
                            </div>
                        </div>
                        <a href="?do=mail">
                            <div class="panel-footer">
                                <span class="pull-left">Devamını Görüntüle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							Site Bilgileri
                        </div>
                        <div class="panel-body">   
							<span style="font-weight:bold;">PHP Versiyonu: </span><?php echo phpversion();?><br>
							<span style="font-weight:bold;">Hosting Sağlayıcısı: </span> Iliner Teknoloji<br>
							<span style="font-weight:bold;">Tasarım Ve Kodlama: </span> Iliner Teknoloji
					   </div>
                        <div class="panel-footer">
                            Iliner Teknoloji
                        </div>
                    </div>
                </div>
				
				<div style="clear:both;"></div>
			
			
        </div>
