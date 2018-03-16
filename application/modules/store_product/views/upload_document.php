<?php
$back = base_url().'store_product/create/'.$update_id;
?>

<div class="tab-pane fade in active">

	<div class="row">
		<div class="col-md-6">
	    	<h2>Upload Dokumen</h2>
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

		<div>
	    	<div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>KTP</label>
                </div>
                <div class="col-sms-5 col-sm-5" id="ktp">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="file" id="file" data-id="12" data-type="ktp" data-placeholder="select image">
	                </div>
	                <span id="uploaded_image"></span>
                </div>
                <div class="col-sms-2 col-sm-2">
                    <div id="ini"></div>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Tulis nama produk sesuai jenis, merek, dan rincian produk.</span>
                </div>
            </div>

	        <hr>

	        <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>NPWP</label>
                </div>
                <div class="col-sms-5 col-sm-5" id="npwp">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="file" id="file2" data-id="13" data-type="npwp" data-placeholder="select image">
	                </div>
	                <span id="uploaded_image2"></span>
                </div>
                <div class="col-sms-2 col-sm-2">
                    <div id="ini2"></div>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Tulis nama produk sesuai jenis, merek, dan rincian produk.</span>
                </div>
            </div>

            <hr>

	        <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>SURAT TANAH</label>
                </div>
                <div class="col-sms-5 col-sm-5" id="sertifikat">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="file" id="file3" data-id="14" data-type="sertifikat" data-placeholder="select image">
	                </div>
	                <span id="uploaded_image3"></span>
                </div>
                <div class="col-sms-2 col-sm-2">
                    <div id="ini3"></div>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Tulis nama produk sesuai jenis, merek, dan rincian produk.</span>
                </div>
            </div>

            <hr>

	        <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>IJIN REKLAME</label>
                </div>
                <div class="col-sms-5 col-sm-5" id="ijin">
                	<div class="fileinput full-width">
	                    <input type="file" class="input-text" name="file" id="file4" data-id="15" data-type="ijin" data-placeholder="select image">
	                </div>
	                <span id="uploaded_image4"></span>
                </div>
                <div class="col-sms-2 col-sm-2">
                    <div id="ini4"></div>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Tulis nama produk sesuai jenis, merek, dan rincian produk.</span>
                </div>
            </div>

	    </div>

<?php
if ($ktp != '') {
	echo $ktp;
	echo '<br>';
}
if ($npwp != '') {
	echo $npwp;
	echo '<br>';
}
if ($sertifikat != '') {
	echo $sertifikat;
	echo '<br>';
}
if ($ijin != '') {
	echo $ijin;
}
?>


	</div>
</div>

<script type="text/javascript">
tjq(document).ready(function() {

// initial process upload
	tjq('#file').change(function() {
		// set target
		let target = tjq('#uploaded_image');
		let target2 = tjq('#ini');
		let wrap = tjq('#ktp label, #ktp input');
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

	tjq('#file2').change(function() {
		// set target
		let target = tjq('#uploaded_image2');
		let target2 = tjq('#ini2');
		let wrap = tjq('#npwp label, #npwp input');
		let source = document.getElementById('file2');
 
		let property = source.files[0];
		let idd = source.dataset.id;
		let tipe = source.dataset.type;
		let image_name = property.name;
		let image_extension = image_name.split('.').pop().toLowerCase();
		let image_size = property.size;
		

		process(property, idd, tipe, image_extension, image_size, target, target2, wrap);
	})

	tjq('#file3').change(function() {
		// set target
		let target = tjq('#uploaded_image3');
		let target2 = tjq('#ini3');
		let wrap = tjq('#sertifikat label, #sertifikat input');
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

	tjq('#file4').change(function() {
		// set target
		let target = tjq('#uploaded_image4');
		let target2 = tjq('#ini4');
		let wrap = tjq('#ijin label, #ijin input');
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
	let wrap = tjq('#'+type+' label, #'+type+' input');
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
	
	// tjq('#ini').on('click', '.tombol-12', function() {
	// 	let source = document.getElementById('tombol-12');
	// 	let token = source.dataset.token;
	// 	let type = source.dataset.type;
	// 	let wrap = tjq('#ktp label, #ktp input');
	// 	console.log(token+' '+type);

	// 	deleteImage(token, type, wrap);
	// })

	// tjq('#ini2').on('click', '.tombol-13', function() {
	// 	let source = document.getElementById('tombol-13');
	// 	let token = source.dataset.token;
	// 	let type = source.dataset.type;
	// 	let wrap = tjq('#npwp label, #npwp input');
	// 	console.log(token+' '+type);

	// 	deleteImage(token, type, wrap);
	// })

	// tjq('#ini3').on('click', '.tombol-14', function() {
	// 	let source = document.getElementById('tombol-14');
	// 	let token = source.dataset.token;
	// 	let type = source.dataset.type;
	// 	let wrap = tjq('#sertifikat label, #sertifikat input');
	// 	console.log(token+' '+type);

	// 	deleteImage(token, type, wrap);
	// })

	// tjq('#ini4').on('click', '.tombol-15', function() {
	// 	let source = document.getElementById('tombol-15');
	// 	let token = source.dataset.token;
	// 	let type = source.dataset.type;
	// 	let wrap = tjq('#ijin label, #ijin input');
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

			tjq.ajax({
				url:"<?php echo base_url('store_product/process_upload');?>",
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
		let target = tjq('#uploaded_image');
		tjq.ajax({
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
			target = tjq('#uploaded_image');
		} else if (type == 'npwp') {
			target = tjq('#uploaded_image2');
		} else if (type == 'sertifikat') {
			target = tjq('#uploaded_image3');
		} else {
			target = tjq('#uploaded_image4');
		}
		tjq.ajax({
			url:"<?php echo base_url('Upload/delete');?>",
			method: "POST",
			data:{id:token, tipe:type},
			dataType: 'json',
			success: function(data) {
				target.html(data);
				wrap.show();
				tjq('button[data-type="'+type+'"]').remove();
			}
		})  
	}

	setTimeout(ngeLoad(), 5000);


});
</script>
