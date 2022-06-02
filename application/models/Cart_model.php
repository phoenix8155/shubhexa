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

}
?>
