<?php
Class feedback_list_model extends CI_Model {

	function getAll() {

		$this->db->select('feedback.*');

		$this->db->from('feedback');

		$this->db->where('feedback.status', 'Active');

		$this->db->order_by('feedback.id', 'Desc');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

}
?>
