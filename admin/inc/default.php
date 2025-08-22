<?php !defined("admin") ? die("hacking?") : null;?>
<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin">KaraKas Mobilya Admin Paneli</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
					<?php
					
					$query = $db->prepare("select * from mesajlar order by mesaj_id desc");
					$query->execute(array());
					$liste = $query->fetchALL(PDO::FETCH_ASSOC);
					$kontrol = $query->rowcount();
					
					if($kontrol){
						
						foreach($liste as $row){
							
							$tarih = explode(" ",$row["mesaj_tarih"]);
							
							?>
							
							<li class="divider"></li>
							<li>
								<a href="?do=mesaj_oku&id=<?php echo $row["mesaj_id"];?>">
									<div>
									<strong><?php echo $row["mesaj_gonderen"];?></strong>
										<span class="pull-right text-muted">
											<em><?php echo $tarih[1];?></em>
										</span>
									</div>
									<div><?php echo mb_substr($row["mesaj_aciklama"],0,100,"UTF-8");?></div>
								</a>
							</li>
							
							<?php
							
						}
						
					}else{
						
						echo '<li><div class="alert alert-warning">Hiç Mesajınız Bulunmuyor</div>';
						
					}
					
					
					?>
					
                        
                        <li>
                            <a class="text-center" href="?do=mesajlar">
                                <strong>Tüm Mesajları Görüntüle</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="?do=profil_duzenle&id=<?php echo $_SESSION["id"];?>"><i class="fa fa-gear fa-fw"></i> Ayarlar</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/admin/?do=cikis"><i class="fa fa-sign-out fa-fw"></i> Çıkış</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> AnaSayfa</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Genel<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
                                    <a href="?do=slider">Slider</a>
                                </li>
							   <li>
                                    <a href="?do=sayfalar">Sayfalar</a>
                                </li>
							   <li>
                                    <a href="?do=urunler">Ürünler</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="?do=mesajlar"><i class="fa fa-comments fa-fw"></i> Mesajlar</a>
                        </li>
                        <li>
                            <a href="?do=referanslar"><i class="fa fa-arrow-right fa-fw"></i> Referanslar</a>
                        </li>
                        <li>
                            <a href="?do=firma"><i class="fa fa-table fa-fw"></i> Firma Bilgileri</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Ayarlar<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/admin/?do=ayarlar">Site Ayarlar</a>
                                </li>
							    <li>
                                    <a href="/admin/?do=iletisim">İletişim Ayarları</a>
                                </li>
							    <li>
                                    <a href="/admin/?do=mail">Mail Ayarları</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        
       <?php 
	   
	   $do = @g("do");
	    
	    if(file_exists("inc/".$do.".php")){
			
			include("inc/".$do.".php");
			
		}else { 
		
		 include("inc/anasayfa.php");
		
		}
	   
	   
	   ?>
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   

    </div>