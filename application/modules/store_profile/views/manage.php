<?php 
$upload_image = base_url()."store_profile/upload_image"; 
$upload_dokumen = base_url()."store_profile/upload_document/".$update_id; 
$update_password = base_url()."store_profile/update_pword";
$form_location = base_url()."store_profile/update_profil";

$ktp_img_path = base_url()."marketplace/ktp/".$ktp;
$npwp_img_path = base_url()."marketplace/npwp/".$npwp;

$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari = date("w");
$hari_ini = $seminggu[$hari];

$tgl_skrg     = date("d");
$bln_sekarang = date("m");
$thn_sekarang = date("Y");

?>
                
                <div id="profile" class="tab-pane fade in active">
                    <div class="view-profile">
                        <article class="image-box style2 box innerstyle personal-details">
                            <figure>
                                <a title="" href="#">
                                	<img width="270" height="263" alt="" src="<?php echo base_url(); ?><?php echo ($pic != '') ? 'marketplace/photo_profil/'.$pic : 'marketplace/images/default_v3-usrnophoto1.png'?>">
                                </a>
                            </figure>
                            <div class="details">
                                <a href="#" class="button btn-small yellow pull-right edit-profile-btn">EDIT PROFIL</a>
                                <h2 class="box-title fullname"><?= ($company) ? $company : $username ?></h2>
                                <dl class="term-description">
                                	<dt>Username:</dt><dd><?= $username ?></dd>
                                    <dt>Perusahaan:</dt><dd><?= $company ?></dd>
                                    <dt>Tanggal Lahir:</dt><dd><?= isset($tgl_lahir) ? tgl_indo($tgl_lahir) : '' ?></dd>
                                    <dt>Jenis Kelamin</dt><dd><?= $gender ?></dd>
                                    <dt>Email:</dt><dd><?= $email ?></dd>
                                    <dt>Nomor Telepon:</dt><dd><?= $no_telp ?></dd>
                                    <dt>Alamat:</dt><dd><?= $alamat ?></dd>
                                </dl>
                            </div>
                        </article>
                        
                        <div class="col-md-6">
                            <div class="toggle-container box" id="accordion1">
                                <div class="panel style1">
                                    <h4 class="panel-title">
                                        <a href="#acc1" data-toggle="collapse" data-parent="#accordion1">KTP</a>
                                    </h4>
                                    <div class="panel-collapse collapse in" id="acc1">
                                        <div class="panel-content">

                                           <?php if ($ktp != '') { ?>
                                                <article class="box">
                                                    <figure>
                                                        <img width="270" height="160" alt="" src="<?= $ktp_img_path ?>">
                                                    </figure>
                                                </article>
                                           <?php } ?>
                                        </div><!-- end content -->
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="toggle-container box" id="accordion1">
                                
                                <div class="panel style1">
                                    <h4 class="panel-title">
                                        <a href="#acc2" data-toggle="collapse" data-parent="#accordion1">NPWP</a>
                                    </h4>
                                    <div class="panel-collapse collapse in" id="acc2">
                                        <div class="panel-content">
                                            <?php if ($npwp != '') { ?>
                                                <article class="box">
                                                    <figure>
                                                        <img width="270" height="160" alt="" src="<?= $npwp_img_path ?>">
                                                    </figure>
                                                </article>
                                           <?php } ?>
                                           
                                        </div><!-- end content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                    </div>
                    <div class="edit-profile">
                        
                            <h2>Detail Profil</h2>
                            <div class="col-sm-5">
                                <figure>
                                    
                                    <img width="270" height="263" alt="" src="<?php echo base_url(); ?><?php echo ($pic != '') ? 'marketplace/photo_profil/'.$pic : 'marketplace/images/default_v3-usrnophoto1.png'?>">
                                    
                                </figure>
                                <div class="row form-group">
                                    <div class="col-sms-12 col-sm-9 no-float">
                                        <a href="<?= $upload_image ?>" class="button btn-medium yellow pull-right full-width">UPLOAD FOTO / LOGO</a>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sms-12 col-sm-9 no-float">
                                        <a href="<?= $update_password ?>" class="button btn-medium red pull-right full-width">UBAH PASSWORD</a>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sms-12 col-sm-9 no-float">
                                        <a href="<?= $upload_dokumen ?>" class="button btn-medium green pull-right full-width">UPLOAD KTP &amp; NPWP</a>
                                    </div>
                                </div>
                            </div>
                        <form class="edit-profile-form" method="post" action="<?= $form_location ?>">   
                            <input type="hidden" name="user_code" value="<?= $update_id ?>"> 
                            <div class="col-sm-7 no-padding no-float2">
                                <div class="row form-group">
                                    <div class="col-sms-12 col-sm-12">
                                        <label>Nama PIC</label>
                                        <input type="text" class="input-text full-width" placeholder="" name="username" value="<?= $username ?>">
                                    </div>
                                    
                                </div>
                                <div class="row form-group">
                                    <div class="col-sms-12 col-sm-12">
                                        <label>Perusahaan</label>
                                        <input type="text" class="input-text full-width" placeholder="" name="company" value="<?= $company ?>">
                                    </div>
                                    
                                </div>
                                <div class="row form-group">
                                    <label class="col-xs-12">Tanggal Lahir</label>
                                    <div class="col-xs-4 col-sm-4">
                                        <div class="selector">
                                            <?php combotgl(1,31,'tgl_mulai',$tgl_skrg); ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4">
                                        <div class="selector">
                                            <?php combonamabln(1,12,'bln_mulai',$bln_sekarang); ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4">
                                        <div class="selector">
                                            <?php combothn(1900,$thn_sekarang,'thn_mulai',$thn_sekarang); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sms-6 col-sm-6">
                                        <label>Jenis Kelamin</label>
                                        <div class="selector full-width">
                                            <input type="radio" name="gender" value="Pria" <?php echo ($gender=='Pria')?'checked':'' ?>>&nbsp;Pria
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="gender" value="Wanita" <?php echo ($gender=='Wanita')?'checked':'' ?>>&nbsp;Wanita
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row form-group">
                                    <div class="col-sms-12 col-sm-12">
                                        <label>Email</label>
                                        <input type="email" class="input-text full-width" placeholder="" name="email" value="<?= $email ?>">
                                    </div>
                                    
                                </div>
                                <div class="row form-group">
                                    
                                    <div class="col-sms-12 col-sm-12">
                                        <label>Telepon / Handphone</label>
                                        <input type="text" class="input-text full-width" placeholder="" id="inputTelp" name="no_telp" value="<?= $no_telp ?>">
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col-sms-12 col-sm-12">
                                        <label>Alamat</label>
                                        <textarea type="text" class="input-text full-width" style="height: 100px;" name="alamat"><?= $alamat ?></textarea>
                                    </div>
                                  
                                </div>
                                
                                <hr>
                                
                                <div class="from-group">
                                    <button type="submit" class="btn-medium col-sms-6 col-sm-4" name="submit" value="Submit">SIMPAN</button>
                                    &nbsp; &nbsp;
                                    <button class="btn-medium red" type="submit" name="submit" value="Cancel">BATAL</button>
                                </div>

                            </div>
                        </form>
                    </div>
                    
                </div>
                

<script type="text/javascript">
    tjq("#inputTelp").keypress(validateNumber);

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