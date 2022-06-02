<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_wishlist extends CI_Controller {

	function __construct() {
		parent::__construct();
		if (!$this->session->userdata['user']) {
			header('Location: ' . file_path() . 'home');
			exit;
		}
		$this->load->model('Wishlist_model', 'ObjM', true);

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

		$this->load->view('web/wishlist_view', $data);

		$this->load->view('web/common/footer_user');
	}

	public function removeFromWishlist($id) {

		if ($id != "") {

			$this->comman_fun->delete('wishlist_master', array('id' => $id, 'usercode' => $this->session->userdata['user']['usercode']));
			echo "<script type='text/javascript'>alert('Removed from wishlist.');
					window.location.href='" . file_path() . "my_wishlist';
			</script>";
			exit;

		} else {
			echo "<script type='text/javascript'>alert('Something went wrong.');
					window.location.href='" . file_path() . "my_wishlist';
			</script>";
			exit;
		}

	}

}
