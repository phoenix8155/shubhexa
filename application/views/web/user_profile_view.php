<?php
//echo $form_set['mode'];exit;
if ($form_set['mode'] == "view") {
	$readonly = "readonly";
	$required = "";
	$btnTxt = '<a href="' . file_path() . 'my_account/profile/edit" class="button btn btn-primary m-t40 m-l20 col-md-6"> Edit</a>';
} else {
	$readonly = "";
	$required = "required";
	$btnTxt = '<button type="submit" class="button btn btn-primary m-t40 m-l20 col-md-6" value="Save"> Save</button>';
}

if ($result[0]['oauth_provider'] != "" & $result[0]['oauth_provider'] == "Facebook") {
	$image = "<img src='" . $result[0]['profile_pic'] . "' />";
} else if ($result[0]['oauth_provider'] != "" & $result[0]['oauth_provider'] == "Google") {
	$image = "<img src='" . $result[0]['profile_pic'] . "' />";
} else {
	if ($result[0]['profile_pic'] != "") {
		$image = "<img src='" . base_url() . "upload/user/" . $result[0]['profile_pic'] . "' />";

	} else {
		$image = "<img src='" . base_url() . "upload/user/default.png' />";
	}
}

?>
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
			<div class="card aon-card">
				<div class="card-header aon-card-header"><h4><i class="fa fa-user"></i> About me</h4></div>
				<div class="card-body aon-card-body">
					<div class="row">
						<div class="col-xl-6">
							<div class="aon-staff-avtar">
								<div class="aon-staff-avtar-header">
									<div class="aon-pro-avtar-pic ">
										<?=$image?>
									</div>
									<div class="aon-pro-cover-wrap">
										<div class="aon-pro-cover-pic">
											<!-- <img src="<?=asset_path('web/')?>images/banner/job-banner.jpg" alt=""> -->
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="row">
								<form class="col-xl-12" action="<?=file_path()?><?=$this->uri->rsegment(1)?>/updateData" method="post" enctype="multipart/form-data">
									<input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash();?>">
									<input type="hidden" name="mode" id="mode" value="<?=$form_set['mode']?>" />
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>First Name</label>
												<div class="aon-inputicon-box">
													<input class="form-control sf-form-control" value="<?=$result[0]['fname']?>" name="first_name" <?=$required?> type="text" <?=$readonly?>>
													<i class="aon-input-icon fa fa-user"></i>
												</div>
												<?php echo form_error('first_name', '<p class="error_p">', '</p>'); ?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Last Name</label>
												<div class="aon-inputicon-box">
													<input class="form-control sf-form-control" value="<?=$result[0]['lname']?>" name="last_name" <?=$required?> type="text" <?=$readonly?>>
													<i class="aon-input-icon fa fa-user"></i>
												</div>
												<?php echo form_error('last_name', '<p class="error_p">', '</p>'); ?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Email</label>
												<div class="aon-inputicon-box">
													<input class="form-control sf-form-control" value="<?=$result[0]['emailid']?>"  name="email" <?=$required?> type="email" readonly>
													<i class="aon-input-icon fa fa-user"></i>
												</div>
											</div>
										</div>
										<?php if ($this->session->userdata['user']['loginWithOther'] == false) {?>
											<div class="col-md-6">
												<div class="form-group">
													<label>Mobile No</label>
													<div class="aon-inputicon-box">
														<input class="form-control sf-form-control" value="<?=$result[0]['mobileno']?>"  name="mobile_no" <?=$required?> type="text" readonly>
														<i class="aon-input-icon fa fa-building-o"></i>
													</div>
												</div>
											</div>
										<?php }?>
										<?php if ($form_set['mode'] != "view") {?>
											<div class="col-md-6">
												<div class="form-group">
													<label>Profile Image</label>
													<div class="aon-inputicon-box">
														<input class="form-control sf-form-control" name="upload_file" type="file">
														<input type="hidden" name="old_file" value="<?=$result[0]['profile_pic']?>" />
													</div>
												</div>
											</div>
										<?php }?>
										<?php if ($result[0]['oauth_provider'] == "") {?>
											<div class="col-md-6">
												<div class="form-group">
													<?=$btnTxt?>
												</div>
											</div>
										<?php }?>
									</div>
								</form>
							</div>
						</div>
						<div class="col-xl-12">
							<div class="row">
								<div class="col-md-6">
									<a href="<?=file_path()?>my_account/changePassword"><button type="submit" class="button btn btn-primary" value="Change Password"> Change Password</button></a>
									<a href="<?=file_path()?>home/logout"><button type="submit" class="button btn btn-danger" value="Save"> Logout</button></a>
								</div>
							</div>			
						</div>				
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
