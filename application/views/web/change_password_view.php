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
            <div class="card aon-card" id="aon-passUpdate-panel">
            	<div class="card-header aon-card-header"><h4><i class="fa fa-lock"></i> Password Update</h4></div>

                <div class="card-body aon-card-body">
                	<div class="row">
                		<form class="col-xl-12" action="<?=file_path()?><?=$this->uri->rsegment(1)?>/change_password_insert" method="post">
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash();?>">
                            <div class="row">
		                    	<div class="col-md-4">
		                            <div class="form-group">
		                                <label>Old Password</label>
		                                <div class="aon-inputicon-box">
		                                	<?php $form_value = set_value('old_pass', '');?>
		                                    <input class="form-control sf-form-control" name="old_pass" type="password" required placeholder="Enter Old Password" >
		                                    <i class="aon-input-icon fa fa-lock"></i>
		                                </div>
		                                <?php echo form_error('old_pass', '<p class="error_p">', '</p>'); ?>
		                            </div>
		                        </div>
		                        <div class="col-md-4">
		                            <div class="form-group">
		                                <label>New Password</label>
		                                <div class="aon-inputicon-box">
		                                	<?php $form_value = set_value('new_pass', '');?>
		                                    <input class="form-control sf-form-control" name="new_pass" type="password" required placeholder="New Password">
		                                    <i class="aon-input-icon fa fa-lock"></i>
		                                </div>
		                                <?php echo form_error('new_pass', '<p class="error_p">', '</p>'); ?>
		                            </div>
		                        </div>
		                        <div class="col-md-4">
		                            <div class="form-group">
		                                <label>Repeat Password</label>
		                                <div class="aon-inputicon-box">
		                                	<?php $form_value = set_value('confirm_pass', '');?>
		                                    <input class="form-control sf-form-control" name="confirm_pass" type="password" required placeholder="Confirm Password">
		                                    <i class="aon-input-icon fa fa-lock"></i>
		                                </div>
		                                <?php echo form_error('confirm_pass', '<p class="error_p">', '</p>'); ?>
		                            </div>
		                        </div>
		                        <div class="col-md-4">
		                        	<button class="admin-button add-more-btns m-r10">Submit</button>
		                        </div>
		                    </div>
		                </form>
                    </div>
                </div>

            </div>
        </div>
	</div>
 </div>
