<?php
Class Occasion_model extends CI_Model {

	function getAllCategory() {
		$this->db->select('occasion_master.*');

		$this->db->from('occasion_master');

		$this->db->where('occasion_master.status !=', 'Delete');

		$this->db->order_by('occasion_master.id', 'Desc');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function get_record($id) {

		$this->db->select('occasion_master.*');

		$this->db->from('occasion_master');

		$this->db->where('occasion_master.status !=', 'Delete');

		$this->db->where('occasion_master.id', '' . $id . '');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

}
?>
