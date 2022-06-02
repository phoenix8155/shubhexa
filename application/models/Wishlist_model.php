<?php
Class Wishlist_model extends CI_Model {

	function getList() {

		$this->db->select('wishlist_master.*');

		$this->db->select('celebrity_master.id as celeb_id,celebrity_master.fname,celebrity_master.lname,celebrity_master.profile_pic,celebrity_master.charge_fees');

		$this->db->from('wishlist_master');

		$this->db->join('celebrity_master', 'celebrity_master.id=wishlist_master.celebrity_id', 'left');

		$this->db->where('wishlist_master.usercode', $this->session->userdata['user']['usercode']);

		$this->db->where('wishlist_master.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

}
?>
