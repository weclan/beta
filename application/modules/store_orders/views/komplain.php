<?php
$this->load->module('timedate');
	$user = Client::view_by_id($shopper_id);
	$name = $user->username.' - '.$user->company;
	$pic = $user->pic;
?>

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

			<ul class="nav nav-tabs  m-tabs-line m-tabs-line--2x m-tabs-line--success" role="tablist">
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
					<a class="nav-link m-tabs__link active" href="<?= base_url() ?>store_orders/complains/<?= $update_id ?>">
						Komplain
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" href="<?= base_url() ?>store_orders/ulasan/<?= $update_id ?>">
						Ulasan
					</a>
				</li>
			</ul>

			<div class="tab-content">
				
				<div class="tab-pane active">

					<div class="m-widget3">
						<?php
						if (isset($query)) {
						?> 	

						<?php
						$this->load->module('manage_complain');
						$this->load->module('timedate');
						foreach ($query->result() as $row) {
							$user = Client::view_by_id($row->user_id);
							$name = $user->username.' - '.$user->company;
							$pic = $user->pic;
							$judul = $row->headline;
					        $body = $row->komplain_body;
					        $image = $row->image;
					        $status = $this->manage_complain->statuta($row->status);
					        $date = $this->timedate->get_nice_date($row->created_at, 'cool');
						
						?>
							<div class="m-widget3__item">
								<div class="m-widget3__header">
									<div class="m-widget3__user-img">
										<img class="m-widget3__img" src="<?php echo base_url(); ?><?php echo ($pic != '') ? 'marketplace/photo_profil/'.$pic : 'marketplace/images/default_v3-usrnophoto1.png'?>" alt="">
									</div>
									<div class="m-widget3__info">
										<span class="m-widget3__username">
											<?= $name ?>
										</span>
										<br>
										<span class="m-widget3__time">
											<?= $date ?>
										</span>
									</div>
									<span class="m-widget3__status m--font-<?= ($status == 'Solved')? 'success' : 'danger' ?>">
										<?= $status ?>
									</span>
								</div>
								<div class="m-widget3__body">
									<h5><?= $judul ?></h5>
									<p class="m-widget3__text">
										<?= $body ?>
									</p>
								</div>
							</div>

						<?php } ?>	

						<?php } 
						?>
						
											
					</div>
				</div>
				
			</div>


		</div>
</div>
<!--end::Portlet-->


