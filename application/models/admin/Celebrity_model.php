<?php
Class Celebrity_model extends CI_Model {

	function getAllCategory() {

		$this->db->select('celebrity_master.*');

		$this->db->from('celebrity_master');

		$this->db->where('celebrity_master.status !=', 'Delete');

		$this->db->order_by('celebrity_master.id', 'Desc');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function get_record($id) {

		$this->db->select('celebrity_master.*');

		$this->db->from('celebrity_master');

		$this->db->where('celebrity_master.status !=', 'Delete');

		$this->db->where('celebrity_master.id', '' . $id . '');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

}
?>
