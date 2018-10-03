<?php
$tambah_produk = base_url().'store_product/create';
$img_verify = base_url().'marketplace/icon/Icon-verified.png';
$img_unverify = base_url().'marketplace/icon/icons8-error-50.png';
?>

<style>
    .fasilitas ul {
        margin-left: 2em;
    }
    .fasilitas ul li{
        display: inline-block;
        color: #9e9e9e;
        margin-right: 2em; 
    }

    .fasilitas ul li img.ico-fasilitas {
        width: 1.7em;
    }

    article.fasilitas ul li {
        float: left;
        text-align: center;
        padding: 0 8px;
        cursor: default;
        font-size: 0.6333em;
    }
    .view ul li a{
        margin-right: 1em;
    }
    .img-with-text {
        text-align: justify;
        width: [width of img];
    }

    .img-with-text img {
        display: block;
        margin: 0 auto;
    }
    .img-with-text p {
        font-size: 9px;
    }
    .rel-delete {
        font-size: 16px;
        position: absolute;
        top: 10px;
        right: 15px;
    }
    .rel-category {
        position: absolute;
        top: 10px;
        left: 15px;
    }

    .rel-category {
        position: absolute;
        top: 10px;
        left: 25px;
    }

    .rel-verify {
        position: absolute;
        top: 190px;
        right: 35px;
        width: 30px;
    }

    li img {
        width: 20px;
        margin-bottom: 10px;
    }

    #prod_title {
        min-height: 55px;
    }

    .rel-category span.label {
        font-size: 12px !important;
    }

    .box-title {
        text-align: left;
    }

    .collection-item-kaki {
        display: -webkit-box;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        justify-content: space-between;
        color: #6b6b6b;
        font-weight: 500;
    }

    .collection-item-location {
        text-align: left;
    }

    .collection-item-status {
        text-align: right;
    }

    #statement {
        position: relative;
        bottom: 0px;
    }

    .no-found {
        background-color: #d9d9d9;
        border: 1px solid #e0e0e0;
        border-radius: 3px;
        text-align: center;
        padding: 25px 0;
        margin-bottom: 20px;
    }

    .duration .icon-box {
        margin-right: 5px;
        padding: 5px;
    }

    .duration a .icon-box.style2 > i:hover {
        color: red;
        cursor: pointer;
    }

    .image-box .box {
        background: #ffffff;
        border: 1px solid #eee;
    }

     .prod_price {
        margin-bottom: 15px;
    }

    .info-verify {
        margin-left: 10px;
        font-size: 12px;
        font-style: italic;
        color: red;
        vertical-align:middle;
    }
    .btn-custom {
        font-size: 12px !important;
        padding: 0 10px !important;
        border-radius: .25em;
        font-weight: bold;
        vertical-align: baseline;
    }
</style>

    <div id="daftar-produk" class="tab-pane fade in active">

        <div class="row">
            <div class="col-md-6">
                <h2>Daftar Lokasi Media Iklan</h2>
            </div>
            <div class="col-md-6">
                <a href="<?= $tambah_produk ?>" class="button btn-small yellow pull-right">TAMBAH PRODUK</a>
            </div>
        </div>
        
        <div class="row image-box listing-style2 add-clearfix">

        <!-- alert -->
        <?php 
        if (isset($flash)) {
            echo $flash;
        }
        ?>




<div class="car-list">
                                <div class="row image-box flight listing-style1" id="pageContainer">

                                    <div id="productMe-list">
                                                           
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-9"></div>
                                                <div class="col-md-3">
                                                    <input type="text" class="search pull-right input-text full-width" placeholder="cari kota / provinsi" style="" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="list">

                                    <?php
                                    if (!is_numeric($query)) {
                                        
                                    if (isset($query)) {
                                        $this->load->module('manage_product');
                                        $this->load->module('store_categories');
                                        $this->load->module('store_labels');
                                        $this->load->module('store_sizes');
                                        $this->load->module('store_roads');
                                        $this->load->module('store_provinces');
                                        $this->load->module('store_cities');
                                        $this->load->module('site_settings');
                                        foreach ($query->result() as $row) {
                                            $detail_location = base_url().'store_product/create/'.$row->code;
                                            $maintain_location = base_url().'store_product/maintenance/'.$row->code;
                                            $image_location = base_url().'marketplace/limapuluh/900x500/'.$row->limapuluh;
                                            $view_product = base_url()."product/billboard/".$row->item_url;
                                            $pic = $row->limapuluh;
                                            $type = $row->cat_type;
                                                    
                                            $prod_verify = $row->stat_prod;
                                            // $tipe_kategori = word_limiter($this->store_categories->get_name_from_category_id($row->cat_prod),1);

                                            $tipe_kategori = $this->store_categories->get_name_from_category_id($row->cat_prod);

                                            $tipe_jalan = $this->store_roads->get_name_from_road_id($row->cat_road);
                                            $tipe_ukuran = $this->store_sizes->get_name_from_size_id($row->cat_size);
                                            $tipe_cahaya = $this->manage_product->get_name_from_light_id($row->cat_light);
                                            $tipe_display = $this->manage_product->get_name_from_display_id($row->cat_type);

                                            $stat_type = $this->store_labels->get_name_from_label_id($row->cat_stat);
                                            $kategori = $this->store_categories->_get_cat_title($row->cat_prod);
                                            $kode_produk = $row->prod_code;

                                            $rate = $this->manage_product->count_rate($kode_produk);
                                            $rating = $rate * 20;

                                            $count_like = $this->manage_product->count_likes($kode_produk);

                                            $jml_viewer = $row->viewer;
                                            $jml_sisi = $this->manage_product->show_amount_side($row->jml_sisi);
                                            $ket_lokasi = $this->manage_product->show_ket_lokasi($row->ket_lokasi);
                                            $jml_ulasan = $this->manage_product->count_review($kode_produk);

                                            $nama_provinsi = $this->store_provinces->get_name_from_province_id($row->cat_prov);
                                            $nama_kota = $this->store_cities->get_name_from_city_id($row->cat_city);

                                            switch ($stat_type) {
                                                case 'Available':
                                                    $class = 'success';
                                                    break;
                                                case 'Nego':
                                                    $class = 'info';
                                                    break;  
                                                case 'Promo':
                                                    $class = 'warning';
                                                    break;
                                                default:
                                                    $class = 'primary';
                                                    break;
                                            }
                                            $klas = $class;
                                            $delete_path = base_url().'store_product/delete_product/'.$row->code;

                                            $verify = ($prod_verify == 1) ? $img_verify : $img_unverify;
                                    ?>

                                    <div class="col-sms-6 col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a title="<?= $row->item_title ?>" href="<?= $detail_location ?>" class="c-blocks__item">
                                                    <img alt="$row->item_url" src="<?= ($pic != '') ? $image_location : 'http://placehold.it/270x160' ?>" class="c-blocks__item-image">
                                                </a>

                                            </figure>
                                            <div class="rel-delete">
                                                <!-- <a href="<?= $delete_path ?>">
                                                    <span class="label label-danger"><i class="soap-icon-close"></i> Delete</span>
                                                </a> -->
                                                <button type="button" class="btn-mini btn-custom red" data-toggle="modal" data-target="#<?= $row->code ?>"><i class="soap-icon-close"></i> Delete</button>

<!-- Modal -->
<div class="modal fade" id="<?= $row->code ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="myModalLabel">Delete Confirmation</h5>
      </div>
            <div class="modal-body">
                <h6>
                    Are you sure that you want to delete this location?
                </h6>
                <p>
                    <small><i class="soap-icon-departure yellow-color"></i> <?= $row->item_title ?></small>
                </p>
            </div>
    <?php
    $attributes = array('class' => 'form-horizontal2');
    echo form_open('store_product/delete_product/'.$row->code, $attributes);
    ?>        
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" name="submit" value="Delete">Delete</button>
      </div>
    <?php
    echo form_close();
    ?>  
        </div>
    </div>
</div>



                                            </div>
                                            <div class="rel-category">
                                                <span class="label label-warning"><?= $tipe_kategori ?></span>
                                            </div>

                                            <div class="rel-verify">
                                                <img src="<?= $verify ?>">
                                            </div>
                                            
                                            <div class="details">
                                                <div id="prod_title">
                                                    <a title="<?= $row->item_title ?>" href="<?= $detail_location ?>" ><small><i class="soap-icon-departure yellow-color"></i> <?= $row->item_title ?></small></a>
                                                </div>
                                                
                                                <div class="time">
                                                    <div class="take-off" style="min-height: 140px;">
                                                        <div>
                                                            <span class="skin-color"><strong>#<?= $kode_produk ?></strong></span><br><?= $nama_provinsi ?><br><?= ucwords(strtolower($nama_kota)) ?><br><?= $tipe_jalan ?><br><?= $ket_lokasi ?>
                                                        </div>
                                                    </div>
                                                    <div class="landing" style="text-align: right;">
                                                        <div>
                                                            <span class=""><?= $tipe_ukuran ?> M</span><br><?= $tipe_display ?><br><?= $tipe_cahaya ?><br><?= $jml_sisi ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- untuk search list.js -->
                                                <div class="kota" style="display: none;"><?= ucwords(strtolower($nama_kota)) ?></div>
                                                <div class="provinsi" style="display: none;"><?= $nama_provinsi ?></div>
                                                <div class="namaLokasi" style="display: none;"><?= $row->item_title ?></div>
                                                <!-- end -->
                                                <p class="duration">
                                                    <span class="icon-box style2 pull-right"><i class="soap-icon-heart circle"></i><?= $count_like ?></span>
                                                    <span class="icon-box style2 pull-right"><i class="soap-icon-guideline circle"></i><?= $jml_viewer ?></span>
                                                    <span class="skin-color" style="float: left; padding-bottom: 10px; font-size: 16px !important;">
                                                        <label class="label label-<?= $klas ?>">
                                                            <?= $stat_type ?>
                                                        </label>
                                                    </span>
                                                    
                                                </p>
                                                <br><br>
                                                <div class="ulas pull-right">(<?= $jml_ulasan ?>)</div>
                                                <div class="five-stars-container pull-right" style="margin: 5px 0;">
                                                    <div class="five-stars" style="width: <?= $rating ?>%;"></div>
                                                </div>
                                                <br><br>
                                                <div class="action row">
                                                    <div class="col-md-6">
                                                        <a class="button btn-medium custom-color full-width" href="<?= $view_product ?>" target="_blank">View</a>    
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <a class="button btn-medium orange full-width" href="<?= $maintain_location ?>">Maintenance</a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </article>
                                    </div>

                                    <?php
                                        }
                                    } 
                                }
                                    ?>
                                   
                                </div>

                                <div class="row pagin">
                                    <div class="col-md-12">
                                        <ul class="pagination pull-right"></ul>
                                    </div>  
                                </div>
                                
                                </div>    
                                   
                                    <div>
                                        <ul>
                                            <li>
                                                <img src="<?= $img_verify ?>">
                                                <span class="info-verify">Sudah di verifikasi</span>
                                            </li>
                                            <li>
                                                <img src="<?= $img_unverify ?>">
                                                <span class="info-verify">Belum di verifikasi (kemungkinan ada persyaratan yang belum dipenuhi)</span>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
            
        </div>

    </div>