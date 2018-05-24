
<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					<?= $headline ?> <span id="venCat"></span>
				</h3>
			</div>
		</div>

		
	</div>
	<!--begin::Form-->

	<?php 
	$form_location = base_url()."vendor/create/".$update_id; 
	?>
	<form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?= $form_location ?>">
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
				<label for="example-email-input" class="col-2 col-form-label">
					Kategori Vendor
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air" id="vendor"';
				  	$options = array(
							  		'' => 'Please Select',
							  		'1' => 'Vendor Asuransi',
							  		'2' => 'Vendor Produksi',
							  		'3' => 'Vendor Pengurusan & Perijinan' 
						  		);
				  	echo form_dropdown('vendor_cat', $options, $vendor_cat, $additional_dd_code);
				  	?>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('vendor_cat'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Nama
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="judul" name="nama" value="<?= $nama ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('nama'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					PIC
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="pic" name="pic" value="<?= $pic ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('pic'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Telpon
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="link" name="telp" value="<?= $telp ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('telp'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Email
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="email" id="link" name="email" value="<?= $email ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('email'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Website
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="url" name="url" value="<?= $url ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('url'); ?></div>
				</div>
			</div>

	<div id="inputProvinsi">
		<div class="m-separator m-separator--dashed m-separator--md"></div>
			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Provinsi
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air" id="provinsi"';
				  	$kategori_prov = array('' => 'Please Select',);
			        foreach ($prov->result_array() as $row) {
			            $kategori_prov[$row['id_prov']] = $row['nama'];   
			        }
				  	echo form_dropdown('cat_prov', $kategori_prov, $cat_prov, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_prov'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Kota/kabupaten
				</label>
				<div class="col-10">
					<select class="form-control m-input m-input--air" id="kota" name="cat_city"></select>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_city'); ?></div>
				</div>
			</div>
		<div class="m-separator m-separator--dashed m-separator--md"></div>
	</div>		

			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Alamat
				</label>
				<div class="col-10">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="alamat"><?= $alamat ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('alamat'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row" id="keuntungan">
				<label for="example-url-input" class="col-2 col-form-label">
					Keuntungan
				</label>
				<div class="col-10">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="keuntungan"><?= $keuntungan ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('keuntungan'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Status
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$options = array(
							  		'' => 'Please Select',
							  		'1' => 'Active',
							  		'0' => 'Inactive'  
						  		);
				  	echo form_dropdown('status', $options, $status, $additional_dd_code);
				  	?>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('status'); ?></div>
				</div>
			</div>
			
			
		</div>
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions">
				<div class="row">
					<div class="col-2"></div>
					<div class="col-10">
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

<script>
	$(document).ready(function () {
		let ven = $('#vendor');
		let nama = document.getElementById('venCat');
		document.getElementById('vendor').addEventListener('change', function() {
			let venVal = this.value;
			let kategori;

			if (venVal == 1 ) {
				$('#inputProvinsi').hide();
				$('#keuntungan').show();
			} else {
				$('#inputProvinsi').show();
				$('#keuntungan').hide();
			}

			switch (venVal) {
				case '1':
					kategori = 'Asuransi';
					break;

				case '2':
					kategori = 'Produksi';
					break;
						
				default:
					kategori = 'Pengurusan & Perijinan';
					break;
			}

			nama.innerHTML = kategori;
		})
	})
</script>