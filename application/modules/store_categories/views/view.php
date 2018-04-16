<style type="text/css">
    .rel-category {
        position: absolute;
        top: 10px;
        left: 15px;
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
	    background-color: #f0f0f0;
	    border: 1px solid #e0e0e0;
	    border-radius: 3px;
	    text-align: center;
	    padding: 25px 0;
	    margin-bottom: 20px;
	}

    /*.pagination>li>a, 
    .pagination>li>span { 
    	border-radius: 50% !important;
    	margin: 0 5px;
    }*/
</style>

<div class="row">
                        <?= Modules::run('filter_nav/_draw_filter_cat') ?>
                        
                        <div class="col-sm-8 col-md-9">
                        	<?php 
                        	if (isset($error)) {
                        		if ($error == TRUE) {
                        			
                        	?>
                        	<div class="col-md-12">
                        		<div class="no-found">
                        			<h3>Maaf hasil pencarian anda tidak dapat kami temukan!</h3>
                        		</div>
                        	</div>
                        	<?php } } ?>
                            <!-- <div class="sort-by-section clearfix">
                                <h4 class="sort-by-title block-sm">Sort results by:</h4>
                                <ul class="sort-bar clearfix block-sm">
                                    <li class="sort-by-name"><a class="sort-by-container" href="#"><span>name</span></a></li>
                                    <li class="sort-by-price"><a class="sort-by-container" href="#"><span>price</span></a></li>
                                    <li class="clearer visible-sms"></li>
                                    <li class="sort-by-rating active"><a class="sort-by-container" href="#"><span>rating</span></a></li>
                                    <li class="sort-by-popularity"><a class="sort-by-container" href="#"><span>popularity</span></a></li>
                                </ul>
                                
                                <ul class="swap-tiles clearfix block-sm">
                                    <li class="swap-list">
                                        <a href="car-list-view.html"><i class="soap-icon-list"></i></a>
                                    </li>
                                    <li class="swap-grid active">
                                        <a href="car-grid-view.html"><i class="soap-icon-grid"></i></a>
                                    </li>
                                    <li class="swap-block">
                                        <a href="car-block-view.html"><i class="soap-icon-block"></i></a>
                                    </li>
                                </ul>
                            </div> -->
                            <div class="car-list">
                                <div class="row image-box flight listing-style1">

                                	<?php
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
		                                    $kode_produk = $row->prod_code;

		                                    

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
		                                    		$class = 'primary';
		                                    		break;
		                                    	default:
		                                    		$class = 'danger';
		                                    		break;
		                                    }
		                                    $klas = $class;
		                            ?>

                                   <!--  <div class="col-sms-6 col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a title="" href="<?= $view_product ?>"><img alt="" src="<?= ($pic != '') ? $image_location : 'http://placehold.it/270x160' ?>"></a>
                                            </figure>
                                            <div class="details">

                                                <h4 class="box-title">
		                                            <small><i class="soap-icon-departure yellow-color"></i> <?= $row->item_title ?></small>
		                                        </h4>
		                                       
		                                        <div class="collection-item-kaki" style="margin-top: 10px;">
		                                            <div class="collection-item-location">
		                                                <div><strong>#<?= $kode_produk ?></strong></div>
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
		                                                <label class="label label-<?= $klas ?>">
		                                                    <?= $stat_type ?>
		                                                </label>
		                                            </div>
		                                            
		                                            <div class="collection-item-goto">
		                                                 <a title="View all" href="<?= $view_product ?>" class="pull-right button btn-medium yellow uppercase">DETAIL</a>
		                                            </div>
		                                        </div>

                                            </div>
                                        </article>
                                    </div> -->

                                    <div class="col-sms-6 col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a title="$row->item_title" href="<?= $view_product ?>"><img alt="$row->item_url" src="<?= ($pic != '') ? $image_location : 'http://placehold.it/270x160' ?>"></a>

                                            </figure>

                                            <div class="rel-category">
								                <span class="label label-danger"><?= $tipe_kategori ?></span>
								            </div>
								            
                                            <div class="details">
				                                <a title="$row->item_title" href="<?= $view_product ?>"><small><i class="soap-icon-departure yellow-color"></i> <?= $row->item_title ?></small></a>
				                                <div class="time">
				                                    <div class="take-off">
				                                        <div>
				                                            <span class="skin-color"><strong>#<?= $kode_produk ?></strong></span><br><?= $nama_provinsi ?><br><?= ucwords(strtolower($nama_kota)) ?>
				                                        </div>
				                                    </div>
				                                    <div class="landing" style="text-align: right;">
				                                        <div>
				                                            <span class=""><?= $tipe_jalan ?></span><br><?= $tipe_ukuran ?> M<br><?= $tipe_display ?>
				                                        </div>
				                                    </div>
				                                </div>
				                                <p class="duration">
				                                	<span class="price"><?php $this->site_settings->rupiah($row->item_price); ?></span>
				                                	<span class="skin-color" style="float: left; padding-bottom: 10px;">
				                                		<label class="label label-<?= $klas ?>">
		                                                    <?= $stat_type ?>
		                                                </label>
				                                	</span>
				                                	
				                                </p>
				                                <div class="action">
				                                    <a class="button btn-medium yellow full-width" href="<?= $view_product ?>">Detail</a>
				                                </div>
				                            </div>
                                        </article>
                                    </div>

                                    <?php
                                		}
                             		}
                            		?>

                                    
                                   
                                </div>
                            </div>

                            <p></p>




                            <div class="col-sm-6 col-md-6">
                            	<div class="pull-left" id="statement"><?= $showing_statement ?></div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                            	<div class="pull-right">
                            		<?= $pagination ?>
	                            	<!-- <ul class="pagination">
						              <li class="disabled"><a href="#">«</a></li>
						              <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
						              <li><a href="#">2</a></li>
						              <li><a href="#">3</a></li>
						              <li><a href="#">4</a></li>
						              <li><a href="#">5</a></li>
						              <li><a href="#">»</a></li>
						            </ul> -->
					            </div>
                            </div>

                           

                            

                            <!-- <a href="#" class="button uppercase full-width btn-large">load more listings</a> -->
                        </div>
                    </div>                    