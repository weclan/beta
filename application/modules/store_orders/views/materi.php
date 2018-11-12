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
	.check {
		position: absolute;
		top: 390px;
		right: 40px;
	}
	input[type="checkbox"] {
		border-radius: 3px;
	    background: none;
	    position: absolute;
	    top: 1px;
	    left: 0;
	    height: 18px;
	    width: 18px;
	}

	.m-portlet.m-portlet--full-height {
	    *height: calc(100% - 12.2rem);
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
					<a class="nav-link m-tabs__link active" href="<?= base_url() ?>store_orders/materi/<?= $update_id ?>">
						Materi
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" href="<?= base_url() ?>store_orders/complains/<?= $update_id ?>">
						Komplain
					</a>
				</li>
				<li class="nav-item m-tabs__item">
					<a class="nav-link m-tabs__link" href="<?= base_url() ?>store_orders/report/<?= $update_id ?>">
						Laporan
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
					

					<div class="row">

						<?php
						if (isset($query)) {
						?> 	

						<?php
						$no = 0;
						$color = array('accent', 'danger', 'accent2', 'success', 'warning', 'info', 'primary', 'brand', 'focus');
						$this->load->module('timedate');
						foreach ($query->result() as $row) {
							$pic = $row->materi;
							$date = $this->timedate->get_nice_date($row->created_at, 'cool');
							$select = $row->selected;

							if ($select == 1) {
								$checked = "checked";
							} else {
								$checked = "";
							}
						?>	

							<div class="col-xl-4">
								<!--begin:: Widgets/Blog-->
								<div class="m-portlet m--bg-<?= $color[$no++] ?> m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height ">
									<div class="m-portlet__head m-portlet__head--fit">
										
									</div>
									<div class="m-portlet__body" style="">
										<div class="m-widget19">
											<div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
												<img src="<?= base_url() ?>marketplace/materi/convert/<?= $pic ?>" alt="">
												
											</div>
										</div>
										<div class="m-widget7 m-widget7--skin-dark">
											<div class="m-widget7__user">
												
												<div class="m-widget7__info">
													<span class="m-widget7__username">
														<?= $row->materi ?>
													</span>
													<br>
													<span class="m-widget7__time">
														<?= $date ?>
													</span>
												</div>
											</div>
											
										</div>

									</div>
									<div class="row1">
										<div class="col-lg-10"></div>
										<div class="col-lg-2">
											<input type="checkbox" id="<?= $row->id ?>" value="Value<?= $row->id ?>" name="" class="pull-right" onclick="selectOnlyThis(this.id)" <?= $checked ?> >
										</div>
									</div>
								</div>
								<!--end:: Widgets/Blog-->
							</div>

						<?php } } ?>	

							

							
						</div>


				</div>
				
			</div>

		</div>
	
</div>
<!--end::Portlet-->

<script>
	var count = document.querySelectorAll('input.pull-right').length; // document.querySelector('.row1').getElementsByTagName('input').length;
	console.log(count);

	function selectOnlyThis(id) {
	    for (var i = 1; i <= count; i++)
	    {
	        document.getElementById(i).checked = false;
	    }
	    document.getElementById(id).checked = true;

	    console.log(id);

	    // ajax nya

	    jQuery.ajax({
            type: 'POST',
            url: '<?= base_url() ?>manage_materi/pickSelect',  
            data: {user_id:<?= $user_id ?>, order_id:<?= $update_id ?>, id:id},
            success: function (resp) {
                swal("Sukses","data telah di update", "success");
            }
        });

	}
</script>