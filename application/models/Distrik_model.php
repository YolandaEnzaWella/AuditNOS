<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distrik_model extends CI_Model
{

	var $table = 'distrik';

	public function get_distrik()
	{
		$this->db->from("distrik");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function ambil_distrik($id)
	{
		$this->db->from("distrik");
		$this->db->where("id_distrik", $id);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function cari_distrik($id)
	{
		$this->db->from("distrik");
		$this->db->where('id_distrik', $id);
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
