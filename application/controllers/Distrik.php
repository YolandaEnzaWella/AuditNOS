<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distrik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Dealer_model', 'dealer');
        $this->load->model('Distrik_model', 'distrik');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Distrik";
        $data['distrik'] = $this->distrik->get_distrik();
        $this->template->load('templates/dashboard', 'distrik/data', $data);
    }

    private function _validasi()
    {
        // $this->form_validation->set_rules('id_distrik', 'ID Distrik', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Distrik', 'required|trim');
        
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Distrik";
            $data['distrik'] = $this->distrik->get_distrik();
            $this->template->load('templates/dashboard', 'distrik/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $save = $this->distrik->simpan('distrik', $input);
            if ($save) {
                set_pesan('data berhasil disimpan.');
                redirect('distrik');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('distrik/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Distrik";
            // $data['distrik'] = $this->distrik->get_distrik();
            $data['distrik'] = $this->distrik->cari_distrik($id);
            $this->template->load('templates/dashboard', 'distrik/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->dealer->update('distrik', array('id_distrik' => $id), $input);

            if ($update) {
                set_pesan('data berhasil diedit.');
                redirect('distrik');
            } else {
                set_pesan('data gagal diedit.');
                redirect('distrik/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->dealer->delete('distrik', array('id_distrik' => $id), $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('distrik');
    }
}
