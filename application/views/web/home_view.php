<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- CONTENT START -->
<div class="page-content">

    <!-- BANNER SECTION START -->
    <section class="aon-banner-wrap">

        <!--Left Section-->
        <div class="aon-banner-outer sf-overlay-wrapper">
            <div class="aon-banner-pic">
                <div class="aon-curve-area"></div>
                <div class="aon-overlay-main" style="opacity:0.85; background-color:#022278;"></div>
                <img src="<?=asset_path('web/')?>images/banner/bnr-pic.jpg" width="1919" height="976" alt="">
            </div>
            <div class="aon-banner-text">
                <div class="container">
                    <div class="aon-bnr-write">
                        <h2 class="text-top-line">Surprised your beloved on</h2>
                        <h2 class="text-bot-line">with 1000+ Celebrities</h2>
                    </div>
                </div>
            </div>
        </div>
        <!--Right Section-->
        <div class="aon-find-bar aon-findBar-vertical">
          <div class="container">
            <!-- Search Form start-->
            <div class="search-form ">
              <form class="clearfix search-providers" method="get">
                <input type="hidden" name="s" value="">

                  <div class="aon-searchbar-table">

                  <div class="aon-searchbar-left">
                    <ul class="clearfix sf-searchfileds-count-5">
                      <li>
                        <label>Keyword</label>
                        <input type="text" value="" placeholder="Enter Keyword" id="keyword" name="keyword" class="form-control sf-form-control">
                        <span class="sf-search-icon"><img src="<?=asset_path('web/')?>images/search-bar/keyword.png" alt=""/></span>
                      </li>

                      <li>
                        <label>Category</label>
                        <select id="categorysrh" name="catid" class="form-control sf-form-control aon-categories-select sf-select-box" title="Select Category">
                            <option class="bs-title-option" value="">Select a Category</option>
                            <option value="17" data-content="<img class='childcat-img' width='50' height='auto' src=<?=asset_path('web/')?>images/cat-thum/cat-1.jpg>
                              <span class='childcat'>Actor</span>">Actor
                            </option>
                            <option value="30" data-content="<img class='childcat-img' width='50' height='auto' src=<?=asset_path('web/')?>images/cat-thum/cat-2.jpg>
                              <span class='childcat'>Singer</span>">Singer
                            </option>
                            <option value="19" data-content="<img class='childcat-img' width='50' height='auto' src=<?=asset_path('web/')?>images/cat-thum/cat-3.jpg>
                              <span class='childcat'>Model</span>">Model
                            </option>
                            <option value="19" data-content="<img class='childcat-img' width='50' height='auto' src=<?=asset_path('web/')?>images/cat-thum/cat-4.jpg>
                              <span class='childcat'>Dancer</span>">Dancer
                            </option>
                            <option value="19" data-content="<img class='childcat-img' width='50' height='auto' src=<?=asset_path('web/')?>images/cat-thum/cat-5.jpg>
                              <span class='childcat'>Artist</span>">Artist
                            </option>
                          </select>
                        <span class="sf-search-icon"><img src="<?=asset_path('web/')?>images/search-bar/maintenance.png" alt=""/></span>
                      </li>
                      <li>
                        <label>Gender</label>
                        <select class="sf-select-box form-control sf-form-control bs-select-hidden" data-live-search="true" name="gender" id="gender" title="Gender" data-header="Select a Gender">
                          <option class="bs-title-option" value="">Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                        <span class="sf-search-icon"><img src="<?=asset_path('web/')?>images/search-bar/globe.png" alt=""/></span>
                      </li>

                    </ul>
                  </div>
                  <div class="aon-searchbar-right">
                    <button type="button" class="site-button"><i class="fa fa-search"></i> Search</button>
                  </div>

                </div>

              </form>
            </div>
            <!-- Search Form End-->
          </div>
        </div>

    </section>
    <!-- BANNER SECTION END -->

    <!-- Services Finder categories -->
    <section class="bg-white aon-categories-area sf-curve-pos">
        <div class="container">

            <!--Title Section Start-->
            <div class="section-head">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <span class="aon-sub-title">Featured</span>
                        <h2 class="aon-title">Popular Celebrities</h2>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p></p>
                    </div>
                </div>
            </div>
            <!--Title Section End-->

            <div class="section-content">
                <div class="owl-carousel categories-carousel-owl aon-owl-arrow">
                    <!-- COLUMNS 1 -->
                    <div class="item">
                        <div class="aon-cat-item">
                            <div class="aon-cat-pic media-bg-animate shine-hover">
                                <a class="shine-box" href="categories-detail.html"><img src="<?=asset_path('web/')?>images/popular-categories/1.jpg" alt=""></a>
                            </div>
                            <h4 class="aon-cat-title">Actor</h4>
                        </div>
                    </div>
                    <!-- COLUMNS 2 -->
                    <div class="item">
                        <div class="aon-cat-item">
                            <div class="aon-cat-pic media-bg-animate shine-hover">
                                <a class="shine-box" href="categories-detail.html"><img src="<?=asset_path('web/')?>images/popular-categories/2.jpg" alt=""></a>
                            </div>
                            <h4 class="aon-cat-title">Singer</h4>
                        </div>
                    </div>
                    <!-- COLUMNS 3 -->
                    <div class="item">
                        <div class="aon-cat-item">
                            <div class="aon-cat-pic media-bg-animate shine-hover">
                                <a class="shine-box" href="categories-detail.html"><img src="<?=asset_path('web/')?>images/popular-categories/3.jpg" alt=""></a>
                            </div>
                            <h4 class="aon-cat-title">Model</h4>
                        </div>
                    </div>
                    <!-- COLUMNS 4 -->
                    <div class="item">
                        <div class="aon-cat-item">
                            <div class="aon-cat-pic media-bg-animate shine-hover">
                                <a class="figure" href="categories-detail.html"><img src="<?=asset_path('web/')?>images/popular-categories/4.jpg" alt=""></a>
                            </div>
                            <h4 class="aon-cat-title">Dancer</h4>
                        </div>
                    </div>
                    <!-- COLUMNS 5 -->
                    <div class="item">
                        <div class="aon-cat-item">
                            <div class="aon-cat-pic media-bg-animate shine-hover">
                                <a class="shine-box" href="categories-detail.html"><img src="<?=asset_path('web/')?>images/popular-categories/5.jpg" alt=""></a>
                            </div>
                            <h4 class="aon-cat-title">Artist</h4>
                        </div>
                    </div>
                    <!-- COLUMNS 6 -->
                    <div class="item">
                        <div class="aon-cat-item">
                            <div class="aon-cat-pic media-bg-animate shine-hover">
                                <a class="shine-box" href="categories-detail.html"><img src="<?=asset_path('web/')?>images/popular-categories/6.jpg" alt=""></a>
                            </div>
                            <h4 class="aon-cat-title">Public Figure</h4>
                        </div>
                    </div>
                    <!-- COLUMNS 7 -->
                    <div class="item">
                        <div class="aon-cat-item">
                            <div class="aon-cat-pic media-bg-animate shine-hover">
                                <a class="shine-box" href="categories-detail.html"><img src="<?=asset_path('web/')?>images/popular-categories/7.jpg" alt=""></a>
                            </div>
                            <h4 class="aon-cat-title">Musician</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Services Finder categories END -->

    <!-- How it Work -->
    <section class="bg-white aon-how-service-area sf-curve-pos">
        <div class="container">

            <div class="section-content">
               <div class="row">
                    <!--Title Section Start-->
                    <div class="col-lg-4 col-md-12">
                        <span class="aon-sub-title">Steps</span>
                        <h2 class="sf-title">How Shubhexa Works</h2>
                    </div>
                    <!--Title Section End-->

                    <div class="col-lg-8 col-md-12">
                        <!-- Steps Block Start-->
                        <div class="aon-step-blocks">
                            <div class="row">
                                <!-- COLUMNS 1 -->
                                <div class="col-md-4 col-sm-4 m-b30">
                                    <div class="aon-step-section step-position-1 aon-icon-effect">
                                        <div class="aon-step-icon aon-icon-box">
                                            <span>
                                                <i class="aon-icon"><img src="<?=asset_path('web/')?>images/step-icon/1.png" alt=""></i>
                                            </span>
                                        </div>
                                        <div class="aon-step-info">
                                            <h4 class="aon-title">Registration!</h4>
                                            <p>Get registered your self or login in website or mobile app.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- COLUMNS 2 -->
                                <div class="col-md-4 col-sm-4 m-b30">
                                    <div class="aon-step-section step-position-2 aon-icon-effect">
                                        <div class="aon-step-icon">
                                            <span>
                                                <i class="aon-icon"><img src="<?=asset_path('web/')?>images/step-icon/2.png" alt=""></i>
                                            </span>
                                        </div>
                                        <div class="aon-step-info">
                                            <h4 class="aon-title">Choose your favourite star!</h4>
                                            <p>Select your favourite star & customize your message or select from templates, later on complete your payment.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- COLUMNS 3 -->
                                <div class="col-md-4 col-sm-4 m-b30">
                                    <div class="aon-step-section  step-position-3  aon-icon-effect">
                                        <div class="aon-step-icon">
                                            <span>
                                                <i class="aon-icon"><img src="<?=asset_path('web/')?>images/step-icon/3.png" alt=""></i>
                                            </span>
                                        </div>
                                        <div class="aon-step-info">
                                            <h4 class="aon-title">You are done!</h4>
                                            <p>You will get your video in 2 days via email as well as in user dashboard.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Steps Block End-->
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- How it Work END -->

    <!-- Featued Vender -->
    <section class="site-bg-gray aon-feature-provider-area sf-curve-pos">
        <div class="container">
            <!--Title Section Start-->
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
            <!--Title Section End-->

            <div class="section-content">
                <div class="row">
                    <div class="owl-carousel aon-featurd-provider-carousel aon-owl-arrow">

                        <!-- COLUMNS 1 -->
                        <div class="item">
                            <div class="aon-ow-provider-wrap">
                                <div class="aon-ow-provider shine-hover">

                                    <div class="aon-ow-top">
                                        <div class="aon-pro-check"><span><i class="fa fa-check"></i></span></div>
                                        <div class="aon-pro-favorite"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="aon-ow-info">
                                            <h4 class="aon-title"><a href="#">Malhar Thakar</a></h4>
										</div>
                                    </div>
                                    <div class="aon-ow-mid">
                                        <div class="aon-ow-media media-bg-animate">
                                            <a href="#" class="shine-box"><img src="<?=asset_path('web/')?>images/gujarati-celebrities/malhar-thakar.png" alt=""></a>
                                        </div>
                                        <p>Through our expertise, technological knowledge, global presence and bespoke.</p>
                                        <div class="aon-ow-pro-rating">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star text-gray"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="aon-ow-bottom">
                                    <a href="#">Request A Quote</a>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 2 -->
                        <div class="item">
                            <div class="aon-ow-provider-wrap">
                                <div class="aon-ow-provider shine-hover">

                                    <div class="aon-ow-top">
                                        <div class="aon-pro-check"><span><i class="fa fa-check"></i></span></div>
                                        <div class="aon-pro-favorite"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="aon-ow-info">
                                            <h4 class="aon-title"><a href="#">Kinjal Dave</a></h4>
                                        </div>
                                    </div>
                                    <div class="aon-ow-mid">
                                        <div class="aon-ow-media media-bg-animate">
                                            <a href="#" class="shine-box"><img src="<?=asset_path('web/')?>images/gujarati-celebrities/kinjal-dave.png" alt=""></a>
                                        </div>
                                        <p>Through our expertise, technological knowledge, global presence and bespoke.</p>
                                        <div class="aon-ow-pro-rating">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star text-gray"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="aon-ow-bottom">
                                    <a href="#">Request A Quote</a>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 3 -->
                        <div class="item">
                            <div class="aon-ow-provider-wrap">
                                <div class="aon-ow-provider shine-hover">

                                    <div class="aon-ow-top">
                                        <div class="aon-pro-check"><span><i class="fa fa-check"></i></span></div>
                                        <div class="aon-pro-favorite"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="aon-ow-info">
                                            <h4 class="aon-title"><a href="#">Sairam Dave</a></h4>
                                        </div>
                                    </div>
                                    <div class="aon-ow-mid">
                                        <div class="aon-ow-media media-bg-animate">
                                            <a class="shine-box" href="#"><img src="<?=asset_path('web/')?>images/gujarati-celebrities/sairam-dave.png" alt=""></a>
                                        </div>
                                        <p>Through our expertise, technological knowledge, global presence and bespoke.</p>
                                        <div class="aon-ow-pro-rating">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star text-gray"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="aon-ow-bottom">
                                    <a href="#">Request A Quote</a>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 4 -->
                        <div class="item">
                            <div class="item">
                                <div class="aon-ow-provider-wrap">
                                    <div class="aon-ow-provider shine-hover">

                                        <div class="aon-ow-top">
                                            <div class="aon-pro-check"><span><i class="fa fa-check"></i></span></div>
                                            <div class="aon-pro-favorite"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                            <div class="aon-ow-info">
                                                <h4 class="aon-title"><a href="#">Pratik Gandhi</a></h4>
                                            </div>
                                        </div>
                                        <div class="aon-ow-mid">
                                            <div class="aon-ow-media media-bg-animate">
                                                <a href="#" class="shine-box"><img src="<?=asset_path('web/')?>images/gujarati-celebrities/pratik-gandhi.png" alt=""></a>
                                            </div>
                                            <p>Through our expertise, technological knowledge, global presence and bespoke.</p>
                                            <div class="aon-ow-pro-rating">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star text-gray"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="aon-ow-bottom">
                                        <a href="#">Request A Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                        <!--Title Section Start-->
                        <div class="section-head">
                            <span class="aon-sub-title">Statics</span>
                            <h2 class="sf-title">Trusted by thousands of gujarati</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do usmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <!--Title Section End-->
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <!--Statics-blocks Section Start-->
                        <div class="aon-statics-blocks">
                            <div class="row">
                                <!--Block 1-->
                                <div class="col-lg-6 m-b30 aon-static-position-1">
                                    <div class="media-bg-animate media-statics aon-icon-effect">
                                        <div class="aon-static-section aon-t-blue">
                                            <div class="aon-company-static-num counter aon-icon">1,000</div>
                                            <div class="aon-company-static-name">Stars</div>
                                        </div>
                                    </div>
                                    <div class="media-bg-animate media-statics aon-icon-effect">
                                        <div class="aon-static-section aon-t-yellow">
                                            <div class="aon-company-static-num counter aon-icon">10,000</div>
                                            <div class="aon-company-static-name">Shubhexa</div>
                                        </div>
                                    </div>
                                </div>

                                <!--Block 2-->
                                <div class="col-lg-6 m-b30 aon-static-position-2">
                                    <div class="media-bg-animate media-statics aon-icon-effect">
                                        <div class="aon-static-section aon-t-green">
                                            <div class="aon-company-static-num counter aon-icon">1,000</div>
                                            <div class="aon-company-static-name">Message Templates</div>
                                        </div>
                                    </div>
                                    <div class="media-bg-animate media-statics aon-icon-effect">
                                        <div class="aon-static-section aon-t-skyblue">
                                            <div class="aon-company-static-num counter aon-icon">100</div>
                                            <div class="aon-company-static-name">Topics</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Statics-blocks Section End-->
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
                                    <a href="#"><img src="<?=asset_path('web/')?>images/blog/latest-blog1/1.jpg" alt=""></a>
                                </div>
                                <!-- <div class="aon-post-meta">
                                    <ul>
                                        <li class="aon-post-category">Latest</li>
                                        <li class="aon-post-author"><a href="#">By |<span>Admin</span></a> </li>
                                    </ul>
                                </div> -->
                                <div class="aon-post-info">
                                    <h4 class="aon-post-title"><a href="#">Why Shubhexa? Largest Gujarati Start Platform</a></h4>
                                    <div class="aon-post-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
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
                                    <a href="#"><img src="<?=asset_path('web/')?>images/blog/latest-blog1/2.jpg" alt=""></a>
                                </div>

                                <!-- <div class="aon-post-meta">
                                    <ul>
                                        <li class="aon-post-category">Latest</li>
                                        <li class="aon-post-author"><a href="#">By |<span>Admin</span></a> </li>
                                    </ul>
                                </div> -->

                                <div class="aon-post-info">
                                    <h4 class="aon-post-title"><a href="#">Easy to access your choicest Star</a></h4>
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
                                    <a href="#"><img src="<?=asset_path('web/')?>images/blog/latest-blog1/3.jpg" alt=""></a>
                                </div>
                                <!-- <div class="aon-post-meta">
                                    <ul>
                                        <li class="aon-post-category">Latest</li>
                                        <li class="aon-post-author"><a href="#">By |<span>Admin</span></a> </li>
                                    </ul>
                                </div> -->
                                <div class="aon-post-info">
                                    <h4 class="aon-post-title"><a href="#">Quick response</a></h4>
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
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
                                    <p>Suspendisse tincidunt rutrum ante. Vestibulum elementum ipsum sit amet turpis elementum lobortis.</p>
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
                                    <p>Suspendisse tincidunt rutrum ante. Vestibulum elementum ipsum sit amet turpis elementum lobortis.</p>
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
                                    <p>Suspendisse tincidunt rutrum ante. Vestibulum elementum ipsum sit amet turpis elementum lobortis.</p>
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
                                    <p>Suspendisse tincidunt rutrum ante. Vestibulum elementum ipsum sit amet turpis elementum lobortis.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Right Section -->
                    <div class="col-md-5 sf-w-choose-bg-wrap sf-w-choose-right-cell">
                        <div class="sf-w-choose-bg" style="background-image: url(<?=asset_path('web/')?>images/background/bg1.jpg);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose us END -->

    <!-- Jobs Section -->
    <div class="aon-recent-post-area sf-curve-pos">
        <div class="container">
            <!--Title Section Start-->
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
            <!--Title Section End-->


            <div class="section-content">
                <div class="sf-blog-section-1-wrap">
                    <div class="row">
                        <!-- COLUMNS 1 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="media-bg-animate">
                                <div class="sf-jobs-section">

                                    <div class="sf-jobs-head">
                                        <a href="job-detail.html" class="sf-jobs-media"><img src="<?=asset_path('web/')?>images/jobs/1.jpg" alt=""></a>
                                        <!-- <span class="sf-jobs-position">Freelance</span> -->
                                    </div>

                                    <div class="sf-jobs-info">
                                        <!-- <div class="sf-job-company">Blue Hills Pvt.LTD</div> -->
                                        <h4 class="sf-title"><a href="job-detail.html">Account Executive Required</a></h4>
                                        <p>Lorem ipsum dolor sit amet, sectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse</p>
                                    </div>

                                    <!-- <div class="sf-jobs-footer">
                                        <div class="sf-job-location"><i class="fa fa-map-marker"></i>London</div>
                                        <div class="sf-jobs-cost"><span>$25</span>/hour</div>
                                    </div> -->

                                </div>
                            </div>

                        </div>
                        <!-- COLUMNS 2 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="media-bg-animate">
                                <div class="sf-jobs-section">

                                    <div class="sf-jobs-head">
                                        <a href="job-detail.html" class="sf-jobs-media"><img src="<?=asset_path('web/')?>images/jobs/2.jpg" alt=""></a>
                                        <!-- <span class="sf-jobs-position">Freelance</span> -->
                                    </div>

                                    <div class="sf-jobs-info">
                                        <!-- <div class="sf-job-company">Blue Hills Pvt.LTD</div> -->
                                        <h4 class="sf-title"><a href="job-detail.html">Project Manager Required</a></h4>
                                        <p>Lorem ipsum dolor sit amet, sectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse</p>
                                    </div>

                                    <!-- <div class="sf-jobs-footer">
                                        <div class="sf-job-location"><i class="fa fa-map-marker"></i>London</div>
                                        <div class="sf-jobs-cost"><span>$25</span>/hour</div>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 3 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="media-bg-animate">
                                <div class="sf-jobs-section">

                                    <div class="sf-jobs-head">
                                        <a href="job-detail.html" class="sf-jobs-media"><img src="<?=asset_path('web/')?>images/jobs/3.jpg" alt=""></a>
                                        <!-- <span class="sf-jobs-position">Freelance</span> -->
                                    </div>

                                    <div class="sf-jobs-info">
                                        <!-- <div class="sf-job-company">Blue Hills Pvt.LTD</div> -->
                                        <h4 class="sf-title"><a href="job-detail.html">Electrician Required in Brooklyn</a></h4>
                                        <p>Lorem ipsum dolor sit amet, sectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse</p>
                                    </div>

                                    <!-- <div class="sf-jobs-footer">
                                        <div class="sf-job-location"><i class="fa fa-map-marker"></i>London</div>
                                        <div class="sf-jobs-cost"><span>$25</span>/hour</div>
                                    </div> -->

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Jobs Section END -->

    <!-- Testimonial Section -->
    <div class="aon-testmonials-area sf-curve-pos">
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
                        <!-- COLUMNS 1 -->
                        <div class="slick-item">
                            <div class="sf-testimonial-user">
                                <div class="sf-testimonial-media"><img src="<?=asset_path('web/')?>images/testimonials/pic1.jpg" alt=""></div>
                                <div class="sf-testimonial-user-detail">
                                    <div class="sf-testi-user-name">Mark, Homestay </div>
                                    <div class="sf-testi-user-position">Sales Manager</div>
                                </div>

                            </div>
                        </div>
                        <!-- COLUMNS 1 -->
                        <div class="slick-item">
                            <div class="sf-testimonial-user">
                                <div class="sf-testimonial-media"><img src="<?=asset_path('web/')?>images/testimonials/pic1.jpg" alt=""></div>
                                <div class="sf-testimonial-user-detail">
                                    <div class="sf-testi-user-name">Mark, Homestay </div>
                                    <div class="sf-testi-user-position">Sales Manager</div>
                                </div>

                            </div>
                        </div>
                        <!-- COLUMNS 1 -->
                        <div class="slick-item">
                            <div class="sf-testimonial-user">
                                <div class="sf-testimonial-media"><img src="<?=asset_path('web/')?>images/testimonials/pic2.jpg" alt=""></div>
                                <div class="sf-testimonial-user-detail">
                                    <div class="sf-testi-user-name">Mark, Homestay </div>
                                    <div class="sf-testi-user-position">Sales Manager</div>
                                </div>

                            </div>
                        </div>
                        <!-- COLUMNS 1 -->
                        <div class="slick-item">
                            <div class="sf-testimonial-user">
                                <div class="sf-testimonial-media"><img src="<?=asset_path('web/')?>images/testimonials/pic3.jpg" alt=""></div>
                                <div class="sf-testimonial-user-detail">
                                    <div class="sf-testi-user-name">Mark, Homestay </div>
                                    <div class="sf-testi-user-position">Sales Manager</div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- MAIN SLIDES -->
                    <div class="slick-testimonials-carousel">
                        <!-- COLUMNS 1 -->
                        <div class="slick-item">
                          <div class="sf-testimonial-info text-center">
                            <div class="sf-testimonial-title">It was a great experience</div>
                            <div class="sf-ow-pro-rating">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star text-gray"></span>
                            </div>
                            <div class="sf-testimonial-text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesettin</p>
                            </div>
                            <div class="sf-testimonial-quote"><i class="fa fa-quote-left"></i></div>
                            </div>
                        </div>
                        <!-- COLUMNS 1 -->
                        <div class="slick-item">
                          <div class="sf-testimonial-info text-center">
                            <div class="sf-testimonial-title">It was a great experience</div>
                            <div class="sf-ow-pro-rating">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star text-gray"></span>
                            </div>
                            <div class="sf-testimonial-text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesettin</p>
                            </div>
                            <div class="sf-testimonial-quote"><i class="fa fa-quote-left"></i></div>
                            </div>
                        </div>
                        <!-- COLUMNS 1 -->
                        <div class="slick-item">
                          <div class="sf-testimonial-info text-center">
                            <div class="sf-testimonial-title">It was a great experience</div>
                            <div class="sf-ow-pro-rating">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star text-gray"></span>
                            </div>
                            <div class="sf-testimonial-text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesettin</p>
                            </div>
                            <div class="sf-testimonial-quote"><i class="fa fa-quote-left"></i></div>
                            </div>
                        </div>
                        <!-- COLUMNS 1 -->
                        <div class="slick-item">
                          <div class="sf-testimonial-info text-center">
                            <div class="sf-testimonial-title">It was a great experience</div>
                            <div class="sf-ow-pro-rating">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star text-gray"></span>
                            </div>
                            <div class="sf-testimonial-text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesettin</p>
                            </div>
                            <div class="sf-testimonial-quote"><i class="fa fa-quote-left"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Testimonial Section END -->

        </div>
        <!-- CONTENT END -->
