<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();

	}

	public function index() {

		$this->load->view('web/common/top_header_web');

		$this->load->view('web/home_view');

		$this->load->view('web/common/footer_web');

	}
}
