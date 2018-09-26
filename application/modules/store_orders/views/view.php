<style>
	#item_price {
		font-size: 24px; font-weight: bold; color: #f4516c; float: right;
	}
</style>


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

		<div class="m-portlet__head-tools">
			<a href="<?= base_url() ?>store_orders/manage" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
				<span>
					<i class="la la-reply"></i>
					<span>
						Back
					</span>
				</span>
			</a>
			<a href="#" onclick="showEdit()" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
				<span>
					<i class="la la-edit"></i>
					<span>
						Edit
					</span>
				</span>
			</a>

			
		</div>

		
		
	</div>
	<!--begin::Form-->

	<!-- alert -->
<?php 
if (isset($flash)) {
	echo $flash;
}
?>

	<?php
	$shopper = Client::view_by_id($shopper_id);
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'store_orders/edit', $attributes); 
	?>
		<div class="m-portlet__body">
			<input type="hidden" name="order_id" value="<?= $update_id ?>">
			<div class="form-group m-form__group row">
				<div class="col-lg-4">
					<label>
						No Order
					</label>
					<input type="text" class="form-control m-input" value="<?= $no_order ?>" readonly>
					
				</div>
				<div class="col-lg-4">
					<label class="">
						Klien
					</label>
					<input type="text" class="form-control m-input" value="<?= $shopper->company ?>" readonly>
					<span class="m-form__help">
						<?= $shopper->username ?>
					</span>
				</div>
				<div class="col-lg-4">
					<label>
						Lokasi:
					</label>
					<div class="input-group m-input-group m-input-group--square">
						<span class="m-form__help">
							<?= $lokasi ?>
						</span>
					</div>
					
				</div>
			</div>

			<div class="form-group m-form__group row">
				<div class="col-lg-4">
					<label class="">
						Durasi:
					</label>
					<div class="m-input-icon m-input-icon--right">
						<input type="text" class="form-control m-input" value="<?= $durasi ?> bulan" readonly>
						<span class="m-input-icon__icon m-input-icon__icon--right">
							<span>
								<i class="la la-clock-o"></i>
							</span>
						</span>
					</div>
					
				</div>
				<div class="col-lg-4">
					<label class="">
						Tayang:
					</label>
					<div class="m-input-icon m-input-icon--right">
						<input type="text" class="form-control m-input" value="<?= $start ?> - <?= $end ?>" readonly>
						<span class="m-input-icon__icon m-input-icon__icon--right">
							<span>
								<i class="la la-calendar"></i>
							</span>
						</span>
					</div>
					
				</div>
				<div class="col-lg-4">
					<?php if($slot != '') { ?>
					<label>
						Slot:
					</label>
					<div class="m-input-icon m-input-icon--right">
						<input type="text" class="form-control m-input" value="<?= $slot ?> slot" readonly>
						<span class="m-input-icon__icon m-input-icon__icon--right">
							<span>
								<i class="la la-clone"></i>
							</span>
						</span>
					</div>
					<?php } ?>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<div class="col-lg-4">
					<label class="">
						Kategori:
					</label>
					<div class="m-input-icon m-input-icon--right">
						<input type="text" class="form-control m-input" value="<?= $kategori_produk ?>" readonly>
						<span class="m-input-icon__icon m-input-icon__icon--right">
							<span>
								<i class="la la-bookmark-o"></i>
							</span>
						</span>
					</div>
					
				</div>
				<div class="col-lg-4">
					<label class="">
						Harga <em><small>(Rp)</small></em>:
					</label>
					<div id="price" class="input-group m-input-group m-input-group--square" style="text-align: right;">
						<input type="text" class="form-control m-input" id="item_price" value="<?= $price ?>" style="display: none;">
						<span id="span-price" class="pull-right" style="font-size: 24px; font-weight: bold; color: #f4516c; float: right;">
							<?= $price ?>
						</span>
					</div>
				</div>
				<div class="col-lg-4">
					<!-- <label class="">
						File:
					</label>
					<div class="m-input-icon m-input-icon--right">
						<label class="custom-file">
							<input type="file" id="file2" class="custom-file-input" name="approval">
							<span class="custom-file-control form-control"></span>
						</label>
						<span class="m-input-icon__icon m-input-icon__icon--right">
							<span>
								<i class="la la-bookmark-o"></i>
							</span>
						</span>
					</div> -->
					
				</div>
			</div>
			
		</div>
		<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit" id="button-section" style="display: none;">
			<div class="m-form__actions m-form__actions--solid">
				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-8">
						<button type="submit" class="btn btn-primary" name="submit" value="Submit">
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

<script>
	
function showEdit () {
	console.log('show edit');
	$('#button-section').show();	
	$('#item_price').show();
	$('#span-price').hide();
}	

var item_price = document.getElementById('item_price');

// live format rupiah
item_price.addEventListener('keyup', liveCurrency);

function liveCurrency() {

	console.log('update');

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
$("#item_price").keypress(validateNumber);

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