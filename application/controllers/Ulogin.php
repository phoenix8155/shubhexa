<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulogin extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('Home_model', 'ObjM', true);
		$this->load->model('Member_module', 'Member_module', true);
		//$this->load->library('google');

	}

	public function google_login() {

		//$this->check_login();

		if ($this->session->userdata('isCustLogIn') == true) {
			redirect(base_url('home'));
		}

		include_once APPPATH . "libraries/google_vendor/autoload.php";

		$google_client = new Google_Client();
		// $google_client->setClientId('795972039102-h4itc76d9n5hns1nkrii7mftv7vcnm90.apps.googleusercontent.com'); //Define your ClientID
		// $google_client->setClientSecret('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'); //Define your Client Secret Key
		//shubhexa gmail account
		//ClientId : 94035372350-soj2raalg651702bf2ef1oftb4fs2asd.apps.googleusercontent.com
		//Secret : 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
		// $google_client->setClientId('94035372350-soj2raalg651702bf2ef1oftb4fs2asd.apps.googleusercontent.com'); //Define your ClientID
		// $google_client->setClientSecret('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'); //Define your Client Secret Key
		$google_client->setClientId('305675268827-fci7f1fl5grij2krmbnjp5bsd580g723.apps.googleusercontent.com'); //Define your ClientID
		// mauliknai8155

		$google_client->setClientSecret('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'); //Define your Client Secret Key
		// mauliknai8155
		//$google_client->setRedirectUri('https://shubhexa.com/ulogin/google_login/');
		$google_client->setRedirectUri('https://phoenixdepo.com/shubhexa/ulogin/google_login/');
		
		$google_client->addScope('email');
		$google_client->addScope('profile');

		if (isset($_GET["code"])) {

			$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

			if (!isset($token["error"])) {
				$google_client->setAccessToken($token['access_token']);
				$this->session->set_userdata('access_token', $token['access_token']);
				$google_service = new Google_Service_Oauth2($google_client);

				$data = $google_service->userinfo->get();

				$current_datetime = date('Y-m-d H:i:s');

				if ($this->ObjM->is_already_register($data['id'])) {
					//echo "111";exit;
					if ($this->ObjM->sign_in_validate_user_status($data['id'])) {
						//echo "222";exit;
						//update data
						$user_data = array(
							'oauth_id' => $data['id'],
							'oauth_provider' => 'Google',
							'fname' => $data['given_name'],
							'lname' => $data['family_name'],
							'emailid' => $data['email'],
							'profile_pic' => $data['picture'],
							'status' => 'Active',
							'update_date' => $current_datetime,
						);
						$this->ObjM->update_google($user_data);
					} else {
						//echo "333";exit;
						// header('Location: ' . file_path() . 'ulogin/msgShow/1');
						// die();
						//update data
						$user_data = array(
							'oauth_id' => $data['id'],
							'oauth_provider' => 'Google',
							'fname' => $data['given_name'],
							'lname' => $data['family_name'],
							'emailid' => $data['email'],
							'profile_pic' => $data['picture'],
							'update_date' => $current_datetime,
						);
						$this->ObjM->update_google($user_data);
					}
				} else {
					if ($this->ObjM->sign_in_validate_user_email($data['email'])) {
						// header('Location: ' . file_path() . 'ulogin/msgShow/2');
						// die();

						$user_data = array(
							'oauth_id' => $data['id'],
							'oauth_provider' => 'Google',
							'fname' => $data['given_name'],
							'lname' => $data['family_name'],
							'emailid' => $data['email'],
							'profile_pic' => $data['picture'],
							'update_date' => $current_datetime,
						);
						$this->ObjM->update_google_email($user_data);
						//echo $this->db->last_query();exit;
						//echo "444";exit;
					} else {
						//echo "555";exit;
						//insert data
						$user_data = array(
							'oauth_provider' => 'Google',
							'oauth_id' => $data['id'],
							'fname' => $data['given_name'],
							'lname' => $data['family_name'],
							'emailid' => $data['email'],
							'profile_pic' => $data['picture'],
							'role_type' => '3',
							'status' => 'Active',
							'email_verify' => 'Y',
							'create_date' => $current_datetime,
							'update_date' => $current_datetime,
							'timedt' => time(),
						);
						$this->ObjM->create($user_data);
						$customer_id = $this->db->insert_id();
					}
				}

				$cust_detail = $this->ObjM->get_by_oauth_id($data['id']);
				// echo $this->db->last_query();
				// var_dump($cust_detail);exit;

				if (!empty($cust_detail)) {
					$usercode = $cust_detail->usercode;
					$email = $cust_detail->emailid;
					$password = $cust_detail->password;
					$name = $cust_detail->fname . ' ' . $cust_detail->lname;
					$profile_pic = $cust_detail->profile_pic;

					$sess_array = array();

					$sess_array['isCustLogIn'] = true;

					$sess_array['loginWithOther'] = true;

					$sess_array['name'] = $name;

					$sess_array['usercode'] = $usercode;

					$sess_array['emailid'] = $email;

					$sess_array['profile_pic'] = $profile_pic;

					$sess_array['login'] = 'true';

					$sess_array['login_code'] = $this->login_record(true, $usercode, array('emailid' => $email, 'password' => $password));

					$this->session->set_userdata('user', $sess_array);

					header('Location: ' . file_path() . 'home');

				} else {
					$this->login_record();
					header('Location: ' . file_path() . 'ulogin/msgShow/3');
				}
			}
		} else {
			redirect($google_client->createAuthUrl());
		}
	}

	public function facebook_login() {

		if ($this->session->userdata('isCustLogIn') == true) {
			redirect(base_url('home'));
		}

		include_once APPPATH . "libraries/vendor/autoload.php";
		// Call Facebook API
		$facebook = new \Facebook\Facebook([
			'app_id' => '3208059266095070',
			'app_secret' => 'a4efb0c8e328bf36414bfa899698061c',
			'default_graph_version' => 'v2.10',
		]);

		// $facebook = new \Facebook\Facebook([
		// 	'app_id' => '421076019829762',
		// 	'app_secret' => '8f3cbfff237e0908baf62b667c800934',
		// 	'default_graph_version' => 'v2.10',
		// ]);
		//shubhexa fb account
		//1097431464527748
		//434f30415cc21aeb06d2ce7f6d923411

		$facebook_helper = $facebook->getRedirectLoginHelper();

		if (isset($_GET["code"])) {
			$token = $facebook_helper->getAccessToken();
			$this->session->set_userdata('access_token', $token);
			$facebook->setDefaultAccessToken($token);
			$graph_response = $facebook->get("/me?fields=name,email", $token);
			$facebook_user_info = $graph_response->getGraphUser();
			//var_dump($facebook_user_info);exit;

			if (!empty($facebook_user_info['id'])) {
				$current_datetime = date('Y-m-d H:i:s');

				if ($this->ObjM->is_already_register($facebook_user_info['id'])) {
					if ($this->ObjM->sign_in_validate_user_status($facebook_user_info['id'])) {
						//update data

						$string = $facebook_user_info['name'];

						$splitter = " ";

						$pieces = explode($splitter, $string);

						$fname = $pieces[0];

						$lname = substr($string, strpos($string, " ") + 1);

						$user_data = array(
							'oauth_id' => $facebook_user_info['id'],
							'oauth_provider' => 'Facebook',
							'fname' => $fname,
							'lname' => $lname,
							'emailid' => $facebook_user_info['email'],
							//'profile_pic' => 'http://graph.facebook.com/' . $facebook_user_info['id'] . '/picture',
							'profile_pic' => 'http://graph.facebook.com/' . $facebook_user_info['id'] . '/picture?width=500&height=500',
							'update_date' => $current_datetime,
						);
						$this->ObjM->update_google($user_data);
					} else {
						$string = $facebook_user_info['name'];

						$splitter = " ";

						$pieces = explode($splitter, $string);

						$fname = $pieces[0];

						$lname = substr($string, strpos($string, " ") + 1);

						$user_data = array(
							'oauth_id' => $facebook_user_info['id'],
							'oauth_provider' => 'Facebook',
							'fname' => $fname,
							'lname' => $lname,
							'emailid' => $facebook_user_info['email'],
							//'profile_pic' => 'http://graph.facebook.com/' . $facebook_user_info['id'] . '/picture',
							'profile_pic' => 'http://graph.facebook.com/' . $facebook_user_info['id'] . '/picture?width=500&height=500',
							'status' => 'Active',
							'update_date' => $current_datetime,
						);
						$this->ObjM->update_google($user_data);
						//header('Location: ' . file_path() . 'ulogin/msgShow/1');
						//die();
					}
				} else {
					if ($this->ObjM->sign_in_validate_user_email($facebook_user_info['email'])) {
						// header('Location: ' . file_path() . 'ulogin/msgShow/2');
						// die();
						$string = $facebook_user_info['name'];

						$splitter = " ";

						$pieces = explode($splitter, $string);

						$fname = $pieces[0];

						$lname = substr($string, strpos($string, " ") + 1);

						$user_data = array(
							'oauth_id' => $facebook_user_info['id'],
							'oauth_provider' => 'Facebook',
							'fname' => $fname,
							'lname' => $lname,
							'emailid' => $facebook_user_info['email'],
							//'profile_pic' => 'http://graph.facebook.com/' . $facebook_user_info['id'] . '/picture',
							'profile_pic' => 'http://graph.facebook.com/' . $facebook_user_info['id'] . '/picture?width=500&height=500',
							'status' => 'Active',
							'update_date' => $current_datetime,
						);
						$this->ObjM->update_google_email($user_data);
					} else {
						//insert data
						$string = $facebook_user_info['name'];

						$splitter = " ";

						$pieces = explode($splitter, $string);

						$fname = $pieces[0];

						$lname = substr($string, strpos($string, " ") + 1);
						$user_data = array(
							'oauth_provider' => 'Facebook',
							'oauth_id' => $facebook_user_info['id'],
							'fname' => $fname,
							'lname' => $lname,
							'emailid' => $facebook_user_info['email'],
							//'profile_pic' => 'http://graph.facebook.com/' . $facebook_user_info['id'] . '/picture',
							'profile_pic' => 'http://graph.facebook.com/' . $facebook_user_info['id'] . '/picture?width=500&height=500',
							'role_type' => '3',
							'status' => 'Active',
							'email_verify' => 'Y',
							'create_date' => $current_datetime,
							'update_date' => $current_datetime,
							'timedt' => time(),
						);

						$this->ObjM->create($user_data);
						$customer_id = $this->db->insert_id();
					}
				}

				$cust_detail = $this->ObjM->get_by_oauth_id($facebook_user_info['id']);

				if (!empty($cust_detail)) {
					$usercode = $cust_detail->usercode;
					$email = $cust_detail->emailid;
					$name = $cust_detail->fname . ' ' . $cust_detail->lname;
					$profile_pic = $cust_detail->profile_pic;

					$sess_array = array();

					$sess_array['isCustLogIn'] = true;

					$sess_array['loginWithOther'] = true;

					$sess_array['name'] = $name;

					$sess_array['usercode'] = $usercode;

					$sess_array['emailid'] = $email;

					$sess_array['profile_pic'] = $profile_pic;

					$sess_array['login'] = 'true';

					$sess_array['login_code'] = $this->login_record(true, $usercode, array('emailid' => $email, 'password' => $password));

					$this->session->set_userdata('user', $sess_array);

					header('Location: ' . file_path() . 'home');

				} else {
					$this->login_record();
					header('Location: ' . file_path() . 'ulogin/msgShow/3');

				}
			} else {
				header('Location: ' . file_path() . 'ulogin/msgShow/3');
			}
		} else {
			$facebook_permissions = ['email'];
			redirect($facebook_helper->getLoginUrl(file_path() . 'ulogin/facebook_login', $facebook_permissions));
		}
	}

	function msgShow($id) {

		$data1 = array();
		if ($id == 1) {
			$data1['msg'] = 'Oops! your account is blocked. Please contact to customer care.';
		} else if ($id == 2) {
			$data1['msg'] = 'Oops! Email is already registered. You should login with other options.';
		} else if ($id == 3) {
			$data1['msg'] = 'Oops! Something is wrong... Please try again.';
		} else {
			$data1['msg'] = '';
		}

		$this->load->view('web/common/top_header_web');

		$this->load->view('web/commonpage_view', $data1);

		$this->load->view('web/common/footer_web');
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
			$data['delivery_date'] = $delivery_date;
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
			$cartData['order_no'] = rand(10000000, 99999999);
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

	public function calculateTotalCartAmount($cart_id) {

		$res = $this->ObjM->getCartTotAmount($cart_id);
		return $res[0]['tot_cart_amount'];
	}
}
