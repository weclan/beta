<?php
$shop_name = $this->db->get_where('settings' , array('type'=>'shop_name'))->row()->description;
$shop_phone = $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;
$shop_address = $this->db->get_where('settings' , array('type'=>'address'))->row()->description;
$shop_kodepos = $this->db->get_where('settings' , array('type'=>'kodepos'))->row()->description;
$shop_wa = $this->db->get_where('settings' , array('type'=>'WA'))->row()->description;
$shop_email = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
$system_logo = $this->db->get_where('settings' , array('type'=>'logo'))->row()->description;
$shop_logo = base_url().'marketplace/logo/'.$system_logo;
$homepage_bg = $this->db->get_where('settings' , array('type'=>'homepage_background'))->row()->description;
// for meta SEO
$meta_author = $this->db->get_where('settings' , array('type'=>'author'))->row()->description;
$meta_keyword = $this->db->get_where('settings' , array('type'=>'keyword'))->row()->description;
$meta_description = $this->db->get_where('settings' , array('type'=>'description'))->row()->description;

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Approval</title>
  <style type="text/css">
  body {
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   margin:0 !important;
   width: 100% !important;
   -webkit-text-size-adjust: 100% !important;
   -ms-text-size-adjust: 100% !important;
   -webkit-font-smoothing: antialiased !important;
 }
 .tableContent img {
   border: 0 !important;
   display: block !important;
   outline: none !important;
 }
 a{
  color:#382F2E;
}

p, h1,h2,ul,ol,li,div{
  margin:0;
  padding:0;
}

h1,h2{
  font-weight: normal;
  background:transparent !important;
  border:none !important;
}

@media only screen and (max-width:480px)
		
{
		
table[class="MainContainer"], td[class="cell"] 
	{
		width: 100% !important;
		height:auto !important; 
	}
td[class="specbundle"] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:15px !important;
	}	
td[class="specbundle2"] 
	{
		width:80% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:10px !important;
		padding-left:10% !important;
		padding-right:10% !important;
	}
		
td[class="spechide"] 
	{
		display:none !important;
	}
	    img[class="banner"] 
	{
	          width: 100% !important;
	          height: auto !important;
	}
		td[class="left_pad"] 
	{
			padding-left:15px !important;
			padding-right:15px !important;
	}
		 
}
	
@media only screen and (max-width:540px) 

{
		
table[class="MainContainer"], td[class="cell"] 
	{
		width: 100% !important;
		height:auto !important; 
	}
td[class="specbundle"] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:15px !important;
	}	
td[class="specbundle2"] 
	{
		width:80% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:10px !important;
		padding-left:10% !important;
		padding-right:10% !important;
	}
		
td[class="spechide"] 
	{
		display:none !important;
	}
	    img[class="banner"] 
	{
	          width: 100% !important;
	          height: auto !important;
	}
		td[class="left_pad"] 
	{
			padding-left:15px !important;
			padding-right:15px !important;
	}
		
}

.contentEditable h2.big,.contentEditable h1.big{
  font-size: 26px !important;
}

 .contentEditable h2.bigger,.contentEditable h1.bigger{
  font-size: 37px !important;
}

td,table{
  vertical-align: top;
}
td.middle{
  vertical-align: middle;
}

a.link1{
  font-size:13px;
  color:#27A1E5;
  line-height: 24px;
  text-decoration:none;
}
a{
  text-decoration: none;
}

.link2{
color:#ffffff;
border-top:10px solid #27A1E5;
border-bottom:10px solid #27A1E5;
border-left:18px solid #27A1E5;
border-right:18px solid #27A1E5;
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;
background:#27A1E5;
}

.link3{
color:#555555;
border:1px solid #cccccc;
padding:10px 18px;
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;
background:#ffffff;
}

.link4{
color:#27A1E5;
line-height: 24px;
}

h2,h1{
line-height: 20px;
}
p{
  font-size: 14px;
  line-height: 21px;
  color:#AAAAAA;
}

.contentEditable li{
 
}

.appart p{
 
}
.bgItem{
background: #ffffff;
}
.bgBody{
background: #ffffff;
}

img { 
  outline:none; 
  text-decoration:none; 
  -ms-interpolation-mode: bicubic;
  width: auto;
  max-width: 100%; 
  clear: both; 
  display: block;
  float: none;
}

ul.tips {
	list-style-type: decimal;
	font-size: 14px;
    line-height: 21px;
    color: #AAAAAA;
    margin-left: 20px;
}

/****************button********************/
.btn-success {
    color: #fff;
    background-color: #34bfa3;
    border-color: #34bfa3;
}
.btn-success {
    color: #fff;
    background-color: #34bfa3;
    border-color: #34bfa3;
}
.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.65rem 1.25rem;
    font-size: 1rem;
    line-height: 1.25;
    transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}	

</style>


<script type="colorScheme" class="swatch active">
{
    "name":"Default",
    "bgBody":"ffffff",
    "link":"27A1E5",
    "color":"AAAAAA",
    "bgItem":"ffffff",
    "title":"444444"
}
</script>


</head>
<body paddingwidth="0" paddingheight="0" bgcolor="#d1d3d4"  style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;" offset="0" toppadding="0" leftpadding="0">

  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  		<tbody>
    		<tr>
      			<td>
      				<table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" style="font-family:helvetica, sans-serif;" class="MainContainer">
      <!-- =============== START HEADER =============== -->
  						<tbody>
    						<tr>
      							<td>
      								<table width="100%" border="0" cellspacing="0" cellpadding="0">
  										<tbody>
    										<tr>
      											<td valign="top" width="20">&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td class="movableContentContainer">
      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="15"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="60"><img src="<?= base_url() ?>assets/images/logo_wiklan.png" alt="Logo" title="Logo" width="150" height="60" data-max-width="100"></td>
      <td width="10" valign="top">&nbsp;</td>
      
    </tr>
  </tbody>
</table>
</td>
      <td valign="top" width="90" class="spechide">&nbsp;</td>
      <td valign="middle" style='vertical-align: middle;' width='150'>
          <div class='contentEditableContainer contentTextEditable'>
            <div class='contentEditable' style='text-align: right; font-size: 16px; font-weight: bold; color: #AAAAAA;'>
            	
            </div>
          </div>
        </td>
    </tr>
  </tbody>
</table></td>
    </tr>
    <tr>
       <td height='5'></td>
    </tr>
    <tr>
       <td ><hr style='height:1px;background:#DDDDDD;border:none;'></td>
     </tr>
  </tbody>
</table>
    </div>
      <!-- =============== END HEADER =============== -->
<!-- =============== START BODY =============== -->
 
<?php
$client = Client::view_by_id($user_id);  
?>      
    
  
    
   
<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height='20'></td>
    </tr>
    <tr>
      <td style=""><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="40">&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr><td height='25'></td></tr>
                      <tr>
                        <td>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style=''>
                            	<p>Hai <?= ucwords($client->username) ?> - <?= $client->company ?></p>
                            	<br>
                            	<p>Terima kasih banyak telah menggunakan layanan Wiklan. silahkan berikan ulasan pada lokasi media iklan yang telah Anda sewa!</p>
                            	<br>
                            	
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr><td height='24'></td></tr>
                    </table></td>
      <td valign="top" width="40">&nbsp;</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>

      
      
      </div>    
      

    <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height='20'></td>
    </tr>
    <tr>
      <td style="background: #f6f6f6; border: 1px solid #EEEEEE;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="40">&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr><td height='25'></td></tr>
                      <tr>
                        <td>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style='text-align: center;'>
                              <a href="<?= base_url() ?>review/ulas_lokasi/<?= $email ?>/<?= $code ?>/<?= $prod_code ?>" class="btn btn-success">Ulas Lokasi Sekarang</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr><td height='24'></td></tr>
                    </table></td>
      <td valign="top" width="40">&nbsp;</td>
    </tr>
  </tbody>
</table></td>
    </tr>
    <tr>
       <td height='5'></td>
    </tr>
    <tr>
       <td ><hr style='height:1px;background:#DDDDDD;border:none;'></td>
     </tr>
  </tbody>
</table>

      
      
      </div>


<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height='20'></td>
    </tr>
    <tr>
      <td style=""><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="40">&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr><td height='25'></td></tr>
                      <tr>
                        <td>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style=''>
                            	<p><b>INFO</b></p>
                            	<p>Ulasan yang kamu berikan akan membantu calon penyewa yang lain</p>
                            	<br>
                            	<p>Ulasan yang baik</p>
                            	<ul class="tips">
                            		<li>Ceritakan pengalamanmu menyewa lokasi media iklan ini.</li>
                            		<li>Sebutkan apa yang kamu suka/tidak dari lokasi media iklan ini.</li>
                            	</ul>
                            	<p>Hindari</p>
                            	<ul class="tips">
                            		<li>Menuliskan konten/informasi yang tidak berkaitan dengan lokasi media iklan.</li>
                            		<li>Memberikan komentar yang tidak relevan atau bersifat memprovokasi.</li>
                            	</ul>

                            	
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr><td height='24'></td></tr>
                    </table></td>
      <td valign="top" width="40">&nbsp;</td>
    </tr>
  </tbody>

</table></td>
    </tr>
    <tr>
       <td height='5'></td>
    </tr>
    <tr>
       <td ><hr style='height:1px;background:#DDDDDD;border:none;'></td>
     </tr>
    <tr>
    	<td>
    		<div class='contentEditableContainer contentTextEditable'>
                <div class='contentEditable' style=''>
		        	<div style="text-align: center;">
		        		<p>Harap jangan membalas e-mail ini, karena e-mail ini dikirimkan secara otomatis oleh sistem.</p>
		        	</div>
		        </div>
		    </div>
    	</td>
    </tr>
    <tr>
       <td ><hr style='height:1px;background:#DDDDDD;border:none;'></td>
     </tr>
  </tbody>
</table>
      
      
      </div>    


      <!-- <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
            <tr><td height='40' colspan="3"></td></tr>
                <tr><td colspan="3"><hr style='height:1px;background:#DDDDDD;border:none;'></td></tr>
          </tbody>
        </table>
      </div> -->
      
      <!-- =============== END BODY =============== -->
<!-- =============== START FOOTER =============== -->

      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="48"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td valign="top" width="90" class="spechide">&nbsp;</td>
      <td><table width="100%" cellpadding="0" cellspacing="0" align="center">
                      <tr>
                        <td>
                          <div class='contentEditableContainer contentTextEditable'>
                            <div class='contentEditable' style='text-align: center;color:#AAAAAA;'>
                              <p>
                              <span style="font-weight: bold; font-size: 16px;"><?= $meta_author ?></span> <br/>
                              <?= $shop_address ?> <br/>
                              <?= $shop_phone ?> - <?= $shop_wa ?> <br/>
                              <?= $shop_email ?> <br/>
                              </p>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table></td>
      <td valign="top" width="90" class="spechide">&nbsp;</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>
      
      
      </div>

      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  		<tbody>
		    <tr>
		      <td height="48"></td>
		    </tr>
		</tbody>
	</table>
</div>
     
      </td>
    </tr>
  </tbody>
</table>
</td>
      <td valign="top" width="20">&nbsp;</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>

  </body>
  </html>
