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
                <?php $form_value = set_value('occasion_title', isset($result[0]['occasion_id']) ? $result[0]['occasion_id'] : '');?>
                <select class="form-control" id="occasion_title" name="occasion_title" required>
                	<?php for ($i = 0; $i < count($occasionResult); $i++) {
	if ($occasionResult[$i]['id'] == $form_value) {
		$sel = "selected";
	} else {
		$sel = "";
	}
	?>
                		<option <?=$sel?> value="<?=$occasionResult[$i]['id']?>"><?=$occasionResult[$i]['occasion_title']?></option>
                	<?php }?>
                </select>
                <?php echo form_error('occasion_title', '<p class="error_p">', '</p>'); ?> </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Message for</label>
              <div class="col-sm-9">
                <?php $form_value = set_value('message_for', isset($result[0]['message_for']) ? $result[0]['message_for'] : '');?>
                <?php if ($form_value == 'self') {
	$checkYes = 'checked';
} else {
	$checkYes = '';
}
if ($form_value == 'other') {
	$checkNo = 'checked';
} else {
	$checkNo = '';
}
?>
                <input type="radio" name="message_for" value="self" class="self" placeholder="self" <?=$checkYes?>> self
                <?php if ($form_set['mode'] == 'edit') {?>
                <input style="margin-left: 20px;" type="radio" class="other" name="message_for" value="other" placeholder="other" <?=$checkNo?>> other
            <?php } else {?>
                <input type="radio" name="message_for" class="other" value="other" placeholder="other" checked> other
            <?php }?>
                <?php echo form_error('message_for', '<p class="error_p">', '</p>'); ?> </div>

            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Template</label>
              <div class="col-sm-9">
                <?php $form_value = set_value('template_message', isset($result[0]['template_message']) ? $result[0]['template_message'] : '');?>
                <textarea class="form-control" id="template_message" name="template_message" value="" required ><?=$form_value?></textarea>
                <?php echo form_error('template_message', '<p class="error_p">', '</p>'); ?> </div>
            </div>
            <div class="form-group">
              <label class="col-sm-10 control-label">Use this for Celebrity : <span style="color: red;margin-right: 10px;font-size: 16px; font-weight: 600;"> _celebrity_name_</span>| Use this for recipient : <span style="color: red;margin-right: 10px;font-size: 16px; font-weight: 600;"> _recipient_name_</span><span class="sender_option">|   Use this for sender :</span> <span style="color: red;font-size: 16px; font-weight: 600;" class="sender_option">_sender_name_</span></label>
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
<style type="text/css">
.form-horizontal .control-label {
    text-align: left;
}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		var checked_self = $('.self').is(":checked");
		var checked_other = $('.other').is(":checked");
		if(checked_self==true){
			$('.sender_option').hide();
		}else{
			$('.sender_option').show();
		}
		if(checked_other==true){
			$('.sender_option').show();
		}else{
			$('.sender_option').hide();
		}
	});
	$("input[name$='message_for']").click(function() {


		var radio_val = $(this).val();
		//alert(radio_val);

        if(radio_val=='self'){
        	$('.sender_option').hide();
        }else{
        	$('.sender_option').show();
        }

	});
</script>
