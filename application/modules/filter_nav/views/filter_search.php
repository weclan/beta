					

					<div class="search-tab-content">
	                    <div class="tab-pane fade active in" id="hotels-tab">
	                        <form action="#" method="post">
	                            <h4 class="title">Sewa lokasi strategis WIKLAN - Cari, Bandingkan dan Sewa?</h4>
	                            <p class="title">"Menyediakan semua titik lokasi terbaik dan terjamin dengan harga terjangkau di seluruh kota indonesia"</p>
	                            <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
	                                        <div class="selector">
						                        <?php 
						                        $additional_dd_code = 'class="full-width" id="provinsi"';
						                        $kategori_prov = array('' => 'Please Select',);
						                        foreach ($prov->result_array() as $row) {
						                            $kategori_prov[$row['id_prov']] = $row['nama'];   
						                        }
						                        echo form_dropdown('cat_prov', $kategori_prov, '', $additional_dd_code);
						                        ?>
						                       <span class="custom-select full-width">Provinsi</span>
						                    </div>
						                </div>
                                        <div class="form-group">
                                            <div class="selector">
						                        <select id="kota" name="cat_city" class="full-width">
						                            
						                        </select>
						                        <span class="custom-select full-width">Kota / kabupaten</span>
						                    </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="datepicker-wrap">
					                            <input type="text" placeholder="mm/dd/yy" name="tgl_pilih" class="input-text full-width" />
					                        </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="selector">
						                        <?php 
						                        $additional_dd_code = 'class="full-width"';
						                        $kategori_durasi = array('' => 'Please Select',);
						                        foreach ($tipe_durasi->result_array() as $row) {
						                            $nama_durasi = explode('_', $row['duration_title']);
						                            $nama_durasi = $nama_durasi[0].' Bulan';

						                            $kategori_durasi[$row['duration_title']] = $nama_durasi;   
						                        }
						                        echo form_dropdown('cat_durasi', $kategori_durasi, '', $additional_dd_code);
						                        ?>
						                        <span class="custom-select full-width">Pilih Durasi</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="selector">
                                               <?php 
						                        $additional_dd_code = 'class="full-width"';
						                        $kategori_jalan = array('' => 'Please Select',);
						                        foreach ($tipe_jalan->result_array() as $row) {
						                            $kategori_jalan[$row['id']] = $row['road_title'];   
						                        }
						                        echo form_dropdown('cat_road', $kategori_jalan, '', $additional_dd_code);
						                        ?>
						                        <span class="custom-select full-width">Kategori Jalan</span>
                                            </div> 
                                        </div>
                                        <div class="form-group">
                                            <div class="selector">
                                                <select class="full-width" name="cat_display">
                                                	<option>Please Select</option>
                                                    <option value="1">Horisontal</option>
                                                    <option value="2">Vertikal</option>
                                                </select><span class="custom-select full-width">Tipe Display</span>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                    	<div class="form-group">
                                    		<button class="full-width">SEARCH NOW</button>
                                    	</div>
                                    </div>
                                </div>
	                            
	                        </form>
	                    </div>
	                          
	                </div>