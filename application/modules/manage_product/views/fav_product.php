<style type="text/css">
    .rel-category {
        position: absolute;
        top: 10px;
        left: 15px;
    }

    #prod_title2{
        
        *display: block;
        margin-top: 5px;
        min-height: 55px !important;
    }

    .rel-category span.label {
        font-size: 12px !important;
    }

    .box-title {
        text-align: left;
    }

    .box-title a:hover {
        color: #01b7f2;
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

    #that .icon-box.style2 i {
        margin: 5px;
        font-size: 1.2em !important;
    }

    ul.slides li {
        width: 270px; 
        float: left; 
        display: block; 
        *min-height: 350px;
    }

    @media only screen and (max-width: 300px) {
        ul.slides li {
            width: 270px;
        } 
    }
</style>

<div class="global-map-area section parallax" data-stellar-background-ratio="0.5" style="background-position: 50% 54.5px;">
                <div class="container">
                    <div class="description text-center">
                        <h1 style="color: #fff; font-weight: 800;">Lokasi Favorit Pelanggan Kami</h1>
                    </div>
                    <div class="image-carousel style3 flex-slider" data-item-width="270" data-item-margin="30">
                        
                    <div class="flex-viewport" style="overflow: hidden; position: relative;">

                        <ul class="slides image-box style9" style="width: 1400%; transition-duration: 0s; transform: translate3d(-200px, 0px, 0px);">

                            <?php
                            if (isset($query)) {
                                $this->load->module('manage_product');
                                $this->load->module('store_categories');
                                $this->load->module('store_labels');
                                $this->load->module('store_sizes');
                                $this->load->module('store_roads');
                                $this->load->module('store_provinces');
                                $this->load->module('store_cities');
                                foreach ($query->result() as $row) {
                                    $image_location = base_url().'marketplace/limapuluh/900x500/'.$row->limapuluh;
                                    $view_product = base_url()."product/billboard/".$row->item_url;
                                    $pic = $row->limapuluh;
                                    $type = $row->cat_type;
                                    $tipe_kategori = word_limiter($this->store_categories->get_name_from_category_id($row->cat_prod),1);

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
                            ?>

                            <li>
                                <article class="box">
                                    <figure>
                                        <a href="<?= $view_product ?>" class="c-blocks__item">
                                            <img src="<?= ($pic != '') ? $image_location : 'http://placehold.it/300x160' ?>" alt=""   class="c-blocks__item-image">
                                        </a>
                                        <div class="rel-category">
                                            <span class="label label-warning"><?= $kategori ?></span>
                                        </div>
                                    </figure>
                                    <div class="details" style="padding-top: 10px;">
                                        
                                        <div id="prod_title2"  style="margin-bottom: 10px;">
                                            <div class="box-title">
                                                <small><i class="soap-icon-departure yellow-color"></i> <a href="<?= $view_product ?>" class=""><?= $row->item_title ?></a></small>
                                            </div>
                                       </div>

                                        <div class="collection-item-kaki" style="margin-top: 20px; min-height: 100px;">
                                            <div class="collection-item-location">
                                                <div style="color: #01b7f2;"><strong>#<?= $kode_produk ?></strong></div>
                                                <div><?= $nama_provinsi ?></div>
                                                <div><?= ucwords(strtolower($nama_kota)) ?></div>
                                            </div>
                                            <div class="collection-item-status">
                                                
                                                <div><?= $tipe_jalan ?></div>
                                                <div class="collection-item-size">
                                                <div><?= $tipe_ukuran ?> m</div>
                                                <div><?= $tipe_display ?></div>
                                            </div>
                                            </div>

                                        </div>

                                        <div class="collection-item-kaki">
                                            <div>
                                                <label class="label label-<?= $klas ?>" style="font-size: 12px !important;">
                                                    <?= $stat_type ?>
                                                </label>
                                            </div>
                                            
                                            <div id="that">
                                                <span class="icon-box style2 pull-right"><i class="soap-icon-heart circle"></i><?= $count_like ?></span>
                                                <span class="icon-box style2 pull-right"><i class="soap-icon-guideline circle"></i><?= $jml_viewer ?></span>
                                            </div>   

                                        </div>

                                        <div class="five-stars-container pull-right" style="margin: 5px 0 0 0;">
                                            <div class="five-stars" style="width: <?= $rating ?>%;"></div>
                                        </div>

                                        <div class="collection-item-goto">
                                            <a title="View all" href="<?= $view_product ?>" class="button btn-medium full-width custom-color uppercase">DETAIL</a>
                                        </div>

                                    </div>
                                </article>
                            </li>

                            <?php
                                }
                             }
                            ?>
                            
                           <!--  <li style="width: 270px; float: left; display: block;">
                                <article class="box">
                                    <figure>
                                        <a href="hotel-list-view.html" title="" class="hover-effect yellow"><img src="http://placehold.it/270x160" alt="" width="170" height="160" draggable="false"></a>
                                    </figure>
                                    <div class="details">
                                        <h4 class="box-title">Majorca<small>(54 reviews)</small></h4>
                                        <a href="hotel-list-view.html" title="" class="button">MORE</a>
                                    </div>
                                </article>
                            </li> -->

                            
                            
                        </ul>
                    </div>
                    <ol class="flex-control-nav flex-control-paging"><li><a class="">1</a></li><li><a class="flex-active">2</a></li></ol><ul class="flex-direction-nav"><li><a class="flex-prev" href="#">Previous</a></li><li><a class="flex-next" href="#">Next</a></li></ul></div>
                </div>
            </div>