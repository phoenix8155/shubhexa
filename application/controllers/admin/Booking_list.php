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

		$this->load->model('admin/booking_list_model', 'ObjM', true);
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

			$getCountOrder = $this->comman_fun->count_record('cart_details',array('cart_id' => $result[$i]['cart_id'],'status'=>'Active'));
			
			$row = $i + 1;
			$html .= '<tr>
						<td>' . $row . '</td>
						<td>' . $result[$i]['fname'] . ' ' . $result[$i]['lname'] . '</td>
						<td>' . $result[$i]['mobileno'].'</td>
						<td>' . $result[$i]['emailid']. '</td>
						<td>' . date('d-m-Y',strtotime($result[$i]['order_date'])) . '</td>
						<td><a class="viewDetails" href="'.file_path().'admin/booking_list/bookingDetails/'.$result[$i]['cart_id'].'/'.$result[$i]['usercode'].'">' . $getCountOrder . '</a></td>
						<td>' . '₹. '.$result[$i]['total_amount'] . '</td>
						<td><div class="btn-group">
							<button class="btn btn_custom">
								<a href="'.file_path().'admin/booking_list/bookingDetails/'.$result[$i]['cart_id'].'/'.$result[$i]['usercode'].'">View</a>
							</button>';
			$html .= '</td>
					</tr>';
		}

		return $html;
	}
	public function bookingDetails($cart_id = Null,$usercode = Null) {

		$data['result'] = $this->ObjM->getBookingDetailsList($cart_id,$usercode);
		

		$page_info['menu_id'] = 'menu-Booking-list';

		$page_info['page_title'] = 'Booking Details View';

		$this->load->view('common/topheader');

		$this->load->view('common/header_admin', $page_info);

		$this->load->view('admin/booking_details_view', $data);

		$this->load->view('common/footer_admin');
	}
}
