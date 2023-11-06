<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ms extends CI_Controller {
	public function __construct(){
		parent::__construct();
		cek_login();
		
		$this->load->model('Admin_model', 'admin');
		$this->load->model('Ms_model');
		$this->load->library('form_validation');
		$this->load->library(array('excel','session'));
	}

	public function index()
	{
		$this->load->model('Ms_model');
        $data['title'] = "Mistery Shopping";
        $data['nama'] = $this->Ms_model->get_nama();
        //$data['nama_ims'] = $this->Ms_model->get_namaims();
        $data['nama_ims2'] = $this->Ms_model->get_namaims2();
        $data['list_data'] = $this->Ms_model->getData();
        $data['list_dataims'] = $this->Ms_model->getData_ims();
        // $data['jabatan'] = $this->Ms_model->get_jabatan();
        $this->template->load('templates/dashboard', 'ms/ms', $data);
	}

	private function _validasi()
    {
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    }
	public function import_excelMs(){
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();	
				for($row=2; $row<=$highestRow; $row++)
				{
					$distrik = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nama_dealer = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$tahun = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$semester = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$value = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$target = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$grade = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$temp_data[] = array(
						'distrik'	=> $distrik,
						'nama_dealer'	=> $nama_dealer,
						'tahun'	=> $tahun,
						'semester'	=> $semester,
						'value'	=> $value,
						'target'	=> $target,
						'grade'	=> $grade
					); 	
				}
			}
			$this->load->model('Ms_model');
			$insert = $this->Ms_model->insert($temp_data);
			if($insert){
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			echo "Tidak ada file yang masuk";
		}
	}

	private function filtertahun()
    {
        $filter_nama = $this->input->get('filter_nama');
        if ($filter_nama != '') {
            $filter_nama = ['tahun' => $filter_nama];
        } else {
            $filter_nama = [];
        }
        return ['filtertahun' => $filter_nama];
    }


    public function data_grafik_ms()
    {
        $fd = $this->filtertahun();
        $filtering = $fd['filtertahun'];
        $grafik_ms = $this->Ms_model->data_grafik_ms($filtering);
        
        $data = json_encode($grafik_ms);
        echo $data;
    }

    private function filter()
    {
        $filter_nama = $this->input->get('filter_nama');
        if ($filter_nama != '') {
            $filter_nama = ['distrik' => $filter_nama];
        } else {
            $filter_nama = [];
        }
        return ['filter' => $filter_nama];
    }

    //Method Issues ms
    public function import_excel_IssueIMs(){
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();	
				for($row=2; $row<=$highestRow; $row++)
				{
					$tahun = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$id_semester = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$h1premisses = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$issues = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$result = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$temp_data[] = array(
						'tahun'	=> $tahun,
						'id_semester'	=> $id_semester,
						'h1premisses'	=> $h1premisses,
						'issues'	=> $issues,
						'result'	=> $result
					); 	
				}
			}
			$this->load->model('Mc_model');
			$insert_ims = $this->Mc_model->insert_ims($temp_data);
			if($insert_ims){
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			echo "Tidak ada file yang masuk";
		}
	}

	public function data_grafik_ims()
    {
        $fd = $this->filterims2();
        $filtering = $fd['filterims2'];
        $grafik_ims = $this->Ms_model->data_grafik_ims($filtering);
        
        $data = json_encode($grafik_ims);
        echo $data;
    }

    // private function filterims()
    // {
    //     $filter_nama = $this->input->get('filter_nama');
    //     if ($filter_nama != '') {
    //         $filter_nama = ['tahun' => $filter_nama];
    //     } else {
    //         $filter_nama = [];
    //     }
    //     return ['filterims' => $filter_nama];
    // }

    private function filterims2()
    {
        $filter_nama = $this->input->get('filter_nama');
        if ($filter_nama != '') {
            $filter_nama = ['id_semester' => $filter_nama];
        } else {
            $filter_nama = [];
        }
        return ['filterims2' => $filter_nama];
    }

}