<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->model('Home_model', 'ObjM', true);
		$this->load->model('Member_module', 'Member_module', true);

	}

	public function index() {

		$data['resTestimonial'] = $this->ObjM->getRecentTestimonials();

		$data['resRecentCelebirty'] = $this->ObjM->getRecentCelebrity();

		$data['resCategory'] = $this->ObjM->getCategory();

		//var_dump($data['resCategory']);

		$this->load->view('web/common/top_header_web');

		$this->load->view('web/home_view', $data);

		$this->load->view('web/common/footer_web');

	}

	public function newsDetails($id) {

		$this->load->view('web/common/top_header_web');
		
		if($id == 1){
			$this->load->view('web/blog_detail_one_view');
		}else if($id == 2){
			$this->load->view('web/blog_detail_two_view');
		}else if($id == 3){
			$this->load->view('web/blog_detail_three_view');
		}else if($id == 4){
			$this->load->view('web/blog_detail_four_view');
		}else if($id == 5){
			$this->load->view('web/blog_detail_five_view');
		}else{
			$this->load->view('web/blog_detail_one_view');
		}

		$this->load->view('web/common/footer_web');

	}
	

	public function checkLogin() {

		$result = $this->Member_module->checkWebLogin();

		if (isset($result[0])) {

			$sess_array = array();

			$sess_array['isCustLogIn'] = true;

			$sess_array['loginWithOther'] = false;

			$sess_array['name'] = $result[0]['fname'] . ' ' . $result[0]['lname'];

			$sess_array['usercode'] = $result[0]['usercode'];

			$sess_array['emailid'] = $result[0]['emailid'];

			if ($result[0]['profile_pic'] != "") {
				$sess_array['profile_pic'] = $result[0]['profile_pic'];
			} else {
				$sess_array['profile_pic'] = 'default.png';
			}

			$sess_array['login'] = 'true';

			$sess_array['login_code'] = $this->login_record(true, $result[0]['usercode'], array('emailid' => $result[0]['emailid'], 'password' => $result[0]['password']));
			
			$this->session->set_userdata('user', $sess_array);
			// var_dump($_SESSION['user']);exit;
			// var_dump($sess_array);exit;
			$response = "true";
			echo json_encode($response);exit;

		} else {

			$this->login_record();

			$response = "false";
			echo json_encode($response);exit;

		}

	}

	//**check login**//
	protected function check_login() {

		if ($this->session->userdata('user')) {

			header('Location: ' . file_path() . 'home');

			exit;
		}
	}

	protected function login_record($status = NULL, $usercode = NULL, $arr = NULL) {

		$now = time();

		$data['username'] = (isset($_POST['emailid']) ? $_POST['emailid'] : $arr['emailid']);

		$data['password'] = (isset($_POST['password']) ? $_POST['password'] : $arr['password']);

		$data['timedt'] = date('Y-m-d H:i:s');

		if ($status == true) {

			$data['usercode'] = $usercode;

			$data['status'] = 'Sucess';

			$data['available'] = 'Y';

			$data['last_event'] = time();

			$data['logintime'] = time();

			$data['available'] = 'Y';

		} else {

			$data['status'] = 'Failed';

			$data['available'] = 'N';

		}

		$data['ip'] = $_SERVER['REMOTE_ADDR'];

		$data['browserdt'] = $_SERVER["HTTP_USER_AGENT"];

		$login_code = $this->comman_fun->addItem($data, 'web_login_info');

		return $login_code;
	}

	function logout() {

		$now = time();

		$data['available'] = 'N';

		$data['logout_time'] = date('Y-m-d H:i:s');

		$this->comman_fun->update($data, 'web_login_info', 'login_code', $this->session->userdata['user']['login_code']);

		$this->session->sess_destroy();

		header('Location: ' . base_url() . '');

		exit;
	}
	public function checkUserAvailable() {

		$emailid = $_POST['emailid'];

		$res = $this->ObjM->getUserDetails($emailid);

		if (count($res) > 0) {
			$response = "false";
			echo json_encode($response);exit;
		} else {
			$response = "true";
			echo json_encode($response);exit;
		}

	}
	public function checkUsersPhoneAvailable() {

		$phone = $_POST['phone'];

		$res = $this->ObjM->getUserDetailsbyPhone($phone);

		if (count($res) > 0) {
			$response = "false";
			echo json_encode($response);exit;
		} else {
			$response = "true";
			echo json_encode($response);exit;
		}

	}
	public function insertUser() {

		//check user is there or not
		$emailid = $_POST['sign_emailid'];

		$res = $this->ObjM->getUserDetails($emailid);

		$resPhone = $this->ObjM->getUserDetailsbyPhone($_POST['phone']);

		if (count($resPhone) > 0) {
			$response = "phone no is already taken.";
			echo json_encode($response);exit;
		} else if (count($res) > 0) {
			$response = "emailid is already taken.";
			echo json_encode($response);exit;
		} else {

			$data = array();

			$data['fname'] = $_POST['first_name'];

			$data['lname'] = $_POST['last_name'];

			$data['mobileno'] = $_POST['phone'];

			$data['password'] = $_POST['sign_password'];

			$data['emailid'] = $_POST['sign_emailid'];

			$data['email_verify'] = "N";

			$data['role_type'] = "3";

			$data['status'] = "Active";

			$data['create_date'] = date('Y-m-d H:i:s');

			$data['update_date'] = date('Y-m-d h:i:s');

			$data['timedt'] = time();

			$member_id = $this->comman_fun->addItem($data, 'membermaster');

			if ($member_id != "") {

				$this->registration_email($member_id);

				// $result = $this->comman_fun->get_table_data('membermaster', array('usercode' => $member_id));

				// $sess_array = array();

				// $sess_array['name'] = $result[0]['fname'] . ' ' . $result[0]['lname'];

				// $sess_array['usercode'] = $result[0]['usercode'];

				// $sess_array['emailid'] = $result[0]['emailid'];

				// $sess_array['login'] = 'true';

				// $sess_array['login_code'] = $this->login_record(true, $result[0]['usercode'], array('emailid' => $result[0]['emailid'], 'password' => $result[0]['password']));

				// $this->session->set_userdata('user', $sess_array);

				$response = "true";

				echo json_encode($response);exit;
			} else {
				$response = "Something went wrong!";
				echo json_encode($response);exit;
			}

		}
	}

	function registration_email($member_id) {
		$member = $this->comman_fun->get_table_data(
			'membermaster',
			array(
				'usercode' => $member_id,
			)
		);
		$verification_code = $this->insert_verification($member_id, $member[0]['emailid']);

		$name = $member[0]['fname'] . ' ' . $member[0]['lname'];

		$toEmail = $member[0]['emailid'];
		$emailData = [
			'name' => $name,
			'verification_code' => $verification_code,
		];

		$msg = $this->load->view('web/email_templates/emailVerification_view', $emailData, true);

		$subject = 'Confirm your email address';
		$email = 'shubhexa@gmail.com';

		$this->load->library('email');
		$config = array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1',
		);

		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from(SHUBHEXAMAIL, 'SHUBHEXA');
		$this->email->to($toEmail);
		$this->email->subject($subject);
		$this->email->message($msg);
		if ($this->email->send()) {
			return true;
		} else {
			return false;
		}
	}

	protected function insert_verification($member_id, $emailid) {

		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);

		$randomNumber = time();

		$v_key = $randomNumber . $randomString;

		$data['usercode'] = $member_id;

		$data['emailid'] = $emailid;

		$data['v_key'] = $v_key;

		$data['send_date'] = date('Y-m-d H:i:s');

		$data['send_ip'] = $_SERVER['REMOTE_ADDR'];

		$data['status'] = 'N';

		$this->comman_fun->addItem($data, 'email_verification');

		return $v_key;
	}

	public function addFavouriteCelebrity() {

		$celeb_id = $_POST['celeb_id'];

		$res = $this->ObjM->checkIsFavouriteOrNot($celeb_id);

		if (count($res) > 0) {
			// remove wishlist
			$this->comman_fun->delete('wishlist_master', array('celebrity_id' => $celeb_id, 'usercode' => $this->session->userdata['user']['usercode']));
			$response = "remove";
			echo json_encode($response);exit;
		} else {
			//add wishlist
			$data = array();

			$data['usercode'] = $this->session->userdata['user']['usercode'];

			$data['celebrity_id'] = $celeb_id;

			$data['status'] = "Active";

			$data['create_date'] = date('Y-m-d H:i:s');

			$data['update_date'] = date('Y-m-d h:i:s');

			$id = $this->comman_fun->addItem($data, 'wishlist_master');
			if (count($id) > 0) {
				$response = "add";

				echo json_encode($response);exit;
			} else {
				$response = "false";

				echo json_encode($response);exit;
			}

		}

	}

	public function addToCart() {

		//var_dump($_POST);exit;

		$celebrity_id = $_POST['celebrity_id'];
		$msg_for = $_POST['msg_for'];
		if ($msg_for == "my_self") {
			$myself = $_POST['myselftext'];
			$to_name = "";
			$from_name = "";
		} else if ($msg_for == "someone_else") {
			$to_name = $_POST['to_name'];
			$from_name = $_POST['from_name'];
			$myself = "";
		} else {
			$myself = "";
			$to_name = "";
			$from_name = "";
		}

		$occasion_type = $_POST['occasion_type'];
		$delivery_date = $_POST['delivery_date'];
		$message_help = $_POST['message_help'];
		$your_email = $_POST['your_email'];
		$your_number = $_POST['your_number'];
		if ($_POST['public_permission'] != "") {
			$public_permission = 'Yes';
		} else {
			$public_permission = 'No';
		}
		if ($_POST['send_on_wa'] != "") {
			$send_on_wa = 'Yes';
		} else {
			$send_on_wa = 'No';
		}
		if ($_POST['need_gst'] != "") {
			$need_gst = 'Yes';
		} else {
			$need_gst = 'No';
		}
		$your_gst_name = $_POST['your_gst_name'];
		$your_gst_number = $_POST['your_gst_number'];
		$your_gst_state = $_POST['your_gst_state'];
		$amount = $_POST['amount'];

		// //check gst number
		// if(!empty($your_gst_number)){
		// 	if (!preg_match("/^([0-9]){2}([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}([0-9]{1})([A-Za-z0-9]){2}?$/", $your_gst_number)) {
		// 		$response = "false";
		// 		echo json_encode($response);exit;
		// 	}
		// }

		//check order with usercode, orderdate and payment status
		$res = $this->ObjM->checkIsCartAvailable();

		if (count($res) > 0) {
			$cart_id = $res[0]['cart_id'];

			$data = array();

			$data['celebrity_id'] = $celebrity_id;
			$data['cart_id'] = $cart_id;
			$data['create_for'] = $msg_for;
			$data['self_name'] = $myself;
			$data['to_name'] = $to_name;
			$data['from_name'] = $from_name;
			$data['occation_type'] = $occasion_type;
			$data['delivery_date'] = date('Y-m-d', strtotime($delivery_date));
			$data['template_message'] = $message_help;
			$data['email_id'] = $your_email;
			$data['phone_number'] = $your_number;
			$data['allow_to_public'] = $public_permission;
			$data['send_to_wa'] = $send_on_wa;
			$data['need_gst'] = $need_gst;
			$data['gst_name'] = $your_gst_name;
			$data['gst_no'] = $your_gst_number;
			$data['gst_state'] = $your_gst_state;
			$data['amount'] = $amount;
			$data['status'] = "Active";
			$data['create_date'] = date('Y-m-d H:i:s');
			$data['update_date'] = date('Y-m-d h:i:s');
			$cart_detail_id = $this->comman_fun->addItem($data, 'cart_details');

			$UpdateUData = array();

			$UpdateUData['total_amount'] = $this->calculateTotalCartAmount($cart_id);

			$UpdateUData['update_date'] = date('Y-m-d h:i:s');

			$this->comman_fun->update($UpdateUData, 'cart_master', array('cart_id' => $cart_id));

			$response = "true";

			echo json_encode($response);exit;

		} else {
			$usercode = $this->session->userdata['user']['usercode'];
			$cartData = array();
			// $cartData['order_no'] = rand(10000000, 99999999);
			$cartData['order_no'] = $this->getOrderNo();
			$cartData['usercode'] = $usercode;
			$cartData['order_date'] = date('Y-m-d H:i:s');
			$cartData['payment_date'] = date('Y-m-d H:i:s');
			$cartData['total_amount'] = "0";
			$cartData['payment_status'] = "pending";
			$cartData['status'] = "Active";
			$cartData['create_date'] = date('Y-m-d H:i:s');
			$cartData['update_date'] = date('Y-m-d h:i:s');
			$cart_id = $this->comman_fun->addItem($cartData, 'cart_master');
			//echo $this->db->last_query();exit;
			if ($cart_id != "") {

				$addData = array();

				$addData['celebrity_id'] = $celebrity_id;
				$addData['cart_id'] = $cart_id;
				$addData['create_for'] = $msg_for;
				$addData['self_name'] = $myself;
				$addData['to_name'] = $to_name;
				$addData['from_name'] = $from_name;
				$addData['occation_type'] = $occasion_type;
				$addData['delivery_date'] = $delivery_date;
				$addData['template_message'] = $message_help;
				$addData['email_id'] = $your_email;
				$addData['phone_number'] = $your_number;
				$addData['allow_to_public'] = $public_permission;
				$addData['send_to_wa'] = $send_on_wa;
				$addData['need_gst'] = $need_gst;
				$addData['gst_name'] = $your_gst_name;
				$addData['gst_no'] = $your_gst_number;
				$addData['gst_state'] = $your_gst_state;
				$addData['amount'] = $amount;
				$addData['status'] = "Active";
				$addData['create_date'] = date('Y-m-d H:i:s');
				$addData['update_date'] = date('Y-m-d h:i:s');
				$cart_detail_id = $this->comman_fun->addItem($addData, 'cart_details');

				$UpdateData = array();

				$UpdateData['total_amount'] = $this->calculateTotalCartAmount($cart_id);

				$UpdateData['update_date'] = date('Y-m-d h:i:s');

				$this->comman_fun->update($UpdateData, 'cart_master', array('cart_id' => $cart_id));
				//echo $this->db->last_query();

				$response = "true";
				echo json_encode($response);exit;
			} else {
				$response = "Something went wrong!";
				echo json_encode($response);exit;
			}
		}
	}

	public function updateToCart() {

		$celebrity_id = $_POST['celebrity_id'];
		$msg_for = $_POST['msg_for'];
		if ($msg_for == "my_self") {
			$myself = $_POST['myselftext'];
			$to_name = "";
			$from_name = "";
		} else if ($msg_for == "someone_else") {
			$to_name = $_POST['to_name'];
			$from_name = $_POST['from_name'];
			$myself = "";
		} else {
			$myself = "";
			$to_name = "";
			$from_name = "";
		}

		$occasion_type = $_POST['occasion_type'];
		$delivery_date = $_POST['delivery_date'];
		$message_help = $_POST['message_help'];
		$your_email = $_POST['your_email'];
		$your_number = $_POST['your_number'];
		if ($_POST['public_permission'] != "") {
			$public_permission = 'Yes';
		} else {
			$public_permission = 'No';
		}
		if ($_POST['send_on_wa'] != "") {
			$send_on_wa = 'Yes';
		} else {
			$send_on_wa = 'No';
		}
		if ($_POST['need_gst'] != "") {
			$need_gst = 'Yes';
		} else {
			$need_gst = 'No';
		}
		$your_gst_name = $_POST['your_gst_name'];
		$your_gst_number = $_POST['your_gst_number'];
		$your_gst_state = $_POST['your_gst_state'];
		$amount = $_POST['amount'];

		$cart_detail_id = $_POST['cart_detail_id'];
		$cart_id = $_POST['cart_id'];			
		$data = array();
		//$data['celebrity_id'] = $celebrity_id;
		//$data['cart_id'] = $cart_id;
		$data['create_for'] = $msg_for;
		$data['self_name'] = $myself;
		$data['to_name'] = $to_name;
		$data['from_name'] = $from_name;
		$data['occation_type'] = $occasion_type;
		$data['delivery_date'] = date('Y-m-d', strtotime($delivery_date));
		$data['template_message'] = $message_help;
		$data['email_id'] = $your_email;
		$data['phone_number'] = $your_number;
		$data['allow_to_public'] = $public_permission;
		$data['send_to_wa'] = $send_on_wa;
		$data['need_gst'] = $need_gst;
		$data['gst_name'] = $your_gst_name;
		$data['gst_no'] = $your_gst_number;
		$data['gst_state'] = $your_gst_state;
		//$data['amount'] = $amount;
		$data['status'] = "Active";
		$data['create_date'] = date('Y-m-d H:i:s');
		$data['update_date'] = date('Y-m-d h:i:s');
		$this->comman_fun->update($data, 'cart_details', array('id' => $cart_detail_id));

		$UpdateUData = array();
		$UpdateUData['update_date'] = date('Y-m-d h:i:s');
		$this->comman_fun->update($UpdateUData, 'cart_master', array('cart_id' => $cart_id));
		$response = "true";
		echo json_encode($response);exit;
	}

	public function calculateTotalCartAmount($cart_id) {

		$res = $this->ObjM->getCartTotAmount($cart_id);
		return $res[0]['tot_cart_amount'];
	}

	public function subscribeNewsLetter() {

		//check user is there or not
		$email_sn = $_POST['email_sn'];

		if ($email_sn != "") {

			$res = $this->ObjM->checkEmailRecord($email_sn);

			if (count($res) > 0) {
				$response = "Already subscribed.";
				//echo json_encode($response);exit;
				echo json_encode(0);exit;
			} else {

				$data = array();

				$data['emailId'] = $email_sn;

				$data['status'] = "Active";

				$data['create_date'] = date('Y-m-d H:i:s');

				$data['update_date'] = date('Y-m-d h:i:s');

				$id = $this->comman_fun->addItem($data, 'newsletter_master');

				if ($id != "") {

					$response = "Successfully subscribed.";
					//echo json_encode($response);exit;
					echo json_encode(1);exit;
				} else {
					$response = "Something went wrong!";
					//echo json_encode($response);exit;
					echo json_encode(2);exit;
				}

			}

		} else {
			$response = "Please enter emailid!";
			echo json_encode($response);exit;
		}

	}

	public function getOrderNo() {

		$cartMaster = $this->ObjM->get_last_value();

		if (empty($cartMaster)) {
			$order_no = str_pad(1, 4, '0', STR_PAD_LEFT);

			return 'Shub' . $order_no;

		} else {
			$removeStText = str_replace('Shub', '', $cartMaster[0]['order_no']);
			$lastOrder = $removeStText;
			$number = $lastOrder + 1;
			$order_no = (str_pad($number, 4, '0', STR_PAD_LEFT));
			return 'Shub' . $order_no;
		}

	}
	public function forgot_password() {

		$this->load->view('web/common/top_header_web');

		$this->load->view('web/forgot_pasword_view', $data);

		$this->load->view('web/common/footer_web');

	}

	function forgotPassword() {

		$emailid = $_POST['email'];

		$data_json = array();

		if ($emailid != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('emailid' => $emailid, 'role_type' => '3', 'status' => 'Active'));

		} else {
			$response = "Please enter your email.";
			echo json_encode(0);exit;
		}

		if (count($resultUser) > 0) {

			$name = $resultUser[0]['fname'] . ' ' . $resultUser[0]['lname'];

			$toEmail = $resultUser[0]['emailid'];

			$body = 'Dear ' . $name . ',<br><br>

				You recently requested to forgot password for your account, your email id : ' . $resultUser[0]['emailid'] . ' and your password : ' . $resultUser[0]['password'] . '<br><br>

				<br> Thank you.';
			// if($resultUser[0]['password']==""){
				// $response = "please check your email for credentials.";
				// echo json_encode(4);exit;
				// exit;
			// }	
			$subject = 'Forgot Password';
			$email = SHUBHEXAMAIL; 
			$this->load->library('email');
			$config = array(
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'priority' => '1',
			);
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$this->email->from($email);
			$this->email->to($toEmail); 
			$this->email->subject($subject);
			$this->email->message($body);		
			if ($this->email->send()) {				
				$response = "please check your email for credentials.";
				echo json_encode(1);exit;
				exit;
			} else {
				$response = "Something went wrong, please try after sometime.";
				echo json_encode(2);exit;
				exit;
			}

		} else {
			$response = "Email id is not registered with us! please check your email id.";
			echo json_encode(3);exit;
			exit;
		}

	}

	function sendMail()
	{
		$message = '';
		$this->load->library('email');
		$config = array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1',
		);
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from(SHUBHEXAMAIL); // change it to yours
		$this->email->to('mauliknai8155@gmail.com');// change it to yours
		$this->email->subject('Resume from JobsBuddy for your Job posting');
		$this->email->message($message);
		if($this->email->send()) {
			echo 'Email sent.';
		} else {
		echo ($this->email->print_debugger());
		}

	}

	public function export_database() {

		$this->load->dbutil();

		$prefs = array(

			'format' => 'zip',
			'filename' => 'shubhexa.sql',
		);

		$backup = &$this->dbutil->backup($prefs);

		$db_name = 'shubhexa-db-' . date("Y-m-d-H-i-s") . '.zip';

		$save = 'database_backup/' . $db_name;

		$this->load->helper('file');

		write_file($save, $backup);

		$this->load->helper('download');

		force_download($db_name, $backup);

	}
}
