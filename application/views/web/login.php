<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Login page | Shubhexa</title>
 <link rel="icon" href="<?=asset_path('web/')?>favicon.png" sizes="16x16">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<link href="<?=asset_path()?>panel/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=asset_path()?>panel/css/nifty.min.css" rel="stylesheet">
<link href="<?=asset_path()?>panel/css/demo/nifty-demo-icons.min.css" rel="stylesheet">
<link href="<?=asset_path()?>panel/plugins/pace/pace.min.css" rel="stylesheet">
<script src="<?=asset_path()?>panel/plugins/pace/pace.min.js"></script>
<link href="<?=asset_path()?>panel/css/demo/nifty-demo.min.css" rel="stylesheet">
</head>

<body>
<div id="container" class="cls-container">
  <div id="bg-overlay" class="bg-img" style="background-image: url(&quot;<?=asset_path()?>images/bg-img-3.jpg&quot;);"></div>
  <div class="row" style="height: 100px;">



    </div>
  <div class="cls-content" style="padding-top:10px;">
    <div class="cls-content-sm panel">
      <div class="panel-body">
        <div class="mar-ver pad-btm">
        		<p><img src="<?=base_url('assets/web/images/logo-light.png')?>"></p>
          <h1 class="h3">Account Login</h1>
          <p>Sign in to your dashboard</p>
        </div>
        <form method="post" action="<?=file_path()?><?=$this->uri->rsegment(1)?>/check">
        	<input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash();?>">

          <div class="form-group">
           	<label style="float: left;">Enter Username</label>
            <input type="text" name="username" id="username" required class="form-control" placeholder="Username" autofocus>

          </div>
          <div class="form-group">
            <label style="float: left;">Enter Password</label>
            <input type="password" name="password" id="password" required class="form-control" placeholder="Password">
          </div>
          <button class="btn btn-primary btn-lg btn-block tts" type="submit">Sign In</button>

		<?php if ($show_msg != '') {?>
        	<p><span class="title-red"><?=$show_msg?></span></p>
        <?php }?>


        </form>
		  <div class="pad-all forget_pass_link"> You don't have account ? <a href="<?=file_path()?>registration" class="btn-link mar-rgt">Sign up Here.</a></div>
      </div>


    </div>
  </div>
  <!--=-->

  <!-- DEMO PURPOSE ONLY -->
  <!--=-->


 </div>


</div>
<script src="<?=asset_path()?>panel/js/jquery.min.js"></script>
<script src="<?=asset_path()?>panel/js/bootstrap.min.js"></script>
<script src="<?=asset_path()?>panel/js/nifty.min.js"></script>
<script src="<?=asset_path()?>panel/js/demo/bg-images.js"></script>

</body>
</html>

<style>
	.tts{
		background-color:#225887 !important;
		border-color: #225887 !important;
	}
	.tts:hover{
		background-color:#225887 !important;
		border-color: #225887 !important;
	}
	.reg_link a:hover
	{
		color:#225887 !important;
	}
	.forget_pass_link a:hover
	{
		color:#225887 !important;
	}
</style>
