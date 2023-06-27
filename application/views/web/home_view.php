<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="page-content">
	<section class="aon-banner-wrap">
        <div class="aon-banner-outer sf-overlay-wrapper">
            <div class="aon-banner-pic">
                <div class="aon-curve-area"></div>
                <div class="aon-overlay-main" style="opacity:0.85; background-color:#02227866;"></div>
                <img src="<?=asset_path('web/')?>images/banner/colorful-background-banner.jpg" width="1919" height="976" alt="">
            </div>
            <div class="aon-banner-text">
                <div class="container">
                    <div class="aon-bnr-write">
                    	<h2 class="text-bot-line">1000+ ગુજરાતી સેલીબ્રીટી</h2>
                        <h3 class="text-top-line">દ્વારા આપના પ્રિયજનો ને ગુજરાતી અંદાજમાં શુભકામના પાઠવો</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="aon-find-bar aon-findBar-vertical">
          <div class="container">
            <div class="search-form ">
              <form class="clearfix search-providers" method="get" id="categorysrchform">
                <input type="hidden" name="s" value="">
                  <div class="aon-searchbar-table">
                  <div class="aon-searchbar-left">
                    <ul class="clearfix sf-searchfileds-count-5">
                      <!-- <li>
                        <label>Keyword</label>
                        <input type="text" value="" placeholder="Enter Keyword" id="keyword" name="keyword" class="form-control sf-form-control">
                        <span class="sf-search-icon"><img src="<?=asset_path('web/')?>images/search-bar/keyword.png" alt=""/></span>
                      </li> -->
                      <li>
                        <label>Category</label>
                        <select id="categorysrh" name="catid" class="form-control sf-form-control aon-categories-select sf-select-box" title="Select Category">
                            <option class="bs-title-option" value="">Select a Category</option>
                            <?php for ($i = 0; $i < count($resCategory); $i++) {?>
                            	<option value="<?=$resCategory[$i]['access_name']?>" data-content="<img class='childcat-img' width='50' height='auto' src='<?=base_url()?>upload/category/<?=$resCategory[$i]['img_name']?>'>
                              <span class='childcat'><?=$resCategory[$i]['category_name']?></span>">
                            </option>
                            <?php }?>
                          </select>
                          <span id="categorysrh_error" style="color:red;"></span>
                        <span class="sf-search-icon"><img src="<?=asset_path('web/')?>images/search-bar/maintenance.png" alt=""/></span>
                      </li>
                    </ul>
                  </div>
                  <div class="aon-searchbar-right">
                    <button type="submit" class="site-button"><i class="fa fa-search"></i> Search</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </section>
    <section class="bg-white aon-categories-area sf-curve-pos">
        <div class="container">
            <div class="section-head">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <span class="aon-sub-title">Featured</span>
                        <h2 class="aon-title">Popular Categories</h2>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="owl-carousel categories-carousel-owl aon-owl-arrow">
                	<?php for ($i = 0; $i < count($resCategory); $i++) {?>
                	<div class="item">
                        <div class="aon-cat-item">
                            <div class="aon-cat-pic media-bg-animate shine-hover">
                                <a class="shine-box" href="<?=file_path()?>celebrity/list/<?=$resCategory[$i]['access_name']?>"><img src="<?=base_url()?>upload/category/<?=$resCategory[$i]['img_name']?>" alt="<?=$resCategory[$i]['category_name']?>"></a>
                            </div>
                            <h4 class="aon-cat-title"><?=$resCategory[$i]['category_name']?></h4>
                        </div>
                    </div>
                <?php }?>                    
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white aon-how-service-area sf-curve-pos">
        <div class="container">
            <div class="section-content">
               <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <span class="aon-sub-title">Steps</span>
                        <h2 class="sf-title">How Shubhexa Works</h2>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="aon-step-blocks">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 m-b30">
                                    <div class="aon-step-section step-position-1 aon-icon-effect">
                                        <div class="aon-step-icon aon-icon-box">
                                            <span>
                                                <i class="aon-icon"><img src="<?=asset_path('web/')?>images/step-icon/1.png" alt=""></i>
                                            </span>
                                        </div>
                                        <div class="aon-step-info">
                                            <h4 class="aon-title">શુભેક્ષા વેબ/એપ ઉપર લોગીન કરો</h4>
                                            <!-- <p></p> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 m-b30">
                                    <div class="aon-step-section step-position-2 aon-icon-effect">
                                        <div class="aon-step-icon">
                                            <span>
                                                <i class="aon-icon"><img src="<?=asset_path('web/')?>images/step-icon/2.png" alt=""></i>
                                            </span>
                                        </div>
                                        <div class="aon-step-info">
                                            <h4 class="aon-title">તમારા મનગમતા સેલિબ્રિટી સિલેક્ટ કરી, નિર્ધારિત પેમેન્ટ કરો</h4>
                                            <!-- <p></p> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 m-b30">
                                    <div class="aon-step-section  step-position-3  aon-icon-effect">
                                        <div class="aon-step-icon">
                                            <span>
                                                <i class="aon-icon"><img src="<?=asset_path('web/')?>images/step-icon/3.png" alt=""></i>
                                            </span>
                                        </div>
                                        <div class="aon-step-info">
                                            <h4 class="aon-title">તમારો વિડિઓ 7 દિવસ ની અંદર આપને મળી જશે</h4>
                                            <!-- <p>તમારો વિડિઓ 7 દિવસ ની અંદર આપને મળી જશે</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="site-bg-gray aon-feature-provider-area sf-curve-pos">
        <div class="container">
            <div class="section-head">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <span class="aon-sub-title">Stars</span>
                        <h2 class="sf-title">Trending Gujju Stars</h2>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="owl-carousel aon-featurd-provider-carousel aon-owl-arrow">

                        <?php for ($i = 0; $i < count($resRecentCelebirty); $i++) {
	$resWishlist = $this->comman_fun->check_record('wishlist_master', array('celebrity_id' => $resRecentCelebirty[$i]['id'], 'usercode' => $this->session->userdata['user']['usercode']));

	if ($resWishlist == true) {
		$heartClass = 'fa fa-heart';
	} else {
		$heartClass = 'fa fa-heart-o';
	}
	?>
                        <div class="item">
                            <div class="aon-ow-provider-wrap">
                                <div class="aon-ow-provider shine-hover" style="min-height: 432px;">

                                    <div class="aon-ow-top">
                                        <div class="aon-pro-check"><span><i class="fa fa-check"></i></span></div>
                                        <div class="aon-pro-favorite"><a href="javascript:void(0);" id="fav-<?=$resRecentCelebirty[$i]['id']?>" class="wishlist_option" data="<?=$resRecentCelebirty[$i]['id']?>"><i id="h_<?=$resRecentCelebirty[$i]['id']?>" class="<?=$heartClass?>"></i></a></div>
                                        <div class="aon-ow-info">
                                            <h4 class="aon-title"><a href="<?=file_path()?>celebrity/view/<?=$resRecentCelebirty[$i]['id']?>"><?=$resRecentCelebirty[$i]['fname']?> <?=$resRecentCelebirty[$i]['lname']?></a></h4>
										</div>
                                    </div>
                                    <div class="aon-ow-mid">
                                        <div class="aon-ow-media media-bg-animate">
                                            <a href="<?=file_path()?>celebrity/view/<?=$resRecentCelebirty[$i]['id']?>" class="shine-box"><img src="<?=upload_path()?>celebrity_profile/thum/<?=$resRecentCelebirty[$i]['profile_pic']?>" alt="" style="height: 236px;min-width: 318px;max-width: 318px;"></a>
                                        </div>
                                        <p><?=substr($resRecentCelebirty[$i]['about_career'], 0, 150)?>...<a href="<?=file_path()?>celebrity/view/<?=$resRecentCelebirty[$i]['id']?>">Read More</a></p>
                                    </div>
                                </div>
                                <div class="aon-ow-bottom">
                                    <a href="<?=file_path()?>celebrity/view/<?=$resRecentCelebirty[$i]['id']?>">Book Now</a>
                                </div>
                            </div>
                        </div>
                        <?php }?>


                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Featued Vender -->

    <!-- Statics -->
    <div class="site-bg-primary aon-statics-area sf-curve-pos">
        <div class="container">

            <div class="section-content">
                <div class="row d-flex flex-wrap align-items-center a-b-none">
                    <div class="col-lg-6 col-md-12">
                        <div class="section-head">
                            <span class="aon-sub-title"></span>
                            <h2 class="sf-title">Trusted by thousands of gujaratis..</h2>
                            <p>ગુજરાતી  દ્વારા ગુજરાતીઓ માટે ગુજરાતી અંદાજ માં....શુભકામના...</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="aon-statics-blocks">
                            <div class="row">
                                <!--Block 1-->
                                <div class="col-lg-6 m-b30 aon-static-position-1">
                                    <div class="media-bg-animate media-statics aon-icon-effect">
                                        <div class="aon-static-section aon-t-blue">
                                            <div class="aon-company-static-num counter aon-icon">1,000</div>
                                            <div class="aon-company-static-name">સેલેબ્રીટી</div>
                                        </div>
                                    </div>
                                    <div class="media-bg-animate media-statics aon-icon-effect">
                                        <div class="aon-static-section aon-t-yellow">
                                            <div class="aon-company-static-num counter aon-icon">1,000</div>
                                            <div class="aon-company-static-name">મેસેજ ટેમ્પ્લેટ</div>
                                        </div>
                                    </div>
                                </div>

                                <!--Block 2-->
                                <div class="col-lg-6 m-b30 aon-static-position-2">
                                    <div class="media-bg-animate media-statics aon-icon-effect">
                                        <div class="aon-static-section aon-t-green">
                                            <div class="aon-company-static-num counter aon-icon">10,000</div>
                                            <div class="aon-company-static-name">શુભકામના</div>
                                        </div>
                                    </div>
                                    <div class="media-bg-animate media-statics aon-icon-effect">
                                        <div class="aon-static-section aon-t-skyblue">
                                            <div class="aon-company-static-num counter aon-icon">100</div>
                                            <div class="aon-company-static-name">પ્રસંગો</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
   </div>
    <!-- Provider END -->

    <!-- Latest Blog -->
    <div class="aon-news-section-wrap sf-curve-pos">
        <div class="container">
            <!--Title Section Start-->
            <div class="section-head">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <span class="aon-sub-title">News</span>
                        <h2 class="sf-title">Recent News Articles</h2>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p></p>
                    </div>
                </div>
            </div>
            <!--Title Section End-->

            <div class="section-content">
                <div class="row">

                    <!-- COLUMNS 1 -->
                    <div class="col-md-4">
                        <div class="media-bg-animate">
                            <div class="aon-blog-section-1 shine-hover">
                                <div class="aon-post-media shine-box">
                                    <a href="<?=file_path()?>news-details"><img src="<?=asset_path('web/')?>images/blog/latest-blog1/why-shubhexa.png" alt=""></a>
                                </div>
                                <!-- <div class="aon-post-meta">
                                    <ul>
                                        <li class="aon-post-category">Latest</li>
                                        <li class="aon-post-author"><a href="#">By |<span>Admin</span></a> </li>
                                    </ul>
                                </div> -->
                                <div class="aon-post-info">
                                    <h4 class="aon-post-title"><a href="<?=file_path()?>news-details">Why Shubhexa? Largest Gujarati Start Platform</a></h4>
                                    <div class="aon-post-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COLUMNS 2 -->
                    <div class="col-md-4">
                        <div class="media-bg-animate">
                            <div class="aon-blog-section-1 shine-hover">

                                <div class="aon-post-media shine-box">
                                    <a href="<?=file_path()?>news-details"><img src="<?=asset_path('web/')?>images/blog/latest-blog1/easy-to-access.png" alt=""></a>
                                </div>

                                <!-- <div class="aon-post-meta">
                                    <ul>
                                        <li class="aon-post-category">Latest</li>
                                        <li class="aon-post-author"><a href="#">By |<span>Admin</span></a> </li>
                                    </ul>
                                </div> -->

                                <div class="aon-post-info">
                                    <h4 class="aon-post-title"><a href="<?=file_path()?>news-details">Easy to access your choicest Star</a></h4>
                                    <div class="aon-post-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- COLUMNS 3 -->
                    <div class="col-md-4">
                        <div class="media-bg-animate">
                            <div class="aon-blog-section-1  shine-hover">
                                <div class="aon-post-media shine-box">
                                    <a href="<?=file_path()?>news-details"><img src="<?=asset_path('web/')?>images/blog/latest-blog1/quick-response.png" alt=""></a>
                                </div>
                                <!-- <div class="aon-post-meta">
                                    <ul>
                                        <li class="aon-post-category">Latest</li>
                                        <li class="aon-post-author"><a href="#">By |<span>Admin</span></a> </li>
                                    </ul>
                                </div> -->
                                <div class="aon-post-info">
                                    <h4 class="aon-post-title"><a href="<?=file_path()?>news-details">Quick response</a></h4>
                                    <div class="aon-post-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Latest Blog END -->

    <!-- Why Choose us -->
    <div class="aon-whycoose-area sf-curve-pos">
        <div class="container-fluid">
            <div class="sf-whycoose-section">
                <div class="row sf-w-choose-bg-outer d-flex flex-wrap a-b-none">
                    <!-- Left Section -->
                    <div class="col-md-7 margin-b-50 sf-w-choose-left-cell">
                        <div class="sf-w-choose-info-left">
                            <!--Title Section Start-->
                            <div class="section-head">
                                <div class="row">
                                    <div class="col-md-12  margin-b-50">
                                        <span class="aon-sub-title">Choose</span>
                                        <h2 class="sf-title">Why Shubhexa?</h2>
                                        <p>હજારો ગુજરાતી કલાકારો સાથે સંપર્ક કરવા માટે એકમાત્ર માધ્યમ. ગુજરાતની દરેક સેલિબ્રિટીને મળવાનું હવે એક જ સરનામું ‘શુભેક્ષા’.</p>
                                    </div>
                                </div>
                            </div>
                            <!--Title Section End-->

                            <!-- COLUMNS 1 -->
                            <div class="sf-w-choose margin-b-20">
                                <div class="sf-w-choose-icon">
                                    <span>
                                        <img src="<?=asset_path('web/')?>images/whychoose/1.png" alt="">
                                    </span>
                                </div>
                                <div class="sf-w-choose-info">
                                    <h4 class="sf-title">Largest Gujarati Stars Platform</h4>
                                    <p style="min-height: 50px;">ગુજરાતી સેલિબ્રિટી માટે નું સૌથી વિશાળ એક માત્ર પ્લેટફોર્મ</p>
                                </div>
                            </div>
                            <!-- COLUMNS 2 -->
                            <div class="sf-w-choose margin-b-20">
                                <div class="sf-w-choose-icon">
                                    <span>
                                        <img src="<?=asset_path('web/')?>images/whychoose/2.png" alt="">
                                    </span>
                                </div>
                                <div class="sf-w-choose-info">
                                    <h4 class="sf-title">Easy to access your choicest Star</h4>
                                    <p style="min-height: 50px;">તમારા મનગમતા સેલિબ્રિટીનો  સરળતા થી ઍક્સેસ</p>
                                </div>
                            </div>
                            <!-- COLUMNS 3 -->
                            <div class="sf-w-choose">
                                <div class="sf-w-choose-icon">
                                    <span>
                                        <img src="<?=asset_path('web/')?>images/whychoose/3.png" alt="">
                                    </span>
                                </div>
                                <div class="sf-w-choose-info">
                                    <h4 class="sf-title">Quick response </h4>
                                    <p style="min-height: 50px;">ઓછામાં ઓછા સમય માં વિડિઓ મેસેજ</p>
                                </div>
                            </div>
                            <!-- COLUMNS 4 -->
                            <div class="sf-w-choose">
                                <div class="sf-w-choose-icon">
                                    <span>
                                        <img src="<?=asset_path('web/')?>images/whychoose/1.png" alt="">
                                    </span>
                                </div>
                                <div class="sf-w-choose-info">
                                    <h4 class="sf-title">100% secure and Trusted</h4>
                                    <p style="min-height: 50px;">100% સેકયોર અને વિશ્વાષ પાત્ર એક માત્ર પ્લેટફોર્મ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Right Section -->
                    <div class="col-md-5 sf-w-choose-bg-wrap sf-w-choose-right-cell">
                        <div class="sf-w-choose-bg" style="background-image: url(<?=asset_path('web/')?>images/why-shubhexa-home.png);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose us END -->

    <!-- Jobs Section -->
    <!-- <div class="aon-recent-post-area sf-curve-pos">
        <div class="container">
            <div class="section-head">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <span class="aon-sub-title">Shubhexa</span>
                        <h2 class="sf-title">Recently Shubhexa</h2>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="sf-blog-section-1-wrap">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="media-bg-animate">
                                <div class="sf-jobs-section">
                                    <div class="sf-jobs-head">
                                        <a href="#" class="sf-jobs-media"><img src="<?=asset_path('web/')?>images/jobs/account-executive-required.jpg" alt=""></a>
                                    </div>
                                    <div class="sf-jobs-info">
                                        <h4 class="sf-title"><a href="#">Account Executive Required</a></h4>
                                        <p>Lorem ipsum dolor sit amet, sectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="media-bg-animate">
                                <div class="sf-jobs-section">
                                    <div class="sf-jobs-head">
                                        <a href="#" class="sf-jobs-media"><img src="<?=asset_path('web/')?>images/jobs/electrician-required-in-brooklyn.jpg" alt=""></a>
                                    </div>

                                    <div class="sf-jobs-info">
                                        <h4 class="sf-title"><a href="#">Project Manager Required</a></h4>
                                        <p>Lorem ipsum dolor sit amet, sectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="media-bg-animate">
                                <div class="sf-jobs-section">
                                    <div class="sf-jobs-head">
                                        <a href="#" class="sf-jobs-media"><img src="<?=asset_path('web/')?>images/jobs/project-manager-required.jpg" alt=""></a>
                                    </div>

                                    <div class="sf-jobs-info">
                                        <h4 class="sf-title"><a href="#">Electrician Required in Brooklyn</a></h4>
                                        <p>Lorem ipsum dolor sit amet, sectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div> -->
    <!-- Jobs Section END -->

    <!-- Testimonial Section -->
    <div class="aon-testmonials-area sf-curve-pos aon-recent-post-area-custom">
        <div class="container">
            <!--Title Section Start-->
            <div class="section-head">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <span class="sf-sub-title">Testimonial</span>
                        <h2 class="sf-title">What People Say</h2>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p></p>
                    </div>
                </div>
            </div>
            <!--Title Section End-->


            <div class="section-content">
                <!--testimonial top-->
                <div class="slider-vertical-wrap">
                    <!-- THUMBNAILS -->
                    <div class="slick-testimonials-thumbnails">
                        <?php for ($i = 0; $i < count($resTestimonial); $i++) {
	?>
                        	<?php if ($resTestimonial[$i]['img_name'] != "") {
		$img = $resTestimonial[$i]['img_name'];
	} else {
		$img = 'default.png';
	}?>
                    	<div class="slick-item">
                            <div class="sf-testimonial-user">
                                <div class="sf-testimonial-media"><img src="<?=upload_path()?>testimonial/<?=$img?>" alt=""></div>
                                <div class="sf-testimonial-user-detail">
                                    <div class="sf-testi-user-name"><?=$resTestimonial[$i]['first_name']?>, <?=$resTestimonial[$i]['last_name']?> </div>
                                    <div class="sf-testi-user-position"><?=$resTestimonial[$i]['designation']?></div>
                                </div>

                            </div>
                        </div>
<?php }?>


                    </div>
                    <!-- MAIN SLIDES -->
                    <div class="slick-testimonials-carousel">
                        <?php for ($i = 0; $i < count($resTestimonial); $i++) {
	?>
                        <div class="slick-item">
                          <div class="sf-testimonial-info text-center">
                            <div class="sf-testimonial-title"><?=$resTestimonial[$i]['feedback_title']?></div>
                            <div class="sf-ow-pro-rating">
                            	<?php if ($resTestimonial[$i]['rating'] == '1') {?>
                            		<span class="fa fa-star"></span>
	                                <span class="fa fa-star text-gray"></span>
	                                <span class="fa fa-star text-gray"></span>
	                                <span class="fa fa-star text-gray"></span>
	                                <span class="fa fa-star text-gray"></span>

	<?php } elseif ($resTestimonial[$i]['rating'] == '2') {?>
		<span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star text-gray"></span>
        <span class="fa fa-star text-gray"></span>
        <span class="fa fa-star text-gray"></span>
	<?php } elseif ($resTestimonial[$i]['rating'] == '3') {?>
		<span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star text-gray"></span>
        <span class="fa fa-star text-gray"></span>
	<?php } elseif ($resTestimonial[$i]['rating'] == '4') {?>
		<span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star text-gray"></span>
	<?php } elseif ($resTestimonial[$i]['rating'] == '5') {?>
		<span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
	<?php }?>

                            </div>
                            <div class="sf-testimonial-text">
                                <p><?=$resTestimonial[$i]['feedback_description']?></p>
                            </div>
                            <div class="sf-testimonial-quote"><i class="fa fa-quote-left"></i></div>
                            </div>
                        </div>
                    <?php }?>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Testimonial Section END -->

        </div>
        <!-- CONTENT END -->
