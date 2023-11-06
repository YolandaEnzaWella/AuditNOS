<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ms_model extends CI_Model {
	// ms method 
	public function insert($data){
		$insert = $this->db->insert_batch('ms' , $data);
		if($insert){
			return true;
		}
	}
	public function getData(){
		$this->db->select('*');
		return $this->db->get('ms')->result_array();
	}

	public function get_nama()
    {
        $this->db->select('distinct(tahun)');
        return $this->db->get('ms')->result();
    }

    public function data_grafik_ms($filtertahun)
    {
        $this->db->select('nama_dealer, semester, value as data, target as data1');
        $this->db->from('ms');
        $this->db->where($filtertahun);
        $this->db->group_by('nama_dealer, semester, value');
        return $this->db->get()->result();
    }

    // issues method

    public function insert_ims($data){
		$insert_ims = $this->db->insert_batch('issuems' , $data);
		if($insert_ims){
			return true;
		}
	}
	public function getData_ims(){
		$this->db->select('*');
		return $this->db->get('issuems')->result_array();
	}

	// public function get_namaims()
 //    {
 //        $this->db->select('distinct(tahun)');
 //        return $this->db->get('issuems')->result();
 //    }

    public function get_namaims2()
    {
        $this->db->select('distinct(id_semester)');
        return $this->db->get('issuems')->result();
    }

    public function data_grafik_ims($filterims2)
    { 
        $this->db->select('issues, h1premisses, result');
        $this->db->from('issuems');
        $this->db->where($filterims2);
        $this->db->group_by('issues,h1premisses');
        return $this->db->get()->result();
    }
}