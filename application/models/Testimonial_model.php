<?php
Class Testimonial_model extends CI_Model {

	function getTestimonials() {

		$this->db->select('*');

		$this->db->from('testimonial_master');

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

}
?>
