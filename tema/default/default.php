	 <div class="slider"> 
	  
	  <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
	<?php
	
	slider();
	
	?>
		
	</ul></div>
	<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="<?php echo tema_url;?>/engine1/wowslider.js"></script>
	<script type="text/javascript" src="<?php echo tema_url;?>/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
	  
	 
	 </div>
	 
		
		 	 <div class="urunler"> 
			  <marquee>
	 <?php 
	 

	 require(tema."/urun_cek2.php"); 
	 
	 
	 ?>	 
	 </marquee>
	 	 </div>

	 
	

	 <?php 
	 

	 require(tema."/firma.php"); 
	 
	 
	 ?>
	 
	 
	 <div class="referanslar"> 
	 <center><h2>Ortak Çalıştığımız Firmalar</h2></center>

		<div class="slider6">
		<?php referanslar();?>
		</div>
	  
	  