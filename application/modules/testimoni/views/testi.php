<?php
$shop_name = $this->db->get_where('settings' , array('type'=>'shop_name'))->row()->description;
$shop_phone = $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;
$shop_address = $this->db->get_where('settings' , array('type'=>'address'))->row()->description;
$shop_email = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
$system_logo = $this->db->get_where('settings' , array('type'=>'logo'))->row()->description;

$vendor_form_location = base_url().'vendor/add_vendor';
?>

<style type="text/css">
	section#content {
        min-height: 200px;
        padding-top: 10px;
    }
    .global-map-area-grey {
        background-color: rgb(245,245,245); 
    }
    .global-map-area-dark-grey {
        background-color: rgb(242, 242, 242);
    }
    .global-map-area-soft-black {
        background: #252d33;
        color: #fff;
    }
    .global-map-area-white {
        background: #fff;
    }
    .global-map-area-red {
        background: #db3238;
        color: #fff;
    }
    .global-map-area-white-dark {
        background: rgba(0,0,0,0.01);
    }
    .tebal {
        font-weight: 800;
    }
    #pembayaran {
        *font-family: "Open Sans";
    }

    #pembayaran h3 {
        font-weight: 200;
        font-size: 32px;
        margin-bottom: 40px;
    }

    #pembayaran p, #pembayaran li {
        opacity: .65;
        color: #3f4047;
        font-weight: 400;
        font-size: 16px;
        margin: 20px 0;
    }

    .description {
        text-transform: none;
        font-size: 14px;
        text-align: justify;
    }
    span.description {
        display: block;
        line-height: 30px;
    }
    ul.cek-profil, ul.klik-purchase {
        margin-left: 20px;
        list-style: square outside none;
    }
    #justify {
        text-align: justify !important;
    }
    .ikon img{
        width: 100px;
    }
    .description2 {
        text-transform: none;
        font-size: 14px;
    }
    h4.box-title {
        font-size: 18px;
        font-weight: bold;
    }

	.contact-box p {
		text-align: justify;
	}

	.required {
        color: red;
        font-size: 14px;
    }

    .keterangan {
    	color: red;
        font-size: 14px;
        font-style: italic;
    }

    #leftCount {
        color: red;
    }

    @media only screen and (max-width: 400px) {
        .global-map-area {
            margin-top: 20px;
        }

        .imagebg-container {
            *width: 200px;

        }
    }

    .description span {
        font-style: italic;
    }


</style>

<!-- alert -->
	<div class="col-md-12">
		<?php 
		if (isset($flash)) {
			echo $flash;
		}
		?>
	</div>
		
<div class="row" style="margin-top: -10px;">
    <div class="row">
        <div class="row">
            <div class="row">
                <div class="row">
                    <div class="row">

                        <div class="banner2 imagebg-container" style="background-color: #ddd; height: 350px; background-image: url('<?= base_url() ?>marketplace/images/testimonials.png');">
                            <div class="container">
                                <!-- <h1 class="big-caption">Coverage for every step of <em><strong>your</strong></em> journey!</h1>
                                <h2 class="med-caption">We all know the unexpected can occur, even when you are travelling.</h2> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>  
        </div> 
    </div>  
</div>        

<br>
<br>            

<div id="main" class="col-sm-8 col-md-9">

    <div class="row">
        <?php foreach ($testimoni->result() as $testi) : ?>
            <div class="col-sm-6">
                <div class="icon-box style7 box" style="max-height: 260px;">
                    <div class="col-xs-12 col-sm-2 col-md-2">
                        <div style="width: 80px;">
                            <img src="<?= base_url() ?>marketplace/images/default_v3-usrnophoto1.png" class="img-circle img-responsive">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-10 col-md-10">
                        <div class="description">
                            <h5 class="box-title" style="font-weight: bold;"><?= $testi->nama ?></h5>
                            <span><strong>"</strong><?= $testi->testimoni ?><strong>"</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

        
    </div>

    <?php 
    if (isset($flash)) {
        echo $flash;
    }
    ?>
    
    <div class="tab-container">
       
        <div class="tab-content">

            <!-- VENDOR PENGURUSAN & PERIJINAN -->
            <div class="tab-pane fade in active">
               <h3>Kirim Testimoni</h3>
            	<?php
			    echo form_open_multipart('testimoni/submit_testimoni');
			    ?>
            		<input type="hidden" name="status" value="0">
		            <!-- nama -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Nama Lengkap<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="nama" onkeydown="return alphaOnly(event);" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('nama'); ?></span>
		                </div>
		            </div>

		              <!-- profil -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Profesi</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="profil" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('profil'); ?></span>
		                </div>
		            </div>


		            <!-- email -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Email<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="email" class="input-text full-width" name="email" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('email'); ?></span>
		                </div>
		            </div>

		          
		          
		            <!-- testimoni -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Testimoni<span class="required">*</span></label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <textarea type="text" id="myText" class="input-text full-width" style="height: 100px;" name="testimoni"></textarea>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('testimoni'); ?></span>
		                </div>
                        <span id="leftCount">200</span> karakter tersisa
		            </div>

		           
		            <hr>

		            <!-- button -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <button type="submit" class="btn-medium pull-right" name="submit" value="Submit">SIMPAN TESTIMONI</button>
		                </div>
		            </div>
		            <span class="keterangan">* wajib diisi</span>
		        </form>

            </div>

        </div>
    
    </div>
</div>

<div class="sidebar col-sm-4 col-md-3">
     <?= Modules::run('templates/need_help') ?>
</div>


<script>
// only number input
tjq("#telp1, #telp2, #telp3").keypress(validateNumber);

function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
        return true;
    }
};

// only alpha input
// tjq("#telp1, #telp2, #telp3").keypress(alphaOnly);

function alphaOnly(event) {
  	var key = event.keyCode;
  	// if (event.keyCode === 8 || event.keyCode === 46) {
   //      return true;
   //  } else if ( key >= 65 && key <= 90 ) {
   //      return false;
   //  } else {
   //      return true;
   //  }
  	return ((key >= 65 && key <= 90) || key == 8 || key == 9 || key == 32 || (key >= 188 && key <= 190) || key == 222);
};

var myText = document.getElementById("myText");
var leftCount = document.getElementById("leftCount");
var limitNum = 200;

myText.addEventListener("keyup", function() {
    var characters = myText.value.split('');
    if (characters.length > limitNum) {
        myText.value = myText.value.substring(0, limitNum);
    } else {
        leftCount.innerText = limitNum - characters.length;
    }
})

</script>