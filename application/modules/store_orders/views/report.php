

<style>
	#item_price {
		font-size: 24px; font-weight: bold; color: #f4516c; float: right;
	}
	.m-messenger__message-username {
		font-weight: 600;
	}
	.tanggal-komen {
		font-style: italic;
		font-size: 11px;
		font-weight: normal;
	}

	#alerte {
		color: red;
		font-weight: 600;
		font-size: 11px;
	}

	h5.ket-klien {
	    color: #333;
	    text-align: center;
	    text-transform: uppercase;
	    font-family: "Roboto", sans-serif;
	    font-weight: bold;
	    position: relative;
	    margin: 20px 0 60px;
	}

	h5.ket-klien::after {
	    content: "";
	    width: 100px;
	    position: absolute;
	    margin: 0 auto;
	    height: 3px;
	    background: #8fbc54;
	    left: 0;
	    right: 0;
	    bottom: -10px;
	}
	.thumb img {
		width: 8.6rem;
	}
</style>


<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			
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

			<?php require_once('tabs.php'); ?>
			<!-- <ul class="nav nav-tabs  m-tabs-line m-tabs-line--2x m-tabs-line--success" role="tablist">
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" href="<?= base_url() ?>store_orders/view/<?= $update_id ?>" >
						Dashboard
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" href="<?= base_url() ?>store_orders/task/<?= $update_id ?>">
						Task
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" href="<?= base_url() ?>store_orders/chats/<?= $update_id ?>">
						Chats
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" href="<?= base_url() ?>store_orders/materi/<?= $update_id ?>">
						Materi
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" href="<?= base_url() ?>store_orders/complains/<?= $update_id ?>">
						Komplain
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link active" href="<?= base_url() ?>store_orders/report/<?= $update_id ?>">
						Laporan
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" href="<?= base_url() ?>store_orders/ulasan/<?= $update_id ?>">
						Ulasan
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" href="<?= base_url() ?>store_orders/invoice/<?= $update_id ?>">
						Invoice
					</a>
				</li>
			</ul> -->

			<div class="tab-content">
				
				<div class="tab-pane active">

                    <div class="m-widget4">
                    	<?php
                    	if (isset($query)) {
                    		
                    	$this->load->module('timedate');
                    	foreach ($query->result() as $row) {
                    		$path_img = base_url().'marketplace/laporan/convert/'.$row->image;
                    		$path_download = base_url().'store_orders/download_report/'.$row->id;
                    		$date = $this->timedate->get_nice_date($row->created_at, 'cool');
                    	?>	
                        <div class="m-widget4__item">
							<div class="m-widget4__img thumb">
								<img class="" src="<?= $path_img ?>" alt="">
							</div>
							<div class="m-widget4__info">
								<span class="m-widget4__text">
									<?= $row->waktu.' - '.$date ?> 
								</span>
							</div>
							<div class="m-widget4__ext">
								<a href="<?= $path_download ?>" class="m-widget4__icon">
									<i class="la la-download"></i>
								</a>
							</div>
						</div>
						
					<?php } } ?>

					</div>
				</div>
				
			</div>


		</div>
</div>
<!--end::Portlet-->


