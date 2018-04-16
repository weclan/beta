<div class="col-sm-4 col-md-3">
    <h4 class="search-results-title"><i class="soap-icon-search"></i><b><?= (isset($total)) ? $total : '0' ?></b> results found.</h4>
    <div class="search-results-title">
        <div class="form-group">
            <label>KODE PRODUK</label>
            <input type="text" class="input-text full-width" placeholder="" value="">
        </div>
    </div>
                        
    <div class="toggle-container filters-container">
        <div class="panel style1 arrow-right">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#price-filter" class="collapsed">Kategori</a>
            </h4>
            <div id="price-filter" class="panel-collapse collapse">
                <div class="panel-content">
                    <ul class="check-square filters-option">
                        <?php 
                        foreach ($jenis->result() as $cat) {
                        ?>
                        <li><a href="#"><?= $cat->cat_title ?></a></li>
                        <?php } ?>
                    </ul>
                </div><!-- end content -->
            </div>
        </div>
        
        <div class="panel style1 arrow-right">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#cartype-filter" class="collapsed">Status</a>
            </h4>
            <div id="cartype-filter" class="panel-collapse collapse filters-container">
                <div class="panel-content">
                    <ul class="check-square filters-option">
                         <?php 
                        foreach ($label->result() as $stat) {
                        ?>
                        <li><a href="#"><?= $stat->label_title ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="panel style1 arrow-right">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#car-rental-agent-filter" class="collapsed">Kelas Jalan</a>
            </h4>
            <div id="car-rental-agent-filter" class="panel-collapse collapse">
                <div class="panel-content">
                    <ul class="check-square filters-option">
                        <?php 
                        foreach ($tipe_jalan->result() as $jalan) {
                        ?>
                        <li><a href="#"><?= $jalan->road_title ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="panel style1 arrow-right">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#car-preferences-filter" class="collapsed">Ukuran</a>
            </h4>
            <div id="car-preferences-filter" class="panel-collapse collapse">
                <div class="panel-content">
                    <ul class="check-square filters-option">
                        <?php 
                        foreach ($sizes->result() as $ukuran) {
                        ?>
                        <li><a href="#"><?= $ukuran->size ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="panel style1 arrow-right">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#disp-preferences-filter" class="collapsed">Display</a>
            </h4>
            <div id="disp-preferences-filter" class="panel-collapse collapse">
                <div class="panel-content">
                    <ul class="check-square filters-option">
                        <li><a href="#">Horizontal</a></li>
                        <li><a href="#">Vertical</a></li>  
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="panel style1 arrow-right">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#modify-search-panel" class="collapsed">Lokasi</a>
            </h4>
            <div id="modify-search-panel" class="panel-collapse collapse">
                <div class="panel-content">
                    <form method="post">
                         <div class="form-group">
                            <label>pilih provinsi</label>
                            <div class="selector">
                                <?php 
                                $additional_dd_code = 'class="full-width" id="province"';
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
                            <label>pilih kota</label>
                            <div class="selector">
                                <select id="madina" name="cat_city" class="full-width">
                            
                                </select>
                                <span class="custom-select full-width">Kota / kabupaten</span>
                            </div>
                        </div>
                       <!--  <div class="form-group">
                            <label>pickup from</label>
                            <input type="text" class="input-text full-width" placeholder="city, district, or specific airpot" value="">
                        </div>
                        -->
                        <br>
                        <button class="btn-medium icon-check uppercase full-width">Cari</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>