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
if ($result[0]['profile_pic'] != "") {
	$image = '<img src="' . base_url() . 'upload/celebrity_profile/' . $result[0]['profile_pic'] . '" height="100"  alt="Profile Picture"/>';
} else {
	$image = '<img class="img-lg img-circle" src="' . asset_path() . 'panel/images/profile.png" alt="Profile Picture">';
}
if ($result[0]['known_for'] != "") {
	$known_for = $result[0]['known_for'];
} else {
	$known_for = "";
}
if ($result[0]['language_known'] != "") {
	$edit_skills_f = json_decode($result[0]['language_known'], true);
	for ($i = 0; $i < count($edit_skills_f); $i++) {
		$arr[] = $edit_skills_f[$i];
		$language_known1 = implode(",", $arr);
	}
	$language_known = $language_known1;
} else {
	$language_known = "";
}
if ($result[0]['twitter_link'] != "") {
	$twitter_link = $result[0]['twitter_link'];
} else {
	$twitter_link = "";
}
if ($result[0]['fb_link'] != "") {
	$fb_link = $result[0]['fb_link'];
} else {
	$fb_link = "";
}
if ($result[0]['insta_link'] != "") {
	$insta_link = $result[0]['insta_link'];
} else {
	$insta_link = "";
}
if ($result[0]['sample_video_link'] != "") {
	$sample_video_link = $result[0]['sample_video_link'];
} else {
	$sample_video_link = "";
}
if ($result[0]['hashtag'] != "") {
	$hashtag = $result[0]['hashtag'];
} else {
	$hashtag = "";
}
if ($result[0]['experience_in_industry'] != "") {
	$experience_in_industry = $result[0]['experience_in_industry'];
} else {
	$experience_in_industry = "";
}
if ($result[0]['brief_details'] != "") {
	$brief_details = $result[0]['brief_details'];
} else {
	$brief_details = "";
}
if ($result[0]['about_life'] != "") {
	$about_life = $result[0]['about_life'];
} else {
	$about_life = "";
}
if ($result[0]['nature_character'] != "") {
	$nature_character = $result[0]['nature_character'];
} else {
	$nature_character = "";
}
if ($result[0]['successfull_events'] != "") {
	$successfull_events = $result[0]['successfull_events'];
} else {
	$successfull_events = "";
}
if ($result[0]['about_career'] != "") {
	$about_career = $result[0]['about_career'];
} else {
	$about_career = "";
}
if ($result[0]['brief_family_bg'] != "") {
	$brief_family_bg = $result[0]['brief_family_bg'];
} else {
	$brief_family_bg = "";
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

                    <!-- <?php if ($result[0]['client_status'] == 1) {?>

                            <?php if ($result[0]['gender'] == "M") {?>
                                <p><i class="demo-pli-male-2 icon-lg icon-fw"></i> Male</p>
                            <?php } else if ($result[0]['gender'] == "F") {?>
                                <p><i class="demo-pli-female-2 icon-lg icon-fw"></i> Female</p>
                            <?php } else if ($result[0]['gender'] == "O") {?>
                                <p><i class="demo-pli-female-2 icon-lg icon-fw"></i> Other</p>
                            <?php }?>

                    <?php }?> -->
                    <p><i class="demo-pli-calendar-4 icon-lg icon-fw"></i> <?=$bday?></p>

                    <?php $address_city = $result[0]['address'] . ' ' . $result[0]['city'];?>
                    <!-- <p><i class="demo-pli-map-marker-2 icon-lg icon-fw"></i></p>
                    <p><i class="demo-pli-mail icon-lg icon-fw"></i><a href="mailto:" class="btn-link"><?=$result[0]['emailid']?></a></p>
                    <p><i class="demo-pli-smartphone-3 icon-lg icon-fw"></i>
                        <a href="tel:" class="btn-link"></a>
                    </p> -->
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
                                <label class="col-lg-4 control-label">Known for  </label>
                                <span><?=$known_for?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row pbt-10">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="col-lg-4 control-label">Language Known </label>
                                 <span><?=$language_known?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="col-lg-4 control-label">Twitter Page Link </label>
                                <span><?=$twitter_link?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row pbt-10">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="col-lg-4 control-label">FB Page Link </label>
                                 <span><?=$fb_link?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="col-lg-4 control-label">Instagram Link  </label>
                                <span><?=$insta_link?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row pbt-10">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="col-lg-2 control-label">Video Link </label>
                                 <span><?=$sample_video_link?></span>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="col-lg-2 control-label">Hashtag  </label>
                                <span><?=$hashtag?></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row pbt-10">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="col-lg-2 control-label">Experience in Industries  </label>
                                <span><?=$experience_in_industry?></span>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="col-lg-2 control-label">Brief Details  </label>
                                <span><?=$brief_details?></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row pbt-10">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="col-lg-2 control-label">About Life  </label>
                                <span><?=$about_life?></span>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="col-lg-2 control-label">Successful Events  </label>
                                <span><?=$successfull_events?></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row pbt-10">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="col-lg-2 control-label">Nature and Character  </label>
                                <span><?=$nature_character?></span>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="col-lg-2 control-label">Little family background  </label>
                                <span><?=$brief_family_bg?></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row pbt-10">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="col-lg-2 control-label">About Career  </label>
                                <span><?=$about_career?></span>
                            </div>
                        </div>
                    </div>
                    <hr>
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
