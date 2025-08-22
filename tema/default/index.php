<?php

			$query = $db->prepare("select * from iletisim");
			$query->execute(array());
			$row = $query->fetch(PDO::FETCH_ASSOC);
			
			$query = $db->prepare("select * from ayarlar");
			$query->execute(array());
			$liste = $query->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>

	<meta content='<?php echo $liste["site_aciklama"];?>' name='description'/>
	<meta content='<?php echo $liste["site_anahtar"];?>' name='keywords'/>

	<meta charset="UTF-8">
	<title><?php echo $liste["site_baslik"];?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
	<link rel="stylesheet" type="text/css" href="<?php echo tema_url;?>/engine1/style.css" />
	<script type="text/javascript" src="<?php echo tema_url;?>/engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->


	<link rel="stylesheet" href="<?php echo tema_url;?>/css/bootstrap-social.css" />	
	<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo tema_url;?>/css/styles.css" />
	<link rel="stylesheet" href="<?php echo tema_url;?>/css/reset.css" />
	<script src="<?php echo tema_url;?>/js/jquery.bxslider.min.js"></script>
 <!-- bxSlider CSS file -->
   <link href="<?php echo tema_url;?>/css/jquery.bxslider.css" rel="stylesheet" />
	<script type="text/javascript"> 
	
		$(document).ready(function(){
		$('.slider6').bxSlider({
		slideWidth: 1300,
		minSlides: 4,
		maxSlides: 3,
		startSlide: 2,
		slideMargin: 2
		});
		});
	
	
	
	</script>
</head>
<body>
	 
	 <header> 
	 <div class="logo"> 
	 <img src="<?php echo tema_url;?>/images/logo.png" width="180"   alt="" />
	 </div>
	 <ul> 
	 <li><a href="/">Anasayfa</a></li>
	<?php sayfa_menu();?>
	 <li><a href="/?do=urun_cek">Ürünlerimiz</a></li>
	 	 <li><a href="/iletisim">İletişim</a></li>
	 </ul>
	 
	 </header>
	 
	 
	 <div class="genel"> 
	 
	 <?php sayfa_icerik();?>

	 
	 </div>
	 
	 
	 
	 </div>
	 
	 <footer> 
	 
	 <div class="footer"> 
	 
	 <nav> 
	 <ul> 
	 <li><a href="/">Anasayfa</a></li>
		 <li><a href="/?do=urun_cek">Ürünlerimiz</a></li>
	 <li><a href="/iletisim">İletişim</a></li>
	 </ul>
	 </nav>
	 <div style="clear:both;"></div>
	 <hr />
	 <p> 
	<?php echo $row["adres"];?>
	 </p>
	 <hr />
	 
	 </div>
	 
	 <div class="sosyal"> 
     <h2>Bizi Takip Edin</h2>
		<a class="btn btn-social-icon btn-facebook" target="_blank" href="<?php echo $row["facebook"];?>">
		<span class="fa fa-facebook"></span>
		</a>
		<a class="btn btn-social-icon btn-twitter" target="_blank" href="<?php echo $row["twitter"];?>">
		<span class="fa fa-twitter"></span>
		</a>
		<a class="btn btn-social-icon btn-instagram" target="_blank" href="<?php echo $row["instagram"];?>">
		<span class="fa fa-instagram"></span>
		</a>
	 </div>
	
	 </footer>
	 <center><div class="firma" style="line-height:30px;">Copyright © 2018 Tüm Hakları Saklıdır. <a href="https://ilinerteknoloji.com/index.php">Iliner Teknoloji</a></div>
	 
	 
	 <div style="margin-bottom:10px;"></div>
	 
	 
</body>
</html>