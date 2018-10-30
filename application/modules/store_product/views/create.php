<?php
$this->load->module('site_settings');
$upload_image = base_url()."store_product/upload_image/".$update_id;
$delete_image = base_url()."store_product/delete_image/".$update_id;
$add_map = base_url()."store_product/add_map/".$update_id;
$add_point = base_url()."store_product/add_point/".$update_id;
$add_document = base_url()."store_product/upload_document/".$update_id;
$add_maintenance = base_url()."store_product/upload_maintenance/".$update_id;
$upload_video = base_url()."store_product/upload_video/".$update_id;
$delete_video = base_url()."store_product/delete_video/".$update_id;
$add_qr = base_url()."store_product/create_qr/".$update_id;
$delete_qr = base_url()."store_product/delete_qr/".$update_id;
$simulasi_harga = base_url()."store_product/sim_price/".$update_id;
?>

<style>
	ul.search-tabs li {
		border: 1px solid #f4f4f4;
	}
    .required {
        color: red;
        font-style: italic;
        font-size: 12px;
    }
    td {
        cursor: pointer;
    }

    .editor{
        display: none;
    }

    .format { position: relative; }
    .format input { text-indent: 15px;}
    .format .rp { 
      position: absolute;
      top: 8px;
      left: 17px;
      font-size: 12px;
    }
</style>

<div class="tab-pane fade in active">

	<h2>Apa yang anda jual</h2>

<?php if ($update_id != '') { ?>
    <div class="row container">
        <ul class="search-tabs clearfix">
            <li><a href="<?= $upload_image ?>">UPLOAD FOTO</a></li>
            <li><a href="<?= $add_map ?>">TAMBAH PETA LOKASI</a></li>
            <!-- <?php if ($qr_code != '') { ?>
                <li><a href="<?= $delete_qr ?>">DELETE QR CODE</a></li>
            <?php } else { ?>        
                <li><a href="<?= $add_qr ?>">BUAT QR CODE</a></li>
            <?php } ?> -->
            <!-- <?php if ($video != '') { ?>
                <li><a href="<?= $delete_video ?>">DELETE VIDEO</a></li>
            <?php } else { ?>
                <li><a href="<?= $upload_video ?>">UPLOAD VIDEO</a></li>
            <?php } ?> -->
            <li><a href="<?= $upload_video ?>">UPLOAD VIDEO</a></li>
            <li><a href="<?= $add_point ?>">TAMBAH LOKASI TERDEKAT</a></li>
            <li><a href="<?= $add_document ?>">UPLOAD DOKUMEN</a></li>
        </ul>
    </div>
<?php } ?>


<?php 
	$form_location = base_url()."store_product/create/".$update_id; 
?>

    <div class="col-sm-12 no-float no-padding">
    	<!-- alert -->
		<?php 
		if (isset($flash)) {
			echo $flash;
		}
		?>

        <form method="post" action="<?= $form_location ?>">

            <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id') ?>">
            <!-- nama produk -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Nama Produk<span class="required"> *</span></label>
                </div>
                <div class="col-sms-7 col-sm-7">
                    <input type="text" class="input-text full-width" name="item_title" value="<?= $item_title ?>">
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('item_title'); ?></span>
                    <?php if ($update_id != '') { ?>
                    <div style="margin-top: 10px;">
                        <?php if ($qr_code != '') { ?>
                            <a href="<?= $delete_qr ?>" class="button btn-mini red">delete QR code</a>
                            <button type="button" class="btn-mini green" data-toggle="modal" data-target="#myModal2">lihat Qr code</button>
                        <?php } else { ?>        
                            <a href="<?= $add_qr ?>" class="button btn-mini sky-blue1">buat QR code</a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>

<!-- Modal2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                
                <div>
                    <img src="<?= base_url() ?>marketplace/qr/<?= $qr_code ?>" width="300px">
                </div>

            </div>
        </div>
    </div>
</div>

                <div class="col-sms-3 col-sm-3">
                    <span>Isi nama produk dengan alamat titik yang dijual. (Contoh: JL. RAYA PADJAJARAN, KOTA BOGOR ( DEPAN MC DONALD'S) SISI B )</span>
                </div>

            </div>
            <!-- harga produk -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Harga <span class="required"> *</span> <br><span style="font-style: italic; font-size: 10px; color: #f4516c;">harga 1 tahun</span> </label>
                </div>
                <div class="col-sms-3 col-sm-3 format">
                    <span class="rp">Rp.</span>
                    <input type="text" class="input-text full-width" id="was_price" name="was_price" value="
                    <?php echo ($was_price != '') ? $this->site_settings->currency_format2($was_price) : 0; ?>
                    ">
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('was_price'); ?></span>
                </div>
                <div class="col-sms-2 col-sm-2">
                    <?php if ($update_id != '') { ?>
                        <a href="<?= $simulasi_harga ?>" class="button btn-medium orange">add harga</a>
                    <?php } ?>    
                </div>
                <div class="col-sms-2 col-sm-2">
                    <button class="btn-medium red" onclick="showAjaxModal('<?= base_url()?>modal/popup/simulasi/<?= $update_id ?>/store_product');" data-toggle="modal" data-target="#m_modal">simulasi</button>


                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Isi harga yang akan dijual ke klien.</span>
                </div>
            </div>
            <!-- harga produk -->
            <?php if ($update_id != '') { ?>
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Harga Fix <br><span style="font-style: italic; font-size: 10px; color: #f4516c;">harga 1 tahun</span></label>
                </div>
                <div class="col-sms-4 col-sm-4">
                    <input type="text" class="input-text full-width"  value="
                    <?php echo ($was_price != '') ? $this->site_settings->currency_format2($was_price) : 0; ?>
                    " disabled="disabled">
                </div>
                <div class="col-sms-3 col-sm-3">
                    <input type="text" class="input-text full-width" name="item_price" value="Rp. 
                    <?php echo ($item_price != '') ? $this->site_settings->currency_format2($item_price) : 0; ?>
                    " disabled="disabled">
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Tampil harga jual yang sudah disetujui WIKLAN.</span>
                </div>
            </div>
            <?php } ?>
            <!-- deskripsi produk -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Deskripsi<span class="required"> *</span></label>
                </div>
                <div class="col-sms-7 col-sm-7">
                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="item_description" id="mytextarea"><?= $item_description ?></textarea>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('item_description'); ?></span>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Isi keterangan menjelaskan titik yang dijual ke klien.</span>
                </div>
            </div>

            <hr>
            <!-- provinsi -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Provinsi<span class="required"> *</span></label>
                    
                </div>
                <div class="col-sms-5 col-sm-5">
                    <div class="selector full-width">
                        <?php 
					  	$additional_dd_code = 'class="form-control m-input m-input--air" id="provinsi"';
					  	$kategori_prov = array('' => 'Pilih Provinsi',);
				        foreach ($prov->result_array() as $row) {
				            $kategori_prov[$row['id_prov']] = $row['nama'];   
				        }
					  	echo form_dropdown('cat_prov', $kategori_prov, $cat_prov, $additional_dd_code);
					  	?>
                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_prov'); ?></span>
                </div>
                <div class="col-sms-2 col-sm-2"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Pilih letak provinsi yang menunjukan titik dijual.</span>
                </div>
            </div>
            <!-- kota/kabupaten -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Kota / Kabupaten<span class="required"> *</span></label>
                    
                </div>
                <div class="col-sms-5 col-sm-5">
                    <div class="selector full-width">
                        <select id="kota" name="cat_city">
                            <?php
                            if (isset($update_id)) {
                            ?>
                            <option selected="selected" value="<?= $cat_city ?>"><?= $nama_kota ?></option>
                            <?php    
                             } 
                            ?>
                            
                        </select>
                        <span class="custom-select"><?= $nama_kota ?></span>
                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_city'); ?></span>
                </div>
                <div class="col-sms-2 col-sm-2"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Pilih letak kota/kabupaten yang menunjukan titik dijual.</span>
                </div>
            </div>
            <!-- kecamatan -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Kecamatan<span class="required"> *</span></label>
                    
                </div>
                <div class="col-sms-5 col-sm-5">
                    <div class="selector full-width">
                        <select id="kecamatan" name="cat_distric">
                            <?php
                            if (isset($update_id)) {
                            ?>
                            <option selected="selected" value="<?= $cat_distric ?>"><?= $nama_kecamatan ?></option>
                            <?php    
                             } 
                            ?>   
                        </select>
                        <span class="custom-select"><?= $nama_kecamatan ?></span>
                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_distric'); ?></span>
                </div>
                <div class="col-sms-2 col-sm-2"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Pilih letak kecamatan yang menunjukan titik dijual.</span>
                </div>
            </div>
            <!-- alamat -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Detail Alamat</label>
                </div>
                <div class="col-sms-5 col-sm-5">
                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="item_address" placeholder="Detail Alamat"><?= $item_address ?></textarea>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('item_address'); ?></span>
                </div>
                <div class="col-sms-2 col-sm-2"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Isi alamat sesuai dengan letak lokasi yang dijual.</span>
                </div>
            </div>
            
            <hr>
            <div class="form-group">
                <h4>Detail Produk</h4>
            </div>
            <!-- kategori produk -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Jenis Produk<span class="required"> *</span></label>
                    
                </div>
                <div class="col-sms-3 col-sm-3">
                    <div class="selector full-width">
                        <?php 
					  	$additional_dd_code = 'class="form-control m-input m-input--air"';
					  	$kategori_jenis = array('' => 'Pilih Jenis Produk',);
				        foreach ($jenis->result_array() as $row) {
                            if ($row['cat_title'] != 'Indoor' && $row['cat_title'] != 'Branding') {
                                $kategori_jenis[$row['id']] = $row['cat_title']; 
                            }
				            // $kategori_jenis[$row['id']] = $row['cat_title'];   
				        }
					  	echo form_dropdown('cat_prod', $kategori_jenis, $cat_prod, $additional_dd_code);
					  	?>
                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_prod'); ?></span>
                </div>
                <div class="col-sms-4 col-sm-4"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Pilih jenis media reklame yang dijual.</span>
                </div>
            </div>
            <!-- kategori jalan -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Kategori Jalan</label>
                    
                </div>
                <div class="col-sms-3 col-sm-3">
                    <div class="selector full-width">
                        <?php 
					  	$additional_dd_code = 'class="form-control m-input m-input--air"';
					  	$kategori_jalan = array('' => 'Pilih Kategori Jalan',);
				        foreach ($jalan->result_array() as $row) {
				            $kategori_jalan[$row['id']] = $row['road_title'];   
				        }
					  	echo form_dropdown('cat_road', $kategori_jalan, $cat_road, $additional_dd_code);
					  	?>
                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_road'); ?></span>
                </div>
                <div class="col-sms-4 col-sm-4"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Pilih kategori jalan media reklame yang dijual.</span>
                </div>
            </div>
            <!-- kategori ukuran -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Kategori Ukuran</label>
                    
                </div>
                <div class="col-sms-3 col-sm-3">
                    <div class="selector full-width">
                        <?php 
					  	$additional_dd_code = 'class="form-control m-input m-input--air"';
					  	$kategori_ukuran = array('' => 'Pilih Kategori Ukuran',);
				        foreach ($ukuran->result_array() as $row) {
				            $kategori_ukuran[$row['id']] = $row['size'];   
				        }
					  	echo form_dropdown('cat_size', $kategori_ukuran, $cat_size, $additional_dd_code);
					  	?>
                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_size'); ?></span>
                </div>
                <div class="col-sms-4 col-sm-4"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Pilih ukuran media reklame yang dijual.</span>
                </div>
            </div>
            <!-- kategori ketersediaan -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Kategori Ketersediaan<span class="required"> *</span></label>
                    
                </div>
                <div class="col-sms-3 col-sm-3">
                    <div class="selector full-width">
                        <?php 
					  	$additional_dd_code = 'class="form-control m-input m-input--air"';
					  	$kategori_ketersediaan = array(NULL => 'Pilih Kategori Ketersediaan',);
				        foreach ($ketersediaan->result_array() as $row) {
				            $kategori_ketersediaan[$row['id']] = $row['label_title'];   
				        }
					  	echo form_dropdown('cat_stat', $kategori_ketersediaan, $cat_stat, $additional_dd_code);
					  	?>
                        <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_stat'); ?></span>
                    </div>
                </div>
                <div class="col-sms-4 col-sm-4"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Pilih ketersediaan/status media reklame yang dijual.</span>
                </div>
            </div>
            
            <!-- kategori tipe -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Tipe Media Iklan<span class="required"> *</span></label>
                    
                </div>
                <div class="col-sms-3 col-sm-3">
                    <div class="selector full-width">
                        <input type="radio" name="cat_type" value="1" <?php if($cat_type == 1){ ?> checked=checked <?php } ?> >&nbsp;Horizontal
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="cat_type" value="2" <?php if($cat_type == 2){ ?> checked=checked <?php } ?> >&nbsp;Vertical
                        <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_type'); ?></div>

                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_type'); ?></span>
                </div>
                <div class="col-sms-4 col-sm-4"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Pilih tipe media reklame yang dijual.</span>
                </div>
            </div>
            <!-- kategori light -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Pencahayaan<span class="required"> *</span></label>
                    
                </div>
                <div class="col-sms-5 col-sm-5">
                    <div class="selector full-width">
                        <input type="radio" name="cat_light" value="1" <?php if($cat_light == 1){ ?> checked=checked <?php } ?> >&nbsp;Front Light
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="cat_light" value="2" <?php if($cat_light == 2){ ?> checked=checked <?php } ?> >&nbsp;Back Light
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="cat_light" value="3" <?php if($cat_light == 3){ ?> checked=checked <?php } ?> >&nbsp;Tanpa Penerangan
                        <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_light'); ?></div>
                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_light'); ?></span>
                </div>
                <div class="col-sms-2 col-sm-2"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Pilih jenis penerangan media reklame yang dijual.</span>
                </div>
            </div>

            <!-- kategori sisi -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Jumlah Sisi<span class="required"> *</span></label>
                    
                </div>
                <div class="col-sms-3 col-sm-3">
                    <div class="selector full-width">
                        <input type="radio" name="jml_sisi" value="1" <?php if($jml_sisi == 1){ ?> checked=checked <?php } ?> >&nbsp;Satu Sisi
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="jml_sisi" value="2" <?php if($jml_sisi == 2){ ?> checked=checked <?php } ?> >&nbsp;Dua Sisi
                        <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('jml_sisi'); ?></div>
                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('jml_sisi'); ?></span>
                </div>
                <div class="col-sms-4 col-sm-4"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Pilih jumlah sisi media reklame yang dijual.</span>
                </div>
            </div>

            <!-- kategori sisi -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Keterangan Lokasi<span class="required"> *</span></label>
                    
                </div>
                <div class="col-sms-7 col-sm-7">
                    <div class="selector full-width">
                        <input type="radio" name="ket_lokasi" value="1" <?php if($ket_lokasi == 1){ ?> checked=checked <?php } ?> >&nbsp;Reklame Sudah Berdiri
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="ket_lokasi" value="2" <?php if($ket_lokasi == 2){ ?> checked=checked <?php } ?> >&nbsp;Reklame Belum Berdiri
                        <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('ket_lokasi'); ?></div>
                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('ket_lokasi'); ?></span>
                </div>
                <!-- <div class="col-sms-4 col-sm-4"></div> -->
                <div class="col-sms-3 col-sm-3">
                    <span>Pilih keterangan lokasi media reklame yang dijual.</span>
                </div>
            </div>

            <br>
            <div class="row form-group">
            	<div class="col-sms-2 col-sm-2"></div>
	            <div class="col-sms-7 col-sm-7">
	                <button type="submit" class="btn-medium" name="submit" value="Submit"><?php echo (isset($update_id)) ? 'EDIT PRODUK' : 'TAMBAH PRODUK'; ?></button>
	                <button type="submit" class="btn-medium red" name="submit" value="Cancel">BATAL</button>
	            </div>
	        </div>
            <br>
            <span class="required">* wajib diisi</span>
        </form>
    </div>
</div>


<script>
let har_targ = document.getElementById('harga_target');
let dur = document.getElementById('durasi');
let targ = document.getElementById('harga_bayar');
let was_price = document.getElementById('was_price');

// live format rupiah
was_price.addEventListener('keyup', liveCurrency);

function liveCurrency() {
    var $this = this;
    let input = $this.value;
    input = input.replace(/[\D\s\._\-]+/g, "");
    input = input ? parseInt( input, 10 ) : 0;

    let show = function() {
        return ( input === 0 ) ? "" : input.toLocaleString( "id-ID" ); 
    };

    $this.value = show();
}





// only number input
tjq("#was_price, #harga_target").keypress(validateNumber);

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

<script>
  tinymce.init({
    selector: '#mytextarea',
    height : 300
  });
</script>

<script type="text/javascript">
    function showAjaxModal(url)
    {
        // SHOWING AJAX loader-1 IMAGE
        tjq('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>marketplace/images/loading.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        tjq('#modal_ajax').modal('show', {backdrop: 'true'});
        
        //alert(url);
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        tjq.ajax({
            url: url,
            success: function(response)
            {
                tjq('#modal_ajax .modal-content').html(response);

            }
        });
    }
</script>

 <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
            </div>
        </div>
    </div>