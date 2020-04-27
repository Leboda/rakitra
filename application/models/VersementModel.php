<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VersementModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'versement';
	}


	public function add($data)
	{
		if ( ! empty($data))
		{
			$this->db->insert($this->table, $data);
			return $this->db->insert_id();
		}
	}

	public function getAll(){
		$this->db->select('*');
        $this->db->from($this->table);
        return $this->db->get(); 
	}

}
