<style type="text/css">
	
.content h1 {
	text-align: center;
}
.content .content-footer p {
	color: #6d6d6d;
    font-size: 12px;
    text-align: center;
}
.content .content-footer p a {
	color: inherit;
	font-weight: bold;
}

.panel {
	border: 1px solid #fff;
	*background-color: #fcfcfc;
	box-shadow: none;
}
.panel .btn-group {
	margin: 15px 0 30px;
}
.panel .btn-group .btn {
	transition: background-color .3s ease;
}
.table-filter {
	background-color: #fff;
	*border-bottom: 1px solid #eee;
}
.table-filter tbody tr:hover {
	cursor: pointer;
	background-color: #eee;
}
.table-filter tbody tr td {
	padding: 10px;
	vertical-align: middle;
	border-top-color: #eee;
}
.table-filter tbody tr.selected td {
	background-color: #eee;
}
.table-filter tr td:first-child {
	width: 38px;
}
.table-filter tr td:nth-child(2) {
	width: 35px;
}
.ckbox {
	position: relative;
}
.ckbox input[type="checkbox"] {
	opacity: 0;
}
.ckbox label {
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}
.ckbox label:before {
	content: '';
	top: 1px;
	left: 0;
	width: 18px;
	height: 18px;
	display: block;
	position: absolute;
	border-radius: 2px;
	border: 1px solid #bbb;
	background-color: #fff;
}
.ckbox input[type="checkbox"]:checked + label:before {
	border-color: #2BBCDE;
	background-color: #2BBCDE;
}
.ckbox input[type="checkbox"]:checked + label:after {
	top: 3px;
	left: 3.5px;
	content: '\e013';
	color: #fff;
	font-size: 11px;
	font-family: 'Glyphicons Halflings';
	position: absolute;
}
.table-filter .star {
	color: #ccc;
	text-align: center;
	display: block;
}
.table-filter .star.star-checked {
	color: #F0AD4E;
}
.table-filter .star:hover {
	color: #ccc;
}
.table-filter .star.star-checked:hover {
	color: #F0AD4E;
}
.table-filter .media-photo {
	width: 35px;
}
.table-filter .media-body {
    *display: block;
}
.table-filter .media-meta {
	font-size: 11px;
	color: #999;
}
.table-filter .media .title {
	color: #2BBCDE;
	font-size: 14px;
	font-weight: bold;
	line-height: normal;
	margin: 0;
}
.table-filter .media .title span {
	font-size: .8em;
	margin-right: 20px;
}
.table-filter .media .title span.pagado {
	color: #5cb85c;
}
.table-filter .media .title span.pendiente {
	color: #f0ad4e;
}
.table-filter .media .title span.cancelado {
	color: #d9534f;
}
.table-filter .media .summary {
	font-size: 14px;
}

table td.lokasi {
	width: 260px !important;
}

table td.harga {
	width: 180px !important;
	text-align: right;
	font-size: 16px;
	font-weight: bold;
}

table td.tengah {
	text-align: center;
}

table td.up-down {
	text-align: center;
	font-size: 16px;
}

table thead {
	font-size: 16px;
	font-weight: bold;
	text-transform: uppercase;
}

thead th {
	text-align: center;
}

.ghost-btn {
  font-family: "Arial";
  display: inline-block;
  text-decoration: none;
  border: 1px solid #3f6fa0;
  height: 20px;
  line-height: 20px;
  color: #3f6fa0;
  -webkit-border-radius: 5px;
  -webkit-background-clip: padding-box;
  -moz-border-radius: 5px;
  -moz-background-clip: padding;
  border-radius: 2px;
  background-clip: padding-box;
  font-size: .8em;
  padding: .5em 1.5em;
  -webkit-transition: all 0.2s ease-out;
  -moz-transition: all 0.2s ease-out;
  -o-transition: all 0.2s ease-out;
  transition: all 0.2s ease-out;
  background: #fff;
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  cursor: pointer;
  zoom: 1;
  -webkit-backface-visibility: hidden;
  position: relative;
}
.ghost-btn:hover {
  -webkit-transition: 0.2s ease;
  -moz-transition: 0.2s ease;
  -o-transition: 0.2s ease;
  transition: 0.2s ease;
  background-color: #3f6fa0;
  color: #fff;
}
.ghost-btn:focus {
  outline: none;
}

.ghost-btn.btn-red {
	border: 1px solid #e44049;
	color: #e44049;
}
.ghost-btn.btn-red:hover {
	background-color: #e44049;
	color: #fff;
}

.ghost-btn.btn-blue {
	border: 1px solid #0ab596;
	color: #0ab596;
}
.ghost-btn.btn-blue:hover {
	background-color: #0ab596;
	color: #fff;
}

.ghost-btn.btn-orange {
	border: 1px solid #f0ad4e;
	color: #f0ad4e;
}
.ghost-btn.btn-orange:hover {
	background-color: #f0ad4e;
	color: #fff;
}

.ghost-btn.btn-green {
	border: 1px solid #47a447;
	color: #47a447;
}
.ghost-btn.btn-green:hover {
	background-color: #47a447;
	color: #fff;
}

table tfoot {
	background: #eee;
}
.flex {
	display: flex;
	
	text-align: center;
  	font-size: 30px;
  	border: 1px solid #ddd;
}
.code {
	color: #01b7f2;
	font-weight: 800;
	margin: 5px 0;
}

tfoot td.total {
	border-left: 1px solid #ddd;
	font-weight: bolder;
	font-size: 30px;
	vertical-align: middle;
}
.tipe {
	margin: 5px 0;
	font-weight: bold;
}
</style>

<div id="profile" class="tab-pane fade in active">
	<section class="content">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="pull-right">
					<div class="btn-group">
						<button type="button" class="btn btn-success btn-filter" data-target="pagado">Pagado</button>
						<button type="button" class="btn btn-warning btn-filter" data-target="pendiente">Pendiente</button>
						<button type="button" class="btn btn-danger btn-filter" data-target="cancelado">Cancelado</button>
						<button type="button" class="btn btn-default btn-filter" data-target="all">Todos</button>
					</div>

				</div>
				
				<div class="table-container">
					<table class="table table-filter">
						<thead>
							<tr>
								<th class="lokasi">LOKASI</th>
								<th>Durasi</th>
								<th>Start - End</th>
								<th>Status</th>
								<th></th>
								<th><i class="soap-icon-clock"></i></th>
								<th>Harga</th>
							</tr>
						</thead>
						<tbody>

							<tr>
								<td class="lokasi">
									<div>
										<div class="img">
											<img src="">
										</div>
										<div class="title">
											<a href="#">
											Jl. Ahmad Yani ( Depan Suzuya Plaza, View Dari Pusat Kota Rantau Parapat, Sisi B )</a>
											<div class="code">#1717060001</div>
											<div class="tipe"><label class="label label-success" style="font-size: 12px !important;">Billboard</label></div>
										</div>
									</div>
								</td>
								<td class="tengah">
									<button class="ghost-btn btn-durasi btn-blue">1 bulan</button>
								</td>
								<td class="tengah">22/07/2018 - 22/09/2018</td>
								<td class="tengah">
									<button class="ghost-btn btn-stat btn-green">success</button>
								</td>
								<td class="up-down">
									<a href="#" title="download materi"><i class="fa fa-download"></i></a>
								</td>
								<td class="tengah">
									2 min ago
								</td>
								<td class="harga">600 jt</td>
							</tr>
							
							<tr>
								<td class="lokasi">
									<div>
										<div class="img">
											<img src="">
										</div>
										<div class="title">
											<a href="#">
											Jl. Ahmad Yani ( Depan Suzuya Plaza, View Dari Pusat Kota Rantau Parapat, Sisi B )</a>
											<div class="code">#1717060001</div>
											<div class="tipe"><label class="label label-success" style="font-size: 12px !important;">Billboard</label></div>
										</div>
									</div>
								</td>
								<td class="tengah">
									<button class="ghost-btn btn-durasi btn-blue">1 bulan</button>
								</td>
								<td class="tengah">22/07/2018 - 22/09/2018</td>
								<td class="tengah">
									<button class="ghost-btn btn-stat btn-green">success</button>
								</td>
								<td class="up-down">
									<a href="#" title="upload materi"><i class="fa fa-upload"></i></a>
								</td>
								<td class="tengah">	
									2 min ago
								</td>
								<td class="harga">600 jt</td>
							</tr>

							<tr>
								<td class="lokasi">
									<div>
										<div class="img">
											<img src="">
										</div>
										<div class="title">
											<a href="#">
											Jl. Ahmad Yani ( Depan Suzuya Plaza, View Dari Pusat Kota Rantau Parapat, Sisi B )</a>
											<div class="code">#1717060001</div>
											<div class="tipe"><label class="label label-success" style="font-size: 12px !important;">Billboard</label></div>
										</div>
									</div>
								</td>
								<td class="tengah">
									<button class="ghost-btn btn-durasi btn-blue">1 bulan</button>
								</td>
								<td class="tengah">22/07/2018 - 22/09/2018</td>
								<td class="tengah">
									<button class="ghost-btn btn-stat btn-red">cancel</button>
								</td>
								<td class="up-down">
									
								</td>
								<td class="tengah">
									2 min ago
								</td>
								<td class="harga">600 jt</td>
							</tr>

							<tr>
								<td class="lokasi">
									<div>
										<div class="img">
											<img src="">
										</div>
										<div class="title">
											<a href="#">
											Jl. Ahmad Yani ( Depan Suzuya Plaza, View Dari Pusat Kota Rantau Parapat, Sisi B )</a>
											<div class="code">#1717060001</div>
											<div class="tipe"><label class="label label-success" style="font-size: 12px !important;">Billboard</label></div>
										</div>
									</div>
								</td>
								<td class="tengah">
									<button class="ghost-btn btn-durasi btn-blue">1 bulan</button>
								</td>
								<td class="tengah">22/07/2018 - 22/09/2018</td>
								<td class="tengah">
									<button class="ghost-btn btn-stat btn-orange">pending</button>
								</td>
								<td class="up-down">
									
								</td>
								<td class="tengah">
									2 min ago
								</td>
								<td class="harga">600 jt</td>
							</tr>
							
						</tbody>
						<tfoot>
							<tr>
								<td><div class="flex">4 Lokasi</div></td>
								<td><div class="flex">jumlah lokasi</div></td>
								<td><div class="flex">jumlah lokasi</div></td>
								<td><div class="flex">jumlah lokasi</div></td>
								<td colspan="3" class="total">Rp. 3,2 Mily</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</section>
</div>

<script type="text/javascript">
	tjq(document).ready(function () {

	tjq('.star').on('click', function () {
      tjq(this).toggleClass('star-checked');
    });

    tjq('.ckbox label').on('click', function () {
      tjq(this).parents('tr').toggleClass('selected');
    });

    tjq('.btn-filter').on('click', function () {
      var $target = tjq(this).data('target');
      if ($target != 'all') {
        tjq('.table tr').css('display', 'none');
        tjq('.table tr[data-status="' + $target + '"]').fadeIn('slow');
      } else {
        tjq('.table tr').css('display', 'none').fadeIn('slow');
      }
    });

 });
</script>