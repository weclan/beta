<!-- <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
	<div class="m-alert__icon">
		<i class="flaticon-exclamation m--font-brand"></i>
	</div>
	<div class="m-alert__text">
		The Metronic Datatable component supports initialization from HTML table. It also defines the schema model of the data source. In addition to the visualization, the Datatable provides built-in support for operations over data such as sorting, filtering and paging performed in user browser(frontend).
	</div>
</div> -->
<!-- alert -->
<?php 
if (isset($flash)) {
	echo $flash;
}
?>
<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Database Kontak
				</h3>
			</div>
			
		</div>
		
	</div>

<?php
	$create_contact_url = base_url()."manage_kontak/create";
?>

	<div class="m-portlet__body">
		<!--begin: Search Form -->
		<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
			<div class="row align-items-center">
				<div class="col-xl-8 order-2 order-xl-1">
					<div class="form-group m-form__group row align-items-center">
						<div class="col-md-4">
							<div class="m-input-icon m-input-icon--left">
								<input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
								<span class="m-input-icon__icon m-input-icon__icon--left">
									<span>
										<i class="la la-search"></i>
									</span>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 order-1 order-xl-2 m--align-right">
					<a href="<?= $create_contact_url ?>" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-plus-square"></i>
							<span>
								Tambah Kontak
							</span>
						</span>
					</a>
					<div class="m-separator m-separator--dashed d-xl-none"></div>
				</div>
			</div>
		</div>
		<!--end: Search Form -->
		<!--begin: Datatable -->
			<div class="m_datatable" id="local_data"></div>
		<!--end: Datatable -->
	</div>
</div>


<script>

// auto load

setTimeout(gettabel, 3000);

	function gettabel(){
        jQuery.ajax({
            type: 'POST',
            url: '<?= base_url() ?>manage_kontak/getData',  
            dataType: 'json',
            success: function (resp) {
                loadtabel(resp);
            },
           	error: function (xhr,status,error) {             
                swal("Data tidak ditemukan!","Silahkan cek database","warning")
            }
        });
    }

    function loadtabel(data){

        var DatatableDataLocalDemo={init:function(){           

        $('.m_datatable').mDatatable('destroy');
        var d=$(".m_datatable").mDatatable({data:{type:"local",source:data,pageSize:10},
            layout:{
                theme:"default","class":"",scroll:!1,footer:!1},
                sortable:!0,pagination:!0,search:{input:$("#generalSearch")},
                columns:[

		            {field:"#", width: 30, sortable:1, textAlign:"right", title:"#"},
		            {field:"Nama", title:"Nama"},
		            {field:"Telpon",title:"Telpon"},
		            {field:"Email",title:"Email"},
		            {field:"Subjek",title:"Subjek"},
		            {field:"Pesan",title:"Pesan"},
		            {field:"Waktu",title:"Waktu"},
		            {field:"Aksi",title:"Aksi"},

        	    ]
        	});
        a=d.getDataSourceQuery();
        $("#m_form_status").on("change",function(){d.search($(this).val(),"aktif")}).val(void 0!==a.aktif?a.aktif:"");
        $("#m_form_type").on("change",function(){d.search($(this).val(),"Type")}).val(void 0!==a.Type?a.Type:"");
        $("#m_form_status, #m_form_type").selectpicker()}};jQuery(document).ready(function(){DatatableDataLocalDemo.init()});

    }


    function hapus_dokumen(id){
		swal({
			title: "Yakin menghapus data?",
			text: "Data dan File akan terhapus permanen!",
			type: "warning",
			showCancelButton:!0,confirmButtonText:"Ya, Hapus!!"
		})
		.then(function(e){
			e.value&&
		  	$.ajax({
	        type : "POST",
	        url  : "<?php echo base_url()?>manage_kontak/delete/" + id ,
	        // dataType : "JSON",
	                // data : {kode: kode},
	                success: function(data){
	                        swal({
							  title: "Berhasil dihapus!",
							  text: "Data dan File Berhasil dihapus",
							  type: "success",
							});
	                        gettabel();
	                }
            });
		})
    }
</script>