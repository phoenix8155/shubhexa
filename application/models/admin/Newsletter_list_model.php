<?php
Class Newsletter_list_model extends CI_Model {

	function getAll() {

		$this->db->select('newsletter_master.*');

		$this->db->from('newsletter_master');

		$this->db->where('newsletter_master.status', 'Active');

		$this->db->order_by('newsletter_master.id', 'Desc');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

}
?>
