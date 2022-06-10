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
                	<h4>Order Summary</h4>
                </div>
                <div class="card aon-card">
                    <div class="card-body aon-card-body">
                    	<div class="row">
                    		<div class="col-md-8">
                    			<div class="row working-hours-admin m-b10 staff-schedule-item-row">
		                            <div class="row">
		                            	<?php if (count($cartResult) < 1) {
	echo "<h4 style='color:red;'>Booking summary is empty</h4>";}?>

		                            	<?php $totalAmount = 0;for ($i = 0; $i < count($cartResult); $i++) {?>
		                            		<?php if (count($cartResult) < 2) {?>
		                            			<div class="col-md-12">
		                            		<?php } else if (count($cartResult) < 3) {?>
		                            			<div class="col-md-6">
		                            		<?php } else {?>
		                            			<div class="col-md-4">
		                            		<?php }?>

	                            				<div class="sf-provi-art-pic"><img src="<?=upload_path()?>celebrity_profile/thum/<?=$cartResult[$i]['profile_pic']?>" class="img-min-heght" alt=""></div>
	                                            <div class="sf-provi-art-date"><h4 class="sf-provi-art-title"><?=$cartResult[$i]['fname']?> <?=$cartResult[$i]['lname']?></h4></div>
	                                            <div class="sf-provi-art-date"><h4 class="sf-provi-art-title">Delivery date: <?=date('d-m-Y', strtotime($cartResult[$i]['delivery_date']))?></h4></div>
	                                            <div class="sf-provi-art-date"><h4 class="sf-provi-art-title">Video Link: </h4></div>
	                                            <div class="sf-provi-art-comment"><span style="float: left;color: #062279;font-weight: 900;font-size: 15px;">Price : ₹ <?=$cartResult[$i]['amount']?></span></div>


	                                        </div>
		<?php $totalAmount = $totalAmount + $cartResult[$i]['amount'];}?>
									</div>
		                        </div>
                    		</div>
                    		<div class="col-md-4">
                    			<?php if (count($cartResult) > 0) {?>
                    			<div class="col-xl-12 sf-upgrade-top-area" style="position: sticky;top: 100px;">
                                    <h4 class="sf-upgrade-top-title">Total Amount: <span style="border: none;">₹ <?=$totalAmount;?></span></h4>
                                    <a href="<?=file_path()?>my_bookings" class="admin-button sf-upgrade-btn">Return to bookings</a>
                                </div>
                            <?php }?>
                    		</div>
                    	</div>
                    </div>
                </div>
            </div>
    	</div>
 </div>
<style type="text/css">
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
