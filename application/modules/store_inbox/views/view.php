<?php
$back = base_url().'store_inbox';
?>
<div class="tab-pane fade in active">

	<div class="row">
		<div class="col-md-6">
	    	<h2>Detail Enquiry</h2>
	    </div>

	    <div class="col-md-6">
	        <a href="<?= $back ?>" class="button btn-small yellow pull-right">BACK</a>
	    </div>
	</div>  

	<div class="col-sm-12 no-float no-padding">
		<div class="row">
			<div class="col-md-6">
				<p style="">Message sent on <?= $date_created ?></p>	
			</div>
			<div class="col-md-6">
				<?php
				$create_msg_url = base_url()."store_inbox/create/".$code;
				?>
				<p style="">
					<a href="<?php echo $create_msg_url; ?>">
						<button type="button" class="button btn-small green">Reply</button>
					</a>
				</p>	
			</div>
		</div>
		<hr>
		<h3 style="margin-top:8px;"><?= $subject ?></h3>
		<p><?= $message ?></p>

	</div>

</div>