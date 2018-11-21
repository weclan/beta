<?php
$order = $this->db->where('id', $param2)->get('store_orders')->row();
$shopper = $this->db->where('id', $order->shopper_id)->get('kliens')->row();
?>
<div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">
		Kirim Faktur Pajak
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open_multipart(base_url().'store_orders/send_tax_report', $attributes); 
?>	
<div class="modal-body">

	<input type="hidden" name="order_id" value="<?= $param2 ?>">
	<input type="hidden" name="user_id" value="<?= $shopper->id ?>">
	<div class="m-portlet__body">
		
		<div class="form-group m-form__group row">
			
			<label for="exampleInputEmail1">
				Faktur Pajak
			</label>
			<input type="file" name="file">
			<!-- <label class="custom-file">
				<input type="file" id="file2" name="file" class="custom-file-input">
				<span class="custom-file-control form-control"></span>
			</label> -->
		</div>

	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">
		Close
	</button>
	<button type="submit" name="submit" value="Submit" class="btn btn-primary">
		Kirim
	</button>
</div>

</form>
