<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
if ($this->uri->rsegment(1) == "my_bookings") {

	$myBooking = "current-menu-item";
}
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
	<!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="" />
    <!-- FAVICONS ICON -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <!-- PAGE TITLE HERE -->
    <title>Shubhexa | My Profile</title>
    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BOOTSTRAP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>css/bootstrap.min.css">
    <!-- Bootstrap toggle -->
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>css/bootstrap4-toggle.min.css">
    <!-- Bootstrap seclect -->
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>css/bootstrap-select.min.css" />
    <!-- Price Range Slider -->
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>css/bootstrap-slider.min.css" />
    <!-- Bootstrap data table -->
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>css/dataTables.bootstrap4.min.css">
    <!-- Dropzone -->
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>css/dropzone.css">
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>css/font.css" />
    <!-- Feather icon -->
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>css/feather.css" />
    <!-- Fontawesome -->
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>css/font-awesome.min.css" />
    <!-- Lc light box popup -->
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>css/lc_lightbox.css" />
    <!-- Magnific Popup -->
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>css/magnific-popup.min.css">
    <!-- Custom Scrollbar -->
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>css/m-custom-scrollbar.min.css" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>css/owl.carousel.min.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>css/slick.min.css">
    <!-- Slick Theme -->
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>css/slick-theme.css">
    <!-- Main STyle Sheet -->
    <link rel="stylesheet" type="text/css" href="<?=asset_path('web/')?>css/style.css">
    <style type="text/css">
		.sf-banner-heading-wrap {
		    height: 300px;
		}
    </style>
</head>
<body>
    <!-- LOADING AREA START ===== -->
    <div class="loading-area">
        <div class="loading-box"></div>
        <div class="loading-pic">
            <div class="windows8">
                <div class="wBall" id="wBall_1">
                    <div class="wInnerBall"></div>
                </div>
                <div class="wBall" id="wBall_2">
                    <div class="wInnerBall"></div>
                </div>
                <div class="wBall" id="wBall_3">
                    <div class="wInnerBall"></div>
                </div>
                <div class="wBall" id="wBall_4">
                    <div class="wInnerBall"></div>
                </div>
                <div class="wBall" id="wBall_5">
                    <div class="wInnerBall"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOADING AREA  END ====== -->
	<div class="page-wraper">
        <header id="header-admin-wrap" class="header-admin-fixed">
            <!-- Header Start -->
            <div id="header-admin">
                <div class="container">
                    <!-- Left Side Content -->
                    <div class="header-left">
                        <div class="my-account-logo">
                            <a href="<?=base_url()?>"><img src="<?=asset_path('web/')?>images/logo-light.png" alt=""></a>
                        </div>
                        <!-- <div class="header-widget aon-admin-search-box">
                            <div class="aon-admin-search ">
                                <input class="form-control sf-form-control" name="company_name" type="text" placeholder="Search">
                                <button class="admin-search-btn"><i class="fs-input-icon feather-search"></i></button>
                            </div>
                        </div> -->
                    </div>
                    <!-- Left Side Content End -->
                    <!-- Right Side Content -->
                    <div class="header-right">
                        <div class="header-menu">
                            <!-- NAV Toggle Button -->
                            <button id="mobile-side-drawer" data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggler collapsed">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar icon-bar-first"></span>
                                <span class="icon-bar icon-bar-two"></span>
                                <span class="icon-bar icon-bar-three"></span>
                            </button>
                            <!-- MAIN Vav -->
                            <div class="nav-animation header-nav navbar-collapse collapse d-flex justify-content-start">
                                <ul class=" nav navbar-nav">
                                	<li><a href="<?=file_path()?>home">Home</a></li>
	                            	<li><a href="<?=file_path()?>about">About us</a></li>
	                            	<li><a href="<?=file_path()?>testimonials">Testimonials</a></li>
	                            	<li><a href="<?=file_path()?>faq">FAQ</a></li>
	                                <li><a href="<?=file_path()?>contact">Contact</a></li>
	                                <li class="<?=$myBooking?>"><a href="<?=file_path()?>my_bookings">My Bookings</a></li>
                                </ul>
                            </div>
                        </div>
                        <ul class="header-widget-wrap">
                            <li class="header-widget">
                                <div class="aon-admin-messange sf-toogle-btn">
                                    <span class="feather-user-pic">
                                    	<?php if ($this->session->userdata['user']['loginWithOther'] == false) {?>
                                    	<img src="<?=base_url()?>upload/user/<?=$this->session->userdata['user']['profile_pic']?>" alt=""/>
                                    <?php } else {?>
                                    	<img src="<?=$this->session->userdata['user']['profile_pic']?>" alt=""/>
                                    <?php }?>
                                    </span>
                                </div>
                                <div class="ws-toggle-popup popup-tabs-wrap-section user-welcome-area">
                                    <ul class="user-welcome-list">
                                        <li><strong>Welcome , <span class="site-text-primary"><?=$this->session->userdata['user']['name']?> </span></strong></li>
                                        <!-- <li><a href="#"><i class="feather-sliders"></i> Dashboard</a></li> -->
                                        <li><a href="<?=file_path()?>home/logout"><i class="feather-log-out"></i> Log Out</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
