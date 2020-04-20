<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EgliseModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'eglise';
	}


	public function add($data)
	{
		if ( ! empty($data))
		{
			$this->db->insert($this->table, $data);
			return $this->db->insert_id();
		}
	}

	public function getNameByUserId($userId){
		$this->db->select('nom');
        $this->db->from($this->table);
        $this->db->where('id_utilisateur', $userId);
        $result = $this->db->get()->result(); 
       foreach ($result as $res) {
           return $res->nom;
       }
	}
	public function getIdByUserId($userId){
		$this->db->select('id');
        $this->db->from($this->table);
        $this->db->where('id_utilisateur', $userId);
        $result = $this->db->get()->result(); 
       foreach ($result as $res) {
           return $res->id;
       }
	}

	public function getAll(){
		$this->db->select('*');
        $this->db->from($this->table);
        return $this->db->get(); 
	}
}
