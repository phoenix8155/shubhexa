<?php
Class User_model extends CI_Model {

	function getAllCategory() {

		$this->db->select('category_master.*');

		$this->db->from('category_master');

		$this->db->where('category_master.status !=', 'Delete');

		$this->db->order_by('category_master.category_id', 'Desc');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function get_record($category_id) {

		$this->db->select('category_master.*');

		$this->db->from('category_master');

		$this->db->where('category_master.status !=', 'Delete');

		$this->db->where('category_master.category_id', '' . $category_id . '');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

}
?>
