<style>
    .contact-box p {
        text-align: justify;
    }

    .required {
        color: red;
        font-size: 14px;
    }

    .keterangan {
        color: red;
        font-size: 14px;
        font-style: italic;
    }

    #leftCount {
        color: red;
    }

    .description span {
        font-style: italic;
    }

    /*******************************************/

.tab-container.full-width-style.arrow-left ul.tabs li {
    margin-bottom: 4px;
}

.tab-container.full-width-style ul.tabs li {
    float: none;
    margin: 0;
    padding-right: 0;
}
.tab-container.style1 ul.tabs li {
    padding-right: 10px;
}
.tab-container ul.tabs.full-width li {
    float: none;
    display: table-cell;
    vertical-align: middle;
    width: 1%;
}
.tab-container ul.tabs li {
    float: left;
    padding-right: 4px;
}
.tab-container.style1 ul.tabs.full-width li a {
    padding: 0;
}
.tab-container.style1 ul.tabs li.active > a, .tab-container.style1 ul.tabs li:hover > a {
    color: #fff;
    background: #01b7f2;
    border-left: none !important;
    position: relative;
}
.tab-container.style1 ul.tabs li a {
    height: 30px;
    line-height: 30px;
    background: #f5f5f5;
    padding: 0 18px;
    color: #9e9e9e;
    font-weight: normal;
    font-size: 0.9167em;
    font-weight: bold;
}
.tab-container ul.tabs.full-width li a {
    padding: 0;
    text-align: center;
}
.tab-container ul.tabs li.active > a, .tab-container ul.tabs li:hover > a {
    color: #01b7f2;
    background: #fff;
}
.tab-container ul.tabs li a {
    color: #fff;
    display: block;
    padding: 0 20px;
    background: #d9d9d9;
    font-size: 1em;
    font-weight: bold;
    height: 40px;
    line-height: 40px;
    text-decoration: none;
    text-transform: uppercase;
    white-space: nowrap;
}

.tab-container.style1 ul.tabs li.active > a:after, .tab-container.style1 ul.tabs li:hover > a:after {
    position: absolute;
    bottom: -5px;
    left: 50%;
    margin-left: -10px;
    border-top: 5px solid #01b7f2 !important;
    *border-left: 7px solid transparent;
    *border-right: 7px solid transparent;
    content: "";
    border-left: none !important;
    border-right: none !important;
}
ul#list-trans li {
	font-size: 18px;
	font-weight: 700;
}

.jml_voucher {
    position: relative;
    width: 60px;
    left: 55px;
    *top: -70px;
    padding: 3px 6px;
    background: #ff6000;
    border-radius: 50%;
    color: #fff;
    font-size: 11px;
    font-weight: bold;
    line-height: 20px;
    text-align: center;
}

.tab-container .tab-content .tab-pane .image-box .details {
    padding-right: 15px;
}

.breadcrumb {
	background-color: #fff;
}

.ico {
	display: inline-block;
	width: 20px !important;
	padding-bottom: 30px;
}

.ico img {
	width: 15px;
}

.jml-poin {
	color: #ff6000;
	font-size: 14px;
	font-weight: bold;
}

.poin-tukar {
	border: 2px solid #f5f5f5;
	border-radius: 10px;
	padding: 15px;
}

.poinku {
	padding: 15px;
	background-color: #f5f5f5;
	margin-bottom: 10px;
}

.mypoin {
	font-size: 16px;
	font-weight: bold;

}
</style>

<div class="tab-pane fade in active">  
    <h2>TokoPoints</h2>
    <!-- alert -->
        <?php 
        if (isset($flash)) {
            echo $flash;
        }
        ?>

        <?php 
		    echo Modules::run('templates/_draw_breadcrumbs', $breadcrumbs_data);
		?>
        
   	<div class="row image-box hotel listing-style1">
        <div class="col-sm-6 col-md-12">
            <article class="box" style="border: 1px solid #f5f5f5;">
                <figure>
                	<?php
                	$path = base_url().'marketplace/voucher/'.$featured_image;
                	?>
                    <a href="#" class="hover-effect"><img width="270" height="160" alt="" src="<?php echo ($featured_image == '') ? 'http://placehold.it/1070x270' : $path ?>"></a>
                </figure>
                <div class="details">
                	<div class="row">
	                    <div class="col-md-8">
	                    	
	                    	<div class="tab-container style1">
	                            <ul class="tabs full-width">
	                                <li class="active"><a href="#ketentuan" data-toggle="tab">Ketentuan</a></li>
	                                <li><a href="#cara-pakai" data-toggle="tab">Cara Pakai</a></li>
	                                
	                            </ul>
	                            <div class="tab-content">
	                                <div class="tab-pane fade in active" id="ketentuan">
	                                    <?= $ketentuan ?>
	                                </div>
	                                <div class="tab-pane fade" id="cara-pakai">
	                                    <?= $cara_pakai ?>
	                                </div>
	                           
	                            </div>
	                        </div>

	                    </div>
	                    <div class="col-md-4">
	                    	<div class="poinku">
	                    		<h4>Point Saya</h4>
	                    		<div class="ico"><img src="<?= base_url().'marketplace/images/002-coin.png' ?>"> </div><span class="mypoin"> <?= $point ?> Points</span>
	                    	</div>
	                    	<div class="poin-tukar">
	                    		<div class="point_use">
                                    <div class="ico"><img src="<?= base_url().'marketplace/images/002-coin.png' ?>"> </div> 
                                    <span class="jml-poin"><?= $point_use ?> Points</span>
                                </div>
	                    		<a class="button btn-small yellow full-width" href="#">TUKAR</a>
	                    	</div>
	                    	
	                    </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
    
</div>

