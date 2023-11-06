<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cs_indikator_model extends CI_Model
{

	var $table = 'cs_indikator';

	public function get_csi()
	{
		$this->db->from("cs_indikator");
		$query = $this->db->get();

		return $query->result_array();
	}	

	public function get_indikator()
	{
		$this->db->from($this->table);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pdsa1($id=null, $kode, $sub_kode, $nilai)
    {
		$this->db->from("cs_detail_penilaian");
        $this->db->join('cs_indikator', 'cs_indikator.csi_id = cs_detail_penilaian.csdp_csi_id', 'left');
		$this->db->where('csdp_nilai', $nilai);
		$this->db->where('csi_kode',$kode);
		$this->db->where_in('csi_sub_kode',implode(',',$sub_kode));
		if ($id != null) {
            $this->db->where('csdp_csp_id', $id);
        }
		$query = $this->db->get();

		return $query->num_rows();
    }
	// public function get_indikator_tahap2()
	// {
	// 	$this->db->from("mc_indikator");
	// 	$this->db->where("mci_map_id", 2);
	// 	$query = $this->db->get();

	// 	return $query->result_array();
	// }

	// public function get_indikator_tahap3()
	// {
	// 	$this->db->from("mc_indikator");
	// 	$this->db->where("mci_map_id", 3);
	// 	$query = $this->db->get();

	// 	return $query->result_array();
	// }

	// public function get_indikator_tahap4()
	// {
	// 	$this->db->from("mc_indikator");
	// 	$this->db->where("mci_map_id", 4);
	// 	$query = $this->db->get();

	// 	return $query->result_array();
	// }

	public function ambil_mci($id)
	{
		$this->db->from("mc_indikator");
		$this->db->where("mci_id", $id);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function cari_csi($id)
	{
		$this->db->from("cs_indikator");
		$this->db->where('csi_id', $id);
		$query = $this->db->get();

		return $query->row_array();
	}

	public function getlastquery()
	{
		$query = str_replace(array("\r", "\n", "\t"), '', trim($this->db->last_query()));

		return $query;
	}

	public function update($tbl, $where, $data)
	{
		$this->db->update($tbl, $data, $where);
		return $this->db->affected_rows();
	}

	public function simpan($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function delete($table, $field, $id)
	{
		$this->db->where($field, $id);
		$this->db->delete($table);

		return $this->db->affected_rows();
	}
}
