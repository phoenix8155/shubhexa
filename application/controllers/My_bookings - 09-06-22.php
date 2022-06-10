<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_bookings extends CI_Controller {

	function __construct() {
		parent::__construct();
		if (!$this->session->userdata['user']) {
			header('Location: ' . file_path() . 'home');
			exit;
		}
		$this->load->model('Booking_model', 'ObjM', true);

		$this->load->library('upload');

		$this->load->library('image_lib');
	}

	public function index() {

		$this->view();

	}

	public function view() {

		$data['result'] = $this->ObjM->getList();

		$this->load->view('web/common/top_header_user');

		$this->load->view('web/common/sidebar_user');

		$this->load->view('web/booking_view', $data);

		$this->load->view('web/common/footer_user');
	}

	public function viewOrderDetails($cart_id) {

		if ($cart_id != "") {
			$data['cartResult'] = $this->ObjM->getCartDetailsList($cart_id);
		}

		$this->load->view('web/common/top_header_user');

		$this->load->view('web/common/sidebar_user');

		$this->load->view('web/order_details_view', $data);

		$this->load->view('web/common/footer_user');

	}

}
