<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Contact_list extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!is_logged_admin()) {
			header('Location: ' . file_path() . 'login');

			exit;
		}

		$this->load->model('admin/contact_list_model', 'ObjM', true);
	}

	public function view() {

		$data['html'] = $this->listing();

		$page_info['menu_id'] = 'menu-contact-list';

		$page_info['page_title'] = 'Contact List';

		$this->load->view('common/topheader');

		$this->load->view('common/header_admin', $page_info);

		$this->load->view('admin/' . $this->uri->rsegment(1) . '_view', $data);

		$this->load->view('common/footer_admin');
	}

	function listing() {

		$result = $this->ObjM->getAll();

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
						<td width="10%">' . $result[$i]['name'] . '</td>
						<td width="10%">' . $result[$i]['email'] . '</td>
						<td width="10%">' . $result[$i]['phone'] . '</td>
						<td width="10%">' . $result[$i]['subject'] . '</td>
						<td width="12%">' . $result[$i]['message'] . '</td>
						<td width="5%">' . date('d-m-Y', strtotime($result[$i]['create_date'])) . '</td>
						<td width="5%"><div class="btn-group">
						<button class="btn dropdown-toggle ' . $cls . ' btn_custom" data-toggle="dropdown">' . $current_status . ' <i class="fa fa-angle-down"></i> </button>
						<ul class="dropdown-menu pull-right">';
			$html .= '<li><a class="delete_record" href="' . file_path('admin') . '' . $this->uri->rsegment(1) . '/delete_record/' . $result[$i]['id'] . '">Delete</a></li>';
			$html .= '</ul>
						</div>
						</td>
					</tr>';
		}

		return $html;
	}

	function status_update($st, $eid) {

		$record = $this->comman_fun->get_table_data('contact_master', array('id' => $eid));

		$data['status'] = $st;

		$this->comman_fun->update($data, 'contact_master', array('id' => $eid));

		$this->session->set_flashdata('show_msg', array('class' => 'true', 'msg' => 'Status ' . $st . ' Successfully.....'));

		redirect(file_path('admin') . "" . $this->uri->rsegment(1) . "/view");
	}

	function delete_record($eid) {

		$record = $this->comman_fun->get_table_data('contact_master', array('id' => $eid));

		$data['status'] = 'Delete';

		$this->comman_fun->update($data, 'contact_master', array('id' => $eid));

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
				$this->comman_fun->update($data, 'contact_master', array('id' => $id[$i]));
			}
		}

	}

	function exportData() {

		$result = $this->ObjM->getAll();

		//mysqli_query("SET NAMES utf8");

		$output .= '"No",';
		$output .= '"Name",';
		$output .= '"Email",';
		$output .= '"Phone",';
		$output .= '"Subject",';
		$output .= '"Message",';
		$output .= '"Entry Date",';
		$output .= "\n";

		for ($i = 0; $i < count($result); $i++) {
			$rowcount = $i + 1;
			$output .= '"' . $rowcount . '",';
			$output .= '"' . $result[$i]['name'] . '",';
			$output .= '"' . $result[$i]['email'] . '",';
			$output .= '"' . $result[$i]['phone'] . '",';
			$output .= '"' . $result[$i]['subject'] . '",';
			$output .= '"' . $result[$i]['message'] . '",';
			$output .= '"' . date('d-m-Y', strtotime($result[$i]['create_date'])) . '",';
			$output .= "\n";

		}

		$dt = date("d-m-Y");
		$filename = "contact_form_list_" . $dt;
		header('Cache-Control: max-age=0'); //no cache
		header('Content-Transfer-Encoding: binary');
		header('Pragma: public');
		header('Content-Encoding: UTF-8');
		header('Content-type: text/csv; charset=UTF-8');
		header('Content-Disposition: attachment; filename=' . $filename . '.csv');
		echo "\xEF\xBB\xBF"; // UTF-8 BOM
		echo $output;
	}

}
