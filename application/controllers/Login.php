<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this->load->model('Member_module');
		date_default_timezone_set('Asia/Kolkata');

	}

	function view() {

		$this->index();

	}

	public function index($arr = NULL) {

		$this->check_login();

		$data['show_msg'] = $arr['msg'];

		$this->load->view('web/login', $data);

	}

	function check() {

		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			$this->form_validation->set_rules('username', 'Username', 'required');

			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() === FALSE) {

				$this->session->set_flashdata('show_msg', 'Invaild Username And Password');

				$arr['msg'] = 'Invalid Username and Password';

				$this->index($arr);
			} else {

				if (!$this->_check()) {

					$arr['msg'] = 'Invalid Username and Password';

					$this->index($arr);

				}
			}

		} else {

			$this->index();

		}
	}

	protected function _check() {

		$result = $this->Member_module->check_login();

		if (isset($result[0])) {

			$this->_authentication_submit($result[0]['usercode']);

		} else {

			$this->login_record();

			return false;

		}
	}

	private function _authentication_submit($member_id) {

		$result = $this->comman_fun->get_table_data('membermaster', array('usercode' => $member_id));

		$sess_array = array();

		$sess_array['name'] = $result[0]['fname'] . ' ' . $result[0]['lname'];

		$sess_array['usercode'] = $result[0]['usercode'];

		$sess_array['username'] = $result[0]['username'];

		$sess_array['emailid'] = $result[0]['emailid'];

		if ($result[0]['profile_pic'] != '') {

			$profile_img = './upload/' . $result[0]['profile_img'];

			if (file_exists($profile_img)) {

				$sess_array['profile_pic'] = $result[0]['profile_img'];

			} else {

				$sess_array['profile_pic'] = 'profile.png';

			}

		} else {

			$sess_array['profile_pic'] = 'profile.png';

		}

		$sess_array['login'] = 'true';

		$sess_array['login_code'] = $this->login_record(true, $result[0]['usercode'], array('username' => $result[0]['username'], 'password' => $result[0]['password']));

		$this->session->set_userdata('rk_login', $sess_array);

		//if($this->Member_module->check_admin($result[0]['usercode'])){

		if ($result[0]['role_type'] == '1') {

			$info = array();

			$info['login'] = 'true';

			$info['admin'] = 'true';

			$this->session->set_userdata('admin', $info);

			$info = array();

			$info['login'] = true;

			$info['usercode'] = $result[0]['usercode'];

			$this->session->set_userdata('superadmin', $info);

			header('Location: ' . file_path('admin') . 'dashboard/view/');

			exit;

		} else if ($result[0]['role_type'] == '2') {

			$info = array();

			$info['login'] = true;

			$info['usercode'] = $result[0]['usercode'];

			$this->session->set_userdata('celebs', $info);

			header('Location: ' . file_path('celebrity_admin') . 'dashboard/view/');

		} else if ($result[0]['role_type'] == '3') {

			$info = array();

			$info['login'] = true;

			$info['usercode'] = $result[0]['usercode'];

			$this->session->set_userdata('user', $info);

			header('Location: ' . file_path('home') . '');
		}

	}

	//**check login**//
	protected function check_login() {

		if ($this->session->userdata('admin')) {

			header('Location: ' . file_path('admin') . 'dashboard/view/');

			exit;
		}

		if ($this->session->userdata('celebs')) {

			header('Location: ' . file_path('celebrity_admin') . 'dashboard/view/');

			exit;

		}

		if ($this->session->userdata('user')) {

			header('Location: ' . file_path('home') . '');

			exit;

		}
	}

	protected function login_record($status = NULL, $usercode = NULL, $arr = NULL) {

		$now = time();

		$data['username'] = (isset($_POST['username']) ? $_POST['username'] : $arr['username']);

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

		$this->comman_fun->update($data, 'web_login_info', 'login_code', $this->session->userdata['rk_login']['login_code']);

		$this->session->sess_destroy();

		header('Location: ' . base_url() . 'index.php/admin');

		exit;
	}

	function back() {

		header('Location: ' . base_url() . 'index.php/login');

		exit;

	}

}
