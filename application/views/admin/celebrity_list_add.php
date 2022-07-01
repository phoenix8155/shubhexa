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
                <?php $form_value = set_value('first_name', isset($result[0]['fname']) ? $result[0]['fname'] : '');?>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?=$form_value?>" required="required" placeholder="First Name">
                <?php echo form_error('first_name', '<p class="error_p">', '</p>'); ?> </div>
                <label class="col-sm-2 control-label">Last Name</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('last_name', isset($result[0]['lname']) ? $result[0]['lname'] : '');?>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?=$form_value?>" required="required" placeholder="Last Name">
                <?php echo form_error('last_name', '<p class="error_p">', '</p>'); ?> </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Category</label>
              <div class="col-sm-10">
                <?php $form_value = set_value('category', isset($result[0]['category']) ? $result[0]['category'] : '');?>
                <?php
                    if ($this->uri->segment(4) == 'edit') { ?>
              				<?php
                        $edit_skills_f = json_decode($result[0]['category'], true);
                      ?>
                        <div class="form-group is-select">
                          <select required name="category[]" data-placeholder="Choose a category..." class="chosen-select2 form-control" multiple tabindex="4">
                            <?php
                              for ($i = 0; $i < count($categoryList); $i++) { 
                                if (in_array($categoryList[$i]['access_name'], $edit_skills_f)) {
                                  echo '<option selected value="' . $categoryList[$i]['access_name'] . '">' . $categoryList[$i]['access_name'] . '</option>';
                                } else {
                                  echo '<option  value="' . $categoryList[$i]['access_name'] . '">' . $categoryList[$i]['access_name'] . '</option>';
                                }
                              }
                            ?>
                          </select>
                        </div>
                      <?php } else {          ?>
                      <select multiple class="form-control chosen-select2" name="category[]" data-placeholder="Select category">
                        <?php 
                            $edit_skills_f = json_decode($result[0]['category'], true);
                            for ($i = 0; $i < count($categoryList); $i++) {
                              echo '<option  value="' . $categoryList[$i]['access_name'] . '">' . $categoryList[$i]['access_name'] . '</option>';
                            }
                        ?>
                      </select>
                      <?php } ?>
                      <?php echo form_error('category', '<p class="error_p">', '</p>'); ?> 
                    </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Known for</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('known_for', isset($result[0]['known_for']) ? $result[0]['known_for'] : '');?>
                <input type="text" class="form-control" id="known_for" name="known_for" value="<?=$form_value?>" required="required" placeholder="Known For">
                <?php echo form_error('known_for', '<p class="error_p">', '</p>'); ?> </div>
                <label class="col-sm-2 control-label">Language Known</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('language_known', isset($result[0]['language_known']) ? $result[0]['language_known'] : '');?>
                <?php
                  if ($this->uri->segment(4) == 'edit') { ?>
                    <?php
                      $edit_skills_f = json_decode($result[0]['language_known'], true);
                      $check = array('English', 'Hindi', 'Gujarati', 'Tamil', 'Marathi', 'Punjabi', 'Haryanvi', 'Telugu', 'Malyalam');
                    ?>
                    <div class="form-group is-select">
                      <select required name="language_known[]" data-placeholder="Choose a language..." class="chosen-select form-control" multiple tabindex="4">
                        <?php
                          for ($i = 0; $i < count($check); $i++) {
                            if (in_array($check[$i], $edit_skills_f)) {
                                echo '<option selected value="' . $check[$i] . '">' . $check[$i] . '</option>';
                            } else {
                                echo '<option  value="' . $check[$i] . '">' . $check[$i] . '</option>';
                            }
                          }
                        ?>
                      </select>
                    </div>
                  <?php } else { ?>
                <select multiple class="form-control chosen-select" name="language_known[]" data-placeholder="Select Language" required="required">
                    <option value="English">English</option>
                    <option value="Hindi">Hindi</option>
                    <option value="Gujarati">Gujarati</option>
                    <option value="Tamil">Tamil</option>
                    <option value="Marathi">Marathi</option>
                    <option value="Punjabi">Punjabi</option>
                    <option value="Haryanvi">Haryanvi</option>
                    <option value="Telugu">Telugu</option>
                    <option value="Malyalam">Malyalam</option>
					      </select>
                <?php echo form_error('language_known', '<p class="error_p">', '</p>');} ?> </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Mobile Number</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('mobileno', isset($result[0]['mobileno']) ? $result[0]['mobileno'] : '');?>
                <input type="text" class="form-control mobileno" id="mobileno" name="mobileno" value="<?=$form_value?>" placeholder="Mobile Number" required>
                <label class="error_m"></label>
                <?php echo form_error('mobileno', '<p class="error_p">', '</p>'); ?>
              </div>
              <label class="col-sm-2 control-label">Email Id</label>
              <div class="col-sm-4">
                  <?php $form_value = set_value('emailid', isset($result[0]['emailid']) ? $result[0]['emailid'] : '');?>
                  <input type="email" class="form-control" id="emailid" name="emailid" value="<?=$form_value?>" placeholder="Email id" required>
                  <label class="error_e"></label>
                  <?php echo form_error('emailid', '<p class="error_p">', '</p>'); ?> </div>
              </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Date Of Birth</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('birth_date', isset($result[0]['birthdate']) ? $result[0]['birthdate'] : '');?>

            	<input class="form-control"  name="old_name" id="old_name" type="hidden" value="<?=$result[0]['birthdate']?>" />
              	<input type="date" class="form-control default-date-picker" id="birth_date1" name="birth_date" value="<?=$form_value?>" placeholder="Date of birth">
                <?php echo form_error('birth_date', '<p class="error_p">', '</p>'); ?> </div>
                <label class="col-sm-2 control-label">Profile Image</label>

              <div class="col-sm-4">
              	<?php if ($form_set['mode'] != "edit") {
	$required = "required";
} else {
	$required = "";
}?>
                <input type="file" class="form-control1" id="upload_file" name="upload_file" style="display:inline;" <?=$required?>>
                <input type="hidden" name="old_file" value="<?=$result[0]['profile_pic']?>" />
                <?php if ($result[0]['profile_pic'] != '') {?>
                		<img src="<?=base_url()?>upload/celebrity_profile/<?=$result[0]['profile_pic']?>" height="50" />
                <?php }?>

                <?php echo form_error('upload_file', '<p class="error_p">', '</p>'); ?> </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Age</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('age', isset($result[0]['age']) ? $result[0]['age'] : '');?>
                <input type="number" class="form-control" id="age" name="age" value="<?=$form_value?>" placeholder="Age">
                <?php echo form_error('age', '<p class="error_p">', '</p>'); ?> </div>
                <label class="col-sm-2 control-label">Trending</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('is_trending', isset($result[0]['is_trending']) ? $result[0]['is_trending'] : '');?>

                <?php if ($form_value == 'Yes') {
	$checkYes = 'checked';
} else {
	$checkYes = '';
}
if ($form_value == 'No') {
	$checkNo = 'checked';
} else {
	$checkNo = '';
}
?>
                <input type="radio" name="is_trending" value="Yes" placeholder="Yes" <?=$checkYes?>> Yes
                <?php if ($this->uri->segment(4) == 'edit') {?>
                <input type="radio" name="is_trending" value="No" placeholder="No" <?=$checkNo?>> No
            <?php } else {?>
                <input type="radio" name="is_trending" value="No" placeholder="No" checked> No
            <?php }?>
                <?php echo form_error('is_trending', '<p class="error_p">', '</p>'); ?> </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Gender</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('gender', isset($result[0]['gender']) ? $result[0]['gender'] : '');?>
                <select class="form-control" id="gender" name="gender" value="<?=$form_value?>" placeholder="Gender">
                	<option value="Male">Male</option>
                	<option value="Female">Female</option>
                	<option value="Other">Other</option>
                </select>
                <?php echo form_error('gender', '<p class="error_p">', '</p>'); ?> </div>
              <label class="col-sm-2 control-label">Charges / Fees</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('charge_fees', isset($result[0]['charge_fees']) ? $result[0]['charge_fees'] : '');?>
                <input type="number" class="form-control" id="charge_fees" name="charge_fees" value="<?=$form_value?>" placeholder="Charges / Fees">
                <?php echo form_error('charge_fees', '<p class="error_p">', '</p>'); ?> </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Twitter Page Link</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('twitter_link', isset($result[0]['twitter_link']) ? $result[0]['twitter_link'] : '');?>
                <input type="text" class="form-control" id="twitter_link" name="twitter_link" value="<?=$form_value?>" placeholder="Twitter Page Link">
                <?php echo form_error('twitter_link', '<p class="error_p">', '</p>'); ?> </div>
                <label class="col-sm-2 control-label">Facebook Page Link</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('fb_link', isset($result[0]['fb_link']) ? $result[0]['fb_link'] : '');?>
                <input type="text" class="form-control" id="fb_link" name="fb_link" value="<?=$form_value?>" placeholder="Facebook Page Link">
                <?php echo form_error('fb_link', '<p class="error_p">', '</p>'); ?> </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Instagram Link</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('insta_link', isset($result[0]['insta_link']) ? $result[0]['insta_link'] : '');?>
                <input type="text" class="form-control" id="insta_link" name="insta_link" value="<?=$form_value?>" placeholder="Instagram Link">
                <?php echo form_error('insta_link', '<p class="error_p">', '</p>'); ?> </div>
                <label class="col-sm-2 control-label">Sample Video Link</label>
              <div class="col-sm-4">
                <?php $form_value = set_value('sample_video_link', isset($result[0]['sample_video_link']) ? $result[0]['sample_video_link'] : '');?>
                <input type="text" class="form-control" id="sample_video_link" name="sample_video_link" value="<?=$form_value?>" placeholder="Sample Video Link">
                <?php echo form_error('sample_video_link', '<p class="error_p">', '</p>'); ?> </div>
            </div>

            <div class="form-group">

              <label class="col-sm-2 control-label">Hashtag</label>

              <div class="col-sm-4">

                <?php $form_value = set_value('hashtag', isset($result[0]['hashtag']) ? $result[0]['hashtag'] : '');?>

                <textarea class="form-control" id="hashtag" name="hashtag" placeholder="Hashtag"><?=$form_value?></textarea>

                <?php echo form_error('hashtag', '<p class="error_p">', '</p>'); ?> </div>

                <label class="col-sm-2 control-label">Experience in Industries</label>

              <div class="col-sm-4">

                <?php $form_value = set_value('experience_in_industry', isset($result[0]['experience_in_industry']) ? $result[0]['experience_in_industry'] : '');?>

                <textarea class="form-control" id="experience_in_industry" name="experience_in_industry" placeholder="Experience in Industries"><?=$form_value?></textarea>

                <?php echo form_error('experience_in_industry', '<p class="error_p">', '</p>'); ?> </div>

            </div>

            <div class="form-group">

              <label class="col-sm-2 control-label">Brief Details</label>

              <div class="col-sm-10">

                <?php $form_value = set_value('brief_details', isset($result[0]['brief_details']) ? $result[0]['brief_details'] : '');?>

                <textarea class="form-control" id="brief_details" name="brief_details" placeholder="Brief Details"><?=$form_value?></textarea>

                <?php echo form_error('brief_details', '<p class="error_p">', '</p>'); ?> </div>

            </div>
            <div class="form-group">

              <label class="col-sm-2 control-label">About Life</label>

              <div class="col-sm-10">

                <?php $form_value = set_value('about_life', isset($result[0]['about_life']) ? $result[0]['about_life'] : '');?>

                <textarea class="form-control" id="about_life" name="about_life" placeholder="About Life"><?=$form_value?></textarea>

                <?php echo form_error('about_life', '<p class="error_p">', '</p>'); ?> </div>

            </div>

            <div class="form-group">

              <label class="col-sm-2 control-label">Successful Events</label>

              <div class="col-sm-10">

                <?php $form_value = set_value('successfull_events', isset($result[0]['successfull_events']) ? $result[0]['successfull_events'] : '');?>

                <textarea class="form-control" id="successfull_events" name="successfull_events" placeholder="Successful Events"><?=$form_value?></textarea>

                <?php echo form_error('successfull_events', '<p class="error_p">', '</p>'); ?> </div>

            </div>
            <div class="form-group">

              <label class="col-sm-2 control-label">Nature and Character</label>

              <div class="col-sm-10">

                <?php $form_value = set_value('nature_character', isset($result[0]['nature_character']) ? $result[0]['nature_character'] : '');?>

                <textarea class="form-control" id="nature_character" name="nature_character" placeholder="Nature and Character"><?=$form_value?></textarea>

                <?php echo form_error('nature_character', '<p class="error_p">', '</p>'); ?> </div>

            </div>
            <div class="form-group">

              <label class="col-sm-2 control-label">Little family background</label>

              <div class="col-sm-10">

                <?php $form_value = set_value('brief_family_bg', isset($result[0]['brief_family_bg']) ? $result[0]['brief_family_bg'] : '');?>

                <textarea class="form-control" id="brief_family_bg" name="brief_family_bg" placeholder="Little Family Background"><?=$form_value?></textarea>

                <?php echo form_error('brief_family_bg', '<p class="error_p">', '</p>'); ?> </div>

            </div>

            <div class="form-group">

              <label class="col-sm-2 control-label">About Career</label>

              <div class="col-sm-10">

                <?php $form_value = set_value('about_career', isset($result[0]['about_career']) ? $result[0]['about_career'] : '');?>

                <textarea class="form-control" id="about_career" name="about_career" placeholder="About Career"><?=$form_value?></textarea>

                <?php echo form_error('about_career', '<p class="error_p">', '</p>'); ?> </div>

            </div>

            <div class="form-group">
              	<div class="col-sm-offset-2 col-sm-10">
	                <button type="submit" class="btn btn-primary" id="celeb_add">Submit</button>
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
.error_m {
  padding-top: 10px;
  color: red;
  font-weight: 600;
}
.error_e {
  padding-top: 10px;
  color: red;
  font-weight: 600;
}
.error_p {
  padding-top: 10px;
  color: red;
  font-weight: 600;
}
div#ui-datepicker-div {
	top: 248px !important;
}
	body .chosen-container-multi .chosen-choices li.search-choice, body .chosen-container .chosen-results li.highlighted {
     background-color: yellow !important;
     color: black !important;

}

</style>
<link href="<?=base_url('assets/panel/')?>css/jquery-ui.css" rel="Stylesheet"
        type="text/css" />
    <script type="text/javascript" src="<?=base_url('assets/panel/')?>js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/panel/')?>js/jquery-ui.js"></script>
 <script src="<?=base_url('assets/panel/')?>/choosen/chosen.jquery.js" type="text/javascript"></script>

 	<script language="javascript">
    $(document).ready(function () {
        $("#birth_date").datepicker({
            // minDate: 0,
            dateFormat: 'yy-mm-dd',
        });

        


      $(document).on('keyup', '#mobileno', function(e) { 
        if (/\D/g.test(this.value))
        {
          this.value = this.value.replace(/\D/g, '');
        }
        e.preventDefault();  
        var mobileNo = $(this).val();       
        var mobileLength = $(this).val().length;        
          if(parseInt(mobileLength)==10) {  
            var url = '<?=file_path('admin/celebrity_list/checkMobileNumberExist')?>'+mobileNo;
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'html',
                success: function (res) { 
                   
                    if(res==false) {                        
                        $('.error_m').html('Mobile Number Already Exists');
                        $('#celeb_add').prop('disabled',true); 
                    }else {
                        $('.error_m').html('');
                        $('#celeb_add').prop('disabled',false); 
                    }
                }
            });
        } else {
          $('.error_m').html('Enter 10 Digit Mobile Number');
          $('#celeb_add').prop('disabled',true); 
        }
      });

      $(document).on('focusout', '#emailid', function(e) { 
        e.preventDefault();  
        var emailid = $(this).val();
        var emailValidation = validateEmail(emailid);
        if(emailValidation == true) {
            var url = '<?=file_path('admin/celebrity_list/checkEmailIdExist')?>';
            $.ajax({
                type: "POST",
                url: url,
                data:{emailid:emailid},
                dataType: 'html',
                success: function (res) { 
                    if(res==1) {                        
                        $('.error_e').html('Email Id Already Exists');
                        $('#celeb_add').prop('disabled',true); 
                    }else if(res==2) {
                      $('.error_e').html('');
                      $('#celeb_add').prop('disabled',false); 
                    }else if(res == 0) {
                      $('.error_e').html('Email Id Required');
                      $('#celeb_add').prop('disabled',true);
                    }

                }
            });
          } else {
            $('.error_e').html('Email Id Not Valid');
            $('#celeb_add').prop('disabled',true);
          }
      });

    });

function validateEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
  var test = regex.test(email);
  return test;
}
</script>
<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"100%"},
	  '.chosen-select2'           : {},
      '.chosen-select2-deselect'  : {allow_single_deselect:true},
      '.chosen-select2-no-single' : {disable_search_threshold:10},
      '.chosen-select2-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select2-width'     : {width:"100%"}


    }

    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }



</script>
