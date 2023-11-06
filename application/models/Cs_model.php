<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cs_model extends CI_Model
{

    public function grafik_dealer_cs()
    {
        $dealer_id = $this->session->userdata('login_session')['kode_dealer'];
        $this->db->select('SUM(csp_score) as score, COUNT(id_dealer) as jumlah_respon, nama_dealer');
        $this->db->from('cs_penilaian');
        $this->db->join('dealer', 'dealer.id_dealer = cs_penilaian.csp_dealer_id', 'left');
        if (is_dealer()) {
            $this->db->where('csp_dealer_id', $dealer_id);
        }
        $this->db->group_by('csp_dealer_id');
        $this->db->group_by('YEAR(created_at)');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_namacs1()
    {
        $this->db->select('distinct(tahun)');
        return $this->db->get('cs1')->result();
    }

    public function data_grafik_cs1($filterims2)
    {
        $this->db->select('issues, id_semester, result as data');
        $this->db->from('issuems');
        $this->db->where($filterims2);
        $this->db->group_by('issues, id_semester, result');
        return $this->db->get()->result();
    }

    public function get_history()
    {
        $dealer_id = $this->session->userdata('login_session')['kode_dealer'];
        $this->db->from('cs_penilaian');
        $this->db->join('dealer', 'cs_penilaian.csp_dealer_id = dealer.id_dealer', 'left');
        // $this->db->group_by('id_dealer');
        if (is_dealer()) {
            $this->db->where('csp_dealer_id', $dealer_id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_history_list($id = null)
    {
        $this->db->from('cs_detail_penilaian');
        $this->db->join('cs_penilaian', 'cs_penilaian.csp_id = cs_detail_penilaian.csdp_csp_id', 'left');
        $this->db->join('cs_indikator', 'cs_indikator.csi_id = cs_detail_penilaian.csdp_csi_id', 'left');
        if ($id != null) {
            $this->db->where('csdp_csp_id', $id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function jumlahNilai($id = null, $nilai)
    {
        $this->db->from("cs_detail_penilaian");
        $this->db->where('csdp_nilai', $nilai);
        if ($id != null) {
            $this->db->where('csdp_csp_id', $id);;
        }

        $query = $this->db->get();
        return $query->num_rows();
    }



    public function simpan($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function simpan_penilaian($table, $data)
    {
        $this->db->insert_batch($table, $data);
        return $this->db->insert_id();
    }

    public function update($tbl, $where, $data)
    {
        $this->db->update($tbl, $data, $where);
        return $this->db->affected_rows();
    }
}
