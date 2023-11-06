<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peopledev_Model extends CI_Model {

	public function insert($data){
		$insert = $this->db->insert_batch('peopledev', $data);
		if($insert){
			return true;
		}
	}
	public function getData(){
		$this->db->select('*');
		return $this->db->get('peopledev')->result_array();
	}

    public function getDataByDealer($kode_dealer){
        $this->db->select('*');
        $this->db->where('kode_dealer'.'=',$kode_dealer);
        return $this->db->get('peopledev')->result_array();
    }
    public function getDataTrainedByDealer($kode_dealer){

        $select = array(
            'count(*) as total'
        );
        $this->db->select($select);
        $this->db->where('status_training' . '=', 'Trained');
        $this->db->where('kode_dealer'.'=',$kode_dealer);
        return $this->db->get('peopledev')->row();
    }
    public function getDataUntrainedByDealer($kode_dealer){

        $select = array(
            'count(*) as total'
        );
        $this->db->select($select);
        $this->db->where('status_training' . '=', 'Untrained');
        $this->db->where('kode_dealer'.'=',$kode_dealer);
        return $this->db->get('peopledev')->row();
    }
	public function getTotalTrained(){

		$select = array(
			'count(*) as total'
		);
		$this->db->select($select);
		$this->db->where('status_training' . '=', 'Trained');
		return $this->db->get('peopledev')->row();
	}
	public function getTotalUntrained(){

		$select = array(
			'count(*) as total'
		);
		$this->db->select($select);
		$this->db->where('status_training' . '=', 'Untrained');
		return $this->db->get('peopledev')->row();
	}
	public function getTotalUntrainedByDistrik($distrik){

		$select = array(
			'count(*) as total'
		);
		$this->db->select($select);
		$this->db->where('status_training' . '=', 'Untrained');
		$this->db->where('distrik' . ' like', $distrik);
		return $this->db->get('peopledev')->row();
	}
	public function getTotalTrainedByDistrik($distrik){

		$select = array(
			'count(*) as total'
		);
		$this->db->select($select);
		$this->db->where('status_training' . '=', 'Trained');
		$this->db->where('distrik' . ' like', $distrik);
		return $this->db->get('peopledev')->row();
	}
	public function getTotalTrainedByDealer($nama_dealer){

		$select = array(
			'count(*) as total'
		);
		$this->db->select($select);
		$this->db->where('status_training' . '=', 'Trained');
		$this->db->where('nama_dealer' . ' like', $nama_dealer);
		return $this->db->get('peopledev')->row();
	}
	public function getTotalUntrainedByDealer($nama_dealer){

		$select = array(
			'count(*) as total'
		);
		$this->db->select($select);
		$this->db->where('status_training' . '=', 'Trained');
		$this->db->where('nama_dealer' . ' like', $nama_dealer);
		return $this->db->get('peopledev')->row();
	}
	
	public function get_nama()
    {
        $this->db->select('distinct(distrik)');
        return $this->db->get('peopledev')->result();
    }
    public function get_namadealer()
    {
        $this->db->select('distinct(nama_dealer)');
        return $this->db->get('peopledev')->result();
    }

    public function get_jabatan()
    {
        $this->db->select('distinct(wajib_training)');
        return $this->db->get('peopledev')->result();
    }
    public function data_grafik($filter)
    {
        $this->db->select('count(*) as data, status_training, wajib_training');
        $this->db->from('peopledev');
        $this->db->where($filter);
        $this->db->group_by('status_training, wajib_training');
        return $this->db->get()->result();
    }

    // public function data_grafik($filter)
    // {
    //     $query = $this->db->select("count(*) as data, status_training, wajib_training from peopledev where distrik = '$filter' GROUP BY status_training, wajib_training");
    //     $persen = $query->num_rows();
    //     $result = $this->db->get()->result();
    //     return $persen;
    // }

    public function data_grafik_dealer($filterdealer)
    {
        $this->db->select('count(*) as data, status_training, wajib_training');
        $this->db->from('peopledev');
        $this->db->where($filterdealer);
        $this->db->group_by('status_training, wajib_training');
        return $this->db->get()->result();
    }

    public function data_grafik_jabatan($filterjabatan)
    {
        $this->db->select('count(*) as data, status_training, jabatan');
        $this->db->from('peopledev');
        $this->db->where($filterjabatan);
        $this->db->group_by('status_training, jabatan');
        return $this->db->get()->result();
    }

    public function get_kategori()
    {
        $this->db->select('distinct(status_training)');
        return $this->db->get('peopledev')->result();
    }

    public function data_grafik_stack($status_training)
    {
        $this->db->select("'$status_training' as status_training, 
        	(SELECT count('*') from peopledev where distrik = 'bengkalis' and status_training ='$status_training') as data_bengkalis, 
        	(SELECT count('*') from peopledev where distrik = 'kampar' and status_training ='$status_training') as data_kampar, 
        	(SELECT count('*') from peopledev where distrik = 'inhil' and status_training ='$status_training') as data_inhil, 
        	(SELECT count('*') from peopledev where distrik = 'inhu' and status_training ='$status_training') as data_inhu, 
        	(SELECT count('*') from peopledev where distrik = 'kuansing' and status_training ='$status_training') as data_kuansing,
        	(SELECT count('*') from peopledev where distrik = 'pekanbaru' and status_training ='$status_training') as data_pekanbaru,
        	(SELECT count('*') from peopledev where distrik = 'rohil' and status_training ='$status_training') as data_rohil,
        	(SELECT count('*') from peopledev where distrik = 'rohul' and status_training ='$status_training') as data_rohul,
        	(SELECT count('*') from peopledev where distrik = 'siak' and status_training ='$status_training') as data_siak,
        	(SELECT count('*') from peopledev where status_training ='$status_training') as total");
        $this->db->from('peopledev');
        $this->db->limit(1);
        return $this->db->get()->result();
    }


}