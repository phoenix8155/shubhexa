<?php
Class Contact_list_model extends CI_Model {

	function getAll() {

		$this->db->select('contact_master.*');

		$this->db->from('contact_master');

		$this->db->where('contact_master.status', 'Active');

		$this->db->order_by('contact_master.id', 'Desc');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

}
?>
