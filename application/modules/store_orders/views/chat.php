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

	#alerte-owner, #alerte-client {
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
					<a class="nav-link m-tabs__link active" href="<?= base_url() ?>store_orders/chats/<?= $update_id ?>">
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
					<a class="nav-link m-tabs__link" href="<?= base_url() ?>store_orders/ulasan/<?= $update_id ?>">
						Ulasan
					</a>
				</li>
			</ul>

			<div class="tab-content">
				
				<div class="tab-pane active">
					<div class="m-content">
						<div class="row">
							<div class="col-md-6">
								<h5 class="ket-klien">Pemilik Titik</h5>
								<div class="tab-pane m-scrollable active" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
									<div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
										<div class="m-messenger__messages mCustomScrollbar _mCS_8 mCS-autoHide" style="height: 550px; position: relative; overflow: visible; "><div id="mCSB_8" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;"><div id="mCSB_8_container_owner" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
											
											<!--  -->
										

										</div></div><div id="mCSB_8_scrollbar_vertical" class="mCSB_scrollTools mCSB_8_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_8_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 36px; max-height: 177px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
										<div class="m-messenger__seperator"></div>
										<div class="m-messenger__form">
											<div class="m-messenger__form-controls">
												<input type="text" name="" id="comment-body-owner" placeholder="Type here..." class="m-messenger__form-input" onkeypress="return addCommmentOwner(event)">
											</div>
											<div class="m-messenger__form-tools">
												<a href="#" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
													<i class="fa flaticon-speech-bubble"></i>
												</a>
												<!-- <a href="" class="m-messenger__form-attachment">
													<i class="la la-paperclip"></i>
												</a> -->
											</div>
										</div>
										<span id="alerte-owner"></span>
									</div>
								</div>

							</div>
							<div class="col-md-6" style="border-left: 1px dashed #ddd;">
								<h5 class="ket-klien">Penyewa</h5>
								<div class="tab-pane m-scrollable active" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
									<div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
										<div class="m-messenger__messages mCustomScrollbar _mCS_8 mCS-autoHide" style="height: 550px; position: relative; overflow: visible; "><div id="mCSB_8" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;"><div id="mCSB_8_container_client" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
											
											<!--  -->
											

										</div></div><div id="mCSB_8_scrollbar_vertical" class="mCSB_scrollTools mCSB_8_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_8_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 36px; max-height: 177px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
										<div class="m-messenger__seperator"></div>
										<div class="m-messenger__form">
											<div class="m-messenger__form-controls">
												<input type="text" name="" id="comment-body-client" placeholder="Type here..." class="m-messenger__form-input" onkeypress="return addCommmentClient(event)">
											</div>
											<div class="m-messenger__form-tools">
												<a href="#" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
													<i class="fa flaticon-speech-bubble"></i>
												</a>
												<!-- <a href="" class="m-messenger__form-attachment">
													<i class="la la-paperclip"></i>
												</a> -->
											</div>
										</div>
										<span id="alerte-client"></span>
									</div>
								</div>

							</div>
						</div>
					</div>
					
				</div>
				
			</div>


	</div>
</div>
<!--end::Portlet-->


<script>
	// $(document).ready(function () {
	// 	var tab = $('.m-portlet__body').height();
	// 	$('.m-messenger__messages').height(tab);
	// 	console.log(tab);
	// })
</script>

<script>
	// add comment

	function addCommmentClient(e) {
		if (e.keyCode == 13) {
			var comment = document.getElementById('comment-body-client').value;
			var user_id = 0;

			$.ajax({
				url: '<?= base_url() ?>store_orders/addCommentClient',
				method: 'POST',
				data:{order_id:<?=$update_id?>, user_id:user_id, comment:comment},
				success: function(res) {

					$('#alerte-client').html('komentar ditambahkan!')
					.delay(3000)
					.fadeOut();
					showCommentClient();
					$('#comment-body-client').val('');
				}
			})
		}
	}

	function addCommmentOwner(e) {
		if (e.keyCode == 13) {
			var comment = document.getElementById('comment-body-owner').value;
			var user_id = 0;

			$.ajax({
				url: '<?= base_url() ?>store_orders/addCommentOwner',
				method: 'POST',
				data:{order_id:<?=$update_id?>, user_id:user_id, comment:comment},
				success: function(res) {

					$('#alerte-owner').html('komentar ditambahkan!')
					.delay(3000)
					.fadeOut();
					showCommentOwner();
					$('#comment-body-owner').val('');
				}
			})
		}
	}


	// show comment

	function showCommentClient() {
		$.ajax({
			url: '<?= base_url() ?>store_orders/getCommentClient',
			method: 'POST',
			data:{order_id:<?=$update_id?>, cat:'client'},
			success: function(res) {
				$('#mCSB_8_container_client').html(res);
				$('#comment-body-client').attr('value', '');

			}
		})
	}

	function showCommentOwner() {
		$.ajax({
			url: '<?= base_url() ?>store_orders/getCommentOwner',
			method: 'POST',
			data:{order_id:<?=$update_id?>, cat:'owner'},
			success: function(res) {
				$('#mCSB_8_container_owner').html(res);
				$('#comment-body-owner').attr('value', '');

			}
		})
	}

	showCommentClient();
	showCommentOwner();

</script>
