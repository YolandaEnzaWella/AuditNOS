<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cs extends CI_Controller {

	public function __construct(){
		parent::__construct();
		cek_login();
		
		$this->load->model('Admin_model', 'admin');
		$this->load->model('Cs_model');
		$this->load->model('Cs_indikator_model','csi');
		$this->load->model('Dealer_model','dealer');
		$this->load->library('form_validation');
		$this->load->library(array('excel','session'));
	}

	public function index()
	{
		$this->load->model('Cs_model');
        $data['title'] = "Call Survey";
        $data['history'] = $this->Cs_model->get_history();
        $this->template->load('templates/dashboard', 'cs/history', $data);
	}

	private function _validasi($mode)
	{
		// $this->form_validation->set_rules('mci_atribut', 'Atribut Penilaian', 'required|trim');
		$this->form_validation->set_rules('csp_dealer_id', 'Dealer', 'required');
		$this->form_validation->set_rules('csp_nama_penilai', 'Nama Konsumen', 'required');
		$this->form_validation->set_rules('csp_notelp_penilai', 'Nomor Telpon Konsumen', 'required|numeric');

		if ($mode == 'add') {
			$this->form_validation->set_rules('csp_dealer_id', 'Dealer', 'required');
			$this->form_validation->set_rules('csp_nama_penilai', 'Nama Konsumen', 'required');
			$this->form_validation->set_rules('csp_notelp_penilai', 'Nomor Telepon Konsumen', 'required|numeric');
		} else {
			$db = $this->mci->cari_mci($this->input->post('mcp_id', true));
			$dealer = $this->input->post('csp_dealer_id', true);
			$penilai = $this->input->post('csp_nama_penilai', true);
			$notelp_penilai = $this->input->post('csp_notelp_penilai', true);
		}
	}

	public function add()
	{
		$this->_validasi('add');

		if ($this->form_validation->run() == false) {
			$data = [
				'title' => "Entri Penilaian Call Survey",
				'dealer' => $this->dealer->get_dealer(),

			];
			// print_r(validation_errors());
			$this->template->load('templates/dashboard', 'cs/cs', $data);
		} else {
			$input = $this->input->post(null, true);
			$input_data = [
				// 'mcp_id' => $input['mcp_id'],
				'csp_dealer_id'          => $input['csp_dealer_id'],
				'csp_nama_penilai'          => $input['csp_nama_penilai'],
				'csp_notelp_penilai'          => $input['csp_notelp_penilai'],
				'created_at' => date('Y-m-d')
			];

			$save = $this->Cs_model->simpan('cs_penilaian', $input_data);
			if ($save) {
				// var_dump($save);
				// set_pesan('data berhasil disimpan.');
				redirect('cs/penilaian/' . $save);
			} else {
				set_pesan('data gagal disimpan', false);
				redirect('cs');
			}
		}
	}

	public function penilaian($id)
	{
		$data = [
			'title' => "Detail Penilaian Call Survey",
			'penilaian_id' => $id,
			'history_list' => $this->Cs_model->get_history_list($id),
			'indikator' => $this->csi->get_indikator(),
		];
		$this->template->load('templates/dashboard', 'cs/penilaian', $data);
	}

	public function detail_penilaian($id)
	{
		$data = [
			'title' => "Detail Penilaian Call Survey",
			'history_list' => $this->Cs_model->get_history_list($id),
			// 'jumlah_operasional' => $this->Mc_model->jumlahDealerOperation(),
			// 'jumlah_hospitality' => $this->Mc_model->jumlahHospitality(),
			// 'jumlah_produkknowledge' => $this->Mc_model->jumlahProdukKnowledge(),
			// 'jumlah_sellingskill' => $this->Mc_model->jumlahSellingSkill(),
			'jumlah_ya' => $this->Cs_model->jumlahNilai($id, 2),
			'jumlah_tidak' => $this->Cs_model->jumlahNilai($id, 1),
			'jumlah_tidak_menjawab' => $this->Cs_model->jumlahNilai($id, 0),
			'pdsa8_1' => $this->csi->pdsa1($id, "A201H", array('h','i','j','k','l'),2),
			'pdsa8_2' => $this->csi->pdsa1($id, "A201I", array('g','h','i','j','k'),2)
			// 'penilaian_dealer_operation_ya' => $this->Mc_model->jumlahNilaiPerPenilaian($id, 1, 1),
			// 'penilaian_dealer_operation_tidak' => $this->Mc_model->jumlahNilaiPerPenilaian($id, 0, 1),
			// 'penilaian_hospitality_ya' => $this->Mc_model->jumlahNilaiPerPenilaian($id, 1, 2),
			// 'penilaian_hospitality_tidak' => $this->Mc_model->jumlahNilaiPerPenilaian($id, 0, 2),
			// 'penilaian_product_knowledge_ya' => $this->Mc_model->jumlahNilaiPerPenilaian($id, 1, 3),
			// 'penilaian_product_knowledge_tidak' => $this->Mc_model->jumlahNilaiPerPenilaian($id, 0, 3),
			// 'penilaian_selling_skill_ya' => $this->Mc_model->jumlahNilaiPerPenilaian($id, 1, 4),
			// 'penilaian_selling_skill_tidak' => $this->Mc_model->jumlahNilaiPerPenilaian($id, 0, 4),
			// 'jumlahDealer' => $this->Mc_model->countDealer()
		];
		$this->template->load('templates/dashboard', 'cs/history_detail', $data);
	}
	


	public function grafik_cs()
	{
		$grafik = $this->Cs_model->grafik_dealer_cs();
		$data=[];
		$total=0;
		foreach($grafik as $nilai){
			$total=$nilai->score / $nilai->jumlah_respon * 100;
			array_push($data, array('csp_score'=> $total, 'respon'=>$nilai->jumlah_respon, 'nama_dealer'=>$nilai->nama_dealer ));
		}

		// var_dump($data);
		echo json_encode($data);
	}

	public function simpan_penilaian()
	{
		// $nilai = implode(',', $this->input->post('mcdp_nilai'));
		$data_nilai = $this->input->post('csdp_nilai');
		// $data_nilai2 = $this->input->post('mcdp_nilai2');
		// $data_nilai3 = $this->input->post('mcdp_nilai3');
		// $data_nilai4 = $this->input->post('mcdp_nilai4');
		$indikator = $this->input->post('csdp_csi_id');
		// $indikator2 = $this->input->post('mcdp_mci_id2');
		// $indikator3 = $this->input->post('mcdp_mci_id3');
		// $indikator4 = $this->input->post('mcdp_mci_id4');
		$id = $this->input->post("csdp_csp_id");
		// var_dump($indikator);
		$data = array();
		for ($i = 0; $i < count($data_nilai); $i++) {
			$data[] = array(
				'csdp_csp_id' => $this->input->post("csdp_csp_id"),
				'csdp_csi_id' => $indikator[$i],
				'csdp_nilai' => $data_nilai[$i],
			);
			// var_dump($i);
		}
		// for ($i = 0; $i < count($data_nilai2); $i++) {
		// 	$data[] = array(
		// 		'mcdp_mcp_id' => $this->input->post("mcdp_mcp_id"),
		// 		'mcdp_mci_id' => $indikator2[$i],
		// 		'mcdp_nilai' => $data_nilai2[$i],
		// 	);
		// 	// var_dump($i);
		// }
		// for ($i = 0; $i < count($data_nilai3); $i++) {
		// 	$data[] = array(
		// 		'mcdp_mcp_id' => $this->input->post("mcdp_mcp_id"),
		// 		'mcdp_mci_id' => $indikator3[$i],
		// 		'mcdp_nilai' => $data_nilai3[$i],
		// 	);
		// 	// var_dump($i);
		// }
		// for ($i = 0; $i < count($data_nilai4); $i++) {
		// 	$data[] = array(
		// 		'mcdp_mcp_id' => $this->input->post("mcdp_mcp_id"),
		// 		'mcdp_mci_id' => $indikator4[$i],
		// 		'mcdp_nilai' => $data_nilai4[$i],
		// 	);
		// 	// var_dump($i);
		// }


		$save = $this->Cs_model->simpan_penilaian('cs_detail_penilaian', $data);
		if ($save) {
			$jumlah_ya = $this->Cs_model->jumlahNilai($id, 2);
			$jumlah_tidak = $this->Cs_model->jumlahNilai($id, 1);
			$jumlah_tidak_menjawab = $this->Cs_model->jumlahNilai($id, 0);
			$pdsa8_1= $this->csi->pdsa1($id, "A201H", array('h','i','j','k','l'),2);
			$pdsa8_2 = $this->csi->pdsa1($id, "A201I", array('g','h','i','j','k'),2);
			$grading= ($jumlah_ya + $pdsa8_1 + $pdsa8_2) / ($jumlah_ya + $jumlah_tidak + $pdsa8_1 + $pdsa8_2); 
			$data_penilaian =
				[
					'csp_score' => $grading,
					// 'mcp_predikat' => $this->grading_val($grading),
					// 'mcp_status' => $this->status_val($jumlah_ya + $jumlah_tidak)
				];
			$this->Cs_model->update('cs_penilaian', array('csp_id' => $id), $data_penilaian);
			redirect('cs/detail_penilaian/' . $id);
		}
	}

}