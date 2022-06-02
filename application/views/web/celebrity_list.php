<div class="page-content">
	<div class="aon-page-benner-area">
      <div class="aon-page-banner-row" style="background-image: url(<?=base_url()?>upload/category/<?=$categoryDetails[0]['banner_name']?>)">
        <div class="sf-overlay-main" style="opacity:0.8; background-color:#022279;"></div>
        <div class="sf-banner-heading-wrap">
          <div class="sf-banner-heading-area">
            <div class="sf-banner-heading-large"><?=$categoryDetails[0]['category_name']?></div>
            <div class="sf-banner-breadcrumbs-nav">
              <ul class="list-inline">
                <li><a href="<?=file_path()?>"> Home </a></li>
                <li>Celebrity List</li>
                <li><?=$categoryDetails[0]['category_name']?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Banner-->
    <!-- Search Result Area -->
    <div class="aon-search-result-area padding-top-search-section">
        <!-- Search Result Show -->
        <div class="row">
        	<?php if (count($celebrity_list) > 0) {
	?>

        	<?php for ($i = 0; $i < count($celebrity_list); $i++) {
		$resWishlist = $this->comman_fun->check_record('wishlist_master', array('celebrity_id' => $celebrity_list[$i]['id'], 'usercode' => $this->session->userdata['user']['usercode']));

		if ($resWishlist == true) {
			$heartClass = 'fa fa-heart';
		} else {
			$heartClass = 'fa fa-heart-o';
		}
		?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="aon-ow-provider-wrap">
                    <div class="aon-ow-provider" style="min-height: 457px;">
                        <div class="aon-ow-top">
                            <div class="aon-pro-check"><span><i class="fa fa-check"></i></span></div>
                            <div class="aon-pro-favorite"><a href="javascript:void(0);" id="fav-<?=$celebrity_list[$i]['id']?>" class="wishlist_option" data="<?=$celebrity_list[$i]['id']?>"><i id="h_<?=$celebrity_list[$i]['id']?>" class="<?=$heartClass?>"></i></a></div>
                            <div class="aon-ow-info">
                                <h4 class="aon-title"><a href="<?=file_path()?>celebrity/view/<?=$celebrity_list[$i]['id']?>"><?=$celebrity_list[$i]['fname']?> <?=$celebrity_list[$i]['lname']?></a></h4>
                            </div>
                        </div>
                        <div class="aon-ow-mid">
                            <div class="aon-ow-media">
                                <a href="<?=file_path()?>celebrity/view/<?=$celebrity_list[$i]['id']?>"><img src="<?=upload_path()?>celebrity_profile/thum/<?=$celebrity_list[$i]['profile_pic']?>" style="height: 236px;min-width: 222px;max-width: 222px;" alt=""></a>
                            </div>
                            <p><?=substr($celebrity_list[$i]['about_career'], 0, 150)?>...<a href="<?=file_path()?>celebrity/view/<?=$celebrity_list[$i]['id']?>">Read More</a></p>

                        </div>
                    </div>
                    <div class="aon-ow-bottom">
                        <a href="<?=file_path()?>celebrity/view/<?=$celebrity_list[$i]['id']?>">Book Now</a>
                    </div>
                </div>
            </div>
        <?php }} else {?>
            <div class="page-notfound datanotfound">
                <div class="page-notfound-content m-b30">
                    <h3 class="error-comment">No celebrity found, please try after sometime.</h3>
            		<a href="<?=file_path()?>home" class="site-button">Back to Home</a>
                </div>
            </div>
        <?php }?>
        </div>
    </div>
</div>
<style type="text/css">
	.datanotfound {
	    width: 100%;
	}
	.aon-search-result-area {
	    min-height: unset;
	}
</style>
