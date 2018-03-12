
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

	<?php $cancel = base_url().'manage_product/create/'.$update_id; ?>	

		<div class="m--align-right" style="display: table-cell; vertical-align: middle;">
			<a href="<?= $cancel ?>" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
				<span>
					<i class="la la-undo"></i>
					<span>
						Back
					</span>
				</span>
			</a>
		</div>

		<div class="m--align-right" style="display: table-cell; vertical-align: middle;">
			<?php
			if (isset($error)) {

				foreach ($error as $value) {
					echo $value;
				}
			}
			?>
			<div class="m-separator m-separator--dashed d-xl-none"></div>
		</div>

	</div>
	<!--begin::Form-->

	<div class="m-form m-form--fit m-form--label-align-right">

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
					KTP
				</label>
				<div class="col-6" id="ktp">
					<label class="custom-file">
						<input type="file" name="file" class="custom-file-input" id="file" data-id="12" data-type="ktp">
						<span class="custom-file-control form-control"></span>
					</label>
					<span class="m-form__help">
						
					</span>
					<span id="uploaded_image"></span>
				</div>
				<div class="col-2">
					<div id="ini"></div>
				</div>
				<div class="col-2">
					Ukuran 1920 x 1200
				</div>
			</div>

		</div>

		<div class="m-separator m-separator--dashed m-separator--md"></div>

		<div class="m-portlet__body">
			
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Surat Tanah
				</label>
				<div class="col-6" id="sertifikat">
					<label class="custom-file">
						<input type="file" name="file" class="custom-file-input" id="file3" data-id="14" data-type="sertifikat"> 
						<span class="custom-file-control form-control"></span>
					</label>
					<span class="m-form__help">
						
					</span>
					<span id="uploaded_image3"></span>
				</div>
				<div class="col-2">
					<div id="ini3"></div>
				</div>
				<div class="col-2">
					Ukuran 1920 x 1200
				</div>
			</div>

		</div>

		<div class="m-separator m-separator--dashed m-separator--md"></div>

		<div class="m-portlet__body">
			
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Ijin Reklame
				</label>
				<div class="col-6" id="ijin">
					<label class="custom-file">
						<input type="file" name="file" class="custom-file-input" id="file4" data-id="15" data-type="ijin"> 
						<span class="custom-file-control form-control"></span>
					</label>
					<span class="m-form__help">
						
					</span>
					<span id="uploaded_image4"></span>
				</div>
				<div class="col-2">
					<div id="ini4"></div>
				</div>
				<div class="col-2">
					Ukuran 1920 x 1200
				</div>
			</div>
				
		</div>

		<div class="m-separator m-separator--dashed m-separator--md"></div>

		<div class="m-portlet__body">
			
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					NPWP
				</label>
				<div class="col-6" id="npwp">
					<label class="custom-file">
						<input type="file" name="file" class="custom-file-input" id="file2" data-id="13" data-type="npwp">
						<span class="custom-file-control form-control"></span>
					</label>
					<span class="m-form__help">
						
					</span>
					<span id="uploaded_image2"></span>
				</div>
				<div class="col-2">
					<div id="ini2"></div>
				</div>
				<div class="col-2">
					Ukuran 1920 x 1200
				</div>
			</div>
				
		</div>
	</div>	
</div>
<!--end::Portlet-->


<script type="text/javascript">
$(document).ready(function() {

// initial process upload
	$('#file').change(function() {
		// set target
		let target = $('#uploaded_image');
		let target2 = $('#ini');
		let wrap = $('#ktp label, #ktp input');
		let source = document.getElementById('file');
 
		let property = source.files[0];
		let idd = source.dataset.id;
		let tipe = source.dataset.type;
		let image_name = property.name;
		let image_extension = image_name.split('.').pop().toLowerCase();
		let image_size = property.size;
		
		// process upload
		process(property, idd, tipe, image_extension, image_size, target, target2, wrap);
	})

	$('#file2').change(function() {
		// set target
		let target = $('#uploaded_image2');
		let target2 = $('#ini2');
		let wrap = $('#npwp label, #npwp input');
		let source = document.getElementById('file2');
 
		let property = source.files[0];
		let idd = source.dataset.id;
		let tipe = source.dataset.type;
		let image_name = property.name;
		let image_extension = image_name.split('.').pop().toLowerCase();
		let image_size = property.size;
		

		process(property, idd, tipe, image_extension, image_size, target, target2, wrap);
	})

	$('#file3').change(function() {
		// set target
		let target = $('#uploaded_image3');
		let target2 = $('#ini3');
		let wrap = $('#sertifikat label, #sertifikat input');
		let source = document.getElementById('file3');
 
		let property = source.files[0];
		let idd = source.dataset.id;
		let tipe = source.dataset.type;
		let image_name = property.name;
		let image_extension = image_name.split('.').pop().toLowerCase();
		let image_size = property.size;
		
		// process upload
		process(property, idd, tipe, image_extension, image_size, target, target2, wrap);
	})

	$('#file4').change(function() {
		// set target
		let target = $('#uploaded_image4');
		let target2 = $('#ini4');
		let wrap = $('#ijin label, #ijin input');
		let source = document.getElementById('file4');
 
		let property = source.files[0];
		let idd = source.dataset.id;
		let tipe = source.dataset.type;
		let image_name = property.name;
		let image_extension = image_name.split('.').pop().toLowerCase();
		let image_size = property.size;
		
		// process upload
		process(property, idd, tipe, image_extension, image_size, target, target2, wrap);
	})

// end initial process upload


// initial process delete	

document.body.addEventListener('click', deleteItem);

function deleteItem(e) {
	// console.log(e.target);
	let source = e.target;
	let token = source.dataset.token;
	let type = source.dataset.type;
	let wrap = $('#'+type+' label, #'+type+' input');
	console.log(token+' '+type);
	if (e.target.className === 'btn btn-danger tombol-12') {
		console.log('tombol-12 deleted');
		deleteImage(token, type, wrap);
	} else if (e.target.className === 'btn btn-danger tombol-13') {
		console.log('tombol-13 deleted');
		deleteImage(token, type, wrap);	
	} else if (e.target.className === 'btn btn-danger tombol-14') {
		console.log('tombol-14 deleted');
		deleteImage(token, type, wrap);	
	} else if (e.target.className === 'btn btn-danger tombol-15') {
		console.log('tombol-15 deleted');
		deleteImage(token, type, wrap);	
	}

}
	
	// $('#ini').on('click', '.tombol-12', function() {
	// 	let source = document.getElementById('tombol-12');
	// 	let token = source.dataset.token;
	// 	let type = source.dataset.type;
	// 	let wrap = $('#ktp label, #ktp input');
	// 	console.log(token+' '+type);

	// 	deleteImage(token, type, wrap);
	// })

	// $('#ini2').on('click', '.tombol-13', function() {
	// 	let source = document.getElementById('tombol-13');
	// 	let token = source.dataset.token;
	// 	let type = source.dataset.type;
	// 	let wrap = $('#npwp label, #npwp input');
	// 	console.log(token+' '+type);

	// 	deleteImage(token, type, wrap);
	// })

	// $('#ini3').on('click', '.tombol-14', function() {
	// 	let source = document.getElementById('tombol-14');
	// 	let token = source.dataset.token;
	// 	let type = source.dataset.type;
	// 	let wrap = $('#sertifikat label, #sertifikat input');
	// 	console.log(token+' '+type);

	// 	deleteImage(token, type, wrap);
	// })

	// $('#ini4').on('click', '.tombol-15', function() {
	// 	let source = document.getElementById('tombol-15');
	// 	let token = source.dataset.token;
	// 	let type = source.dataset.type;
	// 	let wrap = $('#ijin label, #ijin input');
	// 	console.log(token+' '+type);

	// 	deleteImage(token, type, wrap);
	// })


// function validation & upload process
	function process(property, idd, tipe, image_extension, image_size, target, target2, wrap) {

		if (jQuery.inArray(image_extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
			alert('Invalid Image File');
		} 

		if (image_size > 2000000) {
			alert('Image size is too big');
		} else {
			let form_data = new FormData();
			form_data.append("file", property);
			var objArr = [];

			objArr.push({"id": idd, "type": tipe, "segment":<?= $this->uri->segment(3) ?>});

			//JSON obj
			form_data.append('objArr', JSON.stringify( objArr ));

			$.ajax({
				url:"<?php echo base_url('manage_product/process_upload');?>",
				method: "POST",
				data: form_data,
				dataType: 'json',
				contentType:false,
				cache:false,
				processData:false,
				beforeSend: function() {
					target.html('<label class="text-success">Image Uploading...</label>');
				},
				success: function(data) {
					target.html(data.gambar);
					target2.html('<button type="button" id="tombol-'+idd+'" data-token="'+data.token+'" data-type="'+data.type+'" class="btn btn-danger tombol-'+idd+'">Delete</button>');
					wrap.hide();
				}
			})
		}
	}

// function ngeload process
	function ngeLoad () {
		let target = $('#uploaded_image');
		$.ajax({
			url:"<?php echo base_url('Upload/load');?>",
			method: "POST",
			dataType: 'json',
			success: function(data) {
				target.html(data);
			}
		}) 	
	} 

// function delete process
	function deleteImage (token, type, wrap) {
		let target;
		if (type == 'ktp') {
			target = $('#uploaded_image');
		} else if (type == 'npwp') {
			target = $('#uploaded_image2');
		} else if (type == 'sertifikat') {
			target = $('#uploaded_image3');
		} else {
			target = $('#uploaded_image4');
		}
		$.ajax({
			url:"<?php echo base_url('Upload/delete');?>",
			method: "POST",
			data:{id:token, tipe:type},
			dataType: 'json',
			success: function(data) {
				target.html(data);
				wrap.show();
				$('button[data-type="'+type+'"]').remove();
			}
		})  
	}

	setTimeout(ngeLoad(), 5000);


});
</script>

