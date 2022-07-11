<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class Promocode_list extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!is_logged_admin()) {
			header('Location: ' . file_path() . 'login');

			exit;
		}

		$this->load->model('admin/promocode_model', 'ObjM', true);
	}

	public function view() {

		$data['html'] = $this->listing();

		$page_info['menu_id'] = 'menu-promocode-list';

		$page_info['page_title'] = 'Promocode List';

		$this->load->view('common/topheader');

		$this->load->view('common/header_admin', $page_info);

		$this->load->view('admin/' . $this->uri->rsegment(1) . '_view', $data);

		$this->load->view('common/footer_admin');
	}

	function listing() {

		$result = $this->ObjM->getAllCategory();

		$html = '';

		for ($i = 0; $i < count($result); $i++) {
			if ($result[$i]['status'] == 'Active') {
				$current_status = 'Active';
				$update_status = 'Inactive';
				$cls = 'btn-success';
			} else {
				$current_status = 'Inactive';
				$update_status = 'Active';
				$cls = 'btn-danger';
			}

			// <td>'.$result[$i]['amount'].'</td>

			$row = $i + 1;
			$html .= '<tr>
						<td width="2%"><input type="checkbox" class="wall_chk" name="checkbox[]" value=' . $result[$i]["id"] . '></td>
						<td width="2%">' . $row . '</td>
						<td width="5%">' . $result[$i]['promocode'] . '</td>
						<td width="5%">' . date('d-m-Y', strtotime($result[$i]['start_date'])) . '</td>
						<td width="5%">' . date('d-m-Y', strtotime($result[$i]['end_end'])) . '</td>
						<td width="5%"><div class="btn-group">
						<button class="btn dropdown-toggle ' . $cls . ' btn_custom" data-toggle="dropdown">' . $current_status . ' <i class="fa fa-angle-down"></i> </button>
						<ul class="dropdown-menu pull-right">
							<li><a class="status_change" href="' . file_path('admin') . '' . $this->uri->rsegment(1) . '/status_update/' . $update_status . '/' . $result[$i]['id'] . '">' . $update_status . '</a></li>
							<li><a href="' . file_path('admin') . '' . $this->uri->rsegment(1) . '/addnew/edit/' . $result[$i]['id'] . '">Edit</a></li>';
			$html .= '<li><a class="delete_record" href="' . file_path('admin') . '' . $this->uri->rsegment(1) . '/delete_record/' . $result[$i]['id'] . '">Delete</a></li>';
			$html .= '</ul>
						</div>
						</td>
					</tr>';
		}

		return $html;
	}

	function addnew($mode = null, $eid = null) {

		if ($mode == 'edit') {
			$data['form_set'] = array('mode' => 'edit', 'eid' => $eid);

			$data['result'] = $this->ObjM->get_record($eid);
		} else {
			$data['form_set'] = array('mode' => 'add');
		}

		$page_info['menu_id'] = 'menu-promocode-list';

		$page_info['page_title'] = 'Promocode List';

		$this->load->view('common/topheader');

		$this->load->view('common/header_admin', $page_info);

		$this->load->view('admin/' . $this->uri->rsegment(1) . '_add', $data);

		$this->load->view('common/footer_admin');
	}

	function insert() {
		//var_dump($_POST);exit;

		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			if ($_POST['mode'] == 'edit') {
				$this->form_validation->set_rules('promocode', 'promocode', 'required|trim|callback_check_edit_unique_promocode');
			} else {
				$this->form_validation->set_rules('promocode', 'promocode', 'required|trim|callback_check_add_unique_promocode');
			}

			$this->form_validation->set_rules('start_date', 'start date', 'required|trim|callback_check_valid_start_date');

			$this->form_validation->set_rules('end_end', 'end end', 'required|trim|callback_check_valid_end_date');

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

	function check_add_unique_promocode() {

		$promocode = $this->input->post('promocode');

		$res = $this->ObjM->check_promocode($promocode);

		if (count($res) > 0) {
			$this->form_validation->set_message('check_add_unique_promocode', 'This promocode id is already taken. Please use a different promocode.');

			return false;
		} else {
			return true;
		}
	}

	function check_edit_unique_promocode() {

		$id = $this->input->post('eid');

		$promocode = $this->input->post('promocode');

		$res = $this->ObjM->get_record_promocode_not_in($id, $promocode);

		if (count($res) > 0) {
			$this->form_validation->set_message('check_edit_unique_promocode', 'This promocode is already taken. Please use a different promocode.');

			return false;
		} else {
			return true;
		}
	}

	function check_valid_start_date() {

		$start_date = $this->input->post('start_date');

		$today_date = date('Y-m-d');

		if ($today_date <= $start_date) {
			return true;
		} else {
			$this->form_validation->set_message('check_valid_start_date', 'please choose valid date, start date does not smaller than todays date.');
			return false;

		}

	}

	function check_valid_end_date() {

		$start_date = $this->input->post('start_date');
		$end_end = $this->input->post('end_end');
		$today_date = date('Y-m-d');

		if ($today_date <= $start_date) {

			//return true;

			if ($start_date <= $end_end) {

				return true;
			} else {
				$this->form_validation->set_message('check_valid_end_date', 'please choose valid date, start date does not smaller than end date.');
				return false;
			}
		} else {
			$this->form_validation->set_message('check_valid_end_date', 'please choose valid date, start date does not smaller than todays date.');
			return false;

		}

	}

	protected function _insert() {

		$data = array();

		$data['promocode'] = filter_data($_POST['promocode']);

		$data['start_date'] = date('Y-m-d', strtotime($_POST['start_date']));

		$data['end_end'] = date('Y-m-d', strtotime($_POST['end_end']));

		if ($_POST['mode'] == 'add') {

			$data['status'] = 'Active';

			$data['create_date'] = date('Y-m-d h:i:s');

			$data['update_date'] = date('Y-m-d h:i:s');

			$this->comman_fun->additem($data, 'promocode_master');

			$this->session->set_flashdata("success", "Record Insert Successfully.....");
		}
		if ($_POST['mode'] == 'edit') {

			$data['update_date'] = date('Y-m-d h:i:s');

			$this->comman_fun->update($data, 'promocode_master', array('id' => $_POST['eid']));

			$this->session->set_flashdata("success", "Record Update Successfully.....");
		}
	}

	function status_update($st, $eid) {

		$record = $this->comman_fun->get_table_data('promocode_master', array('id' => $eid));

		$data['status'] = $st;

		$this->comman_fun->update($data, 'promocode_master', array('id' => $eid));

		$this->session->set_flashdata('show_msg', array('class' => 'true', 'msg' => 'Status ' . $st . ' Successfully.....'));

		redirect(file_path('admin') . "" . $this->uri->rsegment(1) . "/view");
	}

	function delete_record($eid) {

		$record = $this->comman_fun->get_table_data('promocode_master', array('id' => $eid));

		$data['status'] = 'Delete';

		$this->comman_fun->update($data, 'promocode_master', array('id' => $eid));

		$this->session->set_flashdata('show_msg', array('class' => 'true', 'msg' => 'Record Delete Successfully.....'));

		redirect(file_path('admin') . "" . $this->uri->rsegment(1) . "/view");
	}

	public function deleteMultiple() {
		$id = $_REQUEST['unique_id'];
		$id = explode(',', $id);
		$data = array();
		$data['status'] = 'Delete';
		for ($i = 0; $i < count($id); $i++) {
			if ($id[$i] != '') {
				$this->comman_fun->update($data, 'promocode_master', array('id' => $id[$i]));
			}
		}

	}
}
