<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompteModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'compte';
	}


	public function add($data)
	{
		if ( ! empty($data))
		{
			$this->db->insert($this->table, $data);
			return $this->db->insert_id();
		}
	}
	public function getIdCompteByIdEglise($idEglise){
		$this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id_eglise', $idEglise);
        $result =  $this->db->get();
        if ($result->num_rows() >= 1) {        	
	        foreach ($result->result() as $res) {
	    		return $res->id;
	    	} 
    	} 
	}

	public function getAllByIdEglise($idEglise){
		$this->db->select('montant_total');
        $this->db->from($this->table);
        $this->db->where('id_eglise', $idEglise);
        $result =  $this->db->get();
        if ($result->num_rows() >= 1) {        	
	        foreach ($result->result() as $res) {
	    		return $res->montant_total;
	    	} 
        }
	}
}
