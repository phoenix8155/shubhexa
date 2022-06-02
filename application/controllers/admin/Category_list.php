<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Category_list extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!is_logged_admin()) {
			header('Location: ' . file_path() . 'login');

			exit;
		}

		$this->load->library('upload');

		$this->load->library('image_lib');

		$this->load->model('admin/category_model', 'ObjM', true);
	}

	public function view() {

		$data['html'] = $this->listing();

		$page_info['menu_id'] = 'menu-category-list';

		$page_info['page_title'] = 'Category List';

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

			if ($result[$i]['img_name'] != "") {
				$td_image = "<img src='" . base_url() . "upload/category/" . $result[$i]['img_name'] . "' width='50' height='50' />";
			} else {
				$td_image = "-";
			}
			if ($result[$i]['banner_name'] != "") {
				$banner_image = "<img src='" . base_url() . "upload/category/" . $result[$i]['banner_name'] . "' height='50' />";
			} else {
				$banner_image = "-";
			}

			// <td>'.$result[$i]['amount'].'</td>

			$row = $i + 1;
			$html .= '<tr>
						<td width="2%">' . $row . '</td>
						<td width="20%">' . $result[$i]['category_name'] . '</td>
						<td width="20%">' . $result[$i]['access_name'] . '</td>
						<td width="10%">' . $td_image . '</td>
						<td width="10%">' . $banner_image . '</td>
						<td width="10%"><div class="btn-group">
						<button class="btn dropdown-toggle ' . $cls . ' btn_custom" data-toggle="dropdown">' . $current_status . ' <i class="fa fa-angle-down"></i> </button>
						<ul class="dropdown-menu pull-right">
							<li><a class="status_change" href="' . file_path('admin') . '' . $this->uri->rsegment(1) . '/status_update/' . $update_status . '/' . $result[$i]['category_id'] . '">' . $update_status . '</a></li>
							<li><a href="' . file_path('admin') . '' . $this->uri->rsegment(1) . '/addnew/edit/' . $result[$i]['category_id'] . '">Edit</a></li>';
			$html .= '<li><a class="delete_record" href="' . file_path('admin') . '' . $this->uri->rsegment(1) . '/delete_record/' . $result[$i]['category_id'] . '">Delete</a></li>';
			$html .= '</ul>
						</div>
						</td>
					</tr>';
		}

		return $html;
	}

	function addnew($mode = null, $eid = null) {

		if ($mode == 'edit') {
			$data['form_set'] = array('mode' => 'edit', 'eid' => $eid);

			$data['result'] = $this->ObjM->get_record($eid);
		} else {
			$data['form_set'] = array('mode' => 'add');
		}

		$page_info['menu_id'] = 'menu-category-list';

		$page_info['page_title'] = 'Category List';

		$this->load->view('common/topheader');

		$this->load->view('common/header_admin', $page_info);

		$this->load->view('admin/' . $this->uri->rsegment(1) . '_add', $data);

		$this->load->view('common/footer_admin');
	}

	function insert() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			//$this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');

			if ($_POST['mode'] == 'edit') {
				$this->form_validation->set_rules('category_name', 'category name', 'required|trim|callback_check_edit_unique_cn');
				$this->form_validation->set_rules('access_name', 'access name', 'required|trim|callback_check_edit_unique_an');
			} else {
				$this->form_validation->set_rules('category_name', 'category name', 'required|trim|callback_check_add_unique_cn');
				$this->form_validation->set_rules('access_name', 'access name', 'required|trim|callback_check_add_unique_an');
			}

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

	function check_add_unique_an() {

		$access_name = $this->input->post('access_name');

		$res = $this->ObjM->check_access_name($access_name);

		if (count($res) > 0) {
			$this->form_validation->set_message('check_add_unique_an', 'This access name is already taken. Please use a different access name.');

			return false;
		} else {
			return true;
		}
	}

	function check_edit_unique_an() {

		$id = $this->input->post('eid');

		$access_name = $this->input->post('access_name');

		$res = $this->ObjM->get_record_access_name_not_in($id, $access_name);

		if (count($res) > 0) {
			$this->form_validation->set_message('check_edit_unique_an', 'This access name is already taken. Please use a different access name.');

			return false;
		} else {
			return true;
		}
	}

	function check_add_unique_cn() {

		$category_name = $this->input->post('category_name');

		$res = $this->ObjM->check_cate_name($category_name);

		if (count($res) > 0) {
			$this->form_validation->set_message('check_add_unique_cn', 'This name is already taken. Please use a different name.');

			return false;
		} else {
			return true;
		}
	}

	function check_edit_unique_cn() {

		$id = $this->input->post('eid');

		$category_name = $this->input->post('category_name');

		$res = $this->ObjM->get_record_name_not_in($id, $category_name);

		if (count($res) > 0) {
			$this->form_validation->set_message('check_edit_unique_cn', 'This name is already taken. Please use a different name.');

			return false;
		} else {
			return true;
		}
	}

	protected function _insert() {

		$data = array();

		$data['category_name'] = filter_data($_POST['category_name']);

		$access_name = str_replace(' ', '_', $_POST['access_name']);

		$access_name1 = ucfirst($access_name);

		$data['access_name'] = filter_data($access_name1);

		if (isset($_FILES['upload_file']) && !empty($_FILES['upload_file']['name'])) {
			$this->handle_upload();
			$data['img_name'] = $_POST['file_name'];
		}

		if (isset($_FILES['upload_file_banner']) && !empty($_FILES['upload_file_banner']['name'])) {
			$this->handle_upload_banner();
			$data['banner_name'] = $_POST['file_name'];
		}

		if ($_POST['mode'] == 'add') {

			$data['status'] = 'Active';

			$data['create_date'] = date('Y-m-d h:i:s');

			$data['update_date'] = date('Y-m-d h:i:s');

			$this->comman_fun->additem($data, 'category_master');

			$this->session->set_flashdata("success", "Record Insert Successfully.....");
		}
		if ($_POST['mode'] == 'edit') {

			$data['update_date'] = date('Y-m-d h:i:s');

			$this->comman_fun->update($data, 'category_master', array('category_id' => $_POST['eid']));

			$this->session->set_flashdata("success", "Record Update Successfully.....");
		}
	}

	function status_update($st, $eid) {

		$record = $this->comman_fun->get_table_data('category_master', array('category_id' => $eid));

		$data['status'] = $st;

		$this->comman_fun->update($data, 'category_master', array('category_id' => $eid));

		$this->session->set_flashdata('show_msg', array('class' => 'true', 'msg' => 'Status ' . $st . ' Successfully.....'));

		redirect(file_path('admin') . "" . $this->uri->rsegment(1) . "/view");
	}

	function delete_record($eid) {

		$record = $this->comman_fun->get_table_data('category_master', array('category_id' => $eid));

		$data['status'] = 'Delete';

		$this->comman_fun->update($data, 'category_master', array('category_id' => $eid));

		$this->session->set_flashdata('show_msg', array('class' => 'true', 'msg' => 'Record Delete Successfully.....'));

		redirect(file_path('admin') . "" . $this->uri->rsegment(1) . "/view");
	}

	function handle_upload() {
		if (isset($_FILES['upload_file']) && !empty($_FILES['upload_file']['name'])) {
			$config = array();
			$config['upload_path'] = './upload/category';
			$config['allowed_types'] = 'jpg|jpeg|gif|png|JPG|JPEG|PNG';
			$config['max_size'] = '0';
			$config['overwrite'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$_FILES['userfile']['name'] = $_FILES['upload_file']['name'];
			$_FILES['userfile']['type'] = $_FILES['upload_file']['type'];
			$_FILES['userfile']['tmp_name'] = $_FILES['upload_file']['tmp_name'];
			$_FILES['userfile']['error'] = $_FILES['upload_file']['error'];
			$_FILES['userfile']['size'] = $_FILES['upload_file']['size'];
			$rand = rand(10, 9999);
			$fileName = 'cat_' . $rand . '_' . $_FILES['upload_file']['name'];
			$fileName = str_replace(" ", "", $fileName);
			$config['file_name'] = $fileName;
			$this->upload->initialize($config);

			if ($this->upload->do_upload()) {
				$upload_data = $this->upload->data();
				$_POST['file_name'] = $upload_data['file_name'];

				$this->_create_thumbnail($upload_data['file_name'], 62, 60);
				return true;
			} else {

				echo $this->upload->display_errors();
			}
		}

	}

	protected function _create_thumbnail($fileName, $width, $height) {

		$config['image_library'] = 'gd2';
		$config['source_image'] = './upload/category/' . $fileName;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = $width;
		$config['height'] = $height;
		$config['new_image'] = './upload/category/thum/' . $fileName;
		$config['thumb_marker'] = '';

		$this->image_lib->initialize($config);
		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
		}
		return true;
	}

	function handle_upload_banner() {
		if (isset($_FILES['upload_file_banner']) && !empty($_FILES['upload_file_banner']['name'])) {
			$config = array();
			$config['upload_path'] = './upload/category';
			$config['allowed_types'] = 'jpg|jpeg|gif|png|JPG|JPEG|PNG';
			$config['max_size'] = '0';
			$config['overwrite'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$_FILES['userfile']['name'] = $_FILES['upload_file_banner']['name'];
			$_FILES['userfile']['type'] = $_FILES['upload_file_banner']['type'];
			$_FILES['userfile']['tmp_name'] = $_FILES['upload_file_banner']['tmp_name'];
			$_FILES['userfile']['error'] = $_FILES['upload_file_banner']['error'];
			$_FILES['userfile']['size'] = $_FILES['upload_file_banner']['size'];
			$rand = rand(10, 9999);
			$fileName = 'cat_' . $rand . '_' . $_FILES['upload_file_banner']['name'];
			$fileName = str_replace(" ", "", $fileName);
			$config['file_name'] = $fileName;
			$this->upload->initialize($config);

			if ($this->upload->do_upload()) {
				$upload_data = $this->upload->data();
				$_POST['file_name'] = $upload_data['file_name'];

				$this->_create_thumbnail($upload_data['file_name'], 1620, 400);
				return true;
			} else {

				echo $this->upload->display_errors();
			}
		}

	}
}
