<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cron_job extends CI_Controller {
	function __construct() {
		parent::__construct();
		//date_default_timezone_set("UTC");
		date_default_timezone_set('Asia/Calcutta');
		$this->load->model('Corn_job_model', 'ObjM', TRUE);
	}

	public function index() {
		$this->export_database();
	}

	public function export_database() {
		$this->load->dbutil();
		$prefs = array(
			'format' => 'zip',
			'filename' => 'shubhexa.sql',
		);
		$backup = &$this->dbutil->backup($prefs);
		$db_name = 'shubhexa-db-' . date("Y-m-d-H-i-s") . '.zip';
		$save = 'database_backup/' . $db_name;
		$this->load->helper('file');
		write_file($save, $backup);
		$this->load->helper('download');
		force_download($db_name, $backup);
	}

}
