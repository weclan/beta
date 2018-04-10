<style type="text/css">
	.search-box {
		*margin-top: 140px !important;
	}

	.filter-box > .page-title {
	    font-size: 4.1667em;
	    font-weight: bold;
	}

	.filter-box > .page-description {
	    font-size: 2.5em;
	    margin-bottom: 50px;
	}

	.filter-box > .page-title, .filter-box > .page-description {
		display: block;
		position: relative;
		z-index: 99999;
		color: #fff;
	}
</style>

<section id="content" class="slideshow-bg">

	<div id="slideshow">
	    <div class="flexslider">
	        <?= Modules::run('slideshow/draw_slideshow') ?>
	    </div>
	</div>

	<div class="container">

	    <div id="main" class="filter-box">
	        <h1 class="page-title">Lorem ipsum dolor sit amet</h1>
	        <h2 class="page-description col-md-6 no-float no-padding">We're bringing you a modern, comfortable and connected flight experience.</h2>
	        <div class="search-box-wrapper style2">
	            <div class="search-box">
	                
	                <div class="search-tab-content">
	                    <div class="tab-pane fade active in" id="hotels-tab">
	                        <form action="hotel-list-view.html" method="post">
	                            <h4 class="title">Booking lokasi iklan - Cari, Bandingkan dan Simpan?</h4>
	                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="input-text full-width" placeholder="Leaving From (city, distirct or specific airpot)">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="input-text full-width" placeholder="Going To (city, distirct or specific airpot)">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text full-width hasDatepicker" placeholder="Departing On" id="dp1523240039691"><img class="ui-datepicker-trigger" src="images/icon/blank.png" alt="" title="">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">anytime</option>
                                                        <option value="2">morning</option>
                                                    </select><span class="custom-select full-width">anytime</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <div class="datepicker-wrap">
                                                    <input type="text" class="input-text full-width hasDatepicker" placeholder="Arriving On" id="dp1523240039692"><img class="ui-datepicker-trigger" src="images/icon/blank.png" alt="" title="">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="1">anytime</option>
                                                        <option value="2">morning</option>
                                                    </select><span class="custom-select full-width">anytime</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <div class="col-xs-3">
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="">Adults</option>
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select><span class="custom-select full-width">Adults</span>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="">Kids</option>
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select><span class="custom-select full-width">Kids</span>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <input type="text" class="input-text full-width" placeholder="Promo Code">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-3">
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <option value="">Infants</option>
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select><span class="custom-select full-width">Infants</span>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 pull-right">
                                                <button class="full-width">SERACH NOW</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
	                            <!-- <div class="row">
	                                <div class="form-group col-sm-6 col-md-3">
	                                    <input type="text" class="input-text full-width" placeholder="Rome, Paris, New York...">
	                                </div>
	                                <div class="form-group col-sm-6 col-md-4">
	                                    <div class="row">
	                                        <div class="col-xs-6">
	                                            <div class="datepicker-wrap">
	                                                <input type="text" class="input-text full-width hasDatepicker" placeholder="Check In" id="dp1523240039687"><img class="ui-datepicker-trigger" src="images/icon/blank.png" alt="" title="">
	                                            </div>
	                                        </div>
	                                        <div class="col-xs-6">
	                                            <div class="datepicker-wrap">
	                                                <input type="text" class="input-text full-width hasDatepicker" placeholder="Check Out" id="dp1523240039688"><img class="ui-datepicker-trigger" src="images/icon/blank.png" alt="" title="">
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="form-group col-md-5">
	                                    <div class="row">
	                                        <div class="col-xs-4">
	                                            <div class="selector">
	                                                <select class="full-width">
	                                                    <option value="1">1 Room</option>
	                                                    <option value="2">2 Rooms</option>
	                                                    <option value="3">3 Rooms</option>
	                                                    <option value="4">4 Rooms</option>
	                                                </select><span class="custom-select full-width">1 Room</span>
	                                            </div>
	                                        </div>
	                                        <div class="col-xs-4">
	                                            <div class="selector">
	                                                <select class="full-width">
	                                                    <option value="1">1 Guest</option>
	                                                    <option value="2">2 Guests</option>
	                                                    <option value="3">3 Guests</option>
	                                                    <option value="4">4 Guests</option>
	                                                </select><span class="custom-select full-width">1 Guest</span>
	                                            </div>
	                                        </div>
	                                        <div class="col-xs-4">
	                                            <button type="submit" class="full-width">SEARCH NOW</button>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div> -->
	                        </form>
	                    </div>
	                          
	                </div>
	            </div>
	        </div>
	    </div>
	    
	</div>

</section>