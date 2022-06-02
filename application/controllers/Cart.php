<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

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

		//echo $this->db->last_query();exit;

		//$data['totalCartAmount'] = $this->ObjM->getCartValue();

		$this->load->view('web/common/top_header_user');

		$this->load->view('web/common/sidebar_user');

		$this->load->view('web/cart_view', $data);

		$this->load->view('web/common/footer_user');

	}

	public function removeFromCart() {

		$data_id = $_POST['data_id'];

		if ($data_id != "") {

			$recorddetails = $this->comman_fun->get_table_data('cart_details', array('id' => $data_id));

			$recordMaster = $this->comman_fun->get_table_data('cart_master', array('cart_id' => $recorddetails[0]['cart_id']));

			$UpdateData['total_amount'] = $recordMaster[0]['total_amount'] - $recorddetails[0]['amount'];

			$UpdateData['update_date'] = date('Y-m-d h:i:s');

			$this->comman_fun->update($UpdateData, 'cart_master', array('cart_id' => $recorddetails[0]['cart_id']));

			$this->comman_fun->delete('cart_details', array('id' => $data_id));

			$response = true;
			echo json_encode($response);exit;

		} else {
			$response = false;
			echo json_encode($response);exit;
		}

	}

	public function calculateTotalCartAmount($cart_id) {

		$res = $this->ObjM->getCartTotAmount($cart_id);
		//echo $this->db->last_query();exit;
		if ($res[0]['tot_cart_amount'] != "") {
			return $res[0]['tot_cart_amount'];
		} else {
			return 0;
		}

	}
}
