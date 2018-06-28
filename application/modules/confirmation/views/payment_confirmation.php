<?php
$shop_name = $this->db->get_where('settings' , array('type'=>'shop_name'))->row()->description;
$shop_phone = $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;
$shop_address = $this->db->get_where('settings' , array('type'=>'address'))->row()->description;
$shop_email = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
$system_logo = $this->db->get_where('settings' , array('type'=>'logo'))->row()->description;
?>

<style type="text/css">
	section#content {
		min-height: 150px;
		padding-top: 10px;
	}
	.required {
        color: red;
        font-size: 14px;
    }

    .opsi {
    	font-size: 9px;
    	font-style: italic;
    	text-transform: lowercase;
    }

    .keterangan {
    	color: red;
        font-size: 14px;
        font-style: italic;
    }
</style>

<div class="col-md-12">
	<section id="content">
		<div class="global-map-area promo-box parallax" data-stellar-background-ratio="0.5" style="background-position: 50% 45.5px;">
	        <div class="container">
	            <div class="content-section description col-sm-12" style="height: 273px;">
	                <div class="table-wrapper hidden-table-sm" style="height: 100%;">
	                    <div class="table-cell col-sm-12">
	                        <h2 class="m-title" style="margin-left: 30px;">
	                            Konfirmasi Pembayaran
	                        </h2>
	                    </div>
	                    
	                </div>
	            </div>
	            
	        </div>
	    </div>
	</section>
</div>

<!-- alert -->
<?php 
if (isset($flash)) {
	echo $flash;
}
?>

<div id="main" class="col-sm-8 col-md-9">
    <div class="booking-information travelo-box">
        <?php
	    echo form_open_multipart('confirmation/add_confirm');
	    ?>

	    <!-- order id -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Order ID<span class="required">*</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <input type="text" class="input-text full-width" name="order_id" value="">
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('order_id'); ?></span>
            </div>
        </div>

        <!-- tanggal transaksi -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Tgl Transaksi<span class="required">*</span></label>
            </div>
            <div class="col-sms-4 col-sm-4">
            	<div class="form-group">
                    <div class="datepicker-wrap">
                        <input type="text" placeholder="Tgl Transaksi" name="tgl_transaksi" class="input-text full-width" />
                    </div>
                </div>
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('tgl_transaksi'); ?></span>
            </div>
        </div>

	    <!-- nama -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Nama Pengirim<span class="required">*</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <input type="text" class="input-text full-width" name="nama" value="">
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('nama'); ?></span>
            </div>
        </div>

        <!-- nama -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>No Rekening<span class="required">*</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <input type="text" class="input-text full-width" id="rekening" name="no_rek" value="">
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('no_rek'); ?></span>
            </div>
        </div>

        <!-- jumlah ditransfer -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Jumlah Ditransfer<span class="required">*</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <input type="text" class="input-text full-width" name="jml_transfer" value="">
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('jml_transfer'); ?></span>
            </div>
        </div>

        <!-- bank -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Pembayaran ke Bank<span class="required">*</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
            	
            	<div class="selector" style="display: flex; align-items: center;">
                    <?php 
                    $additional_dd_code = 'class="full-width"';
                    $jenis_bank = array('' => 'Please Select',);
                    foreach ($banks->result_array() as $row) {
                        $jenis_bank[$row['id']] = $row['title'];   
                    }
                    echo form_dropdown('bank', $jenis_bank, '', $additional_dd_code);
                    ?> 
                    <span class="custom-select full-width">Nama Bank</span>
                </div>
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('bank'); ?></span>
            </div>
        </div>

        <!-- email -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Email<span class="required">*</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <input type="text" class="input-text full-width" name="email" value="">
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('email'); ?></span>
            </div>
        </div>

        <!-- bukti tranfer -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
                <label>Bukti Transfer<span class="opsi"> (opsional)</span></label>
            </div>
            <div class="col-sms-7 col-sm-7">
                <div class="fileinput full-width" style="line-height: 34px;">
                    <input type="file" class="input-text" name="bukti" data-placeholder="pilih gambar"><input type="text" class="custom-fileinput input-text" placeholder="pilih gambar">
                </div>
                <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('bukti'); ?></span>
            </div>
        </div>

        <hr>
        <!-- button -->
        <div class="row form-group">
            <div class="col-sms-2 col-sm-2">
            </div>
            <div class="col-sms-7 col-sm-7">
                <button type="submit" class="btn-medium pull-right" name="submit" value="Submit">KIRIM</button>
            </div>
        </div>

        <span class="keterangan">* wajib diisi</span>
	    <?= form_close() ?> 
    </div>
</div>

<div class="sidebar col-sm-4 col-md-3">
    <div class="travelo-box contact-box">
        <h4>Butuh Bantuan WIKLAN?</h4>
        <p>Kami akan dengan senang hati membantu Anda. Tim kami siap melayani Anda 24/7 (Respon Cepat 24 Jam).</p>
        <address class="contact-details">
            <span class="contact-phone"><i class="soap-icon-phone"></i> <?= $shop_phone ?></span>
            <br>
            <a class="contact-email" href="#"><?= $shop_email ?></a>
        </address>
    </div>
</div>



<script>
	
// only number input
tjq("#rekening").keypress(validateNumber);

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
</script>