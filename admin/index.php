<?php define("admin",true);?>

<?php include("../sistem/ayar.php");?>
<?php include("../sistem/sistem.php");?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Paneli</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php

if(@$_SESSION["login"]){
	require("inc/default.php");
}else{
	?>
	    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Yönetici Girişi</h3>
                    </div>
                    <div class="panel-body">
					<?php
					
					if($_POST){
						
						$isim = p("isim");
						$sifre = md5(p("sifre"));
						
						if(!$isim || !$sifre){
							
							echo '<div class="alert alert-warning">Kullanıcı Adı Veya Şifre Boş Bırakılmaz</div>';
							
						}else{
							
							$query = $db->prepare("select * from uyeler where uye_adi=? and uye_sifre=?");
							$query->execute(array($isim,$sifre));
							$row = $query->fetch(PDO::FETCH_ASSOC);
							$kontrol = $query->rowCount();
							
							if($kontrol){
								
								$_SESSION["login"] = true;
								$_SESSION["uye"] = $row["uye_adi"];
								$_SESSION["id"] = $row["uye_id"];
								$_SESSION["rutbe"] = $row["uye_rutbe"];
								
								header("location:/admin/");
								
							}else{
								echo '<div class="alert alert-danger">Kullanıcı Adı Veya Şifre Yanlış</div>';
							}
							
							
						}
						
					}
					
					
					?>
                        <form action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Kullanıcı Adı" name="isim" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Şifre" name="sifre" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Giriş</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php
}

?>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
