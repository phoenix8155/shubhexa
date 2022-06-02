<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- FOOTER START -->
<footer class="site-footer footer-light" >

    <!-- FOOTER NEWSLETTER START -->
    <div class="footer-top-newsletter">
        <div class="container">
            <div class="sf-news-letter">
                <span>Subscribe Our Newsletter</span>
                <form>
                    <div class="form-group sf-news-l-form">
                        <input type="text" class="form-control" placeholder="Enter Your Email">
                        <button type="submit" class="sf-sb-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- FOOTER BLOCKES START -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6  m-b30">
                    <div class="sf-site-link sf-widget-link">
                        <h4 class="sf-f-title">Site Links</h4>
                        <ul>
                            <li><a href="<?=file_path()?>about">About Us</a></li>
                            <li><a href="<?=file_path()?>testimonials">Testimonial</a></li>
                            <li><a href="<?=file_path()?>faq">FAQS</a></li>
                            <li><a href="<?=file_path()?>contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6  m-b30">
                    <div class="sf-site-link sf-widget-cities">
                        <h4 class="sf-f-title">Popular Links</h4>
                        <ul>
                            <li><a href="<?=file_path()?>term_and_condition">Terms & Conditions</a></li>
                            <li><a href="<?=file_path()?>privacy_policy">Privacy Policy</a></li>
                            <!-- <li><a href="#">Offers</a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6  m-b30">
                    <div class="sf-site-link sf-widget-categories">
                        <h4 class="sf-f-title">Social Links</h4>
                        <ul>
                            <li><a href="#" target="_blank">Facebook</a></li>
                            <li><a href="#" target="_blank">Twitter</a></li>
                            <li><a href="#" target="_blank">Instagram</a></li>
                            <li><a href="#" target="_blank">Youtube</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6  m-b30">
                    <div class="sf-site-link sf-widget-contact">
                        <h4 class="sf-f-title">Contact Info</h4>
                        <ul>
                            <li>India</li>
                            <li>+91 90999 32018</li>
                            <li>shubhexa@gmail.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="sf-footer-bottom-section">
                <div class="sf-f-logo"><a href="javascript:void(0);"><img src="<?=asset_path('web/')?>images/logo-light.png" alt=""></a></div>
            	<div class="sf-f-copyright">
                	<span>Copyright <?=date('Y')?> | Shubhexa. All Rights Reserved</span>
                </div>
                <div class="sf-f-social">
                    <ul class="socila-box">
                        <li><a href="https://twitter.com/ShubhexaG" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.facebook.com/Shubhexa-Gujarat-107701255161008" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UClrQAGJDWsOO8txUK6sghGA" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="https://www.instagram.com/shubhexa_gujarat/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<button class="scroltop"><span class="fa fa-angle-up  relative" id="btn-vibrate"></span></button>
</div>
<div class="modal fade" id="login-signup-model">
	<div class="modal-dialog">
		<div class="modal-content">
		    <button type="button" class="close aon-login-close" data-dismiss="modal" aria-label="Close">
		        <span aria-hidden="true">×</span>
		    </button>
		    <div class="modal-body">
		        <div class="sf-custom-tabs sf-custom-new aon-logon-sign-area p-3">
		            <ul class="nav nav-tabs nav-table-cell">
		                <li><a data-toggle="tab" href="#Upcoming" id="tb-login" class="active">Login</a></li>
		                <li><a data-toggle="tab" href="#Past" id="tb-signin">Sign up</a></li>
		            </ul>
		            <div class="tab-content">
		                <div id="Upcoming" class="tab-pane active">
		                    <div class="sf-tabs-content">
		                        <form class="aon-login-form" method="post" id="login-form">
		                            <div class="row">
		                                <div class="col-md-12">
		                                    <div class="form-group">
		                                        <div class="aon-inputicon-box">
		                                            <input class="form-control sf-form-control" name="emailid" id="emailid" type="email" placeholder="Email Id" required>
		                                            <i class="aon-input-icon fa fa-user"></i>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-12">
		                                    <div class="form-group">
		                                        <div class="aon-inputicon-box">
		                                            <input class="form-control sf-form-control" name="password" id="password" type="password" placeholder="Password" required>
		                                            <i class="aon-input-icon fa fa-lock"></i>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-12">
		                                    <div class="form-group d-flex aon-login-option justify-content-between">
		                                        <!-- <div class="aon-login-opleft">
		                                             <div class="checkbox sf-radio-checkbox">
		                                                <input id="td2_2" name="abc" value="five" type="checkbox">
		                                                <label for="td2_2">Keep me logged</label>
		                                            </div>
		                                        </div> -->
		                                        <div class="aon-login-opright">
		                                            <a href="#">Forget Password</a>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-12" style="margin-bottom: 10px;"><span class="error-clss-login" style="color: red;"></span></div>
		                                <div class="col-md-12">
		                                    <button type="submit" class="site-button w-100">Submit <i class="feather-arrow-right"></i> </button>
		                                </div>

		                            </div>
		                        </form>
		                    </div>
		                </div>
		                <div id="Past" class="tab-pane">
		                    <div class="sf-tabs-content">
		                        <form id="signin-form" class="aon-login-form" method="post">
		                            <div class="row">
		                                <div class="col-md-6">
		                                    <div class="form-group">
		                                        <div class="aon-inputicon-box">
		                                            <input class="form-control sf-form-control" name="first_name" id="first_name" type="text" placeholder="First Name" required>
		                                            <i class="aon-input-icon fa fa-user"></i>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                    <div class="form-group">
		                                        <div class="aon-inputicon-box">
		                                            <input class="form-control sf-form-control" name="last_name" id="last_name" type="text" placeholder="Last Name" required>
		                                            <i class="aon-input-icon fa fa-user"></i>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-12">
		                                    <div class="form-group">
		                                        <div class="aon-inputicon-box">
		                                            <input class="form-control sf-form-control" name="phone" id="phone" type="number" placeholder="Phone">
		                                            <i class="aon-input-icon fa fa-phone"></i>
		                                        </div>
		                                        <span class="user-checks-phone" style="color:red;"></span>
		                                    </div>
		                                </div>
		                                <div class="col-md-12">
		                                    <div class="form-group">
		                                        <div class="aon-inputicon-box">
		                                            <input class="form-control sf-form-control" name="sign_emailid" id="sign_emailid" type="email" placeholder="Email" required>
		                                            <i class="aon-input-icon fa fa-envelope-o"></i>
		                                        </div>
		                                        <span class="user-checks" style="color:red;"></span>
		                                    </div>
		                                </div>
		                                <div class="col-md-12">
		                                    <div class="form-group">
		                                        <div class="aon-inputicon-box">
		                                            <input class="form-control sf-form-control" name="sign_password" id="sign_password" type="password" placeholder="Password" required>
		                                            <i class="aon-input-icon fa fa-lock"></i>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-12">
		                                    <div class="form-group sign-term-con">
		                                        <div class="checkbox sf-radio-checkbox">
		                                            <input id="td33" class="agree_checkbox" name="abc" value="five" type="checkbox" required>
		                                            <label for="td33">I've read and agree with your <a href="<?=file_path()?>privacy_policy" target="_blank">Privacy Policy</a> and <a href="<?=file_path()?>term_and_condition" target="_blank">Terms & Conditions</a> </label>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-12" style="margin-bottom: 10px;"><span class="error-clss" style="color: red;"></span></div>
		                                <div class="col-md-12">
		                                    <button type="submit" class="site-button w-100">Submit <i class="feather-arrow-right"></i> </button>
		                                </div>
		                            </div>
		                        </form>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
<!-- JAVASCRIPT  FILES ========================================= -->
<script src="<?=asset_path('web/')?>js/jquery-3.6.0.min.js"></script><!-- JQUERY.MIN JS -->
<script src="<?=asset_path('web/')?>js/popper.min.js"></script><!-- POPPER.MIN JS -->
<script src="<?=asset_path('web/')?>js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="<?=asset_path('web/')?>js/bootstrap-select.min.js"></script><!-- BOOTSTRAP SELECT -->
<script src="<?=asset_path('web/')?>js/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
<script src="<?=asset_path('web/')?>js/magnific-popup.min.js"></script><!-- MAGNIFIC-POPUP JS -->
<script src="<?=asset_path('web/')?>js/waypoints.min.js"></script><!-- WAYPOINTS JS -->
<script src="<?=asset_path('web/')?>js/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="<?=asset_path('web/')?>js/waypoints-sticky.min.js"></script><!-- STICKY HEADER -->
<script src="<?=asset_path('web/')?>js/isotope.pkgd.min.js"></script><!-- MASONRY  -->

<script src="<?=asset_path('web/')?>js/owl.carousel.min.js"></script><!-- OWL  SLIDER  -->
<script src="<?=asset_path('web/')?>js/slick.min.js"></script><!-- OWL  SLIDER  -->

<script src="<?=asset_path('web/')?>js/theia-sticky-sidebar.js"></script><!-- STICKY SIDEBAR  -->
<script src="<?=asset_path('web/')?>js/m-custom-scrollbar.min.js"></script><!-- my account left panel scroller -->
<script src="<?=asset_path('web/')?>js/dropzone.js"></script><!-- Images upload -->

<script src="<?=asset_path('web/')?>js/bootstrap4-toggle.min.js"></script>
<script src="<?=asset_path('web/')?>js/jquery.dataTables.min.js"></script>
<script src="<?=asset_path('web/')?>js/dataTables.bootstrap4.min.js"></script>

<script src="<?=asset_path('web/')?>js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script src="<?=asset_path('web/')?>js/lc_lightbox.lite.js" ></script><!-- IMAGE POPUP -->
<script src="<?=asset_path('web/')?>js/bootstrap-slider.min.js"></script><!-- Form js -->
<script>
$(function() {
  $('#login-form').submit(function(e) {
  	e.preventDefault();

  	if ($("#emailid").val() == "") {
  		$( "#emailid" ).focus();
  	}

  	if ($("#password").val()== "") {
  		$( "#password" ).focus();
  	}

  	$.ajax({
        type: "POST",
        url: "<?php echo file_path(); ?>home/checkLogin",
        dataType: 'json',
        data:new FormData(this),
        processData:false,
        contentType:false,
        cache:false,
        async:false,
        success: function(resp) {

		    if(resp=="true"){
		    	window.location.reload();
		    }else{
		    	alert('invalid email id or password.!');
		    	$('.error-clss-login').html('invalid email id or password.!');
		    }

        }
    });
  });
});
$(function() {
  $('#signin-form').submit(function(e) {
  	e.preventDefault();
  	if ($("#first_name").val() == "") {
  		$( "#first_name" ).focus();
  		alert('First name is mandatory');
  	}

  	if ($("#last_name").val()== "") {
  		alert('Last name is mandatory');
  		$( "#last_name" ).focus();
  	}

  	if ($("#sign_emailid").val()== "") {
  		alert('Email Id is mandatory');
  		$( "#sign_emailid" ).focus();
  	}

  	if ($("#sign_password").val()== "") {
  		alert('Password is mandatory');
  		$( "#sign_password" ).focus();
  	}
  	if ($("#agree_checkbox").val()== "") {
  		alert('Please accept the terms and conditions');
  		$( "#agree_checkbox" ).focus();
  	}


  	$.ajax({
        type: "POST",
        url: "<?php echo file_path(); ?>home/insertUser",
        dataType: 'json',
        data:new FormData(this),
        processData:false,
        contentType:false,
        cache:false,
        async:false,
        success: function(resp) {
		    if(resp=="true"){
		    	window.location.reload();
		    }else{
		    	$('.error-clss').html(resp);
		    }
        }
    });
  });
});
$(document).ready(function(){

	$("#sign_emailid").keyup(function(){
  	var sign_emailid = $("#sign_emailid").val();
    var url = '<?=file_path()?>home/checkUserAvailable';
	  $.ajax({
	        type: "POST",
	        data: { emailid: sign_emailid},
            url: url,
            dataType: 'json',
	        success: function(resp) {
			    if(resp=="false"){
			    	$('.user-checks').html('This email id is already taken.');
			    }else{
			    	$('.user-checks').html('');
			    }
	        }
	    });
	});

	$("#phone").keyup(function(){
	var phone = $("#phone").val();
    var url = '<?=file_path()?>home/checkUsersPhoneAvailable';
	  $.ajax({
	        type: "POST",
	        data: { phone: phone},
            url: url,
            dataType: 'json',
	        success: function(resp) {
			    if(resp=="false"){
			    	$('.user-checks-phone').html('This phone no is already taken.');
			    }else{
			    	$('.user-checks-phone').html('');
			    }
	        }
	    });
	});

	$("#btn-login").click(function(){
	  $('#login-form').find(':input').val('');
	  $("#Upcoming").addClass("active");
	  $("#tb-login").addClass("active");
	  $('#Past').removeClass('active');
	  $('#tb-signin').removeClass('active');

	});
	$("#btn-signin").click(function(){
	  $('#signin-form').find(':input').val('');
	  $("#Past").addClass("active");
	  $("#tb-signin").addClass("active");
	  $('#Upcoming').removeClass('active');
	  $('#tb-login').removeClass('active');

	});


	//check radio button
	var checked_value_self = $('.msg_for_self').is(":checked");
	var checked_value_else = $('.msg_for_else').is(":checked");

	if(checked_value_self==true){
		$('#myself_div').show();
    	$('#to_name_div').hide();
    	$('#from_name_div').hide();

    	// $("#myselftext").attr("required", "true");
    	// $("#to_name").attr("required", "false");
    	// $("#from_name").attr("required", "false");

    	$("#myselftext").prop("required", true);
    	$("#to_name").prop("required", false);
    	$("#from_name").prop("required", false);

    	$('.result_0').css('display','block');
    	$('.result_1').css('display','none');
    	$('.result_0').addClass('selected_temp');
		$('.result_1').removeClass('selected_temp');

	}
	if(checked_value_else==true){
		$('#myself_div').hide();
    	$('#to_name_div').show();
    	$('#from_name_div').show();

    	// $("#to_name").attr("required", "true");
    	// $("#from_name").attr("required", "true");
    	// $("#myselftext").attr("required", "false");

    	$("#to_name").prop("required", true);
    	$("#from_name").prop("required", true);
    	$("#myselftext").prop("required", false);

    	$('.result_0').css('display','none');
    	$('.result_1').css('display','block');
    	$('.result_0').removeClass('selected_temp');
		$('.result_1').addClass('selected_temp');
	}

	$("input[name$='msg_for']").click(function() {

        var radio_val = $(this).val();

        if(radio_val=='my_self'){

        	// $("#to_name").attr("required", "false");
        	// $("#from_name").attr("required", "false");
        	// $("#myselftext").attr("required", "true");

        	$("#to_name").prop("required", false);
        	$("#from_name").prop("required", false);
        	$("#myselftext").prop("required", true);


        	$('#myself_div').show();
        	$('#to_name_div').hide();
        	$('#from_name_div').hide();



        	$('.result_0').css('display','block');
    		$('.result_1').css('display','none');

    		$('#myselftext').val('');
    		$("#to_name").val('');
    		$("#from_name").val('');
    		$('.recipient_name').html('_recipient_name_');

    		var to_nameVal1="";
      		var to_nameVal= $("#to_name").val();
    		if(to_nameVal!=""){
				to_nameVal1=$('#to_name').val();
				$('.recipient_name').html(to_nameVal1);
			    $("#to_name").val('');
			    $("#from_name").val('');

			}else{
				$('.recipient_name').html('_recipient_name_');
			}

			var from_nameVal1="";
      		var from_nameVal= $("#from_name").val();
    		if(from_nameVal!=""){
				from_nameVal1=$('#from_name').val();
				$('.sender_name').html(from_nameVal1);
			    $("#from_name").val('');

			}else{
				$('.sender_name').html('_sender_name_');
			}

			$('#template_div').css('display','block');
    		$('#message_div').css('display','none');
    		$("#myself_error").html('');


        }else{

        	// $("#myselftext").attr("required", "false");
        	// $("#to_name").attr("required", "true");
        	// $("#from_name").attr("required", "true");

        	$("#myselftext").prop("required", false);
        	$("#to_name").prop("required", true);
        	$("#from_name").prop("required", true);


        	$('#myself_div').hide();
        	$('#to_name_div').show();
        	$('#from_name_div').show();


        	$('.result_0').css('display','none');
    		$('.result_1').css('display','block');

    		$("#myselftext").val('');
    		$("#to_name").val('');
			$("#from_name").val('');
    		$('.recipient_name').html('_recipient_name_');
			$('.sender_name').html('_sender_name_');

    		var myselfVal1="";
    		var myselfVal= $("#myselftext").val();
    		if(myselfVal!=""){
				myselfVal1=$('#myselftext').val();
				$('.recipient_name').html(myselfVal1);
			    $('#myselftext').val('');

			}else{
				$('.recipient_name').html('_recipient_name_');
			    $('.sender_name').html('_sender_name_');
			}

			$('#template_div').css('display','block');
    		$('#message_div').css('display','none');

    		$("#to_name_error").html('');
			$("#from_name_error").html('');
        }
    });

    $(".wishlist_option").click(function() {

    	<?php if (!isset($this->session->userdata['user'])) {?>
    		$('#login-signup-model').modal('show');
    	<?php } else {?>

    	var cid= $(this).attr('id');
    	var cid1= $(this).children().attr('id');
    	var celeb_id= $(this).attr('data');
		var url = '<?=file_path()?>home/addFavouriteCelebrity';
		  $.ajax({
		        type: "POST",
		        data: { celeb_id: celeb_id},
	            url: url,
	            dataType: 'json',
		        success: function(resp) {
				    if(resp=="add"){
				    	alert('added in wishlist.');
				    	$('#'+cid1).addClass('fa-heart');
				    	$('#'+cid1).removeClass('fa-heart-o');
				    	//window.location.href='<?=file_path()?>my_wishlist';

				    }else if(resp=="remove"){
				    	$('#'+cid1).addClass('fa-heart-o');
				    	$('#'+cid1).removeClass('fa-heart');
				    	alert('removed from wishlist.');
				    }else{
				    	alert('Something went wrong!');
				    }
				}
		    });
		<?php }?>
    });

    $(".more_template").click(function() {
    	$('#template_div').css('display','block');
    	$('#message_div').css('display','none');

    	$('#message_help').val('');
    });

    $(".end-part").click(function() {

    	var id = $(this).parent('div').attr('id');
    	var data_id= $(this).attr('data-id');
    	var cid1= $("#"+id).children('div:first-child').attr('id');
    	var cid2= $("#"+id).children('div:first-child').next().attr('id');


    	var checked_value_self = $('.msg_for_self').is(":checked");
		var checked_value_else = $('.msg_for_else').is(":checked");
		if(checked_value_self==true){
			text = $('#'+cid1).text().trim();
	        if(text!=""){
	    		$('#message_div').css('display','block');
	    		$('#message_help').val(text);
	    		$('#template_div').css('display','none');
	    		var word_count= $.trim($('#message_help').val()).split(' ').filter(function(v){return v!==''}).length;
	    		$('#word_count_id').text('Total Words : '+word_count);
	    	}
		}
		if(checked_value_else==true){
			text = $('#'+cid2).text().trim();
	        if(text!=""){
	    		$('#message_div').css('display','block');
	    		$('#message_help').val(text);
	    		$('#template_div').css('display','none');
	    		var word_count= $.trim($('#message_help').val()).split(' ').filter(function(v){return v!==''}).length;
	    		$('#word_count_id').text('Total Words : '+word_count);
	    	}
		}


    });

    $('input[name="myselftext"]').blur(function(){

    	var myselfVal="";
		var myselftext=$(this).val();
		var recipient_name=$('.recipient_name').html();

		if(myselftext!=""){
			myselfVal=$('#myselftext').val();
		}else{
			myselfVal="_recipient_name_";
		}
		$('.recipient_name').html(myselfVal);
		$('#template_div').css('display','block');
    	$('#message_div').css('display','none');
	});


	$('input[name="to_name"]').blur(function(){

    	var to_nameVal="";
		var to_name=$(this).val();
		var recipient_name=$('.recipient_name').html();

		if(to_name!=""){
			to_nameVal=$(this).val();
		}else{
			to_nameVal="_recipient_name_";
		}
		$('.recipient_name').html(to_nameVal);
	    $('#template_div').css('display','block');
    	$('#message_div').css('display','none');


	});

	$('input[name="from_name"]').blur(function(){

    	var senderVal="";
		var sender=$(this).val();

		if(sender!=""){
			senderVal=$(this).val();
		}else{
			senderVal="_sender_name_";
		}

		$('.sender_name').html(senderVal);
	    $('#template_div').css('display','block');
    	$('#message_div').css('display','none');

	});

	$("input[name$='need_gst']").click(function() {

        var checkbox_val = $(this).val();
        var checked_value_need_gst = $('.need_gst').is(":checked");
        if(checked_value_need_gst==true){
        	$('#your_gst_name_id').css('display','block');
        	$('#gst_number_id').css('display','block');
    		$('#your_gst_state_id').css('display','block');
        }else{
        	$('#your_gst_name_id').css('display','none');
    		$('#gst_number_id').css('display','none');
    		$('#your_gst_state_id').css('display','none');
        }
    });

});

$(function() {
  //$('#add_to_cart').click(function(e) {
  $('#add_cart_from').submit(function(e) {
  	//alert('hi');
  	e.preventDefault();

  	var checked_value_self = $('.msg_for_self').is(":checked");
	var checked_value_else = $('.msg_for_else').is(":checked");

	if(checked_value_self==true){
		if ($("#myselftext").val() == "") {
	  		//$("#myselftext").focus();
	  		$("#myselftext_error").html('This field is required');
	  	}else{
	  		$("#myselftext_error").html('');
	  	}
	}

	if(checked_value_else==true){
		if ($("#to_name").val() == "") {
	  		//$("#to_name").focus();
	  		$("#to_name_error").html('Please enter name');
	  	}else{
	  		$("#to_name_error").html('');
	  	}
	  	if ($("#from_name").val() == "") {
	  		//$("#from_name").focus();
	  		$("#from_name_error").html('Please enter from name');
	  	}else{
	  		$("#from_name_error").html('');
	  	}
	}

	if ($("#message_help").val() == "") {
  		$("#message_help_error").html('Please choose template.');
  	}else{
  		$("#message_help_error").html('');
  	}

  	if ($("#occasion_type").val() == "") {
  		//$("#occasion_type").focus();
  		$("#occasion_type_error").html('Please choose occasion.');
  	}else{
  		$("#occasion_type_error").html('');
  	}
  	if ($("#delivery_date").val() == "") {
  		//$("#delivery_date").focus();
  		$("#delivery_date_error").html('Please choose delivery date.');
  	}else{
  		$("#delivery_date_error").html('');
  	}

  	if ($("#your_email").val() == "") {
  		//$("#your_email").focus();
  		$("#your_email_error").html('Please enter email.');
  	}else{
  		$("#your_email_error").html('');
  	}

  	if ($("#your_number").val() == "") {
  		//$("#your_number").focus();
  		$("#your_number_error").html('Please enter your number.');
  	}else{
  		$("#your_number_error").html('');
  	}

  	var checked_value_need_gst = $('.need_gst').is(":checked");
    if(checked_value_need_gst==true){
    	if ($("#your_gst_name").val() == "") {
	  		//$("#your_gst_name").focus();
	  		$("#your_gst_name_error").html('Please enter name.');
	  	}else{
	  		$("#your_gst_name_error").html('');
	  	}
	  	if ($("#your_gst_number").val() == "") {
	  		//$("#your_gst_number").focus();
	  		$("#your_gst_number_error").html('Please enter GST No.');
	  	}else{
	  		$("#your_gst_number_error").html('');
	  	}
	  	if ($("#your_gst_state").val() == "") {
	  		//$("#your_gst_state").focus();
	  		$("#your_gst_state_error").html('Please enter state.');
	  	}else{
	  		$("#your_gst_state_error").html('');
	  	}
    }else{
    	$("#your_gst_name_error").html('');
    	$("#your_gst_number_error").html('');
    	$("#your_gst_state_error").html('');
    }

  	$.ajax({
        type: "POST",
        url: "<?php echo file_path(); ?>home/addToCart",
        dataType: 'json',
        data:new FormData(this),
        processData:false,
        contentType:false,
        cache:false,
        async:false,
        success: function(resp) {

		    if(resp=="true"){
		    	alert('added into cart');
		    	window.location.reload();
		    }else{
		    	alert('Something went wrong.!');
		    }

        }
    });
  });
});

$(document).on('click', '#book_now', function (e) {

	//var ff = $('input[name="msg_for"]').val();
	//alert(ff);
    e.preventDefault();
    var checked_value_self = $('.msg_for_self').is(":checked");
	var checked_value_else = $('.msg_for_else').is(":checked");

	if(checked_value_self==true){
		if ($("#myselftext").val() == "") {
	  		$("#myselftext").focus();
	  		$("#myselftext_error").html('This field is required');
	  	}else{
	  		$("#myselftext_error").html('');
	  	}
	}

	if(checked_value_else==true){
		if ($("#to_name").val() == "") {
	  		$("#to_name").focus();
	  		$("#to_name_error").html('Please enter name');
	  	}else{
	  		$("#to_name_error").html('');
	  	}
	  	if ($("#from_name").val() == "") {
	  		$("#from_name").focus();
	  		$("#from_name_error").html('Please enter from name');
	  	}else{
	  		$("#from_name_error").html('');
	  	}
	}

	if ($("#message_help").val() == "") {
  		$("#message_help_error").html('Please choose template.');
  	}else{
  		$("#message_help_error").html('');
  	}

  	if ($("#occasion_type").val() == "") {
  		$("#occasion_type").focus();
  		$("#occasion_type_error").html('Please choose occasion.');
  	}else{
  		$("#occasion_type_error").html('');
  	}
  	if ($("#delivery_date").val() == "") {
  		$("#delivery_date").focus();
  		$("#delivery_date_error").html('Please choose delivery date.');
  	}else{
  		$("#delivery_date_error").html('');
  	}

  	if ($("#your_email").val() == "") {
  		$("#your_email").focus();
  		$("#your_email_error").html('Please enter email.');
  	}else{
  		$("#your_email_error").html('');
  	}

  	if ($("#your_number").val() == "") {
  		$("#your_number").focus();
  		$("#your_number_error").html('Please enter your number.');
  	}else{
  		$("#your_number_error").html('');
  	}

  	var checked_value_need_gst = $('.need_gst').is(":checked");
    if(checked_value_need_gst==true){
    	if ($("#your_gst_name").val() == "") {
	  		//$("#your_gst_name").focus();
	  		$("#your_gst_name_error").html('Please enter name.');
	  	}else{
	  		$("#your_gst_name_error").html('');
	  	}
	  	if ($("#your_gst_number").val() == "") {
	  		//$("#your_gst_number").focus();
	  		$("#your_gst_number_error").html('Please enter GST No.');
	  	}else{
	  		$("#your_gst_number_error").html('');
	  	}
	  	if ($("#your_gst_state").val() == "") {
	  		//$("#your_gst_state").focus();
	  		$("#your_gst_state_error").html('Please enter state.');
	  	}else{
	  		$("#your_gst_state_error").html('');
	  	}
    }else{
    	$("#your_gst_name_error").html('');
    	$("#your_gst_number_error").html('');
    	$("#your_gst_state_error").html('');
    }

    	var celebrity_id=$("#celebrity_id").val();
		var msg_for=$('input[name="msg_for"]').val();
		var myself=$('input[name="myselftext"]').val();
		var to_name=$('input[name="to_name"]').val();
		var from_name=$('input[name="from_name"]').val();
		var occasion_type=$('#occasion_type').val();
		var delivery_date=$('input[name="delivery_date"]').val();
		var message_help=$('#message_help').val();
		var your_email=$('input[name="your_email"]').val();
		var your_number=$('input[name="your_number"]').val();
		var public_permission=$('input[name="public_permission"]').val();
		var send_on_wa=$('input[name="send_on_wa"]').val();
		var need_gst=$('input[name="need_gst"]').val();
		var your_gst_name=$('input[name="your_gst_name"]').val();
		var your_gst_number=$('input[name="your_gst_number"]').val();
		var our_gst_state =$('input[name="your_gst_state"]').val();
		var amount=$('input[name="amount"]').val();

    $.ajax({
        type: "post",
        dataType: 'json',
        url: '<?php echo file_path() ?>home/addToCart',
        data: {celebrity_id : celebrity_id,msg_for : msg_for,myselftext : myself,to_name : to_name,from_name : from_name,occasion_type : occasion_type,delivery_date : delivery_date,message_help : message_help,your_email : your_email,your_number : your_number,public_permission : public_permission,send_on_wa : send_on_wa,need_gst : need_gst,your_gst_name : your_gst_name,your_gst_number : your_gst_number,our_gst_state : our_gst_state,amount : amount},
        success:function(resp) {
            if(resp=="true"){
		    	//window.location('<?php echo file_path() ?>home/payment');
		    	window.location = "<?php echo file_path() ?>home/payment";
		    }else{
		    	alert('Something went wrong.!');
		    }
        },
        error:function() {
            //alert('failed');
        }
    });
});
</script>

</body>

</html>
