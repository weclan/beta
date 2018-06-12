<style type="text/css">
	#info-general span {
		margin: 5px 10px;
	}
	
	.list img {
		border: 1px solid #ddd;
	}

	.list .details {
		border: 1px solid #ddd;
		padding: 3px;
	}

	.list .details .box-title {
		min-height: 35px;
	}

	.list .details .description {
		min-height: 100px;
	}

	.keuntungan p {
		text-align: justify !important;
	}
</style>

<div id="vendor" class="tab-pane fade in active">
	
	<div class="toggle-container box" id="accordion1">
        <div class="panel style1">
            <h4 class="panel-title">
                <a href="#acc1" data-toggle="collapse" data-parent="#accordion1">Daftar Vendor Asuransi</a>
            </h4>
            <div class="panel-collapse collapse" id="acc1">
                <div class="panel-content">

                    <div class="block">
	                    <div class="row">
	                        
	                        <div class="col-lg-12 listing-style3 hotel" id="vendor-asuransi">
	                            
	                            
	                        </div>
	                    </div>
	                </div>

                    <a href="#" class="load-more button green full-width btn-large fourty-space" id="load_more_asuransi" data-val="0">MUAT LAINNYA</a>
                </div><!-- end content -->


            </div>
        </div>
        
        <div class="panel style1">
            <h4 class="panel-title">
                <a class="collapsed" href="#acc2" data-toggle="collapse" data-parent="#accordion1">Daftar Vendor Produksi</a>
            </h4>
            <div class="panel-collapse collapse" id="acc2">
                <div class="panel-content">
                    
                	<div class="row image-box hotel listing-style1">

                    	<div id="test-list">

                    		<div class="row">
                    			<div class="col-md-12">
                    				<div class="col-md-9"></div>
                                    <div class="col-md-3">
                                        <input type="text" class="search pull-right input-text full-width" placeholder="cari kota / provinsi" style="" />
                                    </div>
                    			</div>
                    		</div>
						    
						    <div class="list">

						    	<?php
						    		$this->load->module('store_provinces');
    								$this->load->module('store_cities');
    								$this->load->module('timedate');
						    		foreach ($productions->result() as $production) {
        								$nama = $production->nama;
						                $email = $production->email;
						                $telp = $production->telp;
						                $alamat = $production->alamat;
						                $nama_provinsi = $this->store_provinces->get_name_from_province_id($production->cat_prov);
						                $nama_kota = ucwords(strtolower($this->store_cities->get_name_from_city_id($production->cat_city)));
						                $link = $production->url;
						                $pic = $production->pic;
						                $id = $production->id;
						    		
						    	?>
						    		<div class='col-sm-6 col-md-4'>
			                            <article class='box'>
			                                <figure>
			                                    <a href='#'><img width='270' height='160' alt='' src='<?= base_url() ?>marketplace/vendor/vendor_produksi.jpg'></a>
			                                </figure>
			                                <div class='details'>
			                                    
			                                    <h4 class='box-title'><?= $nama ?><br><small><?= $pic ?></small></h4>
			                                    <div class='feedback'>
			                                        <span><i class='soap-icon-phone yellow-color'></i> <?= $telp ?></span>
			                                        <br>
			                                        <span><i class='soap-icon-message yellow-color'></i> <?=$email ?></span>
			                                        <?php if ($link != '') { ?>
			                                       
			                                        <br>
			                                        <a href="<?=$link ?>" target="_blank"><span><i class='soap-icon-globe yellow-color'></i> <?=$link ?></span></a>
			                                    	<?php } else { ?>
			                                    	<br><span><i class='soap-icon-globe yellow-color'></i> -</span>	
			                                    	<?php } ?>
			                                    </div>
			                                   
			                                    <p class='description kota'>
			                                        <span><i class='soap-icon-departure yellow-color'></i> <?= $alamat ?></span>
			                                        <br>
			                                        <span><?= $nama_kota ?> - <?= $nama_provinsi ?></span>
			                                    </p>
			                                    <hr>
			                                    <div class="row">
			                                    	<div class="col-sm-4">
				                                    	<ul>
				                                    		<li><a href="<?= base_url().'store_vendor/download_file/SIUP/'.$id ?>"><i class="fa fa-download"></i> SIUP</a></li>
				                                    		<li><a href="<?= base_url().'store_vendor/download_file/TDP/'.$id ?>"><i class="fa fa-download"></i> TDP</a></li>
				                                    	</ul>
			                                    	</div>
			                                    	<div class="col-sm-8">
				                                    	<ul style="text-align: right; margin-right: 10px;">
				                                    		<li><a href="<?= base_url().'store_vendor/download_file/NPWP/'.$id ?>"><i class="fa fa-download"></i> NPWP Perusahaan</a></li>
				                                    		<li><a href="<?= base_url().'store_vendor/download_file/Akte/'.$id ?>"><i class="fa fa-download"></i> Akte Perusahaan</a></li>
				                                    	</ul>
			                                    	</div>
			                                    </div>
			                                    
			                                </div>
			                            </article>
			                        </div>
						    	<?php } ?>
						     
						    </div>

						    <div class="row pagin">
						    	<div class="col-md-12">
						    		<ul class="pagination pull-right"></ul>
						    	</div>	
						    </div>

						</div>

					</div>	
	               
                </div><!-- end content -->
            </div>
        </div>
        
        <div class="panel style1">
            <h4 class="panel-title">
                <a class="collapsed" href="#acc3" data-toggle="collapse" data-parent="#accordion1">Daftar Vendor Pengurusan &amp; Perijinan</a>
            </h4>
            <div class="panel-collapse collapse" id="acc3">
                <div class="panel-content">
                    
                	<div class="row image-box hotel listing-style1">
	                    
	                    <div id="legal-list">
						    
	                    	<div class="row">
                    			<div class="col-md-12">
                    				<div class="col-md-9"></div>
                                    <div class="col-md-3">
                                        <input type="text" class="search pull-right input-text full-width" placeholder="cari kota / provinsi" style="" />
                                    </div>
                    			</div>
                    		</div>

						    <div class="list">

						    	<?php
						    		$this->load->module('store_provinces');
    								$this->load->module('store_cities');
    								$this->load->module('timedate');
						    		foreach ($legals->result() as $legal) {
        								$nama = $legal->nama;
						                $email = $legal->email;
						                $telp = $legal->telp;
						                $alamat = $legal->alamat;
						                $nama_provinsi = $this->store_provinces->get_name_from_province_id($legal->cat_prov);
						                $nama_kota = ucwords(strtolower($this->store_cities->get_name_from_city_id($legal->cat_city)));
						                $link = $legal->url;
						                $pic = $legal->pic;
						    			$id = $legal->id;
						    	?>
						    		<div class='col-sm-6 col-md-4'>
			                            <article class='box'>
			                                <figure>
			                                    <a href='#'><img width='270' height='160' alt='' src='<?= base_url() ?>marketplace/vendor/vendor_pengurusan.jpg'></a>
			                                </figure>
			                                <div class='details'>
			                                    
			                                    <h4 class='box-title'><?= $nama ?><br><small><?= $pic ?></small></h4>
			                                    <div class='feedback'>
			                                        <span><i class='soap-icon-phone yellow-color'></i> <?= $telp ?></span>
			                                        <br>
			                                        <span><i class='soap-icon-message yellow-color'></i> <?=$email ?></span>
			                                        <?php if ($link != '') { ?>
			                                        <br>
			                                        <a href="<?=$link ?>" target="_blank"><span><i class='soap-icon-globe yellow-color'></i> <?=$link ?></span></a>
			                                    	<?php } else { ?>
			                                    	<br><span><i class='soap-icon-globe yellow-color'></i> -</span>	
			                                    	<?php } ?>
			                                    </div>
			                                    <p class='description kota'>
			                                        <span><i class='soap-icon-departure yellow-color'></i> <?= $alamat ?></span>
			                                        <br>
			                                        <span><?= $nama_kota ?> - <?= $nama_provinsi ?></span>
			                                    </p>

			                                    <hr>
			                                    <div class="row">
			                                    	<div class="col-sm-4">
				                                    	<ul>
				                                    		<li><a href="<?= base_url().'store_vendor/download_file/SIUP/'.$id ?>"><i class="fa fa-download"></i> SIUP</a></li>
				                                    		<li><a href="<?= base_url().'store_vendor/download_file/TDP/'.$id ?>"><i class="fa fa-download"></i> TDP</a></li>
				                                    	</ul>
			                                    	</div>
			                                    	<div class="col-sm-8">
				                                    	<ul style="text-align: right; margin-right: 10px;">
				                                    		<li><a href="<?= base_url().'store_vendor/download_file/NPWP/'.$id ?>"><i class="fa fa-download"></i> NPWP Perusahaan</a></li>
				                                    		<li><a href="<?= base_url().'store_vendor/download_file/Akte/'.$id ?>"><i class="fa fa-download"></i> Akte Perusahaan</a></li>
				                                    	</ul>
			                                    	</div>
			                                    </div>
			                                </div>
			                            </article>
			                        </div>
						    	<?php } ?>
						     

						    </div>
						    
						    <div class="row pagin">
						    	<div class="col-md-12">
						    		<ul class="pagination pull-right"></ul>
						    	</div>	
						    </div>

						</div>

	                </div>

                </div><!-- end content -->
            </div>
        </div>
    </div>

</div>


<script>
    tjq(document).ready(function(){
        getVendorInsurance(0);
       
        tjq("#load_more_asuransi").click(function(e){
            e.preventDefault();
            var page = tjq(this).data('val');
            getVendorInsurance(page);
 
        });

    });
 
    var getVendorInsurance = function(page){
        tjq("#loader").show();
        tjq.ajax({
            url:"<?php echo base_url() ?>store_vendor/create_vendor_insurance",
            type:'GET',
            data: {page:page}
        }).done(function(response){
            tjq("#vendor-asuransi").append(response);
            tjq("#loader").hide();
            tjq('#load_more_asuransi').data('val', (tjq('#load_more_asuransi').data('val')+1));
            // scroll();
        });
    };

    var scroll  = function(){
        tjq('html, body').animate({
            scrollTop: tjq('#load_more_asuransi').offset().top
        }, 1000);
    };

</script>

