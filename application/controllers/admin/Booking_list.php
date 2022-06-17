<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Booking_list extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!is_logged_admin()) {
			header('Location: ' . file_path() . 'login');

			exit;
		}

		$this->load->model('admin/booking_model', 'ObjM', true);
	}

	public function view() {

		$data['html'] = $this->listing();

		$page_info['menu_id'] = 'menu-booking-list';

		$page_info['page_title'] = 'Booking List';

		$this->load->view('common/topheader');

		$this->load->view('common/header_admin', $page_info);

		$this->load->view('admin/' . $this->uri->rsegment(1) . '_view', $data);

		$this->load->view('common/footer_admin');
	}

	function listing() {

		$result = $this->ObjM->getBookingUserList();

		$html = '';

		for ($i = 0; $i < count($result); $i++) {
			
			$row = $i + 1;
			$html .= '<tr>
						<td>' . $row . '</td>
						<td>' . $result[$i]['fname'] . ' ' . $result[$i]['lname'] . '</td>
						<td>' . $result[$i]['mobileno'].'</td>
						<td>' . $result[$i]['emailid']. '</td>
						<td>' . date('d-m-Y',strtotime($result[$i]['order_date'])) . '</td>
						<td>' . '₹. '.$result[$i]['total_amount'] . '</td>
						<td><div class="btn-group">
							<button class="btn btn_custom">
								<a href="javascript:void(0)">View</a>
							</button>';
			$html .= '</td>
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

		$data['status'] = 'Delete';

		$this->comman_fun->update($data, 'membermaster', array('usercode' => $eid));

		$this->session->set_flashdata('show_msg', array('class' => 'true', 'msg' => 'Record Delete Successfully.....'));

		redirect(file_path('admin') . "" . $this->uri->rsegment(1) . "/view");
	}

	public function profileView($usercode = Null) {

		$data['result'] = $this->comman_fun->get_table_data('membermaster', array('usercode' => $usercode));

		$page_info['menu_id'] = 'menu-celebrity-list';

		$page_info['page_title'] = 'Profile View';

		$this->load->view('common/topheader');

		$this->load->view('common/header_admin', $page_info);

		$this->load->view('admin/' . $this->uri->rsegment(1) . '_profile_view', $data);

		$this->load->view('common/footer_admin');
	}
}
