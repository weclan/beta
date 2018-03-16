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
        width: 2em;
    }

    article.fasilitas ul li {
        float: left;
        text-align: center;
        padding: 0 10px;
        cursor: default;
        font-size: 0.6333em;
    }
    .view ul li a{
        margin-right: 1em;
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
    foreach ($query->result() as $row) {
        $detail_location = base_url().'store_product/create/'.$row->code;
        $maintain_location = base_url().'store_product/maintenance/'.$row->code;
        $image_location = base_url().'marketplace/limapuluh/'.$row->limapuluh;
        $pic = $row->limapuluh;
        $type = $row->cat_type;
?>
            <div class="col-sm-6 col-md-4">
                <article class="box">
                    <figure>
                        <a class="hover-effect" title="" href="<?= $detail_location ?>"><img width="300" height="160" alt="" src="<?= ($pic != '') ? $image_location : 'http://placehold.it/300x160' ?>"></a>
                    </figure>
                    <div class="details">
                        <a class="pull-right button uppercase" href="<?= $maintain_location ?>" title="View all">main</a>
                        <h4 class="box-title"><?= $row->item_title ?></h4>
                        <label class="price-wrapper">
                            <span class="price-per-unit"><?= $row->item_price ?></span>avg/night
                        </label>
                    </div>
                    <div class="fasilitas">
                        <ul>
                            <li><i><img src="<?= base_url() ?>marketplace/icon/icon-billboard.png" class="ico-fasilitas"></i></li>
                            <li><i><img src="<?= base_url() ?>marketplace/icon/<?= ($type == 1) ? 'icon-tipe-vertical' : 'icon-tipe-horizontal' ?>.png" class="ico-fasilitas"></i></li>
                            <li><i><img src="<?= base_url() ?>marketplace/icon/icon-kelas.png" class="ico-fasilitas"></i></li>
                            <li><i><img src="<?= base_url() ?>marketplace/icon/icon-penerangan.png" class="ico-fasilitas"></i></li>
                        </ul>
                    </div>
                    <div class="view">
                        <ul>
                            <li>
                                <a class="pull-left button uppercase" href="<?= $maintain_location ?>" title="View all">view</a>
                            </li>

                            <li>
                                <a class="pull-left button uppercase" href="<?= $maintain_location ?>" title="View all">view</a>
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