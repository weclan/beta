<style type="text/css">
    .global-map-area.one {
        height: 600px;
    }

    .text-proses {
        position: relative;
        top: 30px;
    }

    .travelo-process {
        top: 60px;
    }

    p.hidden-xs {
        color: #fff !important;
    }
</style>


            <div class="global-map-area one section parallax" data-stellar-background-ratio="0.5">
                <div class="container description text-center">
                    
                    <div class="text-proses"><h1>Bagaimana Wiklan Bekerja?</h1></div>
                    <div class="travelo-process">
                        
                        <img src="<?= base_url() ?>marketplace/images/alur_proses.png" alt="">
                        <div class="process first icon-box style12">
                            <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="1">
                                <h4>1. Cek Ketersediaan</h4>
                                <p class="hidden-xs">Cari dan bandingkan lokasi strategis yang diinginkan.</p>
                            </div>
                            <div class="icon-wrapper animated" data-animation-type="slideInLeft" data-animation-delay="0">
                                <!-- <div class="icon-box style7"><i>1</i></div> -->
                                <i class="soap-icon-availability circle"></i>
                            </div>
                        </div>
                        <div class="process second icon-box style12">
                            <div class="icon-wrapper animated" data-animation-type="slideInRight" data-animation-delay="1.5">
                                <i class="soap-icon-departure circle"></i>
                            </div>
                            <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="2.5">
                                <h4>2. Sewa Lokasi</h4>
                                <p class="hidden-xs">Pesan lokasi sesuai kebutuhan dan transfer.</p>
                            </div>
                        </div>
                        <div class="process third icon-box style12">
                            <div class="icon-wrapper animated" data-animation-type="slideInRight" data-animation-delay="2">
                                <i class="soap-icon-magazine circle"></i>
                            </div>
                            <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="3">
                                <h4>3. Produksi &amp; Pemasangan</h4>
                                <p class="hidden-xs">Pembangunan media iklan sesuai keinginan customer &amp; Pemasangan materi ke media iklan.</p>
                            </div>
                        </div>
                        <div class="process forth icon-box style12">
                            <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="4.5">
                                <h4>4. Pelaporan</h4>
                                <p class="hidden-xs">Memberikan laporan iklan terpasang.</p>
                            </div>
                            <div class="icon-wrapper animated" data-animation-type="slideInLeft" data-animation-delay="3.5">
                                <i class="soap-icon-stories circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?= Modules::run('filter_nav/_draw_filter_loc') ?>

			<?= Modules::run('manage_product/_draw_fav_product') ?>

            <div class="container">
                <div class="section">
            		<h2>Panduan dan Tips WIKLAN</h2>
                    <div class="row">
                        <div class="col-sms-6 col-sm-6 col-md-3">
                            <div class="travelo-box">
                                <h4 class="s-title animated" data-animation-type="fadeInLeft">Rencanakan Lokasi Anda</h4>
                                <p>Cari, pilih dan bandingkan lokasi sesuai kebutuhan anda.</p>
                            </div>
                        </div>
                        <div class="col-sms-6 col-sm-6 col-md-3">
                            <div class="travelo-box">
                                <h4 class="s-title animated" data-animation-type="fadeInLeft">Cek Ketersediaan</h4>
                                <p>Cek lokasi yang masih ada label Available, Nego atau Promo di WIKLAN.</p>
                            </div>
                        </div>
                        <div class="col-sms-6 col-sm-6 col-md-3">
                            <div class="travelo-box">
                                <h4 class="s-title animated" data-animation-type="fadeInLeft">Asuransi Media</h4>
                                <p>Pastikan lokasi tersebut mempunyai asuransi dan ijin pendirian dari pihak terkait dengan chat maupun kontak Customer service kami.</p>
                            </div>
                        </div>
                        <div class="col-sms-6 col-sm-6 col-md-3">
                            <div class="travelo-box">
                                <h4 class="s-title animated" data-animation-type="fadeInLeft">Keamanan Pemesanan Anda</h4>
                                <p>Pastikan akun yang anda daftarkan, username dan password tidak diketahui oleh orang lain. Selain orang kepercayaan anda.</p>
                            </div>
                        </div>
                    </div>

                    <?php
                    require_once('our_clients.php');
                    ?>
            	</div>
            </div>

