<?php
$back = base_url().'store_product/create/'.$update_id;
?>

<div class="tab-pane fade in active">

    <div class="row">
		<div class="col-md-6">
	    	<h2>Upload Video</h2>
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
	    echo form_open_multipart('store_product/add_video/'.$update_id);
	    ?>	
	    	<div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>File Video</label>
                </div>
                <div class="col-sms-7 col-sm-7">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="userfile" data-placeholder="select video">
	                </div>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Wajib Upload video media iklan sesuai lokasi berdirinya reklame.</span>
                </div>
            </div>
	        
	        <div class="row form-group">
	        	<div class="col-sms-2 col-sm-2"></div>
	        	<div class="col-sms-7 col-sm-7">
	            	<button class="btn-medium" type="submit" name="submit" value="Submit">UPLOAD</button>
	            	<button class="btn-medium red" type="submit" name="submit" value="Cancel">CANCEL</button>
	            </div>
	        </div>
	    <?php echo form_close(); ?>

	</div>
</div>