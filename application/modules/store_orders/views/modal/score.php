<?php
$this->load->module('manage_score');
$user_id = $this->db->where('id', $param2)->get('store_orders')->row()->shopper_id;	
$col1 = 'order_id';
$value1 = $param2;
$col2 = 'user_id';
$value2 = $user_id; 
$query = $this->manage_score->get_with_double_condition($col1, $value1, $col2, $value2);
if ($query->num_rows() > 0) {
	foreach ($query->result() as $row) {
		$visual = $row->visual;
        $penerangan = $row->penerangan;
        $view2 = $row->view;
        $report = $row->report;
        $konstruksi = $row->konstruksi;
        $maintenance = $row->maintenance;
	}
}
?>

<div class="modal-header" style="background-color: rgb(52, 191, 163);">
	<h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">
		Penilaian
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'store_orders/score', $attributes); 
?>	
<div class="modal-body">

	<input type="hidden" name="order_id" value="<?=$param2?>">
	<div class="m-portlet__body">
		
		

		<div class="m-form__group form-group">
			
			<div class="m-checkbox-list">
				<label class="m-checkbox">
					<input type="checkbox" name="visual" value="1" <?php if (isset($visual)) { echo ($visual != '') ? 'checked="checked"' : '';} ?>>
					Penayangan Visual
					<span></span>
				</label>
			</div>
			<span class="m-form__help">
				(materi yang dicetak benar, rapi, tidak sobek, tidak bergelombang, tidak terbalik, tidak miring)
			</span>
		</div>
		<div class="m-form__group form-group">	
			<div class="m-checkbox-list">
				<label class="m-checkbox">
					<input type="checkbox" name="penerangan" value="1" <?php if (isset($penerangan)) { echo ($penerangan != '') ? 'checked="checked"' : '';} ?>>
					Penerangan
					<span></span>
				</label>
			</div>
			<span class="m-form__help">
				(lampu tidak pernah mengalami mati sampai dengan akhir periode penayangan, nyala lampu rata)
			</span>
		</div>
		<div class="m-form__group form-group">	
			<div class="m-checkbox-list">
				<label class="m-checkbox">
					<input type="checkbox" name="view" value="2" <?php if (isset($view2)) { echo ($view2 != '') ? 'checked="checked"' : '';} ?>>
					Clear View
					<span></span>
				</label>
			</div>
			<span class="m-form__help">
				(tidak tertutup pohon, tidak tertutup reklame/baliho/spanduk/banner/sticker)
			</span>
		</div>
		<div class="m-form__group form-group">	
			<div class="m-checkbox-list">
				<label class="m-checkbox">
					<input type="checkbox" name="report" value="2" <?php if (isset($report)) { echo ($report != '') ? 'checked="checked"' : '';} ?>>
					Report
					<span></span>
				</label>
			</div>
			<span class="m-form__help">
				(foto siang malam setiap awal bulan tanggal 1)
			</span>
		</div>
		<div class="m-form__group form-group">	
			<div class="m-checkbox-list">
				<label class="m-checkbox">
					<input type="checkbox" name="konstruksi" value="1" <?php if (isset($konstruksi)) { echo ($konstruksi != '') ? 'checked="checked"' : '';} ?>>
					Konstruksi
					<span></span>
				</label>
			</div>
			<span class="m-form__help">
				(kondisi bagus, cat tidak mengelupas/berkarat, peletakan lampu sejajar)
			</span>
		</div>
		<div class="m-form__group form-group">
			<div class="m-checkbox-list">
				<label class="m-checkbox">
					<input type="checkbox" name="maintenance" value="3" <?php if (isset($maintenance)) { echo ($maintenance != '') ? 'checked="checked"' : '';} ?>>
					Maintenance
					<span></span>
				</label>
			</div>
			<span class="m-form__help">
				(kecepatan troubleshooting max H+2)
			</span>
		</div>

	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">
		Close
	</button>
	<button type="submit" name="submit" value="Submit" class="btn btn-success">
		Submit
	</button>
</div>

</form>