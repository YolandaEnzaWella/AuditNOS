<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mc_indikator_model extends CI_Model
{

	var $table = 'mc_indikator';

	public function get_mci()
	{
		$this->db->from("mc_indikator");
		$query = $this->db->order_by('mci_penilaian')->get();

		return $query->result_array();
	}

	public function get_area_penilaian()
	{
		$this->db->from("mc_area_penilaian");
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_indikator_tahap1()
	{
		$this->db->from("mc_indikator");
		$this->db->where("mci_map_id", 1);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_indikator_tahap2()
	{
		$this->db->from("mc_indikator");
		$this->db->where("mci_map_id", 2);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_indikator_tahap3()
	{
		$this->db->from("mc_indikator");
		$this->db->where("mci_map_id", 3);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_indikator_tahap4()
	{
		$this->db->from("mc_indikator");
		$this->db->where("mci_map_id", 4);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function ambil_mci($id)
	{
		$this->db->from("mc_indikator");
		$this->db->where("mci_id", $id);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function cari_mci($id)
	{
		$this->db->from("mc_indikator");
		$this->db->where('mci_id', $id);
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
