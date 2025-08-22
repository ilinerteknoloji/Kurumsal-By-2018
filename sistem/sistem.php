<?php

	require("fonksiyon.php");
	
	function sayfa_menu(){
		
		global $db;
		
		$query = $db->prepare("select * from sayfalar where sayfa_durum=?");
		$query->execute(array(1));
		$liste = $query->fetchALL(PDO::FETCH_ASSOC);
		$kontrol = $query->rowcount();
		
		if($kontrol){
			
			foreach($liste as $row){
			
			echo '<li><a href="/'.$row["sayfa_link"].'.html">'.$row["sayfa_adi"].'</a></li>';
			
			}
			
		}else{
			return false;
		}
		
	}
	
	function sayfa_icerik(){
		
		global $db;
		
		$do = @g("do");
		
		switch($do){
			
			case "sayfa":
			require(tema."/sayfalar.php");
			break;
			
			case "urunler":
			require(tema."/urunler.php");
			break;
			
			case "urun_cek":
			require(tema."/urun_cek.php");
			break;
			
			case "iletisim":
			
			$query = $db->prepare("select * from iletisim");
			$query->execute(array());
			$row = $query->fetch(PDO::FETCH_ASSOC);
			
			$email = $row["email"];
			$telefon = $row["telefon"];	
			$ilce = $row["ilce"];
			$site = $row["site"];
			
			
			
			require(tema."/iletisim.php");
			break;
			
			default:
			require(tema."/default.php");
			break;
			
		}
		
	}
	
	
	function iletisim(){
		
		global $db;
	
	
	 if($_POST){
		 
		 	$query = $db->prepare("select * from iletisim");
			$query->execute(array());
			$row = $query->fetch(PDO::FETCH_ASSOC);
		 
		  $isim   = p("isim",true);
		  $email  = p("email",true);
		  $konu = p("konu",true);
		  $mesaj  = p("mesaj",true);
		  
		  if(!$isim || !$email || !$konu || !$mesaj){
			  
			  echo '<div class="alert alert-warning col-md-6">Gerekli Alanları Doldurmalısınız ...</div>';
			  
		  }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			  
    echo '<div class="alert alert-danger col-md-6">Doğru Bir E-Mail Adresi Giriniz..</div>';

			  
		  }else {
			  
			  
			include("mail/PHPMailerAutoload.php");
			
            $mail = new PHPMailer;            
 			
			$mail->IsSMTP();
			//$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = $row["mail_baglanti"]; // Güvenli baglanti icin ssl normal baglanti icin tls
			$mail->Host = $row["mail_host"]; // Mail sunucusuna ismi
			$mail->Port = $row["mail_port"]; // Gucenli baglanti icin 465 Normal baglanti icin 587
			$mail->IsHTML(true);
			$mail->SetLanguage("tr", "phpmailer/language");
			$mail->CharSet  ="utf-8";
			$mail->Username = $row["mail_adresi"]; // Mail adresimizin kullanicı adi
			$mail->Password = $row["mail_sifre"]; // Mail adresimizin sifresi
			$mail->SetFrom($row["mail_gonderen"],$isim); // Mail attigimizda gorulecek ismimiz
			$mail->AddAddress($row["email"]); // Maili gonderecegimiz kisi yani alici
			$mail->addReplyTo($email, $isim);
			$mail->Subject = $konu; // Konu basligi
			$mail->Body = "<div style='background:#eee;padding:5px;margin:5px;width:300px;'>Gonderen : ".$isim." </div><div style='background:#eee;padding:5px;margin:5px;width:300px;'> E-Posta : ".$email."</div> <br /> Mesaj : <br />".$mesaj; // Mailin icerigi
			if(!$mail->Send()){

				
				echo '<div class="alert alert-danger col-md-6">Mesajınız Gönderilirken Bir Hata Oluştsu...</div>';
				

				
				//echo "Mailer Error: ".$mail->ErrorInfo;
			}else {
				
				$insert = $db->prepare("insert into mesajlar set 
				
					mesaj_gonderen=?,
					mesaj_konu=?,
					mesaj_eposta=?,
					mesaj_aciklama=?
				
				");
				
				$ok = $insert->execute(array($isim,$konu,$email,$mesaj));
				
				if($ok){
				
					echo '<div class="alert alert-success col-md-6">Mesaj Başarılı Bir Şekilde Gönderildi</div>';
					}
				else{
					echo '<div class="alert alert-danger col-md-6">Mesajınız Kayıt Edilirken Hata Oluştu....</div>';
				}
				
			}
		}
	}
		
		
	}

	function referanslar(){
	
	global $db;
	
	$query = $db->query("select * from referanslar order by referans_id desc")->fetchALL(PDO::FETCH_ASSOC);
	
	foreach($query as $row){
		
		?>
		<button type="button" class="btn btn-default">
		<div class="slide"><img src="<?php echo $row["referans_resim"];?>" width="200" height="110" alt="<?php echo $row["referans_aciklama"];?>" title="<?php echo $row["referans_aciklama"];?>"></div>
		</button>
		<?php
		
	}
	
}
	
	function sayi($konu){
		
		global $db;
		
		$query = $db->prepare("select * from {$konu}");
		$query->execute(array());
		$query->fetchALL(PDO::FETCH_ASSOC);
		$say = $query->rowcount();
		
		echo $say;
		
	}
	
	function firma(){
		global $db;
		
		$query = $db->query("select * from firma")->fetchALL(PDO::FETCH_ASSOC);
		
		foreach($query as $row){
			
			if($row["firma_durum"] == 1){
			
			?>
		<div class="film" style="<?php echo $row["firma_id"] == 2 ? 'float:right;' : null;?>"> 
				 <h2><?php echo $row["firma_bilgi"];?></h2>
				 <p style="padding-right:100px;"> 
				 <?php echo $row["firma_aciklama"];?>
				 </p>
				 </div>
			
			<?php
			}
			else{
				

			}
			
		}
	}
	
	function menu_alt(){
		
		global $db;
		
		$query = $db->prepare("select * from sayfalar where sayfa_durum=?");
		$query->execute(array(1));
		$liste = $query->fetchALL(PDO::FETCH_ASSOC);
		$kontrol = $query->rowcount();
		
		if($kontrol){
			
			foreach($liste as $row){
			
			echo '<li><a href="/'.$row["sayfa_link"].'.html">'.$row["sayfa_adi"].'</a></li>';
			
			}
			
		}else{
			return false;
		}
		
	}
	
?>