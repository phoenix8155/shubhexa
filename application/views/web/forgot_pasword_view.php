<div class="page-content">
    <div class="aon-page-benner-area">
        <div class="aon-page-banner-row" style="background-image: url(<?=asset_path('web/')?>images/banner/tastimonial.png)">
            <div class="sf-overlay-main" style="opacity:0.8; background-color:#022279;"></div>
            <div class="sf-banner-heading-wrap">
                <div class="sf-banner-heading-area">
                <div class="sf-banner-heading-large">Forgot Password</div>
                <div class="sf-banner-breadcrumbs-nav">
                    <ul class="list-inline">
                    <li><a href="<?=file_path()?>"> Home </a></li>
                    <li>Forgot Password</li>
                    </ul>
                </div>
                </div>
            </div>
            </div>
        </div>            
        <div class="aon-contact-area">
            <div class="container">                
            <div class="section-content">                  
                <div class="sf-contact-form-wrap">
                <div class="sf-contact-form">
                    <div class="sf-con-form-title text-center">                        
                        <?php
$top_msg = $this->session->flashdata('msg_show');
if (is_array($top_msg)) {
if ($top_msg['class'] == 'false') {?>
        <h5 style="color: red;"><?=$top_msg['msg']?></h5>
        <?php } else {?>
                <h5 style="color: red;"><?=$top_msg['msg']?></h5>
            <?php }}?>
                    </div>
                    <form class="" method="post" action="<?=file_path()?><?=$this->uri->rsegment(1)?>/check" id="forgotpasswordform">
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash();?>">                        
                        <div class="row"> 
                            <div class="col-md-8">
                                <div class="form-group sf-news-l-form">
                                    <?php $form_value = set_value('email', '');?>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email">
                                    <button type="submit" class="sf-sb-btn forgot-pass">Submit</button>
                                    <?php echo form_error('email', '<p class="error_p">', '</p>'); ?>
                                </div>
                                <span id="email_error"></span>
                                <span id="email_success"></span>                                
                            </div>                            
                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>        
</div>
<style type="text/css">
    .forgot-pass{
        background-color:#001f74 !important;
        color:white !important;
        font-weight:600;
    }
	.error_p{
		color: red;
	}
    .sf-contact-form .form-control {
        border-radius: 14px;
        border: 2px solid #c2c8d7;
        height: 40px;
        background-color: transparent;
    }
</style>
