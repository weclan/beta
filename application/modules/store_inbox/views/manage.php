<?php
$create_msg_url = base_url()."store_inbox/create";
?>
<div id="inbox" class="tab-pane fade in active">
    <div class="row">
        <div class="col-md-6">
            <h2>Your Inbox</h2>
        </div>
        <div class="col-md-6">
            <a href="<?= $create_msg_url ?>" class="button btn-small yellow pull-right">Compose Message</a>
        </div>
    </div>
    <div class="row image-box listing-style2 add-clearfix">
        
    	 <!-- alert -->
                <?php 
                if (isset($flash)) {
                    echo $flash;
                }
                ?>
        
    	<div class="col-sm-12 no-float no-padding">

			<table class="table table-bordered">
	  			<thead>
	  				<tr style="background-color: #666; color: #fff; font-weight: bold;">
	  					<th></th>
	  					<th>Date Sent</th>
	  					<th>Sent By</th>
	  					<th>Subject</th>
	  					<th>Aksi</th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  				<?php 
				  	$this->load->module('site_settings');
				  	$this->load->module('timedate');
				  	$this->load->module('manage_daftar');
				  	$team_name = $this->site_settings->_get_support_team_name();

				  	foreach ($query->result() as $row) { 

				  		$view_url = base_url().'store_inbox/view/'.$row->code;

				  		$customer_data['username'] = $row->username;
				  		$customer_data['company'] = $row->company;

				  		$opened = $row->opened;

				  		if ($opened == 1) {
			  				$icon = '<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>';
			  			} else {
			  				$icon = '<span class="glyphicon glyphicon-envelope" aria-hidden="true" style="color: orange;"></span>';
			  			}

			  			$date_sent = $this->timedate->get_nice_date($row->date_created, 'mini');

			  			if ($row->sent_by == 0) {
			  				$sent_by = $team_name;		
			  			} else {
			  				$sent_by = $this->manage_daftar->_get_customer_name($row->sent_by, $customer_data);
			  			}	
				  	?>
					<tr>
						<td class="span1"><?= $icon ?></td>
					  	<td><?= $date_sent ?></td>
					  	<td><?= $sent_by ?></td>
					  	<td><?= $row->subject ?></td>
					  	<td>
					  		<a class="button btn-small sky-blue1" href="<?= $view_url ?>">
								<span class="fa fa-eye" aria-hidden="true"></span> view 
							</a>
					  	</td>
					</tr>
					<?php } ?>
	  			</tbody>
			</table>

		</div>

    </div>
</div>