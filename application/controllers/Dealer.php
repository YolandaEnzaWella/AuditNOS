<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dealer extends CI_Controller
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
        $data['title'] = "Dealer";
        $data['dealer'] = $this->dealer->get_dealer();
        $this->template->load('templates/dashboard', 'dealer/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('kode_dealer', 'Kode Dealer', 'required|trim');
        $this->form_validation->set_rules('nama_dealer', 'Nama Dealer', 'required|trim');
        $this->form_validation->set_rules('dealer_id_distrik', 'Kode Distrik', 'required|trim|numeric');
        $this->form_validation->set_rules('jenis_dealer', 'Jenis Dealer', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Dealer";
            $data['distrik'] = $this->distrik->get_distrik();
            $this->template->load('templates/dashboard', 'dealer/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $save = $this->dealer->simpan('dealer', $input);
            if ($save) {
                set_pesan('data berhasil disimpan.');
                redirect('dealer');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('dealer/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Dealer";
            $data['distrik'] = $this->distrik->get_distrik();
            $data['dealer'] = $this->dealer->cari_dealer($id);
            $this->template->load('templates/dashboard', 'dealer/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->dealer->update('dealer', array('id_dealer' => $id), $input);

            if ($update) {
                set_pesan('data berhasil diedit.');
                redirect('dealer');
            } else {
                set_pesan('data gagal diedit.');
                redirect('dealer/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->dealer->delete('dealer', array('id_dealer' => $id), $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('dealer');
    }
}
