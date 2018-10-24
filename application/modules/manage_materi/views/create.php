
<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
				</h3>
			</div>
		</div>

		
	</div>
	<!--begin::Form-->

	<?php 
	$attribute = array('class' => 'm-form m-form--fit m-form--label-align-right');
	echo form_open('manage_materi/create/'.$update_id, $attribute);
	?>
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
					Order ID
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="no_order" name="no_order" value="<?= $no_order ?>" readonly>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('no_order'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Lokasi
				</label>
				<div class="col-6">
					<textarea class="form-control m-input m-input--air" readonly><?= $lokasi ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('lokasi'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Kode Lokasi
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="kode_lokasi" name="kode_lokasi" value="#<?= $kode_lokasi ?>" readonly>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('kode_lokasi'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Klien
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="klien" name="klien" value="<?= $klien ?>" readonly>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('klien'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Owner
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" id="owner" name="owner" value="<?= $owner ?>" readonly>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('owner'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Waktu Tayang
				</label>
				<div class="col-6">
					<input class="form-control m-input m-input--air" type="text" value="<?= $durasi.' bulan, '.$start.' - '.$end ?>" readonly>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Gambar
				</label>
				<div class="col-6">
					<label class="custom-file">
						<input type="file" id="file2" class="custom-file-input" name="featured_image">
						<span class="custom-file-control form-control"></span>
					</label>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('featured_image'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Status
				</label>
				<div class="col-3">
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

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Selected
				</label>
				<div class="col-3">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$options = array(
							  		'' => 'Please Select',
							  		'1' => 'Selected',
							  		'0' => 'Unselected'  
						  		);
				  	echo form_dropdown('selected', $options, $selected, $additional_dd_code);
				  	?>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('selected'); ?></div>
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

<?php
$path_img = base_url().'marketplace/materi/'.$materi_image;
if ($materi_image != "") { ?>

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Gambar
				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">
		<div class="col-6">
			<div class="m-portlet m-portlet--bordered m-portlet--bordered-semi m-portlet--rounded">
				<img src="<?= $path_img ?>" width="" style="width: 100%;">
			</div>
		</div>
	</div>	
</div>
			
<?php } ?>	