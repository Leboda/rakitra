<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransactionModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'transaction';
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
}
