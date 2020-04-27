<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EgliseModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'eglise';
		$this->table_compte = 'compte';
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

	public function getNameByUserId($userId){
		$this->db->select('nom');
        $this->db->from($this->table);
        $this->db->where('id_utilisateur', $userId);
        $result = $this->db->get()->result(); 
       foreach ($result as $res) {
           return $res->nom;
       }
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

	public function getNameByIdCompte($idCompte){
		$this->db->select('e.nom AS NomEglise');
        $this->db->from($this->table.' as e');
        $this->db->join($this->table_compte.' as c', 'c.id_eglise = e.id');
        $this->db->join($this->table_transaction.' as t', 't.id_compte = c.id');
		$this->db->where('t.id_compte', $idCompte);
        $result = $this->db->get()->result(); 
       	foreach ($result as $res) {
           return $res->NomEglise;
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

	public function getByOrderPaiement($order){
		$this->db->select('*');
        $this->db->from($this->table.' as e');
        $this->db->join($this->table_compte.' as c', 'c.id_eglise = e.id');
        $this->db->join($this->table_transaction.' as t', 't.id_compte = c.id');
		$this->db->where('t.ordre_paiement', $order);
        return $this->db->get();       
	}
}
