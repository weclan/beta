<?php
$this->load->module('store_labels');
foreach ($query->result() as $row) {
	$detail_location = base_url().'store_product/create/'.$row->code;
    $maintain_location = base_url().'store_product/maintenance/'.$row->code;
    $image_location = base_url().'marketplace/limapuluh/'.$row->limapuluh;
    $view_product = base_url()."product/billboard/".$row->item_url;
    $pic = $row->limapuluh;
    $type = $row->cat_type;
    $stat_type = $this->store_labels->get_name_from_label_id($row->cat_stat);
?>

<style type="text/css">
    .rel-category {
        position: absolute;
        top: 10px;
        left: 15px;
    }
</style>

<li style="width: 270px; float: left; display: block;">
    <article class="box">
        <figure>
            <a href="<?= $view_product ?>" class="">
                <img src="<?= ($pic != '') ? $image_location : 'http://placehold.it/300x160' ?>" alt="" width="270" height="160" draggable="false">
            </a>
            <div class="rel-category">
                <span class="label label-danger"><?= $kategori ?></span>
            </div>
        </figure>
        <div class="details">
            
            <h4 class="box-title"><?= $row->item_title ?></h4>
            <label class="price-wrapper">
                <span class="price-per-unit">
                    <?php
                    $this->load->module('site_settings');
                    $fix_price = $this->site_settings->rupiah($row->was_price);
                    ?>
                </span>
            </label>

            <a title="View all" href="<?= $view_product ?>" class="pull-right button uppercase">select</a>
            <div class="rel-stat">
                <span class="label label-info"><?= $stat_type ?></span>
            </div>
            
        </div>
    </article>
</li>

<?php } ?>