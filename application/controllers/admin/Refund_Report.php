<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Refund_Report extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!is_logged_admin()) {
			header('Location: ' . file_path() . 'login');

			exit;
		}

		$this->load->model('admin/refund_report_model', 'ObjM', true);
	}

	public function view() {

		$data['html'] = $this->listing();

		$page_info['menu_id'] = 'menu-refund-report';

		$page_info['page_title'] = 'Refund Report';

		$this->load->view('common/topheader');

		$this->load->view('common/header_admin', $page_info);

		$this->load->view('admin/' . $this->uri->rsegment(1) . '_view', $data);

		$this->load->view('common/footer_admin');
	}

	function listing() {

		$result = $this->ObjM->getBookingRefundList();

		$html = '';

		

		for ($i = 0; $i < count($result); $i++) {

			$row = $i + 1;
			$html .= '<tr>
						<td>' . $row . '</td>
						<td>' . $result[$i]['razorpay_refund_id'] . '</td>
						<td>' . $result[$i]['fname'] . ' ' . $result[$i]['lname'] . '</td>
						<td>' . $result[$i]['mobileno'].'</td>
						<td>' . $result[$i]['emailid']. '</td>
						<td>' . $result[$i]['celebs_name']. '</td>
						<td>' . $result[$i]['order_no']. '</td>
						<td>' . date('d-m-Y',strtotime($result[$i]['create_date'])) . '</td>
						<td>' . '₹. '.$result[$i]['cancel_amount'] . '</td>';
			$html .= '</td> 
					</tr>';
		}

		return $html;
	}

	public function export()
    {
        //$this->page_permission->_export();
        $result = $this->ObjM->getBookingRefundList();

        mysqli_query("SET NAMES utf8");
        
        $output .= '"Sr No",';
		$output .= '"Refund Id",';
        $output .= '"Name",';
        $output .= '"Mobile No",';
        $output .= '"Email ID",';
        $output .= '"Celebrity",';
		$output .= '"Order Number",';
		$output .= '"Refund Date",';
		$output .= '"Total Amount",';
        $output .="\n";
		$total = 0;
		for ($i=0; $i<count($result); $i++) {
            
            $rowcount=$i+1;
            $output .='"'.$rowcount.'",';
			$output .='"'.$result[$i]['razorpay_refund_id'].'",';
            $output .='"'.$result[$i]['fname'].''.$result[$i]['lname'].'",';
            $output .='"'.$result[$i]['mobileno'].'",';
            $output .='"'.$result[$i]['emailid'].'",';
			$output .='"'.$result[$i]['celebs_name'].'",';
			$output .='"'.$result[$i]['order_no'].'",';
            $output .='"'.date('d-m-Y',strtotime($result[$i]['create_date'])).'",';
			$output .='"'.'₹. '.$result[$i]['cancel_amount'].'",';
            $output .="\n";

			$total += $result[$i]['cancel_amount'];
        }
        
		$output .= '"Total Amount",';
		$output .= '"",';
		$output .= '"",';
		$output .= '"",';
		$output .= '"",';
		$output .= '"",';
		$output .= '"",';
		$output .= '"",';
		$output .= '"'.'₹. '.$total.'",';
		

        $dt = date("d-F-Y");
        $filename = "refund_report_".$dt;
        
        header("content-type:application/csv;charset=UTF-8");
        header('Content-Disposition: attachment; filename='.$filename.'.csv');
        echo "\xEF\xBB\xBF";
        header('Cache-Control: max-age=0'); //no cache
        header('Content-Transfer-Encoding: binary');
        header('Pragma: public');
        echo $output;
    }
}
