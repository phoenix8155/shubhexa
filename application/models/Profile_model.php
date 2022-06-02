<?php
Class Profile_model extends CI_Model {

	function getUserData() {

		$this->db->select('*');

		$this->db->from('membermaster');

		$this->db->where('usercode', $this->session->userdata['user']['usercode']);

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}
	function getRecentCelebrity() {

		$this->db->select('*');

		$this->db->from('celebrity_master');

		$this->db->where('status', 'Active');

		$this->db->limit(6);

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getUserDetails($emailid) {

		$this->db->select('*');

		$this->db->from('membermaster');

		$this->db->where('emailid', $emailid);

		$this->db->where('role_type', '3');

		$this->db->where('status !=', 'Delete');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getUserDetailsbyPhone($phone) {

		$this->db->select('*');

		$this->db->from('membermaster');

		$this->db->where('mobileno', $phone);

		$this->db->where('role_type', '3');

		$this->db->where('status !=', 'Delete');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

}
?>
