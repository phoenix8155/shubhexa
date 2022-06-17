<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
if ($this->uri->rsegment(1) == "home") {

	$home = "current-menu-item";
}
if ($this->uri->rsegment(1) == "about") {

	$about = "current-menu-item";
}
if ($this->uri->rsegment(1) == "testimonials") {

	$testimonials = "current-menu-item";
}
if ($this->uri->rsegment(1) == "faq") {

	$faq = "current-menu-item";
}
if ($this->uri->rsegment(1) == "contact") {

	$contact = "current-menu-item";
}
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
    <title>Shubhexa | Home Page </title>

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
</head>
<body>
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
<div class="page-wraper">
    <header class="site-header header-style-1 mobile-sider-drawer-menu header-full-width">
        <div class="sticky-header main-bar-wraper  navbar-expand-lg">
            <div class="main-bar">
                <div class="container clearfix">
                    <div class="logo-header">
                        <div class="logo-header-inner logo-header-one">
                            <a href="<?=base_url()?>">
                                <img src="<?=asset_path('web/')?>images/white-logo-light.png" alt="" class="site-logo-has">
                                <!-- <img src="<?=asset_path('web/')?>images/logo-light.png" alt="" class="site-logo-sticky"> -->
                                <img src="<?=asset_path('web/')?>images/shubhexa-logo-blue.png" alt="" class="site-logo-sticky">

                            </a>
                        </div>
                    </div>
                    <button id="mobile-side-drawer" data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggler collapsed">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar icon-bar-first"></span>
                        <span class="icon-bar icon-bar-two"></span>
                        <span class="icon-bar icon-bar-three"></span>
                    </button>
                    <div class="nav-animation header-nav navbar-collapse collapse d-flex justify-content-start">
                        <ul class=" nav navbar-nav">
                        	<li class="<?=$home?>"><a href="<?=file_path()?>home">Home</a></li>
                        	<li class="<?=$about?>"><a href="<?=file_path()?>about">About us</a></li>
                        	<li class="<?=$testimonials?>"><a href="<?=file_path()?>testimonials">Testimonial</a></li>
                        	<li class="<?=$faq?>"><a href="<?=file_path()?>faq">FAQ</a></li>
                            <li class="<?=$contact?>"><a href="<?=file_path()?>contact">Contact</a></li>
                            <?php if ($this->session->userdata['user']) {?>
                            	<li class="<?=$myBooking?>"><a href="<?=file_path()?>my_bookings">My Bookings</a></li>
                            <?php }?>
                        </ul>
                    </div>

                    <div class="extra-nav header-2-nav">
                        <div class="extra-cell">
                        	<?php if (!$this->session->userdata['user']) {?>

                            <button id="btn-login" type="button" class="site-button aon-btn-login" data-toggle="modal" data-target="#login-signup-model">
                                <i class="fa fa-user"></i> Login
                            </button>
                            <button id="btn-signin" type="button" class="site-button aon-btn-login" data-toggle="modal" data-target="#login-signup-model">
                                <i class="fa fa-plus"></i> Sign up
                            </button>
                        <?php } else {?>
                            <div class="btn-group">
							  <button type="button" class="btn btn-warning dropdown-toggle site-button aon-btn-login" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							   <i class="fa fa-user"></i> My Account
							  </button>
							  <div class="dropdown-menu">
							    <a class="dropdown-item" href="<?=file_path()?>my_account/profile/view">Profile</a>
							    <a class="dropdown-item" href="<?=file_path()?>cart">Cart</a>
							    <a class="dropdown-item" href="<?=file_path()?>my_wishlist">Wishlist</a>
							    <?php if ($this->session->userdata['user']['loginWithOther'] == false) {?>
							    <a class="dropdown-item" href="<?=file_path()?>my_account/changePassword">Change Password</a>
							    <?php }?>
							    <div class="dropdown-divider"></div>
							    <a class="dropdown-item" href="<?=file_path()?>home/logout">Logout</a>
							  </div>
							</div>
                        <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
