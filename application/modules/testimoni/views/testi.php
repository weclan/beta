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

    @media only screen and (max-width: 400px) {
        .global-map-area {
            margin-top: 20px;
        }
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
		
<div id="main" class="col-sm-8 col-md-9">
    <div class="tab-container">
       
        <div class="tab-content">

            <!-- VENDOR PENGURUSAN & PERIJINAN -->
            <div class="tab-pane fade in active">
               
            	<?php
			    echo form_open_multipart('manage_testimoni/create');
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
		                    <label>Profil Anda</label>
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
		                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="testimoni"></textarea>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('testimoni'); ?></span>
		                </div>
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
  	return ((key >= 65 && key <= 90) || key == 8 || key == 32 || (key >= 188 && key <= 190) || key == 222);
};

</script>