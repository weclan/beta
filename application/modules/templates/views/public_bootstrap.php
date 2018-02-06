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

<?php $form_pendaftaran_location = base_url().'pendaftaran'; ?>
<?php $kebijakan_location = base_url().'templates/kebijakan_privasi';?>
<?php $syarat_location = base_url().'templates/syarat_dan_ketentuan';?>
<?php $form_contact_location = base_url().'manage_kontak/entry_contact_us'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>WIKLAN</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>LandingPageFiles/img/ico_wiklan.ico" rel="icon">
  <link href="<?php echo base_url(); ?>LandingPageFiles/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url(); ?>LandingPageFiles/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>LandingPageFiles/lib/bootstrap/css/bootstrap.min2.css" rel="stylesheet">


  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url(); ?>LandingPageFiles/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>LandingPageFiles/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>LandingPageFiles/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>LandingPageFiles/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>LandingPageFiles/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url(); ?>LandingPageFiles/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
  <style type="text/css">
    ol > li {
      padding:0 20px 7px 7px;
      text-align: justify;
      font-size: 14px;
      color: #333;
      line-height: 24px;
      transition-duration: 1s;
    }

    .jus{
      text-align: justify;
    }

    .visi{
    }

    .visi:hover, ol > li:hover{
      color: #1E90FF !important;
    }

    #subscribeSuccess {
      color: #19abce;
      display: none;
      border: 1px solid #19abce;
      text-align: center;
      padding: 5px;
      font-weight: 600;
      margin-bottom: 5px;
    }

    #subscribeError {
      color: red;
      display: none;
      border: 1px solid red;
      text-align: center;
      padding: 5px;
      font-weight: 600;
      margin-bottom: 5px;
    }

    #google_translate_element {
      color: #fff !important;
      background: transparent !important;
    }
  </style>
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <!-- <h1><a href="#intro" class="scrollto">wiklan</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="#intro"><img src="<?php echo base_url(); ?>LandingPageFiles/img/logo_wiklan.png" alt="" title="logo wiklan" style="width: 100px; height: auto; margin-top: -5px" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <!-- <li class="menu-active"><a href="#intro">Home</a></li> -->
          <li><a href="#about">Tentang Kami</a></li>
          <li><a href="#services">Layanan</a></li>
          <li><a href="#portfolio">Galeri</a></li>
          <li><a href="#team">Team</a></li>
          <!-- <li class="menu-has-children"><a href="#">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> -->
          <li><a href="#contact">Kontak</a></li>
          <li>
            
        
          </li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url('<?php echo base_url(); ?>LandingPageFiles/img/intro-carousel/1.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Efektivitas Waktu</h2>
                <p>Dengan platform kami proses pencarian, penawaran dan pemasangan menjadi lebih mudah dan cepat. Menghemat waktu berharga anda dan nikmati hasilnya.</p>
                <a href="<?= $form_pendaftaran_location ?>" class="btn-get-started scrollto">Daftar</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('<?php echo base_url(); ?>LandingPageFiles/img/intro-carousel/2.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Harga Bersaing</h2>
                <p>Dengan beragamnya pilihan yang kami tawarkan, anda dijamin akan mendapat lokasi dengan harga terbaik dan anda juga bisa menentukan tawaran anda ke lokasi yang anda inginkan.</p>
                <a href="<?= $form_pendaftaran_location ?>" class="btn-get-started scrollto">Daftar</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('<?php echo base_url(); ?>LandingPageFiles/img/intro-carousel/3.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Pengawasan Berhadiah</h2>
                <p>Dengan sistem kami anda bisa membuat progress report dengan mudah serta mendapat reward setelah mengirimkan progress ke klien.</p>
                <a href="<?= $form_pendaftaran_location ?>" class="btn-get-started scrollto">Daftar</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('<?php echo base_url(); ?>LandingPageFiles/img/intro-carousel/4.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Jangkuan Luas</h2>
                <p>Lokasi kami menjangkau berbagai titik strategis di Indonesia dan akan terus berkembang ke daerah yang lebih luas lagi.</p>
                <a href="<?= $form_pendaftaran_location ?>" class="btn-get-started scrollto">Daftar</a>
              </div>
            </div>
          </div>

          <!-- <div class="carousel-item" style="background-image: url('img/intro-carousel/5.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Magnam aliquam quaerat</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div> -->

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      Featured Services Section
    ============================-->
    <!-- <section id="featured-services">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 box">
            <i class="ion-ios-bookmarks-outline"></i>
            <h4 class="title"><a href="">Lorem Ipsum Delino</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>

          <div class="col-lg-4 box box-bg">
            <i class="ion-ios-stopwatch-outline"></i>
            <h4 class="title"><a href="">Dolor Sitema</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>

          <div class="col-lg-4 box">
            <i class="ion-ios-heart-outline"></i>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>

        </div>
      </div>
    </section> --><!-- #featured-services -->

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <div class="row">
           <div class="col-md-3 offset-md-9" id="google_translate_element"></div><script type="text/javascript">
          function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'id', includedLanguages: 'en,id', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
          }
          </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        </div>
        

        <header class="section-header">
          <h3>Tentang Kami</h3>
          <div class="row">
            <div class="col-md-3 push-md-9">
              <center><a href="#intro"><img src="<?php echo base_url(); ?>LandingPageFiles/img/billboard-wiklan.png" alt="" title="logo wiklan" style="width: 200px; height: auto; padding: 0; margin-top: -10px"/></a></center>
            </div>
            <div class="col-md-9 pull-md-3">
              <p style="text-align: justify; line-height: 40px; text-indent: 50px"><b>wiklan.com</b> adalah Perusahaan Swasta Nasional yang didirikan di Surabaya, dimana Perusahaan kami menyediakan lokasi yang tepat bagi klien untuk media beriklan. Perusahaan kami mempunyai pengalaman sejak tahun 1990 dan kami telah meresmikan <b>wiklan.com</b> pada tanggal ..... sebagai perusahaan berbasis teknologi, dimana klien dapat dengan mudah mendapatkan lokasi media luar ruang yang sesuai dengan kebutuhan. dan pemilik lahan juga dapat menawarkan lahannya sebagai lokasi media iklan.</p>
            </div>
          </div>
        </header>

        <div class="row about-cols">

          

          <!-- <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url(); ?>LandingPageFiles/img/about-plan.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Our Plan</a></h2>
              <p>
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem  doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
              </p>
            </div>
          </div> -->

          <div class="col-md-6 wow fadeInUp" data-wow-delay="0.2s" >
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url(); ?>LandingPageFiles/img/about-vision.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Visi Kami</a></h2>
              <p class="visi" style="text-align: justify; padding-bottom: 245px; padding-top: 15px">
               Menjadi Perusahaan Swasta Nasional yang berbasis teknologi dalam menghasilkan titik lokasi terbaik yang berfokus pada bidang periklanan dan terus bertumbuh secara berkesinambungan, memberikan kesejahteraan dan menjadi saluran berkat bagi semua yang berhubungan dengan kami.
              </p>
            </div>
          </div>

          <div class="col-md-6 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url(); ?>LandingPageFiles/img/about-mission.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Misi Kami</a></h2>
              <p style="text-align: justify;">
                <ol>
                <li>Memastikan lokasi yang ditawarkan adalah lokasi yang aman secara perijinannya dan bagus secara sudut pandang</li>
                <li>Mengembangkan kemitraaan dengan pemilik lahan untuk memperluas jangkauan penjualan perusahaan</li>
                <li>Memberikan pengalaman sewa – menyewa yang terpercaya, konsisten dan saling menguntungkan kepada seluruh pelanggan dengan teknologi modern</li> 
                <li>Memahami beragam kebutuhan lokasi dari klien dan memberikan layanan penyediaan lokasi yang tepat demi tercapainya kepuasaan klien</li>
                <li>Mengoptimalkan sinergi dengan pemilik lahan, klien, biro periklanan dan pemerintah</li>
                </ol>
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Keunggulan Kami</h3>
          <p>Selain Klien dapat dengan mudah mendapatkan lokasi media luar ruang yang sesuai dengan kebutuhan <br> dan pemilik lahan juga dapat menawarkan lahannya sebagai lokasi media iklan, ada 4 keunggulan yang kami berikan :</p>
        </header>

        <div class="row">

          <div class="col-lg-6 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-clock-outline"></i></div>
            <h4 class="title"><a href="">Efektivitas Waktu</a></h4>
            <p class="description jus">Dengan platform kami proses pencarian, penawaran dan pemasangan menjadi lebih mudah dan cepat. Menghemat waktu berharga anda dan nikmati hasilnya.</p>
          </div>
          <div class="col-lg-6 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-box-outline"></i></div>
            <h4 class="title"><a href="">Pengawasan Berhadiah</a></h4>
            <p class="description jus">Dengan sistem kami anda bisa membuat progress report dengan mudah serta mendapat reward setelah mengirimkan progress ke klien.</p>
          </div>
          <div class="col-lg-6 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-social-buffer-outline"></i></div>
            <h4 class="title"><a href="">Harga Bersaing</a></h4>
            <p class="description jus">Dengan beragamnya pilihan yang kami tawarkan, anda dijamin akan mendapat lokasi dengan harga terbaik dan anda juga bisa menentukan tawaran anda ke lokasi yang anda inginkan.</p>
          </div>
          <div class="col-lg-6 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-arrow-expand"></i></div>
            <h4 class="title"><a href="">Jangkuan Luas</a></h4>
            <p class="description jus">Lokasi kami menjangkau berbagai titik strategis di Indonesia dan akan terus berkembang ke daerah yang lebih luas lagi.</p>
          </div>
          <!-- <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-barcode-outline"></i></div>
            <h4 class="title"><a href="">Nemo Enim</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-people-outline"></i></div>
            <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div> -->

        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeIn">
      <div class="container text-center">
        <h3>Daftar Sekarang</h3>
        <p> Mari daftarkan diri Anda dan dapatkan keuntungannya!</p>
        <a class="cta-btn" href="<?= $form_pendaftaran_location ?>">Daftar</a>
      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Skills Section
    ============================-->
    <!-- <section id="skills"> -->
    <section id="services">
      <div class="container">

        <header class="section-header">
          <h3>Apa Keuntungan Bergabung dengan Kami?</h3>
          <p></p>
        </header>

        <div class="row">
          <div class="col-lg-4 col-md-4 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-star-outline"></i></div>
            <!-- <h4 class="title"><a href="">Efektivitas Waktu</a></h4> -->
            <p class="description jus">Penjualan dan pemasaran menjadi tanggung jawab Wiklan. Dengan demikian, anda tidak perlu lagi pusing mencari klien/potensi pembeli untuk lokasi anda. Semua akan kita urus sampai lokasi anda laku.</p>
          </div>
          <div class="col-lg-4 col-md-4 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-social-usd-outline"></i></div>
            <!-- <h4 class="title"><a href="">Pengawasan Berhadiah</a></h4> -->
            <p class="description jus">Pembayaran yang diterima tidak dipengaruhi oleh pembayaran dari klien. Jadi, meskipun nantinya agency/klien terlambat dalam melakukan pembayaran ke Wiklan, anda tetap mendapat fee sesuai perjanjian.</p>
          </div>
          <div class="col-lg-4 col-md-4 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-people"></i></div>
            <!-- <h4 class="title"><a href="">Harga Bersaing</a></h4> -->
            <p class="description jus">Mendapatkan rekomendasi vendor untuk pembangunan dari pihak perusahaan. Dalam proses pembangunan dan perijinan kita bisa membantu pencarian vendor dan training perijinan.</p>
          </div>
        </div>

        <!-- <div class="skills-content">

          <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">HTML <i class="val">100%</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">CSS <i class="val">90%</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">JavaScript <i class="val">75%</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">Photoshop <i class="val">55%</i></span>
            </div>
          </div>

        </div> -->

      </div>
    </section>

    <section id="faq">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">Pertanyaan yang Sering ditanyakan</h3>
          <span class="section-divider"></span>
          <p class="section-description">Berikut ini pertanyaan-pertanyaan yang sering ditanyakan :</p>
        </div>

        <ul id="faq-list" data-aos="fade-up" class="aos-init aos-animate">
          <li>
            <a data-toggle="collapse" class="" href="#faq1" aria-expanded="true">Apakah lokasi yang saya miliki cocok untuk dijual? <i class="ion-android-remove"></i></a>
            <div id="faq1" class="collapse show" data-parent="#faq-list" style="">
              <p>
                Semua lokasi memiliki potensi untuk dijual. Namun, setelah anda mendaftar kami akan memberikan daftar list dan kriteria lokasi yang mungkin akan berpengaruh terhadap seberapa bagus sebuah titik dan seberapa mudah titik itu akan terjual.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq2" class="collapsed" aria-expanded="false">Apa keuntungan yang akan saya dapatkan jika bergabung dan menjual lokasi saya melalui Wiklan? <i class="ion-android-remove"></i></a>
            <div id="faq2" class="collapse" data-parent="#faq-list" style="">
              <p>
                Kita akan melakukan proses "revenue sharing" dimana nantinya kita akan membuat kontrak yang disetujui pihak Wiklan dengan anda. Selebihnya, urusan pemasaran dan pencarian klien akan kami handle sehingga anda hanya perlu melakukan pembangunan beserta ijin titik. 
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq3" class="collapsed" aria-expanded="false">Saya tidak memiliki pengalaman produksi. Bagaimana? <i class="ion-android-remove"></i></a>
            <div id="faq3" class="collapse" data-parent="#faq-list" style="">
              <p>
                Kita akan menyediakan panduan untuk anda sehingga anda tidak perlu terlalu bingung dalam pelaksanaan produksi maupun perijinan. Kita juga akan memberikan database vendor produksi/perijinan yang anda bisa pakai dalam membantu anda mengurus masalah pembangunan.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq4" class="collapsed" aria-expanded="false">Saya tidak ingin berurusan dengan produksi/perijinan. Bisakah pihak Wiklan membantu? <i class="ion-android-remove"></i></a>
            <div id="faq4" class="collapse" data-parent="#faq-list" style="">
              <p>
                Jika anda ragu atau tidak mau repot dalam pelaksanaan produksi dan pengurusan ijin, anda juga bisa menggunakan jasa kami dalam pengurusan hal tersebut. Namun, akan ada kontrak khusus yang akan kita lakukan yang nantinya juga akan disetujui oleh pihak Wiklan dan anda.
              </p>
            </div>
          </li>

          <!-- <li>
            <a data-toggle="collapse" href="#faq5" class="collapsed" aria-expanded="false">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="ion-android-remove"></i></a>
            <div id="faq5" class="collapse" data-parent="#faq-list" style="">
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
          </li> -->
        </ul>
      </div>
    </section>

    <!--==========================
      Facts Section
    ============================-->
    <!-- <section id="facts"  class="wow fadeIn">
      <div class="container">

        <header class="section-header">
          <h3>Facts</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </header>

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">274</span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">421</span>
            <p>Projects</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1,364</span>
            <p>Hours Of Support</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">18</span>
            <p>Hard Workers</p>
          </div>

        </div>

        <div class="facts-img">
          <img src="<?php echo base_url(); ?>LandingPageFiles/img/facts-img.png" alt="" class="img-fluid">
        </div>

      </div>
    </section> --><!-- #facts -->

    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Galeri</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/app1.jpg" class="img-fluid" alt="">
                <a href="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/app1.jpg" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">App 1</a></h4>
                <p>App</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/web3.jpg" class="img-fluid" alt="">
                <a href="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/web3.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Web 3</a></h4>
                <p>Web</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/app2.jpg" class="img-fluid" alt="">
                <a href="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/app2.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 2" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">App 2</a></h4>
                <p>App</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/card2.jpg" class="img-fluid" alt="">
                <a href="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/card2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 2" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Card 2</a></h4>
                <p>Card</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/web2.jpg" class="img-fluid" alt="">
                <a href="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/web2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 2" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Web 2</a></h4>
                <p>Web</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/app3.jpg" class="img-fluid" alt="">
                <a href="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/app3.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 3" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">App 3</a></h4>
                <p>App</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/card1.jpg" class="img-fluid" alt="">
                <a href="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/card1.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 1" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Card 1</a></h4>
                <p>Card</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/card3.jpg" class="img-fluid" alt="">
                <a href="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/card3.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 3" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Card 3</a></h4>
                <p>Card</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/web1.jpg" class="img-fluid" alt="">
                <a href="<?php echo base_url(); ?>LandingPageFiles/img/portfolio/web1.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 1" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Web 1</a></h4>
                <p>Web</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #portfolio -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Klien Kami</h3>
        </header>

        <div class="owl-carousel clients-carousel">
          <img src="<?php echo base_url(); ?>LandingPageFiles/img/clients/client-1.png" alt="">
          <img src="<?php echo base_url(); ?>LandingPageFiles/img/clients/client-2.png" alt="">
          <img src="<?php echo base_url(); ?>LandingPageFiles/img/clients/client-3.png" alt="">
          <img src="<?php echo base_url(); ?>LandingPageFiles/img/clients/client-4.png" alt="">
          <img src="<?php echo base_url(); ?>LandingPageFiles/img/clients/client-5.png" alt="">
          <img src="<?php echo base_url(); ?>LandingPageFiles/img/clients/client-6.png" alt="">
          <img src="<?php echo base_url(); ?>LandingPageFiles/img/clients/client-7.png" alt="">
          <img src="<?php echo base_url(); ?>LandingPageFiles/img/clients/client-8.png" alt="">
        </div>

      </div>
    </section><!-- #clients -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="testimonials" class="section-bg wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>

        <div class="owl-carousel testimonials-carousel">

          <div class="testimonial-item">
            <img src="<?php echo base_url(); ?>LandingPageFiles/img/testimonial-1.jpg" class="testimonial-img" alt="">
            <h3>Saul Goodman</h3>
            <h4>Ceo &amp; Founder</h4>
            <p>
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/quote-sign-left.png" class="quote-sign-left" alt="">
              Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="<?php echo base_url(); ?>LandingPageFiles/img/testimonial-2.jpg" class="testimonial-img" alt="">
            <h3>Sara Wilsson</h3>
            <h4>Designer</h4>
            <p>
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/quote-sign-left.png" class="quote-sign-left" alt="">
              Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="<?php echo base_url(); ?>LandingPageFiles/img/testimonial-3.jpg" class="testimonial-img" alt="">
            <h3>Jena Karlis</h3>
            <h4>Store Owner</h4>
            <p>
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/quote-sign-left.png" class="quote-sign-left" alt="">
              Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="<?php echo base_url(); ?>LandingPageFiles/img/testimonial-4.jpg" class="testimonial-img" alt="">
            <h3>Matt Brandon</h3>
            <h4>Freelancer</h4>
            <p>
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/quote-sign-left.png" class="quote-sign-left" alt="">
              Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="<?php echo base_url(); ?>LandingPageFiles/img/testimonial-5.jpg" class="testimonial-img" alt="">
            <h3>John Larson</h3>
            <h4>Entrepreneur</h4>
            <p>
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/quote-sign-left.png" class="quote-sign-left" alt="">
              Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

        </div>

      </div>
    </section><!-- #testimonials -->

    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Team</h3>
          <p>Di WIKLAN, kami percaya bahwa berkembang menjadi manusia yang lebih baik adalah perjalanan yang tak berkesudahan yang hanya bisa dicapai dengan ketulusan untuk berbagi seperti manajer, dan keinginan untuk selalu belajar seperti karyawan.</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/man.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
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
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/woman.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
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

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/man.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
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
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="<?php echo base_url(); ?>LandingPageFiles/img/woman.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
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

        </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Hubungi Kami</h3>
          <p>Silahkan Hubungi kami</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Alamat</h3>
              <address>Jl. Lesti no. 42 <br> Surabaya 60241 <br>Jawa Timur – Indonesia</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Telp</h3>
              <p><a href="#">031-5678346</a><br>Fax : 031-5680646</p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">info@wiklan.com</a></p>
            </div>
          </div>

        </div>

        <!-- alert -->
        <?php 
        if (isset($flash)) {
          echo $flash;
        }
        ?>

        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <div id="status_error" style="display: none;">Failed!</div>
          <form id="contactForm">
            <div class="form-row">
              <div class="form-group col-md-4">
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Anda" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-4">
                <input type="text" class="form-control" name="telpon" id="telpon" placeholder="No telpon" data-rule="email" data-msg="Please enter a valid number" maxlength="13" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-4">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" data-rule="email" data-msg="Please enter a valid email" required/>
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <select class="form-control" name="subjek" id="subjek">
                <option>Pilih Subjek</option>
                <option value="Permintaan penawaran"> Permintaan penawaran </option>
                <option value="tanya"> Tanya </option>
                <option value="komplain"> Komplain </option>
                <option value="lain-lain"> Lain-lain </option>
              </select>
              <!-- <input type="text" class="form-control" name="subjek" id="subjek" placeholder="Judul" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div> -->
            </div>
            <div class="form-group">
              <textarea class="form-control" name="pesan" id="pesan" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Isi Pesan"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center">
              <button type="submit" name="submit" id="submit" value="Submit"><span class="ion-paper-airplane"></span> Kirim Pesan</button>
            </div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">

            <h3><a href="#intro"><img src="<?php echo base_url(); ?>LandingPageFiles/img/logo_wiklan.png" alt="" title="logo wiklan" style="width: 120px; height: auto;" /></a></h3>
            <p>Dapatkan lokasi dengan mudah yang sesuai kebutuhan, atau tawarkan lahan Anda dan dapatkan keuntungannya!</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Menu</h4>
            <ul class="nav-menu-bawah">
              <!-- <li><i class="ion-ios-arrow-right"></i> <a href="#">Home</a></li> -->
              <li><i class="ion-ios-arrow-right"></i> <a href="#about">Tentang Kami</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#services">Layanan</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="<?= $syarat_location ?>">Syarat dan Ketentuan</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="<?= $kebijakan_location ?>">Kebijakan Privasi</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Jl. Lesti no. 42 Surabaya 60241 <br>
              Jawa Timur – Indonesia <br>
              <strong>Phone :</strong> 031-5678346 <br>
              <strong>Fax :</strong> 031-5680646 <br>
              info@wiklan.com
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Langganan Informasi WIKLAN</h4>
            <p>Dapatkan Promo dan Artikel Menarik dari WIKLAN, Gratis dan Terupdate!</p>
            <div id="subscribeSuccess" style="display: none; color: #19abce;">success!</div>
            <div id="subscribeError" style="display: none; color: red;">error!</div>
            <form id="subscribeForm" style="display: inline;">
              <input type="email" placeholder="Tulis email Anda.." name="email" id="email_subscribe" style="display: inline;">
              <input type="hidden" name="status" id="status" value="1">
              <input type="submit" name="submit" id="submit" value="Submit" style="display: inline;">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>wiklan</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
        <!-- Best <a href="https://bootstrapmade.com/">Bootstrap Templates</a> by BootstrapMade -->
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/easing/easing.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/superfish/superfish.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/wow/wow.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/waypoints/waypoints.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/counterup/counterup.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/lightbox/js/lightbox.min.js"></script>
  <script src="<?php echo base_url(); ?>LandingPageFiles/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <!-- <script src="<?php echo base_url(); ?>LandingPageFiles/contactform/contactform.js"></script> -->

  <!-- Template Main Javascript File -->
  <script src="<?php echo base_url(); ?>LandingPageFiles/js/main.js"></script>

  <script>
    $(document).ready(function() {
      $("#contactForm").submit(function(e) {
        e.preventDefault();
        contactInitiate();
      });

      function contactInitiate() {
        $.post("<?php echo site_url('manage_kontak/entry_contact_us')?>", { 
          nama : $("#nama").val(),
          email : $("#email").val(),
          telpon : $("#telpon").val(),
          subjek : $("#subjek").val(),
          pesan : $("#pesan").val(),
          submit : $("#submit").val()
        }, function(data) { 
          resultStatus(data); 
          // console.log(data);
          // console.log(nama + ' ' + email + ' ' + telpon + ' ' + subjek + ' ' + pesan + ' ' + submit)
        }, "json");
      }

      function resultStatus(data) {
        if (data.status == 'OK') {
          $("#sendmessage").addClass("show");
          $("#errormessage").removeClass("show");
          $('.contactForm').find("input, textarea").val("");
          closeMe();
        } else {
          // $("#status_error").show();
          $("#errormessage").addClass("show");
          $('#errormessage').html(data.msg);
          closeMe(); 
        }
      }

      function closeMe() {
        setTimeout(function() {
          $("#sendmessage").removeClass("show");
          $("#errormessage").removeClass("show");
        }, 3000);
      }

    })
  </script>

  <script>
    $(document).ready(function() {
      $("#subscribeForm").submit(function(e) {
        e.preventDefault();
        subscribeInitiate();
        // console.log('ok');
      });

      function subscribeInitiate() {
        $.post("<?php echo site_url('manage_subscribe/entry_subscribe')?>", {
          email : $("#email_subscribe").val(),
          submit : $("#submit").val(),
          status : $("#status").val()
        }, function(data) {
          console.log(status);
          if (data.status == 'OK') {
            $("#subscribeSuccess").show();
            closeMsg();
          } else {
            $("#subscribeError").show();
            closeMsg();
          }
        }, "json");
      }

      function closeMsg() {
        setTimeout(function() {
          $("#subscribeSuccess").hide();
          $("#subscribeError").hide();
        }, 3000);
      }

    });
  </script>

  <script>
    $(document).ready(function() {
      $("#telpon").keypress(validateNumber);

      function validateNumber(event) {
          var key = window.event ? event.keyCode : event.which;
          if (event.keyCode === 8 || event.keyCode === 46) {
              return true;
          } else if ( key < 48 || key > 57 ) {
              return false;
          } else {
              return true;
          }
      };
    })
  </script>

</body>
</html>
