<?php
Class Testimonial_model extends CI_Model {

	function getAllTestimonial() {

		$this->db->select('testimonial_master.*');

		$this->db->from('testimonial_master');

		$this->db->where('testimonial_master.status !=', 'Delete');

		$this->db->order_by('testimonial_master.id', 'Desc');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function get_record($id) {

		$this->db->select('testimonial_master.*');

		$this->db->from('testimonial_master');

		$this->db->where('testimonial_master.status !=', 'Delete');

		$this->db->where('testimonial_master.id', '' . $id . '');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

}
?>
