<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy_policy extends CI_Controller {

	function __construct() {
		parent::__construct();

	}

	public function index() {

		$this->load->view('web/common/top_header_web');

		$this->load->view('web/privacy_policy_view');

		$this->load->view('web/common/footer_web');

	}
}
