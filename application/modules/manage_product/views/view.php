
<?php
$img_50 = base_url().'marketplace/limapuluh/900x500/'.$limapuluh;
$img_100 = base_url().'marketplace/seratus/900x500/'.$seratus;
$img_200 = base_url().'marketplace/duaratus/900x500/'.$duaratus;
$path_vid = base_url().'marketplace/video/'.$video;

$img_50_70x70 = base_url().'marketplace/limapuluh/70x70/'.$limapuluh;
$img_100_70x70 = base_url().'marketplace/seratus/70x70/'.$seratus;
$img_200_70x70 = base_url().'marketplace/duaratus/70x70/'.$duaratus;

$shop_name = $this->db->get_where('settings' , array('type'=>'shop_name'))->row()->description;
$shop_phone = $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;
$shop_address = $this->db->get_where('settings' , array('type'=>'address'))->row()->description;
$shop_email = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
$system_logo = $this->db->get_where('settings' , array('type'=>'logo'))->row()->description;

$login_location = base_url().'youraccount/login';

?>

<style type="text/css">
    #map {
        height: 400px;
        width: 100%;
    }
    #street-view {
        height: 100%;
    }
    #hotel-amenities .intro.table-wrapper {
        padding: 0;
        border-spacing: 15px;
        border-collapse: separate;
        table-layout: fixed;
    }
    #hotel-amenities .intro {
        background: #f5f5f5;
    }

    #hotel-amenities .maps, #hotel-amenities .sell_points {
        background: #fff;
        padding: 25px;
    }

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
    .img-with-text {
        text-align: justify;
        width: [width of img];
    }

    .img-with-text img {
        display: block;
        margin: 0 auto;
    }

    .box-title {
        line-height: 1.3em;
    }

    .detailed-logo figure {
        background: transparent;
        text-align: center;
        padding: 0;
    }

    #kudu_login {
        font-size: 11px;
        color: #333;
    }
    #kudu_login a {
        color: #98ce44; 
        font-weight: bold;
    }

    .contact-box p {
        text-align: justify;
    }

    .list-point > span {
        position: absolute;
        right: 0;
    }

    .icon-box.style2.likes {
        margin-left: 10px;
    }

    .detail-review {

    }

    .review-form {
        min-height: 300px;
    }

   .rating2 {
        unicode-bidi: bidi-override;
        direction: rtl;
        width: 15em;
    }

    .rating2 input {
        position: absolute;
        left: -999999px;
    }

    .rating2 label {
        display: inline-block;
        font-size: 0;
    }

    .rating2 > label:before {
        position: relative;
        font: 24px/1 FontAwesome;
        display: block;
        content: "\f005";
        color: #ccc;
        background: -webkit-linear-gradient(-45deg, #d9d9d9 0%, #b3b3b3 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .rating2 > label:hover:before,
    .rating2 > label:hover ~ label:before,
    .rating2 > label.selected:before,
    .rating2 > label.selected ~ label:before {
        color: #f0ad4e;
        background: -webkit-linear-gradient(-45deg, #fcb551 0%, #d69a45 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

</style>

<?php 
    echo Modules::run('templates/_draw_breadcrumbs', $breadcrumbs_data);
?>

	<div class="row">
        <div id="main" class="col-md-9">
            
            <div class="tab-container style1" id="hotel-main-content">
                <ul class="tabs">
                    <li class="active"><a data-toggle="tab" href="#photos-tab">photos</a></li>
                    <li><a data-toggle="tab" href="#map-tab">map</a></li>
                    <li><a data-toggle="tab" href="#steet-view-tab">street view</a></li>
                    <li><a data-toggle="tab" href="#video-tab">video</a></li>
                    <li class="pull-right">
                        <a class="button btn-small green-bg white-color" href="#"><?= $tipe_ketersediaan ?></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="photos-tab" class="tab-pane fade in active">
                        <div class="photo-gallery style1" data-animation="slide" data-sync="#photos-tab .image-carousel">
                            <ul class="slides">
                                <li><img src="<?= $img_50 ?>" alt="" /></li>
                                <li><img src="<?= $img_100 ?>" alt="" /></li>
                                <li><img src="<?= $img_200 ?>" alt="" /></li>
                            </ul>
                        </div>
                        <div class="image-carousel style1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#photos-tab .photo-gallery">
                            <ul class="slides">
                                <li><img src="<?= $img_50_70x70 ?>" alt="" /></li>
                                <li><img src="<?= $img_100_70x70 ?>" alt="" /></li>
                                <li><img src="<?= $img_200_70x70 ?>" alt="" /></li>
                            </ul>
                        </div>
                    </div>
                    <div id="map-tab" class="tab-pane fade">
                        <!-- <div id="map"></div> -->
                    </div>
                    <div id="steet-view-tab" class="tab-pane fade" style="height: 500px;">
                        <!-- <div id="street-view"></div> -->
                    </div>
                    <div id="video-tab" class="tab-pane fade">
                        <?php
                        if ($video != "") { 
                        ?>
                        <video id="video1" class="video-js vjs-default-skin" width="480" height="320" poster="http://www.tutorial-webdesign.com/wp-content/themes/nurumah/img/logo-bg.png" data-setup='{"controls" : true, "autoplay" : false, "preload" : "auto"}'>
                            <source src="<?= $path_vid ?>" type="video/x-flv">
                            <source src="<?= $path_vid ?>" type='video/mp4'>
                        </video>
                        <?php
                        } 
                        ?>
                            
                    </div>
                </div>
            </div>
            
            <div id="hotel-features" class="tab-container">
                <ul class="tabs">
                    <li class="active"><a href="#hotel-description" data-toggle="tab">Deskripsi</a></li>
                    <li><a href="#hotel-availability" data-toggle="tab">Media Iklan Lain</a></li>
                    <li><a href="#hotel-amenities" data-toggle="tab">Tempat Strategis Terdekat</a></li>
                    <li><a href="#hotel-reviews" data-toggle="tab">Ulasan (<?= $jml_ulasan ?>)</a></li>
                    <!-- <li><a href="#hotel-faqs" data-toggle="tab">FAQs</a></li>
                    <li><a href="#hotel-things-todo" data-toggle="tab">Things to Do</a></li>
                    <li><a href="#hotel-write-review" data-toggle="tab">Write a Review</a></li> -->
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="hotel-description">
                        <div class="intro table-wrapper full-width hidden-table-sms">
                            <div class="col-sm-4 col-lg-4 features table-cell">
                                <ul>
                                    <li><label>tipe ooh:</label><?= $tipe_kategori ?></li>
                                    <li><label>tipe jalan:</label><?= $tipe_jalan ?></li>
                                    <li><label>ukuran:</label><?= $tipe_ukuran ?> m</li>
                                    <li><label>pencahayaan:</label><?= $tipe_cahaya ?></li>
                                    <li><label>display:</label><?= $tipe_display ?></li>
                                </ul>
                            </div>
                            <div class="col-sm-8 col-lg-8 table-cell testimonials">
                                <div class="testimonial style1">
                                    
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
                                                    <img src="<?= base_url() ?>marketplace/icon/<?= ($cat_type == 1) ? 'icon-tipe-horizontal' : 'icon-tipe-vertical' ?>.png" class="ico-fasilitas">
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

                                </div>
                            </div>
                        </div>
                        <div class="long-description">
                            <h2><?= $item_title ?></h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4><i class="soap-icon-departure yellow-color"></i> <?= $kecamatan ?> - <?= ucwords(strtolower($kota)) ?> - <?= $provinsi ?></h4>
                                </div>
                                <div class="col-md-6">
                                    <span class="icon-box style2 likes pull-right"><i class="soap-icon-heart circle"></i><?= $jml_like ?></span>
                                    <span class="icon-box style2 pull-right"><i class="soap-icon-guideline circle"></i><?= $jml_viewer ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>ID : <strong>#<?= $prod_code ?></strong></h5>
                                </div>
                            </div>
                            <!--  -->
                            <div class="sharethis-inline-share-buttons"></div>
                            <br>
                            <p>
                                <?= $item_description ?>
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="hotel-availability">
                       
                       <!--  <h2>Available Rooms</h2>
                        <div class="room-list listing-style3 hotel">
                            <article class="box">
                                <figure class="col-sm-4 col-md-3">
                                    <a class="hover-effect popup-gallery" href="ajax/slideshow-popup.html" title=""><img width="230" height="160" src="http://placehold.it/230x160" alt=""></a>
                                </figure>
                                <div class="details col-xs-12 col-sm-8 col-md-9">
                                    <div>
                                        <div>
                                            <div class="box-title">
                                                <h4 class="title">Standard Family Room</h4>
                                                <dl class="description">
                                                    <dt>Max Guests:</dt>
                                                    <dd>3 persons</dd>
                                                </dl>
                                            </div>
                                            <div class="amenities">
                                                <i class="soap-icon-wifi circle"></i>
                                                <i class="soap-icon-fitnessfacility circle"></i>
                                                <i class="soap-icon-fork circle"></i>
                                                <i class="soap-icon-television circle"></i>
                                            </div>
                                        </div>
                                        <div class="price-section">
                                            <span class="price"><small>PER/NIGHT</small>$121</span>
                                        </div>
                                    </div>
                                    <div>
                                        <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id, consectetur adipi deese cing elit maus fringilla bibe endum.</p>
                                        <div class="action-section">
                                            <a href="hotel-booking.html" title="" class="button btn-small full-width text-center">BOOK NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            
                            <a href="#" class="load-more button full-width btn-large fourty-space">LOAD MORE ROOMS</a>
                        </div> -->

                        <?= Modules::run('manage_product/_draw_loc_same_own', $prod_id) ?>
                        
                    </div>
                    <div class="tab-pane fade" id="hotel-amenities">
                        <h2>Amenities Style 01</h2>
                        
                        <div class="intro table-wrapper full-width hidden-table-sms">
                            <div class="col-sm-6 col-lg-6 table-cell maps">
                                maps
                            </div>
                            <div class="col-sm-6 col-lg-6 table-cell sell_points">
                                <ul class="amenities clearfix style2">
                                    <?php foreach ($sell_points->result() as $row) { ?>
                                    
                                    <li class="">
                                        <div class="col-md-10">
                                            <div class="icon-box style2">
                                                <?= $row->desc ?>    
                                                
                                            </div>  
                                        </div>
                                          
                                        <div class="col-md-2 list-point">
                                            <span>
                                                <?= $row->jarak ?> 
                                            </span>
                                        </div>
                                        
                                    </li>
                                    <?php } ?>    
                                </ul>
                            </div>
                        </div>

                        
                    </div>
                   
                    <div class="tab-pane fade" id="hotel-reviews">
                        <div class="intro table-wrapper full-width hidden-table-sms">
                            <div class="rating table-cell col-sm-4">
                                <span class="score"><?= $jml_rate ?>/5</span>
                                <?php
                                    $rate = $jml_rate * 20;
                                ?>
                                <div class="five-stars-container"><div class="five-stars" style="width: <?= $rate ?>%;"></div></div>
                                <a href="#" class="goto-writereview-pane button green btn-small full-width" id="writeReview">WRITE A REVIEW</a>
                            </div>
                            <div class="table-cell col-sm-8">
                                <div class="detail-review" style="display: none;">

                                    <form class="review-form" id="inputReview">    
                                        <input type="hidden" name="user_id" id="userId" value="<?= $user ?>">
                                        <input type="hidden" name="prod_id" id="prodId" value="<?= $prod_code ?>">
                                        <div class="no-padding no-float">
                                            <div class="form-group">
                                                <div class="col-sms-12 col-sm-12">
                                                    <label>Headline</label>
                                                    <input type="text" class="input-text full-width" placeholder="" name="headline" id="headline" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sms-12 col-sm-12">
                                                    <label>Ulasan</label>
                                                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="ulasan" id="ulasan"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sms-12 col-sm-12">
                                                    <label>Rating</label>

                                                    <!-- <input type="radio" name="rating" value="1">&nbsp;1
                                                    &nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="rating" value="2">&nbsp;2
                                                    &nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="rating" value="3">&nbsp;3
                                                    &nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="rating" value="4">&nbsp;4
                                                    &nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="rating" value="5">&nbsp;5 -->
                                                    <div class="rating2">
                                                      <label>
                                                        <input type="radio" name="rating" value="5" title="5 stars"> 5
                                                      </label>
                                                      <label>
                                                        <input type="radio" name="rating" value="4" title="4 stars"> 4
                                                      </label>
                                                      <label>
                                                        <input type="radio" name="rating" value="3" title="3 stars"> 3
                                                      </label>
                                                      <label>
                                                        <input type="radio" name="rating" value="2" title="2 stars"> 2
                                                      </label>
                                                      <label>
                                                        <input type="radio" name="rating" value="1" title="1 star"> 1
                                                      </label>
                                                    </div>

                                                </div>                        
                                            </div>
                                            <hr>
                                            <br><br>

                                            <div class="from-group">
                                                <div class="col-sms-12 col-sm-12">
                                                    
                                                    <button type="button" id="btnReview" class="load-more button green full-width btn-large fourty-space">SUBMIT</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <?= Modules::run('manage_product/_draw_prod_review', $prod_id) ?>

                    </div>
                    <!--
                    <div class="tab-pane fade" id="hotel-faqs">
                        <h2>Frquently Asked Questions</h2>
                        <div class="topics">
                            <ul class="check-square clearfix">
                                <li class="col-sm-6 col-md-4"><a href="#">address &amp; map</a></li>
                                <li class="col-sm-6 col-md-4"><a href="#">messaging</a></li>
                                <li class="col-sm-6 col-md-4"><a href="#">refunds</a></li>
                                <li class="col-sm-6 col-md-4"><a href="#">pricing</a></li>
                                <li class="col-sm-6 col-md-4 active"><a href="#">reservation requests</a></li>
                                <li class="col-sm-6 col-md-4"><a href="#">your reservation</a></li>
                            </ul>
                        </div>
                        <p>Maecenas vitae turpis condimentum metus tincidunt semper bibendum ut orci. Donec eget accumsan est. Duis laoreet sagittis elit et vehicula. Cras viverra posuere condimentum. Donec urna arcu, venenatis quis augue sit amet, mattis gravida nunc. Integer faucibus, tortor a tristique adipiscing, arcu metus luctus libero, nec vulputate risus elit id nibh.</p>
                        <div class="toggle-container">
                            <div class="panel style1 arrow-right">
                                <h4 class="panel-title">
                                    <a class="collapsed" href="#question1" data-toggle="collapse">How do I know a reservation is accepted or confirmed?</a>
                                </h4>
                                <div class="panel-collapse collapse" id="question1">
                                    <div class="panel-content">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="panel style1 arrow-right">
                                <h4 class="panel-title">
                                    <a class="collapsed" href="#question2" data-toggle="collapse">What do I do after I receive a reservation request from a guest?</a>
                                </h4>
                                <div class="panel-collapse collapse" id="question2">
                                    <div class="panel-content">
                                        <p>Sed a justo enim. Vivamus volutpat ipsum ultrices augue porta lacinia. Proin in elementum enim. <span class="skin-color">Duis suscipit justo</span> non purus consequat molestie. Etiam pharetra ipsum sagittis sollicitudin ultricies. Praesent luctus, diam ut tempus aliquam, diam ante euismod risus, euismod viverra quam quam eget turpis. Nam <span class="skin-color">tristique congue</span> arcu, id bibendum diam. Ut hendrerit, leo a pellentesque porttitor, purus arcu tristique erat, in faucibus elit leo in turpis vitae luctus enim, a mollis nulla.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel style1 arrow-right">
                                <h4 class="panel-title">
                                    <a class="" href="#question3" data-toggle="collapse">How much time do I have to respond to a reservation request?</a>
                                </h4>
                                <div class="panel-collapse collapse in" id="question3">
                                    <div class="panel-content">
                                        <p>Sed a justo enim. Vivamus volutpat ipsum ultrices augue porta lacinia. Proin in elementum enim. <span class="skin-color">Duis suscipit justo</span> non purus consequat molestie. Etiam pharetra ipsum sagittis sollicitudin ultricies. Praesent luctus, diam ut tempus aliquam, diam ante euismod risus, euismod viverra quam quam eget turpis. Nam <span class="skin-color">tristique congue</span> arcu, id bibendum diam. Ut hendrerit, leo a pellentesque porttitor, purus arcu tristique erat, in faucibus elit leo in turpis vitae luctus enim, a mollis nulla.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel style1 arrow-right">
                                <h4 class="panel-title">
                                    <a class="collapsed" href="#question4" data-toggle="collapse">Why can’t I call or email hotel or host before booking?</a>
                                </h4>
                                <div class="panel-collapse collapse" id="question4">
                                    <div class="panel-content">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="panel style1 arrow-right">
                                <h4 class="panel-title">
                                    <a class="collapsed" href="#question5" data-toggle="collapse">Am I allowed to decline reservation requests?</a>
                                </h4>
                                <div class="panel-collapse collapse" id="question5">
                                    <div class="panel-content">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="panel style1 arrow-right">
                                <h4 class="panel-title">
                                    <a class="collapsed" href="#question6" data-toggle="collapse">What happens if I let a reservation request expire?</a>
                                </h4>
                                <div class="panel-collapse collapse" id="question6">
                                    <div class="panel-content">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="panel style1 arrow-right">
                                <h4 class="panel-title">
                                    <a class="collapsed" href="#question7" data-toggle="collapse">How do I set reservation requirements?</a>
                                </h4>
                                <div class="panel-collapse collapse" id="question7">
                                    <div class="panel-content">
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="hotel-things-todo">
                        <h2>Things to Do</h2>
                        <p>Maecenas vitae turpis condimentum metus tincidunt semper bibendum ut orci. Donec eget accumsan est. Duis laoreet sagittis elit et vehicula. Cras viverra posuere condimentum. Donec urna arcu, venenatis quis augue sit amet, mattis gravida nunc. Integer faucibus, tortor a tristique adipiscing, arcu metus luctus libero, nec vulputate risus elit id nibh.</p>
                        <div class="activities image-box style2 innerstyle">
                            <article class="box">
                                <figure>
                                    <a title="" href="#"><img width="250" height="161" alt="" src="http://placehold.it/250x160"></a>
                                </figure>
                                <div class="details">
                                    <div class="details-header">
                                        <div class="review-score">
                                            <div class="five-stars-container"><div style="width: 60%;" class="five-stars"></div></div>
                                            <span class="reviews">25 reviews</span>
                                        </div>
                                        <h4 class="box-title">Central Park Walking Tour</h4>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat wisi enim don't look even slightly believable.</p>
                                    <a class="button" title="" href="#">MORE</a>
                                </div>
                            </article>
                            <article class="box">
                                <figure>
                                    <a title="" href="#"><img width="250" height="161" alt="" src="http://placehold.it/250x160"></a>
                                </figure>
                                <div class="details">
                                    <div class="details-header">
                                        <div class="review-score">
                                            <div class="five-stars-container"><div style="width: 60%;" class="five-stars"></div></div>
                                            <span class="reviews">25 reviews</span>
                                        </div>
                                        <h4 class="box-title">Museum of Modern Art</h4>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat wisi enim don't look even slightly believable.</p>
                                    <a class="button" title="" href="#">MORE</a>
                                </div>
                            </article>
                            <article class="box">
                                <figure>
                                    <a title="" href="#"><img width="250" height="161" alt="" src="http://placehold.it/250x160"></a>
                                </figure>
                                <div class="details">
                                    <div class="details-header">
                                        <div class="review-score">
                                            <div class="five-stars-container"><div style="width: 60%;" class="five-stars"></div></div>
                                            <span class="reviews">25 reviews</span>
                                        </div>
                                        <h4 class="box-title">Crazy Horse Cabaret Show</h4>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat wisi enim don't look even slightly believable.</p>
                                    <a class="button" title="" href="#">MORE</a>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="hotel-write-review">
                        <div class="main-rating table-wrapper full-width hidden-table-sms intro">
                            <article class="image-box box hotel listing-style1 photo table-cell col-sm-4">
                                <figure>
                                    <a class="hover-effect" title="" href="#"><img width="270" height="160" alt="" src="http://placehold.it/270x160"></a>
                                </figure>
                                <div class="details">
                                    <h4 class="box-title">Hilton Hotel and Resorts<small><i class="soap-icon-departure"></i> Paris, france</small></h4>
                                    <div class="feedback">
                                        <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                                        <span class="review">270 reviews</span>
                                    </div>
                                </div>
                            </article>
                            <div class="table-cell col-sm-8">
                                <div class="overall-rating">
                                    <h4>Your overall Rating of this property</h4>
                                    <div class="star-rating clearfix">
                                        <div class="five-stars-container"><div class="five-stars" style="width: 80%;"></div></div>
                                        <span class="status">VERY GOOD</span>
                                    </div>
                                    <div class="detailed-rating">
                                        <ul class="clearfix">
                                            <li class="col-md-6"><div class="each-rating"><label>service</label><div class="five-stars-container editable-rating" data-original-stars="4"></div></div></li>
                                            <li class="col-md-6"><div class="each-rating"><label>Value</label><div class="five-stars-container editable-rating" data-original-stars="4"></div></div></li>
                                            <li class="col-md-6"><div class="each-rating"><label>Sleep Quality</label><div class="five-stars-container editable-rating" data-original-stars="4"></div></div></li>
                                            <li class="col-md-6"><div class="each-rating"><label>Cleanliness</label><div class="five-stars-container editable-rating" data-original-stars="4"></div></div></li>
                                            <li class="col-md-6"><div class="each-rating"><label>location</label><div class="five-stars-container editable-rating" data-original-stars="4"></div></div></li>
                                            <li class="col-md-6"><div class="each-rating"><label>rooms</label><div class="five-stars-container editable-rating" data-original-stars="4"></div></div></li>
                                            <li class="col-md-6"><div class="each-rating"><label>swimming pool</label><div class="five-stars-container editable-rating" data-original-stars="4"></div></div></li>
                                            <li class="col-md-6"><div class="each-rating"><label>fitness facility</label><div class="five-stars-container editable-rating" data-original-stars="4"></div></div></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="review-form">
                            <div class="form-group col-md-5 no-float no-padding">
                                <h4 class="title">Title of your review</h4>
                                <input type="text" name="review-title" class="input-text full-width" value="" placeholder="enter a review title" />
                            </div>
                            <div class="form-group">
                                <h4 class="title">Your review</h4>
                                <textarea class="input-text full-width" placeholder="enter your review (minimum 200 characters)" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <h4 class="title">What sort of Trip was this?</h4>
                                <ul class="sort-trip clearfix">
                                    <li><a href="#"><i class="soap-icon-businessbag circle"></i></a><span>Business</span></li>
                                    <li><a href="#"><i class="soap-icon-couples circle"></i></a><span>Couples</span></li>
                                    <li><a href="#"><i class="soap-icon-family circle"></i></a><span>Family</span></li>
                                    <li><a href="#"><i class="soap-icon-friends circle"></i></a><span>Friends</span></li>
                                    <li><a href="#"><i class="soap-icon-user circle"></i></a><span>Solo</span></li>
                                </ul>
                            </div>
                            <div class="form-group col-md-5 no-float no-padding">
                                <h4 class="title">When did you travel?</h4>
                                <div class="selector">
                                    <select class="full-width">
                                        <option value="2014-6">June 2014</option>
                                        <option value="2014-7">July 2014</option>
                                        <option value="2014-8">August 2014</option>
                                        <option value="2014-9">September 2014</option>
                                        <option value="2014-10">October 2014</option>
                                        <option value="2014-11">November 2014</option>
                                        <option value="2014-12">December 2014</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <h4 class="title">Add a tip to help travelers choose a good room</h4>
                                <textarea class="input-text full-width" rows="3" placeholder="write something here"></textarea>
                            </div>
                            <div class="form-group col-md-5 no-float no-padding">
                                <h4 class="title">Do you have photos to share? <small>(Optional)</small> </h4>
                                <div class="fileinput full-width">
                                    <input type="file" class="input-text" data-placeholder="select image/s" />
                                </div>
                            </div>
                            <div class="form-group">
                                <h4 class="title">Share with friends <small>(Optional)</small></h4>
                                <p>Share your review with your friends on different social media networks.</p>
                                <ul class="social-icons icon-circle clearfix">
                                    <li class="twitter"><a title="Twitter" href="#" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
                                    <li class="facebook"><a title="Facebook" href="#" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                                    <li class="googleplus"><a title="GooglePlus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
                                    <li class="pinterest"><a title="Pinterest" href="#" data-toggle="tooltip"><i class="soap-icon-pinterest"></i></a></li>
                                </ul>
                            </div>
                            <div class="form-group col-md-5 no-float no-padding no-margin">
                                <button type="submit" class="btn-large full-width">SUBMIT REVIEW</button>
                            </div>
                        </form>
                        
                    </div>
                -->
                </div>
            
            </div>
        </div>
        <div class="sidebar col-md-3">
            <article class="detailed-logo">
                <figure>
                    <img src="<?= $img_50 ?>" alt="" width="270" height="160" draggable="false">
                </figure>
                <div class="details">
                    <h3 class="box-title">
                        <?= $item_title ?><small><i class="soap-icon-departure yellow-color"></i><span class="fourty-space"><?= $kecamatan ?> - <?= $kota ?> - <?= $provinsi ?></span></small>
                    </h3>
                    
                    <div class="feedback clearfix">
                        <div title="" class="five-stars-container" data-toggle="tooltip" data-placement="bottom" data-original-title="4 stars"><span class="five-stars" style="width: <?= $rate ?>%;"></span></div>
                        <span class="review pull-right"><?= $jml_ulasan ?> ulasan</span>
                    </div>
                    <span class="price clearfix">
                        <?php
                        if ($this->session->userdata('user_id')) {
                        ?>
                        <span class="pull-right" id="harganya">
                            <?php
                                $this->load->module('site_settings');
                                $price = $this->site_settings->rupiah($item_price);
                            ?>
                        </span>
                        <?php } else { ?>
                        <span id="kudu_login"><a href="<?= $login_location ?>">Login</a> untuk melihat harga</span>
                        <?php } ?>
                    </span>
                    <div class="feedback clearfix">
                        <div class="datepicker-wrap">
                            <input type="text" placeholder="mm/dd/yy" class="input-text full-width" id="date-input" />
                        </div>
                    </div>
                    <div class="selector">
                        <?php 
                        $additional_dd_code = 'class="full-width" id="durasi"';
                        $kategori_durasi = array('' => 'Please Select',);
                        foreach ($tipe_durasi->result_array() as $row) {
                            $nama_durasi = explode('_', $row['duration_title']);
                            $nama_durasi = $nama_durasi[0].' Bulan';

                            $kategori_durasi[$row['duration_title']] = $nama_durasi;   
                        }
                        echo form_dropdown('cat_durasi', $kategori_durasi, '', $additional_dd_code);
                        ?>
                        <span class="custom-select full-width">Pilih durasi</span>
                    </div>
                    
                    <hr>
                    <div id="hasil"></div>

                    <?php
                    if (isset($user)) { ?>
                    <a class="button custom-color full-width uppercase btn-small" id="" data-prod="<?= $prod_id ?>" data-user="<?= $user ?>">add to wishlist</a>
                    <?php } ?>

                    <a href="flight-booking.html" class="button green full-width uppercase btn-medium">purchase</a>

                </div>
            </article>
            <div class="travelo-box contact-box">
                <h4>Butuh Bantuan WIKLAN?</h4>
                <p>Kami akan dengan senang hati membantu Anda. Tim kami siap melayani Anda 24/7 (Respon Cepat 24 Jam).</p>
                <address class="contact-details">
                    <span class="contact-phone"><i class="soap-icon-phone"></i> <?= $shop_phone ?></span>
                    <br>
                    <a class="contact-email" href="#"><?= $shop_email ?></a>
                </address>
            </div>

            <!-- <div class="travelo-box">
                <h4>Similar Listings</h4>
                <div class="image-box style14">
                    <article class="box">
                        <figure>
                            <a href="#"><img src="http://placehold.it/63x59" alt="" /></a>
                        </figure>
                        <div class="details">
                            <h5 class="box-title"><a href="#">Plaza Tour Eiffel</a></h5>
                            <label class="price-wrapper">
                                <span class="price-per-unit">$170</span>avg/night
                            </label>
                        </div>
                    </article>
                    <article class="box">
                        <figure>
                            <a href="#"><img src="http://placehold.it/63x59" alt="" /></a>
                        </figure>
                        <div class="details">
                            <h5 class="box-title"><a href="#">Sultan Gardens</a></h5>
                            <label class="price-wrapper">
                                <span class="price-per-unit">$620</span>avg/night
                            </label>
                        </div>
                    </article>
                    <article class="box">
                        <figure>
                            <a href="#"><img src="http://placehold.it/63x59" alt="" /></a>
                        </figure>
                        <div class="details">
                            <h5 class="box-title"><a href="#">Park Central</a></h5>
                            <label class="price-wrapper">
                                <span class="price-per-unit">$322</span>avg/night
                            </label>
                        </div>
                    </article>
                </div>
            </div> -->
            <!-- <div class="travelo-box book-with-us-box">
                <h4>Why Book with us?</h4>
                <ul>
                    <li>
                        <i class="soap-icon-hotel-1 circle"></i>
                        <h5 class="title"><a href="#">135,00+ Hotels</a></h5>
                        <p>Nunc cursus libero pur congue arut nimspnty.</p>
                    </li>
                    <li>
                        <i class="soap-icon-savings circle"></i>
                        <h5 class="title"><a href="#">Low Rates &amp; Savings</a></h5>
                        <p>Nunc cursus libero pur congue arut nimspnty.</p>
                    </li>
                    <li>
                        <i class="soap-icon-support circle"></i>
                        <h5 class="title"><a href="#">Excellent Support</a></h5>
                        <p>Nunc cursus libero pur congue arut nimspnty.</p>
                    </li>
                </ul>
            </div> -->
            
        </div>
    </div>

<script>
    document.body.addEventListener('click', wishList);

    function wishList(e) {
        let source = e.target;
    
        let prod = source.dataset.prod;
        let user = source.dataset.user;

        if (!isNaN(prod) && !isNaN(user)) {
            tjq.ajax({
                url:"<?php echo base_url('store_product/wish');?>",
                method: "POST",
                data: {user_id:user, prod_id:prod},
                dataType: 'json',
                success: function(data) {
                    alert(data.msg);
                    console.log(data.msg);
                }
            });
        }

        console.log(prod+' '+user);
    }
</script>
    
   
<script>
    // (function initia() {
    //     var uluru = {lat: <?= $lat ?>, lng: <?= $long ?>};
    //     var map = new google.maps.Map(document.getElementById('map'), {
    //       zoom: 14,
    //       center: uluru
    //     });
    //     var marker = new google.maps.Marker({
    //       position: uluru,
    //       map: map
    //     });
    // })();

    // var panorama;
    // function initialize() {
    //     panorama = new google.maps.StreetViewPanorama(
    //         document.getElementById('street-view'),
    //         {
    //           position: {lat: <?= $lat ?>, lng: <?= $long ?>},
    //           pov: {heading: 0, pitch: 10},
    //           zoom: 1
    //         });
    // };

    // initialize();

    tjq('.rating2 input').change(function () {
        var $radio = tjq(this);
        tjq('.rating2 .selected').removeClass('selected');
        $radio.closest('label').addClass('selected');
    });

    tjq('a[href="#map-tab"]').on('shown.bs.tab', function (e) {
        var center = panorama.getPosition();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);

        panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
        map.setStreetView(panorama);
    });
    tjq('a[href="#steet-view-tab"]').on('shown.bs.tab', function (e) {
        fenway = panorama.getPosition();
        panoramaOptions.position = fenway;
        panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
        map.setStreetView(panorama);
    });
    var map = null;
    var panorama = null;
    var fenway = new google.maps.LatLng(<?= $lat ?>, <?= $long ?>);
    var mapOptions = {
        center: fenway,
        zoom: 14
    };
    var panoramaOptions = {
        position: fenway,
        pov: {
            heading: 0,
            pitch: 10
        }
    };
    function initialize() {
        tjq("#map-tab").height(tjq("#hotel-main-content").width() * 0.6);
        map = new google.maps.Map(document.getElementById('map-tab'), mapOptions);
        panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
        map.setStreetView(panorama);
    }
    google.maps.event.addDomListener(window, 'load', initialize);

</script>

<!-- <script>
    let pil = document.getElementById('durasi');
    let res = document.getElementById('hasil');

    pil.addEventListener('change', function() {
        let pil_val = this.value;
        let start = document.getElementById('date-input').value;
        let date = new Date(start);
        let day = date.getDate();
        let month = date.getMonth() + 1 + parseInt(pil_val);
        let year = date.getFullYear();
        let res_date = [day, month, year].join('/');
        console.log([day, month, year].join('/'));
        res.innerHTML = 'berakhir pada tgl: ' + res_date;
    });
</script> -->

<script type="text/javascript">
    let pil = document.getElementById('durasi');
    let res = document.getElementById('hasil');
    let harg = document.getElementById('harganya');
    
    var d;

    pil.addEventListener('change', function(e) {
        let pil_val = this.value;
        let start = document.getElementById('date-input').value;

        setTanggal(pil_val, start);
        
        
        e.preventDefault();
    });

    

    // -------------------------------------------------------
        Date.isLeapYear = function (year) {
            return (((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0));
        };

        Date.getDaysInMonth = function (year, month) {
            return [31, (Date.isLeapYear(year) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month];
        };

        Date.prototype.isLeapYear = function () {
            return Date.isLeapYear(this.getFullYear());
        };

        Date.prototype.getDaysInMonth = function () {
            return Date.getDaysInMonth(this.getFullYear(), this.getMonth());
        };

        Date.prototype.addMonths = function (value) {
            var n = this.getDate();
            var m = this.getMonth();
            var y = this.getFullYear();
            console.log(n + ' ' + m + ' ' + y);
            this.setDate(1);
            // this.setMonth(this.getMonth() + value);
            this.setMonth(m + parseInt(value));
            this.setDate(Math.min(n, this.getDaysInMonth()));
            return this;
        };

        // --------------------------------------------------------------------------------------
        
        function setTanggal(durasi, tgl) {
            d = new Date(tgl);

            d.addMonths(durasi);

            var month = d.getUTCMonth() + 1; //months from 1-12
            var day = d.getUTCDate();
            var year = d.getUTCFullYear();

            newdate = day+1 + "/" + month + "/" + year;

            res.innerHTML = 'berakhir pada tgl: ' + newdate;
        }

</script>

<script>
    tjq(document).ready(function(){
        getDataProd(0);
 
        tjq("#load_more").click(function(e){
            e.preventDefault();
            var page = tjq(this).data('val');
            getDataProd(page);
 
        });
        //getcountry();
    });
 
    var getDataProd = function(page){
        tjq("#loader").show();
        tjq.ajax({
            url:"<?php echo base_url() ?>manage_product/create_loc_prod",
            type:'GET',
            data: {page:page, update_id:'<?= $prod_id ?>'}
        }).done(function(response){
            tjq("#post-data").append(response);
            tjq("#loader").hide();
            tjq('#load_more').data('val', (tjq('#load_more').data('val')+1));
            scroll();
        });
    };

    var scroll  = function(){
        tjq('html, body').animate({
            scrollTop: tjq('#load_more').offset().top
        }, 1000);
    };

</script>

<script>
    tjq(document).ready(function(){
        getReviewProd(0);
 
        tjq("#load_review").click(function(e){
            console.log('load more review');
            e.preventDefault();
            var page = tjq(this).data('val');
            getReviewProd(page);
 
        });
    });
 
    var getReviewProd = function(page){
        tjq("#loader").show();
        tjq.ajax({
            url:"<?php echo base_url() ?>manage_product/create_review_prod",
            type:'GET',
            data: {page:page, update_id:'<?= $prod_code ?>'}
        }).done(function(response){
            tjq("#post-review").append(response);
            tjq("#loader").hide();
            tjq('#load_review').data('val', (tjq('#load_review').data('val')+1));
            scroll();
        });
    };

    var scroll  = function(){
        tjq('html, body').animate({
            scrollTop: tjq('#load_review').offset().top
        }, 1000);
    };

</script>

<script>
    let userLog = '<?php echo $this->session->userdata('user_id') ?>';

    tjq("#writeReview").click(function() {
        if (userLog != '') {
            tjq(".detail-review").show();
        } else {
            alert("you must login first!");
        }
    });

    tjq("#btnReview").click(function() {
        let produk = tjq('#prodId').val();
        let user = tjq('#userId').val();
        let headline = tjq('#headline').val();
        let ulasan = tjq('#ulasan').val();
        let rating = tjq("input[name=rating]:checked").val();

        console.log(produk +' '+ user +' '+ headline +' '+ ulasan +' '+ rating);

        if (headline != '' && ulasan != '' && rating != '') {
            console.log('you must fill it');
        }

        tjq.ajax({
            url:"<?php echo base_url() ?>review/create_review",
            type:'POST',
            data: {produk:produk, user:user, headline:headline, ulasan:ulasan, rating:rating},
            datatype: 'json'
        }).done(function(response){
            console.log(response);
            tjq('#headline').val('');
            tjq('#ulasan').val('');
        });
    });

    // create meta tag
    var meta=document.createElement('meta');
    meta.name='viewport';

    meta.setAttribute('content', 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0');

    document.getElementsByTagName('head')[0].appendChild(meta);
</script>