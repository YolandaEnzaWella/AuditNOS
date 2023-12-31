<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct(){
		parent::__construct();
		cek_login();
		
		$this->load->model('Admin_model', 'admin');
		$this->load->model('Report_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = "Upload Report";
		$this->template->load('templates/dashboard','report/report',$data);
	}
}