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
              <label class="col-sm-2 control-label">Promo Code</label>
              <div class="col-sm-10">
                <?php $form_value = set_value('promocode', isset($result[0]['promocode']) ? $result[0]['promocode'] : '');?>
                <input type="text" class="form-control" id="promocode" name="promocode" value="<?=$form_value?>" required="required" placeholder="Promo Code">
                <?php echo form_error('promocode', '<p class="error_p">', '</p>'); ?> </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Start Date</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('start_date', isset($result[0]['start_date']) ? $result[0]['start_date'] : '');?>

            	<input class="form-control"  name="old_name" id="old_name" type="hidden" value="<?=$result[0]['valid_start_date']?>" />
              	<input type="text" class="form-control start_date" id="start_date" name="start_date" value="<?=$form_value?>" required="required" placeholder="Start Date">
                <?php echo form_error('start_date', '<p class="error_p">', '</p>'); ?> </div>
                <label class="col-sm-2 control-label">End Date</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('end_end', isset($result[0]['end_end']) ? $result[0]['end_end'] : '');?>

            	<input class="form-control"  name="old_name" id="old_name" type="hidden" value="<?=$result[0]['end_end']?>" />
              	<input type="text" class="form-control end_end" id="end_end" name="end_end" value="<?=$form_value?>" required="required" placeholder="End Date">
                <?php echo form_error('end_end', '<p class="error_p">', '</p>'); ?> </div>
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
<link href="<?=base_url('assets/panel/')?>css/jquery-ui.css" rel="Stylesheet" type="text/css" />
<script type="text/javascript" src="<?=base_url('assets/panel/')?>js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/panel/')?>js/jquery-ui.js"></script>
<script language="javascript">
$(document).ready(function () {
    $("#start_date").datepicker({
        minDate: 0,
        dateFormat: 'yy-mm-dd',
    });
    $("#end_end").datepicker({
        minDate: 0,
        dateFormat: 'yy-mm-dd',
    });
});
</script>
<style type="text/css">
	p.error_p {
	    color: #cc200a;
	}
</style>
