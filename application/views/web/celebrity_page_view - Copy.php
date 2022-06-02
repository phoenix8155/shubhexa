<style type="text/css">
	.header-style-1 .header-nav .nav > li > a {
	    /* color: #fff; */
	    color: #000 !important;
	}
	.sf-provi-bio-left {
	    position: sticky;
	    height: 500px;
	    top: 100px;
	}
	.carousel-control .template-left-arrow {
	    width: 19px;
	    height: 19px;
	    margin-top: -15px;
	    border-radius: 17px;
	    margin-left: -15px;
	    font-size: 14px;
	    box-shadow: 0 2px 4px 0 hsl(0deg 0% 0% / 10%), 0 2px 4px 0 hsl(0deg 0% 0% / 30%);
	    padding: 2px 0;
	    position: absolute;
	    color: grey;
	    top: 50%;
	    background: #fef5f5;
	    display: inline-block;
	    transform: rotate(0);
	    left: 2%;
	}
	.bg-rightarrow {
	    width: 50px;
	    height: 50px;
	    transform: none!important;
	    object-fit: none!important;
	    object-position: -197px -288px;
	}
	.carousel-control .template-right-arrow {
	    width: 19px;
	    height: 19px;
	    margin-top: -15px;
	    border-radius: 17px;
	    margin-left: -15px;
	    font-size: 14px;
	    left: 100%;
	    box-shadow: 0 2px 4px 0 hsl(0deg 0% 0% / 10%), 0 2px 4px 0 hsl(0deg 0% 0% / 30%);
	    padding: 2px 0;
	    position: absolute;
	    color: grey;
	    top: 50%;
	    background: #fef5f5;
	    display: inline-block;
	    transform: rotate(180deg);
	}
	.bg-leftarrow {
	    width: 50px;
	    height: 50px;
	    object-fit: none;
	    object-position: -237px -289px;
	}
	.choose-one {
	    text-align: left;
	    font-family: SourceSansPro-Regular;
	    font-size: 17px;
	    font-weight: 400;
	    font-stretch: normal;
	    font-style: normal;
	    line-height: normal;
	    letter-spacing: normal;
	    color: #526a92;
	    line-height: 21px;
	    cursor: pointer;
	}
	.showThisContent:hover .choose-one, .showThisContent:hover~.choose-one {
	    /*color: #fff;
	    background-color: #de0e0e;*/
	    color: #000;
    	background-color: #fab601;
	    padding: 3px 10px;
	    border-radius: 24px;

	}
	.end-part {
	   /* position: absolute;*/
	    bottom: 2%;
	    right: 0;
	    left: 17px;
	    cursor: pointer;
	    padding-top: 4px;
	}
	#celebrity-form hr {
	    border-top: 1px solid grey;
	    margin-bottom: 0;
	    margin-left: 40px;
	}
	.choose-line {
	    margin-left: 0!important;
	    margin-top: 3px!important;
	    margin-bottom: 10px!important;
	}
	.result, .temp1 {
	    height: 255px;
	    margin: 0 0 10px;
	    font-family: SourceSansPro-Regular;
	    font-size: 14.7px;
	    font-weight: 400;
	    font-stretch: normal;
	    font-style: normal;
	    /*line-height: normal;*/
	    line-height: 1.8;
	    letter-spacing: normal;
	    color: #212121;
	}
	.booking-accordion .card .card-body.showThisContent {
	    width: 100%;
	    position: relative;
	    border: 1px solid rgba(0,0,0,.125)!important;
	    border-radius: 14px;
	    box-shadow: 0 -8px 22px 0 rgb(0 0 0 / 10%)!important;
	    background-color: #fff!important;
	    margin: 0;
	}
	.card .card-body {
	    font-size: 16px;
	    font-family: 'SourceSansPro-Regular';
	    text-align: justify;
	    line-height: normal;
	    border: 1px solid #303030;
	    margin: 0px 20px;
	    color: #ffffffa8;
	    box-shadow: 0px 0px 27px 2px #8888881c;
	    background: #000;
	}
	#myselftext_error{
		color: red;
	}
	#to_name_error{
		color: red;
	}
	#from_name_error{
		color: red;
	}
	#message_help_error{
		color: red;
	}
	#occasion_type_error{
		color: red;
	}
	#delivery_date_error{
		color: red;
	}
	#your_gst_name_id{
		display: none;
	}
	#gst_number_id{
		display: none;
	}
	#your_gst_state_id{
		display: none;
	}

	#your_email_error{
		color: red;
	}
	#your_number_error{
		color: red;
	}
	#your_gst_name_error{
		color: red;
	}
	#your_gst_number_error{
		color: red;
	}
	#your_gst_state_error{
		color: red;
	}

</style>
<div class="page-content">
	<div class="container">
        <div class="sf-provi-bio-box cleafix margin-b-50 sf-provi-fullBox padding-top-celebrity-section">
            <div class="sf-provi-bio-left">
                <div class="sf-provi-bio-info">
                    <div class="sf-provi-pic"><img src="<?=upload_path()?>celebrity_profile/<?=$resCelebirty[0]['profile_pic']?>" alt=""></div>
                    <div class="sf-provi-gallery">
                    	<span><h3 class="sf-provi-title"><?=$resCelebirty[0]['fname']?> <?=$resCelebirty[0]['lname']?></h3></span>
                    </div>
                    <!-- <div class="sf-ow-pro-rating">
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star text-gray"></span>
                    </div> -->
                </div>
            </div>
            <div class="sf-provi-bio-right">
                <h3 class="sf-provi-title"><?=$resCelebirty[0]['fname']?> <?=$resCelebirty[0]['lname']?></h3>
                <div class="sf-provi-cat"><strong>Known For :</strong> <?=$resCelebirty[0]['known_for']?></div>

                <div class="sf-provi-cat"><strong>Language Speaks :</strong> <?php $res = json_decode($resCelebirty[0]['language_known'], true);
for ($i = 0; $i < count($res); $i++) {

	if (end($res) == $res[$i]) {
		echo $res[$i] . '';
	} else {
		echo $res[$i] . ', ';
	}

}
?></div>
<div class="sf-provi-cat"><strong>Hashtag :</strong> <?=$resCelebirty[0]['hashtag']?></div>
                <div class="sf-provi-bio-text">
                    <p><strong>About Career :</strong> <?=$resCelebirty[0]['about_career']?></p>
                    <form method="post" id="add_cart_from">
                    	<input type="hidden" name="celebrity_id" id="celebrity_id" value="<?=$resCelebirty[0]['id']?>">
                    	<input type="hidden" name="amount" id="amount" value="<?=$resCelebirty[0]['charge_fees']?>">
                    <div class="col-xl-12">
                        <div class="row">
                        	<div class="col-md-12"><hr><h3>Book a Recorded Video With <?=$resCelebirty[0]['fname']?> <?=$resCelebirty[0]['lname']?></h3>
                            	<span>Awesome we are excited to make your moment special, please fill the form and we’ll roll.</span>
                            </div>
                        	<div class="col-md-6 breck-w1400">
                                <div class="form-group">
                                    <label><h4>This video message for</h4></label>
                                    <div class="aon-inputicon-box">
                                        <div class="radio-inline-box sf-radio-check-row">
                                            <div class="checkbox sf-radio-checkbox sf-radio-check-2 sf-raChe-6">
                                                <input id="any111" class="msg_for_self" name="msg_for" value="my_self" type="radio" checked>
                                                <label for="any111">Myself</label>
                                            </div>
                                            <div class="checkbox sf-radio-checkbox sf-radio-check-2 sf-raChe-6">
                                                <input id="body111" class="msg_for_else" name="msg_for" value="someone_else" type="radio">
                                                <label for="body111">Someone else</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="myself_div">
                                <div class="form-group">
                                    <label>My Name is</label>
                                    <div class="aon-inputicon-box">
                                        <input class="form-control sf-form-control" maxlength="50" name="myselftext" id="myselftext" type="text" placeholder="Name"><span id="myselftext_error"></span>
                                        <i class="aon-input-icon fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="to_name_div">
                                <div class="form-group">
                                    <label>To</label>
                                    <div class="aon-inputicon-box">
                                        <input class="form-control sf-form-control" maxlength="50" id="to_name" name="to_name" type="text" placeholder="To"><span id="to_name_error"></span>
                                        <i class="aon-input-icon fa fa-building-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="from_name_div">
                                <div class="form-group">
                                    <label>From</label>
                                    <div class="aon-inputicon-box">
                                        <input class="form-control sf-form-control" id="from_name" maxlength="50" name="from_name" type="text" placeholder="From Name"><span id="from_name_error"></span>
                                        <i class="aon-input-icon fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>What's the occasion?</label>
                                    <div class="aon-inputicon-box">
                                        <select class="form-control sf-form-control" required id="occasion_type" name="occasion_type">
		                                        <option value="Birthday">Birthday</option>
												<option value="Women's Day">Women's Day</option>
												<option value="Festival">Festival</option>
												<option value="Wedding Anniversary">Wedding Anniversary</option>
												<option value="Wedding">Wedding</option>
												<option value="Get Well Soon">Get Well Soon</option>
												<option value="All The Best">All The Best</option>
												<option value="Romantic">Romantic</option>
												<option value="Motivation">Motivation</option>
												<option value="New Born">New Born</option>
												<option value="Super Fan">Super Fan</option>
												<option value="Customize Your Message">Customize Your Message</option>
                              				</select><span id="occasion_type_error"></span>
                                        <i class="aon-input-icon fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>By when do you need this video?</label>
                                    <div class="aon-inputicon-box">
                                    	<?php $date = date('Y-m-d', strtotime(' +7 day'))?>
                                        <input class="form-control sf-form-control" min="<?=$date?>" id="delivery_date" name="delivery_date" type="date" required><span id="delivery_date_error"></span>
                                        <i class="aon-input-icon fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 breck-w1400" id="template_div">
                            	<div class="form-group">
                                	<label>Message Please select a template. (Not applicable for Brand, Social Work and Corporate messages)</label>

                                    <div id="carouselExampleIndicators" class="carousel slide hero-slide message-carousel web-carousel" data-interval="false">
                                    	<div class="carousel-inner template-inner-box occasion-slider birthday_wish" data-wg-notranslate="manual">
                                    		<div class="carousel-item active">
                                    			<div class="row">
                                    				<div class="col-md-4 template-box">
                                    					<div class="card card-body showThisContent" id="first_0">
                                    						<div class="result_0" id="template_my_self_0">Hey there <span class="recipient_name">_recipient_name_</span>, it's me <?=$resCelebirty[0]['fname']?> <?=$resCelebirty[0]['lname']?> here to wish you a very Happy Birthday! May God bless you with tremendous happiness and prosperity throughout life. Continue to be as amazing as you are and enjoy this day to the fullest. Bye!</div>
                                    						<div class="result_1" id="template_for_other_0">Hey there <span class="recipient_name">_recipient_name_</span>, it's me <?=$resCelebirty[0]['fname']?> <?=$resCelebirty[0]['lname']?> here on behalf of <span class="sender_name">_sender_name_</span> to wish you a very Happy Birthday! May God bless you with tremendous happiness and prosperity throughout life. Continue to be as amazing as you are and enjoy this day to the fullest. Bye!</div>
                                    						<hr class="choose-line">
                                    						<div class="end-part" data-id="first_btn_0">
                                    							<span class="choose-one">Choose this one</span>
                                    						</div>
                                    					</div>
                                    				</div>
                            						<div class="col-md-4 template-box">
                            							<div class="card card-body showThisContent" id="first_1">
                            								<div class="result_0" id="template_my_self_1">Hello <span class="recipient_name">_recipient_name_</span>, this is <?=$resCelebirty[0]['fname']?> <?=$resCelebirty[0]['lname']?>. I’m here to wish you the Happiest birthday. I hope that your special day is the beginning of another amazing year of your life. Wishing you all the happiness and love, God bless you, Bye</div>
                            								<div class="result_1" id="template_for_other_1">Hello <span class="recipient_name">_recipient_name_</span>, this is <?=$resCelebirty[0]['fname']?> <?=$resCelebirty[0]['lname']?>. Happiest birthday on behalf of <span class="sender_name">_sender_name_</span>. I hope that your special day is the beginning of another amazing year of your life. Wishing you all the happiness and love, God bless you, Bye</div>
                            								<hr class="choose-line">
                            								<div class="end-part" data-id="templateContent_first_1">
                            									<span class="choose-one">Choose this one</span>
                            								</div>
                            							</div>
                            						</div>
                            						<div class="col-md-4 template-box">
                            							<div class="card card-body showThisContent" id="first_2">
                            								<div class="result_0" id="template_my_self_2">Namashkar <span class="recipient_name">_recipient_name_</span>, main <?=$resCelebirty[0]['fname']?> <?=$resCelebirty[0]['lname']?> aapko janamdin ki shubh kamnaaye deta/deti hu! Asha karta/karti hu apka har sapna, har khwahish poori ho taaki aapke chehre par aayi hui ye hasee, hamesha yuhi barkaraar rahe!</div>
                            								<div class="result_1" id="template_for_other_2">Hello <span class="recipient_name">_recipient_name_</span>, kese ho yaar Main hu <?=$resCelebirty[0]['fname']?> <?=$resCelebirty[0]['lname']?> aur mujhe <span class="sender_name">_sender_name_</span> ne bataya ke aaj aapka birthday hai, to sabse pehle wishing you a very very Happy Birthday! I wish ke aaj aapki har khwahish poori ho. May God bless you with a lot of happiness and prosperity. Take care & Enjoy!</div>
															<hr class="choose-line">
															<div class="end-part" data-id="templateContent_first_2">
																<span class="choose-one">Choose this one</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="carousel-item">
												<div class="row">
													<div class="col-md-4 template-box">
														<div class="card card-body showThisContent" id="first_3">
															<div class="result_0" id="template_my_self_3">Hey, <span class="recipient_name">_recipient_name_</span> hope you're doing good! Well, aaj apka birthday hai to bass enjoy kijiye, bahoot saara cake khaiye, aur saath mein aisi badhiya yaadein banaiye ke ye birthday aapka sabse best birthday bann jaaye! Have fun with your friends & family. keep smiling.</div>
                            								<div class="result_1" id="template_for_other_3">Kaise hai <span class="recipient_name">_recipient_name_</span>? Aaj aapka janamdin hai, issliye sabse pehle aapko <span class="sender_name">_sender_name_</span> aur meri taraf se janamdin ki dher saari shubh kamnaaye. Aapne zindagi mein jitni bhi khushiyaan baati hai, aaj wo saari khushiyaan dugni hokar aapko mile. Bohot khushi se aur dil se apna janamdin manaiye.</div>
															<hr class="choose-line">
															<div class="end-part" data-id="templateContent_first_3">
																<span class="choose-one">Choose this one</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<a class="template-left carousel-control" href="#carouselExampleIndicators" data-slide="prev"><img src="<?=asset_path('web/')?>images/icons.png" class="template-left-arrow bg-leftarrow" alt="leftarrow"></a>
										<a class="temaplate-right carousel-control" href="#carouselExampleIndicators" data-slide="next"><img src="<?=asset_path('web/')?>images/icons.png" class="template-right-arrow bg-rightarrow" alt="rightarrow"></a>
									</div>
									<span id="message_help_error"></span>
                                </div>
                            </div>
                            <div class="col-md-12" id="message_div" style="display: none;">
                            	<label>Message Please select a template. (Not applicable for Brand, Social Work and Corporate messages)</label>
                            	<label><?=$resCelebirty[0]['fname']?> <?=$resCelebirty[0]['lname']?> will read/write this as script for your requested service, so choose a template and while you edit/write be careful about your names, numbers and dates</label>
                                <div class="form-group">
                                    <!-- <label>Message/Ask your question  Need help ?</label> -->
                                    <div class="aon-inputicon-box">
                                        <!-- <input class="form-control sf-form-control" name="message_help" type="text" placeholder="Message"> -->
                                        <div class="editer-wrap">
                                            <div class="editer-textarea">
                                                <textarea placeholder="Message" class="form-control" id="message_help" name="message_help" rows="4" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <label id="word_count_id"></label>
                                <label class="more_template" style="float: right; font-family: SourceSansPro-Regular;    font-size: 17px; font-weight: 400; font-stretch: normal; font-style: normal;    line-height: normal; letter-spacing: normal; color: #526a93; cursor: pointer; padding-top: 6px;">Change the template</label>
                            </div>
                            <div class="col-md-12"><hr><h4>Contact Information</h4>
                            	<span>This is where your receipt and order updates will be sent</span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Your email</label>
                                    <div class="aon-inputicon-box">
                                        <input class="form-control sf-form-control" maxlength="50" id="your_email" name="your_email" type="text" placeholder="Your email"><span id="your_email_error"></span>
                                        <i class="aon-input-icon fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Your mobile number</label>
                                    <div class="aon-inputicon-box">
                                        <input class="form-control sf-form-control" id="your_number" maxlength="50" name="your_number" type="text" placeholder="Your mobile number"><span id="your_number_error"></span>
                                        <i class="aon-input-icon fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 breck-w1400">
                                <div class="form-group">
                                    <div class="aon-inputicon-box">
                                        <div class="radio-inline-box sf-radio-check-row">
                                            <div class="checkbox sf-radio-checkbox sf-radio-check-2 sf-raChe-6">
                                                <input id="public_permission" class="public_permission" name="public_permission" value="public_permission" type="checkbox">
                                                <label for="public_permission">Don’t make this video public on Shubhexa</label>
                                            </div>
                                            <div class="checkbox sf-radio-checkbox sf-radio-check-2 sf-raChe-6">
                                                <input id="send_on_wa" class="send_on_wa" name="send_on_wa" value="send_on_wa" type="checkbox" checked>
                                                <label for="send_on_wa">Send me updates on WhatsApp</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 breck-w1400">
                                <div class="form-group">
                                    <div class="aon-inputicon-box">
                                        <div class="radio-inline-box sf-radio-check-row">
                                            <div class="checkbox sf-radio-checkbox sf-radio-check-2 sf-raChe-6">
                                                <input id="need_gst" class="need_gst" name="need_gst" value="need_gst" type="checkbox">
                                                <label for="need_gst">Need GST Invoice</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="your_gst_name_id">
                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="aon-inputicon-box">
                                        <input class="form-control sf-form-control" maxlength="50" id="your_gst_name" name="your_gst_name" type="text" placeholder="Name"><span id="your_gst_name_error"></span>
                                        <i class="aon-input-icon fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="gst_number_id">
                                <div class="form-group">
                                    <label>GST number</label>
                                    <div class="aon-inputicon-box">
                                        <input class="form-control sf-form-control" id="your_gst_number" maxlength="50" name="your_gst_number" type="text" placeholder="GST number"><span id="your_gst_number_error"></span>
                                        <i class="aon-input-icon fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="your_gst_state_id">
                                <div class="form-group">
                                    <label>State</label>
                                    <div class="aon-inputicon-box">
                                        <input class="form-control sf-form-control" id="your_gst_state" maxlength="50" name="your_gst_state" type="text" placeholder="Your State"><span id="your_gst_state_error"></span>
                                        <i class="aon-input-icon fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12"><hr></div>
                            <div class="col-md-12">
                            	<div class="form-group biling-detail form-info mt-4 view-billing-box">
                            		<div class="col-sm-12 col-md-12 mb-2 p-0"><h4>Billing Details</h4>
                            			<div class="row bill-list">
                            				<div class="col-12">
                            					<p>Disclaimer :</p>
                            					<p class="accept-term pb-3">The above price is only for personalised video messages and not valid for brand promotions or corporate communication videos.</p>
                            				</div>
                            				<div class="col-md-4 col-sm-6 col-8">
                            					<p class="applied_service">Recorded Video</p>
                            					<!-- <p class="tring-prime-amount-label">Tring prime membership</p>
                            					<p>Coupon code applied</p>
                            					<p class="slice-discount d-none">Slice discount</p>
                            					<p class="referal-discount d-none">Referral instant discount</p> -->
                            				</div>
                            				<div class="col-md-8 col-sm-6 col-4 bill-list-right">
                            					<p class="service_amount"><!-- ₹ --> &#8377; <?=$resCelebirty[0]['charge_fees']?> /-</p>
                            					<!-- <p class="tring-prime-amount tring-prime-amount-label prime-currency-amount">99</p>
                            					<p class="coupon_amount">-75</p>
                            					<p class="slice-discount d-none">0</p>
                            					<p class="referal-discount-amt d-none">0</p> -->
                            				</div>
                            			</div>
                            		</div>
                            	</div>
                            </div>
                        </div>
                    </div>
                    <div class="sf-provi-btn">
                        <button type="submit" class="site-button" id="add_to_cart">
				            Add to cart
                        </button>
                        <span class="site-button" id="book_now">
				            Book now
                        </span>
					</div>
					</form>
                </div>
                <div class="sf-provi-social-row d-flex flex-wrap justify-content-between">
                    <div class="sf-provi-social">
                        <ul class="share-social-bx">
                        </ul>
                    </div>

                    <div class="social-share-icon social-share-icon2">
                      <div class="social-share-cell">
                          <strong>Explore Us On Social Media</strong>
                      </div>
                      <div class="social-share-cell">
                        <ul class="share-buttons">
                          <li><a class="fb-share" href="<?=$resCelebirty[0]['fb_link']?>" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i></a></li>
                          <li><a class="twitter-share" href="<?=$resCelebirty[0]['twitter_link']?>" target="_blank" rel="nofollow"><i class="fa fa-twitter"></i></a></li>
                          <li><a class="instagram-share" href="<?=$resCelebirty[0]['insta_link']?>" target="_blank" rel="nofollow"><i class="fa fa-instagram"></i></a></li>
                          <li><a class="youtube-share" href="<?=$resCelebirty[0]['sample_video_link']?>" target="_blank" rel="nofollow"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div id="aon-provider-coInfo" class="sf-provi-coInfo-box margin-b-50 sf-provi-fullBox">
            <h3 class="sf-provi-title">Cotact Information</h3>
            <div class="sf-divider-line"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row d-flex flex-wrap a-b-none">
                        <div class="col-md-4">
                            <div class="sf-provi-coInfo-box">
                            <h5>Telephone</h5>
                            <div class="sf-provi-coInfo-text">Tel: +00 0000 000 000</div>
                            <div class="sf-provi-coInfo-text">Mob: +00 0000 000 000</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="sf-provi-coInfo-box">
                            <h5>Email</h5>
                            <div class="sf-provi-coInfo-text">shubhexa@gmail.com</div>
                            <div class="sf-provi-coInfo-text">shubhexa@gmail.com</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="sf-provi-coInfo-box">
                            <h5>Web</h5>
                            <div class="sf-provi-coInfo-text">https://pnxschool.com/shubhexa</div>
                            <div class="sf-provi-coInfo-text">https://pnxschool.com/shubhexa</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="sf-provi-laexce-box margin-b-50 sf-provi-fullBox">
                    <div class="sf-custom-tabs sf-custom-new">
                      <ul class="nav nav-tabs nav-table-cell font-20">
                        <li><a data-toggle="tab" href="#tab-111" class="active">About Life </a></li>
                        <li><a data-toggle="tab" href="#tab-222">Brief Details</a></li>
                        <li><a data-toggle="tab" href="#tab-333">Experience</a></li>
                        <li><a data-toggle="tab" href="#tab-444">Successful Events</a></li>
                        <li><a data-toggle="tab" href="#tab-555">Nature and Character</a></li>
                        <li><a data-toggle="tab" href="#tab-666">Family Background</a></li>
                      </ul>
                      <div class="tab-content">
                        <div id="tab-111" class="tab-pane active">
                          <div class="sf-experience-acord" id="experience-acord">
                              <div class="panel sf-panel">
                                <div class="acod-head acc-actives">
                                  <h6 class="acod-title text-uppercase"> <a data-toggle="collapse" href="#experience34" data-parent="#experience-acord"> <span class="exper-author">About Life</span></a></h6>
                                </div>
                                <div id="experience34" class="acod-body">
                                  <div class="acod-content p-tb15"><?=$resCelebirty[0]['about_life']?></div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div id="tab-222" class="tab-pane ">
                          <div class="sf-document-tab">
                            <div class="sf-experience-acord" id="experience-acord">
                              <div class="panel sf-panel">
                                <div class="acod-head acc-actives">
                                  <h6 class="acod-title text-uppercase"> <a data-toggle="collapse" href="#experience34" data-parent="#experience-acord"> <span class="exper-author">Brief Details</span></a></h6>
                                </div>
                                <div id="experience34" class="acod-body">
                                  <div class="acod-content p-tb15"><?=$resCelebirty[0]['brief_details']?></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="tab-333" class="tab-pane ">
                          <div class="sf-experience-acord" id="experience-acord">
                              <div class="panel sf-panel">
                                <div class="acod-head acc-actives">
                                  <h6 class="acod-title text-uppercase"> <a data-toggle="collapse" href="#experience34" data-parent="#experience-acord"> <span class="exper-author">Experience</span></a></h6>
                                </div>
                                <div id="experience34" class="acod-body">
                                  <div class="acod-content p-tb15"><?=$resCelebirty[0]['experience_in_industry']?></div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div id="tab-444" class="tab-pane ">
                          <div class="sf-experience-acord" id="experience-acord">
                              <div class="panel sf-panel">
                                <div class="acod-head acc-actives">
                                  <h6 class="acod-title text-uppercase"> <a data-toggle="collapse" href="#experience34" data-parent="#experience-acord"> <span class="exper-author">Successful Events</span></a></h6>
                                </div>
                                <div id="experience34" class="acod-body">
                                  <div class="acod-content p-tb15"><?=$resCelebirty[0]['successfull_events']?></div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div id="tab-555" class="tab-pane ">
                          <div class="sf-experience-acord" id="experience-acord">
                              <div class="panel sf-panel">
                                <div class="acod-head acc-actives">
                                  <h6 class="acod-title text-uppercase"> <a data-toggle="collapse" href="#experience34" data-parent="#experience-acord"> <span class="exper-author">Nature and Character</span></a></h6>
                                </div>
                                <div id="experience34" class="acod-body">
                                  <div class="acod-content p-tb15"><?=$resCelebirty[0]['nature_character']?></div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div id="tab-666" class="tab-pane ">
                          <div class="sf-experience-acord" id="experience-acord">
                              <div class="panel sf-panel">
                                <div class="acod-head acc-actives">
                                  <h6 class="acod-title text-uppercase"> <a data-toggle="collapse" href="#experience34" data-parent="#experience-acord"> <span class="exper-author">Family Background</span></a></h6>
                                </div>
                                <div id="experience34" class="acod-body">
                                  <div class="acod-content p-tb15"><?=$resCelebirty[0]['brief_family_bg']?></div>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
        <div id="aon-provider-video" class="sf-provi-vido-box margin-b-50 sf-provi-fullBox">
            <h3 class="sf-provi-title">Video</h3>
            <div class="sf-divider-line"></div>
            <div class="owl-carousel aon-video-carousel aon-owl-arrow">
                <!-- COLUMNS 1 -->
                <div class="item">
                    <div class="sf-video-box sf-videoBox-full">

                        <!-- <iframe width="273" height="259" src="https://www.youtube.com/embed/0NV1KdWRHck" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

                    </div>
                </div>
                <!-- COLUMNS 2 -->
                <div class="item">
                    <div class="sf-video-box sf-videoBox-full">
                        <!-- <iframe width="273" height="259" src="https://www.youtube.com/embed/kcW4ABcY3zI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                    </div>
                </div>
                <!-- COLUMNS 3 -->
                <div class="item">
                    <div class="sf-video-box sf-videoBox-full">
                        <!-- <iframe width="273" height="259" src="https://www.youtube.com/embed/ic5O2sxhH9M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                    </div>
                </div>
                <!-- COLUMNS 4 -->
                <div class="item">
                    <div class="sf-video-box sf-videoBox-full">
                        <!-- <iframe width="273" height="259" src="https://www.youtube.com/embed/LTnI7cmpDZI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
