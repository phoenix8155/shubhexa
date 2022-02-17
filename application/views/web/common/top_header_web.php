<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
    <title>Service Finder Template | Home Page Style 1</title>

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

        <!-- HEADER START -->
        <header class="site-header header-style-1 mobile-sider-drawer-menu header-full-width">
            <div class="sticky-header main-bar-wraper  navbar-expand-lg">
                <div class="main-bar">

                    <div class="container clearfix">
                        <!--Logo section start-->
                        <div class="logo-header">
                            <div class="logo-header-inner logo-header-one">
                                <a href="#">
                                    <img src="<?=asset_path('web/')?>images/logo-dark.png" alt="" class="site-logo-has">
                                    <img src="<?=asset_path('web/')?>images/logo-light.png" alt="" class="site-logo-sticky">
                                </a>
                            </div>
                        </div>
                        <!--Logo section End-->

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
                            	<li class="current-menu-item"><a href="<?=file_path()?>home">Home</a></li>
                                <li class="has-child">
                                    <a href="javascript:;">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="about-us.html">About us</a></li>
                                        <li><a href="javascript:;">Categories</a>
                                            <ul class="sub-menu">
                                                <li><a href="all-categories.html">All Categories</a></li>
                                                <li><a href="categories-detail.html">Categories Detail</a></li>
                                                <li><a href="categories-detail-2.html">Categories Detail 2</a></li>
                                            </ul>
                                        </li>

                                        <li><a href="javascript:;">Search</a>
                                            <ul class="sub-menu">
                                                <li><a href="search-list.html">Search List</a></li>
                                                <li><a href="new-search-list-2.html">Search List 2</a></li>
                                                <li><a href="search-list-map.html">Search List Map</a></li>
                                                <li><a href="search-list-map2.html">Search List Map 2</a></li>
                                                <li><a href="search-grid.html">Search-grid</a></li>
                                                <li><a href="search-grids-map.html">Search-grid-map</a></li>
                                                <li><a href="search-grid-map2.html">Search-grid-map2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="error-404.html">Error 404</a></li>
                                    </ul>
                                </li>

                                <li class="has-child"><a href="javascript:;">Profile</a>
                                    <ul class="sub-menu">
                                        <li><a href="profile-full.html">Profile</a></li>
                                        <li><a href="profile-sidebar.html">Profile Sidebar</a></li>
                                    </ul>
                                </li>

                                <li class="has-child"><a href="javascript:;">Jobs</a>
                                    <ul class="sub-menu">
                                        <li><a href="job-listing.html">Job listing</a></li>
                                        <li><a href="job-grid.html">Job grid</a></li>
                                        <li><a href="job-detail.html">Job detail</a></li>
                                    </ul>
                                </li>

                                <li class="has-child"><a href="javascript:;">Blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-grid.html">Blog Grid</a></li>
                                        <li><a href="blog-grid-2.html">Blog Grid 2</a></li>
                                        <li><a href="blog-list.html">Blog list</a></li>
                                        <li><a href="blog-list-2.html">Blog list 2</a></li>
                                        <li><a href="blog-list-3.html">Blog list 3</a></li>
                                        <li><a href="blog-list-4.html">Blog list 4</a></li>
                                        <li><a href="blog-detail.html">Blog detail</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact-us.html">Contact</a></li>

                            </ul>

                        </div>

                        <!-- Header Right Section-->
                        <div class="extra-nav header-2-nav">
                            <div class="extra-cell">
                                <!--Login-->
                                <button type="button" class="site-button aon-btn-login" data-toggle="modal" data-target="#login-signup-model">
                                    <i class="fa fa-user"></i> Login
                                </button>
                                <!--Sign up-->
                                <a href="mc-profile.html" class="site-button aon-btn-signup m-l20">
                                    <i class="fa fa-plus"></i> Add Listing
                                </a>
                            </div>

                            </div>

                    </div>

                </div>
            </div>
        </header>
        <!-- HEADER END -->
