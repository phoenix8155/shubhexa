<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Change_password extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		if (!is_login('celebs')) {

			header('Location: ' . file_path() . 'login');
			exit;

		}
	}

	function index() {

		$page_info['menu_id'] = 'menu-password-change';

		$page_info['page_title'] = 'Change Password';

		$this->load->view('common/topheader');
		$this->load->view('common/header_celebrity', $page_info);
		$this->load->view('celebrity/change_password_view', $data);
		$this->load->view('common/footer_admin');

	}

	function change_password_insert() {

		$this->form_validation->set_rules('old_pass', 'Old Password', 'required|trim|callback_check_old_password');

		$this->form_validation->set_rules('new_pass', 'New Password', 'required|trim');

		$this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required|trim|matches[new_pass]');

		

		if ($this->form_validation->run() === FALSE) {
			$this->index();
		} else {
			$this->_change_password_insert();

			$this->session->set_flashdata('show_msg', array('class' => 'true', 'msg' => 'Password Changed Successfully'));
			header('Location: '.file_path().'/celebrity_admin/change_password/');
			exit;
		}
	}

	protected function _change_password_insert() {
		$data = array();
		$data['password'] = filter_data($_POST['new_pass']);
		$this->comman_fun->update($data, 'membermaster', array('usercode' => $this->session->userdata['celebs']['usercode']));

	}

	function check_old_password() {
		if (!$this->comman_fun->check_record('membermaster', array('usercode' => $this->session->userdata['celebs']['usercode'], 'password' => $_POST['old_pass']))) {
			$this->form_validation->set_message('check_old_password', 'Old Password Not Match');
			echo "<script>alert('Old Password Not Match')</script>";
			return FALSE;
		}
		return TRUE;
	}

	function check_new_password() {
		if ($this->comman_fun->check_record('membermaster', array('usercode' => $this->session->userdata['celebs']['usercode'], 'password' => $_POST['new_pass']))) {
			$this->form_validation->set_message('check_new_password', 'Enter Same Password');
			echo "<script>alert('Enter Same Password')</script>";
			return FALSE;
		}
		return TRUE;
	}

	function check_password() {

		if (!$this->comman_fun->check_record('membermaster', array('usercode' => $this->session->userdata['celebs']['usercode'], 'password' => $_POST['confirm_pass']))) {
			$this->form_validation->set_message('check_password', 'Invaild Password');
			echo "<script>alert('Invaild Password')</script>";
			return FALSE;
		}
		return TRUE;
	}
}
