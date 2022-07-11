<?php
Class Cart_model extends CI_Model {

	function getList() {

		$this->db->select('cart_master.*');

		$this->db->from('cart_master');

		$this->db->where('cart_master.usercode', $this->session->userdata['user']['usercode']);

		$this->db->where('cart_master.payment_status', 'pending');

		$this->db->where('cart_master.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getCartDetailsList($cart_id) {

		$this->db->select('cart_details.*');

		$this->db->select('celebrity_master.id as celeb_id,celebrity_master.fname,celebrity_master.lname,celebrity_master.profile_pic');

		$this->db->from('cart_details');

		$this->db->join('celebrity_master', 'celebrity_master.id=cart_details.celebrity_id', 'left');

		$this->db->where('cart_details.cart_id', $cart_id);

		$this->db->where('cart_details.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getCartTotAmount($cart_id) {

		$this->db->select('sum(amount) as tot_cart_amount');

		$this->db->from('cart_details');

		$this->db->where('cart_details.cart_id', $cart_id);

		$this->db->where('cart_details.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getCartValue() {

		$this->db->select('sum(amount) as tot_cart_amount');

		$this->db->from('cart_master');

		$this->db->where('cart_master.usercode', $this->session->userdata['user']['usercode']);

		$this->db->where('cart_master.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getBookingDetails($member_id,$carDetailtId,$cartId) {

		$this->db->select('celebrity_task_master.*');

		$this->db->select('cart_details.occation_type,cart_details.delivery_date,cart_details.status,cart_details.template_message');

		$this->db->select('cart_master.cart_id as cartIdCM,cart_master.order_no,cart_master.payment_status,cart_master.status');

		$this->db->select('membermaster.usercode as mmUsercode,CONCAT(membermaster.fname," ",membermaster.lname) AS Username,membermaster.emailid,membermaster.status');

		$this->db->select('CONCAT(celebrity_master.fname," ",celebrity_master.lname) as celebsName,celebrity_master.status');

		$this->db->from('celebrity_task_master');

		$this->db->join('cart_details', 'cart_details.id=celebrity_task_master.cart_detail_id', 'left');

		$this->db->join('cart_master', 'cart_master.cart_id=celebrity_task_master.cart_id', 'left');

		$this->db->join('membermaster', 'membermaster.usercode=celebrity_task_master.usercode', 'left');

		$this->db->join('celebrity_master', 'celebrity_master.id=celebrity_task_master.celebrity_id', 'left');

		$this->db->where('celebrity_task_master.cart_id', $cartId);

		$this->db->where('celebrity_task_master.cart_detail_id', $carDetailtId);

		$this->db->where('celebrity_task_master.usercode', $member_id);

		$this->db->where('celebrity_task_master.video_status', 'Initialize');

		$this->db->where('cart_master.status', 'Active');

		$this->db->where('cart_details.status', 'Active');

		$this->db->where('membermaster.status', 'Active');

		$this->db->where('celebrity_master.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;
	}

}
?>
