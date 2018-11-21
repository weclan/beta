
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.css">

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					<?= $headline ?>
				</h3>
			</div>
		</div>
		
	</div>
	<!--begin::Form-->

	<?php 
	$form_location = base_url()."invoices/add/".$update_id; 
	?>
	<form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?= $form_location ?>">
		<input type="hidden" name="id_transaction" id="no_order">
		<div class="m-portlet__body">
			<div class="form-group m-form__group m--margin-top-10">
				<!-- alert -->
				<?php 
				if (isset($flash)) {
					echo $flash;
				}
				?>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Ref No
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="reference_no" name="reference_no" value="INV<?php
			
                        $this->load->module('invoices');
                        echo $this->invoices->generate_invoice_number();
					?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('reference_no'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					NO Approval
				</label>
				<div class="col-6">
					<div class="input-group m-input-group m-input-group--square">
                        <input type="text" name="approve_no" class="form-control m-input" value="">
                    </div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('approve_no'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					No transaksi
				</label>
				<div class="col-6">
					<?php 
                        $additional_dd_code = 'class="form-control m-input m-input--air" id="no_transaksi"';
                        $daftar_transaksi = array('' => 'Please Select',);
                        $orders = $this->db->get('store_orders');
                        foreach ($orders->result_array() as $row) {
                            $daftar_transaksi[$row['no_transaksi']] = $row['no_transaksi'];   
                        }
                        echo form_dropdown('no_transaksi', $daftar_transaksi, '', $additional_dd_code);
                        ?>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('no_transaksi'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Klien
				</label>
				<div class="col-6">
					<div class="input-group m-input-group m-input-group--square">
                        <input type="text" name="klien" id="klien" class="form-control m-input">
                        <input type="hidden" name="client" id="client" class="form-control m-input">
                    </div>
					<!-- <?php 
						$this->load->module('manage_daftar');
                        $additional_dd_code = 'class="form-control m-input m-input--air" id="klien"';
                        $daftar_klien = array('' => 'Please Select',);
                        foreach ($clients->result_array() as $row) {
                            $daftar_klien[$row['shopper_id']] = $this->manage_daftar->_get_customer_name($row['shopper_id']);   
                        }
                        echo form_dropdown('client', $daftar_klien, '', $additional_dd_code);
                        ?> -->
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('client'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Lokasi
				</label>
				<div class="col-6">
					<textarea class="form-control m-input m-input--air" id="lokasi" rows="3"></textarea>
					<!-- <select class="form-control m-input m-input--air" id="lokasi" name="lokasi"></select> -->
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('lokasi'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Deadline
				</label>
				<div class="col-3">
					<input class="form-control m-input m-input--air" type="text" id="due_date" name="due_date" value="<?= $due_date ?>" data-date-format="dd-mm-yyyy">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('due_date'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					PPN
				</label>
				<div class="col-6">
					<div class="input-group m-input-group m-input-group--square">
                        <span class="input-group-addon" id="basic-addon1">
                            %
                        </span>
                        <input type="text" name="ppn" class="form-control m-input" value="10.00">
                    </div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('ppn'); ?></div>
				</div>
			</div>
			<!-- <div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					PPH
				</label>
				<div class="col-6">
					<div class="input-group m-input-group m-input-group--square">
                        <span class="input-group-addon" id="basic-addon1">
                            %
                        </span>
                        <input type="text" name="pph" class="form-control m-input" value="">
                    </div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('pph'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Discount
				</label>
				<div class="col-6">
					<div class="input-group m-input-group m-input-group--square">
                        <span class="input-group-addon" id="basic-addon1">
                            %
                        </span>
                        <input type="text" name="discount" class="form-control m-input" value="">
                    </div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('discount'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Extra Fee
				</label>
				<div class="col-6">
					<div class="input-group m-input-group m-input-group--square">
                        <span class="input-group-addon" id="basic-addon1">
                            %
                        </span>
                        <input type="text" name="extra_fee" class="form-control m-input" value="">
                    </div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('extra_fee'); ?></div>
				</div>
			</div> -->
			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Catatan
				</label>
				<div class="col-6">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="notes"><?= $notes ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('notes'); ?></div>
				</div>
			</div>
			
		</div>
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions">
				<div class="row">
					<div class="col-2"></div>
					<div class="col-6">
						<button type="submit" class="btn btn-success" name="submit" value="Submit">
							Submit
						</button>
						<button type="submit" class="btn btn-secondary" name="submit" value="Cancel">
							Cancel
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!--end::Portlet-->

<script type="text/javascript" src="<?= base_url() ?>assets/datepicker/bootstrap-datepicker.js"></script>
<script>
	$('#due_date').datepicker({
	    format: 'dd/mm/yyyy',
	    startDate: '-3d'
	});

	// get lokasi
	$('#klien').change(function(){
		$.post("<?php echo base_url();?>store_basket/get_location/"+$('#klien').val(),{},function(obj){
			$('#lokasi').html(obj);
		});
	});
</script>
<script>
    // only number input
$("#rekening").keypress(validateNumber);

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

document.getElementById('no_transaksi').addEventListener('change', selectTransaction);

function selectTransaction(e) {
	var trans_num = e.target.value;
	var lokasi = document.getElementById('lokasi');
	var klien = document.getElementById('klien');
	var client = document.getElementById('client');
	var no_order = document.getElementById('no_order');

	jQuery.ajax({
        type: 'POST',
        url: '<?= base_url() ?>invoices/getOrder',
        data: {no_transaksi:trans_num},  
        dataType: 'json',
        success: function (resp) {
            console.log(resp);
            lokasi.value = resp.lokasi;
            klien.value = resp.klien;
            client.value = resp.shopper_id;
            no_order.value = resp.no_order;
        },
       	error: function (xhr,status,error) {             
            swal("Data tidak ditemukan!","Silahkan cek database","warning")
        }
    });
}
</script>