<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daily extends CI_Controller {

	public function __construct(){
		parent::__construct();
		cek_login();
		
		$this->load->model('Admin_model', 'admin');
		$this->load->model('Daily_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = "Aktifitas Harian CRM";
		$this->template->load('templates/dashboard','daily/daily',$data);
	}
}