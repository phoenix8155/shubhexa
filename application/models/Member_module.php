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

		$this->db->select('cart_master.cart_id,cart_master.payment_status,cart_master.status');

		$this->db->from('cart_details');

		$this->db->join('cart_master', 'cart_master.cart_id=cart_details.cart_id', 'left');

		$this->db->where('cart_master.payment_id !=','');

		$this->db->where('cart_master.payment_status','confirm');

		$this->db->where('cart_details.status','Active');

		$this->db->where('cart_master.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getTodaysTotBookings() {

		$this->db->select('count(*) as totTodaysBookings');

		$this->db->select('cart_master.cart_id,cart_master.order_date,cart_master.payment_date,cart_master.payment_status,cart_master.status');

		$this->db->from('cart_details');

		$this->db->join('cart_master', 'cart_master.cart_id=cart_details.cart_id', 'left');

		$this->db->where('cart_master.payment_date = CURDATE()');

		$this->db->where('cart_master.payment_id !=','');

		$this->db->where('cart_master.payment_status','confirm');

		$this->db->where('cart_details.status','Active');

		$this->db->where('cart_master.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getTotAmountsReceived() {

		$this->db->select_sum('cart_details.amount');

		$this->db->select('cart_master.cart_id,cart_master.order_date,cart_master.payment_date,cart_master.payment_status,cart_master.status');

		$this->db->from('cart_details');

		$this->db->join('cart_master', 'cart_master.cart_id=cart_details.cart_id', 'left');

		$this->db->where('cart_master.payment_id !=','');

		$this->db->where('cart_master.payment_status','confirm');

		$this->db->where('cart_details.status','Active');

		$this->db->where('cart_master.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content[0]['amount'];

	}

	function getTodayTotAmountsReceived() {

		$this->db->select_sum('cart_details.amount');

		$this->db->select('cart_master.cart_id,cart_master.order_date,cart_master.payment_date,cart_master.payment_status,cart_master.status');

		$this->db->from('cart_details');

		$this->db->join('cart_master', 'cart_master.cart_id=cart_details.cart_id', 'left');

		$this->db->where('cart_master.payment_date = CURDATE()');

		$this->db->where('cart_master.payment_id !=','');

		$this->db->where('cart_master.payment_status','confirm');

		$this->db->where('cart_details.status','Active');

		$this->db->where('cart_master.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content[0]['amount'];

	}

}
?>
