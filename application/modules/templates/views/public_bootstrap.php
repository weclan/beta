<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">
	<title>template</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="jumbotron.css">
</head>
<body>

<nav class="navbar navbar-inverse navbar">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">name</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">

			<?php
			echo Modules::run('store_categories/_draw_top_nav');
			?>

			<form class="navbar-form navbar-right">
				<div class="form-group">
					<input type="text" placeholder="email" class="form-control">
				</div>
				<div class="form-group">
					<input type="password" placeholder="password" class="form-control">
				</div>
				<button type="submit" class="btn btn-success">sign in</button>
			</form>
		</div>
	</div>
</nav>


<div class="container" style="height: 650px;">

<?php

if ($customer_id > 0) {
	include('customer_panel_top.php');
}

if (isset($page_content)) {
	echo  nl2br($page_content);

	if (!isset($page_url)) {
		$page_url = 'homepage';
	}

	if ($page_url == "") {
		require_once('homepage_content.php');
	} elseif ($page_url == "contactus") {
		echo Modules::run('contactus/_draw_form');
	}
	
} elseif (isset($view_file)) {
	$this->load->view($view_module.'/'.$view_file);
}
?>
</div>
<div class="container">
	<hr>


	<footer>
		<p>&copy; 2017</p>
	</footer>

</div>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
	</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Wiklan</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?php echo base_url();?>landingPageFiles/img/favicon.png" rel="icon">
  <link href="<?php echo base_url();?>landingPageFiles/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url();?>landingPageFiles/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url();?>landingPageFiles/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>landingPageFiles/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>landingPageFiles/lib/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url();?>landingPageFiles/lib/magnific-popup/magnific-popup.css" rel="stylesheet">


  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url();?>landingPageFiles/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Avilon
    Theme URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">Wiklan</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="<?php echo base_url();?>landingPageFiles/img/logo.png" alt="" title="" /></img></a> -->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#features">Features</a></li>
          <li><a href="#client">Client</a></li>
          <li><a href="#features">Blog</a></li>
          <!-- <li><a href="#pricing">Pricing</a></li> -->
          <!-- <li><a href="#team">Team</a></li> -->
          <li><a href="#gallery">Gallery</a></li>
         <!--  <li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="menu-has-children"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> -->
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-text" >
      <h2>Welcome to WIKLAN</h2>
      <p>Dimana Lokasi Anda Bisa Menjadi Income</p>
      <a href="daftar.html" class="btn-get-started scrollto">Daftar Sekarang</a>
    </div>

    <div class="product-screens">

      <div class="product-screen-1" data-aos="fade-up" data-aos-delay="400">
        <img src="<?php echo base_url();?>landingPageFiles/img/product-screen-1.png" alt="">
      </div>

      <div class="product-screen-2" data-aos="fade-up" data-aos-delay="200">
        <img src="<?php echo base_url();?>landingPageFiles/img/product-screen-2.png" alt="">
      </div>

      <div class="product-screen-3" data-aos="fade-up">
        <img src="<?php echo base_url();?>landingPageFiles/img/product-screen-3.png" alt="">
      </div>

    </div>

  </section><!-- #intro -->

  <main id="main">

    <?php
		echo Modules::run('templates/about');
	?>

    <!--==========================
      Product Featuress Section
    ============================-->
    <section id="features">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 offset-lg-4">
            <div class="section-header" data-aos="fade" data-aos-duration="1000">
              <h3 class="section-title">Fitur Kita</h3>
              <span class="section-divider"></span>
            </div>
          </div>

          <div class="col-lg-4 col-md-5 features-img">
            <img src="<?php echo base_url();?>landingPageFiles/img/product-features.png" alt="" data-aos="fade-right" data-aos-easing="ease-out-back">
          </div>

          <div class="col-lg-8 col-md-7 ">

            <div class="row">

              <div class="col-lg-6 col-md-6 box" data-aos="fade-left">
                <div class="icon"><i class="ion-ios-clock-outline"></i></div>
                <h4 class="title"><a href="">Efektivitas Waktu</a></h4>
                <p class="description">Dengan platform kami proses pencarian, penawaran dan pemasangan menjadi lebih mudah dan cepat. Menghemat waktu berharga anda dan nikmati hasilnya. </p>
              </div>
              <div class="col-lg-6 col-md-6 box" data-aos="fade-left" data-aos-delay="100">
                <div class="icon"><i class="ion-ios-paper-outline"></i></div>
                <h4 class="title"><a href="">Pengawasan Berhadiah</a></h4>
                <p class="description">Dengan sistem kami anda bisa membuat progress report dengan mudah serta mendapat reward
                setelah mengirimkan progress ke klien.</p>
              </div>
              <div class="col-lg-6 col-md-6 box" data-aos="fade-left" data-aos-delay="200">
                <div class="icon"><i class="ion-social-buffer-outline"></i></div>
                <h4 class="title"><a href="">Harga Bersaing</a></h4>
                <p class="description">Dengan beragamnya pilihan yang kami tawarkan, anda dijamin akan mendapat lokasi dengan harga terbaik dan anda juga bisa menentukan tawaran anda ke lokasi yang anda inginkan.</p>
              </div>
              <div class="col-lg-6 col-md-6 box" data-aos="fade-left" data-aos-delay="300">
                <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
                <h4 class="title"><a href=""></a>Jangkuan Luas</h4>
                <p class="description">Lokasi kami menjangkau berbagai titik strategis di Indonesia dan akan terus berkembang ke daerah yang lebih luas lagi.</p>
              </div>
            </div>

          </div>

        </div>

      </div>

    </section><!-- #features -->

    <!--==========================
      Product Advanced Featuress Section
    ============================-->
    <section id="advanced-features">

      <div class="features-row section-bg">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img class="advanced-feature-img-right" src="<?php echo base_url();?>landingPageFiles/img/advanced-feature-1.jpg" alt="" data-aos="fade-left">
              <div data-aos="fade-right">
                <h2>Anda pemilik titik/lokasi yang ingin mendapat penghasilan tambahan?</h2>
                <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="features-row">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img class="advanced-feature-img-left" src="https://images.unsplash.com/photo-1493689485253-f07fcbfc731b?auto=format&fit=crop&w=1933&q=80" width="510" height="317" alt="">
              <div data-aos="fade-left">
                <h2>Apa keuntungan bergabung dengan kami?</h2>
                <i class="ion-ios-telephone-outline" data-aos="fade-left"></i>
                <p data-aos="fade-left">Penjualan dan pemasaran menjadi tanggung jawab Wiklan. Dengan demikian, anda
                tidak perlu lagi pusing mencari klien/potensi pembeli untuk lokasi anda. Semua akan kita urus sampai
                lokasi anda laku.</p>
                <i class="ion-ios-color-filter-outline" data-aos="fade-left" data-aos-delay="200"></i>
                <p data-aos="fade-left" data-aos-delay="200">Pembayaran yang diterima tidak dipengaruhi oleh pembayaran dari klien. Jadi, meskipun nantinya agency/klien terlambat dalam melakukan pembayaran ke Wiklan, anda tetap mendapat fee sesuai perjanjian.</p>
                <i class="ion-ios-barcode-outline" data-aos="fade-left" data-aos-delay="400"></i>
                <p data-aos="fade-left" data-aos-delay="400">Mendapatkan rekomendasi vendor untuk pembangunan dari pihak perusahaan. Dalam proses pembangunan dan perijinan kita bisa membantu pencarian vendor dan training perijinan.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="features-row section-bg">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img class="advanced-feature-img-right" src="<?php echo base_url();?>landingPageFiles/img/advanced-feature-3.jpg" alt="" data-aos="fade-left">
              <div data-aos="fade-right">
                <h2>Anda juga bisa mengukur hasil serta transaksi yang anda buat.</h2>
                <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                <i class="ion-ios-albums-outline"></i>
                <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- #advanced-features -->

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Daftar Sekarang</h3>
            <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="daftar.html">Daftar</a>
          </div>
        </div>

      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      More Features Section
    ============================-->
    <!-- <section id="more-features" class="section-bg">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">More Features</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="box" data-aos="fade-right">
              <div class="icon"><i class="ion-ios-stopwatch-outline"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident etiro rabeta lingo.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box" data-aos="fade-left">
              <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
              <h4 class="title"><a href="">Dolor Sitema</a></h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata nodera clas.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box" data-aos="fade-right">
              <div class="icon"><i class="ion-ios-heart-outline"></i></div>
              <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur trinige zareta lobur trade.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box" data-aos="fade-left">
              <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum rideta zanox satirente madera</p>
            </div>
          </div>

        </div>
      </div>
    </section> --><!-- #more-features -->

    <!--==========================
      Clients
    ============================-->
    <section id="clients">
      <div class="container">

        <div class="row">

          <div class="col-md-2">
            <img src="<?php echo base_url();?>landingPageFiles/img/clients/client-1.png" alt=""  data-aos="fade-up">
          </div>

          <div class="col-md-2">
            <img src="<?php echo base_url();?>landingPageFiles/img/clients/client-2.png" alt=""  data-aos="fade-up">
          </div>

          <div class="col-md-2">
            <img src="<?php echo base_url();?>landingPageFiles/img/clients/client-3.png" alt=""  data-aos="fade-up">
          </div>

          <div class="col-md-2">
            <img src="<?php echo base_url();?>landingPageFiles/img/clients/client-4.png" alt=""  data-aos="fade-up">
          </div>

          <div class="col-md-2">
            <img src="<?php echo base_url();?>landingPageFiles/img/clients/client-5.png" alt=""  data-aos="fade-up">
          </div>

          <div class="col-md-2">
            <img src="<?php echo base_url();?>landingPageFiles/img/clients/client-6.png" alt=""  data-aos="fade-up">
          </div>

        </div>
      </div>
    </section> --><!-- #more-features

    <!--==========================
      Pricing Section
    ============================-->
   <!--  <section id="pricing" class="section-bg">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">Pricing</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="box" data-aos="fade-right">
              <h3>Free</h3>
              <h4><sup>$</sup>0<span> month</span></h4>
              <ul>
                <li><i class="ion-android-checkmark-circle"></i> Quam adipiscing vitae proin</li>
                <li><i class="ion-android-checkmark-circle"></i> Nec feugiat nisl pretium</li>
                <li><i class="ion-android-checkmark-circle"></i> Nulla at volutpat diam uteera</li>
                <li><i class="ion-android-checkmark-circle"></i> Pharetra massa massa ultricies</li>
                <li><i class="ion-android-checkmark-circle"></i> Massa ultricies mi quis hendrerit</li>
              </ul>
              <a href="#" class="get-started-btn">Get Started</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="box featured" data-aos="fade-up">
              <h3>Business</h3>
              <h4><sup>$</sup>29<span> month</span></h4>
              <ul>
                <li><i class="ion-android-checkmark-circle"></i> Quam adipiscing vitae proin</li>
                <li><i class="ion-android-checkmark-circle"></i> Nec feugiat nisl pretium</li>
                <li><i class="ion-android-checkmark-circle"></i> Nulla at volutpat diam uteera</li>
                <li><i class="ion-android-checkmark-circle"></i> Pharetra massa massa ultricies</li>
                <li><i class="ion-android-checkmark-circle"></i> Massa ultricies mi quis hendrerit</li>
              </ul>
              <a href="#" class="get-started-btn">Get Started</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="box" data-aos="fade-left">
              <h3>Developer</h3>
              <h4><sup>$</sup>49<span> month</span></h4>
              <ul>
                <li><i class="ion-android-checkmark-circle"></i> Quam adipiscing vitae proin</li>
                <li><i class="ion-android-checkmark-circle"></i> Nec feugiat nisl pretium</li>
                <li><i class="ion-android-checkmark-circle"></i> Nulla at volutpat diam uteera</li>
                <li><i class="ion-android-checkmark-circle"></i> Pharetra massa massa ultricies</li>
                <li><i class="ion-android-checkmark-circle"></i> Massa ultricies mi quis hendrerit</li>
              </ul>
              <a href="#" class="get-started-btn">Get Started</a>
            </div>
          </div>

        </div>
      </div>
    </section><!-- #pricing -->

    <!--==========================
      Frequently Asked Questions Section
    ============================-->
    <section id="faq">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">Frequently Asked Questions</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <ul id="faq-list" data-aos="fade-up">
          <li>
            <a data-toggle="collapse" class="collapsed" href="#faq1">Apakah lokasi yang saya miliki cocok untuk dijual? <i class="ion-android-remove"></i></a>
            <div id="faq1" class="collapse" data-parent="#faq-list">
              <p>
                Semua lokasi memiliki potensi untuk dijual. Namun, setelah anda mendaftar kami akan memberikan daftar list dan kriteria lokasi yang mungkin akan berpengaruh terhadap seberapa bagus sebuah titik dan seberapa mudah titik itu akan terjual.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq2" class="collapsed">Apa keuntungan yang akan saya dapatkan jika bergabung dan menjual lokasi saya melalui Wiklan? <i class="ion-android-remove"></i></a>
            <div id="faq2" class="collapse" data-parent="#faq-list">
              <p>
                Kita akan melakukan proses "revenue sharing" dimana nantinya kita akan membuat kontrak yang disetujui pihak Wiklan dengan anda. Selebihnya, urusan pemasaran dan pencarian klien akan kami handle sehingga anda hanya perlu melakukan pembangunan beserta ijin titik. 
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq3" class="collapsed">Saya tidak memiliki pengalaman produksi. Bagaimana? <i class="ion-android-remove"></i></a>
            <div id="faq3" class="collapse" data-parent="#faq-list">
              <p>
                Kita akan menyediakan panduan untuk anda sehingga anda tidak perlu terlalu bingung dalam pelaksanaan produksi maupun perijinan. Kita juga akan memberikan database vendor produksi/perijinan yang anda bisa pakai dalam membantu anda mengurus masalah pembangunan.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq4" class="collapsed">Saya tidak ingin berurusan dengan produksi/perijinan. Bisakah pihak Wiklan membantu? <i class="ion-android-remove"></i></a>
            <div id="faq4" class="collapse" data-parent="#faq-list">
              <p>
                Jika anda ragu atau tidak mau repot dalam pelaksanaan produksi dan pengurusan ijin, anda juga bisa menggunakan jasa kami dalam pengurusan hal tersebut. Namun, akan ada kontrak khusus yang akan kita lakukan yang nantinya juga akan disetujui oleh pihak Wiklan dan anda.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="ion-android-remove"></i></a>
            <div id="faq5" class="collapse" data-parent="#faq-list">
              <p>
                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="ion-android-remove"></i></a>
            <div id="faq6" class="collapse" data-parent="#faq-list">
              <p>
                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section><!-- #faq -->

    <!--==========================
      Our Team Section
    ============================-->
    <!-- <section id="team" class="section-bg">
      <div class="container">
        <div class="section-header">
          <h3 class="section-title">Our Team</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
        <div class="row" data-aos="fade-up">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?php echo base_url();?>landingPageFiles/img/team/team-1.jpg" alt=""></div>
              <h4>Walter White</h4>
              <span>Chief Executive Officer</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?php echo base_url();?>landingPageFiles/img/team/team-2.jpg" alt=""></div>
              <h4>Sarah Jhinson</h4>
              <span>Product Manager</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?php echo base_url();?>landingPageFiles/img/team/team-3.jpg" alt=""></div>
              <h4>William Anderson</h4>
              <span>CTO</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?php echo base_url();?>landingPageFiles/img/team/team-4.jpg" alt=""></div>
              <h4>Amanda Jepson</h4>
              <span>Accountant</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section> --><!-- #team -->

    <!--==========================
      Gallery Section
    ============================-->
    <section id="gallery">
      <div class="container-fluid">
        <div class="section-header">
          <h3 class="section-title">Gallery</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item" data-aos="fade-up">
              <a href="<?php echo base_url();?>landingPageFiles/img/gallery/gallery-1.jpg" class="gallery-popup">
                <img src="<?php echo base_url();?>landingPageFiles/img/gallery/gallery-1.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item" data-aos="fade-up">
              <a href="<?php echo base_url();?>landingPageFiles/img/gallery/gallery-2.jpg" class="gallery-popup">
                <img src="<?php echo base_url();?>landingPageFiles/img/gallery/gallery-2.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item" data-aos="fade-up">
              <a href="<?php echo base_url();?>landingPageFiles/img/gallery/gallery-3.jpg" class="gallery-popup">
                <img src="<?php echo base_url();?>landingPageFiles/img/gallery/gallery-3.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item" data-aos="fade-up">
              <a href="<?php echo base_url();?>landingPageFiles/img/gallery/gallery-4.jpg" class="gallery-popup">
                <img src="<?php echo base_url();?>landingPageFiles/img/gallery/gallery-4.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item" data-aos="fade-up">
              <a href="<?php echo base_url();?>landingPageFiles/img/gallery/gallery-5.jpg" class="gallery-popup">
                <img src="<?php echo base_url();?>landingPageFiles/img/gallery/gallery-5.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item" data-aos="fade-up">
              <a href="<?php echo base_url();?>landingPageFiles/img/gallery/gallery-6.jpg" class="gallery-popup">
                <img src="<?php echo base_url();?>landingPageFiles/img/gallery/gallery-6.jpg" alt="">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #gallery -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container">
        <div class="row" data-aos="fade-up">

          <div class="col-lg-4 col-md-4">
            <div class="contact-about">
              <h3>Wiklan</h3>
              <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
                <i class="ion-ios-location-outline"></i>
                <p>Jalan Lesti 42<br>Surabaya, East Java 535022</p>
              </div>

              <div>
                <i class="ion-ios-email-outline"></i>
                <p>support@wiklan.com</p>
              </div>

              <div>
                <i class="ion-ios-telephone-outline"></i>
                <p>+6231 5678346</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>Wiklan</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Avilon
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="<?php echo base_url();?>landingPageFiles/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>landingPageFiles/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo base_url();?>landingPageFiles/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>landingPageFiles/lib/easing/easing.min.js"></script>
  <script src="<?php echo base_url();?>landingPageFiles/lib/aos/aos.js"></script>
  <script src="<?php echo base_url();?>landingPageFiles/lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo base_url();?>landingPageFiles/lib/superfish/superfish.min.js"></script>
  <script src="<?php echo base_url();?>landingPageFiles/lib/magnific-popup/magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="<?php echo base_url();?>landingPageFiles/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo base_url();?>landingPageFiles/js/main.js"></script>

</body>
</html>
