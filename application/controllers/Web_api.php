<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Web_api extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('web_app_module', 'ObjM', true);
		date_default_timezone_set('Asia/Calcutta');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->library('email');
		//$this->load->model('EmailModel');
	}
	protected function getToken() {

		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);

		$randomNumber = time();

		$v_key = $randomNumber . $randomString;

		return $v_key;
	}
	public function login() {

		$emailid = $_REQUEST['emailid'];

		$password = $_REQUEST['password'];

		$firebase_token = $_REQUEST['firebase_token'];

		$device_type = $_REQUEST['device_type']; //'IOS'// 'Android'

		$result = $this->ObjM->login($emailid, $password);

		if (isset($result[0])) {

			if ($result[0]['status'] == 'Active') {

				if ($result[0]['email_verify'] == 'Y') {

					$updateData['firebase_token'] = filter_data($firebase_token);

					$updateData['device_type'] = filter_data($device_type);

					$updateData['accessToken'] = $this->getToken(); //get Token

					$updateData['update_date'] = date('Y-m-d h:i:s');

					$this->comman_fun->update($updateData, 'membermaster', array('usercode' => $result[0]['usercode']));
					$dataRes = $this->comman_fun->get_table_data('membermaster', array('usercode' => $result[0]['usercode']));

					$json_arr = array();

					$json_arr['usercode'] = $dataRes[0]['usercode'];
					$json_arr['first_name'] = $dataRes[0]['fname'];
					$json_arr['last_name'] = $dataRes[0]['lname'];
					$json_arr['emailid'] = $dataRes[0]['emailid'];
					$json_arr['accessToken'] = $dataRes[0]['accessToken'];

					$json_arr['validation'] = true;

					$json_arr['msg'] = "";

					echo json_encode($json_arr);
					exit;
				} else {
					$json_arr['validation'] = false;

					$json_arr['msg'] = "Please verify your emailid";

					echo json_encode($json_arr);
					exit;
				}
			} else {
				$json_arr['validation'] = false;

				$json_arr['msg'] = "Invalid email OR password";

				echo json_encode($json_arr);
				exit;
			}
		} else {

			$res = $this->comman_fun->get_table_data('membermaster', array('emailid' => $emailid, 'status' => 'Active', 'role_type' => '3'));
			if (count($res) > 0) {

				$ltype_array = array('Facebook', 'Google');

				if (in_array($res[0]['oauth_provider'], $ltype_array)) {

					$json_arr['validation'] = false;

					$json_arr['msg'] = "your are signup with " . $res[0]['oauth_provider'];

					echo json_encode($json_arr);

					exit;

				} else {

					$json_arr['validation'] = false;

					$json_arr['msg'] = "Invalid email OR password";

					echo json_encode($json_arr);

					exit;
				}

			} else {

				$json_arr['validation'] = false;

				$json_arr['msg'] = "Invalid email OR password";

				echo json_encode($json_arr);

				exit;
			}

		}
	}

	public function celebs_login() {

		$username = $_REQUEST['username'];

		$password = $_REQUEST['password'];

		$firebase_token = $_REQUEST['firebase_token'];

		$device_type = $_REQUEST['device_type']; //'IOS'// 'Android'

		$result = $this->ObjM->celebs_login($username, $password);

		if (isset($result[0])) {

			if ($result[0]['status'] == 'Active') {

				$updateData['firebase_token'] = filter_data($firebase_token);

				$updateData['device_type'] = filter_data($device_type);

				$updateData['accessToken'] = $this->getToken(); //get Token

				$updateData['update_date'] = date('Y-m-d h:i:s');

				$this->comman_fun->update($updateData, 'membermaster', array('usercode' => $result[0]['usercode']));
				$dataRes = $this->comman_fun->get_table_data('membermaster', array('usercode' => $result[0]['usercode']));

				$json_arr = array();

				$json_arr['usercode'] = $dataRes[0]['usercode'];
				$json_arr['first_name'] = $dataRes[0]['fname'];
				$json_arr['last_name'] = $dataRes[0]['lname'];
				$json_arr['username'] = $dataRes[0]['username'];
				$json_arr['accessToken'] = $dataRes[0]['accessToken'];

				$json_arr['validation'] = true;

				$json_arr['msg'] = "";

				echo json_encode($json_arr);
				exit;

			} else {
				$json_arr['validation'] = false;

				$json_arr['msg'] = "Invalid email OR password";

				echo json_encode($json_arr);
				exit;
			}
		} else {

			$json_arr['validation'] = false;

			$json_arr['msg'] = "Invalid username OR password";

			echo json_encode($json_arr);

			exit;

		}
	}

	function signup() {

		$first_name = $_REQUEST['first_name'];

		$last_name = $_REQUEST['last_name'];

		$emailid = $_REQUEST['emailid'];

		$password = $_REQUEST['password'];

		$firebase_token = $_REQUEST['firebase_token'];

		$device_type = $_REQUEST['device_type']; //'IOS'// 'Android'

		$json_arr = array();

		if ($this->check_email($emailid)) {

			$data['fname'] = filter_data($first_name);

			$data['lname'] = filter_data($last_name);

			$data['emailid'] = filter_data($emailid);

			$data['password'] = filter_data($password);

			$data['firebase_token'] = filter_data($firebase_token);

			$data['device_type'] = filter_data($device_type);

			$data['accessToken'] = $this->getToken(); //get Token

			$data['role_type'] = "3";

			$data['status'] = "Active";

			//$data['email_verify'] = "Y";

			$data['create_date'] = date('Y-m-d H:i:s');

			$data['update_date'] = date('Y-m-d h:i:s');

			$data['timedt'] = time();

			$member_id = $this->comman_fun->addItem($data, 'membermaster');

			if ($member_id != "") {

				$this->registration_email($member_id);

				$dataRes = $this->comman_fun->get_table_data('membermaster', array('usercode' => $member_id));

				$datas['usercode'] = $dataRes[0]['usercode'];
				$datas['first_name'] = $dataRes[0]['fname'];
				$datas['last_name'] = $dataRes[0]['lname'];
				$datas['emailid'] = $dataRes[0]['emailid'];
				$datas['accessToken'] = $dataRes[0]['accessToken'];

				$arr[] = $datas;

				$json_arr['data'] = $arr;

				$json_arr['validation'] = true;

				$json_arr['msg'] = "";

				echo json_encode($json_arr);
				exit;
			} else {
				$json_arr['validation'] = false;

				$json_arr['msg'] = "Something went worng.";

				echo json_encode($json_arr);
				exit;
			}

		} else {
			$json_arr['validation'] = false;

			$json_arr['msg'] = "Email id is already existing";

			echo json_encode($json_arr);
			exit;
		}
	}

	function check_email($emailid) {

		$status = $this->comman_fun->check_record('membermaster', array('emailid' => $emailid, 'role_type' => '3', 'status!=' => 'Delete'));

		return ($status) ? false : true;
	}

	function registration_email($member_id) {

		$member = $this->comman_fun->get_table_data('membermaster', array('usercode' => $member_id));

		$verification_code = $this->insert_verification($member_id, $member[0]['emailid']);

		$name = $member[0]['fname'] . ' ' . $member[0]['lname'];

		$toEmail = $member[0]['emailid'];

		$body = 'Dear ' . $name . ',<br><br>

			You have successfully registered an account on Shubhexa. <br><br>

			Email Verification : <a href="' . file_path('email_verification/verify/' . $verification_code) . '">Click Here to Verify your email address</a><br><br>

			<br> Thank you.';

		$subject = 'Registration Successful';
		$email = 'shubhexa@gmail.com';
		// $headers = 'MIME-Version: 1.0' . "\r\n";
		// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// $headers .= 'From:' . $email . '' . "\r\n";
		// mail($toEmail, $subject, $body, $headers);

		$this->load->library('email');
		$config = array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1',
		);
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		$this->email->from($email);

		$this->email->to($toEmail); //shubhexa@gmail.com

		$this->email->subject($subject);

		$this->email->message($body);

		$this->email->send();

		return true;

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

	public function getHome() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		//$accessToken = $_REQUEST['Accesstoken'];

		$data_json = array();

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {
			//get slider images

			$usercode = $resultUser[0]['usercode'];

			$data_json['validation'] = true;

			$data_json['msg'] = "";

			$data_json['slider_imgs'] = $this->getSliderImages();

			$data_json['category_list'] = $this->getRecentCategories();

			$data_json['data'] = $this->getCelebirtyList($usercode);

			//$data_json['popular_celebs'] = $this->getPopularCelebrity();

			//$data_json['recent_added_celebs'] = $this->getRecentlyAddedCelebrity();

			echo json_encode($data_json);

			exit;

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please check your token.";

			echo json_encode($data_json);

			exit;
		}

	}

	function getSliderImages() {

		$result = $this->ObjM->getSlider();

		if (isset($result[0])) {
			$json_arr = array();

			$arr = array();

			for ($i = 0; $i < count($result); $i++) {
				$data = array();

				$data['id'] = $result[$i]['id'];

				$data['slider_title'] = $result[$i]['slider_title'];

				if ($result[$i]['img_name'] != "") {
					$img_file_path = base_url() . "upload/slider/" . $result[$i]['img_name'];
				} else {
					$img_file_path = "-";
				}

				$data['img_name'] = $img_file_path;

				$arr[] = $data;
			}
			return $arr;
			exit;
		} else {
			return [];
			exit;
		}

	}

	function getRecentCategories() {

		$result = $this->ObjM->getCategory();

		if (isset($result[0])) {
			$json_arr = array();

			$arr = array();

			for ($i = 0; $i < count($result); $i++) {
				$data = array();

				$data['category_id'] = $result[$i]['category_id'];

				$data['category_name'] = $result[$i]['category_name'];

				$data['access_name'] = $result[$i]['access_name'];

				if ($result[$i]['img_name'] != "") {
					$img_file_path = base_url() . "upload/category/" . $result[$i]['img_name'];
				} else {
					$img_file_path = "-";
				}

				$data['img_name'] = $img_file_path;

				$arr[] = $data;
			}

			return $arr;
			exit;
		} else {
			return [];
			exit;
		}
	}

	function getPopularCelebrity() {

		$result = $this->ObjM->getPopularCelebrityList();

		if (isset($result[0])) {
			$json_arr = array();

			$arr = array();

			for ($i = 0; $i < count($result); $i++) {

				//$resWishlist = $this->comman_fun->check_record('wishlist_master', array('celebrity_id' => $result[$i]['id'], 'usercode' => $resultUser[0]['usercode']));

				$data = array();

				$data['id'] = $result[$i]['id'];

				$data['fname'] = $result[$i]['fname'];

				$data['lname'] = $result[$i]['lname'];

				//$data['isFavorite'] = $resWishlist;

				$data['charge_fees'] = $result[$i]['charge_fees'];

				if ($result[$i]['profile_pic'] != "") {
					$img_file_path = base_url() . "upload/celebrity_profile/" . $result[$i]['profile_pic'];
				} else {
					$img_file_path = "-";
				}

				$data['profile_pic'] = $img_file_path;

				$arr[] = $data;
			}

			return $arr;
			exit;
		} else {
			return [];
			exit;
		}
	}

	function getRecentlyAddedCelebrity() {

		$result = $this->ObjM->getRecentlyAddedCelebsList();
		//var_dump($result);

		if (isset($result[0])) {
			$json_arr = array();

			$arr = array();

			for ($i = 0; $i < count($result); $i++) {
				$data = array();

				$data['id'] = $result[$i]['id'];

				$data['fname'] = $result[$i]['fname'];

				$data['lname'] = $result[$i]['lname'];

				$data['charge_fees'] = $result[$i]['charge_fees'];

				if ($result[$i]['profile_pic'] != "") {
					$img_file_path = base_url() . "upload/celebrity_profile/" . $result[$i]['profile_pic'];
				} else {
					$img_file_path = "-";
				}

				$data['profile_pic'] = $img_file_path;

				$arr[] = $data;
			}

			return $arr;
			exit;
		} else {
			return [];
			exit;
		}
	}

	function getCelebirtyList($usercode) {

		$result = $this->ObjM->getPopularCelebrityList();

		$json_arr = array();

		$arr = array();

		for ($i = 0; $i < count($result); $i++) {

			$resWishlist = $this->comman_fun->check_record('wishlist_master', array('celebrity_id' => $result[$i]['id'], 'usercode' => $usercode));

			$data = array();

			$data['id'] = $result[$i]['id'];

			$data['fname'] = $result[$i]['fname'];

			$data['lname'] = $result[$i]['lname'];

			$data['charge_fees'] = $result[$i]['charge_fees'];

			$data['isFavorite'] = $resWishlist;

			if ($result[$i]['profile_pic'] != "") {
				$img_file_path = base_url() . "upload/celebrity_profile/" . $result[$i]['profile_pic'];
			} else {
				$img_file_path = "-";
			}

			$data['profile_pic'] = $img_file_path;

			$arr[] = $data;
		}
		if (count($arr) > 0) {
			$arr = $arr;
		} else {
			$arr = [];
		}
		$json_arr[] = [
			'title' => 'popular_celebs',
			'data' => $arr,
		];
		// $json_arr['title'] = 'popular_celebs';
		// $json_arr['data'] = $arr;

		$result1 = $this->ObjM->getRecentlyAddedCelebsList();
		$arr1 = array();

		for ($i = 0; $i < count($result1); $i++) {

			$resWishlist1 = $this->comman_fun->check_record('wishlist_master', array('celebrity_id' => $result1[$i]['id'], 'usercode' => $usercode));

			$data1 = array();

			$data1['id'] = $result1[$i]['id'];

			$data1['fname'] = $result1[$i]['fname'];

			$data1['lname'] = $result1[$i]['lname'];

			$data1['isFavorite'] = $resWishlist1;

			$data1['charge_fees'] = $result1[$i]['charge_fees'];

			if ($result1[$i]['profile_pic'] != "") {
				$img_file_path1 = base_url() . "upload/celebrity_profile/" . $result1[$i]['profile_pic'];
			} else {
				$img_file_path1 = "-";
			}

			$data1['profile_pic'] = $img_file_path1;

			$arr1[] = $data1;
		}

		if (count($arr1) > 0) {
			$arr1 = $arr1;
		} else {
			$arr1 = [];
		}
		// $json_arr['title1'] = 'recent_added_celebs';
		// $json_arr['data1'] = $arr1;

		$json_arr[] = [
			'title' => 'recent_added_celebs',
			'data' => $arr1,
		];

		return $json_arr;
		exit;

	}

	function getAllCategoryList() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		//$accessToken = $_REQUEST['Accesstoken'];

		$data_json = array();

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {

			$result = $this->ObjM->getAllCategory();

			if (isset($result[0])) {

				$json_arr = array();

				$arr = array();

				for ($i = 0; $i < count($result); $i++) {

					$data = array();

					$data['category_id'] = $result[$i]['category_id'];

					$data['category_name'] = $result[$i]['category_name'];

					$data['access_name'] = $result[$i]['access_name'];

					if ($result[$i]['img_name'] != "") {
						$img_file_path = base_url() . "upload/category/" . $result[$i]['img_name'];
					} else {
						$img_file_path = "-";
					}

					$data['img_name'] = $img_file_path;

					$arr[] = $data;
				}

				$data_json['validation'] = true;

				$data_json['msg'] = "";

				$data_json['data'] = $arr;

				echo json_encode($data_json);

				exit;

			} else {

				$data_json['validation'] = false;

				$data_json['msg'] = "There is no data";

				echo json_encode($data_json);
				exit;
			}

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please check your token.";

			echo json_encode($data_json);

			exit;
		}

	}

	function getAllPopularCelebrityList() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		//$accessToken = $_REQUEST['Accesstoken'];

		$data_json = array();

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {

			$result = $this->ObjM->getAllPopularCelebrity();

			if (isset($result[0])) {

				$json_arr = array();

				$arr = array();

				for ($i = 0; $i < count($result); $i++) {

					$resWishlist = $this->comman_fun->check_record('wishlist_master', array('celebrity_id' => $result[$i]['id'], 'usercode' => $resultUser[0]['usercode']));

					$data = array();

					$data['id'] = $result[$i]['id'];

					$data['fname'] = $result[$i]['fname'];

					$data['lname'] = $result[$i]['lname'];

					$data['isFavorite'] = $resWishlist;

					$data['charge_fees'] = $result[$i]['charge_fees'];

					if ($result[$i]['profile_pic'] != "") {
						$img_file_path = base_url() . "upload/celebrity_profile/" . $result[$i]['profile_pic'];
					} else {
						$img_file_path = "-";
					}

					$data['profile_pic'] = $img_file_path;

					$arr[] = $data;
				}

				$data_json['validation'] = true;

				$data_json['msg'] = "";

				$data_json['data'] = $arr;

				echo json_encode($data_json);

				exit;

			} else {

				$data_json['validation'] = false;

				$data_json['msg'] = "There is no data";

				echo json_encode($data_json);
				exit;
			}

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please check your token.";

			echo json_encode($data_json);

			exit;
		}

	}

	function getAllCelebrityList() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		//$accessToken = $_REQUEST['Accesstoken'];

		$data_json = array();

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {

			$result = $this->ObjM->getAllCelebrity();

			if (isset($result[0])) {

				$json_arr = array();

				$arr = array();

				for ($i = 0; $i < count($result); $i++) {

					$resWishlist = $this->comman_fun->check_record('wishlist_master', array('celebrity_id' => $result[$i]['id'], 'usercode' => $resultUser[0]['usercode']));

					$data = array();

					$data['id'] = $result[$i]['id'];

					$data['fname'] = $result[$i]['fname'];

					$data['lname'] = $result[$i]['lname'];

					$data['isFavorite'] = $resWishlist;

					$data['charge_fees'] = $result[$i]['charge_fees'];

					if ($result[$i]['profile_pic'] != "") {
						$img_file_path = base_url() . "upload/celebrity_profile/" . $result[$i]['profile_pic'];
					} else {
						$img_file_path = "-";
					}

					$data['profile_pic'] = $img_file_path;

					$arr[] = $data;
				}

				$data_json['validation'] = true;

				$data_json['msg'] = "";

				$data_json['data'] = $arr;

				echo json_encode($data_json);

				exit;

			} else {

				$data_json['validation'] = false;

				$data_json['msg'] = "There is no data";

				echo json_encode($data_json);
				exit;
			}

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please check your token.";

			echo json_encode($data_json);

			exit;
		}

	}

	function getProfile() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		//$accessToken = $_REQUEST['Accesstoken'];

		$data_json = array();

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'role_type' => '3', 'status' => 'Active'));
			//var_dump($resultUser);exit;
			//echo $this->db->last_query();exit;

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {

			if ($resultUser[0]['oauth_provider'] != "" & $resultUser[0]['oauth_provider'] == "Facebook") {
				$image = $resultUser[0]['profile_pic'];
			} else if ($resultUser[0]['oauth_provider'] != "" & $resultUser[0]['oauth_provider'] == "Google") {
				$image = $resultUser[0]['profile_pic'];
			} else {
				if ($resultUser[0]['profile_pic'] != "") {
					$image = base_url() . "upload/user/" . $resultUser[0]['profile_pic'];

				} else {
					$image = base_url() . "upload/user/default.png";
				}
			}

			$data_json['usercode'] = $resultUser[0]['usercode'];

			$data_json['first_name'] = $resultUser[0]['fname'];

			$data_json['last_name'] = $resultUser[0]['lname'];

			$data_json['profile_pic'] = $image;

			$data_json['emailid'] = $resultUser[0]['emailid'];

			if ($resultUser[0]['oauth_provider'] != "") {

				$data_json['oauth_provider'] = $resultUser[0]['oauth_provider'];

			} else {

				$data_json['oauth_provider'] = '';

			}

			if ($resultUser[0]['birthdate'] != "") {

				$data_json['birthdate'] = date('d-m-Y', strtotime($resultUser[0]['birthdate']));

			} else {

				$data_json['birthdate'] = '';

			}

			$data_json['validation'] = true;

			$data_json['msg'] = "";

			echo json_encode($data_json);

			exit;

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "User not found.";

			echo json_encode($data_json);

			exit;
		}
	}

	function updateProfile() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		//$accessToken = $_REQUEST['Accesstoken'];

		$first_name = filter_data($_REQUEST['first_name']);

		$last_name = filter_data($_REQUEST['last_name']);

		$birthdate = date('Y-m-d', strtotime($_REQUEST['birthdate']));

		//$upload_file = $_REQUEST['upload_file'];

		$old_file = $_REQUEST['old_file'];

		$oauth_provider = $_REQUEST['oauth_provider']; //Facebook //Google

		$data_json = array();

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'role_type' => '3', 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {

			$usercode = $resultUser[0]['usercode'];

			$data['fname'] = $first_name;

			$data['lname'] = $last_name;

			$data['birthdate'] = $birthdate;

			$data['update_date'] = date('Y-m-d h:i:s');

			if ($oauth_provider == "") {

				if (isset($_FILES['upload_file']) && !empty($_FILES['upload_file']['name'])) {
					$this->handle_upload();
					$data['profile_pic'] = $_POST['file_name'];

					if ($old_file != "") {
						$url = base_url() . 'upload/user/' . $old_file;
						$url2 = base_url() . 'upload/user/thum/' . $old_file;
						unlink($url);
						unlink($url2);
					}

				}
			}

			$this->comman_fun->update($data, 'membermaster', array('usercode' => $usercode));

			$latestResUser = $this->comman_fun->get_table_data('membermaster', array('usercode' => $usercode));

			if ($latestResUser[0]['oauth_provider'] != "" & $latestResUser[0]['oauth_provider'] == "Facebook") {
				$image = $latestResUser[0]['profile_pic'];
			} else if ($latestResUser[0]['oauth_provider'] != "" & $latestResUser[0]['oauth_provider'] == "Google") {
				$image = $latestResUser[0]['profile_pic'];
			} else {
				if ($latestResUser[0]['profile_pic'] != "") {
					$image = base_url() . "upload/user/" . $latestResUser[0]['profile_pic'];

				} else {
					$image = base_url() . "upload/user/default.png";
				}
			}

			$datas['usercode'] = $latestResUser[0]['usercode'];

			$datas['first_name'] = $latestResUser[0]['fname'];

			$datas['last_name'] = $latestResUser[0]['lname'];

			$datas['profile_pic'] = $image;

			$datas['emailid'] = $latestResUser[0]['emailid'];

			if ($latestResUser[0]['oauth_provider'] != "") {

				$datas['oauth_provider'] = $latestResUser[0]['oauth_provider'];

			} else {

				$datas['oauth_provider'] = '';

			}

			if ($latestResUser[0]['birthdate'] != "") {

				$datas['birthdate'] = date('d-m-Y', strtotime($latestResUser[0]['birthdate']));

			} else {

				$datas['birthdate'] = '';

			}

			$arr[] = $datas;

			$data_json['data'] = $arr;

			$data_json['validation'] = true;

			$data_json['msg'] = "";

			echo json_encode($data_json);

			exit;

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "User not found.!";

			echo json_encode($data_json);

			exit;

		}
	}

	function changePassword() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		//$accessToken = $_REQUEST['Accesstoken'];

		$oldPassword = filter_data($_REQUEST['old_password']);

		$newPassword = filter_data($_REQUEST['new_password']);

		$confirmPassword = filter_data($_REQUEST['confirm_password']);

		$data_json = array();

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'role_type' => '3', 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {

			$usercode = $resultUser[0]['usercode'];

			if ($oldPassword == $resultUser[0]['password']) {

				if ($newPassword == $confirmPassword) {

					$data['password'] = $newPassword;

					$data['update_date'] = date('Y-m-d h:i:s');

					$this->comman_fun->update($data, 'membermaster', array('usercode' => $usercode));

					$data_json['validation'] = true;

					$data_json['msg'] = "password change successfully.";

					echo json_encode($data_json);

					exit;

				} else {

					$data_json['validation'] = false;

					$data_json['msg'] = "your new password and confirm password not matched.";

					echo json_encode($data_json);

					exit;
				}

			} else {
				$data_json['validation'] = false;

				$data_json['msg'] = "your old password is wrong.";

				echo json_encode($data_json);

				exit;
			}

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "User not found.!";

			echo json_encode($data_json);

			exit;

		}
	}

	function loginWith() {

		$f_name = $_REQUEST['f_name'];
		$l_name = $_REQUEST['l_name'];
		$emailid = $_REQUEST['email_id'];
		$profile_pic = $_REQUEST['profile_pic'];
		$firebase_token = $_REQUEST['firebase_token'];
		$device_type = $_REQUEST['device_type'];
		$login_type = $_REQUEST['login_type'];
		$oauth_id = $_REQUEST['oauth_id'];

		$json_arr = array();

		$checkRecordM = $this->comman_fun->get_table_data('membermaster', array('emailid' => $emailid, 'status' => 'Active', 'role_type' => '3'));

		if (count($checkRecordM) > 0) {

			// $json_arr['validation'] = "false";

			// $json_arr['msg'] = "email is already registered.";

			// echo json_encode($json_arr);

			// exit;

			$ltype_array = array('facebook', 'google');

			if (in_array($login_type, $ltype_array)) {

				if ($login_type == "facebook") {
					$ltype = 'Facebook';
				} else if ($login_type == "google") {
					$ltype = 'Google';
				} else {
					$ltype = '';
				}

				//update
				$updateData = array();

				$updateData['fname'] = filter_data($f_name);

				$updateData['lname'] = filter_data($l_name);

				//$updateData['emailid'] = filter_data($emailid);

				$updateData['profile_pic'] = filter_data($profile_pic);

				$updateData['oauth_provider'] = $ltype;

				$updateData['oauth_id'] = filter_data($oauth_id);

				$updateData['firebase_token'] = filter_data($firebase_token);

				$updateData['device_type'] = filter_data($device_type);

				$updateData['accessToken'] = $this->getToken(); //get Token

				$updateData['update_date'] = date('Y-m-d h:i:s');

				$this->comman_fun->update($updateData, 'membermaster', array('emailid' => $emailid, 'status' => 'Active'));

				$dataRes = $this->comman_fun->get_table_data('membermaster', array('emailid' => $emailid));

				$arr = array();

				$datas = array();

				$datas['usercode'] = $dataRes[0]['usercode'];
				$datas['first_name'] = $dataRes[0]['fname'];
				$datas['last_name'] = $dataRes[0]['lname'];
				$datas['emailid'] = $dataRes[0]['emailid'];
				$datas['accessToken'] = $dataRes[0]['accessToken'];
				$datas['oauth_provider'] = $dataRes[0]['oauth_provider'];
				$datas['oauth_id'] = $dataRes[0]['oauth_id'];
				$datas['profile_pic'] = $dataRes[0]['profile_pic'];
				$arr[] = $datas;

				$json_arr['data'] = $arr;

				$json_arr['validation'] = true;

				$json_arr['msg'] = "";

				echo json_encode($json_arr);

				exit;

			} else {

				$json_arr['validation'] = false;

				$json_arr['msg'] = "email is already registered.";

				echo json_encode($json_arr);
				exit;
			}

		} else {

			if ($login_type == "facebook") {
				$ltype = 'Facebook';
			} else if ($login_type == "google") {
				$ltype = 'Google';
			} else {
				$ltype = '';
			}
			//insert
			$data = array();

			$data['fname'] = filter_data($f_name);

			$data['lname'] = filter_data($l_name);

			$data['emailid'] = filter_data($emailid);

			$data['profile_pic'] = filter_data($profile_pic);

			$data['oauth_provider'] = $ltype;

			$data['oauth_id'] = filter_data($oauth_id);

			$data['firebase_token'] = filter_data($firebase_token);

			$data['device_type'] = filter_data($device_type);

			$data['accessToken'] = $this->getToken(); //get Token

			$data['role_type'] = "3";

			$data['status'] = "Active";

			$data['email_verify'] = "Y";

			$data['create_date'] = date('Y-m-d H:i:s');

			$data['update_date'] = date('Y-m-d h:i:s');

			$data['timedt'] = time();

			$member_id = $this->comman_fun->addItem($data, 'membermaster');

			if ($member_id != "") {

				$dataRes = $this->comman_fun->get_table_data('membermaster', array('usercode' => $member_id));

				$arr = array();

				$datas = array();

				$datas['usercode'] = $dataRes[0]['usercode'];
				$datas['first_name'] = $dataRes[0]['fname'];
				$datas['last_name'] = $dataRes[0]['lname'];
				$datas['emailid'] = $dataRes[0]['emailid'];
				$datas['accessToken'] = $dataRes[0]['accessToken'];
				$datas['oauth_provider'] = $dataRes[0]['oauth_provider'];
				$datas['oauth_id'] = $dataRes[0]['oauth_id'];
				$datas['profile_pic'] = $dataRes[0]['profile_pic'];
				$arr[] = $datas;

				$json_arr['data'] = $arr;

				$json_arr['validation'] = true;

				$json_arr['msg'] = "";

				echo json_encode($json_arr);

				exit;

			} else {

				$json_arr['validation'] = false;

				$json_arr['msg'] = "Something went worng.";

				echo json_encode($json_arr);
				exit;
			}
		}

	}

	function getCelebrityListCategoryWise() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		//$accessToken = $_REQUEST['Accesstoken'];

		$acceess_name = filter_data($_REQUEST['acceess_name']);

		$data_json = array();

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'role_type' => '3', 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {

			$result = $this->ObjM->getCelebrityListCategoryWise($acceess_name);
			//echo $this->db->last_query();exit;

			if (isset($result[0])) {

				$json_arr = array();

				$arr = array();

				for ($i = 0; $i < count($result); $i++) {

					$resWishlist = $this->comman_fun->check_record('wishlist_master', array('celebrity_id' => $result[$i]['id'], 'usercode' => $resultUser[0]['usercode']));

					$data = array();

					$data['id'] = $result[$i]['id'];

					$data['fname'] = $result[$i]['fname'];

					$data['lname'] = $result[$i]['lname'];

					$data['isFavorite'] = $resWishlist;

					$data['charge_fees'] = $result[$i]['charge_fees'];

					if ($result[$i]['profile_pic'] != "") {
						$img_file_path = base_url() . "upload/celebrity_profile/" . $result[$i]['profile_pic'];
					} else {
						$img_file_path = "-";
					}

					$data['profile_pic'] = $img_file_path;

					$arr[] = $data;
				}

				$data_json['validation'] = true;

				$data_json['msg'] = "";

				$data_json['total_celebs'] = count($result);

				$data_json['data'] = $arr;

				echo json_encode($data_json);

				exit;

			} else {

				$data_json['validation'] = false;

				$data_json['msg'] = "There is no data";

				echo json_encode($data_json);
				exit;
			}

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please check your token.";

			echo json_encode($data_json);

			exit;
		}

	}

	function getCelebritydetail() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		//$accessToken = $_REQUEST['Accesstoken'];

		$celebrity_id = filter_data($_REQUEST['celebrity_id']);

		$data_json = array();

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'role_type' => '3', 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {

			$result = $this->ObjM->getCelebrityDetail($celebrity_id);
			//echo $this->db->last_query();exit;

			if (isset($result[0])) {

				$resWishlist = $this->comman_fun->check_record('wishlist_master', array('celebrity_id' => $celebrity_id, 'usercode' => $resultUser[0]['usercode']));

				$json_arr = array();

				$data = array();

				$data['id'] = $result[0]['id'];

				$data['fname'] = $result[0]['fname'];

				$data['lname'] = $result[0]['lname'];

				$data['charge_fees'] = $result[0]['charge_fees'];

				$data['isFavorite'] = $resWishlist;

				if ($result[0]['profile_pic'] != "") {
					$img_file_path = base_url() . "upload/celebrity_profile/" . $result[0]['profile_pic'];
				} else {
					$img_file_path = "-";
				}

				$data['profile_pic'] = $img_file_path;

				//$data['category'] = json_decode($result[0]['category'], true);
				$category = json_decode($result[0]['category'], true);
				$arrCate = array();
				$dataCate = array();
				for ($i = 0; $i < count($category); $i++) {

					$dataCate['category'] = $category[$i];
					$arrCate[] = $dataCate;
				}

				$data['category'] = $arrCate;
				$data['known_for'] = $result[0]['known_for'];
				$data['gender'] = ($result[0]['gender'] != '') ? $result[0]['gender'] : '';
				$data['birthdate'] = ($result[0]['birthdate'] != '') ? date('d-m-Y', strtotime(result[0]['birthdate'])) : '';
				$data['age'] = ($result[0]['age'] != '') ? $result[0]['age'] : '';
				$data['is_trending'] = ($result[0]['is_trending'] != '') ? $result[0]['is_trending'] : '';
				$data['blue_tick'] = ($result[0]['blue_tick'] != '') ? boolval($result[0]['blue_tick']) : '';
				//$data['language_known'] = ($result[0]['language_known'] != '') ? json_decode($result[0]['language_known'], true) : '';
				$language_known = json_decode($result[0]['language_known'], true);
				$arrLK = array();
				$dataLK = array();
				for ($i = 0; $i < count($language_known); $i++) {

					$dataLK['language_known'] = $language_known[$i];
					$arrLK[] = $dataLK;
				}

				$data['language_known'] = $arrLK;
				$data['twitter_link'] = ($result[0]['twitter_link'] != '') ? $result[0]['twitter_link'] : '';
				$data['fb_link'] = ($result[0]['fb_link'] != '') ? $result[0]['fb_link'] : '';
				$data['insta_link'] = ($result[0]['insta_link'] != '') ? $result[0]['insta_link'] : '';
				$data['hashtag'] = ($result[0]['hashtag'] != '') ? $result[0]['hashtag'] : '';
				$data['experience_in_industry'] = ($result[0]['experience_in_industry'] != '') ? $result[0]['experience_in_industry'] : '';
				$data['brief_details'] = ($result[0]['brief_details'] != '') ? $result[0]['brief_details'] : '';
				$data['about_life'] = ($result[0]['about_life'] != '') ? $result[0]['about_life'] : '';
				$data['successfull_events'] = ($result[0]['successfull_events'] != '') ? $result[0]['successfull_events'] : '';
				$data['nature_character'] = ($result[0]['nature_character'] != '') ? $result[0]['nature_character'] : '';
				$data['brief_family_bg'] = ($result[0]['brief_family_bg'] != '') ? $result[0]['brief_family_bg'] : '';
				$data['about_career'] = ($result[0]['about_career'] != '') ? $result[0]['about_career'] : '';

				//$arr[] = $data;

				$data_json['validation'] = true;

				$data_json['msg'] = "";

				$data_json['data'] = $data;

				echo json_encode($data_json);

				exit;

			} else {

				$data_json['validation'] = false;

				$data_json['msg'] = "There is no data";

				echo json_encode($data_json);
				exit;
			}

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please check your token.";

			echo json_encode($data_json);

			exit;
		}

	}

	function getOccasionList() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		//$accessToken = $_REQUEST['Accesstoken'];

		$data_json = array();

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'role_type' => '3', 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {

			$result = $this->ObjM->getOccasion();

			if (isset($result[0])) {

				$json_arr = array();

				$arr = array();

				for ($i = 0; $i < count($result); $i++) {

					$data = array();

					$data['id'] = $result[$i]['id'];

					$data['occasion_title'] = $result[$i]['occasion_title'];

					$arr[] = $data;
				}

				$data_json['validation'] = true;

				$data_json['msg'] = "";

				$data_json['data'] = $arr;

				echo json_encode($data_json);

				exit;

			} else {

				$data_json['validation'] = false;

				$data_json['msg'] = "There is no data";

				echo json_encode($data_json);
				exit;
			}

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please check your token.";

			echo json_encode($data_json);

			exit;
		}

	}

	function getMessageOccasionWise() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		//$accessToken = $_REQUEST['Accesstoken'];

		$occasion_id = $_REQUEST['occasion_id'];

		$message_for = $_REQUEST['message_for']; //self // other

		$data_json = array();

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'role_type' => '3', 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {

			$result = $this->ObjM->getMessageList($occasion_id, $message_for);
			//echo $this->db->last_query();exit;

			if (isset($result[0])) {

				$json_arr = array();

				$arr = array();

				for ($i = 0; $i < count($result); $i++) {

					$data = array();

					$data['id'] = $result[$i]['id'];

					$data['occasion_id'] = $result[$i]['occasion_id'];
					$data['occasion_value'] = $result[$i]['occasion_value'];
					$data['message_for'] = $result[$i]['message_for'];
					$data['template_message'] = $result[$i]['template_message'];

					$arr[] = $data;
				}

				$data_json['validation'] = true;

				$data_json['msg'] = "";

				$data_json['data'] = $arr;

				echo json_encode($data_json);

				exit;

			} else {

				$data_json['validation'] = false;

				$data_json['msg'] = "There is no data";

				echo json_encode($data_json);
				exit;
			}

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please check your token.";

			echo json_encode($data_json);

			exit;
		}

	}

	function forgotPassword() {

		$emailid = $_REQUEST['emailid'];

		$data_json = array();

		if ($emailid != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('emailid' => $emailid, 'role_type' => '3', 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your emailid.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {

			$name = $resultUser[0]['fname'] . ' ' . $resultUser[0]['lname'];

			$toEmail = $resultUser[0]['emailid'];

			$body = 'Dear ' . $name . ',<br><br>

				You recently requested to forgot password for your account, your email id : ' . $resultUser[0]['emailid'] . ' and your password : ' . $resultUser[0]['password'] . '<br><br>

				<br> Thank you.';

			$subject = 'Forgot Password';
			$email = 'shubhexa@gmail.com'; //https://pnxschool.com/shubhexa/

			$this->load->library('email');
			$config = array(
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'priority' => '1',
			);
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");

			$this->email->from($email);

			$this->email->to($toEmail); //shubhexa@gmail.com

			$this->email->subject($subject);

			$this->email->message($body);

			//$this->email->send();

			// $headers = 'MIME-Version: 1.0' . "\r\n";
			// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// $headers .= 'From:' . $email . '' . "\r\n";
			//mail($toEmail, $subject, $body, $headers);

			if ($this->email->send()) {

				$data_json['validation'] = true;

				$data_json['msg'] = "email send";

				echo json_encode($data_json);
				exit;
			} else {

				$data_json['validation'] = false;

				$data_json['msg'] = "email not send.";

				echo json_encode($data_json);
				exit;
			}

		} else {
			$data_json['validation'] = false;

			$data_json['msg'] = "Please check your emailid.";

			echo json_encode($data_json);

			exit;
		}

	}

	function handle_upload() {
		if (isset($_FILES['upload_file']) && !empty($_FILES['upload_file']['name'])) {
			$config = array();
			$config['upload_path'] = './upload/user';
			$config['allowed_types'] = 'jpg|jpeg|gif|png|JPG|JPEG|PNG';
			$config['max_size'] = '0';
			$config['overwrite'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$_FILES['userfile']['name'] = $_FILES['upload_file']['name'];
			$_FILES['userfile']['type'] = $_FILES['upload_file']['type'];
			$_FILES['userfile']['tmp_name'] = $_FILES['upload_file']['tmp_name'];
			$_FILES['userfile']['error'] = $_FILES['upload_file']['error'];
			$_FILES['userfile']['size'] = $_FILES['upload_file']['size'];
			$rand = md5(uniqid(rand(), true));
			$fileName = 'my_pic_' . $rand;
			$fileName = str_replace(" ", "", $fileName);
			$config['file_name'] = $fileName;
			$this->upload->initialize($config);

			if ($this->upload->do_upload()) {
				$upload_data = $this->upload->data();
				$_POST['file_name'] = $upload_data['file_name'];

				$this->_create_thumbnail($upload_data['file_name'], 120, 120);
				return true;
			} else {

				echo $this->upload->display_errors();
			}
		}

	}

	protected function _create_thumbnail($fileName, $width, $height) {

		$config['image_library'] = 'gd2';
		$config['source_image'] = './upload/user/' . $fileName;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = $width;
		$config['height'] = $height;
		$config['new_image'] = './upload/user/thum/' . $fileName;
		$config['thumb_marker'] = '';

		$this->image_lib->initialize($config);
		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
		}
		return true;
	}

	function addToCart() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		//$accessToken = $_REQUEST['Accesstoken'];

		$celebrity_id = $_REQUEST['celebrity_id'];

		$msg_for = $_REQUEST['msg_for'];

		$self_name1 = $_REQUEST['self_name'];

		$to_name1 = $_REQUEST['to_name'];

		$from_name1 = $_REQUEST['from_name'];

		$occasion_type = $_REQUEST['occasion_type'];

		$delivery_date = $_REQUEST['delivery_date'];

		$template_message = $_REQUEST['template_message'];

		$your_email = $_REQUEST['your_email'];

		$your_number = $_REQUEST['your_number'];

		$your_gst_name = $_REQUEST['your_gst_name'];

		$your_gst_number = $_REQUEST['your_gst_number'];

		$your_gst_state = $_REQUEST['your_gst_state'];

		$amount = $_REQUEST['amount'];

		$public_permission1 = $_REQUEST['public_permission'];

		$send_on_wa1 = $_REQUEST['send_on_wa'];

		$need_gst1 = $_REQUEST['need_gst'];

		$data_json = array();

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'role_type' => '3', 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {

			$usercode = $resultUser[0]['usercode'];

			if ($msg_for == "my_self") {
				$self_name = $self_name1;
				$to_name = "";
				$from_name = "";
			} else if ($msg_for == "someone_else") {
				$to_name = $to_name1;
				$from_name = $from_name1;
				$self_name = "";
			} else {
				$self_name = "";
				$to_name = "";
				$from_name = "";
			}

			if ($public_permission1 != "") {
				$public_permission = 'Yes';
			} else {
				$public_permission = 'No';
			}

			if ($send_on_wa1 != "") {
				$send_on_wa = 'Yes';
			} else {
				$send_on_wa = 'No';
			}

			if ($_REQUEST['need_gst'] != "") {
				$need_gst = 'Yes';
			} else {
				$need_gst = 'No';
			}

			$res = $this->ObjM->checkIsCartAvailable($usercode);

			if (count($res) > 0) {

				$cart_id = $res[0]['cart_id'];

				$data = array();

				$data['celebrity_id'] = $celebrity_id;
				$data['cart_id'] = $cart_id;
				$data['create_for'] = $msg_for;
				$data['self_name'] = $self_name;
				$data['to_name'] = $to_name;
				$data['from_name'] = $from_name;
				$data['occation_type'] = $occasion_type;
				$data['delivery_date'] = date('Y-m-d', strtotime($delivery_date));
				$data['template_message'] = $template_message;
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

				$data_json['validation'] = true;

				$data_json['msg'] = "added into cart";

				echo json_encode($data_json);

				exit;

			} else {

				$usercode = $resultUser[0]['usercode'];
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
					$addData['self_name'] = $self_name;
					$addData['to_name'] = $to_name;
					$addData['from_name'] = $from_name;
					$addData['occation_type'] = $occasion_type;
					$addData['delivery_date'] = $delivery_date;
					$addData['template_message'] = $template_message;
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

					$data_json['validation'] = true;

					$data_json['msg'] = "added into cart";

					echo json_encode($data_json);

					exit;

				} else {

					$data_json['validation'] = false;

					$data_json['msg'] = "something went wrong";

					echo json_encode($data_json);

					exit;
				}

			}

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "User not found.";

			echo json_encode($data_json);

			exit;
		}
	}

	public function calculateTotalCartAmount($cart_id) {

		$res = $this->ObjM->getCartTotAmount($cart_id);
		return $res[0]['tot_cart_amount'];
	}

	function getcart() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		$orderType = 'pending';

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'role_type' => '3', 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {

			$usercode = $resultUser[0]['usercode'];

			$res = $this->ObjM->getOrderList($usercode, $orderType);

			if (count($res) > 0) {

				$resultCDetails = $this->ObjM->getCartDetailsList($res[0]['cart_id']);

				$json_arr = array();

				$arr = array();

				for ($i = 0; $i < count($resultCDetails); $i++) {

					$data = array();

					$data['id'] = $resultCDetails[$i]['id'];

					$data['fname'] = $resultCDetails[$i]['fname'];

					$data['lname'] = $resultCDetails[$i]['lname'];

					$data['amount'] = $resultCDetails[$i]['amount'];

					$data['delivery_date'] = date('d-m-Y', strtotime($resultCDetails[$i]['delivery_date']));

					if ($resultCDetails[$i]['create_for'] == "my_self") {
						$data['booking_for'] = $resultCDetails[$i]['self_name'];
					} else {
						$data['booking_for'] = $resultCDetails[$i]['to_name'];
					}
					if ($resultCDetails[$i]['occation_type'] != "Customize_Your_Message") {
						$data['occation_type'] = $resultCDetails[$i]['occation_type'];
					} else {
						$data['occation_type'] = '';
					}

					if ($resultCDetails[$i]['profile_pic'] != "") {
						$img_file_path = base_url() . "upload/celebrity_profile/" . $resultCDetails[$i]['profile_pic'];
					} else {
						$img_file_path = "-";
					}

					$data['profile_pic'] = $img_file_path;

					$arr[] = $data;
				}

				$data_json['validation'] = true;

				$data_json['msg'] = "";

				$data_json['cartId'] = $res[0]['cart_id'];

				$data_json['data'] = $arr;

				echo json_encode($data_json);

				exit;

			} else {

				$data_json['validation'] = false;

				$data_json['msg'] = "data not found.";

				echo json_encode($data_json);

				exit;
			}

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "user not found.";

			echo json_encode($data_json);

			exit;
		}
	}

	function setFavoriteAndUnFavorite() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		$celeb_id = $_REQUEST['celeb_id'];

		$data_json = array();

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'role_type' => '3', 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {

			$usercode = $resultUser[0]['usercode'];

			$res = $this->ObjM->checkIsFavouriteOrNot($usercode, $celeb_id);

			if (count($res) > 0) {
				// remove wishlist
				$this->comman_fun->delete('wishlist_master', array('celebrity_id' => $celeb_id, 'usercode' => $usercode));

				$data_json['validation'] = true;

				$data_json['isFavorite'] = false;

				$data_json['msg'] = "remove from favorite";

				echo json_encode($data_json);

				exit;

			} else {

				//add wishlist
				$data = array();

				$data['usercode'] = $usercode;

				$data['celebrity_id'] = $celeb_id;

				$data['status'] = "Active";

				$data['create_date'] = date('Y-m-d H:i:s');

				$data['update_date'] = date('Y-m-d h:i:s');

				$id = $this->comman_fun->addItem($data, 'wishlist_master');

				if (count($id) > 0) {

					$data_json['validation'] = true;

					$data_json['isFavorite'] = true;

					$data_json['msg'] = "added into favorite";

					echo json_encode($data_json);

					exit;

				} else {

					$data_json['validation'] = false;

					$data_json['msg'] = "something went wrong.";

					echo json_encode($data_json);

					exit;
				}

			}

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "user not found.";

			echo json_encode($data_json);

			exit;
		}
	}

	function getFavoriteList() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		$data_json = array();

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'role_type' => '3', 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {

			$result = $this->ObjM->getWishlist($resultUser[0]['usercode']);

			if (isset($result[0])) {

				$json_arr = array();

				$arr = array();

				for ($i = 0; $i < count($result); $i++) {

					$data = array();

					$data['id'] = $result[$i]['id'];
					$data['celebrity_id'] = $result[$i]['celeb_id'];
					$data['fname'] = $result[$i]['fname'];
					$data['lname'] = $result[$i]['lname'];
					$data['charge_fees'] = $result[$i]['charge_fees'];
					$data['isFavoriteq'] = true;

					if ($result[$i]['profile_pic'] != "") {
						$img_file_path = base_url() . "upload/celebrity_profile/" . $result[$i]['profile_pic'];
					} else {
						$img_file_path = "-";
					}

					$data['profile_pic'] = $img_file_path;

					$arr[] = $data;
				}

				$data_json['validation'] = true;

				$data_json['msg'] = "";

				$data_json['data'] = $arr;

				echo json_encode($data_json);

				exit;

			} else {

				$data_json['validation'] = false;

				$data_json['msg'] = "There is no data";

				echo json_encode($data_json);
				exit;
			}

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "user not found.";

			echo json_encode($data_json);

			exit;

		}
	}

	function removeItemFromCart() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		$cartItemId = $_REQUEST['cartItemId'];

		$data_json = array();

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'role_type' => '3', 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {

			$usercode = $resultUser[0]['usercode'];

			$recorddetails = $this->comman_fun->get_table_data('cart_details', array('id' => $cartItemId));

			$recordMaster = $this->comman_fun->get_table_data('cart_master', array('cart_id' => $recorddetails[0]['cart_id']));

			$UpdateData['total_amount'] = $recordMaster[0]['total_amount'] - $recorddetails[0]['amount'];

			$UpdateData['update_date'] = date('Y-m-d h:i:s');

			$this->comman_fun->update($UpdateData, 'cart_master', array('cart_id' => $recorddetails[0]['cart_id']));

			$this->comman_fun->delete('cart_details', array('id' => $cartItemId));

			$data_json['validation'] = true;

			$data_json['msg'] = "";

			echo json_encode($data_json);

			exit;

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "user not found.";

			echo json_encode($data_json);

			exit;

		}
	}

	function checkOut() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		$cartId = $_REQUEST['cart_id'];

		//echo $cartId;exit;
		$data_json = array();

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'role_type' => '3', 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}
		if (count($resultUser) > 0) {

			// update payment status later
			$UpdateData = array();

			$UpdateData['payment_status'] = 'confirm';

			$UpdateData['order_date'] = date('Y-m-d h:i:s');

			$UpdateData['update_date'] = date('Y-m-d h:i:s');

			$this->comman_fun->update($UpdateData, 'cart_master', array('cart_id' => $cartId));

			// insert celebrity task after payment status return success

			$resCartDetails = $this->comman_fun->get_table_data('cart_details', array('cart_id' => $cartId));

			if (count($resCartDetails) > 0) {

				for ($i = 0; $i < count($resCartDetails); $i++) {

					$data = array();

					$data['celebrity_id'] = $resCartDetails[$i]['celebrity_id'];

					$data['cart_id'] = $cartId;

					$data['usercode'] = $resultUser[0]['usercode'];

					$data['cart_detail_id'] = $resCartDetails[$i]['id'];

					$data['video_name'] = '';

					$data['video_status'] = 'Initialize';

					$data['status'] = 'Active';

					$data['create_date'] = date('Y-m-d H:i:s');

					$data['update_date'] = date('Y-m-d h:i:s');

					$id = $this->comman_fun->addItem($data, 'celebrity_task_master');

				}

				$data_json['validation'] = true;

				$data_json['msg'] = "";

				echo json_encode($data_json);

				exit;
			}

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "user not found.";

			echo json_encode($data_json);

			exit;

		}
	}

	function getBookingList() {

		$getHeaders = apache_request_headers();

		$accessToken = $getHeaders['Accesstoken'];

		$orderType = $_REQUEST['orderType']; //Initialize //Complete

		$data_json = array();

		if ($accessToken != "") {

			$resultUser = $this->comman_fun->get_table_data('membermaster', array('accessToken' => $accessToken, 'role_type' => '3', 'status' => 'Active'));

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "Please enter your token.";

			echo json_encode($data_json);

			exit;
		}

		if (count($resultUser) > 0) {

			$result = $this->ObjM->getOrderBookingList($resultUser[0]['usercode'], $orderType);

			if (isset($result[0])) {

				$json_arr = array();

				$arr = array();

				for ($i = 0; $i < count($result); $i++) {

					$resultCelebrityMaster = $this->comman_fun->get_table_data('celebrity_master', array('id' => $result[$i]['celebrity_id']));

					$resultCartMaster = $this->comman_fun->get_table_data('cart_master', array('cart_id' => $result[$i]['cart_id']));

					$resultCartDetails = $this->comman_fun->get_table_data('cart_details', array('id' => $result[$i]['cart_detail_id']));

					$data = array();

					$data['id'] = $result[$i]['id'];
					$data['celebrity_id'] = $result[$i]['celebrity_id'];
					$data['celebrity_name'] = $resultCelebrityMaster[0]['fname'] . ' ' . $resultCelebrityMaster[0]['lname'];
					if ($resultCelebrityMaster[0]['profile_pic'] != "") {
						$img_file_path = base_url() . "upload/celebrity_profile/" . $resultCelebrityMaster[0]['profile_pic'];
					} else {
						$img_file_path = "-";
					}

					$category = json_decode($resultCelebrityMaster[0]['category'], true);

					$resultCategoryMaster = $this->comman_fun->get_table_data('category_master', array('access_name' => $category[0]));
					$data['category_access_name'] = $category[0];
					$data['category_name'] = $resultCategoryMaster[0]['category_name'];
					// $arrCate = array();
					// $dataCate = array();
					// for ($i = 0; $i < count($category); $i++) {

					// 	$dataCate['category'] = $category[$i];
					// 	$arrCate[] = $dataCate;
					// }

					$data['celebrity_profile_pic'] = $img_file_path;
					$data['usercode'] = $result[$i]['usercode'];
					$data['cart_id'] = $result[$i]['cart_id'];
					$data['order_no'] = $resultCartMaster[0]['order_no'];
					$data['delivery_date'] = date('d-m-Y', strtotime($resultCartDetails[0]['delivery_date']));
					$data['occation'] = $resultCartDetails[0]['occation_type'];
					$data['amount'] = $resultCartDetails[0]['amount'];
					$data['total_amount'] = $resultCartMaster[0]['total_amount'];
					$data['cart_detail_id'] = $result[$i]['cart_detail_id'];

					if ($result[$i]['video_name'] != "") {
						$data['video_name'] = $result[$i]['video_name'];
						$data['video_path'] = '-';
					} else {
						$data['video_name'] = "-";
						$data['video_path'] = "-";
					}

					$$data['video_status'] = $result[$i]['video_status'];

					$arr[] = $data;
				}

				$data_json['validation'] = true;

				$data_json['msg'] = "";

				$data_json['data'] = $arr;

				echo json_encode($data_json);

				exit;

			} else {

				$data_json['validation'] = false;

				$data_json['msg'] = "There is no data";

				echo json_encode($data_json);
				exit;
			}

		} else {

			$data_json['validation'] = false;

			$data_json['msg'] = "user not found.";

			echo json_encode($data_json);

			exit;

		}
	}

	function loginWithApple() {

		$f_name = $_REQUEST['f_name'];
		$l_name = $_REQUEST['l_name'];
		$emailid = $_REQUEST['email_id'];
		$firebase_token = $_REQUEST['firebase_token'];
		$device_type = $_REQUEST['device_type'];
		$login_type = 'APPLE';
		$apple_key = $_REQUEST['apple_key'];

		$json_arr = array();

		$checkRecordMM = $this->comman_fun->get_table_data('membermaster', array('emailid' => $emailid, 'status' => 'Active', 'role_type' => '3'));
		if (count($checkRecordMM) == 0) {
			$checkRecordM = $this->comman_fun->get_table_data('membermaster', array('apple_key' => $apple_key, 'status' => 'Active', 'role_type' => '3'));
			if (count($checkRecordM) == 0) {

				//insert code
				$data = array();

				$data['fname'] = filter_data($f_name);

				$data['lname'] = filter_data($l_name);

				$data['emailid'] = filter_data($emailid);

				$data['oauth_provider'] = $login_type;

				$data['apple_key'] = filter_data($apple_key);

				$data['firebase_token'] = filter_data($firebase_token);

				$data['device_type'] = filter_data($device_type);

				$data['accessToken'] = $this->getToken(); //get Token

				$data['celebrity_id'] = "0";

				$data['role_type'] = "3";

				$data['status'] = "Active";

				$data['email_verify'] = "Y";

				$data['create_date'] = date('Y-m-d H:i:s');

				$data['update_date'] = date('Y-m-d h:i:s');

				$data['timedt'] = time();

				$member_id = $this->comman_fun->addItem($data, 'membermaster');

				if ($member_id != "") {

					$dataRes = $this->comman_fun->get_table_data('membermaster', array('usercode' => $member_id));

					if ($dataRes[0]['profile_pic'] != "") {
						$image = base_url() . "upload/user/" . $dataRes[0]['profile_pic'];

					} else {
						$image = base_url() . "upload/user/default.png";
					}

					$arr = array();

					$datas = array();

					$datas['usercode'] = $dataRes[0]['usercode'];
					$datas['first_name'] = $dataRes[0]['fname'];
					$datas['last_name'] = $dataRes[0]['lname'];
					$datas['emailid'] = $dataRes[0]['emailid'];
					$datas['accessToken'] = $dataRes[0]['accessToken'];
					$datas['oauth_provider'] = $dataRes[0]['oauth_provider'];
					$datas['apple_key'] = $dataRes[0]['apple_key'];
					$datas['profile_pic'] = $image;
					$arr[] = $datas;

					$json_arr['data'] = $arr;

					$json_arr['validation'] = true;

					$json_arr['msg'] = "";

					echo json_encode($json_arr);

					exit;

				} else {

					$json_arr['validation'] = false;

					$json_arr['msg'] = "Something went worng.";

					echo json_encode($json_arr);
					exit;
				}
			} else {
				//update code
				$updateData = array();

				$updateData['fname'] = filter_data($f_name);

				$updateData['lname'] = filter_data($l_name);

				$updateData['firebase_token'] = filter_data($firebase_token);

				$updateData['device_type'] = filter_data($device_type);

				$updateData['accessToken'] = $this->getToken(); //get Token

				$updateData['update_date'] = date('Y-m-d h:i:s');

				$this->comman_fun->update($updateData, 'membermaster', array('apple_key' => $apple_key, 'status' => 'Active'));

				$dataRes = $this->comman_fun->get_table_data('membermaster', array('apple_key' => $apple_key));

				if ($dataRes[0]['profile_pic'] != "") {
					$image = base_url() . "upload/user/" . $dataRes[0]['profile_pic'];

				} else {
					$image = base_url() . "upload/user/default.png";
				}

				$arr = array();

				$datas = array();

				$datas['usercode'] = $dataRes[0]['usercode'];
				$datas['first_name'] = $dataRes[0]['fname'];
				$datas['last_name'] = $dataRes[0]['lname'];
				$datas['emailid'] = $dataRes[0]['emailid'];
				$datas['accessToken'] = $dataRes[0]['accessToken'];
				$datas['oauth_provider'] = $dataRes[0]['oauth_provider'];
				$datas['apple_key'] = $dataRes[0]['apple_key'];
				$datas['profile_pic'] = $image;
				$arr[] = $datas;

				$json_arr['data'] = $arr;

				$json_arr['validation'] = true;

				$json_arr['msg'] = "";

				echo json_encode($json_arr);

				exit;
			}

		} else {

			//update code
			$updateData = array();

			$updateData['fname'] = filter_data($f_name);

			$updateData['lname'] = filter_data($l_name);

			$updateData['firebase_token'] = filter_data($firebase_token);

			$updateData['device_type'] = filter_data($device_type);

			$updateData['accessToken'] = $this->getToken(); //get Token

			$updateData['update_date'] = date('Y-m-d h:i:s');

			$this->comman_fun->update($updateData, 'membermaster', array('emailid' => $emailid, 'status' => 'Active'));

			$dataRes = $this->comman_fun->get_table_data('membermaster', array('emailid' => $emailid));

			if ($dataRes[0]['profile_pic'] != "") {
				$image = base_url() . "upload/user/" . $dataRes[0]['profile_pic'];

			} else {
				$image = base_url() . "upload/user/default.png";
			}

			$arr = array();

			$datas = array();

			$datas['usercode'] = $dataRes[0]['usercode'];
			$datas['first_name'] = $dataRes[0]['fname'];
			$datas['last_name'] = $dataRes[0]['lname'];
			$datas['emailid'] = $dataRes[0]['emailid'];
			$datas['accessToken'] = $dataRes[0]['accessToken'];
			$datas['oauth_provider'] = $dataRes[0]['oauth_provider'];
			$datas['apple_key'] = $dataRes[0]['apple_key'];
			$datas['profile_pic'] = $image;
			$arr[] = $datas;

			$json_arr['data'] = $arr;

			$json_arr['validation'] = true;

			$json_arr['msg'] = "";

			echo json_encode($json_arr);

			exit;
		}

	}

}
