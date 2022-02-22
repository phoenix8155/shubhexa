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

}
?>
