<?php
Class Celebrity_model extends CI_Model {

	function getCelebrityDetails($cid) {

		$this->db->select('*');

		$this->db->from('celebrity_master');

		$this->db->where('status', 'Active');

		$this->db->where('id', $cid);

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getCelebrityList($category_name) {

		$this->db->select('*');

		$this->db->from('celebrity_master');

		$this->db->where('status', 'Active');

		$this->db->where("JSON_SEARCH(`celebrity_master`.`category`, 'one', '" . $category_name . "') is not null");

		$this->db->order_by('id', 'Desc');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getOccasions() {

		$this->db->select('*');

		$this->db->from('occasion_master');

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getTemplateByOccasion($message_for, $occasion_option) {

		$this->db->select('*');

		$this->db->from('template_master');

		$this->db->where('status', 'Active');

		$this->db->where('occasion_value', $occasion_option);

		$this->db->where('message_for', $message_for);

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getUserLoginDetails($usercode) {

		$this->db->select('*');

		$this->db->from('membermaster');

		$this->db->where('usercode', $usercode);

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

}
?>
