<style type="text/css">
	.slidebg {
		height: 550px;
	}
   section#content.slideshow-bg {
       height: 550px !important;    
    }
</style>

<ul class="slides">
 	 <?php
    foreach ($query->result() as $row) {
    $location = base_url().'marketplace/banner/2080x646/'.$row->big_pic;
    $link = $row->anchor;
    ?>
    <li>
        <a href="<?= ($link != '')?  : '#' ?>">
            <div class="slidebg" style="background-image: url('<?= $location ?>');"></div>
        </a>
    </li>

   <?php } ?>
</ul>              