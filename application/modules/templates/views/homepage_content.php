



            

            <div class="global-map-area section parallax" data-stellar-background-ratio="0.5">
                <div class="container description text-center">
                    <h1>How Travelo Works?</h1>
                    <br>
                    <div class="travelo-process">
                        <img src="images/travelo_process.png" alt="">
                        <div class="process first icon-box style12">
                            <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="1">
                                <h4>Explore Destinations</h4>
                                <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                            <div class="icon-wrapper animated" data-animation-type="slideInLeft" data-animation-delay="0">
                                <i class="soap-icon-beach circle"></i>
                            </div>
                        </div>
                        <div class="process second icon-box style12">
                            <div class="icon-wrapper animated" data-animation-type="slideInRight" data-animation-delay="1.5">
                                <i class="soap-icon-availability circle"></i>
                            </div>
                            <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="2.5">
                                <h4>Check Availability</h4>
                                <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                        <div class="process third icon-box style12">
                            <div class="icon-wrapper animated" data-animation-type="slideInRight" data-animation-delay="2">
                                <i class="soap-icon-stories circle"></i>
                            </div>
                            <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="3">
                                <h4>Book Online</h4>
                                <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                        <div class="process forth icon-box style12">
                            <div class="details animated" data-animation-type="fadeInUp" data-animation-delay="4.5">
                                <h4>Get Ready to Fly</h4>
                                <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                            <div class="icon-wrapper animated" data-animation-type="slideInLeft" data-animation-delay="3.5">
                                <i class="soap-icon-plane-left takeoff-effect1 circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?= Modules::run('filter_nav/_draw_filter_loc') ?>

			<?= Modules::run('manage_product/_draw_fav_product') ?>

            <div class="container">
                <div class="section">
            		<h2>Travel Guide and Tips</h2>
                    <div class="row">
                        <div class="col-sms-6 col-sm-6 col-md-3">
                            <div class="travelo-box">
                                <h4 class="s-title animated" data-animation-type="fadeInLeft">Plan your Travels</h4>
                                <p>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus iaculis vitae pulvinar.</p>
                            </div>
                        </div>
                        <div class="col-sms-6 col-sm-6 col-md-3">
                            <div class="travelo-box">
                                <h4 class="s-title animated" data-animation-type="fadeInLeft">Check Availability</h4>
                                <p>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus iaculis vitae pulvinar.</p>
                            </div>
                        </div>
                        <div class="col-sms-6 col-sm-6 col-md-3">
                            <div class="travelo-box">
                                <h4 class="s-title animated" data-animation-type="fadeInLeft">Get Insurance</h4>
                                <p>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus iaculis vitae pulvinar.</p>
                            </div>
                        </div>
                        <div class="col-sms-6 col-sm-6 col-md-3">
                            <div class="travelo-box">
                                <h4 class="s-title animated" data-animation-type="fadeInLeft">Secure your Bookings</h4>
                                <p>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus iaculis vitae pulvinar.</p>
                            </div>
                        </div>
                    </div>

                    <?php
                    require_once('our_clients.php');
                    ?>
            	</div>
            </div>

