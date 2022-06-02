<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct() {
		parent::__construct();

	}

	public function index() {

		$this->load->view('web/common/top_header_web');

		$this->load->view('web/contact_view');

		$this->load->view('web/common/footer_web');

	}
	public function view() {

		$this->load->view('web/common/top_header_web');

		$this->load->view('web/contact_view');

		$this->load->view('web/common/footer_web');

	}

	function check() {
		//var_dump($_POST);exit;

		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			$this->form_validation->set_rules('name', 'name', 'required|trim');

			$this->form_validation->set_rules('phone', 'phone', 'required|trim');

			$this->form_validation->set_rules('email', 'email', 'required|trim');

			$this->form_validation->set_rules('subject', 'subject', 'required|trim');

			$this->form_validation->set_rules('message', 'message', 'required|trim');

			//$this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_check_google_validate_captcha');

			if ($this->form_validation->run() === FALSE) {
				//echo "ee";exit;
				$this->view();
			} else {

				$this->_check();

				//$this->session->set_flashdata('msg_show', 'Thank You for contacting us. We will contact you as soon as possible.');

				header('Location: ' . file_path() . $this->uri->rsegment(1));

				exit;

			}
		}
	}
	protected function _check() {

		$data = array();

		$data['name'] = $_POST['name'];

		$data['email'] = $_POST['email'];

		$data['phone'] = $_POST['phone'];

		$data['subject'] = $_POST['subject'];

		$data['message'] = $_POST['message'];

		$data['status'] = 'Active';

		$data['create_date'] = date('Y-m-d H:i:s');

		$this->comman_fun->addItem($data, 'contact_master');

		$this->session->set_flashdata('msg_show', array('class' => 'true', 'msg' => 'Thank You for contacting us. We will contact you as soon as possible.'));

		$name = $_POST['name'];

		$email = $_POST['email'];

		$phone = $_POST['phone'];

		$subject = $_POST['subject'];

		$msg = $_POST['message'];

		$body = "Details are below: <br>Name : $name<br> Email : $email<br> Phone No : $phone <br> subject : $subject <br>Message : $msg <br>";

		$this->load->library('email');
		$config = array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1',
		);
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		$this->email->from($email, $name);

		$this->email->to('shubhexa@gmail.com'); //shubhexa@gmail.com

		$this->email->subject($subject);

		$this->email->message($body);

		$this->email->send();

		// $toEmail = 'shubhexa@gmail.com';
		// $email = $_POST['email'];
		// $headers = 'MIME-Version: 1.0' . "\r\n";
		// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// $headers .= 'From:' . $email . '' . "\r\n";
		// mail($toEmail, $subject, $body, $headers);
	}

	//google captcha testing for localhost
	//Site key: 6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI
	//Secret key: 6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe

	//live seceret key : 6LeVSpsUAAAAANh8dFGywQ5HkFR2aWKxwKvkjYPh
	//Site key: 6LeVSpsUAAAAAN-zJPAJirizQ4Uo8zk5eEU86cmz

	// function check_google_validate_captcha() {

	// 	$google_captcha = $this->input->post('g-recaptcha-response');

	// 	$google_response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe&response=" . $google_captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);

	// 	if ($google_response . 'success' == false) {

	// 		$this->form_validation->set_message('check_google_validate_captcha', 'Please check the the captcha form');

	// 		return FALSE;

	// 	} else {

	// 		return TRUE;
	// 	}
	// }
}
