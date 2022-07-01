<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Celebrity_list extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!is_logged_admin()) {
			header('Location: ' . file_path() . 'login');

			exit;
		}

		$this->load->library('upload');

		$this->load->library('image_lib');

		$this->load->model('admin/celebrity_model', 'ObjM', true);
	}

	public function view() {

		$data['html'] = $this->listing();

		$page_info['menu_id'] = 'menu-celebrity-list';

		$page_info['page_title'] = 'Celebrity List';

		$this->load->view('common/topheader');

		$this->load->view('common/header_admin', $page_info);

		$this->load->view('admin/' . $this->uri->rsegment(1) . '_view', $data);

		$this->load->view('common/footer_admin');
	}

	function listing() {

		$result = $this->ObjM->getAllCategory();

		$html = '';

		for ($i = 0; $i < count($result); $i++) {
			if ($result[$i]['status'] == 'Active') {
				$current_status = 'Active';
				$update_status = 'Inactive';
				$cls = 'btn-success';
			} else {
				$current_status = 'Inactive';
				$update_status = 'Active';
				$cls = 'btn-danger';
			}

			if ($result[$i]['profile_pic'] != "") {
				$td_image = "<img src='" . base_url() . "upload/celebrity_profile/" . $result[$i]['profile_pic'] . "' width='50' height='50' />";
			} else {
				$td_image = "-";
			}

			$row = $i + 1;
			if ($result[$i]['fname'] != "" && $result[$i]['lname'] != "") {
				$name = $result[$i]['fname'] . ' ' . $result[$i]['lname'];
			} else {
				if ($result[$i]['fname'] != "" && $result[$i]['lname'] == "") {
					$name = $result[$i]['fname'];
				} else {
					$name = "";
				}
			}
			if ($result[$i]['birthdate'] != "" && $result[$i]['birthdate'] != "0000-00-00") {
				$bday = date('d-M-Y', strtotime($result[$i]['birthdate']));
			} else {
				$bday = "";
			}

			$profileLink = '<a href="' . file_path('admin') . '' . $this->uri->rsegment(1) . '/profileView/' . $result[$i]['id'] . '" style="color:red;font-weight: 600;">Click Here</a>';
			$html .= '<tr>
						<td>' . $row . '</td>
						<td>' . $name . '</td>
						<td>' . $td_image . '</td>
						<td>' . $bday . '</td>
						<td>' . $profileLink . '</td>
						<td>' . date('d-m-Y', strtotime($result[$i]['create_date'])) . '</td>
						<td><div class="btn-group">
						<button class="btn dropdown-toggle ' . $cls . ' btn_custom" data-toggle="dropdown">' . $current_status . ' <i class="fa fa-angle-down"></i> </button>
						<ul class="dropdown-menu pull-right">
							<li><a class="status_change" href="' . file_path('admin') . '' . $this->uri->rsegment(1) . '/status_update/' . $update_status . '/' . $result[$i]['id'] . '">' . $update_status . '</a></li>
							<li><a href="' . file_path('admin') . '' . $this->uri->rsegment(1) . '/addnew/edit/' . $result[$i]['id'] . '">Edit</a></li>';
			$html .= '<li><a class="delete_record" href="' . file_path('admin') . '' . $this->uri->rsegment(1) . '/delete_record/' . $result[$i]['id'] . '">Delete</a></li>';
			$html .= '</ul>
						</div>
						</td>
					</tr>';
		}

		return $html;
	}

	public function profileView($id = Null) {

		$data['result'] = $this->comman_fun->get_table_data('celebrity_master', array('id' => $id, 'status' => 'Active'));
		$data['result2'] = $this->comman_fun->get_table_data('membermaster', array('celebrity_id' => $id, 'status' => 'Active'));

		$page_info['menu_id'] = 'menu-celebrity-list';

		$page_info['page_title'] = 'Profile View';

		$this->load->view('common/topheader');

		$this->load->view('common/header_admin', $page_info);

		$this->load->view('admin/' . $this->uri->rsegment(1) . '_profile_view', $data);

		$this->load->view('common/footer_admin');
	}

	function addnew($mode = null, $eid = null) {

		if ($mode == 'edit') {
			$data['form_set'] = array('mode' => 'edit', 'eid' => $eid);

			$data['result'] = $this->ObjM->get_record($eid);

			
		} else {
			$data['form_set'] = array('mode' => 'add');
		}

		$data['categoryList'] = $this->comman_fun->get_table_data(
			'category_master',
			array(
				'status'=>'Active'
			)
		);

		$page_info['menu_id'] = 'menu-celebrity-list';

		$page_info['page_title'] = 'Celebrity List';

		$this->load->view('common/topheader');

		$this->load->view('common/header_admin', $page_info);

		$this->load->view('admin/' . $this->uri->rsegment(1) . '_add', $data);

		$this->load->view('common/footer_admin');
	}

	function insert() {
		//var_dump($_POST);exit;
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('first_name', 'first name', 'required|trim');
			$this->form_validation->set_rules('last_name', 'last name', 'required|trim');
			$this->form_validation->set_rules('known_for[]', 'known for', 'required|trim');
			$this->form_validation->set_rules('category[]', 'category', 'required|trim');
			$this->form_validation->set_rules('mobileno','Mobile Number','required|trim|callback_checkDuplicateNumber');
			$this->form_validation->set_message('checkDuplicateNumber','Mobile Number is already exists. Please use another Number.');
			$this->form_validation->set_rules('emailid','Email Id','required|trim|valid_email|callback_checkDuplicateEmailid');
			$this->form_validation->set_message('checkDuplicateEmailid','Email is already exists. Please use another Email Id.');
			

			if ($this->form_validation->run() === false) {
				$this->addnew($_POST['mode'], $_POST['eid']);
			} else {
				$this->_insert();

				echo '<script>window.location.href="' . file_path('admin') . '' . $this->uri->rsegment(1) . '/view"</script>';

				header('Location: ' . file_path('admin') . '' . $this->uri->rsegment(1) . '/view');

				exit;
			}
		}
	}

	protected function _insert() {

		$data = array();

		$data['fname'] = filter_data($_POST['first_name']);
		$data['lname'] = filter_data($_POST['last_name']);
		$data['known_for'] = filter_data($_POST['known_for']);
		$data['category'] = json_encode(filter_data($_POST['category']));
		$data['language_known'] = json_encode(filter_data($_POST['language_known']));
		if ($_POST['birth_date'] != "") {
			$data['birthdate'] = date('Y-m-d', strtotime($_POST['birth_date']));
		} else {
			$data['birthdate'] = "";
		}

		$data['age'] = filter_data($_POST['age']);
		$data['gender'] = filter_data($_POST['gender']);
		$data['charge_fees'] = filter_data($_POST['charge_fees']);
		$data['twitter_link'] = filter_data($_POST['twitter_link']);
		$data['fb_link'] = filter_data($_POST['fb_link']);
		$data['insta_link'] = filter_data($_POST['insta_link']);
		$data['sample_video_link'] = filter_data($_POST['sample_video_link']);
		$data['hashtag'] = filter_data($_POST['hashtag']);
		$data['experience_in_industry'] = filter_data($_POST['experience_in_industry']);
		$data['brief_details'] = filter_data($_POST['brief_details']);
		$data['about_life'] = filter_data($_POST['about_life']);
		$data['successfull_events'] = filter_data($_POST['successfull_events']);
		$data['nature_character'] = filter_data($_POST['nature_character']);
		$data['brief_family_bg'] = filter_data($_POST['brief_family_bg']);
		$data['about_career'] = filter_data($_POST['about_career']);

		if ($_POST['is_trending'] != "No") {
			$data['is_trending'] = 'Yes';
		} else {
			$data['is_trending'] = 'No';
		}

		if (isset($_FILES['upload_file']) && !empty($_FILES['upload_file']['name'])) {
			$this->handle_upload();
			$data['profile_pic'] = $_POST['file_name'];
		}

		if ($_POST['mode'] == 'add') {

			$data['status'] = 'Active';

			$data['create_date'] = date('Y-m-d h:i:s');

			$data['update_date'] = date('Y-m-d h:i:s');

			$celebrityId = $this->comman_fun->additem($data, 'celebrity_master');

			$member_id = $this->userCreate($celebrityId);

			$this->session->set_flashdata("success", "Record Insert Successfully.....");
		}
		if ($_POST['mode'] == 'edit') {

			$data['update_date'] = date('Y-m-d h:i:s');

			$this->comman_fun->update($data, 'celebrity_master', array('id' => $_POST['eid']));

			$member_id = $this->userUpdate($_POST['eid']);

			if (isset($_FILES['upload_file']) && !empty($_FILES['upload_file']['name'])) {
				$url = './upload/celebrity_profile/' . $_POST['old_file'];
				$url2 = './upload/celebrity_profile/thum/' . $_POST['old_file'];
				unlink($url);
				unlink($url2);
			}

			$this->session->set_flashdata("success", "Record Update Successfully.....");
		}
	}

	function status_update($st, $eid) {

		$record = $this->comman_fun->get_table_data('celebrity_master', array('id' => $eid));

		$data['status'] = $st;

		$this->comman_fun->update($data, 'celebrity_master', array('id' => $eid));

		$this->session->set_flashdata('show_msg', array('class' => 'true', 'msg' => 'Status ' . $st . ' Successfully.....'));

		redirect(file_path('admin') . "" . $this->uri->rsegment(1) . "/view");
	}

	function delete_record($eid) {

		$record = $this->comman_fun->get_table_data('celebrity_master', array('id' => $eid));

		$data['status'] = 'Delete';

		$this->comman_fun->update($data, 'celebrity_master', array('id' => $eid));

		if (count($record) > 0) {
			$url = './upload/celebrity_profile/' . $record[0]['img_name'];
			$url2 = './upload/celebrity_profile/thum/' . $record[0]['img_name'];
			unlink($url);
			unlink($url2);
		}

		$this->session->set_flashdata('show_msg', array('class' => 'true', 'msg' => 'Record Delete Successfully.....'));

		redirect(file_path('admin') . "" . $this->uri->rsegment(1) . "/view");
	}

	function handle_upload() {
		if (isset($_FILES['upload_file']) && !empty($_FILES['upload_file']['name'])) {
			$config = array();
			$config['upload_path'] = './upload/celebrity_profile';
			$config['allowed_types'] = 'jpg|jpeg|gif|png|JPG|JPEG|PNG';
			$config['max_size'] = '0';
			$config['overwrite'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$_FILES['userfile']['name'] = $_FILES['upload_file']['name'];
			$_FILES['userfile']['type'] = $_FILES['upload_file']['type'];
			$_FILES['userfile']['tmp_name'] = $_FILES['upload_file']['tmp_name'];
			$_FILES['userfile']['error'] = $_FILES['upload_file']['error'];
			$_FILES['userfile']['size'] = $_FILES['upload_file']['size'];
			$rand = md5(uniqid(rand(), true));
			$fileName = 'cele_' . $rand;
			$fileName = str_replace(" ", "", $fileName);
			$config['file_name'] = $fileName;
			$this->upload->initialize($config);

			if ($this->upload->do_upload()) {
				$upload_data = $this->upload->data();
				$_POST['file_name'] = $upload_data['file_name'];

				$this->_create_thumbnail($upload_data['file_name'], 318, 236);
				return true;
			} else {

				echo $this->upload->display_errors();
			}
		}

	}

	protected function _create_thumbnail($fileName, $width, $height) {

		$config['image_library'] = 'gd2';
		$config['source_image'] = './upload/celebrity_profile/' . $fileName;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = $width;
		$config['height'] = $height;
		$config['new_image'] = './upload/celebrity_profile/thum/' . $fileName;
		$config['thumb_marker'] = '';

		$this->image_lib->initialize($config);
		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
		}
		return true;
	}

	public function userCreate($celebrityId) {
		$first_name = filter_data($_POST['first_name']);
		$last_name = filter_data($_POST['last_name']);
		// $username = $first_name . '_' . $last_name . '_' . $celebrityId;
		$username = $_POST['emailid'];
		$password = "12345";

		$data['role_type'] = '2';
		$data['celebrity_id'] = $celebrityId;
		$data['fname'] = $first_name;
		$data['lname'] = $last_name;
		$data['username'] = $username;
		$data['password'] = $password;

		$data['mobileno'] = filter_data($_POST['mobileno']);
		$data['emailid'] = filter_data($_POST['emailid']);
		

		$data['status'] = 'Active';

		$data['create_date'] = date('Y-m-d h:i:s');

		$data['update_date'] = date('Y-m-d h:i:s');

		$member_id = $this->comman_fun->additem($data, 'membermaster');

		// Send Notification to All Users
		if($member_id > 0) {
			if($_POST['email_id'] != '') {
				
				$this->sendEmailToCeleb($member_id);
			
			}

			$getUsersToken = $this->comman_fun->get_table_data(
				'membermaster',
				array(
					'role_type'=>3,
					'firebase_token !='=>'',
					'device_type !=' => ''
				)
			);
			
			for($i=0;$i<count($getUsersToken);$i++) {
				$registatoin_ids = $getUsersToken[$i]['firebase_token'];
				$noti_title = 'New Celebrity Added';
				$message = 'Check New Celebrity Details';
				if($getUsersToken[$i]['device_type'] == 'Android') {
					
					$this->sendNotificationUsingSeverKeyAndroid([$registatoin_ids], $noti_title, $message);
				} else {
					$this->sendNotificationToIOSUsingSeverKey([$registatoin_ids], $noti_title, $message);
				}
			}
		}
		
		return $member_id;

	}

	public function userUpdate($celebrityId) {
		$first_name = filter_data($_POST['first_name']);
		$last_name = filter_data($_POST['last_name']);
		$data['role_type'] = '2';
		$data['fname'] = $first_name;
		$data['lname'] = $last_name;

		$data['mobileno'] = filter_data($_POST['mobileno']);
		$data['emailid'] = filter_data($_POST['emailid']);

		$data['status'] = 'Active';

		$data['update_date'] = date('Y-m-d h:i:s');

		return $this->comman_fun->update($data, 'membermaster', array('celebrity_id' => $_POST['eid']));
	
	}

	protected function sendNotificationUsingSeverKeyAndroid($registatoin_ids, $messageTitle, $data) {
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

	protected function sendNotificationToIOSUsingSeverKey($registatoin_ids, $messageTitle, $data) {
		$registatoin_ids = implode(',', $registatoin_ids);
		$url = "https://fcm.googleapis.com/fcm/send";
		$serverKey = 'AAAAGWX0hNo:APA91bFlcmGikJg_VBiv7Exiud26VCH4eaTzN1jiaZF3eDX0EDrZ5BFYuUPC9qyGabkgVCpY6WHAvu9xlVVNiRHVpNApTjZPaaSpI-zdWiT2S2pd2-rUpMD5xy6NvKVtknI9U94zrdSn';

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


	function sendEmailToCeleb($member_id) {
		$getCelebsData = $this->comman_fun->get_table_data(
			'membermaster',
			array(
				'usercode'=>$member_id,
			)
		);
		$name =  $getCelebsData[0]['fname'].' '.$getCelebsData[0]['lname'];
		$emailData = [
			'name'     => $name,
            'username' => $getCelebsData[0]['username'],
            'password' => $getCelebsData[0]['password']
        ];
        
		$msg = $this->load->view('admin/sendEmailToCeleb_view', $emailData,true);
        

        $this->load->library('email');
        $config = array(
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'priority' => '1',
        );
        
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('shubhexa@gmail.com', 'SHUBHEXA');
        $this->email->to($getCelebsData[0]['email_id']);
        $this->email->subject('Reset Password');
        $this->email->message($msg);
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
	}

	public function checkDuplicateNumber()
    {
        $this->db->select('*');
        $this->db->from('membermaster');
        $this->db->where('mobileno', $this->input->post('mobileno'));
        $this->db->where('status!=', 'Delete');
        $user = $this->db->get()->row();
        
        if (isset($user)) {
            if ($this->input->post('eid') == "") {
                return false;
            }
            if ($user->celebrity_id == $this->input->post('eid')) {
                return true;
            }
            return false;
        }

        return true;
    }

	public function checkDuplicateEmailid()
    {
        $this->db->select('*');
        $this->db->from('membermaster');
        $this->db->where('emailid', $this->input->post('emailid'));
        $this->db->where('status!=', 'Delete');
        $user = $this->db->get()->row();
        
        if (isset($user)) {
            if ($this->input->post('eid') == "") {
                return false;
            }
            if ($user->celebrity_id == $this->input->post('eid')) {
                return true;
            }
            return false;
        }

        return true;
    }

	public function checkMobileNumberExist($mobileNo)
    {
        if ($mobileNo != "") {
            
            $customerDetail = $this->comman_fun->get_table_data(
                'membermaster',
                array(
                    'mobileno' => $mobileNo,
                    'status' => 'Active',
                )
            );
			
            if (!empty($customerDetail)) {
                echo false;
            } else {
				echo true;
			}
        }
    }
	public function checkEmailIdExist()
    {
		$emailId = $_POST['emailid'];
        if ($emailId != "") {
            
            $customerDetail = $this->comman_fun->get_table_data(
                'membermaster',
                array(
                    'emailid' => $emailId,
                    'status' => 'Active',
                )
            );
			
            if (!empty($customerDetail)) {
                echo 1;
            } else {
				echo 2;
			}
        } else {
			echo 0;
		}
    }
}
