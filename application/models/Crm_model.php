<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crm_model extends CI_Model
{

	public function insert($data)
	{
		$insert = $this->db->insert_batch('crm_h1_ke_h1', $data);
		if ($insert) {
			return true;
		}
	}

	public function insertcrm($data)
	{
		$insert = $this->db->insert_batch('crm', $data);
		if ($insert) {
			return true;
		}
	}

	public function insertds($data)
	{
		$insertds = $this->db->insert_batch('crm_h2_ke_h1_ds', $data);
		if ($insertds) {
			return true;
		}
	}

	public function insertdl($data)
	{
		$insertdl = $this->db->insert_batch('crm_h2_ke_h1_dl', $data);
		if ($insertdl) {
			return true;
		}
	}

	public function insertkpb1($data)
	{
		$insertkpb1 = $this->db->insert_batch('crm_kpb1', $data);
		if ($insertkpb1) {
			return true;
		}
	}

	public function insertkpb2($data)
	{
		$insertkpb2 = $this->db->insert_batch('crm_kpb2', $data);
		if ($insertkpb2) {
			return true;
		}
	}

	public function insertkpb3($data)
	{
		$insertkpb3 = $this->db->insert_batch('crm_kpb3', $data);
		if ($insertkpb3) {
			return true;
		}
	}

	public function insertkpb4($data)
	{
		$insertkpb4 = $this->db->insert_batch('crm_kpb4', $data);
		if ($insertkpb4) {
			return true;
		}
	}
	public function getData()
	{
		$this->db->select('*');
		return $this->db->get('crm')->result_array();
	}

	public function getYear()
	{
		$this->db->select('YEAR(date) as tanggal');
		$this->db->order_by('YEAR(date)');
		$this->db->group_by('YEAR(date)');
		return $this->db->get('crm')->result_array();
	}

	public function grafik_crm_by_dealer($filter)
	{
		$this->db->select('ANY_VALUE(nama_dealer) as nama_dealer, SUM(sales) as sales, CONCAT(LEFT(SUM(h1_ke_h1)*100,4)) as h1_ke_h1, CONCAT(LEFT(SUM(h2_ke_h1_dl)*100, 4)) as h2_ke_h1_dl, CONCAT(LEFT(SUM(h2_ke_h1_ds)*100,4)) as h2_ke_h1_ds, SUM(kpb1) as kpb1,SUM(kpb2) as kpb2, SUM(kpb3) as kpb3, SUM(kpb4) as kpb4');
		$this->db->from('crm');
		$this->db->join('dealer', 'kode_dealer=crm_kode_dealer', 'left');
		$this->db->where($filter);
		$this->db->group_by('crm_kode_dealer');
		return $this->db->get()->result();
	}

	public function grafik_kpb_by_dealer($filter)
	{
		$this->db->select('ANY_VALUE(nama_dealer) as nama_dealer, SUM(sales) as sales, CONCAT(LEFT(SUM(kpb1)*100,4)) as kpb1, CONCAT(LEFT(SUM(kpb2)*100,4)) as kpb2, CONCAT(LEFT(SUM(kpb3)*100,4)) as kpb3, CONCAT(LEFT(SUM(kpb4)*100,4)) as kpb4');
		$this->db->from('crm');
		$this->db->join('dealer', 'kode_dealer=crm_kode_dealer', 'left');
		$this->db->where($filter);
		$this->db->group_by('crm_kode_dealer');	
		return $this->db->get()->result();
	}

	public function grafik_crm_by_distrik($filter)
	{
		$this->db->select('nama, SUM(sales) as sales, CONCAT(LEFT(SUM(h1_ke_h1)*100,4)) as h1_ke_h1, CONCAT(LEFT(SUM(h2_ke_h1_dl)*100,4)) as h2_ke_h1_dl, CONCAT(LEFT(SUM(h2_ke_h1_ds)*100,4)) as h2_ke_h1_ds,  SUM(kpb1) as kpb1,SUM(kpb2) as kpb2, SUM(kpb3) as kpb3, SUM(kpb4) as kpb4');
		$this->db->from('crm');
		$this->db->join('dealer', 'kode_dealer=crm_kode_dealer', 'left');
		$this->db->join('distrik', 'id_distrik=dealer_id_distrik', 'left');
		$this->db->where($filter);
		$this->db->group_by('dealer_id_distrik');
		return $this->db->get()->result();
	}

	public function grafik_kpb_by_distrik($filter)
	{
		$this->db->select('nama, SUM(sales) as sales, CONCAT(LEFT(SUM(kpb1)*100,4)) as kpb1, CONCAT(LEFT(SUM(kpb2)*100,4)) as kpb2,  CONCAT(LEFT(SUM(kpb3)*100,4)) as kpb3, CONCAT(LEFT(SUM(kpb4)*100,4)) as kpb4');
		$this->db->from('crm');
		$this->db->join('dealer', 'kode_dealer=crm_kode_dealer', 'left');
		$this->db->join('distrik', 'id_distrik=dealer_id_distrik', 'left');
		$this->db->where($filter);
		$this->db->group_by('dealer_id_distrik');
		return $this->db->get()->result();
	}

	public function grafik_crm_by_month($filter)
	{
		$this->db->select('ANY_VALUE(date) as date,SUM(sales) as sales, CONCAT(SUM(h1_ke_h1)*100) as h1_ke_h1, CONCAT(SUM(h2_ke_h1_dl)*100) as h2_ke_h1_dl, CONCAT(SUM(h2_ke_h1_ds)) as h2_ke_h1_ds,  SUM(kpb1) as kpb1,SUM(kpb2) as kpb2, SUM(kpb3) as kpb3, SUM(kpb4) as kpb4');
		$this->db->from('crm');
		$this->db->join('dealer', 'kode_dealer=crm_kode_dealer', 'left');
		$this->db->where($filter);
		$this->db->group_by('MONTH(date)');
		return $this->db->get()->result();
	}
	public function grafik_kpb_by_month($filter)
	{
		$this->db->select('ANY_VALUE(date) as date,SUM(sales) as sales, SUM(kpb1) as kpb1,SUM(kpb2) as kpb2, SUM(kpb3) as kpb3, SUM(kpb4) as kpb4');
		$this->db->from('crm');
		$this->db->join('dealer', 'kode_dealer=crm_kode_dealer', 'left');
		$this->db->where($filter);
		$this->db->group_by('MONTH(date)');
		return $this->db->get()->result();
	}
}
