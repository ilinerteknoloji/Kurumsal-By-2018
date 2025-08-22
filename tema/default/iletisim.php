	   <div class="icerikler"> 
	    		
	  <div class="aciklama"> 
	 
	 <div class="iletisim"> 
	       
		        <div class="container" style=" font-size:19px; padding:5px; width:200px;">
                            <h2>İletişim Bilgilerimiz</h2>
                          </div>
						  <hr>
						  <div class="detaylar"><br>
						  <img src="https://i.hizliresim.com/X6NEjR.png" style="margin-top:-28px;">
                            <span style="color:black; font-size:17px; font-weight:bold; margin-top:-28px;"><?php echo $telefon;?><br><br></span>
                            <span style="color:black; font-size:17px; font-weight:bold; margin-top:-28px;"><?php echo $email;?><br><br></span>
                            <span style="color:black; font-size:17px; font-weight:bold;"><?php echo $ilce;?><br><br></span>
                            <span style="color:black; font-size:17px; font-weight:bold;"><a href="#"><?php echo $site;?></a></span>
							</div>
	 
	 
	 </div>
	 
		<!--- iletisim ---->

    <div class="container">
	<?php 
	
	 iletisim();
	
	
	
	?>
	<div class="row">
      <div class="col-md-6 col-md-offset-0">
        <div class="well well-sm">
          <form class="form-horizontal" action="" method="post">
          <fieldset>
            <legend style="font-size:18px;padding:6px;" class="text-center">İletişim</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Adınız</label>
              <div class="col-md-9">
                <input id="name" name="isim" type="text" placeholder="Adınız" class="form-control">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">E-Mail:</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Mail Adresiniz" class="form-control">
              </div>
            </div>
			 <div class="form-group">
              <label class="col-md-3 control-label" for="baslik">Konu:</label>
              <div class="col-md-9">
              <input id="konu" name="konu" type="text" placeholder="Konu" class="form-control">
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Mesaj:</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="mesaj" placeholder="Mesaj ..." rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg">Gönder</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>
		
		<!---bitis iletisim-->	 
	 
	 
	 
	 
	  
	  </div>
	   
	   </div>