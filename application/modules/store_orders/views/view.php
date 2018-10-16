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
						Komplain
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
					dashboard
				</div>
				<div class="tab-pane" id="m_tabs_6_2" role="tabpanel">
					
					<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style=""><table class="m-datatable__table" style="display: block; min-height: 300px; overflow-x: auto;"><thead class="m-datatable__head"><tr class="m-datatable__row" style="height: 56px;"><th data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 50px;"><label class="m-checkbox m-checkbox--single m-checkbox--all m-checkbox--solid m-checkbox--brand"><input type="checkbox"><span></span></label></span></th><th data-field="OrderID" class="m-datatable__cell"><span style="width: 110px;">Order ID</span></th><th data-field="ShipName" class="m-datatable__cell"><span style="width: 110px;">Ship Name</span></th><th data-field="Currency" class="m-datatable__cell"><span style="width: 100px;">Currency</span></th><th data-field="ShipAddress" class="m-datatable__cell"><span style="width: 110px;">Ship Address</span></th><th data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">Ship Date</span></th><th data-field="Latitude" class="m-datatable__cell"><span style="width: 110px;">Latitude</span></th><th data-field="Status" class="m-datatable__cell"><span style="width: 110px;">Status</span></th><th data-field="Type" class="m-datatable__cell"><span style="width: 110px;">Type</span></th><th data-field="Actions" class="m-datatable__cell"><span style="width: 110px;">Actions</span></th></tr></thead><tbody class="m-datatable__body" style=""><tr data-row="0" class="m-datatable__row" style="height: 88px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 50px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="1"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell"><span style="width: 110px;">54473-251</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 110px;">Sanford-Halvorson</span></td><td data-field="Currency" class="m-datatable__cell"><span style="width: 100px;">GTQ</span></td><td data-field="ShipAddress" class="m-datatable__cell"><span style="width: 110px;">897 Magdeline Park</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">5/21/2016</span></td><td data-field="Latitude" class="m-datatable__cell"><span style="width: 110px;">14.78667</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--brand m-badge--wide">Pending</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-primary">Retail</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">						<div class="dropdown ">							<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>						  	<div class="dropdown-menu dropdown-menu-right">						    	<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>						    	<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>						    	<a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>						  	</div>						</div>						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">                            <i class="la la-edit"></i>                        </a>					</span></td></tr><tr data-row="1" class="m-datatable__row m-datatable__row--even" style="height: 88px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 50px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="2"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell"><span style="width: 110px;">41250-308</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 110px;">Denesik-Langosh</span></td><td data-field="Currency" class="m-datatable__cell"><span style="width: 100px;">IDR</span></td><td data-field="ShipAddress" class="m-datatable__cell"><span style="width: 110px;">9 Brickson Park Junction</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">4/19/2016</span></td><td data-field="Latitude" class="m-datatable__cell"><span style="width: 110px;">-6.4222</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--brand m-badge--wide">Pending</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">						<div class="dropdown ">							<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>						  	<div class="dropdown-menu dropdown-menu-right">						    	<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>						    	<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>						    	<a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>						  	</div>						</div>						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">                            <i class="la la-edit"></i>                        </a>					</span></td></tr><tr data-row="2" class="m-datatable__row" style="height: 88px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 50px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="3"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell"><span style="width: 110px;">0615-7571</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 110px;">Kunze, Schneider and Cronin</span></td><td data-field="Currency" class="m-datatable__cell"><span style="width: 100px;">HRK</span></td><td data-field="ShipAddress" class="m-datatable__cell"><span style="width: 110px;">35712 Sundown Parkway</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">4/7/2016</span></td><td data-field="Latitude" class="m-datatable__cell"><span style="width: 110px;">45.70333</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">Danger</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">						<div class="dropdown ">							<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>						  	<div class="dropdown-menu dropdown-menu-right">						    	<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>						    	<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>						    	<a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>						  	</div>						</div>						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">                            <i class="la la-edit"></i>                        </a>					</span></td></tr><tr data-row="3" class="m-datatable__row m-datatable__row--even" style="height: 88px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 50px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="4"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell"><span style="width: 110px;">49349-551</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 110px;">Jacobi-Ankunding</span></td><td data-field="Currency" class="m-datatable__cell"><span style="width: 100px;">RUB</span></td><td data-field="ShipAddress" class="m-datatable__cell"><span style="width: 110px;">481 Sage Park</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">2/15/2016</span></td><td data-field="Latitude" class="m-datatable__cell"><span style="width: 110px;">55.64528</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--success m-badge--wide">Success</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-primary">Retail</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">						<div class="dropdown ">							<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>						  	<div class="dropdown-menu dropdown-menu-right">						    	<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>						    	<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>						    	<a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>						  	</div>						</div>						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">                            <i class="la la-edit"></i>                        </a>					</span></td></tr><tr data-row="4" class="m-datatable__row" style="height: 88px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 50px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="5"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell"><span style="width: 110px;">59779-750</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 110px;">Johns-Kunze</span></td><td data-field="Currency" class="m-datatable__cell"><span style="width: 100px;">IDR</span></td><td data-field="ShipAddress" class="m-datatable__cell"><span style="width: 110px;">59 Marcy Hill</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">1/30/2017</span></td><td data-field="Latitude" class="m-datatable__cell"><span style="width: 110px;">-8.6909</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--success m-badge--wide">Success</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">						<div class="dropdown ">							<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>						  	<div class="dropdown-menu dropdown-menu-right">						    	<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>						    	<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>						    	<a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>						  	</div>						</div>						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">                            <i class="la la-edit"></i>                        </a>					</span></td></tr><tr data-row="5" class="m-datatable__row m-datatable__row--even" style="height: 88px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 50px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="6"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell"><span style="width: 110px;">63777-145</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 110px;">Kris, Keeling and Weimann</span></td><td data-field="Currency" class="m-datatable__cell"><span style="width: 100px;">CNY</span></td><td data-field="ShipAddress" class="m-datatable__cell"><span style="width: 110px;">122 Evergreen Street</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">10/22/2016</span></td><td data-field="Latitude" class="m-datatable__cell"><span style="width: 110px;">42.53306</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--primary m-badge--wide">Canceled</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">						<div class="dropdown ">							<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>						  	<div class="dropdown-menu dropdown-menu-right">						    	<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>						    	<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>						    	<a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>						  	</div>						</div>						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">                            <i class="la la-edit"></i>                        </a>					</span></td></tr><tr data-row="6" class="m-datatable__row" style="height: 88px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 50px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="7"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell"><span style="width: 110px;">57520-0136</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 110px;">Effertz Inc</span></td><td data-field="Currency" class="m-datatable__cell"><span style="width: 100px;">EUR</span></td><td data-field="ShipAddress" class="m-datatable__cell"><span style="width: 110px;">328 8th Avenue</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">9/3/2016</span></td><td data-field="Latitude" class="m-datatable__cell"><span style="width: 110px;">40.59814</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--success m-badge--wide">Success</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">Online</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">						<div class="dropdown dropup">							<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>						  	<div class="dropdown-menu dropdown-menu-right">						    	<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>						    	<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>						    	<a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>						  	</div>						</div>						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">                            <i class="la la-edit"></i>                        </a>					</span></td></tr><tr data-row="7" class="m-datatable__row m-datatable__row--even" style="height: 88px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 50px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="8"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell"><span style="width: 110px;">0093-5200</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 110px;">West-Ullrich</span></td><td data-field="Currency" class="m-datatable__cell"><span style="width: 100px;">SEK</span></td><td data-field="ShipAddress" class="m-datatable__cell"><span style="width: 110px;">48 Sommers Junction</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">2/10/2016</span></td><td data-field="Latitude" class="m-datatable__cell"><span style="width: 110px;">59.514</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--metal m-badge--wide">Delivered</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">						<div class="dropdown dropup">							<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>						  	<div class="dropdown-menu dropdown-menu-right">						    	<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>						    	<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>						    	<a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>						  	</div>						</div>						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">                            <i class="la la-edit"></i>                        </a>					</span></td></tr><tr data-row="8" class="m-datatable__row" style="height: 88px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 50px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="9"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell"><span style="width: 110px;">14783-319</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 110px;">Stiedemann-Kemmer</span></td><td data-field="Currency" class="m-datatable__cell"><span style="width: 100px;">IDR</span></td><td data-field="ShipAddress" class="m-datatable__cell"><span style="width: 110px;">10625 Dixon Road</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">11/11/2016</span></td><td data-field="Latitude" class="m-datatable__cell"><span style="width: 110px;">-8.2137</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--metal m-badge--wide">Delivered</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">						<div class="dropdown dropup">							<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>						  	<div class="dropdown-menu dropdown-menu-right">						    	<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>						    	<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>						    	<a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>						  	</div>						</div>						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">                            <i class="la la-edit"></i>                        </a>					</span></td></tr><tr data-row="9" class="m-datatable__row m-datatable__row--even" style="height: 88px;"><td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 50px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="10"><span></span></label></span></td><td data-field="OrderID" class="m-datatable__cell"><span style="width: 110px;">59011-454</span></td><td data-field="ShipName" class="m-datatable__cell"><span style="width: 110px;">Daniel-Feest</span></td><td data-field="Currency" class="m-datatable__cell"><span style="width: 100px;">COP</span></td><td data-field="ShipAddress" class="m-datatable__cell"><span style="width: 110px;">48004 Mariners Cove Circle</span></td><td data-field="ShipDate" class="m-datatable__cell"><span style="width: 110px;">12/15/2016</span></td><td data-field="Latitude" class="m-datatable__cell"><span style="width: 110px;">4.6375</span></td><td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">Danger</span></span></td><td data-field="Type" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-primary">Retail</span></span></td><td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; width: 110px;">						<div class="dropdown dropup">							<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>						  	<div class="dropdown-menu dropdown-menu-right">						    	<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>						    	<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>						    	<a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>						  	</div>						</div>						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">                            <i class="la la-edit"></i>                        </a>					</span></td></tr></tbody></table><div class="m-datatable__pager m-datatable--paging-loaded clearfix"><ul class="m-datatable__pager-nav"><li><a title="First" class="m-datatable__pager-link m-datatable__pager-link--first m-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="la la-angle-double-left"></i></a></li><li><a title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev m-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="la la-angle-left"></i></a></li><li style="display: none;"><a title="More pages" class="m-datatable__pager-link m-datatable__pager-link--more-prev" data-page="1"><i class="la la-ellipsis-h"></i></a></li><li style="display: none;"><input type="text" class="m-pager-input form-control" title="Page number"></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number m-datatable__pager-link--active" data-page="1" title="1">1</a></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="2" title="2">2</a></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="3" title="3">3</a></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="4" title="4">4</a></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="5" title="5">5</a></li><li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="6" title="6">6</a></li><li><a title="More pages" class="m-datatable__pager-link m-datatable__pager-link--more-next" data-page="7"><i class="la la-ellipsis-h"></i></a></li><li><a title="Next" class="m-datatable__pager-link m-datatable__pager-link--next" data-page="2"><i class="la la-angle-right"></i></a></li><li><a title="Last" class="m-datatable__pager-link m-datatable__pager-link--last" data-page="10"><i class="la la-angle-double-right"></i></a></li></ul><div class="m-datatable__pager-info"><div class="btn-group bootstrap-select m-datatable__pager-size" style="width: 70px;"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" title="Select page size"><span class="filter-option pull-left">10</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="1" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">10</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">20</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">30</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">50</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">100</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker m-datatable__pager-size" title="Select page size" data-width="70px" data-selected="10" tabindex="-98"><option class="bs-title-option" value="">Select page size</option><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="50">50</option><option value="100">100</option></select></div><span class="m-datatable__pager-detail">Displaying 1 - 10 of 100 records</span></div></div></div>

				</div>
				<div class="tab-pane" id="m_tabs_6_3" role="tabpanel">
					<div class="m-content">
						<div class="row">
							<div class="col-md-6">
								
								<div class="tab-pane m-scrollable active" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
									<div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
										<div class="m-messenger__messages mCustomScrollbar _mCS_8 mCS-autoHide" style="height: 550px; position: relative; overflow: visible; "><div id="mCSB_8" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;"><div id="mCSB_8_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
											
											<!--  -->
											<div class="m-messenger__message m-messenger__message--out">
												<div class="m-messenger__message-body">
							                        <div class="m-messenger__message-arrow"></div>
							                        <div class="m-messenger__message-content">
							                            <div class="m-messenger__message-username">
							                                Admin <span class="tanggal-komen">01 August 2018 / 08:55:37 AM</span>
							                            </div>
							                            <div class="m-messenger__message-text">
							                                test
							                            </div>
							                        </div>
							                    </div>
							                </div>

							                <div class="m-messenger__message m-messenger__message--in">
							                	<div class="m-messenger__message-no-pic m--bg-fill-danger">
							                        <span>
							                            P
							                        </span>
							                    </div>
							                    <div class="m-messenger__message-body">
							                        <div class="m-messenger__message-arrow"></div>
							                        <div class="m-messenger__message-content">
							                            <div class="m-messenger__message-username">
							                                PT Multi Artistikacithra <span class="tanggal-komen">01 August 2018 / 08:59:43 AM</span>
							                            </div>
							                            <div class="m-messenger__message-text">
							                                hhvvg hgjyyj
							                            </div>
							                        </div>
							                    </div>
							                </div>

										</div></div><div id="mCSB_8_scrollbar_vertical" class="mCSB_scrollTools mCSB_8_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_8_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 36px; max-height: 177px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
										<div class="m-messenger__seperator"></div>
										<div class="m-messenger__form">
											<div class="m-messenger__form-controls">
												<input type="text" name="" id="comment-body" placeholder="Type here..." class="m-messenger__form-input" onkeypress="return addCommment(event)">
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
										<span id="alerte"></span>
									</div>
								</div>

							</div>
							<div class="col-md-6" style="border-left: 1px dashed #ddd;">
								
								<div class="tab-pane m-scrollable active" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
									<div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
										<div class="m-messenger__messages mCustomScrollbar _mCS_8 mCS-autoHide" style="height: 550px; position: relative; overflow: visible; "><div id="mCSB_8" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;"><div id="mCSB_8_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
											
											<!--  -->
											<div class="m-messenger__message m-messenger__message--out">
												<div class="m-messenger__message-body">
							                        <div class="m-messenger__message-arrow"></div>
							                        <div class="m-messenger__message-content">
							                            <div class="m-messenger__message-username">
							                                Admin <span class="tanggal-komen">01 August 2018 / 08:55:37 AM</span>
							                            </div>
							                            <div class="m-messenger__message-text">
							                                test
							                            </div>
							                        </div>
							                    </div>
							                </div>

							                <div class="m-messenger__message m-messenger__message--in">
							                	<div class="m-messenger__message-no-pic m--bg-fill-danger">
							                        <span>
							                            P
							                        </span>
							                    </div>
							                    <div class="m-messenger__message-body">
							                        <div class="m-messenger__message-arrow"></div>
							                        <div class="m-messenger__message-content">
							                            <div class="m-messenger__message-username">
							                                PT Multi Artistikacithra <span class="tanggal-komen">01 August 2018 / 08:59:43 AM</span>
							                            </div>
							                            <div class="m-messenger__message-text">
							                                hhvvg hgjyyj
							                            </div>
							                        </div>
							                    </div>
							                </div>

										</div></div><div id="mCSB_8_scrollbar_vertical" class="mCSB_scrollTools mCSB_8_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_8_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 36px; max-height: 177px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
										<div class="m-messenger__seperator"></div>
										<div class="m-messenger__form">
											<div class="m-messenger__form-controls">
												<input type="text" name="" id="comment-body" placeholder="Type here..." class="m-messenger__form-input" onkeypress="return addCommment(event)">
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
										<span id="alerte"></span>
									</div>
								</div>

							</div>
						</div>
					</div>
					
				</div>
				<div class="tab-pane" id="m_tabs_6_4" role="tabpanel">
					materi
				</div>
				<div class="tab-pane" id="m_tabs_6_5" role="tabpanel">
					Komplain
				</div>
				<div class="tab-pane" id="m_tabs_6_6" role="tabpanel">
					ulasan
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
