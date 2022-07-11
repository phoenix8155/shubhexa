<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Feedback_list extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!is_logged_admin()) {
			header('Location: ' . file_path() . 'login');

			exit;
		}

		$this->load->model('admin/feedback_list_model', 'ObjM', true);
	}

	public function view() {

		$data['html'] = $this->listing();

		$page_info['menu_id'] = 'menu-feedback-list';

		$page_info['page_title'] = 'Feedback List';

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

			$userType = ($result[$i]['role_type'] == 3) ? 'User :' : 'Celebrity :';
			$getuserDetails = $this->comman_fun->get_table_data('membermaster',array('usercode'=>$result[$i]['usercode'],'status' => 'Active'));
			$userName = $getuserDetails[0]['fname'].' '.$getuserDetails[0]['lname'];
			$row = $i + 1;
			$html .= '<tr>
						<td width="2%"><input type="checkbox" class="wall_chk" name="checkbox[]" value=' . $result[$i]["id"] . '></td>
						<td width="2%">' . $row . '</td>
						<td width="10%">' . $userType.' '.$userName . '</td>
						<td width="10%">' . $result[$i]['emailid'] . '</td>
						<td width="10%">' . $result[$i]['mobileno'] . '</td>
						<td width="10%">' . $result[$i]['feedback'] . '</td>
						<td width="5%">' . date('d-m-Y', strtotime($result[$i]['create_date'])) . '</td>';
			$html .= '<td width="5%"><a class="delete_record btn btn-danger" href="' . file_path('admin') . '' . $this->uri->rsegment(1) . '/delete_record/' . $result[$i]['id'] . '">Delete</a></td>';
			$html .= '</tr>';
		}

		return $html;
	}
	function delete_record($eid) {

		$record = $this->comman_fun->get_table_data('feedback', array('id' => $eid));

		$data['status'] = 'Delete';

		$this->comman_fun->update($data, 'feedback', array('id' => $eid));

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
				$this->comman_fun->update($data, 'feedback', array('id' => $id[$i]));
			}
		}

	}
}
