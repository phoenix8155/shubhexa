<?php
Class Booking_list_model extends CI_Model {

	function getBookingUserList() {

		$this->db->select('membermaster.*');

		$this->db->select('cart_master.cart_id,cart_master.usercode AS cartMasterUsercode,cart_master.order_date,cart_master.total_amount,cart_master.payment_status,cart_master.status');

		$this->db->from('membermaster');

		$this->db->join('cart_master', 'cart_master.usercode=membermaster.usercode', 'left');

		if($_GET['today'] != '') {

			$this->db->where('cart_master.payment_date = CURDATE()');
		}


		$this->db->where('cart_master.payment_id !=','');

		$this->db->where('cart_master.payment_status','confirm');

		$this->db->where('membermaster.status','Active');

		$this->db->where('cart_master.status', 'Active');

		$this->db->order_by('cart_master.cart_id','DESC');

		// $this->db->group_by('usercode');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}
	function getBookingDetailsList($cart_id,$usercode) {

		$this->db->select('cart_master.cart_id,cart_master.usercode,cart_master.order_no,cart_master.order_date,cart_master.total_amount,cart_master.payment_status,cart_master.status');

		$this->db->select('cart_details.cart_id as cartId,cart_details.celebrity_id,cart_details.occation_type,cart_details.delivery_date,cart_details.template_message,cart_details.amount,cart_details.status');

		$this->db->from('cart_master');

		$this->db->join('cart_details', 'cart_details.cart_id=cart_master.cart_id', 'left');

		$this->db->where('cart_master.usercode',$usercode);

		$this->db->where('cart_details.cart_id',$cart_id);

		$this->db->where('cart_master.payment_id !=','');

		$this->db->where('cart_master.payment_status','confirm');

		$this->db->where('cart_master.status','Active');

		$this->db->where('cart_details.status', 'Active');

		$this->db->order_by('cart_master.cart_id','DESC');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getCelebsDetails($celebrity_id) {

		$this->db->select('membermaster.*');

		$this->db->select('celebrity_master.id,celebrity_master.category,celebrity_master.fname,celebrity_master.lname,celebrity_master.gender,celebrity_master.profile_pic,celebrity_master.status');

		$this->db->from('membermaster');

		$this->db->join('celebrity_master', 'celebrity_master.id=membermaster.celebrity_id', 'left');

		$this->db->where('celebrity_master.id', $celebrity_id);

		$this->db->where('membermaster.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

}
?>
