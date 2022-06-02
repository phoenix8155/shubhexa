<?php
Class Slider_model extends CI_Model {

	function getAllCategory() {
		$this->db->select('slider_master.*');

		$this->db->from('slider_master');

		$this->db->where('slider_master.status !=', 'Delete');

		$this->db->order_by('slider_master.id', 'Desc');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function get_record($id) {

		$this->db->select('slider_master.*');

		$this->db->from('slider_master');

		$this->db->where('slider_master.status !=', 'Delete');

		$this->db->where('slider_master.id', '' . $id . '');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

}
?>
