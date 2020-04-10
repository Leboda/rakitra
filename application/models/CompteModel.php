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
	public function getIdEgliseByIdCompte($idCompte){
		$this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id_compte', $idCompte);
        $result =  $this->db->get()->result();
        foreach ($result as $res) {
    		return $res->id_eglise;
    	} 
	}
}
