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
	
	function deleteOldData() {
		$this->db->where('create_date < DATE_SUB(NOW(), INTERVAL 60 DAY)');
		$this->db->delete('cron_job_db_master');
	}

	function getDBFiles() {
		$this->db->select('*');
		$this->db->from('cron_job_db_master');
		$this->db->where('create_date < DATE_SUB(NOW(), INTERVAL 60 DAY)');
		$query = $this->db->get();
		$the_content = $query->result_array();
		return $the_content;
	}
}
