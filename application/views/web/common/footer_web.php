<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<footer class="site-footer footer-light" >

    <div class="footer-top-newsletter">
        <div class="container">
            <div class="sf-news-letter">
                <span>Subscribe Our Newsletter</span>
                <form id="newsletterform">
                    <div class="form-group sf-news-l-form">
                        <input type="email" name="email_sn" id="email_sn" class="form-control" placeholder="Enter Your Email">

                        <button type="submit" class="sf-sb-btn">Submit</button>
                    </div>
                    <span id="email_sn_error"></span>
                    <span id="email_sn_success"></span>
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
                            <li><a href="<?=getLinks('Facebook','social')?>" target="_blank">Facebook</a></li>
                            <li><a href="<?=getLinks('Twitter','social')?>" target="_blank">Twitter</a></li>
                            <li><a href="<?=getLinks('Instagram','social')?>" target="_blank">Instagram</a></li>
                            <li><a href="<?=getLinks('Youtube','social')?>" target="_blank">Youtube</a></li>
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
		                                            <a href="<?=file_path()?>forgot-password">Forget Password</a>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-12" style="margin-bottom: 10px;"><span class="error-clss-login" style="color: red;"></span></div>
		                                <div class="col-md-12">
		                                    <button type="submit" class="site-button w-100">Submit <i class="feather-arrow-right"></i> </button>
		                                </div>
		                                <div class="col-md-12">
		                                    <a href="<?=file_path()?>ulogin/google_login" class="site-button w-100 custom-btn-g">Sign With Google <i class="fa fa-google"></i> </a>
		                                </div>
		                                <div class="col-md-12">
		                                    <a href="<?=file_path()?>ulogin/facebook_login" class="site-button w-100 custom-btn-fb">Sign With Facebook <i class="fa fa-facebook"></i> </a>
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
		                                            <input class="form-control sf-form-control" name="phone" id="phone" type="number" min="1000000000" max="9999999999" maxlength="10" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" pattern="[0-9]{10}" placeholder="Phone">
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
<style type="text/css">
	.custom-btn-g{
		margin-top: 15px;
	    background-color: red;
	    color: white;
	    font-weight: 700;
	    text-align: center;
	}
	.custom-btn-fb{
		margin-top: 15px;
	    background-color: blue;
	    color: white;
	    font-weight: 700;
	    text-align: center;
	}
	span#email_sn_error {
	    font-size: 16px;
	    color: red;
	}
	span#email_sn_success {
	    font-size: 16px;
	    color: #00b122;
	}
</style>
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
  $('#forgotpasswordform').submit(function(e) {
  	e.preventDefault();
  	if ($("#email").val() == "") {
  		$("#email" ).focus();
		$("#email_success").text('');
  		$("#email_error").text('Please enter emailid.');
  	}
  	$.ajax({
        type: "POST",
        url: "<?php echo file_path(); ?>home/forgotPassword",
        dataType: 'json',
        data:new FormData(this),
        processData:false,
        contentType:false,
        cache:false,
        async:false,
        success: function(resp) {			
			if(resp == '0') {
				$("#email_error").text('');
				$("#email_error").text('Please enter your email.');
				$("#email_success").text('');
				$("#email").val('');
			} else if(resp == '1') {
				$("#email_error").text('');
				$("#email_success").text('');
				$("#email_success").text('Please check your email for credentials.');
				$("#email").val('');
			} else if(resp == '2') {
				$("#email_error").text('');
				$("#email_error").text('Something went wrong, please try after sometime.');
				$("#email_success").text('');
				$("#email").val('');
			} else if(resp == '3') {
				$("#email_error").text('');
				$("#email_error").text('Email id is not registered with us! please check your email id.');
				$("#email_success").text('');
				$("#email").val('');
			}
        }
    });
  });
});
$(function() {
  $('#newsletterform').submit(function(e) {
  	e.preventDefault();
  	if ($("#email_sn").val() == "") {
  		$( "#email_sn" ).focus();
  		$("#email_sn_error").html('Please enter emailid.');
  		exit;
  	}
  	$.ajax({
        type: "POST",
        url: "<?php echo file_path(); ?>home/subscribeNewsLetter",
        dataType: 'json',
        data:new FormData(this),
        processData:false,
        contentType:false,
        cache:false,
        async:false,
        success: function(resp) {
			if(resp == '0') {
				$("#email_sn_error").html('');
				$("#email_sn_error").html('Already subscribed.');
				$("#email_sn_success").html('');
				$("#email_sn").val('');
			} else if(resp == '1') {
				$("#email_sn_error").html('');
				$("#email_sn_success").html('');
				$("#email_sn_success").html('Successfully subscribed.');
				$("#email_sn").val('');
			} else if(resp == '2') {
				$("#email_sn_error").html('');
				$("#email_sn_error").html('Something went wrong');
				$("#email_sn_success").html('');
				$("#email_sn").val('');
			}
        }
    });
  });
});
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
		    	alert('Email sent to on your register email id. Kindly please check your email.');
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
					if(sign_emailid == '') {
						$('.user-checks').html('');
					} else {
						$('.user-checks').html('This email id is already taken, Please try with another email id');
					}
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

	//for template get based on occasion
	getTemplateOnLoad();
    //end

	//check radio button start
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

	//check radio button end

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
    		$("#occasion_type option:selected").prop("selected", false);
    		$('.recipient_name').html('_recipient_name_');
    		$('#template_list').html('');
    		getTemplateOnLoad();

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
			$("#occasion_type option:selected").prop("selected", false);
    		$('.recipient_name').html('_recipient_name_');
			$('.sender_name').html('_sender_name_');
			$('#template_list').html('');
			getTemplateOnLoad();

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
				    	// alert('added in wishlist.');
				    	$('#'+cid1).addClass('fa-heart');
				    	$('#'+cid1).removeClass('fa-heart-o');
				    	//window.location.href='<?=file_path()?>my_wishlist';

				    }else if(resp=="remove"){
				    	$('#'+cid1).addClass('fa-heart-o');
				    	$('#'+cid1).removeClass('fa-heart');
				    	// alert('removed from wishlist.');
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

    var maxLength = 350;
	$('#message_help').keyup(function() {
	  var textlen = maxLength - $(this).val().length;
	  $('#word_count_id').text('Text Limit: '+textlen);
	});
    //$(".end-parta").click(function(e) {
    $(document).on('click', '.end-part', function(e) {
        e.preventDefault();
        var maxLength = 350;
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
	    		//var word_count= $.trim($('#message_help').val()).split(' ').filter(function(v){return v!==''}).length;
	    		//var word_count= $('#'+cid1).text().length;
	    		//var word_count= $('#message_help').val().length;
	    		var textlen = maxLength - $('#'+cid1).text().length;
	  			$('#word_count_id').text('Text Limit: '+textlen);
	    		//$('#word_count_id').text('Text Limit: '+word_count);
	    	}
		}
		if(checked_value_else==true){
			//text = $('#'+cid2).text().trim();
			text = $('#'+cid1).text().trim();
			if(text!=""){
	    		$('#message_div').css('display','block');
	    		$('#message_help').val(text);
	    		$('#template_div').css('display','none');
	    		//var word_count= $.trim($('#message_help').val()).split(' ').filter(function(v){return v!==''}).length;
	    		// var word_count= $('#message_help').val().length;
	    		// $('#word_count_id').text('Text Limit: '+word_count);
	    		var textlen = maxLength - $('#'+cid1).text().length;
	  			$('#word_count_id').text('Text Limit: '+textlen);
	    	}
		}


    });
    var exRecipinrname = '';
    $('input[name="myselftext"]').blur(function(){

    	var user = $('#myselftext').val();
		var data_id = $('#myselftext').data('id');
		var myMsg = $('#message_help').val();

		if(data_id != ""){
			var replace_with_receipt = data_id;
		}else{
			var replace_with_receipt = '_recipient_name_';
		}
		if(user == ""){
			user = '_recipient_name_';
		}
		var replacewith = '_recipient_name_';
		if(exRecipinrname != '') {
			replacewith = exRecipinrname;
			exRecipinrname = user;
		}else{
			exRecipinrname = user;
		}
		var newMsg = myMsg.replace(replacewith, user);
		$('#message_help').val(newMsg);
		$(".result").each(function() {
	        var text = $(this).text();
	        $(this).text(text.replace('_recipient_name_', user));
	    });
	    $('.message-carousel .result').each(function() {
	        var text = $(this).text();
	        $(this).text(text.replace(replace_with_receipt, user));
	    });
	    $('.message-template').each(function() {
	        var text = $(this).text();
	        $(this).text(text.replace('_recipient_name_', user));
	    });
	    $('.message-carousel .message-template').each(function() {
	        var text = $(this).text();
	        $(this).text(text.replace(replace_with_receipt, user));
	    });
	    $('.message-template').each(function() {
	        var text = $(this).text();
	        $(this).text(text.replace(replace_with_receipt, user));
	    });
	    $('#myselftext').data('id',user);
  		//var myselfVal="";
		// var myselftext=$(this).val();
		// var recipient_name=$('.recipient_name').html();

		// if(myselftext!=""){
		// 	myselfVal=$('#myselftext').val();
		// }else{
		// 	myselfVal="_recipient_name_";
		// }
		// $('.recipient_name').html(myselfVal);
		//$('#template_div').css('display','block');
    	//$('#message_div').css('display','none');
	});

    var exRecipinrname = '';
	$('input[name="to_name"]').blur(function(e){


		var user = $('#to_name').val();
		var data_id = $('#to_name').data('id');
		var myMsg = $('#message_help').val();
		if(data_id != ""){
			var replace_with_receipt = data_id;
		}else{
			var replace_with_receipt = '_recipient_name_';
		}
		if(user == ""){
			user = '_recipient_name_';
		}
		var replacewith = '_recipient_name_';
		if(exRecipinrname != '') {
			replacewith = exRecipinrname;
			exRecipinrname = user;
		}else{
			exRecipinrname = user;
		}
		var newMsg = myMsg.replace(replacewith, user);
		$('#message_help').val(newMsg);
		$(".result").each(function() {
	        var text = $(this).text();
	        $(this).text(text.replace('_recipient_name_', user));
	    });
	    $('.message-carousel .result').each(function() {
	        var text = $(this).text();
	        $(this).text(text.replace(replace_with_receipt, user));
	    });
	    $('.message-template').each(function() {
	        var text = $(this).text();
	        $(this).text(text.replace('_recipient_name_', user));
	    });
	    $('.message-carousel .message-template').each(function() {
	        var text = $(this).text();
	        $(this).text(text.replace(replace_with_receipt, user));
	    });
	    $('.message-template').each(function() {
	        var text = $(this).text();
	        $(this).text(text.replace(replace_with_receipt, user));
	    });
	    $('#to_name').data('id',user);
	});

	var exSenderName = '';
	$('input[name="from_name"]').blur(function(){
		var user1 = $('#from_name').val();
		var data_id = $('#from_name').data('id');
		var myMsg1 = $('#message_help').val();
		if(data_id != ""){
			var replace_with_sender = data_id;
		}else{
			var replace_with_sender = '_sender_name_';
		}
		if(user1 == ""){
			user1 = '_sender_name_';
		}
		var replacewith1 = '_sender_name_';
		if(exSenderName != '') {
			replacewith1 = exSenderName;
			exSenderName = user1;
		}else{
			exSenderName = user1;
		}
		var newMsg1 = myMsg1.replace(replacewith1, user1);
		$('#message_help').val(newMsg1);

	    $(".result").each(function() {
	        var text = $(this).text();
	        $(this).text(text.replace('_sender_name_', user1));
	    });
	    $('.message-carousel .result').each(function() {
	        var text = $(this).text();
	        $(this).text(text.replace(replace_with_sender, user1));
	    });
	    $('.message-template').each(function() {
	        var text = $(this).text();
	        $(this).text(text.replace('_sender_name_', user1));
	    });
	    $('.message-carousel .message-template').each(function() {
	        var text = $(this).text();
	        $(this).text(text.replace(replace_with_sender, user1));
	    });
	    $('.message-template').each(function() {
	        var text = $(this).text();
	        $(this).text(text.replace(replace_with_sender, user1));
	    });
	    $('#from_name').data('id',user1);
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

    $('#occasion_type').change(function(){
    	var option = $('#occasion_type :selected').val();
    	if(option=='Customize_Your_Message'){
    		$('#template_div').css('display','none');
	    	$('#message_div').css('display','block');
	    	$('.hide-custom').css('display','none');
	    	//$("#message_help").prop("readonly", false);
	    	$("#message_help").prop("required", true);
	    	$('#message_help').val('');
	    	var maxLength = 350;
			var textlen = maxLength - $("#message_help").val().length;
			$('#word_count_id').text('Text Limit: '+textlen);

    	}else{

    		$('#message_help').val('');
    		$('#template_div').css('display','block');
	    	$('#message_div').css('display','none');
	    	$('.hide-custom').css('display','block');

    		var checked_value_self = $('.msg_for_self').is(":checked");
			var checked_value_else = $('.msg_for_else').is(":checked");

			if(checked_value_self==true){
				var message_for="self";
			}else{
				var message_for="other";
			}
			var celeb_name = $('#celeb_name').text();

		    $.ajax({
		        type: "post",
		        dataType: 'html',
		        url: '<?php echo file_path() ?>celebrity/getListOfTemplate',
		        data: {occasion_option : option,message_for : message_for,celeb_name:celeb_name},
		        success:function(resp) {
	                $('#template_list').html(resp);
	                if(checked_value_else==true){
		                onOccasionChangeGetRecieptName();
		                onOccasionChangeGetSenderName();
		            }
		            if(checked_value_self==true){
						onOccasionChangeGetRecieptNameSelf();
					}
		        },
		        error:function() {
		            //alert('failed');
		        }
		    });
    	}
	});
	//for category search
	$('#categorysrchform').submit(function(e) {
  		e.preventDefault();
	    var option = $('#categorysrh :selected').val();
		console.log('hi');
		console.log(option);		
		if (option == "") {
			$("#categorysrh_error").text('Please choose category.');
			$("#categorysrh").focus();
			return false;
		}else{
			$("#categorysrh_error").text('');
		}
		let url= '<?php echo file_path() ?>celebrity/list/';
		if (option != undefined && option != null) {
			window.location = url + option;
		}			
  	});
});

function onOccasionChangeGetRecieptNameSelf(){
	var exRecipinrname = '';
	var user = $('#myselftext').val();
	var data_id = $('#myselftext').data('id');
	var myMsg = $('#message_help').val();

	if(data_id != ""){
		var replace_with_receipt = data_id;
	}else{
		var replace_with_receipt = '_recipient_name_';
	}
	if(user == ""){
		user = '_recipient_name_';
	}
	var replacewith = '_recipient_name_';
	if(exRecipinrname != '') {
		replacewith = exRecipinrname;
		exRecipinrname = user;
	}else{
		exRecipinrname = user;
	}
	var newMsg = myMsg.replace(replacewith, user);
	$('#message_help').val(newMsg);
	$(".result").each(function() {
        var text = $(this).text();
        $(this).text(text.replace('_recipient_name_', user));
    });
    $('.message-carousel .result').each(function() {
        var text = $(this).text();
        $(this).text(text.replace(replace_with_receipt, user));
    });
    $('.message-template').each(function() {
        var text = $(this).text();
        $(this).text(text.replace('_recipient_name_', user));
    });
    $('.message-carousel .message-template').each(function() {
        var text = $(this).text();
        $(this).text(text.replace(replace_with_receipt, user));
    });
    $('.message-template').each(function() {
        var text = $(this).text();
        $(this).text(text.replace(replace_with_receipt, user));
    });
    $('#myselftext').data('id',user);
}
function onOccasionChangeGetRecieptName(){

	var exRecipinrname = '';
	var user = $('#to_name').val();
	var data_id = $('#to_name').data('id');
	var myMsg = $('#message_help').val();

	if(data_id != ""){
		var replace_with_receipt = data_id;
	}else{
		var replace_with_receipt = '_recipient_name_';
	}
	if(user == ""){
		user = '_recipient_name_';
	}
	var replacewith = '_recipient_name_';
	if(exRecipinrname != '') {
		replacewith = exRecipinrname;
		exRecipinrname = user;
	}else{
		exRecipinrname = user;
	}
	var newMsg = myMsg.replace(replacewith, user);
	$('#message_help').val(newMsg);
	$(".result").each(function() {
        var text = $(this).text();
        $(this).text(text.replace('_recipient_name_', user));
    });
    $('.message-carousel .result').each(function() {
        var text = $(this).text();
        $(this).text(text.replace(replace_with_receipt, user));
    });
    $('.message-template').each(function() {
        var text = $(this).text();
        $(this).text(text.replace('_recipient_name_', user));
    });
    $('.message-carousel .message-template').each(function() {
        var text = $(this).text();
        $(this).text(text.replace(replace_with_receipt, user));
    });
    $('.message-template').each(function() {
        var text = $(this).text();
        $(this).text(text.replace(replace_with_receipt, user));
    });
    $('#to_name').data('id',user);
}

function onOccasionChangeGetSenderName(){
	var exSenderName = '';
	var user1 = $('#from_name').val();
	var data_id = $('#from_name').data('id');
	var myMsg1 = $('#message_help').val();

	//alert(user1);
	if(data_id != ""){
		var replace_with_sender = data_id;
	}else{
		var replace_with_sender = '_sender_name_';
	}
	if(user1 == ""){
		user1 = '_sender_name_';
	}
	var replacewith1 = '_sender_name_';
	if(exSenderName != '') {
		replacewith1 = exSenderName;
		exSenderName = user1;
	}else{
		exSenderName = user1;
	}
	var newMsg1 = myMsg1.replace(replacewith1, user1);
	$('#message_help').val(newMsg1);

    $(".result").each(function() {
        var text = $(this).text();
        $(this).text(text.replace('_sender_name_', user1));
    });
    $('.message-carousel .result').each(function() {
        var text = $(this).text();
        $(this).text(text.replace(replace_with_sender, user1));
    });
    $('.message-template').each(function() {
        var text = $(this).text();
        $(this).text(text.replace('_sender_name_', user1));
    });
    $('.message-carousel .message-template').each(function() {
        var text = $(this).text();
        $(this).text(text.replace(replace_with_sender, user1));
    });
    $('.message-template').each(function() {
        var text = $(this).text();
        $(this).text(text.replace(replace_with_sender, user1));
    });
    $('#from_name').data('id',user1);
}

function getTemplateOnLoad(){
	//for template get based on occasion
	var option = $('#occasion_type :selected').val();
	var checkedSelf = $('.msg_for_self').is(":checked");
	var checkedOther = $('.msg_for_else').is(":checked");
	var celeb_name = $('#celeb_name').text();

	if(checkedSelf==true){
		var message_for="self";
	}else{
		var message_for="other";
	}
	if(checkedOther==true){
		var self="other";
	}

    $.ajax({
        type: "post",
        dataType: 'html',
        url: '<?php echo file_path() ?>celebrity/getListOfTemplate',
        data: {occasion_option : option,message_for : message_for,celeb_name:celeb_name},
        success:function(resp) {
            $('#template_list').html(resp);
        },
        error:function() {
            //alert('failed');
        }
    });
    //end
}

$(function() {
	$("#your_gst_number").on("focusout", function(e) {
		let gst = $(this).val();
		if(gst != "")
		{
			var reg = /^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([0-9]){1}([a-zA-Z]){1}([0-9]){1}?$/;
			if (!reg.test(gst)) {
				$("#your_gst_number_error").text('Please enter your GST number proper.');				
			}else{
				$("#your_gst_number_error").text('');	
			} 
		}
	});
  //$('#add_to_cart').click(function(e) {
  $('#add_cart_from').submit(function(e) {
  	e.preventDefault();

  	<?php if (!isset($this->session->userdata['user'])) {?>
		$('#login-signup-model').modal('show');
	<?php } else {?>

  	var checked_value_self = $('.msg_for_self').is(":checked");
	var checked_value_else = $('.msg_for_else').is(":checked");

	if(checked_value_self==true){
		if ($("#myselftext").val() == "") {
	  		//$("#myselftext").focus();
	  		$("#myselftext_error").html('This field is required');
	  		exit;
	  	}else{
	  		$("#myselftext_error").html('');
	  	}
	}

	if(checked_value_else==true){
		if ($("#to_name").val() == "") {
	  		//$("#to_name").focus();
	  		$("#to_name_error").html('Please enter name');
	  		exit;
	  	}else{
	  		$("#to_name_error").html('');
	  	}
	  	if ($("#from_name").val() == "") {
	  		//$("#from_name").focus();
	  		$("#from_name_error").html('Please enter from name');
	  		exit;
	  	}else{
	  		$("#from_name_error").html('');
	  	}
	}

	if ($("#message_help").val() == "") {
		$("#message_help_error").html('Please choose template.');
  		exit;
  	}else{
  		$("#message_help_error").html('');
  	}

  	if ($("#occasion_type").val() == "") {
  		//$("#occasion_type").focus();
  		$("#occasion_type_error").html('Please choose occasion.');
  		exit;
  	}else{
  		$("#occasion_type_error").html('');
  	}
  	if ($("#delivery_date").val() == "") {
  		//$("#delivery_date").focus();
  		$("#delivery_date_error").html('Please choose delivery date.');
  		exit;
  	}else{
  		$("#delivery_date_error").html('');
  	}

  	if ($("#your_email").val() == "") {
  		//$("#your_email").focus();
  		$("#your_email_error").html('Please enter email.');
  		exit;
  	}else{
  		$("#your_email_error").html('');
  	}

  	if ($("#your_number").val() == "") {
  		//$("#your_number").focus();
  		$("#your_number_error").html('Please enter your number.');
  		exit;
  	}else{
  		$("#your_number_error").html('');
  	}

  	var checked_value_need_gst = $('.need_gst').is(":checked");
    if(checked_value_need_gst==true){
    	if ($("#your_gst_name").val() == "") {
	  		//$("#your_gst_name").focus();
	  		$("#your_gst_name_error").html('Please enter name.');
	  		exit;
	  	}else{
	  		$("#your_gst_name_error").html('');
	  	}
	  	if ($("#your_gst_number").val() == "") {
			
	  		//$("#your_gst_number").focus();
	  		$("#your_gst_number_error").html('Please enter GST No.');
	  		exit;
	  	}else{			
	  		$("#your_gst_number_error").html('');
	  	}		
	  	if ($("#your_gst_state").val() == "") {
	  		//$("#your_gst_state").focus();
	  		$("#your_gst_state_error").html('Please enter state.');
	  		exit;
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
		    if(resp==="true"){
		    	//alert('added into cart');
		    	window.location = "<?php echo file_path() ?>cart/view";
		    	//window.location.reload();
		    }else if(resp==="false"){
				$("#your_gst_number_error").text('Please enter your GST number proper.');
			}else{
		    	alert('Something went wrong.!');
		    }
        }
    });
  <?php }?>
  });

});

$(document).on('click', '#book_now', function (e) {

	//var ff = $('input[name="msg_for"]').val();
	//alert(ff);

	<?php if (!isset($this->session->userdata['user'])) {?>
		$('#login-signup-model').modal('show');
	<?php } else {?>

    e.preventDefault();
    var checked_value_self = $('.msg_for_self').is(":checked");
	var checked_value_else = $('.msg_for_else').is(":checked");

	if(checked_value_self==true){
		if ($("#myselftext").val() == "") {
	  		$("#myselftext").focus();
	  		$("#myselftext_error").html('This field is required');
	  		exit;
	  	}else{
	  		$("#myselftext_error").html('');
	  	}
	}

	if(checked_value_else==true){
		if ($("#to_name").val() == "") {
	  		$("#to_name").focus();
	  		$("#to_name_error").html('Please enter name');
	  		exit;
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
  		exit;
  	}else{
  		$("#message_help_error").html('');
  	}

  	if ($("#occasion_type").val() == "") {
  		$("#occasion_type").focus();
  		$("#occasion_type_error").html('Please choose occasion.');
  		exit;
  	}else{
  		$("#occasion_type_error").html('');
  	}
  	if ($("#delivery_date").val() == "") {
  		$("#delivery_date").focus();
  		$("#delivery_date_error").html('Please choose delivery date.');
  		exit;
  	}else{
  		$("#delivery_date_error").html('');
  	}

  	if ($("#your_email").val() == "") {
  		$("#your_email").focus();
  		$("#your_email_error").html('Please enter email.');
  		exit;
  	}else{
  		$("#your_email_error").html('');
  	}

  	if ($("#your_number").val() == "") {
  		$("#your_number").focus();
  		$("#your_number_error").html('Please enter your number.');
  		exit;
  	}else{
  		$("#your_number_error").html('');
  	}

  	var checked_value_need_gst = $('.need_gst').is(":checked");
    if(checked_value_need_gst==true){
    	if ($("#your_gst_name").val() == "") {
	  		//$("#your_gst_name").focus();
	  		$("#your_gst_name_error").html('Please enter name.');
	  		exit;
	  	}else{
	  		$("#your_gst_name_error").html('');
	  	}
	  	if ($("#your_gst_number").val() == "") {
	  		//$("#your_gst_number").focus();
	  		$("#your_gst_number_error").html('Please enter GST No.');
	  		exit;
	  	}else{
	  		$("#your_gst_number_error").html('');
	  	}
	  	if ($("#your_gst_state").val() == "") {
	  		//$("#your_gst_state").focus();
	  		$("#your_gst_state_error").html('Please enter state.');
	  		exit;
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
		    	window.location = "<?php echo file_path() ?>booking_summary/view";
		    }else{
		    	alert('Something went wrong.!');
		    }
        },
        error:function() {
            //alert('failed');
        }
    });

<?php }?>
});
</script>

</body>

</html>
