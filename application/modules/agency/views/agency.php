<?php
$shop_name = $this->db->get_where('settings' , array('type'=>'shop_name'))->row()->description;
$shop_phone = $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;
$shop_address = $this->db->get_where('settings' , array('type'=>'address'))->row()->description;
$shop_email = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
$system_logo = $this->db->get_where('settings' , array('type'=>'logo'))->row()->description;
?>

<style type="text/css">
	section#content {
		min-height: 250px;
		padding-top: 10px;
	}
</style>


<section id="content">
	<div class="global-map-area promo-box parallax" data-stellar-background-ratio="0.5" style="background-position: 50% 45.5px;">
        <div class="container">
            <div class="content-section description col-sm-12" style="height: 273px;">
                <div class="table-wrapper hidden-table-sm" style="height: 100%;">
                    <div class="table-cell col-md-8">
                        <h2 class="m-title" style="margin-left: 30px;">
                            Agensi / Klien (Pemesan media iklan)<br><em>Akses jaringan media iklan online independen terbesar di negara ini.</em>
                        </h2>
                    </div>
                    <div class="table-cell"></div>
                    <div class="table-cell action-section col-md-4 no-float pull-right">
                    	<a href="<?= base_url('youraccount/start') ?>" class="button green full-width btn-large fourty-space pull-right" style="margin-right: 30px;">DAFTAR SEBAGAI AGENCY / KLIEN</a>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>


<div id="main" class="col-sm-8 col-md-9">
    <div class="booking-information travelo-box">
        <div class="booking-confirmation clearfix" style="text-align: center;">
           	<div>
           		<h3>Deskripsi WIKLAN</h3>
           	</div>
            <div class="message">
                <p class="main-message">
                	WIKLAN adalah platform pemesanan online otomatis pertama untuk billboard dan media iklan lain-nya. Mulai dari membangun kampanye, membuat karya seni, melakukan pembayaran, dan memantau keefektifan kampanye, kami mempermudah untuk pemesanan dan menjalankan kampanye billboard maupun media iklan lain-nya.
				</p>
            </div>
        </div>
        
        <hr>
        <p>
        	WIKLAN adalah mitra pemasaran online lokal Anda dan terbaik di indonesia. WIKLAN menarik para pengiklan, agensi dan ahli strategi digital yang ingin memasukkan Out-of-Home (OOH) dalam kampanye pemasaran mereka dan sudah membeli bentuk media online lainnya termasuk digital, media sosial dan lainnya. WIKLAN menyederhanakan dan mengefektifkan proses pemesanan media iklan dan menarik bagi pengiklan dengan anggaran dari berbagai ukuran.
        </p>
        <p>
		Kami memberi Anda fleksibilitas untuk mengubah iklan Anda kapan saja dan kemampuan untuk menilai dampak kampanye Anda di pasar lokal atau nasional target Anda.
		</p>
		Pengalaman WIKLAN dirancang untuk membuat iklan billboard semudah mungkin, sambil memberikan Anda fleksibilitas untuk membuat kampanye yang sesuai dengan kebutuhan Anda dan membantu Anda menjangkau audiens yang tepat pada waktu yang tepat.
        </p>
        <hr>
        <div>
        	<h2 style="text-align: center;">Keuntungan Pemilik Agency / Klien</h2>
        	<ul>
        		<li>1.	Dapat melakukan pemesanan mandiri via aplikasi.</li>
				<li>2.	Report foto akan dikirimkan secara otomatis tiap awal bulan.</li>
				<li>3.	Memudahkan  karena tidak perlu harus mencari lokasi sendiri ke kota tertentu, karena data yang disajikan jelas dan lengkap.</li>
				<li>4.	Akan mendapatkan score tambahan apabila penilaian mencapai nilai 10 per pemesanan, score tersebut dapat diakumulasikan dan ditukarkan dengan potongan diskon untuk pembelian OOH selanjutnya.</li>
				<li>5. Lokasi yang ditawarkan sudah ada ijin dan pajaknya.</li>
				<li>6. Lokasi yang ditawarkan sudah tercover oleh asuransi.</li>
	
        	</ul>
        </div>
        <hr>
        <a href="<?= base_url('youraccount/start') ?>" class="button green full-width btn-large fourty-space">DAFTAR SEBAGAI AGENCY / KLIEN</a>
    </div>
</div>

<div class="sidebar col-sm-4 col-md-3">
    <div class="travelo-box contact-box">
        <h4>Butuh Bantuan WIKLAN?</h4>
        <p>Kami akan dengan senang hati membantu Anda. Tim kami siap melayani Anda 24/7 (Respon Cepat 24 Jam).</p>
        <address class="contact-details">
            <span class="contact-phone"><i class="soap-icon-phone"></i> <?= $shop_phone ?></span>
            <br>
            <a class="contact-email" href="#"><?= $shop_email ?></a>
        </address>
    </div>
</div>



<div class="col-sm-12 col-md-12">
	
	<div class="row block">
        <div class="col-sm-6 col-md-3">
            <div class="pricing-table green box">
                <div class="header clearfix">
                    <i class="soap-icon-clock circle white-color"></i><h4 class="box-title"><span>Efektivitas Waktu</span></h4>
                </div>
                <p class="description">
                    Dengan platform kami proses pencarian, penawaran, pemasangan menjadi lebih mudah dan cepat serta menghemat waktu berharga anda.
                </p>
               
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="pricing-table yellow box">
                <div class="header clearfix">
                    <i class="soap-icon-features circle white-color"></i><h4 class="box-title"><span>Harga Bersaing</span></h4>
                </div>
                <p class="description">
                    Dengan banyak pilihan yang kami tawarkan, anda dijamin akan mendapat lokasi dengan harga terbaik serta anda juga bisa memilih lokasi sesuai keinginan.
                </p>
               
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="pricing-table blue box">
                <div class="header clearfix">
                    <i class="soap-icon-flickr circle white-color"></i><h4 class="box-title"><span>W-Koin</span></h4>
                </div>
                <p class="description">
                    Dengan sistem kami anda bisa mendapat reward dengan syarat dan ketentuan yang berlaku serta koin yang didapat bisa ditukarkan dengan tiket/voucher maupun media iklan kami.
                </p>
               
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="pricing-table red box">
                <div class="header clearfix">
                    <i class="soap-icon-places circle white-color"></i><h4 class="box-title"><span>Jangkauan Luas</span></h4>
                </div>
                <p class="description">
                    Lokasi kami menjangkau berbagai titik strategis di Indonesia dan akan terus berkembang ke daerah yang lebih luas serta lokasi berpusat di kota-kota besar.
                </p>
               
            </div>
        </div>
    </div>

</div>
