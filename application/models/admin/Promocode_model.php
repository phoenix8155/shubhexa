<?php
Class Promocode_model extends CI_Model {

	function getAllCategory() {

		$this->db->select('promocode_master.*');

		$this->db->from('promocode_master');

		$this->db->where('promocode_master.status !=', 'Delete');

		$this->db->order_by('promocode_master.id', 'Desc');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function get_record($id) {

		$this->db->select('promocode_master.*');

		$this->db->from('promocode_master');

		$this->db->where('promocode_master.status !=', 'Delete');

		$this->db->where('promocode_master.id', '' . $id . '');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function check_promocode($promocode) {

		$this->db->select('*');

		$this->db->from('promocode_master');

		$this->db->where('promocode', $promocode);

		$this->db->where('status !=', 'Delete');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;
	}

	function get_record_promocode_not_in($eid, $promocode) {

		$this->db->select('*');

		$this->db->from('promocode_master');

		$this->db->where('promocode', $promocode);

		$this->db->where('status !=', 'Delete');

		$this->db->where_not_in('id', $eid);

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;
	}

}
?>
