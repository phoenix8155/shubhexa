<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class User_list extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!is_logged_admin()) {
			header('Location: ' . file_path() . 'login');

			exit;
		}

		$this->load->model('admin/user_model', 'ObjM', true);
	}

	public function view() {

		$data['html'] = $this->listing();

		$page_info['menu_id'] = 'menu-user-list';

		$page_info['page_title'] = 'User List';

		$this->load->view('common/topheader');

		$this->load->view('common/header_admin', $page_info);

		$this->load->view('admin/' . $this->uri->rsegment(1) . '_view', $data);

		$this->load->view('common/footer_admin');
	}

	function listing() {

		$result = $this->ObjM->getAllUser();
		//var_dump($result);exit;

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
			$user_name =$result[$i]['fname'] . ' ' . $result[$i]['lname'] ;
			$row = $i + 1;
			$html .= '<tr>
						<td width="2%"><input type="checkbox" class="wall_chk" name="checkbox[]" value=' . $result[$i]["usercode"] . '></td>
						<td width="2%">' . $row . '</td>
						<td width="15%">' . $user_name. '</td>
						<td width="10%">' . $result[$i]['mobileno'] . '</td>
						<td width="10%">' . $result[$i]['emailid'] . '</td>
						<td width="5%">' . date('d-m-Y', strtotime($result[$i]['create_date'])) . '</td>
						<td width="5%"><div class="btn-group">
						<button class="btn dropdown-toggle ' . $cls . ' btn_custom" data-toggle="dropdown">' . $current_status . ' <i class="fa fa-angle-down"></i> </button>
						<ul class="dropdown-menu pull-right">
							<li><a class="status_change" href="' . file_path('admin') . '' . $this->uri->rsegment(1) . '/status_update/' . $update_status . '/' . $result[$i]['usercode'] . '">' . $update_status . '</a></li>
							<li><a href="' . file_path('admin') . '' . $this->uri->rsegment(1) . '/profileView/' . $result[$i]['usercode'] . '">View</a></li>';
			$html .= '<li><a class="delete_record" href="' . file_path('admin') . '' . $this->uri->rsegment(1) . '/delete_record/' . $result[$i]['usercode'] . '">Delete</a></li>';
			$html .= '</ul>
						</div>
						</td>
					</tr>';
		}

		return $html;
	}

	function status_update($st, $eid) {

		$record = $this->comman_fun->get_table_data('membermaster', array('usercode' => $eid));

		$data['status'] = $st;

		$this->comman_fun->update($data, 'membermaster', array('usercode' => $eid));

		$this->session->set_flashdata('show_msg', array('class' => 'true', 'msg' => 'Status ' . $st . ' Successfully.....'));

		redirect(file_path('admin') . "" . $this->uri->rsegment(1) . "/view");
	}

	function delete_record($eid) {

		$record = $this->comman_fun->get_table_data('membermaster', array('usercode' => $eid));

		//$data['status'] = 'Delete';

		//$this->comman_fun->update($data, 'membermaster', array('usercode' => $eid));
		$this->comman_fun->delete('membermaster', array('usercode' => $eid));

		$this->session->set_flashdata('show_msg', array('class' => 'true', 'msg' => 'Record Delete Successfully.....'));

		redirect(file_path('admin') . "" . $this->uri->rsegment(1) . "/view");
	}

	public function deleteMultiple() {
		$id = $_REQUEST['unique_id'];
		$id = explode(',', $id);
		for ($i = 0; $i < count($id); $i++) {
			if ($id[$i] != '') {
				$this->comman_fun->delete('membermaster', array('usercode' => $id[$i]));
			}
		}

	}

	public function profileView($usercode = Null) {

		$data['result'] = $this->comman_fun->get_table_data('membermaster', array('usercode' => $usercode));

		$page_info['menu_id'] = 'menu-user-list';

		$page_info['page_title'] = 'Profile View';

		$this->load->view('common/topheader');

		$this->load->view('common/header_admin', $page_info);

		$this->load->view('admin/' . $this->uri->rsegment(1) . '_profile_view', $data);

		$this->load->view('common/footer_admin');
	}
}
