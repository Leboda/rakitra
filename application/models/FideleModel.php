<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FideleModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'fidele';
		$this->table_transaction = 'transaction';
	}


	public function add($data)
	{
		if ( ! empty($data))
		{
			$this->db->insert($this->table, $data);
			return $this->db->insert_id();
		}
	}

	public function getAllByIdEglise($idEglise){
		$this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id_eglise', $idEglise);
        return $this->db->get(); 
	}

	public function getByOrderPaiement($oderId){
		$this->db->select('f.*');
        $this->db->from($this->table.' as f');
		$this->db->join($this->table_transaction.' as t', 'f.id = t.id_fidele');
		$this->db->where('t.ordre_paiement', $oderId);
        return $this->db->get();
	}

	public function getNameById($id){
		$this->db->select('nom');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $result = $this->db->get()->result(); 
       foreach ($result as $res) {
           return $res->nom;
       }
	}
}
