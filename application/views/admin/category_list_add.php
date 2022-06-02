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
              <label class="col-sm-2 control-label">Category Name</label>
              <div class="col-sm-9">
                <?php $form_value = set_value('category_name', isset($result[0]['category_name']) ? $result[0]['category_name'] : '');?>
                <input type="text" class="form-control" id="category_name" name="category_name" value="<?=$form_value?>" required="required" placeholder="Category Name">
                <?php echo form_error('category_name', '<p class="error_p">', '</p>'); ?> </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Access Name</label>
              <div class="col-sm-9">
                <?php $form_value = set_value('access_name', isset($result[0]['access_name']) ? $result[0]['access_name'] : '');?>
                <input type="text" class="form-control" id="access_name" name="access_name" value="<?=$form_value?>" required="required" placeholder="Same as category name eg. sangeetkar">
                <?php echo form_error('access_name', '<p class="error_p">', '</p>'); ?> </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Thum Image</label>
              <div class="col-sm-9">
              	<?php if ($form_set['mode'] != "edit") {
	$required = "required";
} else {
	$required = "";
}?>
               <input type="file" class="form-control1" id="upload_file" name="upload_file" style="display:inline;" <?=$required?>>
                <input type="hidden" name="old_file" value="<?=$result[0]['img_name']?>" />
                <?php if ($result[0]['img_name'] != '') {?>
                		<img src="<?=base_url()?>upload/category/<?=$result[0]['img_name']?>" height="50" />
                <?php }?>
                <?php echo form_error('upload_file', '<p class="error_p">', '</p>'); ?> </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Banner Image</label>
              <div class="col-sm-9">
              	<?php if ($form_set['mode'] != "edit") {
	$required = "required";
} else {
	$required = "";
}?>
               <input type="file" class="form-control1" id="upload_file_banner" name="upload_file_banner" style="display:inline;" <?=$required?>>
                <input type="hidden" name="old_file_banner" value="<?=$result[0]['banner_name']?>" />
                <?php if ($result[0]['banner_name'] != '') {?>
                		<img src="<?=base_url()?>upload/category/<?=$result[0]['banner_name']?>" height="50" />
                <?php }?>
                <?php echo form_error('upload_file_banner', '<p class="error_p">', '</p>'); ?> </div>
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
