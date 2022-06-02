<?php
Class Home_model extends CI_Model {

	function getRecentTestimonials() {

		$this->db->select('*');

		$this->db->from('testimonial_master');

		$this->db->where('status', 'Active');

		$this->db->limit(10);

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getRecentCelebrity() {

		$this->db->select('*');

		$this->db->from('celebrity_master');

		$this->db->where('is_trending', 'Yes');

		$this->db->where('status', 'Active');

		//$this->db->limit(6);

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getCategory() {

		$this->db->select('*');

		$this->db->from('category_master');

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getUserDetails($emailid) {

		$this->db->select('*');

		$this->db->from('membermaster');

		$this->db->where('emailid', $emailid);

		$this->db->where('role_type', '3');

		$this->db->where('status !=', 'Delete');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getUserDetailsbyPhone($phone) {

		$this->db->select('*');

		$this->db->from('membermaster');

		$this->db->where('mobileno', $phone);

		$this->db->where('role_type', '3');

		$this->db->where('status !=', 'Delete');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	public function is_already_register($oauth_id = null) {

		$data = $this->db->select("*")

			->from('membermaster')

			->where('oauth_id', $oauth_id)

			->get()

			->num_rows();

		if ($data > 0) {

			return true;

		} else {

			return false;

		}

	}

	public function sign_in_validate_user_status($oauth_id = null) {

		$data = $this->db->select("*")

			->from('membermaster')

			->where('oauth_id', $oauth_id)

			->where('status', 'Active')

			->where('email_verify', 'Y')

			->get()

			->num_rows();

		if ($data > 0) {

			return true;

		} else {

			return false;

		}

	}

	public function sign_in_validate_user_email($email = null) {

		$data = $this->db->select("*")

			->from('membermaster')

			->where('emailid', $email)

			->where('status', 'Active')

			->get()

			->num_rows();

		if ($data > 0) {

			return true;

		} else {

			return false;

		}

	}

	public function create($data = []) {

		return $this->db->insert('membermaster', $data);

	}

	public function update_google($data = []) {

		return $this->db->where('oauth_id', $data['oauth_id'])

			->update('membermaster', $data);

	}

	public function get_by_oauth_id($oauth_id = null) {

		return $this->db->select("*")

			->from('membermaster')

			->where('oauth_id', $oauth_id)

			->get()

			->row();

	}

	function checkIsFavouriteOrNot($celeb_id) {

		$this->db->select('*');

		$this->db->from('wishlist_master');

		$this->db->where('celebrity_id', $celeb_id);

		$this->db->where('usercode', $this->session->userdata['user']['usercode']);

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function checkIsCartAvailable() {

		//$currentDate = date('Y-m-d');

		$this->db->select('*');

		$this->db->from('cart_master');

		//$this->db->where('order_date', $currentDate);

		$this->db->where('payment_status', 'pending');

		$this->db->where('usercode', $this->session->userdata['user']['usercode']);

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getCartTotAmount($cart_id) {

		$this->db->select('sum(amount) as tot_cart_amount');

		$this->db->from('cart_details');

		$this->db->where('cart_details.cart_id', $cart_id);

		$this->db->where('cart_details.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function checkEmailRecord($emailid) {

		$this->db->select('*');

		$this->db->from('newsletter_master');

		$this->db->where('emailId', $emailid);

		$this->db->where('status !=', 'Delete');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

}
?>
