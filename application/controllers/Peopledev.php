<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peopledev extends CI_Controller {

	public function __construct(){
		parent::__construct();
		cek_login();
		
		$this->load->model('Admin_model', 'admin');
		$this->load->model('Peopledev_model');
		$this->load->library('form_validation');
		$this->load->library(array('excel','session'));
	}

	public function index()
	{
		$this->load->model('Peopledev_model');
		$data['title'] = "People Development";
        if (is_admin()) {
        $data['list_data'] = $this->Peopledev_model->getData();
        $data['trained'] = $this->Peopledev_model->getTotalTrained();
        $data['untrained'] = $this->Peopledev_model->getTotalUntrained();
        }else {
        $data['list_data'] = $this->Peopledev_model->getDataByDealer($this->session->userdata('login_session')['kode_dealer']);
        $data['trained'] = $this->Peopledev_model->getDataTrainedByDealer($this->session->userdata('login_session')['kode_dealer']);
        $data['untrained'] = $this->Peopledev_model->getDataUntrainedByDealer($this->session->userdata('login_session')['kode_dealer']); 
        }
		
		/*
		$data = [
            'title' => 'Grafik Data',   // Sebagai Title dari halaman
            'nama' => $this->Peopledev_model->get_nama()
        ];
		// var_dump($data['untrained_by_distrik']);
		// die;
		*/
		$this->template->load('templates/dashboard','peopledev/import_excel',$data);
	}

	private function _validasi()
    {
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    }

	public function import_excel(){
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();	
				for($row=2; $row<=$highestRow; $row++)
				{
					$kode_dealer = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nama_dealer = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$distrik = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$honda_id = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$nama_karyawan = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$jabatan = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$wajib_training = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$status_training = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$temp_data[] = array(
						'kode_dealer'	=> $kode_dealer,
						'nama_dealer'	=> $nama_dealer,
						'distrik'	=> $distrik,
						'honda_id'	=> $honda_id,
						'nama_karyawan'	=> $nama_karyawan,
						'jabatan'	=> $jabatan,
						'wajib_training'	=> $wajib_training,
						'status_training'	=> $status_training
					); 	
				}
			}
			$this->load->model('Peopledev_model');
			$insert = $this->Peopledev_model->insert($temp_data);
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

	public function district()
    {
        $this->load->model('Peopledev_model');
        $data['title'] = "By District";
        $data['trained'] = $this->Peopledev_model->getTotalTrained();
		$data['untrained'] = $this->Peopledev_model->getTotalUntrained();
        $data['trained_bengkalis'] = $this->Peopledev_model->getTotalTrainedByDistrik('bengkalis');
        $data['trained_inhil'] = $this->Peopledev_model->getTotalTrainedByDistrik('inhil');
        $data['trained_inhu'] = $this->Peopledev_model->getTotalTrainedByDistrik('inhu');
        $data['trained_kampar'] = $this->Peopledev_model->getTotalTrainedByDistrik('kampar');
        $data['trained_kuansing'] = $this->Peopledev_model->getTotalTrainedByDistrik('kuansing');
        $data['trained_pekanbaru'] = $this->Peopledev_model->getTotalTrainedByDistrik('pekanbaru');
        $data['trained_pelalawan'] = $this->Peopledev_model->getTotalTrainedByDistrik('[pelalawan]');
        $data['trained_rohil'] = $this->Peopledev_model->getTotalTrainedByDistrik('rohil');
        $data['trained_rohul'] = $this->Peopledev_model->getTotalTrainedByDistrik('rohul');
        $data['trained_siak'] = $this->Peopledev_model->getTotalTrainedByDistrik('siak');
        $data['untrained_bengkalis'] = $this->Peopledev_model->getTotalUntrainedByDistrik('bengkalis');
        $data['untrained_inhil'] = $this->Peopledev_model->getTotalUntrainedByDistrik('inhil');
        $data['untrained_inhu'] = $this->Peopledev_model->getTotalUntrainedByDistrik('inhu');
        $data['untrained_kampar'] = $this->Peopledev_model->getTotalUntrainedByDistrik('kampar');
        $data['untrained_kuansing'] = $this->Peopledev_model->getTotalUntrainedByDistrik('kuansing');
        $data['untrained_pekanbaru'] = $this->Peopledev_model->getTotalUntrainedByDistrik('pekanbaru');
        $data['untrained_pelalawan'] = $this->Peopledev_model->getTotalUntrainedByDistrik('[pelalawan]');
        $data['untrained_rohil'] = $this->Peopledev_model->getTotalUntrainedByDistrik('rohil');
        $data['untrained_rohul'] = $this->Peopledev_model->getTotalUntrainedByDistrik('rohul');
        $data['untrained_siak'] = $this->Peopledev_model->getTotalUntrainedByDistrik('siak');



        $data['nama'] = $this->Peopledev_model->get_nama();
        $data['jabatan'] = $this->Peopledev_model->get_jabatan();

        // var_dump($data['nama']); die;

        $this->template->load('templates/dashboard', 'peopledev/district', $data);
    }

    public function data_grafik()
    {
        $fd = $this->filter();
        $filtering = $fd['filter'];
        $grafik = $this->Peopledev_model->data_grafik($filtering);
        
        $data = json_encode($grafik);
        echo $data;
    }

    public function data_grafik_dealer()
    {
        $fd = $this->filterdealer();
        $filtering = $fd['filterdealer'];
        $grafik_dealer = $this->Peopledev_model->data_grafik_dealer($filtering);
        
        $data = json_encode($grafik_dealer);
        echo $data;
    }

    public function data_grafik_jabatan()
    {
        $fd = $this->filterjabatan();
        $filtering = $fd['filterjabatan'];
        $grafik_jabatan = $this->Peopledev_model->data_grafik_jabatan($filtering);
        
        $data = json_encode($grafik_jabatan);
        echo $data;
    }

    public function data_grafik_stack()
    {
        $get_kategori = $this->Peopledev_model->get_kategori();
        $data = [];
        foreach ($get_kategori as $status_training) {
            $grafik = $this->Peopledev_model->data_grafik_stack($status_training->status_training);
            array_push($data, $grafik);
        }
        echo $data = json_encode($data);
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

    private function filterdealer()
    {
        $filter_nama = $this->input->get('filter_nama');
        if ($filter_nama != '') {
            $filter_nama = ['nama_dealer' => $filter_nama];
        } else {
            $filter_nama = [];
        }
        return ['filterdealer' => $filter_nama];
    }

        private function filterjabatan()
    {
        $filter_nama = $this->input->get('filter_nama');
        if ($filter_nama != '') {
            $filter_nama = ['wajib_training' => $filter_nama];
        } else {
            $filter_nama = [];
        }
        return ['filterjabatan' => $filter_nama];
    }


    public function dealer()
    {
        $this->load->model('Peopledev_model');
        $data['title'] = "By Dealer";
        $data['nama'] = $this->Peopledev_model->get_namadealer();
        $data['jabatan'] = $this->Peopledev_model->get_jabatan();
        $this->template->load('templates/dashboard', 'peopledev/dealer', $data);
        /*
        $data['trained_TOKOSUZ'] = $this->Peopledev_model->getTotalTrainedByDealer('TOKO SUZ');
        $data['trained_FEDERALSERVICE'] = $this->Peopledev_model->getTotalTrainedByDealer('FEDERAL SERVICE');
        $data['trained_BangkinangIndahServis'] = $this->Peopledev_model->getTotalTrainedByDealer('Bangkinang Indah Servis');
        $data['trained_PUTRABAGANBATUINDAH'] = $this->Peopledev_model->getTotalTrainedByDealer('PUTRA BAGANBATU INDAH');
        $data['trained_CitraMotor'] = $this->Peopledev_model->getTotalTrainedByDealer('Citra Motor');
        $data['trained_FASILITASAHASS'] = $this->Peopledev_model->getTotalTrainedByDealer('FASILITASAHASS');
        $data['trained_ANDALASMOTOR'] = $this->Peopledev_model->getTotalTrainedByDealer('[ANDALAS MOTOR]');
        $data['trained_PANGERAN MOTOR'] = $this->Peopledev_model->getTotalTrainedByDealer('PANGERAN MOTOR');
        $data['trained_rohul'] = $this->Peopledev_model->getTotalTrainedByDealer('rohul');
        $data['trained_siak'] = $this->Peopledev_model->getTotalTrainedByDealer('siak');
        $data['trained_siak'] = $this->Peopledev_model->getTotalTrainedByDealer('siak');
        $data['trained_siak'] = $this->Peopledev_model->getTotalTrainedByDealer('siak');
        $data['trained_siak'] = $this->Peopledev_model->getTotalTrainedByDealer('siak');
        $data['trained_siak'] = $this->Peopledev_model->getTotalTrainedByDealer('siak');
        $data['trained_siak'] = $this->Peopledev_model->getTotalTrainedByDealer('siak');
        $data['trained_siak'] = $this->Peopledev_model->getTotalTrainedByDealer('siak');
        $data['untrained_bengkalis'] = $this->Peopledev_model->getTotalUntrainedByDealer('bengkalis');
        $data['untrained_inhil'] = $this->Peopledev_model->getTotalUntrainedByDealer('inhil');
        $data['untrained_inhu'] = $this->Peopledev_model->getTotalUntrainedByDealer('inhu');
        $data['untrained_kampar'] = $this->Peopledev_model->getTotalUntrainedByDealer('kampar');
        $data['untrained_kuansing'] = $this->Peopledev_model->getTotalUntrainedByDealer('kuansing');
        $data['untrained_pekanbaru'] = $this->Peopledev_model->getTotalUntrainedByDealer('pekanbaru');
        $data['untrained_pelalawan'] = $this->Peopledev_model->getTotalUntrainedByDealer('[pelalawan]');
        $data['untrained_rohil'] = $this->Peopledev_model->getTotalUntrainedByDealer('rohil');
        $data['untrained_rohul'] = $this->Peopledev_model->getTotalUntrainedByDealer('rohul');
        $data['untrained_siak'] = $this->Peopledev_model->getTotalUntrainedByDealer('siak');
        */

        
    }

    
}
