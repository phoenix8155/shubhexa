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

}
?>
