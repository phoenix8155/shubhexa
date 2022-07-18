<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 * Class: Email_verification
 *
 * @see CI_Controller
 */

class Email_verification extends CI_Controller {

	function __construct() {

		parent::__construct();

		//$this->load->model('Member_module', 'ObjM', TRUE);

		$this->load->library('email');

	}

	/**
	 * verify
	 *
	 * @param string $eid
	 */

	public function verify($eid) {

		$result = $this->comman_fun->get_table_data('email_verification', array('v_key' => $eid, 'status' => 'N'));

		if (isset($result[0])) {

			$data = array(

				'email_verify' => 'Y',

			);

			$this->comman_fun->update($data, 'membermaster', array('usercode' => $result[0]['usercode']));

			$data = false;

			$data = array(

				'status' => 'Y',

			);

			$this->comman_fun->update($data, 'email_verification', array('verification_code' => $result[0]['verification_code']));

			$data = false;

			$member = $this->comman_fun->get_table_data('membermaster', array('usercode' => $result[0]['usercode']));

			$this->after_varification_email_verify($member[0]['usercode']);

			$data1 = array();

			$data1['msg'] = '<b>Email Verified Successfully</b><br /><br />';

			$data1['msg'] .= 'Dear, ' . $member[0]['fname'] . ' ' . $member[0]['lname'] . ', <br><br>  Thank you for verifying your Account,<br /> Welcome to Shubhexa .<br />Your Account is now Active and you can login.';

			//$data1['msg'] .= '<a class="txt_red" href="' . file_path() . 'login/">Login</a>';

			//$this->load->view('page/comman_msg', $data);

			$this->load->view('web/common/top_header_web');

			$this->load->view('web/commonpage_view', $data1);

			$this->load->view('web/common/footer_web');

		} else {
			header('Location: ' . base_url() . '');
			exit;
		}
	}

	function after_varification_email_verify($member_id) {

		$member = $this->comman_fun->get_table_data(
			'membermaster',
			array(
				'usercode'=>$member_id,
			)
		);
		
		
		$name = $member[0]['fname'] . ' ' . $member[0]['lname'];

		$toEmail = $member[0]['emailid'];
		
		$emailData = [
			'name'      => $name,
		];
        
		$msg = $this->load->view('web/email_templates/emailWelcome_view', $emailData,true);
        
		$subject = 'Welcome to Subheksha!';
		$email = 'shubhexa@gmail.com';

        $this->load->library('email');
        $config = array(
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'priority' => '1',
        );
        
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($email, 'SHUBHEXA');
        $this->email->to($toEmail);
        $this->email->subject($subject);
        $this->email->message($msg);
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
	}

	public function success() {

		$data['msg'] = 'Email Verified Successfully<br /><br />';

		$data['msg'] .= 'Dear, ' . $member[0]['fname'] . ' ' . $member[0]['lname'] . ', <br><br>  Thank you for verifying your Account,<br /> Welcome to Shubhexa .<br />Your Account is now Active and you can login.';

		$this->load->view('web/common/top_header_web');

		$this->load->view('web/commonpage_view', $data);

		$this->load->view('web/common/footer_web');
	}

}
