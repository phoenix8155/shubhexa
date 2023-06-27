<?php
class Corn_job_model extends CI_Model {
	
	function addItem($data, $table) {
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	function update($data, $table, $where) {
		$this->db->where($where);
		$this->db->update($table, $data);
	}

}
