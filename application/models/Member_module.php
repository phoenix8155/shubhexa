<?php
Class Member_module extends CI_Model {

	function check_login() {

		$this->db->select('*');

		$this->db->from('membermaster');

		$this->db->where('username', '' . $_POST['username'] . '');

		$this->db->where('password', '' . $_POST['password'] . '');

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function checkWebLogin() {

		$this->db->select('*');

		$this->db->from('membermaster');

		$this->db->where('emailid', '' . $_POST['emailid'] . '');

		$this->db->where('password', '' . $_POST['password'] . '');

		$this->db->where('role_type', '3');

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getTotCategory() {

		$this->db->select('count(*) as totCategory');

		$this->db->from('category_master');

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getTotUser() {

		$this->db->select('count(*) as totUser');

		$this->db->from('membermaster');

		$this->db->where('role_type', '3');

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getTotCelebrity() {

		$this->db->select('count(*) as totCelebrity');

		$this->db->from('celebrity_master');

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}
	function getTotTestimonials() {

		$this->db->select('count(*) as totTestimonials');

		$this->db->from('testimonial_master');

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}
	function getTotPromocode() {

		$this->db->select('count(*) as totPromocode');

		$this->db->from('promocode_master');

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getTotTemplates() {

		$this->db->select('count(*) as totTemplates');

		$this->db->from('template_master');

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getTotBookings() {

		$this->db->select('count(*) as totBookings');

		$this->db->select('cart_master.cart_id,cart_master.usercode AS cartMasterUsercode,cart_master.order_date,cart_master.total_amount,cart_master.payment_status,cart_master.status');

		$this->db->from('membermaster');

		$this->db->join('cart_master', 'cart_master.usercode=membermaster.usercode', 'left');

		$this->db->where('cart_master.payment_status','confirm');

		$this->db->where('membermaster.status','Active');

		$this->db->where('cart_master.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

}
?>
