<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mc extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();

		$this->load->model('Admin_model', 'admin');
		$this->load->model('Dealer_model', 'dealer');
		$this->load->model('Mc_indikator_model', 'mci');
		$this->load->model('Mc_model');
		$this->load->library('form_validation');
		$this->load->library(array('excel', 'session'));
	}

	public function index()
	{
		$data['title'] = "Mistery Calling";
		$data['dealer'] = $this->dealer->get_dealer();
		$data['history'] = $this->Mc_model->get_history();
		$this->template->load('templates/dashboard', 'mc/history', $data);
	}

	private function _validasi($mode)
	{
		// $this->form_validation->set_rules('mci_atribut', 'Atribut Penilaian', 'required|trim');
		$this->form_validation->set_rules('mcp_dealer_id', 'Dealer', 'required');
		$this->form_validation->set_rules('mcp_nama_penilai', 'Nama Penilai', 'required');

		if ($mode == 'add') {
			$this->form_validation->set_rules('mcp_dealer_id', 'Dealer', 'required');
			$this->form_validation->set_rules('mcp_nama_penilai', 'Nama Penilai', 'required');
		} else {
			$db = $this->mci->cari_mci($this->input->post('mcp_id', true));
			$dealer = $this->input->post('mci_dealer_id', true);
			$penilai = $this->input->post('mcp_nama_penilai', true);
		}
	}

	public function add()
	{
		$this->_validasi('add');

		if ($this->form_validation->run() == false) {
			$data = [
				'title' => "Entri Penilaian Mistery Calling",
				'dealer' => $this->dealer->get_dealer(),

			];
			// print_r(validation_errors());
			$this->template->load('templates/dashboard', 'mc/mc', $data);
		} else {
			$input = $this->input->post(null, true);
			$input_data = [
				// 'mcp_id' => $input['mcp_id'],
				'mcp_dealer_id'          => $input['mcp_dealer_id'],
				'mcp_nama_penilai'          => $input['mcp_nama_penilai'],
				'created_at' => date('Y-m-d')
			];

			$save = $this->mci->simpan('mc_penilaian', $input_data);
			if ($save) {
				// var_dump($save);
				// set_pesan('data berhasil disimpan.');
				redirect('mc/penilaian/' . $save);
			} else {
				set_pesan('data gagal disimpan', false);
				redirect('mc');
			}
		}
	}

	public function detail_penilaian($id)
	{
		$data = [
			'title' => "Detail Penilaian Mistery Calling",
			'history_list' => $this->Mc_model->get_history_list($id),
			'jumlah_operasional' => $this->Mc_model->jumlahDealerOperation(),
			'jumlah_hospitality' => $this->Mc_model->jumlahHospitality(),
			'jumlah_produkknowledge' => $this->Mc_model->jumlahProdukKnowledge(),
			'jumlah_sellingskill' => $this->Mc_model->jumlahSellingSkill(),
			'jumlah_ya' => $this->Mc_model->jumlahNilai($id, 1),
			'jumlah_tidak' => $this->Mc_model->jumlahNilai($id, 0),
			'penilaian_dealer_operation_ya' => $this->Mc_model->jumlahNilaiPerPenilaian($id, 1, 1),
			'penilaian_dealer_operation_tidak' => $this->Mc_model->jumlahNilaiPerPenilaian($id, 0, 1),
			'penilaian_hospitality_ya' => $this->Mc_model->jumlahNilaiPerPenilaian($id, 1, 2),
			'penilaian_hospitality_tidak' => $this->Mc_model->jumlahNilaiPerPenilaian($id, 0, 2),
			'penilaian_product_knowledge_ya' => $this->Mc_model->jumlahNilaiPerPenilaian($id, 1, 3),
			'penilaian_product_knowledge_tidak' => $this->Mc_model->jumlahNilaiPerPenilaian($id, 0, 3),
			'penilaian_selling_skill_ya' => $this->Mc_model->jumlahNilaiPerPenilaian($id, 1, 4),
			'penilaian_selling_skill_tidak' => $this->Mc_model->jumlahNilaiPerPenilaian($id, 0, 4),
			'jumlahDealer' => $this->Mc_model->countDealer()
		];
		$this->template->load('templates/dashboard', 'mc/history_detail', $data);
	}

	private function filter_indikator()
	{
		$filter = $this->input->get('filter_mc_indikator');
		if ($filter != '') {
			$filter = ['mci_map_id' => $filter];
		} else {
			$filter = [];
		}
		return ['filterindikator' => $filter];
	}


	public function grafik_mc()
	{
		$filter = $this->filter_indikator();
		$filtering = $filter['filterindikator'];
		$grafik = $this->Mc_model->jumlahNilaiPerIndikator($filtering);
		$total_dealer = $this->Mc_model->countDealer();
		$data = [];
		$total = 0;
		$ya = 0;
		foreach ($grafik as $nilai) {
			$total += $nilai->ya;
			$ya =      ($total / $total_dealer) * 100;
			$label = $nilai->mci_atribut;
			array_push($data, array('ya' => $ya, 'mci_atribut' => $label));
		}
		echo json_encode($data);
	}

	public function grafik_mc_dealer()
	{
		$grafik = $this->Mc_model->grafik_dealer_mc();
		$data=[];
		$total=0;
		foreach($grafik as $nilai){
			$total=$nilai->mcp_score;
			array_push($data, array('mcp_score'=> $total, 'nama_dealer'=>$nilai->nama_dealer ));
		}

		// var_dump($data);
		echo json_encode($data);
	}

	function percentage_grading($val)
	{
		if (0 < $val && $val < 49.9) {
			return "Bronze";
		} elseif (50 < $val && $val < 69.9) {
			return "Silver";
		} elseif (70 < $val && $val < 89.9) {
			return "Gold";
		} else {
			return "Platinum";
		}
	}

	public function penilaian($id)
	{
		$data = [
			'title' => "Detail Penilaian Mistery Calling",
			'penilaian_id' => $id,
			'history_list' => $this->Mc_model->get_history_list($id),
			'indikator_1' => $this->mci->get_indikator_tahap1(),
			'indikator_2' => $this->mci->get_indikator_tahap2(),
			'indikator_3' => $this->mci->get_indikator_tahap3(),
			'indikator_4' => $this->mci->get_indikator_tahap4(),
		];
		$this->template->load('templates/dashboard', 'mc/penilaian', $data);
	}

	public function simpan_penilaian()
	{
		// $nilai = implode(',', $this->input->post('mcdp_nilai'));
		$data_nilai1 = $this->input->post('mcdp_nilai1');
		$data_nilai2 = $this->input->post('mcdp_nilai2');
		$data_nilai3 = $this->input->post('mcdp_nilai3');
		$data_nilai4 = $this->input->post('mcdp_nilai4');
		$indikator1 = $this->input->post('mcdp_mci_id1');
		$indikator2 = $this->input->post('mcdp_mci_id2');
		$indikator3 = $this->input->post('mcdp_mci_id3');
		$indikator4 = $this->input->post('mcdp_mci_id4');
		$id = $this->input->post("mcdp_mcp_id");
		// var_dump($indikator);
		$data = array();
		for ($i = 0; $i < count($data_nilai1); $i++) {
			$data[] = array(
				'mcdp_mcp_id' => $this->input->post("mcdp_mcp_id"),
				'mcdp_mci_id' => $indikator1[$i],
				'mcdp_nilai' => $data_nilai1[$i],
			);
			// var_dump($i);
		}
		for ($i = 0; $i < count($data_nilai2); $i++) {
			$data[] = array(
				'mcdp_mcp_id' => $this->input->post("mcdp_mcp_id"),
				'mcdp_mci_id' => $indikator2[$i],
				'mcdp_nilai' => $data_nilai2[$i],
			);
			// var_dump($i);
		}
		for ($i = 0; $i < count($data_nilai3); $i++) {
			$data[] = array(
				'mcdp_mcp_id' => $this->input->post("mcdp_mcp_id"),
				'mcdp_mci_id' => $indikator3[$i],
				'mcdp_nilai' => $data_nilai3[$i],
			);
			// var_dump($i);
		}
		for ($i = 0; $i < count($data_nilai4); $i++) {
			$data[] = array(
				'mcdp_mcp_id' => $this->input->post("mcdp_mcp_id"),
				'mcdp_mci_id' => $indikator4[$i],
				'mcdp_nilai' => $data_nilai4[$i],
			);
			// var_dump($i);
		}


		$save = $this->Mc_model->simpan('mc_detail_penilaian', $data);
		if ($save) {
			$jumlah_ya = $this->Mc_model->jumlahNilai($id, 1);
			$jumlah_tidak = $this->Mc_model->jumlahNilai($id, 0);
			$penilaian_dealer_operation_ya = $this->Mc_model->jumlahNilaiPerPenilaian($id, 1, 1);
			$penilaian_dealer_operation_tidak = $this->Mc_model->jumlahNilaiPerPenilaian($id, 0, 1);
			$penilaian_hospitality_ya = $this->Mc_model->jumlahNilaiPerPenilaian($id, 1, 2);
			$penilaian_hospitality_tidak = $this->Mc_model->jumlahNilaiPerPenilaian($id, 0, 2);
			$penilaian_product_knowledge_ya = $this->Mc_model->jumlahNilaiPerPenilaian($id, 1, 3);
			$penilaian_product_knowledge_tidak = $this->Mc_model->jumlahNilaiPerPenilaian($id, 0, 3);
			$penilaian_selling_skill_ya = $this->Mc_model->jumlahNilaiPerPenilaian($id, 1, 4);
			$penilaian_selling_skill_tidak = $this->Mc_model->jumlahNilaiPerPenilaian($id, 0, 4);
			// $jumlahDealer = $this->Mc_model->countDealer();

			$skor_do_ya = $penilaian_dealer_operation_ya * 1.75;

			$skor_do_tidak = $penilaian_dealer_operation_tidak * 1.75;

			$skor_hospitality_ya = $penilaian_hospitality_ya * 2;
			$skor_hospitality_tidak = $penilaian_hospitality_tidak * 2;

			$skor_product_knowledge_ya = $penilaian_product_knowledge_ya * 9;
			$skor_product_knowledge_tidak = $penilaian_product_knowledge_tidak * 9;

			$skor_selling_skill_ya = $penilaian_selling_skill_ya * 6;
			$skor_selling_skill_tidak = $penilaian_selling_skill_tidak * 6;

			$total_skor_ya = $skor_do_ya + $skor_hospitality_ya + $skor_product_knowledge_ya + $skor_selling_skill_ya;
			$total_skor_tidak = $skor_do_tidak + $skor_hospitality_tidak + $skor_product_knowledge_tidak + $skor_selling_skill_tidak;

			$grading = $total_skor_ya - $total_skor_tidak / 100;
			$data_penilaian =
				[
					'mcp_score' => $grading,
					'mcp_predikat' => $this->grading_val($grading),
					'mcp_status' => $this->status_val($jumlah_ya + $jumlah_tidak)
				];
			$this->Mc_model->update('mc_penilaian', array('mcp_id' => $id), $data_penilaian);
			redirect('mc/detail_penilaian/' . $id);
		}
	}

	private function grading_val($val)
	{
		if (0 < $val && $val < 49.9) {
			return "Bronze";
		} elseif (50 < $val && $val < 69.9) {
			return "Silver";
		} elseif (70 < $val && $val < 89.9) {
			return "Gold";
		} else {
			return "Platinum";
		}
	}
	private function status_val($val)
	{
		if ($val < 38) {
			return "Not Complete";
		} else {
			return "Complete";
		}
	}


	public function delete($id)
	{
		$delete=$this->Mc_model->delete('mc_penilaian',array('mcp_id'=>$id),$id);
		if($delete){
			$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil Hapus Data');
			redirect('mc');
		}
	}
}
