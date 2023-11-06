<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mc_model extends CI_Model
{

    public function get_history()
    {
        $dealer_id = $this->session->userdata('login_session')['kode_dealer'];
        $this->db->from('mc_penilaian');
        $this->db->join('dealer', 'mc_penilaian.mcp_dealer_id = dealer.id_dealer', 'left');
        if (is_dealer()) {
            $this->db->where('mcp_dealer_id', $dealer_id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_history_list($id = null)
    {
        $this->db->from('mc_detail_penilaian');
        $this->db->join('mc_penilaian', 'mc_penilaian.mcp_id = mc_detail_penilaian.mcdp_mcp_id', 'left');
        $this->db->join('mc_indikator', 'mc_indikator.mci_id = mc_detail_penilaian.mcdp_mci_id', 'left');
        if ($id != null) {
            $this->db->where('mcdp_mcp_id', $id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function jumlahDealerOperation()
    {
        $this->db->from("mc_indikator");
        $this->db->where('mci_penilaian', 1);

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countDealer()
    {
        $this->db->from('dealer');
        // $query=$this->db->get();

        return $this->db->count_all_results();
    }

    public function jumlahHospitality()
    {
        $this->db->from("mc_indikator");
        $this->db->where('mci_penilaian', 2);

        $query = $this->db->get();
        return $query->num_rows();
    }
    public function jumlahProdukKnowledge()
    {
        $this->db->from("mc_indikator");
        $this->db->where('mci_penilaian', 3);

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function jumlahNilai($id = null, $nilai)
    {
        $this->db->from("mc_detail_penilaian");
        $this->db->where('mcdp_nilai', $nilai);
        if ($id != null) {
            $this->db->where('mcdp_mcp_id', $id);;
        }

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function jumlahNilaiPerPenilaian($id = null, $nilai, $penilaian)
    {
        $this->db->from("mc_detail_penilaian");
        $this->db->join('mc_indikator', 'mc_indikator.mci_id = mc_detail_penilaian.mcdp_mci_id', 'left');

        $this->db->where('mcdp_nilai', $nilai);
        if ($id != null) {
            $this->db->where('mcdp_mcp_id', $id);
        }
        $this->db->where('mci_penilaian', $penilaian);

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function jumlahNilaiPerIndikator($filter)
    {
        $role = $this->session->userdata('role');
        $dealer_id = $this->session->userdata('login_session')['kode_dealer'];
        $this->db->select('SUM(mcdp_nilai) as ya,mci_atribut, mci_penilaian');
        $this->db->from('mc_detail_penilaian');
        $this->db->join('mc_penilaian', 'mc_penilaian.mcp_id = mc_detail_penilaian.mcdp_mcp_id', 'left');
        $this->db->join('mc_indikator', 'mc_indikator.mci_id = mc_detail_penilaian.mcdp_mci_id', 'left');
        if (is_dealer()) {
            $this->db->where('mcp_dealer_id', $dealer_id);
        }
        $this->db->where($filter);
        // $this->db->where('mcdp_nilai', 1);

        $this->db->group_by('mcdp_mci_id');
        return $this->db->get()->result();
    }

    public function jumlahSellingSkill()
    {
        $this->db->from("mc_indikator");
        $this->db->where('mci_penilaian', 4);

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function grafik_dealer_mc()
    {
        $role = $this->session->userdata('role');
        $dealer_id = $this->session->userdata('login_session')['kode_dealer'];
        $this->db->select('mcp_score,nama_dealer');
        $this->db->from('mc_penilaian');
        $this->db->join('dealer', 'dealer.id_dealer = mc_penilaian.mcp_dealer_id', 'left');
        if (is_dealer()) {
            $this->db->where('mcp_dealer_id', $dealer_id);
        }
        // $this->db->group_by('mcp_dealer_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function simpan($table, $data)
    {
        $this->db->insert_batch($table, $data);
        return $this->db->insert_id();
    }

    public function update($tbl, $where, $data)
    {
        $this->db->update($tbl, $data, $where);
        return $this->db->affected_rows();
    }
    public function delete($table, $field, $id)
    {
        $this->db->where($field, $id);
        $this->db->delete($table);

        return $this->db->affected_rows();
    }
    public function getlastquery()
    {
        $query = str_replace(array("\r", "\n", "\t"), '', trim($this->db->last_query()));

        return $query;
    }
}
