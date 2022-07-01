<?php
if ($result[0]['fname'] != "" && $result[0]['lname'] != "") {
	$name = $result[0]['fname'] . ' ' . $result[0]['lname'];
} else {
	if ($result[0]['fname'] != "" && $result[0]['lname'] == "") {
		$name = $result[0]['fname'];
	} else {
		$name = "";
	}
}
if ($result[0]['birthdate'] != "") {
	$bday = date('d-M-Y', strtotime($result[0]['birthdate']));
} else {
	$bday = "";
}
// if ($result[0]['profile_pic'] != "") {
// 	$image = '<img src="' . base_url() . 'upload/celebrity_profile/' . $result[0]['profile_pic'] . '" height="100"  alt="Profile Picture"/>';
// } else {
// 	$image = '<img class="img-lg img-circle" src="' . asset_path() . 'panel/images/profile.png" alt="Profile Picture">';
// }

if ($result[0]['oauth_provider'] != "" & $result[0]['oauth_provider'] == "Facebook") {
	$image = "<img src='" . $result[0]['profile_pic'] . "'  style='height: 96px; width: 96px;'/>";
} else if ($result[0]['oauth_provider'] != "" & $result[0]['oauth_provider'] == "Google") {
	$image = "<img src='" . $result[0]['profile_pic'] . "'  style='height: 96px; width: 96px;'/>";
} else {
	if ($result[0]['profile_pic'] != "") {
		$image = "<img src='" . base_url() . "upload/user/" . $result[0]['profile_pic'] . "'  style='height: 96px; width: 96px;'/>";

	} else {
		$image = "<img src='" . base_url() . "upload/user/default.png'  style='height: 96px; width: 96px;'/>";
	}
}

if ($result[0]['emailid'] != "") {
	$emailid = $result[0]['emailid'];
} else {
	$emailid = "";
}
if ($result[0]['mobileno'] != "") {
	$mobileno = $result[0]['mobileno'];
} else {
	$mobileno = "";
}
if ($result[0]['password'] != "") {
	$password = $result[0]['password'];
} else {
	$password = "";
}
if ($result[0]['create_date'] != "") {
	$create_date = date('d-m-Y', strtotime($result[0]['create_date']));
} else {
	$create_date = "";
}

?>
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
        <div class="panel-body">
            <div class="fixed-fluid">
                <div class="fixed-md-200 pull-sm-left">
                    <!-- Simple profile -->
                    <div class="text-center">
                        <div class="pad-ver">
                            <?=$image?>
                        </div>
                        <h4 class="text-lg text-overflow mar-no"><?=$name?></h4>
                        <!-- <p class="text-sm text-muted">Client</p> -->
                    </div>
                    <hr>

                    <!-- Profile Details -->

                    <p class="pad-ver text-main text-sm text-uppercase text-bold">Details</p>
                    <?php if ($result[0]['gender'] != "") {?>
                    <?php if ($result[0]['gender'] == "Male") {?>
                        <p><i class="demo-pli-male-2 icon-lg icon-fw"></i> Male</p>
                    <?php } else if ($result[0]['gender'] == "Female") {?>
                        <p><i class="demo-pli-female-2 icon-lg icon-fw"></i> Female</p>
                    <?php } else if ($result[0]['gender'] == "Other") {?>
                        <p><i class="demo-pli-female-2 icon-lg icon-fw"></i> Other</p>
                    <?php }}?>

                    <?php if ($bday != "") {?>
                    	<p><i class="demo-pli-calendar-4 icon-lg icon-fw"></i> <?=$bday?></p>
                   <?php }?>


                    <!-- <?php $address_city = $result[0]['address'] . ' ' . $result[0]['city'];?> -->
                    <!-- <p><i class="demo-pli-map-marker-2 icon-lg icon-fw"></i></p>-->
                    <p><i class="demo-pli-mail icon-lg icon-fw"></i><a href="mailto:" class="btn-link"><?=$emailid?></a></p>
                    <p><i class="demo-pli-smartphone-3 icon-lg icon-fw"></i>
                        <a href="tel:<?=$mobileno?>" class="btn-link"><?=$mobileno?></a>
                    </p>
                </div>
                <div class="fluid fixed-left-border">
                    <div class="text-right">
                        <a href="<?=file_path('admin')?><?=$this->uri->rsegment(1)?>/view" class="btn btn-sm btn-success">Back</a>
                    </div>
                    <hr>
                    <p class="text-main text-bold" style="padding-top: 10px;">Personal Information</p>
                    <hr>
                    <div class="row pbt-10">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="col-lg-4 control-label">Name </label>
                                <span><?=$name?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="col-lg-4 control-label">Mobile No.</label>
                                <span><?=$mobileno?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row pbt-10">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="col-lg-4 control-label">Email ID</label>
                                 <span><?=$emailid?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="col-lg-4 control-label">Password</label>
                                <span><?=$password?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row pbt-10">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="col-lg-4 control-label">Sign-Up Date</label>
                                 <span><?=$create_date?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
	.btn_custom {
    	padding: 3px 15px !important;
	}
</style>

<!-- contentpanel -->
<style type="text/css">
    .pbt-10 {
        /*padding-bottom: 10px;
        padding-top: 10px;*/
    }
    .boards_list .tag {
        background-color: #25476a;
        color: #fff;
    }
</style>
