<?php
$back = base_url().'store_product/create/'.$update_id;
?>

<div class="tab-pane fade in active">

    <div class="row">
		<div class="col-md-6">
	    	<h2>Add Selling Point</h2>
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
	    echo form_open('store_product/process_add_point/'.$update_id);
	    ?>	
	    	<input type="hidden" name="prod_id" value="<?= $prod_id ?>">

	    	<div id="dynamicInput">

		    	<div class="row form-group">
	                <div class="col-sms-2 col-sm-2">
	                    <label>Selling Point 1</label>
	                </div>
	                <div class="col-sms-7 col-sm-7">
		                <input type="text" class="input-text full-width" name="myInputs[]">
	                </div>
	                <div class="col-sms-3 col-sm-3">
	                    <span>Tulis nama produk sesuai jenis, merek, dan rincian produk.</span>
	                </div>
	            </div>

	        </div>    

	        <div class="row form-group">
	        	<div class="col-sms-7 col-sm-7"></div>
	        	<div class="col-sms-3 col-sm-3">
	        		<input type="button" value="Tambah Selling Point" class="button btn-mini sea-blue" onClick="addInput('dynamicInput');">
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
                <a data-toggle="collapse" href="#tgg1" class="collapsed">List of Selling Points</a>
            </h4>
            <div id="tgg1" class="panel-collapse collapse">
                <div class="panel-content">
					<div class="well">
						<table class="table table-responsive">
							<thead>
								<tr>
									<th width="80%">Point</th>
									<th width="20%">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($sell_points->result() as $row) {
								?>
								<tr>
									<td width="80%"><?= $row->desc ?></td>
									<td width="20%"><a href="<?= $row->id ?>" class="button btn-mini red"><i class="soap-icon-close"></i></a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>

                </div>
            </div>
        </div>
    </div>


</div>

<script>
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
</script>