<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class My_requested_video_list extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!is_login('celebs')) {

			header('Location: ' . file_path() . 'login');
			exit;

		}

		$this->load->library('upload');

		$this->load->library('image_lib');

		$this->load->model('admin/my_requested_video_list_model', 'ObjM', true);

	}

	public function index() {

		$this->view();

	}

	public function view() {

		$page_info['menu_id'] = 'menu-req-video-list';

		$page_info['page_title'] = 'My Requested Video List';

		$this->load->view('common/topheader');

		$this->load->view('common/header_celebrity', $page_info);

		$this->load->view('celebrity/my_requested_video_list_view');

		$this->load->view('common/footer_admin');

	}

	function addnew($mode = null, $eid = null) {

		if ($mode == 'edit') {
			$data['form_set'] = array('mode' => 'edit', 'eid' => $eid);

			$data['result'] = $this->ObjM->get_record($eid);
		} else {
			$data['form_set'] = array('mode' => 'add');
		}

		$page_info['menu_id'] = 'menu-req-video-list';

		$page_info['page_title'] = 'My Requested Video List';

		$this->load->view('common/topheader');

		$this->load->view('common/header_admin', $page_info);

		$this->load->view('admin/' . $this->uri->rsegment(1) . '_add', $data);

		$this->load->view('common/footer_admin');
	}

	function insert() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('occasion_title', 'occasion title', 'required|trim');

			if ($this->form_validation->run() === false) {
				$this->addnew($_POST['mode'], $_POST['eid']);
			} else {
				$this->_insert();

				echo '<script>window.location.href="' . file_path('admin') . '' . $this->uri->rsegment(1) . '/view"</script>';

				header('Location: ' . file_path('admin') . '' . $this->uri->rsegment(1) . '/view');

				exit;
			}
		}
	}

	protected function _insert() {

		$data = array();

		$data['occasion_title'] = filter_data($_POST['occasion_title']);

		if ($_POST['mode'] == 'add') {

			$data['status'] = 'Active';

			$data['create_date'] = date('Y-m-d h:i:s');

			$data['update_date'] = date('Y-m-d h:i:s');

			$this->comman_fun->additem($data, 'occasion_master');

			$this->session->set_flashdata("success", "Record Insert Successfully.....");
		}
		if ($_POST['mode'] == 'edit') {

			$data['update_date'] = date('Y-m-d h:i:s');

			$this->comman_fun->update($data, 'occasion_master', array('id' => $_POST['eid']));

			$this->session->set_flashdata("success", "Record Update Successfully.....");
		}
	}

	function status_update($st, $eid) {

		$record = $this->comman_fun->get_table_data('occasion_master', array('id' => $eid));

		$data['status'] = $st;

		$this->comman_fun->update($data, 'occasion_master', array('id' => $eid));

		$this->session->set_flashdata('show_msg', array('class' => 'true', 'msg' => 'Status ' . $st . ' Successfully.....'));

		redirect(file_path('admin') . "" . $this->uri->rsegment(1) . "/view");
	}

	function delete_record($eid) {

		$record = $this->comman_fun->get_table_data('occasion_master', array('id' => $eid));

		$data['status'] = 'Delete';

		$this->comman_fun->update($data, 'occasion_master', array('id' => $eid));

		$this->session->set_flashdata('show_msg', array('class' => 'true', 'msg' => 'Record Delete Successfully.....'));

		redirect(file_path('admin') . "" . $this->uri->rsegment(1) . "/view");
	}

}
