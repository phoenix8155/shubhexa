<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_account extends CI_Controller {

	function __construct() {
		parent::__construct();
		if (!$this->session->userdata['user']) {
			header('Location: ' . file_path() . 'home');
			exit;
		}
		$this->load->model('Profile_model', 'ObjM', true);

		$this->load->library('upload');

		$this->load->library('image_lib');
	}

	public function index() {

		$this->load->view('web/common/top_header_web');

		$this->load->view('web/my_profile_view');

		$this->load->view('web/common/footer_web');

	}

	public function profile($mode = Null) {

		$data['result'] = $this->ObjM->getUserData();

		if ($mode == 'edit') {

			$data['form_set'] = array('mode' => 'edit');

		} else {
			$data['form_set'] = array('mode' => 'view');
		}

		$this->load->view('web/common/top_header_user');

		$this->load->view('web/common/sidebar_user');

		$this->load->view('web/user_profile_view', $data);

		$this->load->view('web/common/footer_user');

	}

	function updateData() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('first_name', 'first name', 'required|trim');
			$this->form_validation->set_rules('last_name', 'last name', 'required|trim');
			// $this->form_validation->set_rules('email', 'email', 'required|trim');
			// $this->form_validation->set_rules('mobile_no', 'mobile', 'required|trim');

			if ($this->form_validation->run() === false) {
				$this->profile($_POST['mode']);
			} else {
				$this->_updateData();

				echo '<script>window.location.href="' . file_path() . '' . $this->uri->rsegment(1) . '/profile/view"</script>';

				header('Location: ' . file_path() . '' . $this->uri->rsegment(1) . '/profile/view');

				exit;
			}
		}
	}

	protected function _updateData() {

		$data = array();

		$data['fname'] = filter_data($_POST['first_name']);
		$data['lname'] = filter_data($_POST['last_name']);
		// $data['emailid'] = filter_data($_POST['email']);
		// $data['mobileno'] = filter_data($_POST['mobile_no']);

		if (isset($_FILES['upload_file']) && !empty($_FILES['upload_file']['name'])) {
			$this->handle_upload();
			$data['profile_pic'] = $_POST['file_name'];
		}

		if ($_POST['mode'] == 'edit') {

			$data['update_date'] = date('Y-m-d h:i:s');

			$this->comman_fun->update($data, 'membermaster', array('usercode' => $this->session->userdata['user']['usercode']));

			if (isset($_FILES['upload_file']) && !empty($_FILES['upload_file']['name'])) {
				$url = './upload/user/' . $_POST['old_file'];
				$url2 = './upload/user/thum/' . $_POST['old_file'];
				unlink($url);
				unlink($url2);
			}

			$this->session->set_flashdata("success", "Record Update Successfully.....");
		}
	}

	public function myProfile() {

		$this->load->view('web/common/top_header_user');

		$this->load->view('web/common/sidebar_user');

		$this->load->view('web/user_profile_view');

		$this->load->view('web/common/footer_user');

	}
	public function myBooking() {

		$this->load->view('web/common/top_header_user');

		$this->load->view('web/common/sidebar_user');

		$this->load->view('web/booking_view');

		$this->load->view('web/common/footer_user');
	}

	public function myWishlist() {

		$this->load->view('web/common/top_header_user');

		$this->load->view('web/common/sidebar_user');

		$this->load->view('web/wishlist_view');

		$this->load->view('web/common/footer_user');
	}

	// public function myDashboard(){

	// }

	// public function myWishlist(){

	// }

	public function searchGrid() {

		$this->load->view('web/common/top_header_web');

		$this->load->view('web/search_view');

		$this->load->view('web/common/footer_web');
	}

	public function changePassword() {

		$this->load->view('web/common/top_header_user');

		$this->load->view('web/common/sidebar_user');

		$this->load->view('web/change_password_view');

		$this->load->view('web/common/footer_user');
	}

	function change_password_insert() {

		$this->form_validation->set_rules('old_pass', 'Old Password', 'required|trim|callback_check_old_password');

		$this->form_validation->set_rules('new_pass', 'New Password', 'required|trim');

		$this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required|trim');

		if ($_POST['new_pass'] != $_POST['confirm_pass']) {

			echo "<script type='text/javascript'>alert('Match the New Password field');
					window.location='changePassword';
			</script>";exit;
		}

		if ($this->form_validation->run() === FALSE) {
			$this->changePassword();
		} else {
			$this->_change_password_insert();

			$this->session->set_flashdata('show_msg', array('class' => 'true', 'msg' => 'Password Changed Successfully'));
			echo "<script type='text/javascript'>alert('Password Changed Successfully');
					window.location='changePassword';
			</script>";
			exit;
		}
	}

	protected function _change_password_insert() {
		$data = array();
		$data['password'] = filter_data($_POST['new_pass']);
		$this->comman_fun->update($data, 'membermaster', array('usercode' => $this->session->userdata['user']['usercode']));

	}

	function check_old_password() {
		if (!$this->comman_fun->check_record('membermaster', array('usercode' => $this->session->userdata['user']['usercode'], 'password' => $_POST['old_pass']))) {
			$this->form_validation->set_message('check_old_password', 'Old password not match');
			echo "<script>alert('Old password not match')</script>";
			return FALSE;
		}
		return TRUE;
	}

	function check_new_password() {
		if ($this->comman_fun->check_record('membermaster', array('usercode' => $this->session->userdata['user']['usercode'], 'password' => $_POST['new_pass']))) {
			$this->form_validation->set_message('check_new_password', 'Enter Same Password');
			echo "<script>alert('Enter Same Password')</script>";
			return FALSE;
		}
		return TRUE;
	}

	function check_password() {

		if (!$this->comman_fun->check_record('membermaster', array('usercode' => $this->session->userdata['user']['usercode'], 'password' => $_POST['confirm_pass']))) {
			$this->form_validation->set_message('check_password', 'Invaild Password');
			echo "<script>alert('Invaild Password')</script>";
			return FALSE;
		}
		return TRUE;
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
}
