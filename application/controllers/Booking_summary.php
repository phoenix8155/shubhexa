<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "libraries/razorpay/razorpay-php/Razorpay.php";

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;


class Booking_summary extends CI_Controller {

	function __construct() {

		parent::__construct();

		if (!$this->session->userdata['user']) {
			header('Location: ' . file_path() . 'home');
			exit;
		}
		
		$this->load->model('Cart_model', 'ObjM', true);

	}

	public function index() {

		$this->view();

	}

	public function view() {

		$data['cartRes'] = $this->ObjM->getList();

		$this->load->view('web/common/top_header_user');

		$this->load->view('web/common/sidebar_user');

		$this->load->view('web/booking_summary_view', $data);

		$this->load->view('web/common/footer_user');
	}

	public function confirm($cartId) {
		if ($cartId != "") {

			$resCMaster = $this->comman_fun->get_table_data(
				'cart_master',
				array(
					'cart_id' => $cartId,
					'status' => 'Active',
					'usercode' => $this->session->userdata['user']['usercode']
				)
			);
			
			$this->pay($cartId, $resCMaster[0]['total_amount']);
		}
	}

	
	protected function sendNotificationUsingSeverKeyAndroidFromUserSide($registatoin_ids, $messageTitle, $data) {
		$registatoin_ids = implode(',', $registatoin_ids);
		$url = "https://fcm.googleapis.com/fcm/send";
		$serverKey = ' AAAAU1JqMbY:APA91bHj0xWkHf-av8lmZvlg0QCG-P9EpLqpzCqpf_BT__AxC_RSrVvj7NbPslvlLPKbiN8vxuyEykuBPvXu6L5WkyQsxTxO_KqGU0UyOPXu8aJiOAAKhfnIcl4SUZqVd7vvUNo9MNU7	';

		$token = $registatoin_ids; //device token
		$title = $messageTitle;
		$body = $data;
		$notification = array('title' => $title, 'details' => $body, 'sound' => 'default', 'badge' => '1');
		$arrayToSend = array('to' => $token, 'data' => $notification, 'priority' => 'high');
		$json = json_encode($arrayToSend);

		$headers = array();
		$headers[] = 'Content-Type: application/json';
		$headers[] = 'Authorization: key=' . $serverKey;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt(
			$ch,
			CURLOPT_CUSTOMREQUEST,
			"POST"
		);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); //Remove //multicast_id,success,failure,canonical_ids

		//Send the request
		$response = curl_exec($ch);

		//Close request
		if ($response === false) {
			die('FCM Send Error: ' . curl_error($ch));
		}
		curl_close($ch);
		return true;
		//echo $response;
		//exit;
	}
	protected function sendNotificationToIOSUsingSeverKeyFromUserSide($registatoin_ids, $messageTitle, $data) {
		$registatoin_ids = implode(',', $registatoin_ids);
		$url = "https://fcm.googleapis.com/fcm/send";
		$serverKey = 'AAAAU1JqMbY:APA91bHj0xWkHf-av8lmZvlg0QCG-P9EpLqpzCqpf_BT__AxC_RSrVvj7NbPslvlLPKbiN8vxuyEykuBPvXu6L5WkyQsxTxO_KqGU0UyOPXu8aJiOAAKhfnIcl4SUZqVd7vvUNo9MNU7';

		$token = $registatoin_ids; //device token
		$title = $messageTitle;
		$body = $data;
		$notification = array('title' => $title, 'details' => $body, 'sound' => 'default', 'badge' => '1');
		$arrayToSend = array('to' => $token, 'notification' => $notification, 'priority' => 'high');
		$json = json_encode($arrayToSend);

		$headers = array();
		$headers[] = 'Content-Type: application/json';
		$headers[] = 'Authorization: key=' . $serverKey;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt(
			$ch,
			CURLOPT_CUSTOMREQUEST,
			"POST"
		);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); //Remove //multicast_id,success,failure,canonical_ids

		//Send the request
		$response = curl_exec($ch);

		//Close request
		if ($response === false) {
			die('FCM Send Error: ' . curl_error($ch));
		}
		curl_close($ch);
		return true;
		//echo $response;
		//exit;
	}

	public function pay($cartMasterId, $amount) {
		
		$api = new Api(RAZOR_KEY, RAZOR_KEY_SECRET);

		
		$_SESSION['payable_amount'] = $amount;
		$_SESSION['cartMasterId'] = $cartMasterId;

		$razorpayOrder = $api->order->create(array(
			'receipt' => rand(),
			'amount' => $_SESSION['payable_amount'] * 100,
			'currency' => 'INR',
			'payment_capture' => 1, // auto capture
		));

		$amount = $razorpayOrder['amount'];

		$razorpayOrderId = $razorpayOrder['id'];

		$_SESSION['razorpay_order_id'] = $razorpayOrderId;

		$data = $this->prepareData($amount, $razorpayOrderId,$cartMasterId);
		
		$this->load->view('web/rezorpay', array('data' => $data));
		
	}

	public function prepareData($amount, $razorpayOrderId,$cartMasterId) {

		$gecartMaster = $this->comman_fun->get_table_data('cart_master',array('cart_id'=>$cartMasterId,'status'=>'Active'));
		$getUserData = $this->comman_fun->get_table_data('membermaster',array('usercode'=>$gecartMaster[0]['usercode'],'status'=>'Active'));



		$data = array(
			"key" => RAZOR_KEY,
			"amount" => $amount,
			"name" => "Shubexa",
			"description" => "Shubhexa",
			"image" => asset_path()."web/images/shubhexa-logo-blue.png",
			"notes" => array(
				"address" => "Shubhexa",
				"merchant_order_id" => rand(),
			),
			"theme" => array(
				"color" => "#528FF0",
			),
			"order_id" => $razorpayOrderId,
		);

		return $data;
	}

	public function verify() {
		
		$success = true;
		$error = "payment_failed";
		
		if (empty($_POST['razorpay_payment_id']) === false) {
			
			$api = new Api(RAZOR_KEY, RAZOR_KEY_SECRET);
			try {
				$attributes = array(
					'razorpay_order_id' => $_SESSION['razorpay_order_id'],
					'razorpay_payment_id' => $_POST['razorpay_payment_id'],
					'razorpay_signature' => $_POST['razorpay_signature'],
				);
				$api->utility->verifyPaymentSignature($attributes);
			} catch (SignatureVerificationError $e) {
				$success = false;
				$error = 'Razorpay_Error : ' . $e->getMessage();
			}
		}
		
		if ($success === true) {
			
			$id = $this->setbookingTrnsDataData($_POST['razorpay_payment_id']);

		} else {
			redirect(file_path().'booking_summary/payment_failed');
		}
	}

	public function setbookingTrnsDataData($razorpay_payment_id) {

		$amount = $_SESSION['payable_amount'];
		$cartMasterId = $_SESSION['cartMasterId'];
		
		$bookingTrnsData = array(
			'razorpay_order_id' => $_SESSION['razorpay_order_id'],
			'razorpay_payment_id' => $razorpay_payment_id,
			'razorpay_refund_id' => null,
			'cart_master_id' => $cartMasterId,
			'amount' => $amount,
			'entity' => 'payment',
			'payment_date' => date('Y-m-d H:i:s'),
		);
		
		$id = $this->comman_fun->addItem($bookingTrnsData, 'booking_transaction');

		if($id > 0) {
			
			$this->updateCartWithPaymentSuccess($cartMasterId,$_POST['razorpay_payment_id']);
			redirect(file_path().'booking_summary/payment_success');
		}
		

	}

	public function updateCartWithPaymentSuccess($cartId,$razorpayPaymentId)
	{

			$UpdateData = array();
			$UpdateData['payment_id'] 	  = $razorpayPaymentId;
			$UpdateData['payment_status'] = 'confirm';
			$UpdateData['order_date'] = date('Y-m-d h:i:s');
			$UpdateData['update_date'] = date('Y-m-d h:i:s');
			$this->comman_fun->update($UpdateData, 'cart_master', array('cart_id' => $cartId));

			// insert celebrity task after payment status return success
			$resCartDetails = $this->comman_fun->get_table_data('cart_details', array('cart_id' => $cartId));
			if (count($resCartDetails) > 0) {
				for ($i = 0; $i < count($resCartDetails); $i++) {
					$data = array();
					$data['celebrity_id'] = $resCartDetails[$i]['celebrity_id'];
					$data['cart_id'] = $cartId;
					$data['usercode'] = $this->session->userdata['user']['usercode'];
					$data['cart_detail_id'] = $resCartDetails[$i]['id'];
					$data['video_name'] = '';
					$data['video_status'] = 'Initialize';
					$data['status'] = 'Active';
					$data['create_date'] = date('Y-m-d H:i:s');
					$data['update_date'] = date('Y-m-d h:i:s');
					$id = $this->comman_fun->addItem($data, 'celebrity_task_master');
					// Remove Celebrity From Whistlist
					$this->comman_fun->delete('wishlist_master', array('celebrity_id' => $resCartDetails[$i]['celebrity_id'], 'usercode' => $this->session->userdata['user']['usercode']));
					if ($id > 0) {
						
						$this->sendBookingDetailsToUser($this->session->userdata['user']['usercode'], $resCartDetails[$i]['id'], $cartId);
						$this->sendBookingDetailsToCelebrity($resCartDetails[$i]['celebrity_id'], $this->session->userdata['user']['usercode'], $resCartDetails[$i]['id'], $cartId);
						//to send notification to celebrity
						$getCelebsToken = $this->comman_fun->get_table_data('membermaster', array('celebrity_id' => $resCartDetails[$i]['celebrity_id']));
						if ($getCelebsToken[0]['firebase_token'] != '' && $getCelebsToken[0]['device_type'] != '') {
							$registatoin_ids = $getCelebsToken[0]['firebase_token'];
							$noti_title = 'New Video Request';
							$message = 'Hello you got a new video request';
							if ($getCelebsToken[0]['device_type'] == 'Android') {
								$this->sendNotificationUsingSeverKeyAndroidFromUserSide([$registatoin_ids], $noti_title, $message);
							} else {
								$this->sendNotificationToIOSUsingSeverKeyFromUserSide([$registatoin_ids], $noti_title, $message);
							}
						}
					}
				}
			}
			
	}

	public function payment_success() {
		$this->load->view('web/common/top_header_web');
		$this->load->view('web/payment_success_view');
		$this->load->view('web/common/footer_web');
	}

	public function payment_failed() {
		
		$this->load->view('web/common/top_header_web');

		$this->load->view('web/payment_failed_view');

		$this->load->view('web/common/footer_web');
	}

	function sendBookingDetailsToUser($member_id, $carDetailtId, $cartId) {

		$member = $this->comman_fun->get_table_data(
			'membermaster',
			array(
				'usercode' => $member_id,
			)
		);

		$getBookingDetails = $this->ObjM->getBookingDetails(
			$member_id,
			$carDetailtId,
			$cartId
		);

		$toEmail = $getBookingDetails[0]['emailid'];

		$emailData = [
			'getBookingDetails' => $getBookingDetails[0],
		];

		$msg = $this->load->view('web/email_templates/emailBookingDetails_view', $emailData, true);
		// echo $msg;exit;
		$subject = 'Great News! Your booking confirmed';
		$email = 'shubhexa@gmail.com';

		$this->load->library('email');
		$config = array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1',
		);

		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from(SHUBHEXAMAIL, 'SHUBHEXA');
		$this->email->to($toEmail);
		$this->email->subject($subject);
		$this->email->message($msg);
		if ($this->email->send()) {
			return true;
		} else {
			return false;
		}
	}

	function sendBookingDetailsToCelebrity($celebrity_id, $member_id, $carDetailtId, $cartId) {

		$member = $this->comman_fun->get_table_data(
			'membermaster',
			array(
				'celebrity_id' => $celebrity_id,
			)
		);

		$getBookingDetails = $this->ObjM->getBookingDetails(
			$member_id,
			$carDetailtId,
			$cartId
		);

		$celebName = $member[0]['fname'] . ' ' . $member[0]['lname'];
		$toEmail = $member[0]['emailid'];

		$emailData = [
			'celebrity_name' => $celebName,
			'getBookingDetails' => $getBookingDetails[0],
		];

		$msg = $this->load->view('web/email_templates/emailBookingDetailsForCelebView', $emailData, true);
		//echo $msg;exit;
		$subject = 'Great News! You received a new booking';

		$this->load->library('email');
		$config = array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1',
		);

		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from(SHUBHEXAMAIL, 'SHUBHEXA');
		$this->email->to($toEmail);
		$this->email->subject($subject);
		$this->email->message($msg);
		if ($this->email->send()) {
			return true;
		} else {
			return false;
		}
	}
}
