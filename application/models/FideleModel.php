<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FideleModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'fidele';
	}


	public function add($data)
	{
		if ( ! empty($data))
		{
			$this->db->insert($this->table, $data);
			return $this->db->insert_id();
		}
	}
}
