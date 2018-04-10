
<?php
$img_50 = base_url().'marketplace/limapuluh/900x500/'.$limapuluh;
$img_100 = base_url().'marketplace/seratus/900x500/'.$seratus;
$img_200 = base_url().'marketplace/duaratus/900x500/'.$duaratus;
$path_vid = base_url().'marketplace/video/'.$video;

$img_50_70x70 = base_url().'marketplace/limapuluh/70x70/'.$limapuluh;
$img_100_70x70 = base_url().'marketplace/seratus/70x70/'.$seratus;
$img_200_70x70 = base_url().'marketplace/duaratus/70x70/'.$duaratus;
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
                    <li class="active"><a href="#hotel-description" data-toggle="tab">Description</a></li>
                    <li><a href="#hotel-availability" data-toggle="tab">Availability</a></li>
                    <li><a href="#hotel-amenities" data-toggle="tab">Amenities</a></li>
                    <!-- <li><a href="#hotel-reviews" data-toggle="tab">Reviews</a></li>
                    <li><a href="#hotel-faqs" data-toggle="tab">FAQs</a></li>
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
                            <h4><i class="soap-icon-departure yellow-color"></i> <?= $kecamatan ?> - <?= ucwords(strtolower($kota)) ?> - <?= $provinsi ?></h4>
                            <h5>ID : <strong>#<?= $prod_code ?></strong></h5>
                            <!--  -->
                            <div class="sharethis-inline-share-buttons"></div>
                            <p>
                                <?= $item_description ?>
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="hotel-availability">
                        <div class="update-search clearfix">
                            <div class="col-md-5">
                                <h4 class="title">When</h4>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label>CHECK IN</label>
                                        <div class="datepicker-wrap">
                                            <input type="text" placeholder="mm/dd/yy" class="input-text full-width" />
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>CHECK OUT</label>
                                        <div class="datepicker-wrap">
                                            <input type="text" placeholder="mm/dd/yy" class="input-text full-width" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <h4 class="title">Who</h4>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <label>ROOMS</label>
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <label>ADULTS</label>
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <label>KIDS</label>
                                        <div class="selector">
                                            <select class="full-width">
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <h4 class="visible-md visible-lg">&nbsp;</h4>
                                <label class="visible-md visible-lg">&nbsp;</label>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button data-animation-duration="1" data-animation-type="bounce" class="full-width icon-check animated" type="submit">SEARCH NOW</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2>Available Rooms</h2>
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
                            <article class="box">
                                <figure class="col-sm-4 col-md-3">
                                    <a class="hover-effect popup-gallery" href="ajax/slideshow-popup.html" title=""><img width="230" height="160" src="http://placehold.it/230x160" alt=""></a>
                                </figure>
                                <div class="details col-xs-12 col-sm-8 col-md-9">
                                    <div>
                                        <div>
                                            <div class="box-title">
                                                <h4 class="title">Superior Double Room</h4>
                                                <dl class="description">
                                                    <dt>Max Guests:</dt>
                                                    <dd>5 persons</dd>
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
                                            <span class="price"><small>PER/NIGHT</small>$241</span>
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
                            <article class="box">
                                <figure class="col-sm-4 col-md-3">
                                    <a class="hover-effect popup-gallery" href="ajax/slideshow-popup.html" title=""><img width="230" height="160" src="http://placehold.it/230x160" alt=""></a>
                                </figure>
                                <div class="details col-xs-12 col-sm-8 col-md-9">
                                    <div>
                                        <div>
                                            <div class="box-title">
                                                <h4 class="title">Deluxe Single Room</h4>
                                                <dl class="description">
                                                    <dt>Max Guests:</dt>
                                                    <dd>4 persons</dd>
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
                                            <span class="price"><small>PER/NIGHT</small>$137</span>
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
                            <article class="box">
                                <figure class="col-sm-4 col-md-3">
                                    <a class="hover-effect popup-gallery" href="ajax/slideshow-popup.html" title=""><img width="230" height="160" src="http://placehold.it/230x160" alt=""></a>
                                </figure>
                                <div class="details col-xs-12 col-sm-8 col-md-9">
                                    <div>
                                        <div>
                                            <div class="box-title">
                                                <h4 class="title">Single Bed Room</h4>
                                                <dl class="description">
                                                    <dt>Max Guests:</dt>
                                                    <dd>2 persons</dd>
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
                                            <span class="price"><small>PER/NIGHT</small>$55</span>
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
                        </div>
                        
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
                                    
                                    <li class="col-md-12 col-sm-6">
                                        <div class="icon-box style2"><i class="soap-icon-plus"></i>
                                            <?= $row->desc ?>    
                                        </div>    
                                    </li>
                                    <?php } ?>    
                                </ul>
                            </div>
                        </div>

                        
                    </div>
                <!--    
                    <div class="tab-pane fade" id="hotel-reviews">
                        <div class="intro table-wrapper full-width hidden-table-sms">
                            <div class="rating table-cell col-sm-4">
                                <span class="score">3.9/5.0</span>
                                <div class="five-stars-container"><div class="five-stars" style="width: 78%;"></div></div>
                                <a href="#" class="goto-writereview-pane button green btn-small full-width">WRITE A REVIEW</a>
                            </div>
                            <div class="table-cell col-sm-8">
                                <div class="detailed-rating">
                                    <ul class="clearfix">
                                        <li class="col-md-6"><div class="each-rating"><label>service</label><div class="five-stars-container"><div class="five-stars" style="width: 78%;"></div></div></div></li>
                                        <li class="col-md-6"><div class="each-rating"><label>Value</label><div class="five-stars-container"><div class="five-stars" style="width: 78%;"></div></div></div></li>
                                        <li class="col-md-6"><div class="each-rating"><label>Sleep Quality</label><div class="five-stars-container"><div class="five-stars" style="width: 78%;"></div></div></div></li>
                                        <li class="col-md-6"><div class="each-rating"><label>Cleanliness</label><div class="five-stars-container"><div class="five-stars" style="width: 78%;"></div></div></div></li>
                                        <li class="col-md-6"><div class="each-rating"><label>location</label><div class="five-stars-container"><div class="five-stars" style="width: 78%;"></div></div></div></li>
                                        <li class="col-md-6"><div class="each-rating"><label>rooms</label><div class="five-stars-container"><div class="five-stars" style="width: 78%;"></div></div></div></li>
                                        <li class="col-md-6"><div class="each-rating"><label>swimming pool</label><div class="five-stars-container"><div class="five-stars" style="width: 78%;"></div></div></div></li>
                                        <li class="col-md-6"><div class="each-rating"><label>fitness facility</label><div class="five-stars-container"><div class="five-stars" style="width: 78%;"></div></div></div></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="guest-reviews">
                            <h2>Guest Reviews</h2>
                            <div class="guest-review table-wrapper">
                                <div class="col-xs-3 col-md-2 author table-cell">
                                    <a href="#"><img src="http://placehold.it/270x263" alt="" width="270" height="263" /></a>
                                    <p class="name">Jessica Brown</p>
                                    <p class="date">NOV, 12, 2013</p>
                                </div>
                                <div class="col-xs-9 col-md-10 table-cell comment-container">
                                    <div class="comment-header clearfix">
                                        <h4 class="comment-title">We had great experience while our stay and Hilton Hotels!</h4>
                                        <div class="review-score">
                                            <div class="five-stars-container"><div class="five-stars" style="width: 80%;"></div></div>
                                            <span class="score">4.0/5.0</span>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stand dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="guest-review table-wrapper">
                                <div class="col-xs-3 col-md-2 author table-cell">
                                    <a href="#"><img src="http://placehold.it/270x263" alt="" width="270" height="263" /></a>
                                    <p class="name">David Jhon</p>
                                    <p class="date">NOV, 12, 2013</p>
                                </div>
                                <div class="col-xs-9 col-md-10 table-cell comment-container">
                                    <div class="comment-header clearfix">
                                        <h4 class="comment-title">I love the speediness of their services.</h4>
                                        <div class="review-score">
                                            <div class="five-stars-container"><div class="five-stars" style="width: 64%;"></div></div>
                                            <span class="score">3.2/5.0</span>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stand dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="guest-review table-wrapper">
                                <div class="col-xs-3 col-md-2 author table-cell">
                                    <a href="#"><img src="http://placehold.it/270x263" alt="" width="270" height="263" /></a>
                                    <p class="name">Kyle Martin</p>
                                    <p class="date">NOV, 12, 2013</p>
                                </div>
                                <div class="col-xs-9 col-md-10 table-cell comment-container">
                                    <div class="comment-header clearfix">
                                        <h4 class="comment-title">When you look outside from the windows its breath taking.</h4>
                                        <div class="review-score">
                                            <div class="five-stars-container"><div class="five-stars" style="width: 76%;"></div></div>
                                            <span class="score">3.8/5.0</span>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stand dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="button full-width btn-large">LOAD MORE REVIEWS</a>
                    </div>
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
                    <img width="114" height="85" src="http://placehold.it/114x85" alt="">
                </figure>
                <div class="details">
                    <h2 class="box-title"><?= $item_title ?><small><i class="soap-icon-departure yellow-color"></i><span class="fourty-space"><?= $kecamatan ?> - <?= $kota ?> - <?= $provinsi ?></span></small></h2>
                    <span class="price clearfix">
                        <span class="pull-right">
                            <?php
                                $this->load->module('site_settings');
                                $price = $this->site_settings->rupiah($item_price);
                            ?>
                        </span>
                    </span>
                    <div class="feedback clearfix">
                        <div class="datepicker-wrap">
                            <input type="text" placeholder="mm/dd/yy" class="input-text full-width" />
                        </div>
                    </div>
                    <div class="selector">
                        <?php 
                        $additional_dd_code = 'class="full-width"';
                        $kategori_durasi = array('' => 'Please Select',);
                        foreach ($tipe_durasi->result_array() as $row) {
                            $nama_durasi = explode('_', $row['duration_title']);
                            $nama_durasi = $nama_durasi[0].' Bulan';

                            $kategori_durasi[$row['duration_title']] = $nama_durasi;   
                        }
                        echo form_dropdown('cat_prov', $kategori_durasi, '', $additional_dd_code);
                        ?>
                        <span class="custom-select full-width">Please Select</span>
                    </div>
                    <hr>
                    <?php
                    if (isset($user)) { ?>
                    <a class="button yellow full-width uppercase btn-small" id="" data-prod="<?= $prod_id ?>" data-user="<?= $user ?>">add to wishlist</a>
                    <?php } ?>
                </div>
            </article>
            <div class="travelo-box contact-box">
                <h4>Need Travelo Help?</h4>
                <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                <address class="contact-details">
                    <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                    <br>
                    <a class="contact-email" href="#">help@travelo.com</a>
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