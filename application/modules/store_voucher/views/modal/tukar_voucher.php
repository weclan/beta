
<div class="modal-header" style="background-color: #f4516c; color: #fff;">
	<h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">
		Tukar Voucher
	</h5>
	
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'store_vaoucher/tukar', $attributes); 
?>	
<div class="modal-body">

	<input type="hidden" name="order_id" value="<?=$param2?>">
	<div class="m-portlet__body">
		<h5>Apakah anda yakin tukar voucher?</h5>
	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">
		Close
	</button>
	<button type="submit" name="submit" value="Submit" class="btn btn-danger">
		Tukar
	</button>
</div>

</form>