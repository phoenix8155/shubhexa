<style type="text/css">
	label.col-lg-2.control-label {
	    color: #25476a;
	    font-weight: 600;
	}
	label.col-lg-4.control-label{
		color: #25476a;
	    font-weight: 600;
	}
</style>
<div class="contentpanel">
    <div class="panel panel-default">
        <div class="text-right pd-10">
            <a href="<?=file_path('admin')?><?=$this->uri->rsegment(1)?>/view" class="btn btn-sm btn-success">Back</a>
        </div>
        <?php for($i=0;$i<count($result);$i++) {
                $getCelebDetails = $this->ObjM->getCelebsDetails($result[$i]['celebrity_id']);
                
                $image = upload_path().'celebrity_profile/'.$getCelebDetails[0]['profile_pic'];
                $name  = $getCelebDetails[0]['fname'].' '.$getCelebDetails[0]['lname'];

                if ($result[0]['birthdate'] != "") {
                    $bday = date('d-M-Y', strtotime($result[0]['birthdate']));
                } else {
                    $bday = "-";
                }

                if ($result[0]['mobileno'] != "") {
                    $mobileno = $result[0]['mobileno'];
                } else {
                    $mobileno = "-";
                }

                if ($result[0]['emailid'] != "") {
                    $emailid = $result[0]['emailid'];
                } else {
                    $emailid = "-";
                }
                $arr = [];
                if ($getCelebDetails[0]['category'] != "") {
                    $edit_celebDetails_f = json_decode($getCelebDetails[0]['category'], true);
                    for ($k = 0; $k < count($edit_celebDetails_f); $k++) {
                        $arr[] = $edit_celebDetails_f[$k];
                        $cateoryName1 = implode(",", $arr);
                    }
                    $cateoryName = $cateoryName1;
                } else {
                    $cateoryName = "";
                }
            ?>
            
            <div class="panel-body">
                <div class="fixed-fluid">
                    <div class="fixed-md-200 pull-sm-left">
                    <!-- Simple profile -->
                    <div class="text-center">
                        <div class="pad-ver">
                            <img src="<?=$image?>" height="100"  alt="Profile Picture">
                        </div>
                        <h4 class="text-lg text-overflow mar-no"><?=$name?></h4>
                        <!-- <p class="text-sm text-muted">Client</p> -->
                    </div>
                    <hr>

                    <!-- Profile Details -->

                    <p class="pad-ver text-main text-sm text-uppercase text-bold">Details</p>
                   
                    <?php if ($getCelebDetails[0]['gender'] == "Male") {?>
                        <p><i class="demo-pli-male-2 icon-lg icon-fw"></i> Male</p>
                    <?php } else if ($getCelebDetails[0]['gender'] == "Female") {?>
                        <p><i class="demo-pli-female-2 icon-lg icon-fw"></i> Female</p>
                    <?php } else if ($getCelebDetails[0]['gender'] == "Other") {?>
                        <p><i class="demo-pli-female-2 icon-lg icon-fw"></i> Other</p>
                    <?php }?>

                    <?php if ($bday != "") {?>
                    	<p><i class="demo-pli-calendar-4 icon-lg icon-fw"></i> <?=$bday?></p>
                   <?php }?>

                    <!-- <p><i class="demo-pli-map-marker-2 icon-lg icon-fw"></i></p>-->
                    <p><i class="demo-pli-mail icon-lg icon-fw"></i><a href="mailto:" class="btn-link"><?=$emailid?></a></p>
                    <p><i class="demo-pli-smartphone-3 icon-lg icon-fw"></i>
                        <a href="tel:<?=$mobileno?>" class="btn-link"><?=$mobileno?></a>
                    </p>
                </div>
                    <div class="fluid fixed-left-border">
                    <p class="text-main text-bold" style="padding-top: 10px;">Booking Information</p>
                    <hr>
                    <div class="row pbt-10">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="col-lg-4 control-label">Order Number </label>
                                <span><?=$result[$i]['order_no']?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="col-lg-4 control-label">Order Date.</label>
                                <span><?=date('d-m-Y',strtotime($result[$i]['order_date']))?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row pbt-10">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="col-lg-4 control-label">Occation Type</label>
                                 <span><?=$result[$i]['occation_type']?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="col-lg-4 control-label">Delivery Date</label>
                                <span><?=date('d-m-Y',strtotime($result[$i]['delivery_date']))?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row pbt-10">
                    <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="col-lg-4 control-label">Category</label>
                                 <span><?=$cateoryName?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="col-lg-4 control-label">Amount</label>
                                 <span><?='₹. '.$result[$i]['amount']?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row pbt-10">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="col-lg-4 control-label">Template Message</label>
                                <br><br>
                                 <span><?=$result[$i]['template_message']?></span>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<style>
	.btn_custom {
    	padding: 3px 15px !important;
	}
</style>

<style type="text/css">
    .pd-10 {
        padding: 10px;
    }
</style>
