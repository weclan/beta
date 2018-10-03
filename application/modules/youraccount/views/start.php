
<?php $home_location = base_url().'templates/home'; ?>
<?php $form_location = base_url().'youraccount/submit'; ?>
<?php $login_page = base_url().'youraccount/login'; ?>
<?php $kebijakan_location = base_url().'templates/kebijakan_privasi';?>
<?php $syarat_location = base_url().'templates/syarat_dan_ketentuan';?>

<style>
    .focus-input100 {
        color: red;
        font-style: italic;
        font-size: 10px;
    }
    .info {
        color: red;
        font-style: italic;
        font-size: 10px;
        color: #ff6000;
    }
    .text-bahaya {
        color: red;
    }
</style>

<div class="container">
    <div class="row">

        <!-- alert -->
                <?php 
                if (isset($flash)) {
                    echo $flash;
                }
                ?>

    	<div class="col-sms-6 col-sm-6 col-md-6">
        	<div class="center pad-6">
        		<div>
        			<a href="<?= base_url() ?>"><img src="<?php echo base_url(); ?>LandingPageFiles/img/logo_wiklan.png"></a>
        		</div>
        		<h2>DAFTAR DI WIKLAN</h2>
        		<h4>Sudah punya akun Wiklan? Masuk <a href="<?= $login_page ?>"><span class="skin-color">di sini</span></a></h4>
        	</div>

        </div>

        <div id="main" class="col-sms-6 col-sm-6 col-md-6">
            <div class="booking-section travelo-box">
                
                <form class="booking-form" method="post" action="<?= $form_location ?>">
                    <div class="person-information">
                        <h2>Daftar</h2>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <label>Nama Lengkap</label>
                                <input type="text" class="input-text full-width" placeholder="" name="username" id="username" onkeydown="return alphaOnly(event);" value="<?=set_value('username')?>" required />
                                <span class="info" id="username_result"></span>
                            </div>
                            <span class="focus-input100"><?php echo form_error('username'); ?></span>
                        </div>
                        <div class="form-group row">
          
                            <div class="col-sm-12 col-md-12">
                                <label>nomor telepon</label>
                                <input type="phone" class="input-text full-width" placeholder="" name="no_telp" id="telp" value="<?=set_value('no_telp')?>" required />
                            </div>
                            <span class="focus-input100"><?php echo form_error('no_telp'); ?></span>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <label>email</label>
                                <input type="email" class="input-text full-width" placeholder="" name="email" id="email" value="<?=set_value('email')?>" required />
                                <span class="info" id="email_result"></span>
                            </div>
                            
                            <span class="focus-input100"><?php echo form_error('email'); ?></span>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <label>Kata Sandi</label>
                                <input type="password" class="input-text full-width" placeholder="" name="pword" value="<?=set_value('pword')?>" required />
                            </div>
                            <span class="focus-input100"><?php echo form_error('pword'); ?></span>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <label>Konfirmasi Kata Sandi</label>
                                <input type="password" class="input-text full-width" placeholder="" name="repeat_pword" value="<?=set_value('repeat_pword')?>" required />
                            </div>
                            <span class="focus-input100"><?php echo form_error('repeat_pword'); ?></span>
                        </div>

                        <hr />
                        
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Dengan menekan Daftar Akun, saya mengkonfirmasi telah menyetujui, <a href="<?= $syarat_location ?>"><span class="skin-color">Syarat dan Ketentuan</span></a> serta <a href="<?= $kebijakan_location ?>"><span class="skin-color">Kebijakan Privasi</span></a> Wiklan.
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-12">
                            <button type="submit" class="full-width btn-large" name="submit" value="Submit">DAFTAR AKUN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        
        
    </div>
</div> 

<script>
    // only number input
    $("#telp").keypress(validateNumber);

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

    function alphaOnly(event) {
        var key = event.keyCode;
        return ((key >= 65 && key <= 90) || key == 8 || key == 32 || (key >= 188 && key <= 190) || key == 222);
    };
</script>

<script type="text/javascript">
jQuery(document).ready(function ($) {
    $('#email').change(function() {
        console.log('emaile');
        var email = $('#email').val();
        if (email != '') {
            $.ajax({
                url:"<?= base_url() ?>youraccount/check_email_avalibility",
                method: 'POST',
                data: {email:email},
                success: function(data) {
                    $('#email_result').html(data);
                }
            })
        }
    });

    $('#username').change(function() {
        console.log('usernamee');
        var username = $('#username').val();
        var lengthName = username.length;
        var esai = 'minimal 8 karakter';
        if (username != '') {
            if (lengthName < 8) {
                $('#username_result').html(esai);
            } else {
                $('#username_result').html('');
            }
        }
    });
});
</script>