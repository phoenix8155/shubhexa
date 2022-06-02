<?php
Class Template_list_model extends CI_Model {

	function getAll() {

		$this->db->select('template_master.*');

		$this->db->from('template_master');

		$this->db->where('template_master.status !=', 'Delete');

		$this->db->order_by('template_master.id', 'Desc');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getOccasionList() {

		$this->db->select('occasion_master.*');

		$this->db->from('occasion_master');

		$this->db->where('occasion_master.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function get_record($id) {

		$this->db->select('template_master.*');

		$this->db->from('template_master');

		$this->db->where('template_master.status !=', 'Delete');

		$this->db->where('template_master.id', '' . $id . '');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

}
?>
