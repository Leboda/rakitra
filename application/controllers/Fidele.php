<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fidele extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->templates = 'include/simple-utilisateur';
		$this->views     = 'fidele/';
		$this->load->model('orangeApiConfigModel');		
		$this->load->model('transactionModel');	
		$this->load->model('compteModel');	
		$this->load->model('fideleModel');	
		$this->load->model('egliseModel');	
	}

	public function index()
	{
		$this->data['eglise'] = $this->egliseModel->getAll()->result();
		$this->template->set('title','Tongasoa');
		$this->template->load($this->templates,$this->views.'dashbord',$this->data);
	}
	
	public function addRakitra(){
		if (isset($_POST)) {
			$dataPersonneFidele = array(
				'nom'               => $_POST['nom'],
				'tel'               => $_POST['tel'],
				'mail'              => $_POST['mail'],
				'id_eglise'         => $_POST['egliseChoice'],
				'adresse'           => $_POST['adresse']
			);
			$idFidele = $this->fideleModel->add($dataPersonneFidele);
			$apiInfo = $this->orangeApiConfigModel->getApiTokenSecond($_POST['vola'],$this->orangeApiConfigModel->getTokenApi(),$this->orangeApiConfigModel->getMarchantKeyApi());

			//var_dump($apiInfo);
			//die();
			
			if ($apiInfo['message'] == 'OK') {		
				$dataTransaction = array(
					'id_fidele'          => $idFidele,
					'id_compte'          => $this->compteModel->getIdCompteByIdEglise($_POST['egliseChoice']),
					'montant'            => $_POST['vola'],
					'date'               => time(),
					'status'             => 'INITIATED',
					'ordre_paiement'     => $apiInfo['orderId'],
					'token_paiement'     => $apiInfo['pay_token'],
					'notif_token'        => NULL,
					'txnid'              => NULL
				);
				$this->transactionModel->add($dataTransaction); 				
				redirect($apiInfo['redirecturl'],"refresh"); 					
			}
		}
	}
}
