<?php
Class Refund_Report_model extends CI_Model {

	function getBookingRefundList() {

		$all_type = $this->input->get('all_type');
        $date_filter = $this->input->get('date_filter');


		$this->db->select('cancel_order_payment.*');

        $this->db->select('membermaster.usercode,membermaster.fname,membermaster.lname,membermaster.emailid,membermaster.mobileno,membermaster.status');

		$this->db->select('cart_master.cart_id AS carMasterId,cart_master.order_no,cart_master.status');

        $this->db->select('cart_details.id AS cartDetailsId,cart_details.celebrity_id');

        $this->db->select('celebrity_master.id AS celebrityMasterId,CONCAT(celebrity_master.fname,celebrity_master.lname) AS celebs_name,celebrity_master.status');

        $this->db->from('cancel_order_payment');

        $this->db->join('cart_master', 'cart_master.cart_id=cancel_order_payment.cart_id', 'left');
       
        $this->db->join('membermaster', 'membermaster.usercode=cart_master.usercode', 'left');

        $this->db->join('cart_details', 'cart_details.id=cancel_order_payment.cart_details_id', 'left');

        $this->db->join('celebrity_master', 'celebrity_master.id=cart_details.celebrity_id', 'left');

        if($date_filter != '') {

            $dateFilters = explode(' - ',$date_filter);

            if($dateFilters[0] == $dateFilters[1]) {

                $first_date = date('Y-m-d', strtotime($dateFilters[0]));
                $last_date  = date('Y-m-d', strtotime($dateFilters[1]));

                //$this->db->where('DATE(cancel_order_payment.create_date)', $first_date);
                    
                $first_date = date('Y-m-d', strtotime($dateFilters[0]));
                $last_date  = date('Y-m-d', strtotime($dateFilters[1]));

                $this->db->where('DATE(cancel_order_payment.create_date) >=', $first_date);
                $this->db->where('DATE(cancel_order_payment.create_date) <=', $last_date);
                
                

            } else {

                $first_date = date('Y-m-d', strtotime($dateFilters[0]));
                $last_date  = date('Y-m-d', strtotime($dateFilters[1]));

                $this->db->where('DATE(cancel_order_payment.create_date) >=', $first_date);
                $this->db->where('DATE(cancel_order_payment.create_date) <=', $last_date);
            }
            
            
            
            

        } else if($all_type != '') {

            if ($all_type=="today") {

                $this->db->where('DATE(cancel_order_payment.create_date) = CURDATE()');

            } elseif ($all_type=="this_week") {
                $this_week_start = strtotime('-1 week monday 00:00:00');
                $this_week_end   = strtotime('sunday 23:59:59');
                $first_date = date('Y-m-d', $this_week_start);
                $last_date  = date('Y-m-d', $this_week_end);

                $this->db->where('DATE(cancel_order_payment.create_date) >=', $first_date);
                $this->db->where('DATE(cancel_order_payment.create_date) <=', $last_date);

            } elseif ($all_type=="last_week") {
                $last_week_start = strtotime('-2 week monday 00:00:00');
                $last_week_end   = strtotime('-1 week sunday 23:59:59');
                $first_date = date('Y-m-d', $last_week_start);
                $last_date  = date('Y-m-d', $last_week_end);

                $this->db->where('DATE(cancel_order_payment.create_date) >=', $first_date);
                $this->db->where('DATE(cancel_order_payment.create_date) <=', $last_date);
            } elseif ($all_type=="this_month") {
                $first_date = date('Y-m-01');
                $last_date  = date('Y-m-t');
                
                $this->db->where('DATE(cancel_order_payment.create_date) >=', $first_date);
                $this->db->where('DATE(cancel_order_payment.create_date) <=', $last_date);
            } elseif ($all_type=="last_month") {
                $month      = date("m", strtotime("-1 month"));
                $first_date = date('Y-' . $month . '-01');
                $last_date  = date('Y-' . $month . '-' . date('t', strtotime($first_date)));

                $this->db->where('DATE(cancel_order_payment.create_date) >=', $first_date);
                $this->db->where('DATE(cancel_order_payment.create_date) <=', $last_date);
            } elseif ($all_type=="last_3_month") {
                $monthStart      = date("m", strtotime("-3 month"));
                $last_3_month_start  = date('Y-' . $monthStart . '-01');
                $last_3_month_end = date('Y-m-d', strtotime('last day of previous month'));

                $this->db->where('DATE(cancel_order_payment.create_date) >=', $last_3_month_start);
                $this->db->where('DATE(cancel_order_payment.create_date) <=', $last_3_month_end);
            } elseif ($all_type=="last_6_month") {
                $monthStart      = date("m", strtotime("-6 month"));
                $last_6_month_start  = date('Y-' . $monthStart . '-01');
                $last_6_month_end = date('Y-m-d', strtotime('last day of previous month'));
            
                $this->db->where('DATE(cancel_order_payment.create_date) >=', $last_6_month_start);
                $this->db->where('DATE(cancel_order_payment.create_date) <=', $last_6_month_end);
            } elseif ($all_type=="last_12_month") {
                $last_12_month_start = date('Y-m' . '-01', strtotime("-12 month"));
                $last_12_month_end = date('Y-m-d', strtotime('last day of previous month'));

                $this->db->where('DATE(cancel_order_payment.create_date) >=', $last_12_month_start);
                $this->db->where('DATE(cancel_order_payment.create_date) <=', $last_12_month_end);
            } elseif ($all_type=="last_year") {
                $search_year = date('Y', strtotime("-1 year"));

                $this->db->where('YEAR(cancel_order_payment.create_date)', $search_year);
            } elseif ($all_type=="this_year") {
                $search_year = date('Y');

                $this->db->where('YEAR(cancel_order_payment.create_date)', $search_year);
            } elseif ($all_type=="period") {
                $from_date = date('Y-m-d', strtotime($this->input->get('fromdate')));
                $to_date = date('Y-m-d', strtotime($this->input->get('todate')));
                
                $this->db->where('DATE(cancel_order_payment.create_date) >=', $from_date);
                $this->db->where('DATE(cancel_order_payment.create_date) <=', $to_date);
            }
        }

        $this->db->where('cancel_order_payment.return_money','1');

        $this->db->where('membermaster.status','Active');

        $this->db->where('celebrity_master.status','Active');

        $this->db->order_by('cancel_order_payment.id','DESC');

		$query = $this->db->get();

		$the_content = $query->result_array();

        //echo ($this->db->last_query());;exit;

		return $the_content;

	}
}
?>
