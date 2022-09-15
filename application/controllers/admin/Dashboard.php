<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!is_logged_admin()) {

			header('Location: ' . file_path() . 'login');
			exit;

		}

		$this->load->model('Member_module', 'ObjM', TRUE);

	}

	public function index() {

		$this->view();

	}

	public function view() {

		$page_info['menu_id'] = 'menu-dashboard';

		$page_info['page_title'] = 'Dashboard';

		$data['resCategory'] = $this->ObjM->getTotCategory();
		
		$data['resCelebrity'] = $this->ObjM->getTotCelebrity();
		
		$data['resUser'] = $this->ObjM->getTotUser();
		
		$data['resTestimonials'] = $this->ObjM->getTotTestimonials();

		
		$data['resPromocode'] = $this->ObjM->getTotPromocode();
		
		$data['resTemplates'] = $this->ObjM->getTotTemplates();
		
		$data['resBookings'] = $this->ObjM->getTotBookings();

		$data['resTodayBookings'] = $this->ObjM->getTodaysTotBookings();

		$data['resTotAmtReceived'] = $this->ObjM->getTotAmountsReceived();

		$data['resTodayTotAmtReceived'] = $this->ObjM->getTodayTotAmountsReceived();

		$this->load->view('common/topheader');

		$this->load->view('common/header_admin', $page_info);

		$this->load->view('admin/dashboard_view', $data);

		$this->load->view('common/footer_admin');

	}

}
