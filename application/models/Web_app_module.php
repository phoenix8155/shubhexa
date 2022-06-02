<?php
Class Web_app_module extends CI_Model {

	function addItem($data, $table) {

		$this->db->insert($table, $data);

		return $this->db->insert_id();

	}

	function update($data, $table, $where) {

		$this->db->where($where);

		$this->db->update($table, $data);

	}

	function login($emailid, $password) {

		$this->db->select('*');

		$this->db->from('membermaster');

		$this->db->where('emailid', '' . $emailid . '');

		$this->db->where('password', '' . $password . '');

		$this->db->where('role_type', '3');

		//$this->db->where('email_verify', 'Y');

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getSlider() {

		$this->db->select('*');

		$this->db->from('slider_master');

		$this->db->where('status', 'Active');

		$this->db->order_by('id', 'DESC');

		$this->db->limit(6);

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getCategory() {

		$this->db->select('*');

		$this->db->from('category_master');

		$this->db->where('status', 'Active');

		$this->db->order_by('category_id', 'DESC');

		$this->db->limit(6);

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getPopularCelebrityList() {

		$this->db->select('*');

		$this->db->from('celebrity_master');

		$this->db->where('is_trending', 'Yes');

		$this->db->where('status', 'Active');

		$this->db->order_by('id', 'DESC');

		$this->db->limit(6);

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getRecentlyAddedCelebsList() {

		$this->db->select('*');

		$this->db->from('celebrity_master');

		$this->db->where('status', 'Active');

		$this->db->order_by('id', 'DESC');

		$this->db->limit(6);

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getAllCategory() {

		$this->db->select('*');

		$this->db->from('category_master');

		$this->db->where('status', 'Active');

		//$this->db->order_by('category_id', 'DESC');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getAllPopularCelebrity() {

		$this->db->select('*');

		$this->db->from('celebrity_master');

		$this->db->where('is_trending', 'Yes');

		$this->db->where('status', 'Active');

		//$this->db->order_by('id', 'DESC');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getAllCelebrity() {

		$this->db->select('*');

		$this->db->from('celebrity_master');

		$this->db->where('status', 'Active');

		$this->db->order_by('id', 'DESC');

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

	public function update_google($data = []) {

		return $this->db->where('oauth_id', $data['oauth_id'])

			->update('membermaster', $data);

	}

	public function create($data = []) {

		return $this->db->insert('membermaster', $data);

	}

	public function get_by_oauth_id($oauth_id = null) {

		return $this->db->select("*")

			->from('membermaster')

			->where('oauth_id', $oauth_id)

			->get()

			->row();

	}

	function getCelebrityListCategoryWise($category_name) {

		$this->db->select('*');

		$this->db->from('celebrity_master');

		$this->db->where('status', 'Active');

		$this->db->where("JSON_SEARCH(`celebrity_master`.`category`, 'one', '" . $category_name . "') is not null");

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getCelebrityDetail($celebrity_id) {

		$this->db->select('*');

		$this->db->from('celebrity_master');

		$this->db->where('status', 'Active');

		$this->db->where('id', $celebrity_id);

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getOccasion() {

		$this->db->select('*');

		$this->db->from('occasion_master');

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getMessageList($occasion_id, $message_for) {

		$this->db->select('*');

		$this->db->from('template_master');

		$this->db->where('status', 'Active');

		$this->db->where('occasion_id', $occasion_id);

		$this->db->where('message_for', $message_for);

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function checkIsCartAvailable($usercode) {

		$this->db->select('*');

		$this->db->from('cart_master');

		$this->db->where('payment_status', 'pending');

		$this->db->where('usercode', $usercode);

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

	function getOrderList($usercode, $orderType) {

		$this->db->select('cart_master.*');

		$this->db->from('cart_master');

		$this->db->where('cart_master.usercode', $usercode);

		$this->db->where('cart_master.payment_status', $orderType); //pending //confirm

		$this->db->where('cart_master.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getCartDetailsList($cart_id) {

		$this->db->select('cart_details.*');

		$this->db->select('celebrity_master.id as celeb_id,celebrity_master.fname,celebrity_master.lname,celebrity_master.profile_pic');

		$this->db->from('cart_details');

		$this->db->join('celebrity_master', 'celebrity_master.id=cart_details.celebrity_id', 'left');

		$this->db->where('cart_details.cart_id', $cart_id);

		$this->db->where('cart_details.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function checkIsFavouriteOrNot($usercode, $celeb_id) {

		$this->db->select('*');

		$this->db->from('wishlist_master');

		$this->db->where('celebrity_id', $celeb_id);

		$this->db->where('usercode', $usercode);

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getWishlist($usercode) {

		$this->db->select('wishlist_master.*');

		$this->db->select('celebrity_master.id as celeb_id,celebrity_master.fname,celebrity_master.lname,celebrity_master.profile_pic,celebrity_master.charge_fees');

		$this->db->from('wishlist_master');

		$this->db->join('celebrity_master', 'celebrity_master.id=wishlist_master.celebrity_id', 'left');

		$this->db->where('wishlist_master.usercode', $usercode);

		$this->db->where('wishlist_master.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getOrderBookingList($usercode, $orderType) {

		$this->db->select('celebrity_task_master.*');

		$this->db->from('celebrity_task_master');

		$this->db->where('celebrity_task_master.usercode', $usercode);

		$this->db->where('celebrity_task_master.video_status', $orderType); //Initialize //Complete

		$this->db->where('celebrity_task_master.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

}
?>
