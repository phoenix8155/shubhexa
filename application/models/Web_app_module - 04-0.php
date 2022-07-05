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

	function celebs_login($username, $password) {

		$this->db->select('*');

		$this->db->from('membermaster');

		$this->db->where('username', '' . $username . '');

		$this->db->where('password', '' . $password . '');

		$this->db->where('role_type', '2');

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

		$this->db->where('celebrity_task_master.cart_detail_id', 'Desc');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getCelebrity($accessToken) {

		$this->db->select('membermaster.*');

		$this->db->from('membermaster');

		$this->db->where('membermaster.accessToken', $accessToken);

		$this->db->where('membermaster.role_type', '2');

		$this->db->where('membermaster.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getCelebsDetails($celebrity_id) {

		$this->db->select('celebrity_master.*');

		$this->db->from('celebrity_master');

		$this->db->where('celebrity_master.id', $celebrity_id);

		$this->db->where('celebrity_master.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getOrderBookingUserList($celebrity_id, $orderType) {

		$this->db->select('celebrity_task_master.*');

		$this->db->from('celebrity_task_master');

		$this->db->where('celebrity_task_master.celebrity_id', $celebrity_id);

		$this->db->where('celebrity_task_master.video_status', $orderType); //Initialize //Complete

		$this->db->where('celebrity_task_master.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}
	
	function getUserBookingDetails($celebrity_id, $bookingId) {

		$this->db->select('cart_details.*');

		$this->db->from('cart_details');

		$this->db->where('cart_details.celebrity_id', $celebrity_id);

		$this->db->where('cart_details.id', $bookingId);

		$this->db->where('cart_details.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getSingleCelebrityTask($cart_detail_id) {

		$this->db->select('celebrity_task_master.*');

		$this->db->from('celebrity_task_master');

		$this->db->where('celebrity_task_master.cart_detail_id', $cart_detail_id);

		$this->db->where('celebrity_task_master.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getUserDetails($userCode) {

		$this->db->select('membermaster.*');

		$this->db->from('membermaster');

		$this->db->where('membermaster.usercode', $userCode);

		$this->db->where('membermaster.role_type', 3);

		$this->db->where('membermaster.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getCelebsPaymentTodayList($celebrity_id,$payment_date=null) {

		$this->db->select('SUM(cart_details.amount) as total_earning');
		$this->db->select('cart_details.*');

		$this->db->select('cart_master.cart_id as cart_master_id,cart_master.payment_status,cart_master.payment_date');

		$this->db->from('cart_details');

		$this->db->join('cart_master', 'cart_master.cart_id=cart_details.cart_id', 'left');

		$this->db->where('cart_details.celebrity_id', $celebrity_id);
		if($payment_date == 'today') {

			$this->db->where('cart_master.payment_date= CURDATE()');

		} elseif($payment_date == 'last_month') {

			$month      = date("m", strtotime("-1 month"));
            $first_date = date('Y-' . $month . '-01');
            $last_date  = date('Y-' . $month . '-' . date('t', strtotime($first_date)));
			$this->db->where('DATE(cart_master.payment_date) >=', $first_date);
            $this->db->where('DATE(cart_master.payment_date) <=', $last_date);

		} else if($payment_date == 'last_year') {

			$search_year = date('Y', strtotime("-1 year"));
			$this->db->where('YEAR(cart_master.payment_date)', $search_year);
			
		}
		$this->db->where('cart_master.payment_status','confirm');

		$this->db->where('cart_details.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content[0]['total_earning'];

	}

	function getEarningInDetails($celebrity_id,$filter) {

		$this->db->select('cart_details.*');

		$this->db->select('cart_master.cart_id as cart_master_id,cart_master.payment_status,cart_master.payment_date');

		$this->db->from('cart_details');

		$this->db->join('cart_master', 'cart_master.cart_id=cart_details.cart_id', 'left');

		$this->db->where('cart_details.celebrity_id', $celebrity_id);

		if($filter == '1') {

			$this->db->where('cart_master.payment_date= CURDATE()');

		} elseif($filter == '2') {

			$month      = date("m", strtotime("-1 month"));
            $first_date = date('Y-' . $month . '-01');
            $last_date  = date('Y-' . $month . '-' . date('t', strtotime($first_date)));
			$this->db->where('DATE(cart_master.payment_date) >=', $first_date);
            $this->db->where('DATE(cart_master.payment_date) <=', $last_date);

		} else if($filter == '3') {

			$search_year = date('Y', strtotime("-1 year"));
			$this->db->where('YEAR(cart_master.payment_date)', $search_year);
			
		}
		
		$this->db->where('cart_master.payment_status','confirm');

		$this->db->where('cart_details.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function getNewVideosRequest($celebrity_id) {

		$this->db->select('cart_details.*');

		$this->db->select('celebrity_task_master.usercode,celebrity_task_master.video_status,celebrity_task_master.status');

		$this->db->from('cart_details');

		$this->db->join('celebrity_task_master', 'celebrity_task_master.celebrity_id=cart_details.celebrity_id', 'left');

		$this->db->where('cart_details.celebrity_id', $celebrity_id);

		$this->db->where('celebrity_task_master.celebrity_id', $celebrity_id);

		$this->db->where('celebrity_task_master.video_status','Initialize');

		$this->db->where('celebrity_task_master.status','Active');

		$this->db->where('cart_details.status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();

		return $the_content;

	}

	function get_last_value() {
		$this->db->select("*");
		$this->db->from('cart_master');
		$this->db->where('status', 'Active');
		$this->db->limit(1);
		$this->db->order_by('cart_id', 'DESC');
		$query = $this->db->get();
		$the_content = $query->result_array();
		return $the_content;
	}

	function checkApplyKeyData($apple_key) {
		
		$this->db->select('*');

		$this->db->from('membermaster');

		$this->db->where('apple_key IS NOT NULL', $apple_key);

		$this->db->where('role_type', 3);

		$this->db->where('status', 'Active');

		$query = $this->db->get();

		$the_content = $query->result_array();
		
		return $the_content;

	}
	

}
?>
