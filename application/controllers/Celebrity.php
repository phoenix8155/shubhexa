<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Celebrity extends CI_Controller {

	function __construct() {

		

		parent::__construct();

		$this->load->model('Celebrity_model', 'ObjM', true);

	}

	public function view($cid) {
		
		$getUserLoginData = $this->ObjM->getUserLoginDetails($this->session->userdata['user']['usercode']);
		
		$data['emailid']     = ($getUserLoginData[0]['emailid'] != '') ? $getUserLoginData[0]['emailid'] : '';
		$data['mobileno']     = ($getUserLoginData[0]['mobileno'] != '') ? $getUserLoginData[0]['mobileno'] : ''; 
		$data['resCelebirty'] = $this->ObjM->getCelebrityDetails($cid);
		$data['occasionList'] = $this->ObjM->getOccasions();

		$this->load->view('web/common/top_header_web');

		$this->load->view('web/celebrity_page_view', $data);

		$this->load->view('web/common/footer_web');

	}

	public function list($cid) {

		$data['celebrity_list'] = $this->ObjM->getCelebrityList($cid);

		$data['categoryDetails'] = $this->comman_fun->get_table_data('category_master', array('access_name' => $cid));

		$this->load->view('web/common/top_header_web');

		if (count($data['categoryDetails']) > 0) {
			$this->load->view('web/celebrity_list', $data);
		} else {
			$this->load->view('web/not_found_view');
		}

		$this->load->view('web/common/footer_web');

	}

	function getListOfTemplate() {

		$occasion_option = str_replace('_', ' ', $_POST['occasion_option']);
		$message_for = $_POST['message_for'];
		$celeb_name = $_POST['celeb_name'];

		if ($message_for == "self") {

			$message_for = "self";
			$res = array();
			$html = '';

			$result = $this->ObjM->getTemplateByOccasion($message_for, $occasion_option);
			//echo $this->db->last_query();
			if (!isset($result[0])) {
				$html .= '<p style="font-size:25px; color: #75503f !important; text-align: center;">No Template Found</p>';
			}

			$template_message = array_column($result, 'template_message');
			$total = count($result) / 3;
			$listChunk = array_chunk($template_message, 3);
			$m = 0;
			for ($i = 0; $i < count($listChunk); $i++) {

				if ($i == 0) {
					$active = "active";
				} else {
					$active = "";
				}

				$html .= '

				<div class="carousel-item ' . $active . '">
					<div class="row">';
				$list = $listChunk[$i];

				for ($j = 0; $j < count($list); $j++) {
					$m = $m + 1;
					$list[$j] = str_replace('_celebrity_name_', $celeb_name, $list[$j]);
					$html .= '<div class="col-md-4 template-box">
							<div class="card card-body showThisContent" id="first_' . $m . '">
								<div class="result" id="template_my_self_' . $m . '">' . $list[$j] . '</div>
								<hr class="choose-line">
								<div class="end-part" data-id="templateContent_first_' . $m . '">
									<span class="choose-one">Choose this one</span>
								</div>
							</div>
						</div>';

				}
				$html .= '</div>
				</div>';
			}
			echo $html;exit;
		} else {
			$message_for = "other";
			$res = array();
			$html = '';

			$result = $this->ObjM->getTemplateByOccasion($message_for, $occasion_option);

			if (!isset($result[0])) {
				$html .= '<p style="font-size:25px; color: #75503f !important; text-align: center;">No Template Found</p>';
			}

			$template_message = array_column($result, 'template_message');
			$total = count($result) / 3;
			$listChunk = array_chunk($template_message, 3);
			$m = 0;
			for ($i = 0; $i < count($listChunk); $i++) {

				if ($i == 0) {
					$active = "active";
				} else {
					$active = "";
				}

				$html .= '

				<div class="carousel-item ' . $active . '">
					<div class="row">';
				$list = $listChunk[$i];
				for ($j = 0; $j < count($list); $j++) {
					$m = $m + 1;
					$list[$j] = str_replace('_celebrity_name_', $celeb_name, $list[$j]);
					$html .= '<div class="col-md-4 template-box">
							<div class="card card-body showThisContent" id="first_' . $m . '">
								<div class="result" id="template_my_self_' . $m . '">' . $list[$j] . '</div>
								<hr class="choose-line">
								<div class="end-part" data-id="templateContent_first_' . $m . '">
									<span class="choose-one">Choose this one</span>
								</div>
							</div>
						</div>';
				}
				$html .= '</div>
				</div>';
			}
			echo $html;exit;
		}

	}
}
