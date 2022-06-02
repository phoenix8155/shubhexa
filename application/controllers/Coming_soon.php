<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coming_soon extends CI_Controller {

	function __construct() {
		parent::__construct();

	}

	public function index() {

		$this->load->view('web/coming_soon_view');

	}
	public function view() {

		$this->load->view('web/coming_soon_view');

	}

	public function sendMail() {

		$email = $_POST['email'];

		$subject = 'Shubhexa - Notify me';

		$body = 'Please notify me when the shubhexa website is launch.';

		// $toEmail = 'minesh8155@gmail.com'; //'shubhexa@gmail.com'; //minesh8155@gmail.com
		// $headers = 'MIME-Version: 1.0' . "\r\n";
		// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// $headers .= 'From:' . $email . '' . "\r\n";
		// mail($toEmail, $subject, $body, $headers);

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

	function test1() {

		$email = 'mineshvadtal@gmail.com';

		$subject = 'Shubhexa - Notify mewwwww';

		$body = 'Please notify me when the shubhexa website is launch.';

		$toEmail = 'minesh8155@gmail.com'; //minesh8155@gmail.com //shubhexa@gmail.com

		$this->load->library('email');
		$config = array(
			'mailtype' => 'text',
			'charset' => 'utf-8',
			'priority' => '1',
		);
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from('mineshvadtal@gmail.com', 'mineshvadtal');
		$this->email->to($toEmail);
		$this->email->subject($subject);
		$this->email->message($body);
		///$this->email->send();
		if ($this->email->send()) {
			//echo $this->email->print_debugger();
			echo "send";exit;
		} else {
			//echo $this->email->print_debugger();
			echo "not send";exit;
		}

		exit;
	}

}
