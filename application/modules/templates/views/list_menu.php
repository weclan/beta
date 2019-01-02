<div 
		id="m_ver_menu" 
		class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
		data-menu-vertical="true"
		 data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
		>
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'marketing' || $this->session->userdata('level') == 'finance' || $this->session->userdata('level') == 'secretary') { ?>	
							<li class="m-menu__item  <?= ($this->uri->segment(1) == 'dashboard') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
								<a  href="<?php echo base_url();?>dashboard/home" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-line-graph"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Dashboard
											</span>
											<!-- <span class="m-menu__link-badge">
												<span class="m-badge m-badge--danger">
													2
												</span>
											</span> -->
										</span>
									</span>
								</a>
							</li>
						<?php } ?>	

							<li class="m-menu__section">
								<h4 class="m-menu__section-text">
									Landing Page
								</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
							
						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'marketing' || $this->session->userdata('level') == 'secretary') { ?>
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_kontak' || $this->uri->segment(1) == 'enquiry') ? 'm-menu__item--open m-menu__item--expanded' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-support"></i>
									<span class="m-menu__link-text">
										Kontak
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Kontak
												</span>
											</span>
										</li>
										<li class="m-menu__item <?= ($this->uri->segment(1) == 'manage_kontak') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>manage_kontak/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Daftar Kontak
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'enquiry') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>enquiry/inbox" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Log Reply
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						<?php } ?>
							
						<?php if ($this->session->userdata('level') == 'admin' ) { ?>	
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_akun') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_akun/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-users"></i>
									<span class="m-menu__link-text">
										Daftar Akun
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' ) { ?>
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_role') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_role/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-user-settings"></i>
									<span class="m-menu__link-text">
										Level Admin
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' ) { ?>
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_faq') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_faq/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-info"></i>
									<span class="m-menu__link-text">
										Daftar FAQs
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'marketing' || $this->session->userdata('level') == 'secretary') { ?>
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_subscribe' || $this->uri->segment(1) == 'loghistory') ? 'm-menu__item--open m-menu__item--expanded' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-paper-plane"></i>
									<span class="m-menu__link-text">
										Subscribe
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Subscribe
												</span>
											</span>
										</li>
										<li class="m-menu__item <?= ($this->uri->segment(1) == 'manage_subscribe') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>manage_subscribe/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Daftar Subsriber
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'loghistory') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>loghistory/inbox" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Log Reply
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						<?php } ?>
							
						<?php if ($this->session->userdata('level') == 'admin' ) { ?>
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_galeri') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_galeri/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-squares-3"></i>
									<span class="m-menu__link-text">
										Daftar Galeri
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' ) { ?>
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_banner') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_banner/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-web"></i>
									<span class="m-menu__link-text">
										Daftar Banner
									</span>
								</a>								
							</li>
						<?php } ?>

						<?php if ($this->session->userdata('level') == 'admin' ) { ?>
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_ourClient') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_ourClient/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-app"></i>
									<span class="m-menu__link-text">
										Daftar Our Client
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'marketing' || $this->session->userdata('level') == 'secretary') { ?>
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_testimoni') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_testimoni/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-speech-bubble-1"></i>
									<span class="m-menu__link-text">
										Daftar Testimoni
									</span>
								</a>								
							</li>
						<?php } ?>


							<li class="m-menu__section">
								<h4 class="m-menu__section-text">
									Marketplace
								</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'marketing' || $this->session->userdata('level') == 'secretary') { ?>	
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_daftar') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_daftar/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-layers"></i>
									<span class="m-menu__link-text">
										Daftar Persil
									</span>
								</a>								
							</li>
						<?php } ?>

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'marketing' || $this->session->userdata('level') == 'secretary') { ?>	
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_product') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_product/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-map-location"></i>
									<span class="m-menu__link-text">
										Daftar OOH
									</span>
								</a>								
							</li>
						<?php } ?>

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'marketing' || $this->session->userdata('level') == 'secretary') { ?>
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'vendor') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>vendor/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-profile"></i>
									<span class="m-menu__link-text">
										Daftar Vendor
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' ) { ?>
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'store_categories' || $this->uri->segment(1) == 'store_roads' || $this->uri->segment(1) == 'store_sizes' || $this->uri->segment(1) == 'store_labels' || $this->uri->segment(1) == 'store_provinces' || $this->uri->segment(1) == 'store_cities' || $this->uri->segment(1) == 'store_districs' || $this->uri->segment(1) == 'store_duration') ? 'm-menu__item--open m-menu__item--expanded' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-squares-4"></i>
									<span class="m-menu__link-text">
										Kategori
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Kategori
												</span>
											</span>
										</li>
										<li class="m-menu__item <?= ($this->uri->segment(1) == 'store_categories') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>store_categories/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Kategori Produk
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'store_roads') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>store_roads/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Kategori Jalan
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'store_sizes') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>store_sizes/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Kategori Ukuran
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'store_labels') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>store_labels/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Kategori Label
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'store_duration') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>store_duration/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Kategori Durasi
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'store_provinces') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>store_provinces/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Provinsi
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'store_cities') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>store_cities/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Kota/kabupaten
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'store_districs') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>store_districs/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Kecamatan
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						<?php } ?>

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'marketing' || $this->session->userdata('level') == 'secretary') { ?>
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'store_orders') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>store_orders/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-business"></i>
									<span class="m-menu__link-text">
										Order
									</span>
								</a>								
							</li>
						<?php } ?>

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'marketing' || $this->session->userdata('level') == 'finance' || $this->session->userdata('level') == 'secretary') { ?>
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'confirmation') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>confirmation/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-coins"></i>
									<span class="m-menu__link-text">
										Konfirmasi Pembayaran
									</span>
								</a>								
							</li>
						<?php } ?>

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'marketing' || $this->session->userdata('level') == 'secretary') { ?>
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'calendar') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>calendar/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-calendar"></i>
									<span class="m-menu__link-text">
										Calendar
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'marketing' || $this->session->userdata('level') == 'secretary') { ?>	
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_materi') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_materi/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-tabs"></i>
									<span class="m-menu__link-text">
										Materi
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'marketing' || $this->session->userdata('level') == 'secretary') { ?>	
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_laporan') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_laporan/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-folder-1"></i>
									<span class="m-menu__link-text">
										BAPP
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'marketing' || $this->session->userdata('level') == 'secretary') { ?>
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'review') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>review/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-chat"></i>
									<span class="m-menu__link-text">
										Daftar Review
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'marketing' || $this->session->userdata('level') == 'secretary') { ?>	
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'request') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>request" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-interface-9"></i>
									<span class="m-menu__link-text">
										Request
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'marketing' || $this->session->userdata('level') == 'secretary') { ?>	
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_complain') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_complain/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-list-3"></i>
									<span class="m-menu__link-text">
										Komplain
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'marketing' || $this->session->userdata('level') == 'secretary') { ?>	
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'manage_task') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>manage_task/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-clipboard"></i>
									<span class="m-menu__link-text">
										Task
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'finance') { ?>
							
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'invoices' || $this->uri->segment(1) == 'tax' || $this->uri->segment(1) == 'bank') ? 'm-menu__item--open m-menu__item--expanded' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-analytics"></i>
									<span class="m-menu__link-text">
										Accounting
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Accounting
												</span>
											</span>
										</li>
										<li class="m-menu__item <?= ($this->uri->segment(1) == 'invoices') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>invoices/" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Invoice
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'bank') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>bank/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Bank
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'tax') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>tax/inbox" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Pajak
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

						<?php } ?>

						<?php if ($this->session->userdata('level') == 'admin' ) { ?>
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'slideshow' || $this->uri->segment(1) == 'blog' || $this->uri->segment(1) == 'promo' || $this->uri->segment(1) == 'manage_voucher') ? 'm-menu__item--open m-menu__item--expanded' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-graph"></i>
									<span class="m-menu__link-text">
										Marketing
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Marketing
												</span>
											</span>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'slideshow') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>slideshow/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Slide Banner
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'blog') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>blog/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Artikel
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'promo') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>promo/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Promo
												</span>
											</a>
										</li>

										<li class="m-menu__item <?= ($this->uri->segment(1) == 'manage_voucher') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true" >
											<a  href="<?php echo base_url();?>manage_voucher/manage" class="m-menu__link">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Voucher
												</span>
											</a>
										</li>

									</ul>
								</div>
							</li>
						<?php } ?>

						

						<?php if ($this->session->userdata('level') == 'admin' ) { ?>	
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'client') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>client/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-signs"></i>
									<span class="m-menu__link-text">
										Daftar Our Client
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'secretary' ) { ?>	
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'enquiries') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>enquiries/inbox" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-chat-1"></i>
									<span class="m-menu__link-text">
										Enquiries
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'secretary' || $this->session->userdata('level') == 'marketing') { ?>	
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'notifications') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>notifications/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-alert"></i>
									<span class="m-menu__link-text">
										Notifikasi
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' ) { ?>	
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'monitoring') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>monitoring/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-imac"></i>
									<span class="m-menu__link-text">
										Monitoring
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' ) { ?>	
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'webpages') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>webpages/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-browser"></i>
									<span class="m-menu__link-text">
										CMS
									</span>
								</a>								
							</li>
						<?php } ?>	

						<?php if ($this->session->userdata('level') == 'admin' ) { ?>	
							<li class="m-menu__item  m-menu__item--submenu <?= ($this->uri->segment(1) == 'store_settings') ? 'm-menu__item--active' : '' ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo base_url();?>store_settings/manage" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-settings-1"></i>
									<span class="m-menu__link-text">
										Settings
									</span>
								</a>								
							</li>
						<?php } ?>	

							<!-- <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-interface-3"></i>
									<span class="m-menu__link-text">
										General
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													General
												</span>
											</span>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
											<a  href="#" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Pricing Tables
												</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true" >
														<a  href="snippets/general/pricing-tables/pricing-table-1.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Pricing Tables v1
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a  href="snippets/general/pricing-tables/pricing-table-2.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Pricing Tables v2
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a  href="snippets/general/pricing-tables/pricing-table-3.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Pricing Tables v3
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a  href="snippets/general/pricing-tables/pricing-table-4.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Pricing Tables v4
															</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-suitcase"></i>
									<span class="m-menu__link-text">
										Custom Pages
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													Custom Pages
												</span>
											</span>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
											<a  href="#" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													User Pages
												</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/user/login-1.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Login - 1
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/user/login-2.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Login - 2
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/user/login-3.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Login - 3
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/user/login-4.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Login - 4
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/user/login-5.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Login - 5
															</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
											<a  href="#" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Error Pages
												</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/errors/error-1.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Error 1
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/errors/error-2.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Error 2
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/errors/error-3.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Error 3
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/errors/error-4.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Error 4
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/errors/error-5.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Error 5
															</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true" >
														<a target="_blank" href="snippets/pages/errors/error-6.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">
																Error 6
															</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</li> -->
						</ul>
					</div>