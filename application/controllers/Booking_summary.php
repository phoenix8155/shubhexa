<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_summary extends CI_Controller {

	function __construct() {

		parent::__construct();

		if (!$this->session->userdata['user']) {
			header('Location: ' . file_path() . 'home');
			exit;
		}

		$this->load->model('Cart_model', 'ObjM', true);

	}

	public function index() {

		$this->view();

	}

	public function view() {

		$data['cartRes'] = $this->ObjM->getList();

		$this->load->view('web/common/top_header_user');

		$this->load->view('web/common/sidebar_user');

		$this->load->view('web/booking_summary_view', $data);

		$this->load->view('web/common/footer_user');
	}

	public function confirm($cartId) {
		if ($cartId != "") {

			//$resCMaster = $this->comman_fun->get_table_data('cart_master', array('cart_id' => $cart_id, 'payment_status' => 'pending', 'status' => 'Active', 'usercode' => $this->session->userdata['user']['usercode']));
			// update payment status later
			$UpdateData = array();

			$UpdateData['payment_status'] = 'confirm';

			$UpdateData['order_date'] = date('Y-m-d h:i:s');

			$UpdateData['update_date'] = date('Y-m-d h:i:s');

			$this->comman_fun->update($UpdateData, 'cart_master', array('cart_id' => $cartId));

			// insert celebrity task after payment status return success

			$resCartDetails = $this->comman_fun->get_table_data('cart_details', array('cart_id' => $cartId));

			
			
			if (count($resCartDetails) > 0) {

				for ($i = 0; $i < count($resCartDetails); $i++) {

					$data = array();

					$data['celebrity_id'] = $resCartDetails[$i]['celebrity_id'];

					$data['cart_id'] = $cartId;

					$data['usercode'] = $this->session->userdata['user']['usercode'];

					$data['cart_detail_id'] = $resCartDetails[$i]['id'];

					$data['video_name'] = '';

					$data['video_status'] = 'Initialize';

					$data['status'] = 'Active';

					$data['create_date'] = date('Y-m-d H:i:s');

					$data['update_date'] = date('Y-m-d h:i:s');

					$id = $this->comman_fun->addItem($data, 'celebrity_task_master');

					// Remove Celebrity From Whistlist

					$this->comman_fun->delete('wishlist_master', array('celebrity_id' => $resCartDetails[$i]['celebrity_id'], 'usercode' => $this->session->userdata['user']['usercode']));

				}
			}
			$this->success();
		}
	}

	public function success() {

		$this->load->view('web/common/top_header_web');

		$this->load->view('web/payment_success_view');

		$this->load->view('web/common/footer_web');
	}

}
