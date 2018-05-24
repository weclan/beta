
<?php
$back = base_url().'store_product/';
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>marketplace/css/lightbox.css" media="screen" />

<div class="tab-pane fade in active">

    <div class="row">
		<div class="col-md-6">
	    	<h2>Report Maintenance</h2>
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
	    echo form_open_multipart('store_product/process_add_maintenance/'.$update_id);
	    ?>	
	    	<input type="hidden" name="prod_id" value="<?= $prod_id ?>">

	    	<div id="dynamicInput">

	    		<!-- kategori ukuran -->
	            <div class="row form-group">
	                <div class="col-sms-2 col-sm-2">
	                    <label>Tipe Laporan</label>
	                    
	                </div>
	                <div class="col-sms-3 col-sm-3">
	                    <div class="selector full-width">
	                       	<select name="type">
                                <option>Select Type</option>
                                <option value="lokasi">Lokasi</option>
                                <option value="listrik">Listrik</option>
                                <option value="asuransi">Asuransi</option>
                            </select>
                            <span class="custom-select">Select Type</span>
	                    </div>
	                    <span class="error-msg" style="color: #f4516c; font"><?php echo form_error('type'); ?></span>
	                </div>
	                <div class="col-sms-4 col-sm-4"></div>
	                <div class="col-sms-3 col-sm-3">
	                    <span>Pilih tipe laporan yang akan direportkan ke klien (lokasi, listrik, asuransi).</span>
	                </div>
	            </div>

		    	<div class="row form-group">
	                <div class="col-sms-2 col-sm-2">
	                    <label>Report File</label>
	                </div>
	                <div class="col-sms-7 col-sm-7">
	                	<div class="fileinput full-width">
		                    <input type="file" class="input-text" name="userfile">
		                </div>
	                </div>
	                <div class="col-sms-3 col-sm-3">
	                    <span>Upload report file berdasarkan tipe laporan yang di pilih.</span>
	                </div>
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

	<br>
	<br>
	<hr>

	<div class="col-sm-12 no-float no-padding">
		
	</div>

	<div class="toggle-container question-list">
        <div class="panel style1">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#tgg1" class="collapsed">List of Report Maintenance</a>
            </h4>
            <div id="tgg1" class="panel-collapse collapse">
                <div class="panel-content">
					<div class="well">
						
						<div class="row image-box listing-style2 add-clearfix">
                            <?php
                            $this->load->module('manage_product');
                            $i = 1;
							foreach ($reports->result() as $row) {
								$loc = $this->manage_product->location($row->type);
								$image_location = base_url().$loc.'300x160/'.$row->image;
								$image_big_location = base_url().$loc.$row->image;
								$delete_url = base_url()."report_maintenance/delete/".$update_id."/".$row->token;

							?>
                            <div class="col-sm-6 col-md-4">
                                <article class="box">
                                    <figure>
                                        <a class="hover-effect example-image-link" title="" href="<?= $image_location ?>" data-lightbox="example-<?= $i++ ?>"><img class="example-image" width="300" height="160" alt="" src="<?= $image_big_location ?>"></a>
                                    </figure>
                                  
                                    <div class="details">
                                        <a class="pull-right" href="<?= $delete_url ?>" title="delete"><i class="soap-icon-close circle"></i></a>
                                        <h4 class="box-title"><?= $row->type ?></h4>
                   
                                    </div>
                                </article>
                            </div>
                          	<?php } ?>
						</div>

					</div>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript" src="<?php echo base_url();?>marketplace/js/lightbox.js"></script>

<!-- <script>
var counter = 1;
var limit = 10;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.className = "row form-group";
          let son = `<div class="col-sms-2 col-sm-2">
	                    <label>Selling Point ${counter + 1}</label>
	                </div>
	                <div class="col-sms-7 col-sm-7">
		                <input type="text" class="input-text full-width" name="myInputs[]">
	                </div>
	                <div class="col-sms-3 col-sm-3">
	                    <span>Tulis nama produk sesuai jenis, merek, dan rincian produk.</span>
	                </div>`;
	      newdiv.innerHTML = son;          
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}
</script> -->