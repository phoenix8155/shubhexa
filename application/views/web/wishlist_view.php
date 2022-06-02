<div id="content">
        <div class="content-admin-main">
            <div class="admin-top-area d-flex flex-wrap justify-content-between m-b30 align-items-center">
                <div class="admin-left-area">
                    <a class="nav-btn-admin d-flex justify-content-between align-items-center" id="sidebarCollapse">
                        <span class="nav-btn-text">Dashboard Menu</span>
                        <span class="fa fa-reorder"></span>
                    </a>
                </div>
                <div class="admin-area-mid">
                </div>
                <div class="admin-right-area">
                </div>
            </div>
        	<div class="aon-admin-heading">
            	<h4>My Wishlist</h4>
            </div>
            <div class="card aon-card">
                <div class="card-body aon-card-body">
                	<div class="row">
                		<div class="col-md-12">
                			<div class="row working-hours-admin m-b10 staff-schedule-item-row">
	                            <div class="row">
	                            	<?php if (count($result) < 1) {
	echo "<h4 style='color:red;'>Wishlist is empty</h4>";}?>
	                            	<?php for ($i = 0; $i < count($result); $i++) {?>
	                            		<?php if (count($result) < 2) {?>
	                            			<div class="col-md-12">
	                            		<?php } else if (count($result) < 3) {?>
	                            			<div class="col-md-6">
	                            		<?php } else if (count($result) < 4) {?>
	                            			<div class="col-md-4">
	                            		<?php } else {?>
	                            			<div class="col-md-3">
	                            		<?php }?>

	                            		<?php if (count($result) > 3) {?>
	                            		<?php $clss = "margin-right-80";?>
	                            		<?php } else {?>
	                            		<?php $clss = "float-rightx";?>
	                            		<?php }?>

                            				<div class="sf-provi-art-pic" style="padding-top: 10px;"><a href="<?=file_path()?>celebrity/view/<?=$result[$i]['celeb_id']?>"><img src="<?=upload_path()?>celebrity_profile/thum/<?=$result[$i]['profile_pic']?>" class="img-min-heght" alt=""></a></div>
                                            <div class="sf-provi-art-date"><a style="display: inline-block;" href="<?=file_path()?>celebrity/view/<?=$result[$i]['celeb_id']?>"><h4 class="sf-provi-art-title"><?=$result[$i]['fname']?> <?=$result[$i]['lname']?></h4></a><a href="<?=file_path()?>my_wishlist/removeFromWishlist/<?=$result[$i]['id']?>" class="admin-button btn-sm <?=$clss?>" title="Remove from list">
                                                <i class="fa fa-trash"></i>
                                            </a></div>
                                            <div class="sf-provi-art-comment"><span style="float: left;color: #062279;font-weight: 900;font-size: 15px;">Price : ₹ <?=$result[$i]['charge_fees']?></span></div>
                                        </div>
	<?php }?>
								</div>
	                        </div>
                		</div>
                	</div>
                </div>
            </div>
        </div>
	</div>
 </div>
<style type="text/css">

	.margin-right-80 {
	    margin-right: 25px;
	    float: right;
	}

	.float-rightx{
		float: right;
	}

	.img-min-heght{
		min-height: 145px;
		max-height: 145px;
	}
	h4 {
	    font-size: 15px;
	    font-weight: 800;
	}
	.sf-provi-art-pic {
	    width: 145px;
	}
	.sf-provi-art-left {
	    width: 24%;
	}
	.sf-provi-art-right {
	    width: 75%;
	    padding-left: 25px;
	}
	.cart-d-title{
		font-size: 18px;
	    font-weight: 700;
	    color: #062279;
	}
	.custom-padding{
		padding: 15px;
	}
	.admin-button, .admin-button-secondry {
	    padding: 10px 6px;
	    font-size: 12px;
	}
	.sf-provi-art-comment{
		margin-top: 15px;
	}

	@media only screen and (max-width:1276px){
		a.admin-button.sf-upgrade-btn{
			margin-top: 6px;
			text-transform: none;
		}
	}
</style>
