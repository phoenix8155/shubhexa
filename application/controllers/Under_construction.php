<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Under_construction extends CI_Controller {

	function __construct() {
		parent::__construct();

	}

	public function index() {

		$this->load->view('web/under_construction_view');

	}
	public function view() {

		$this->load->view('web/under_construction_view');

	}

	public function sendMail() {

		$email = $_POST['email'];

		$subject = 'Shubhexa - Notify me';

		$body = 'Please notify me when the shubhexa website is launch.';

		$toEmail = 'shubhexa@gmail.com'; //'shubhexa@gmail.com'; //minesh8155@gmail.com
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
		$this->email->send();

		$this->session->set_flashdata('msg_show', array('class' => 'true', 'msg' => 'Thank You for your interest.'));
		header('Location: ' . file_path() . $this->uri->rsegment(1));

		exit;
	}

}
