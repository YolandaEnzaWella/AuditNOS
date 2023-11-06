<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mc_indikator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->model('Mc_indikator_model', 'mci');
        $this->load->library('form_validation');
        $this->load->library(array('excel', 'session'));
    }

    public function index()
    {
        $data =
            [
                'title' => "Mistery Calling",
                'mc_indikator' => $this->mci->get_mci(),
            ];
        $this->template->load('templates/dashboard', 'mc_indikator/index', $data);
    }

    private function _validasi($mode)
    {
        $this->form_validation->set_rules('mci_atribut', 'Atribut Penilaian', 'required|trim');
        $this->form_validation->set_rules('mci_map_id', 'Area Penilaian', 'required');
        $this->form_validation->set_rules('mci_penilaian', 'Penilaian', 'required');

        if ($mode == 'add') {
            $this->form_validation->set_rules('mci_atribut', 'Atribut Penilaian', 'required|trim');
            $this->form_validation->set_rules('mci_map_id', 'Area Penilaian', 'required');
            $this->form_validation->set_rules('mci_penilaian', 'Penilaian', 'required');
        } else {
            $db = $this->mci->cari_mci($this->input->post('mci_id', true));
            $atribut = $this->input->post('mci_atribut', true);
            $area_penilaian = $this->input->post('mci_map_id', true);
            $penilaian = $this->input->post('mci_penilaian', true);
        }
    }

    public function add()
    {
        $this->_validasi('add');

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => "Tambah Atribut Penilaian",
                'mci_map_id' => array(1 => 'INTERAKSI DI AWAL TELEPON', 2 => 'INTERAKSI SAAT MEMBICARAKAN PEMBELIAN MOTOR', 3 => 'INTERAKSI SAAT TIDAK JADI MEMBELI MOTOR', 4 => 'INTERAKSI DI AKHIR TELEPON'),
                'mci_penilaian' => array(1 => 'DEALER OPERATION', 2 => 'HOSPITALITY', 3 => 'PRODUCT KNOWLEDGE', 4 => 'SELLING SKILL')
            ];
            $this->template->load('templates/dashboard', 'mc_indikator/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'mci_atribut'          => $input['mci_atribut'],
                'mci_map_id'          => $input['mci_map_id'],
                'mci_penilaian'      => $input['mci_penilaian'],
            ];

            if ($this->mci->simpan('mc_indikator', $input_data)) {
                set_pesan('data berhasil disimpan.');
                redirect('mc_indikator');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('mc_indikator/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data =
                [
                    'title' => "Edit Atribut Penilaian",
                    'mci' => $this->mci->cari_mci($id),
                    'mci_map_id' => array(1 => 'INTERAKSI DI AWAL TELEPON', 2 => 'INTERAKSI SAAT MEMBICARAKAN PEMBELIAN MOTOR', 3 => 'INTERAKSI SAAT TIDAK JADI MEMBELI MOTOR', 4 => 'INTERAKSI DI AKHIR TELEPON'),
                    'mci_penilaian' => array(1 => 'DEALER OPERATION', 2 => 'HOSPITALITY', 3 => 'PRODUCT KNOWLEDGE', 4 => 'SELLING SKILL')
                ];
            $this->template->load('templates/dashboard', 'mc_indikator/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'mci_atribut'          => $input['mci_atribut'],
                'mci_map_id'          => $input['mci_map_id'],
                'mci_penilaian'      => $input['mci_penilaian'],
            ];

            if ($this->mci->update('mc_indikator',  array('mci_id' => $id), $input_data)) {
                set_pesan('data berhasil diubah.');
                redirect('mc_indikator');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('mc_indikator/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->mci->delete('mc_indikator', 'mci_id', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('mc_indikator');
    }
}
