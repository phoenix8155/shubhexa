<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Profile extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!is_logged_admin()) {
			header('Location: ' . file_path() . 'login');
			exit;
		}
	}

	function change_password() {

		$page_info['menu_id'] = 'menu-profile';

		$page_info['page_title'] = 'Change Password';

		$this->load->view('common/topheader');

		$this->load->view('common/header_admin', $page_info);

		$this->load->view('admin/change_password_view', $data);

		$this->load->view('common/footer_admin');

	}

	function change_password_insert() {

		$this->form_validation->set_rules('old_pass', 'Old Password', 'required|trim|callback_check_old_password');

		$this->form_validation->set_rules('new_pass', 'New Password', 'required|trim');

		$this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required|trim');

		if ($_POST['new_pass'] != $_POST['confirm_pass']) {

			echo "<script type='text/javascript'>alert('Match the New Password field');
					window.location='change_password';
			</script>";exit;
		}

		if ($this->form_validation->run() === FALSE) {
			$this->change_password();
		} else {
			$this->_change_password_insert();

			$this->session->set_flashdata('show_msg', array('class' => 'true', 'msg' => 'Password Changed Successfully'));
			echo "<script type='text/javascript'>alert('Password Changed Successfully');
					window.location='change_password';
			</script>";
			// header('Location: '.base_url().'index.php/admin/'.$this->uri->rsegment(1).'/change_password/');
			exit;
		}
	}

	protected function _change_password_insert() {
		$data = array();
		$data['password'] = filter_data($_POST['new_pass']);
		$this->comman_fun->update($data, 'membermaster', array('usercode' => $this->session->userdata['superadmin']['usercode']));

	}

	function check_old_password() {
		if (!$this->comman_fun->check_record('membermaster', array('usercode' => $this->session->userdata['superadmin']['usercode'], 'password' => $_POST['old_pass']))) {
			$this->form_validation->set_message('check_old_password', 'Old Password Not Match');
			echo "<script>alert('Old Password Not Match')</script>";
			return FALSE;
		}
		return TRUE;
	}

	function check_new_password() {
		if ($this->comman_fun->check_record('membermaster', array('usercode' => $this->session->userdata['superadmin']['usercode'], 'password' => $_POST['new_pass']))) {
			$this->form_validation->set_message('check_new_password', 'Enter Same Password');
			echo "<script>alert('Enter Same Password')</script>";
			return FALSE;
		}
		return TRUE;
	}

	function check_password() {

		if (!$this->comman_fun->check_record('membermaster', array('usercode' => $this->session->userdata['superadmin']['usercode'], 'password' => $_POST['confirm_pass']))) {
			$this->form_validation->set_message('check_password', 'Invaild Password');
			echo "<script>alert('Invaild Password')</script>";
			return FALSE;
		}
		return TRUE;
	}
	public function index() {

		$this->change_password();

	}
}
