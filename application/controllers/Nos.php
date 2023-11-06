<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		cek_login();
		
		$this->load->model('Admin_model', 'admin');
		$this->load->model('Nos_model');
		$this->load->library('form_validation');
		$this->load->library(array('excel','session'));
	}

	public function index()
	{
		$this->load->model('Nos_model');
		$data['title'] = "NOS";
		
		/*
		$data = [
            'title' => 'Grafik Data',   // Sebagai Title dari halaman
            'nama' => $this->Peopledev_model->get_nama()
        ];
		// var_dump($data['untrained_by_distrik']);
		// die;
		*/
		$this->template->load('templates/dashboard','nos/import_excel',$data);
	} 
}

