<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crm extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();

		$this->load->model('Admin_model', 'admin');
		$this->load->model('Crm_model');
		$this->load->library('form_validation');
		$this->load->library(array('excel', 'session'));
	}

	public function index()
	{
		$this->load->model('Crm_model');
		$data['title'] = "CRM";
		$data['list_data'] = $this->Crm_model->getData();
		$data['year'] = $this->Crm_model->getYear();
		/*
		$data = [
            'title' => 'Grafik Data',   // Sebagai Title dari halaman
            'nama' => $this->Peopledev_model->get_nama()
        ];
		// var_dump($data['untrained_by_distrik']);
		// die;
		*/
		$this->template->load('templates/dashboard', 'crm/dashboard', $data);
	}

	public function add()
	{
		$data['title'] = "CRM";
		$this->template->load('templates/dashboard', 'crm/add', $data);
	}

	public function data_grafik_dealer()
	{
		$filter = $this->filter_dealer();
		$filtering = $filter['filtermonth'];
		$grafik = $this->Crm_model->grafik_crm_by_dealer($filtering);
		$data = json_encode($grafik);
		echo $data;
	}

	public function data_kpb_dealer()
	{
		$filter = $this->filter_kpb_dealer();
		$filtering = $filter['filtermonth'];
		$grafik = $this->Crm_model->grafik_kpb_by_dealer($filtering);
		$data = json_encode($grafik);
		echo $data;
	}

	private function filter_dealer()
	{
		$filter = $this->input->get('filter_crm_dealer');
		if ($filter != '') {
			$filter = ['YEAR(date)' => $filter];
		} else {
			$filter = [];
		}
		return ['filtermonth' => $filter];
	}

	private function filter_kpb_dealer()
	{
		$filter = $this->input->get('filter_kpb_dealer');
		if ($filter != '') {
			$filter = ['YEAR(date)' => $filter];
		} else {
			$filter = [];
		}
		return ['filtermonth' => $filter];
	}

	private function filter_bulanan()
	{
		$filter = $this->input->get('filter_crm_month');
		if ($filter != '') {
			$filter = ['YEAR(date)' => $filter];
		} else {
			$filter = [];
		}
		return ['filtermonth' => $filter];
	}

	private function filter_kpb_bulanan()
	{
		$filter = $this->input->get('filter_kpb_month');
		if ($filter != '') {
			$filter = ['YEAR(date)' => $filter];
		} else {
			$filter = [];
		}
		return ['filtermonth' => $filter];
	}

	private function filter_distrik()
	{
		$filter = $this->input->get('filter_crm_distrik');
		if ($filter != '') {
			$filter = ['YEAR(date)' => $filter];
		} else {
			$filter = [];
		}
		return ['filtermonth' => $filter];
	}

	private function filter_kpb_distrik()
	{
		$filter = $this->input->get('filter_kpb_distrik');
		if ($filter != '') {
			$filter = ['YEAR(date)' => $filter];
		} else {
			$filter = [];
		}
		return ['filtermonth' => $filter];
	}

	public function data_grafik_distrik()
	{
		$filter = $this->filter_distrik();
		$filtering = $filter['filtermonth'];
		$grafik = $this->Crm_model->grafik_crm_by_distrik($filtering);
		$data = json_encode($grafik);
		echo $data;
	}

	public function data_kpb_distrik()
	{
		$filter = $this->filter_kpb_distrik();
		$filtering = $filter['filtermonth'];
		$grafik = $this->Crm_model->grafik_kpb_by_distrik($filtering);
		$data = json_encode($grafik);
		echo $data;
	}


	public function data_grafik_bulanan()
	{
		$filter = $this->filter_bulanan();
		$filtering = $filter['filtermonth'];
		$grafik = $this->Crm_model->grafik_crm_by_month($filtering);
		$data = json_encode($grafik);
		echo $data;
	}

	public function data_kpb_bulanan()
	{
		$filter = $this->filter_kpb_bulanan();
		$filtering = $filter['filtermonth'];
		$grafik = $this->Crm_model->grafik_kpb_by_month($filtering);
		$data = json_encode($grafik);
		echo $data;
	}

	public function daily()
	{
		$data['title'] = "Aktifitas Harian CRM";
		$this->template->load('templates/dashboard', 'crm/daily', $data);
	}

	private function _validasi()
	{
		$this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required|trim');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
	}

	private function reset_table()
	{
		$this->db->truncate('crm');
	}


	public function import_excelcrm()
	{
		$this->reset_table();
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {
					// $date = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$date = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$date_parse = PHPExcel_Shared_Date::ExcelToPHP($date);
					$kode_dealer = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$h1_h1 = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$h2_h1_ds = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$h2_h1_dl = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$kpb_1 = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$kpb_2 = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$kpb_3 = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$kpb_4 = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$sales = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$temp_data[] = array(
						'date' =>  gmdate("Y-m-d", $date_parse),
						'crm_kode_dealer'	=> $kode_dealer,
						'h1_ke_h1'	=> $h1_h1,
						'h2_ke_h1_ds'	=> $h2_h1_ds,
						'h2_ke_h1_dl'	=> $h2_h1_dl,
						'kpb1'	=> $kpb_1,
						'kpb2'	=> $kpb_2,
						'kpb3'	=> $kpb_3,
						'kpb4'	=> $kpb_4,
						'sales'	=> $sales,
						// 'ach'	=> $ach
					);
				}
			}
			$this->load->model('Crm_model');
			$insert = $this->Crm_model->insertcrm($temp_data);
			if ($insert) {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			echo "Tidak ada file yang masuk";
		}
	}

	public function import_excel()
	{
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {
					$kode_dealer = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$januari = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$februari = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$maret = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$april = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$mai = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$juni = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$juli = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$agustus = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$september = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$oktober = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$november = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$desember = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$ach = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$temp_data[] = array(
						'kode_dealer'	=> $kode_dealer,
						'januari'	=> $januari,
						'februari'	=> $februari,
						'maret'	=> $maret,
						'april'	=> $april,
						'mai'	=> $mai,
						'juni'	=> $juli,
						'agustus'	=> $agustus,
						'september'	=> $september,
						'oktober'	=> $oktober,
						'november'	=> $november,
						'desember'	=> $desember,
						'ach'	=> $ach
					);
				}
			}
			$this->load->model('Crm_model');
			$insert = $this->Crm_model->insert($temp_data);
			if ($insert) {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			echo "Tidak ada file yang masuk";
		}
	}

	public function import_excelds()
	{
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {
					$kode_dealer = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$januari = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$februari = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$maret = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$april = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$mai = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$juni = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$juli = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$agustus = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$september = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$oktober = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$november = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$desember = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$ach = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$temp_data[] = array(
						'kode_dealer'	=> $kode_dealer,
						'januari'	=> $januari,
						'februari'	=> $februari,
						'maret'	=> $maret,
						'april'	=> $april,
						'mai'	=> $mai,
						'juni'	=> $juli,
						'agustus'	=> $agustus,
						'september'	=> $september,
						'oktober'	=> $oktober,
						'november'	=> $november,
						'desember'	=> $desember,
						'ach'	=> $ach
					);
				}
			}
			$this->load->model('Crm_model');
			$insertds = $this->Crm_model->insertds($temp_data);
			if ($insertds) {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			echo "Tidak ada file yang masuk";
		}
	}

	public function import_exceldl()
	{
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {
					$kode_dealer = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$januari = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$februari = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$maret = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$april = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$mai = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$juni = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$juli = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$agustus = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$september = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$oktober = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$november = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$desember = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$ach = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$temp_data[] = array(
						'kode_dealer'	=> $kode_dealer,
						'januari'	=> $januari,
						'februari'	=> $februari,
						'maret'	=> $maret,
						'april'	=> $april,
						'mai'	=> $mai,
						'juni'	=> $juli,
						'agustus'	=> $agustus,
						'september'	=> $september,
						'oktober'	=> $oktober,
						'november'	=> $november,
						'desember'	=> $desember,
						'ach'	=> $ach
					);
				}
			}
			$this->load->model('Crm_model');
			$insertdl = $this->Crm_model->insertdl($temp_data);
			if ($insertdl) {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			echo "Tidak ada file yang masuk";
		}
	}

	public function import_excelkpb1()
	{
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {
					$kode_dealer = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$januari = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$februari = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$maret = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$april = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$mai = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$juni = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$juli = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$agustus = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$september = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$oktober = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$november = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$desember = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$ach = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$temp_data[] = array(
						'kode_dealer'	=> $kode_dealer,
						'januari'	=> $januari,
						'februari'	=> $februari,
						'maret'	=> $maret,
						'april'	=> $april,
						'mai'	=> $mai,
						'juni'	=> $juli,
						'agustus'	=> $agustus,
						'september'	=> $september,
						'oktober'	=> $oktober,
						'november'	=> $november,
						'desember'	=> $desember,
						'ach'	=> $ach
					);
				}
			}
			$this->load->model('Crm_model');
			$insertkpb1 = $this->Crm_model->insertkpb1($temp_data);
			if ($insertkpb1) {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			echo "Tidak ada file yang masuk";
		}
	}

	public function import_excelkpb2()
	{
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {
					$kode_dealer = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$januari = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$februari = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$maret = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$april = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$mai = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$juni = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$juli = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$agustus = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$september = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$oktober = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$november = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$desember = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$ach = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$temp_data[] = array(
						'kode_dealer'	=> $kode_dealer,
						'januari'	=> $januari,
						'februari'	=> $februari,
						'maret'	=> $maret,
						'april'	=> $april,
						'mai'	=> $mai,
						'juni'	=> $juli,
						'agustus'	=> $agustus,
						'september'	=> $september,
						'oktober'	=> $oktober,
						'november'	=> $november,
						'desember'	=> $desember,
						'ach'	=> $ach
					);
				}
			}
			$this->load->model('Crm_model');
			$insertkpb2 = $this->Crm_model->insertkpb2($temp_data);
			if ($insertkpb2) {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			echo "Tidak ada file yang masuk";
		}
	}

	public function import_excelkpb3()
	{
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {
					$kode_dealer = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$januari = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$februari = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$maret = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$april = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$mai = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$juni = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$juli = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$agustus = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$september = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$oktober = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$november = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$desember = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$ach = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$temp_data[] = array(
						'kode_dealer'	=> $kode_dealer,
						'januari'	=> $januari,
						'februari'	=> $februari,
						'maret'	=> $maret,
						'april'	=> $april,
						'mai'	=> $mai,
						'juni'	=> $juli,
						'agustus'	=> $agustus,
						'september'	=> $september,
						'oktober'	=> $oktober,
						'november'	=> $november,
						'desember'	=> $desember,
						'ach'	=> $ach
					);
				}
			}
			$this->load->model('Crm_model');
			$insertkpb3 = $this->Crm_model->insertkpb3($temp_data);
			if ($insertkpb3) {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			echo "Tidak ada file yang masuk";
		}
	}

	public function import_excelkpb4()
	{
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {
					$kode_dealer = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$januari = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$februari = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$maret = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$april = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$mai = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$juni = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$juli = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$agustus = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$september = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$oktober = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$november = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$desember = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$ach = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$temp_data[] = array(
						'kode_dealer'	=> $kode_dealer,
						'januari'	=> $januari,
						'februari'	=> $februari,
						'maret'	=> $maret,
						'april'	=> $april,
						'mai'	=> $mai,
						'juni'	=> $juli,
						'agustus'	=> $agustus,
						'september'	=> $september,
						'oktober'	=> $oktober,
						'november'	=> $november,
						'desember'	=> $desember,
						'ach'	=> $ach
					);
				}
			}
			$this->load->model('Crm_model');
			$insertkpb4 = $this->Crm_model->insertkpb4($temp_data);
			if ($insertkpb4) {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			echo "Tidak ada file yang masuk";
		}
	}
}
