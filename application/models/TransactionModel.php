<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransactionModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table        = 'transaction';
		$this->table_fidele = 'fidele';
		$this->table_compte = 'compte';
	}


	public function add($data)
	{
		if ( ! empty($data))
		{
			$this->db->insert($this->table, $data);
			return $this->db->insert_id();
		}
	}
	public function getAmountByIdFidele($idFidele){
		$this->db->select('montant');
        $this->db->from($this->table);
        $this->db->where('id_fidele', $idFidele);
        $result = $this->db->get()->result(); 
       foreach ($result as $res) {
           return $res->montant;
       }
   }
   public function getStatusByIdFidele($idFidele){
		$this->db->select('status');
        $this->db->from($this->table);
        $this->db->where('id_fidele', $idFidele);
        $result = $this->db->get()->result(); 
       foreach ($result as $res) {
           return $res->status;
       }
   }

   public function update($data,$order){	
		$this->db->update($this->table, $data, array('ordre_paiement' => $order));
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return FALSE;
		}
		$this->db->trans_commit();
		return TRUE;
	}

	public function getByOrderPaiement($order){
		$this->db->select('*');
        $this->db->from($this->table);
        if ($order != NULL) {
        	$this->db->where('ordre_paiement', $order);
        }
    	return $this->db->get();  
	}

	public function getAmountByOrderPaiement($order){
		$this->db->select('montant');
        $this->db->from($this->table);
        $this->db->where('ordre_paiement', $order);
        $result = $this->db->get()->result(); 
       foreach ($result as $res) {
           return $res->montant;
       }
	}

	public function getIdCompteByOrderPaiement($order){
		$this->db->select('id_compte');
        $this->db->from($this->table);
        $this->db->where('ordre_paiement', $order);
        $result = $this->db->get()->result(); 
       	foreach ($result as $res) {
           return $res->id_compte;
       	}
	}

	public function getAll(){
		$this->db->select('*');
        $this->db->from($this->table);
        return $this->db->get(); 
	}

	public function getNewFidelSuccessOpersation($idEglise){
		$dateLeftTwentySec = time()-60;
		$this->db->select('f.*,t.montant,t.date');
        $this->db->from($this->table_fidele.' as f');
        $this->db->join($this->table.' as t', 't.id_fidele = f.id');
        $this->db->join($this->table_compte.' as c', 'c.id = t.id_compte');
		$this->db->where('c.id_eglise', $idEglise);
		$this->db->where('t.status', "SUCCESS");
		$this->db->where('t.date >=', $dateLeftTwentySec);
        return $this->db->get();        	
	}
}
