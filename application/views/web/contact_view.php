<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="page-content">
    <div class="aon-page-benner-area">
              <div class="aon-page-banner-row" style="background-image: url(<?=asset_path('web/')?>images/banner/contactus.png)">
                <div class="sf-overlay-main" style="opacity:0.8; background-color:#022279;"></div>
                <div class="sf-banner-heading-wrap">
                  <div class="sf-banner-heading-area">
                    <div class="sf-banner-heading-large">Contact Us</div>
                    <div class="sf-banner-breadcrumbs-nav">
                      <ul class="list-inline">
                        <li><a href="<?=file_path()?>"> Home </a></li>
                        <li>Contact us</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--Banner-->

            <!-- Contact Us-->
            <div class="aon-contact-area">
              <div class="container">
                <!--Title Section Start-->
                <div class="section-head text-center">
                    <h2 class="sf-title">Contact Information</h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do usmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
                </div>
                <!--Title Section End-->

                <div class="section-content">

                  <div class="sf-contact-info-wrap">
                    <div class="row">

                        <!-- COLUMNS 1 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="sf-contact-info-box">
                                <div class="sf-contact-icon">
                                    <span><img src="<?=asset_path('web/')?>images/contact-us/1.png" alt=""></span>
                                </div>
                                <div class="sf-contact-info">
                                    <h4 class="sf-title">Mailing Address</h4>
                                    <p class="min-height-txt">121 King Street, Melbourne
                                        Victoria 3000 Australia</p>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 2 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="sf-contact-info-box">
                                <div class="sf-contact-icon">
                                    <span><img src="<?=asset_path('web/')?>images/contact-us/2.png" alt=""></span>
                                </div>
                                <div class="sf-contact-info">
                                    <h4 class="sf-title">Email Info</h4>
                                    <p class="min-height-txt"><a href="mailto:shubhexa@gmail.com" class="contact-fnt-clr">shubhexa@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 3 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="sf-contact-info-box">
                                <div class="sf-contact-icon">
                                    <span><img src="<?=asset_path('web/')?>images/contact-us/3.png" alt=""></span>
                                </div>
                                <div class="sf-contact-info">
                                    <h4 class="sf-title">Phone Number</h4>
                                    <p class="min-height-txt"><a href="tel:+919099932018" class="contact-fnt-clr">+91 90999 32018</a></p>
                                </div>
                            </div>
                        </div>

                    </div>
                  </div>

                  <div class="sf-contact-form-wrap">
                    <!--Contact Information-->
                    <div class="sf-contact-form">
                        <div class="sf-con-form-title text-center">
                            <h2 class="m-b30">Contact Information</h2>
                            <?php

$top_msg = $this->session->flashdata('msg_show');

if (is_array($top_msg)) {

	if ($top_msg['class'] == 'false') {?>
			<h5 style="color: red;"><?=$top_msg['msg']?></h5>

			<?php } else {?>
					<h5 style="color: red;"><?=$top_msg['msg']?></h5>
				<?php }}?>
                        </div>
                        <form class="" method="post" action="<?=file_path()?><?=$this->uri->rsegment(1)?>/check">
                        	<input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash();?>">
                            <div class="row">

                                <!-- COLUMNS 1 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                    	<?php $form_value = set_value('name', '');?>
                                        <input type="text" name="name" placeholder="Name" class="form-control" required>
                                        <?php echo form_error('name', '<p class="error_p">', '</p>'); ?>
                                    </div>
                                </div>

                                <!-- COLUMNS 2 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                    	<?php $form_value = set_value('email', '');?>
                                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                                        <?php echo form_error('email', '<p class="error_p">', '</p>'); ?>
                                    </div>
                                </div>
                                <!-- COLUMNS 3 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                    	<?php $form_value = set_value('phone', '');?>
                                        <input type="text" name="phone" placeholder="Phone" class="form-control">
                                        <?php echo form_error('phone', '<p class="error_p">', '</p>'); ?>
                                    </div>
                                </div>
                                <!-- COLUMNS 4 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                    	<?php $form_value = set_value('subject', '');?>
                                        <input type="text" name="subject" placeholder="Subject" class="form-control" required>
                                        <?php echo form_error('subject', '<p class="error_p">', '</p>'); ?>
                                    </div>
                                </div>

                                <!-- COLUMNS 5 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                    	<?php $form_value = set_value('message', '');?>
                                        <textarea name="message" placeholder="Message" class="form-control" required></textarea>
                                        <?php echo form_error('message', '<p class="error_p">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="g-recaptcha" data-sitekey="<?=GOOGLE_CAPTCHA_SITE_KEY?>"></div>
                                    <?php echo form_error('g-recaptcha-response', '<p class="error_p">', '</p>'); ?>
                                </div>


                            </div>
                            <div class="sf-contact-submit-btn">
                                <button class="site-button" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!--Contact Information End-->
                  </div>
                </div>

              </div>
            </div>

            <!-- Contact Us-->
            <div class="section-full sf-contact-map-area">
                <div class="container">

                    <div class="sf-map-social-block text-center">
                        <h2>Trusted by thousands of people all over the world</h2>
                        <ul class="sf-con-social">
                            <li><a href="<?=getLinks('Facebook','social')?>" target="_blank" class="sf-fb"><img src="<?=asset_path('web/')?>images/contact-us/facebook.png" alt="">Facebook</a></li>
                            <li><a href="<?=getLinks('Twitter','social')?>" target="_blank" class="sf-twitter"><img src="<?=asset_path('web/')?>images/contact-us/twitter.png" alt="">Twitter</a></li>
                            <li><a href="<?=getLinks('Instagram','social')?>" target="_blank" class="sf-pinterest"><i class="fa fa-instagram"></i> Instagram</a></li>
                        </ul>

                        <div class="sf-con-social-pic">
                            <span class="img-pos-1"><img src="<?=asset_path('web/')?>images/contact-us/1.jpg" alt=""></span>
                            <span class="img-pos-2"><img src="<?=asset_path('web/')?>images/contact-us/2.jpg" alt=""></span>
                            <span class="img-pos-3"><img src="<?=asset_path('web/')?>images/contact-us/3.jpg" alt=""></span>
                            <span class="img-pos-4"><img src="<?=asset_path('web/')?>images/contact-us/4.jpg" alt=""></span>
                            <span class="img-pos-5"><img src="<?=asset_path('web/')?>images/contact-us/5.jpg" alt=""></span>
                            <span class="img-pos-6"><img src="<?=asset_path('web/')?>images/contact-us/6.jpg" alt=""></span>
                        </div>
                    </div>

                </div>
                <div class="sf-map-wrap">
                    <div class="gmap-area">
                        <iframe src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
                </div>
            </div>
</div>
<style type="text/css">
	.error_p{
		color: red;
	}
    a.contact-fnt-clr {
        color: #626262;
    }
    @media (min-width: 768px) {
        .min-height-txt{
            min-height: 54px;
        }
    }
</style>
