<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrangeApiConfigModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'api';
	}

	public function add($data){
		if ( ! empty($data)){	
			$this->db->insert($this->table, $data);
			return $this->db->insert_id();
		}
	}

	public function getApi($idCompte){
		$this->db->select('*');
        $this->db->from($this->table);
        if ($idComposant != NULL) {
        	$this->db->where('idCompte', $idCompte);
        }
    	return $this->db->get();     
	}
	public function getAllApi(){
		$this->db->select('*');
        $this->db->from($this->table);
    	return $this->db->get()->result();     
	}
	public function getTokenApi(){
		$this->db->select('*');
        $this->db->from($this->table);
        $result =  $this->db->get()->result();
        foreach ($result as $res) {
    		return $res->basic_token;
    	}      
	}

	public function getMarchantKeyApi(){
		$this->db->select('*');
        $this->db->from($this->table);
        $result =  $this->db->get()->result();
        foreach ($result as $res) {
    		return $res->marchant_key;
    	}      
	}

	public function update($data,$id){
		$this->db->update($this->table, $data, array('id' => $id));

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return FALSE;
		}
		$this->db->trans_commit();
		return TRUE;
	}
	public function getApiTokenFirst($token){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, URL_API_ORANGE_TOKEN);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

		$headers = array();
		$headers[] = 'Authorization: Basic '.$token.'';
		$headers[] = 'Content-Type: application/x-www-form-urlencoded';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		else { 
	    }
	    $json = json_decode($result);
		curl_close($ch);
		return $json->access_token;
	}


	public function getApiTokenSecond($amount,$token,$marchant_key){
		$orderId = "RAKITRA_LAH_".time().'MG';
		$datanew =
	    [
	      "merchant_key"   => $marchant_key,
	      "currency" => "MGA",
	      "order_id" => $orderId,
	      "amount" => $amount,
	      "return_url" => HTT_MAIN."returnstatus-rakitra?order=".$orderId,
	      "cancel_url" => HTT_MAIN."cancel-rakitra?order=".$orderId,
	      "notif_url" => HTT_MAIN."setstatus-rakitra?order=".$orderId,
	      "lang" => "fr",
	      "reference" => "ref uf",
	    ];
		$someJSON = json_encode($datanew);

		$ch1 = curl_init();
		curl_setopt($ch1, CURLOPT_URL, URL_API_ORANGE_LOADING_PAIEMENT);
		curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch1, CURLOPT_POST, 1);
		curl_setopt($ch1, CURLOPT_POSTFIELDS, $someJSON);

		$headers1 = array();
		$headers1[] = 'Authorization: Bearer '.$this->getApiTokenFirst($token).'';
		$headers1[] = 'Accept: application/json';
		$headers1[] = 'Content-Type: application/json';
		curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers1);

		$result1 = curl_exec($ch1);
		if (curl_errno($ch1)) {
		    echo 'Errora:' . curl_error($ch1);
		}
		else { 
	    }
		curl_close($ch1);
		$json = json_decode($result1);
		if (isset($json->payment_url) && $json->payment_url != "") {			
			$data = array(
				'orderId'     => $orderId,
				'redirecturl' => $json->payment_url,
				'notif_token' => $json->notif_token,
				'pay_token'   => $json->pay_token,
				'status'      => $json->status,
				'message'     => $json->message,
			);
		}
		else{
			$data['message'] = "ERROR";
		}

		return $data;
	}
	
}
