<?php
$back = base_url().'store_product/create/'.$update_id;
?>

<div class="tab-pane fade in active">

    <div class="row">
		<div class="col-md-6">
	    	<h2>Add Map</h2>
	    </div>

	    <div class="col-md-6">
	        <a href="<?= $back ?>" class="button btn-small yellow pull-right">BACK</a>
	    </div>
	</div>

    <div class="col-sm-12 no-float no-padding">
    	<!-- alert -->
		<?php 
		if (isset($flash)) {
			echo $flash;
		}
		?>

		<?php
	    echo form_open_multipart('store_product/add_map/'.$update_id);
	    ?>	
	    	<div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Cari Lokasi</label>
                </div>
                <div class="col-sms-7 col-sm-7">
	                <input type="text" class="input-text full-width" id="geocomplete" data-placeholder="cari lokasi">
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Tulis nama produk sesuai jenis, merek, dan rincian produk.</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Alamat</label>
                </div>
                <div class="col-sms-7 col-sm-7">
	                <input type="text" class="input-text full-width" name="sr_address">
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Tulis nama produk sesuai jenis, merek, dan rincian produk.</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Latitude</label>
                </div>
                <div class="col-sms-7 col-sm-7">
	                <input type="text" class="input-text full-width" name="sr_lat">
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Tulis nama produk sesuai jenis, merek, dan rincian produk.</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Longitude</label>
                </div>
                <div class="col-sms-7 col-sm-7">
	                <input type="text" class="input-text full-width" name="sr_lng">
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Tulis nama produk sesuai jenis, merek, dan rincian produk.</span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Select Location with marker</label>
                </div>
                <div class="col-sms-7 col-sm-7">
	                <div class="map_canvas"></div>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Tulis nama produk sesuai jenis, merek, dan rincian produk.</span>
                </div>
            </div>
	        
	        <div class="row form-group">
	        	<div class="col-sms-2 col-sm-2"></div>
	        	<div class="col-sms-7 col-sm-7">
		            <button class="btn-medium" type="submit" name="submit" value="Submit">SUBMIT</button>
		            <button class="btn-medium red" type="submit" name="submit" value="Cancel">CANCEL</button>
		        </div>    
	        </div>
	    <?php echo form_close(); ?>

	</div>
</div>