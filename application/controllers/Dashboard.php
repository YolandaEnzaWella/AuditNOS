<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['filter_indikator'] = array(1 => 'INTERAKSI DI AWAL TELEPON', 2 => 'INTERAKSI SAAT MEMBICARAKAN PEMBELIAN MOTOR', 3 => 'INTERAKSI SAAT TIDAK JADI MEMBELI MOTOR', 4 => 'INTERAKSI DI AKHIR TELEPON');

        $this->template->load('templates/dashboard', 'dashboard', $data);
    }
}
