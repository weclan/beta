<style>
	#item_price {
		font-size: 24px; font-weight: bold; color: #f4516c; float: right;
	}
</style>


<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-demo__preview m-demo__preview--btn">
				<?php 
				$timer_status = Project::timer_status('order', $update_id, $shopper_id);
				$label = ($timer_status == 'On') ? 'danger' : 'secondary';	
				if ($timer_status == 'On') : ?>
					<a href="<?=base_url()?>store_orders/tracking/off/<?=$update_id?>" class="btn btn-<?= $label ?> m-btn m-btn--icon"  title="start timer">
						<i class="la la-dashboard"></i>Stop
					</a>
				<?php else: ?>
					<a href="<?=base_url()?>store_orders/tracking/on/<?=$update_id?>" class="btn btn-<?= $label ?> m-btn m-btn--icon"  title="stop timer">
						<i class="la la-dashboard"></i>Start
					</a>
				<?php endif; ?>

				<a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/mark_complete/<?=$update_id?>/store_orders');" data-toggle="modal" data-target="#m_modal" class="btn btn-info m-btn m-btn--icon" data-container="body" data-toggle="m-popover" data-placement="bottom" data-content="Mark as Complete" data-skin="dark">
					<i class="la la-check-square"></i>Done
				</a>

				<a href="#" onclick="showAjaxModal('<?= base_url()?>modal/popup/delete/<?=$update_id?>/store_orders');" data-toggle="modal" data-target="#m_modal" class="btn btn-danger m-btn m-btn--icon" data-container="body" data-toggle="m-popover" data-placement="bottom" data-content="Delete Order" data-skin="dark">
					<i class="la la-trash"></i>Delete
				</a>
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

	
		<div class="m-portlet__body">

			<ul class="nav nav-tabs  m-tabs-line m-tabs-line--2x m-tabs-line--success" role="tablist">
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_6_1" role="tab">
						Dashboard
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_2" role="tab">
						Task
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_3" role="tab">
						Chats
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_4" role="tab">
						Materi
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_5" role="tab">
						Kompalin
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_6" role="tab">
						Ulasan
					</a>
				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="m_tabs_6_1" role="tabpanel">
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</div>
				<div class="tab-pane" id="m_tabs_6_2" role="tabpanel">
					It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</div>
				<div class="tab-pane" id="m_tabs_6_3" role="tabpanel">
					<div class="container">
						<div class="col-md-5" id="left-side2">
							lorem ipsum
						</div>
						<div class="col-md-5" id="right-side2" style="border-left: 1px dashed #ddd;">
							dolor sit amet	
						</div>
					</div>
				</div>
			</div>


	<?php
	$shopper = Client::view_by_id($shopper_id);
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'store_orders/edit', $attributes); 
	?>	
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
							<?= $lokasi ?> - #<?= $prod_code ?>
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

<script type="text/javascript">
    function showAjaxModal(url)
    {
        // SHOWING AJAX loader-1 IMAGE
        jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>marketplace/images/loading.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
        
        //alert(url);
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#modal_ajax .modal-content').html(response);

            }
        });
    }

    function showAjaxModal2(url)
    {
        // SHOWING AJAX loader-1 IMAGE
        jQuery('#m_modal_4 .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>marketplace/images/loading.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#m_modal_4').modal('show', {backdrop: 'true'});
        
        //alert(url);
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#m_modal_4 .modal-content').html(response);
                $('#summernote').summernote({
                	height: 200,
			    	dialogsInBody: true
			    });
            }
        });
    }
    </script>
    
    <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
			</div>
		</div>
	</div>

	<!-- modal width -->

    <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				
			</div>
		</div>
	</div>
    
    <!-- end modal width -->



<script>
	$(document).ready(function () {
		var tab = $('.m-portlet__body').height();
		$('.m-messenger__messages').height(tab);
		console.log(tab);
	})
</script>

<script>
	// add comment

	function addCommment(e) {
		if (e.keyCode == 13) {
			var comment = document.getElementById('comment-body').value;
			var user_id = 0;

			$.ajax({
				url: '<?= base_url() ?>request/addComment',
				method: 'POST',
				data:{req_id:<?=$id?>, user_id:user_id, comment:comment},
				success: function(res) {

					$('#alerte').html('komentar ditambahkan!')
					.delay(3000)
					.fadeOut();
					showComment();
					$('#comment-body').val('');
				}
			})
		}
	}


	// show comment

	function showComment() {
		$.ajax({
			url: '<?= base_url() ?>request/getComment',
			method: 'POST',
			data:{req_id:<?=$id?>},
			success: function(res) {
				$('#mCSB_8_container').html(res);
				$('#comment-body').attr('value', '');

			}
		})
	}

	showComment();

</script>
