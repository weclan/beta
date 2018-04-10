<?php
$tambah_produk = base_url().'store_product/create';
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
    .rel-category {
        position: absolute;
        top: 10px;
        left: 15px;
    }
</style>

    <div id="daftar-produk" class="tab-pane fade in active">

        <div class="row">
            <div class="col-md-6">
                <h2>Your produk</h2>
            </div>
            <div class="col-md-6">
                <a href="<?= $tambah_produk ?>" class="button btn-small yellow pull-right">TAMBAH PRODUK</a>
            </div>
        </div>
        
        <div class="row image-box listing-style2 add-clearfix">

              

<?php
 if (isset($query)) {
    $this->load->module('manage_product');
    $this->load->module('store_categories');
    $this->load->module('store_sizes');
    $this->load->module('store_roads');
    $this->load->module('store_labels');
    foreach ($query->result() as $row) {
        $detail_location = base_url().'store_product/create/'.$row->code;
        $maintain_location = base_url().'store_product/maintenance/'.$row->code;
        $image_location = base_url().'marketplace/limapuluh/'.$row->limapuluh;
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
?>
            <div class="col-sm-6 col-md-4">
                <article class="box">
                    <figure>
                        <a class="" title="" href="<?= $detail_location ?>"><img width="300" height="160" alt="" src="<?= ($pic != '') ? $image_location : 'http://placehold.it/300x160' ?>"></a>
                        <div class="rel-category">
                            <span class="label label-danger"><?= $kategori ?></span>
                        </div>
                    </figure>
                    <div class="details">
                        <h4 class="box-title">
                            <small><i class="soap-icon-departure yellow-color"></i> <?= $row->item_title ?></small>
                        </h4>
                        <label class="price-wrapper">
                            <span class="price-per-unit">
                                <?php
                                $this->load->module('site_settings');
                                $fix_price = $this->site_settings->rupiah($row->was_price);
                                ?>
                            </span>
                            <span>
                                <div class="rel-stat">
                                    <span class="label label-info"><?= $stat_type ?></span>
                                </div>
                            </span>
                        </label>
                    </div>
                    <div class="fasilitas">
                        <ul>
                            <li>
                                <div class="img-with-text">
                                    <img src="<?= base_url() ?>marketplace/icon/icon-billboard.png" class="ico-fasilitas">
                                    <p><?= $tipe_kategori ?></p>
                                </div>
                            </li>
                            <li>
                                <div class="img-with-text">
                                    <img src="<?= base_url() ?>marketplace/icon/<?= ($row->cat_type == 1) ? 'icon-tipe-horizontal' : 'icon-tipe-vertical' ?>.png" class="ico-fasilitas">
                                    <p><?= $tipe_display ?></p>
                                </div>
                            </li>
                            <li>
                                <div class="img-with-text">
                                    <img src="<?= base_url() ?>marketplace/icon/icon-kelas.png" class="ico-fasilitas">
                                    <p><?= $tipe_ukuran ?> m</p>
                                </div>
                            </li>
                            <li>
                                <div class="img-with-text">
                                    <img src="<?= base_url() ?>marketplace/icon/icon-penerangan.png" class="ico-fasilitas">
                                    <p><?= $tipe_cahaya ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="view">
                        <ul>
                            <li>
                                <a class="pull-left button uppercase" href="<?= $maintain_location ?>" title="View all">report maintenance</a>
                            </li>

                            <li>
                                <a class="pull-left button uppercase" href="<?= $view_product ?>" title="View all" target="_blank">view</a>
                            </li>
                        </ul>
                        
                    </div>
                </article>
            </div>
<?php
    }
 }
?>
            
        </div>

    </div>