<script src="<?=base_url('assets/panel/')?>popover/jquery.webui-popover.min.js"></script>

<script src="<?=base_url('assets/panel/')?>popover/app.js"></script>

<link rel="stylesheet" href="<?=base_url('assets/panel/')?>popover/jquery.webui-popover.min.css">

<link rel="stylesheet" type="text/css" href="<?=base_url('assets/panel/')?>popover/jquery.mCustomScrollbar.min.css">

<link rel="stylesheet" type="text/css" href="<?=base_url('assets/panel/')?>popover/theme-styles.css">

<link rel="stylesheet" type="text/css" href="<?=base_url('assets/panel/')?>popover/blocks.css">

<style>

	.notification-list .selectize-dropdown-content > *, .notification-list li {
    	padding: 13px 25px !important;
	}

	.webui-popover-content{
			max-height:350px !important;
	}

	.theme-txt1{
		  color: #225887 !important;
		  font-weight:bold;
	}

	.theme-txt2{
		color:#888da8 !important;
	}
.unseen{
		background-color: gainsboro;
	}
	#navbar-container {
	    background-color: #225887;
	}
</style>

<div id="container" class="effect aside-float aside-bright mainnav-lg print-content">
<header id="navbar">
  <div id="navbar-container" class="boxed">
    <div class="navbar-header"> <!-- <a href="#" class="navbar-brand" style=" background-color: #225887;"> <img src="<?=asset_path()?>web/images/logo-dark.png" alt="Logo" class="brand-icon" style="width:100%;margin-top: 10px; padding: 5px;"> </a> --> </div>
    <div class="navbar-content">
      <ul class="nav navbar-top-links">
        <li class="tgl-menu-btn"> <a class="mainnav-toggle" href="#"> <i class="demo-pli-list-view"></i> </a> </li>
        <li>
          <div class="custom-search-form">
            <label class="btn btn-trans" for="search-input" data-toggle="collapse" data-target="#nav-searchbox"> <i class="demo-pli-magnifi-glass"></i> </label>

          </div>
        </li>
      </ul>
      <ul class="nav navbar-top-links" >

        <li id="dropdown-user" class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right"> <span class="ic-user pull-right"> <i class="demo-pli-male"></i> </span> </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
            <ul class="head-list">
	            <!-- <li> <a href="<?=file_path('admin')?>dashboard/export_database"><i class="demo-pli-data-settings icon-lg icon-fw"></i> Backup Database</a> </li> -->
				<li> <a href="<?=file_path('celebrity_admin')?>change_password"><i class="demo-pli-unlock icon-lg icon-fw"></i> Change Password</a> </li>
				<li> <a href="<?=file_path()?>home" target="_blank"><i class="demo-pli-computer-secure icon-lg icon-fw"></i> Go To Website</a> </li>
	            <li> <a href="<?=file_path()?>login/logout"><i class="demo-pli-unlock icon-lg icon-fw"></i> Logout</a> </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</header>
<nav id="mainnav-container">
  <div id="mainnav">
    <div id="mainnav-menu-wrap">
      <div class="nano">
        <div class="nano-content">
          <div id="mainnav-profile" class="mainnav-profile">
            <div class="profile-wrap text-center">
              <div class="pad-btm">
                <img class="img-circle img-md" src="<?=asset_path()?>panel/images/profile.png" alt="Profile Picture">
                <p class="mnp-name" style="margin-top: 15px;">Master Admin</p>
              </div>
            </div>
          </div>
          <div id="mainnav-shortcut" class="hidden">
            <ul class="list-unstyled shortcut-wrap">
              <li class="col-xs-3" data-content="My Profile"> <a class="shortcut-grid" href="#">
                <div class="icon-wrap icon-wrap-sm icon-circle bg-mint"> <i class="demo-pli-male"></i> </div>
                </a> </li>
              <li class="col-xs-3" data-content="Messages"> <a class="shortcut-grid" href="#">
                <div class="icon-wrap icon-wrap-sm icon-circle bg-warning"> <i class="demo-pli-speech-bubble-3"></i> </div>
                </a> </li>
              <li class="col-xs-3" data-content="Activity"> <a class="shortcut-grid" href="#">
                <div class="icon-wrap icon-wrap-sm icon-circle bg-success"> <i class="demo-pli-thunder"></i> </div>
                </a> </li>
              <li class="col-xs-3" data-content="Lock Screen"> <a class="shortcut-grid" href="#">
                <div class="icon-wrap icon-wrap-sm icon-circle bg-purple"> <i class="demo-pli-lock-2"></i> </div>
                </a> </li>
            </ul>
          </div>
          <ul id="mainnav-menu" class="list-group">
            <li class="list-header">Navigation</li>
            <li> <a id="menu-dashboard" href="<?=file_path('celebrity_admin')?>dashboard/view/"> <i class="demo-pli-home"></i> <span class="menu-title"> Dashboard </span> </a> </li>
            <li> <a id="menu-req-video-list" href="<?=file_path('celebrity_admin')?>my_requested_video_list/view/"> <i class="demo-pli-gear"></i> <span class="menu-title"> Video Request List </span> </a> </li>
            <li> <a id="menu-password-change" href="<?=file_path('celebrity_admin')?>change_password/"> <i class="demo-pli-unlock"></i> <span class="menu-title"> Change Password </span> </a> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
<div class="boxed">
<div id="content-container">
<div id="page-head">
  <div id="page-title">
    <h1 class="page-header text-overflow">
      <?=$page_title?>
    </h1>
  </div>
  <ol class="breadcrumb">
    <li><a href="#"><i class="demo-pli-home"></i></a></li>
    <li><a href="#">Home</a></li>
    <li class="active">
      <?=$page_title?>
    </li>
  </ol>
</div>
<div id="page-content">
<?php $top_msg = $this->session->flashdata('show_msg');?>
<?php if (is_array($top_msg)) {?>
<div class="row">
  <?php if ($top_msg['class'] == 'false') {?>
  <div class="alert alert-danger">
    <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
    <strong>Error</strong>
    <?=$top_msg['msg']?>
  </div>
  <?php } else {?>
  <div class="alert alert-success">
    <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
    <strong>
    <?=$top_msg['msg']?>
    </strong> </div>
  <?php }?>
</div>
<?php }?>
<script>
$(document).ready(function(e) {
    //
	$('#<?=$menu_id?>').parent('li').addClass('active-link');

	$('#<?=$menu_id?>').parent('li').parent('ul').addClass('in');

	$('#<?=$menu_id?>').parent('li').parent('ul').parent('li').addClass('active');

	$('#<?=$menu_id?>').parent('li').parent('ul').parent('li').addClass('active-sub');
});
</script>

