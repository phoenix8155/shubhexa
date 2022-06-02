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
              <label class="col-sm-2 control-label">Occasion Title</label>
              <div class="col-sm-9">
                <?php $form_value = set_value('occasion_title', isset($result[0]['occasion_title']) ? $result[0]['occasion_title'] : '');?>
                <input type="text" class="form-control" id="occasion_title" name="occasion_title" value="<?=$form_value?>" required="required" placeholder="Occasion Title">
                <?php echo form_error('occasion_title', '<p class="error_p">', '</p>'); ?> </div>
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
