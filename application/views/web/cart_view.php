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
                	<h4>My Cart</h4>
                </div>
                <div class="card aon-card">
                    <div class="card-body aon-card-body">
                    	<div class="row">
                    		<div class="col-md-8">
                    			<div class="row working-hours-admin m-b10 staff-schedule-item-row">
		                            <ul class="sf-provi-articles-list">
		                            	<?php if (count($cartRes) < 1) {
	echo "<h4 style='color:red;'>Cart is empty</h4>";
}?>
									<?php $cartResult = $this->ObjM->getCartDetailsList($cartRes[0]['cart_id']);?>
		                            	<?php for ($i = 0; $i < count($cartResult); $i++) {?>
										<li style="border-bottom: 1px solid #ffb600;"><!-- d-flex flex-wrap -->
		                                	<div class="sf-provi-art-list col-md-12">
		                                		<div class="row"><!-- d-flex flex-wrap -->
			                                    	<div class="sf-provi-art-left col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
			                                        	<div class="sf-provi-art-pic"><img src="<?=upload_path()?>celebrity_profile/thum/<?=$cartResult[$i]['profile_pic']?>" alt=""></div>
			                                            <div class="sf-provi-art-date"><h4 class="sf-provi-art-title"><?=$cartResult[$i]['fname']?> <?=$cartResult[$i]['lname']?></h4></div>
			                                            <div class="sf-provi-art-comment"><span style="float: left;color: #062279;font-weight: 900;">Price : ₹ <?=$cartResult[$i]['amount']?></span> <span style="float: right;padding-right: 20px;color: #062279;"><a href="#" id="val_<?=$cartResult[$i]['id']?>" data-value="<?=$cartResult[$i]['id']?>" class="removeCart"><i class="fa fa-trash-o"></i></a></span></div>
			                                        </div><!-- d-flex flex-wrap -->
			                                        <div class="sf-provi-art-right custom-padding col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7">
			                                        	<div class="row">
				                                        	<div class="col-md-6">
						                                        <div class="form-group">
						                                            <label class="cart-d-title">Request for video: </label>
						                                            <label>Recorded Video</label>
						                                        </div>
						                                    </div>
						                                    <div class="col-md-6">
						                                        <div class="form-group">
						                                            <label class="cart-d-title">Booking for: </label>
						                                            <?php if ($cartResult[$i]['create_for'] == "my_self") {?>
						                                            <label><?=$cartResult[$i]['self_name']?></label>
						                                        <?php } else {?>
						                                        	<label><?=$cartResult[$i]['to_name']?></label>
						                                        <?php }?>
						                                        </div>
						                                    </div>
						                                    <div class="col-md-6">
						                                        <div class="form-group">
						                                            <label class="cart-d-title">What's the occasion?: </label>
						                                            <?php if ($cartResult[$i]['occation_type'] != "Customize_Your_Message") {?>
						                                            <label><?=$cartResult[$i]['occation_type']?></label>
						                                        <?php } else {?>
						                                        	<label>-</label>
						                                        <?php }?>
						                                        </div>
						                                    </div>
						                                    <div class="col-md-6">
						                                        <div class="form-group">
						                                            <label class="cart-d-title">When you need this video: </label>
						                                            <label><i class="fa fa-calendar-o"></i> <?=date('d-m-Y', strtotime($cartResult[$i]['delivery_date']))?></label>
						                                        </div>
						                                    </div>
						                                </div>
			                                        </div>
			                                    </div>
		                                    </div>
		                                </li>
		<?php }?>

		                            </ul>
		                        </div>
                    		</div>
                    		<div class="col-md-4">
                    			<div class="col-xl-12  sf-upgrade-top-area" style="position: sticky;top: 100px;">
                    				<?php if ($cartRes[0]['total_amount'] != 0) {
	$amount = $cartRes[0]['total_amount'];
} else {
	$amount = 0;
}?>
                                    <h4 class="sf-upgrade-top-title">Total Amount: <span style="border: none;">₹ <?=$amount;?></span></h4>
                                    <a class="admin-button sf-upgrade-btn" href="<?=file_path()?>home">Continue shopping</a>
                                    <a href="<?=file_path()?>booking_summary/view" class="admin-button sf-upgrade-btn">Checkout</a>
                                </div>
                    		</div>
                    	</div>
                        <!-- <div class="row working-hours-admin m-b10 staff-schedule-item-row">
                            <ul class="sf-provi-articles-list">
                            	<?php if (count($cartResult) < 1) {
	//echo "<h4 style='color:red;'>Cart is empty</h4>";
}?>
                            	<?php for ($i = 0; $i < count($cartResult); $i++) {?>
								<li style="border-bottom: 1px solid #ffb600;">
                                	<div class="sf-provi-art-list d-flex flex-wrap">
                                    	<div class="sf-provi-art-left d-flex flex-wrap">
                                        	<div class="sf-provi-art-pic"><img src="<?=upload_path()?>celebrity_profile/thum/<?=$cartResult[$i]['profile_pic']?>" alt=""></div>
                                            <div class="sf-provi-art-date"><h4 class="sf-provi-art-title"><?=$cartResult[$i]['fname']?> <?=$cartResult[$i]['lname']?></h4></div>
                                            <div class="sf-provi-art-comment"><span style="float: left;color: #062279;    font-weight: 900;">Price : ₹ <?=$cartResult[$i]['amount']?></span> <span style="float: right;padding-right: 20px;color: #062279;"><a href="#" id="val_<?=$cartResult[$i]['cart_id']?>" data-value="<?=$cartResult[$i]['cart_id']?>" class="removeCart"><i class="fa fa-trash-o"></i></a></span></div>
                                        </div>
                                        <div class="sf-provi-art-right d-flex flex-wrap custom-padding">
                                        	<div class="col-md-6">
		                                        <div class="form-group">
		                                            <label class="cart-d-title">Request for video: </label>
		                                            <label>Recorded Video</label>
		                                        </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                        <div class="form-group">
		                                            <label class="cart-d-title">Booking for: </label>
		                                            <?php if ($cartResult[$i]['create_for'] == "my_self") {?>
		                                            <label><?=$cartResult[$i]['self_name']?></label>
		                                        <?php } else {?>
		                                        	<label><?=$cartResult[$i]['to_name']?></label>
		                                        <?php }?>
		                                        </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                        <div class="form-group">
		                                            <label class="cart-d-title">What's the occasion?: </label>
		                                            <?php if ($cartResult[$i]['occation_type'] != "Customize_Your_Message") {?>
		                                            <label><?=$cartResult[$i]['occation_type']?></label>
		                                        <?php } else {?>
		                                        	<label>-</label>
		                                        <?php }?>
		                                        </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                        <div class="form-group">
		                                            <label class="cart-d-title">When you need this video: </label>
		                                            <label><i class="fa fa-calendar-o"></i> <?=date('d-m-Y', strtotime($cartResult[$i]['delivery_date']))?></label>
		                                        </div>
		                                    </div>
                                        </div>
                                    </div>
                                </li>
<?php }?>

                            </ul>
                        </div> -->
                        <!-- <div class="">
                                <div class="row">
                                    <div class="col-xl-6">
                                    </div>
                                    <div class="col-xl-6  sf-upgrade-top-area">
                                        <h4 class="sf-upgrade-top-title">Total Amount: <span style="border: none;">₹ <?=$totalCartAmount[0]['tot_cart_amount'];?></span></h4>
                                        <a class="admin-button sf-upgrade-btn" href="<?=file_path()?>home">Continue shopping</a>
                                        <a href="<?=file_path()?>home" class="admin-button sf-upgrade-btn">Checkout</a>
                                    </div>
                                </div>
                            </div> -->
                    </div>
                </div>
            </div>
    	</div>
 </div>
<style type="text/css">
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
