<?php
Class Category_model extends CI_Model {

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

	function get_record_name_not_in($eid, $category_name) {

		$this->db->select('*');

		$this->db->from('category_master');

		$this->db->where('category_name', $category_name);

		$this->db->where('status !=', 'Delete');

		$this->db->where_not_in('category_id', $eid);

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;
	}

	function check_cate_name($category_name) {

		$this->db->select('*');

		$this->db->from('category_master');

		$this->db->where('category_name', $category_name);

		$this->db->where('status !=', 'Delete');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;
	}

	function check_access_name($access_name) {

		$this->db->select('*');

		$this->db->from('category_master');

		$this->db->where('access_name', $access_name);

		$this->db->where('status !=', 'Delete');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;
	}

	function get_record_access_name_not_in($eid, $access_name) {

		$this->db->select('*');

		$this->db->from('category_master');

		$this->db->where('access_name', $access_name);

		$this->db->where('status !=', 'Delete');

		$this->db->where_not_in('category_id', $eid);

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;
	}

}
?>
