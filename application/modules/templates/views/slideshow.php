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

	.page-title, .page-description {
		top: 90px;
	}

	.search-box {
		top: 90px;
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
	                <?= Modules::run('filter_nav/_draw_search_filter') ?>
	                
	            </div>
	        </div>
	    </div>
	    
	</div>

</section>