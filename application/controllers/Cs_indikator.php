<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cs_indikator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->model('Cs_indikator_model', 'csi');
        $this->load->library('form_validation');
        $this->load->library(array('excel', 'session'));
    }

    public function index()
    {
        $data =
            [
                'title' => "Mistery Calling",
                'cs_indikator' => $this->csi->get_csi(),
            ];
        $this->template->load('templates/dashboard', 'cs_indikator/index', $data);
    }

    private function _validasi($mode)
    {
        $this->form_validation->set_rules('csi_kode', 'Kode Indikator', 'required|trim');
        $this->form_validation->set_rules('csi_posisi', 'Area Penilaian', 'required');
        $this->form_validation->set_rules('csi_place', 'Lokasi Penilaian', 'required');
        $this->form_validation->set_rules('csi_indikator', 'Lokasi Penilaian', 'required');

        if ($mode == 'add') {
            // $this->form_validation->set_rules('csi_kode', 'Kode Indikator', 'required|trim|is_unique[cs_indikator.csi_kode]');
            $this->form_validation->set_rules('csi_kode', 'Kode Indikator', 'required|trim');
            $this->form_validation->set_rules('csi_posisi', 'Area Penilaian', 'required');
            $this->form_validation->set_rules('csi_place', 'Lokasi Penilaian', 'required');
            $this->form_validation->set_rules('csi_indikator', 'Indikator Penilaian', 'required');
        } else {
            $db = $this->csi->cari_csi($this->input->post('csi_id', true));
            $kode = $this->input->post('csi_kode', true);
            $posisi = $this->input->post('csi_posisi', true);
            $place = $this->input->post('csi_place', true);
            $indikator = $this->input->post('csi_indikator', true);
        }
    }

    public function add()
    {
        $this->_validasi('add');

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => "Tambah Indikator Penilaian",
                'csi_sub_kode'    => array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"),
                'csi_posisi' => array(1 => 'SALES COUNTER', 2 => 'KASIR', 3 => 'AHASS'),
                'csi_place' => array(1 => 'DEALER', 2 => 'BENGKEL', 3 => 'ALL')
            ];
            $this->template->load('templates/dashboard', 'cs_indikator/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'csi_kode'          => $input['csi_kode'],
                'csi_sub_kode'      => $input['csi_sub_kode'],
                'csi_posisi'          => $input['csi_posisi'],
                'csi_place'          => $input['csi_place'],
                'csi_indikator'      => $input['csi_indikator'],
            ];

            if ($this->csi->simpan('cs_indikator', $input_data)) {
                set_pesan('data berhasil disimpan.');
                redirect('cs_indikator');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('cs_indikator/add');
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
                    'title' => "Edit Indikator Penilaian",
                    'csi_sub_kode'    => array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"),
                    'csi' => $this->csi->cari_csi($id),
                    'csi_posisi' => array(1 => 'SALES COUNTER', 2 => 'KASIR', 3 => 'AHASS'),
                    'csi_place' => array(1 => 'DEALER', 2 => 'BENGKEL', 3 => 'ALL')
                ];
            $this->template->load('templates/dashboard', 'cs_indikator/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'csi_kode'          => $input['csi_kode'],
                'csi_sub_kode'      => $input['csi_sub_kode'],
                'csi_posisi'          => $input['csi_posisi'],
                'csi_place'          => $input['csi_place'],
                'csi_indikator'      => $input['csi_indikator'],
            ];

            if ($this->csi->update('cs_indikator',  array('csi_id' => $id), $input_data)) {
                set_pesan('data berhasil diubah.');
                redirect('cs_indikator');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('cs_indikator/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->csi->delete('cs_indikator', array('csi_id'=>$id), $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('cs_indikator');
    }
}
