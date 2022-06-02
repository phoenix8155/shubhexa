<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Testimonial_model', 'ObjM', true);
	}

	public function index() {

		$data['result'] = $this->ObjM->getTestimonials();

		$this->load->view('web/common/top_header_web');

		$this->load->view('web/testimonial_view', $data);

		$this->load->view('web/common/footer_web');

	}
}
