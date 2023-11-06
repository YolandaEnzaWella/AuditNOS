<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_Model extends CI_Model {

	public function insert($data){
		$insert = $this->db->insert_batch('peopledev', $data);
		if($insert){
			return true;
		}
	}
}