<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<script src="<?=asset_path()?>js/chosen.jquery.js"></script>
<link href="<?=asset_path()?>css/chosen.css" rel="stylesheet">
<script>
	$(document).ready(function(e) {

		$(".chzn-select").chosen();

   	 	$(".chzn-select-deselect").chosen({

        	allow_single_deselect: true

    	});

         $('.default-date-picker').datepicker({

       		 format: 'dd-mm-yyyy'

   		 });
    });
</script>
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
              <label class="col-sm-2 control-label">Slider Title Text</label>
              <div class="col-sm-9">
                <?php $form_value = set_value('slider_title', isset($result[0]['slider_title']) ? $result[0]['slider_title'] : '');?>
                <input type="text" class="form-control" id="slider_title" name="slider_title" value="<?=$form_value?>" required="required" placeholder="Slider Title Text">
                <?php echo form_error('slider_title', '<p class="error_p">', '</p>'); ?> </div>
            </div>
            <!--/form-group-->
<?php if ($form_set['mode'] != "edit") {
	$required = "required";
} else {
	$required = "";
}?>
            <div class="form-group">
              <label class="col-sm-2 control-label">Image</label>
              <div class="col-sm-9">
                <input type="file" class="form-control1" id="upload_file" name="upload_file" style="display:inline;" <?=$required?>>
                <input type="hidden" name="old_file" value="<?=$result[0]['img_name']?>" />
                <?php if ($result[0]['img_name'] != '') {?>
                		<img src="<?=base_url()?>upload/slider/<?=$result[0]['img_name']?>" height="50" />
                <?php }?>
                <?php echo form_error('upload_file', '<p class="error_p">', '</p>'); ?> </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?=file_path('admin')?><?=$this->uri->rsegment(1)?>/view/<?=$option[0]['contain_name']?>">
                <button type="button" class="btn btn-default">Cancel</button>
                </a>
              </div>
            </div>
          </form>
    </div>
  </div>
</div>

