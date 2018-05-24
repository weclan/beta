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
                    <div class="table-cell">
                        <h2 class="m-title" style="margin-left: 30px;">
                            Pemilik Titik / Persil (Jual media iklan)<br><em>Bergabunglah dengan jaringan media pemasangan iklan independen online terbesar di negara ini.</em>
                        </h2>
                    </div>
                    <div class="table-cell"></div>
                    <div class="table-cell action-section col-md-4 no-float pull-right">
                    	<a href="<?= base_url('youraccount/start') ?>" class="button green full-width btn-large fourty-space pull-right" style="margin-right: 30px;">DAFTAR SEBAGAI PEMILIK TITIK</a>
                        
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
                	Memperkenalkan WIKLAN, platform pemesanan otomatis pertama untuk media pemasangan iklan.
					<br>Dari pemesanan hingga pembayaran, kami membantu bisnis dan merek lokal, regional, dan nasional dalam membangun, membeli, dan mengeksekusi kampanye OOH online bahkan jika mereka belum pernah membeli OOH sebelumnya.
					<br>WIKLAN juga memohon kepada ribuan biro/agensi iklan lokal dan regional, serta agensi online, SEO, dan digital yang ingin memasukkan iklan luar ruang ke dalam campuran media klien mereka.
				</p>	
            </div>
        </div>
    	<hr>
       	<p>
        	WIKLAN adalah mitra pemasaran dan penjualan online lokal Anda serta membantu persil/pemilik titik masuk ke pembeli baru. Tujuan kami adalah membuat billboard mudah dibeli oleh klien. Banyak dari calon pengiklan (klien) ini telah menghabiskan ratusan juta setiap tahun untuk inisiatif pemasaran dan periklanan termasuk iklan cetak, selebaran, rambu jalan, kata iklan online, kampanye media sosial, ledakan email (blast email), dan pusat panggilan. Persil/pemilik titik yang lebih besar dan agensi spesialis OOH tertarik untuk beriklan secara online tetapi harus mampu membeli jaringan display (website katalog) atau media online lain nya. Buat dan daftarkan billboard/media iklan Anda secara gratis dengan jaringan media iklan online independen terbesar dan aktifkan pembelian online hari ini di WIKLAN.
        </p>
        <p>
			Tim spesialis periklanan kami, bermitra dengan pemasaran online yang akan memaparkan media iklan Anda kepada pembeli baru. WIKLAN adalah alat berharga yang membantu tim penjualan Anda secara efektif melayani pembeli online, pembeli uji coba, dan meningkatkan penjualan anda.
			Platform WIKLAN dirancang untuk meniru pengalaman bahwa pembeli iklan online telah tumbuh terbiasa dan mendidik mereka tentang manfaat menggabungkan iklan OOH ke dalam campuran media iklan online mereka. 
        </p>	
        <hr>
    	<h2 style="text-align: center;">Keuntungan Pemilik Titik / Persil</h2>
    	<ul>
    		<li>1.	Penjualan dan pemasaran menjadi tanggung jawab Perusahaan</li>
			<li>2.	Pembayaran yang diterima tidak dipengaruhi oleh pembayaran dari klien</li>
			<li>3.	Mendapatkan training dari pihak perusahaan terkait pengajuan perijinannya</li>
			<li>4.	Mendapatkan rekomendasi vendor untuk pembangunan dari pihak perusahaan</li>
			<li>5.	Komisi yang didapat :
				- Apabila dibantu dana pembangunan di awal, maka komisinya 50% : 50%
			- Apabila dana pembangunan di awal full dari pemilik titik lokasi, maka komisinya 75% : 25%
			Contoh :
			a.	Harga Jual uk.5x10 : 500.000.000
			      	            Pemilik titik lokasi dapat 250.000.000 
			     		Perusahaan dapat 250.000.000
			a.	Harga Jual uk.5x10 : 500.000.000
					Pemilik titik lokasi dapat 375.000.000 
					Perusahaan dapat 125.000.000</li>
			<li>6. Bangunan Billboard menjadi hak milik pemilik titik lokasi.</li>
			<li>7. Akan mendapatkan score tambahan apabila penilaian tiap bulannya mencapai nilai 10, score tersebut dapat. Diakumulasikan dan ditukarkan dengan hadiah menarik (misal tour atau voucher belanja)</li>
			<li>8. Pemilik lahan bebas menentukan harga  bottom price untuk penjualan lokasi tersebut.</li>
			<li>9. Pemilik lahan mempunyai akun sendiri untuk dapat mengedit atau menambahkan foto, video, atau keterangan dari lokasi yang dimilikinya.</li>
    	</ul>
      
        <hr>
        <a href="<?= base_url('youraccount/start') ?>" class="button green full-width btn-large fourty-space">DAFTAR SEBAGAI PEMILIK TITIK</a>
        
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
                    <i class="soap-icon-user circle white-color"></i><h4 class="box-title"><span>Target Pelanggan</span></h4>
                </div>
                <p class="description">
                    Pemasaran di WIKLAN akan meningkatkan penjualan Anda ke ratusan pengiklan baru.
                </p>
               
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="pricing-table yellow box">
                <div class="header clearfix">
                    <i class="soap-icon-plane circle white-color"></i><h4 class="box-title"><span>Pendapatan Meningkat</span></h4>
                </div>
                <p class="description">
                    Manfaatkan durasi sewa dan isi deskripsi kelebihan media iklan Anda melalui marketplace penawaran di WIKLAN.
                </p>
               
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="pricing-table blue box">
                <div class="header clearfix">
                    <i class="soap-icon-shopping circle white-color"></i><h4 class="box-title"><span>Penjualan Otomatis</span></h4>
                </div>
                <p class="description">
                    Tidak perlu lagi mendorong kertas penawaran dan menjawab panggilan, penjualan WIKLAN otomatis dari pemesanan ke pembayaran.
                </p>
               
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="pricing-table red box">
                <div class="header clearfix">
                    <i class="soap-icon-flexible circle white-color"></i><h4 class="box-title"><span>Dibayar</span></h4>
                </div>
                <p class="description">
                    Berhenti mengejar piutang dan dapatkan bayaran tepat waktu. Semua transaksi WIKLAN adalah pra-bayar.
                </p>
               
            </div>
        </div>
    </div>

</div>


