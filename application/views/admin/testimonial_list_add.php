<div class="contentpanel">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><?=$sub_title?></h4>
    </div>
    <div class="panel-body">
       <form action="<?=file_path('admin')?><?=$this->uri->rsegment(1)?>/insert" method="post" class="form-horizontal row-border" enctype="multipart/form-data">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash();?>">
            <input type="hidden" name="mode" id="mode" value="<?=$form_set['mode']?>" />
            <input type="hidden" name="eid" id="eid" value="<?=$form_set['eid']?>" />
            <div class="form-group">
              <label class="col-sm-2 control-label">First Name</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('first_name', isset($result[0]['first_name']) ? $result[0]['first_name'] : '');?>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?=$form_value?>" required="required" placeholder="First Name">
                <?php echo form_error('first_name', '<p class="error_p">', '</p>'); ?> </div>
                <label class="col-sm-2 control-label">Last Name</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('last_name', isset($result[0]['last_name']) ? $result[0]['last_name'] : '');?>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?=$form_value?>" required="required" placeholder="Last Name">
                <?php echo form_error('last_name', '<p class="error_p">', '</p>'); ?> </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Designation</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('designation', isset($result[0]['designation']) ? $result[0]['designation'] : '');?>
                <input type="text" class="form-control" id="designation" name="designation" value="<?=$form_value?>" required="required" placeholder="Designation">
                <?php echo form_error('designation', '<p class="error_p">', '</p>'); ?> </div>
                <label class="col-sm-2 control-label">Rating</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('rating', isset($result[0]['rating']) ? $result[0]['rating'] : '');?>
                <?php
if ($form_value == "1") {
	$sel1 = "selected";
} else {
	$sel1 = "";
}
if ($form_value == "2") {
	$sel2 = "selected";
} else {
	$sel2 = "";
}
if ($form_value == "3") {
	$sel3 = "selected";
} else {
	$sel3 = "";
}
if ($form_value == "4") {
	$sel4 = "selected";
} else {
	$sel4 = "";
}
if ($form_value == "5") {
	$sel5 = "selected";
} else {
	$sel5 = "";
}
if ($form_value == "") {
	$sel0 = "selected";
} else {
	$sel0 = "";
}
?>
                <select class="form-control" id="rating" name="rating">
                	<option value="">choose one</option>
                	<option <?=$sel1?> value="1">1</option>
                	<option <?=$sel2?> value="2">2</option>
                	<option <?=$sel3?> value="3">3</option>
                	<option <?=$sel4?> value="4">4</option>
                	<option <?=$sel5?> value="5">5</option>
                </select>

                <?php echo form_error('rating', '<p class="error_p">', '</p>'); ?> </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Feedback Title</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('feedback_title', isset($result[0]['feedback_title']) ? $result[0]['feedback_title'] : '');?>
                <input type="text" class="form-control" id="feedback_title" name="feedback_title" value="<?=$form_value?>" required="required" placeholder="Feedback Title">
                <?php echo form_error('feedback_title', '<p class="error_p">', '</p>'); ?> </div>
                <label class="col-sm-2 control-label">Profile Image</label>

              <div class="col-sm-4">
              	<?php if ($form_set['mode'] != "edit") {
	$required = "required";
} else {
	$required = "";
}?>
                <input type="file" class="form-control1" id="upload_file" name="upload_file" style="display:inline;" <?=$required?>>
                <input type="hidden" name="old_file" value="<?=$result[0]['img_name']?>" />
                <?php if ($result[0]['img_name'] != '') {?>
                		<img src="<?=base_url()?>upload/testimonial/<?=$result[0]['img_name']?>" height="50" />
                <?php }?>

                <?php echo form_error('upload_file', '<p class="error_p">', '</p>'); ?> </div>
            </div>
            <div class="form-group">

              <label class="col-sm-2 control-label">Feedback Description</label>

              <div class="col-sm-9">

                <?php $form_value = set_value('feedback_description', isset($result[0]['feedback_description']) ? $result[0]['feedback_description'] : '');?>

                <textarea class="form-control" id="feedback_description" name="feedback_description" required="required" placeholder="Feedback Description"><?=$form_value?></textarea>

                <?php echo form_error('feedback_description', '<p class="error_p">', '</p>'); ?> </div>

            </div>

            <div class="form-group">
              	<div class="col-sm-offset-2 col-sm-10">
	                <button type="submit" class="btn btn-primary">Submit</button>
	                <a href="<?=file_path('admin')?><?=$this->uri->rsegment(1)?>/view">
	                <button type="button" class="btn btn-default">Cancel</button>
	                </a>
            	</div>
            </div>
        </form>
    </div>
  </div>
</div>
