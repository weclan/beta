
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

		<?php 
		$upload_image = base_url()."manage_product/upload_image/".$update_id;
		$delete_image = base_url()."manage_product/delete_image/".$update_id;
		$add_map = base_url()."manage_product/add_map/".$update_id;
		$add_document = base_url()."manage_product/upload_document/".$update_id;
		$add_maintenance = base_url()."manage_product/upload_maintenance/".$update_id;
		$upload_video = base_url()."manage_product/upload_video/".$update_id;
		$delete_video = base_url()."manage_product/delete_video/".$update_id;
			if (is_numeric($update_id)) { 
		?>	
			<div class="m--align-right" style="display: table-cell; vertical-align: middle;">
				<a href="<?= $add_document ?>" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
					<span>
						<i class="la la-sticky-note"></i>
						<span>
							Upload Dokumen
						</span>
					</span>
				</a>
				<a href="<?= $add_maintenance ?>" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
					<span>
						<i class="la la-wrench"></i>
						<span>
							Report Maintenance
						</span>
					</span>
				</a>
				<a href="<?= $add_map ?>" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
					<span>
						<i class="la la-map-marker"></i>
						<span>
							Lokasi Map
						</span>
					</span>
				</a>
				<?php
				if ($big_pic == "") { ?>
					<a href="<?= $upload_image ?>" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-edit"></i>
							<span>
								Upload Image
							</span>
						</span>
					</a>
				<?php } else { ?>
					<a href="<?= $delete_image ?>" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-eraser"></i>
							<span>
								Delete Image
							</span>
						</span>
					</a>
				<?php } ?>

				<?php
				if ($video == "") { ?>
					<a href="<?= $upload_video ?>" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-edit"></i>
							<span>
								Upload Video
							</span>
						</span>
					</a>
				<?php } else { ?>
					<a href="<?= $delete_video ?>" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-eraser"></i>
							<span>
								Delete Video
							</span>
						</span>
					</a>
				<?php } ?>
				
				<div class="m-separator m-separator--dashed d-xl-none"></div>
			</div>
		<?php } ?>	
	</div>
	<!--begin::Form-->

	<?php 
	$form_location = base_url()."manage_product/create/".$update_id; 
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
				<label for="example-text-input" class="col-2 col-form-label">
					Judul
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="item_title" name="item_title" value="<?= $item_title ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('item_title'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Harga Customer
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="was_price" name="was_price" value="<?= $was_price ?>" disabled="disabled">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('was_price'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Harga Fix
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="item_price" name="item_price" value="<?= $item_price ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('item_price'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Deskripsi
				</label>
				<div class="col-10">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="item_description"><?= $item_description ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('item_description'); ?></div>
				</div>
			</div>
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

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Kecamatan
				</label>
				<div class="col-10">
					<select class="form-control m-input m-input--air" id="kecamatan" name="cat_distric"></select>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_distric'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Alamat
				</label>
				<div class="col-10">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="item_address"><?= $item_address ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('item_address'); ?></div>
				</div>
			</div>
<div class="m-separator m-separator--dashed m-separator--md"></div>
			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Jenis
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$kategori_jenis = array('' => 'Please Select',);
			        foreach ($jenis->result_array() as $row) {
			            $kategori_jenis[$row['id']] = $row['cat_title'];   
			        }
				  	echo form_dropdown('cat_prod', $kategori_jenis, $cat_prod, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_prod'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Kategori Jalan
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$kategori_jalan = array('' => 'Please Select',);
			        foreach ($jalan->result_array() as $row) {
			            $kategori_jalan[$row['id']] = $row['road_title'];   
			        }
				  	echo form_dropdown('cat_road', $kategori_jalan, $cat_road, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_road'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Ukuran
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$kategori_ukuran = array('' => 'Please Select',);
			        foreach ($ukuran->result_array() as $row) {
			            $kategori_ukuran[$row['id']] = $row['size'];   
			        }
				  	echo form_dropdown('cat_size', $kategori_ukuran, $cat_size, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_size'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Ketersediaan
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$kategori_ketersediaan = array(NULL => 'Please Select',);
			        foreach ($ketersediaan->result_array() as $row) {
			            $kategori_ketersediaan[$row['id']] = $row['label_title'];   
			        }
				  	echo form_dropdown('cat_stat', $kategori_ketersediaan, $cat_stat, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_stat'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Tipe
				</label>
				<div class="col-10">
					<div class="m-radio-inline">
						<label class="m-radio">
							<input type="radio" name="cat_type" value="1" <?php if($cat_type == 1){ ?> checked=checked <?php } ?> >
							Horizontal
							<span></span>
						</label>
						<label class="m-radio">
							<input type="radio" name="cat_type" value="2" <?php if($cat_type == 2){ ?> checked=checked <?php } ?> >
							Vertical
							<span></span>
						</label>
					</div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_type'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Light
				</label>
				<div class="col-10">
					<div class="m-radio-inline">
						<label class="m-radio">
							<input type="radio" name="cat_light" value="1" <?php if($cat_light == 1){ ?> checked=checked <?php } ?> >
							Front Light
							<span></span>
						</label>
						<label class="m-radio">
							<input type="radio" name="cat_light" value="2" <?php if($cat_light == 2){ ?> checked=checked <?php } ?> >
							Back Light
							<span></span>
						</label>
					</div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_type'); ?></div>
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

<?php
$path_img = base_url().'marketplace/big_pics/'.$big_pic;
if ($big_pic != "") { ?>

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