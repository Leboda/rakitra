<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tongasoa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->templates = 'include/simple-utilisateur';
		$this->views     = 'simple-utilisateur/';
		$this->load->model('orangeApiConfigModel');		
		$this->load->model('transactionModel');	
		$this->load->model('compteModel');	
		$this->load->model('fideleModel');	
	}

	public function index()
	{
		$this->template->set('title','Tongasoa');
		$this->template->load($this->templates,$this->views.'dashbord');
	}
	
	public function addRakitra(){
		//var_dump($_POST);die;
		if (isset($_POST)) {
			$dataPersonne = array(
				'nom'              => $_POST['nom'],
				'tel'              => $_POST['tel'],
				'mail'            => $_POST['mail'],
				'adresse'          => $_POST['adresse']
			);
			$idFidele = $this->fideleModel->add($dataPersonne);

			$apiInfo = $this->orangeApiConfigModel->getApiTokenSecond($_POST['vola'],$this->orangeApiConfigModel->getTokenApi(),$this->orangeApiConfigModel->getMarchantKeyApi());
			
			if ($apiInfo['message'] == 'OK') {		
				$dataTransaction = array(
					'id_fidele'          => $idFidele,
					'id_compte'          => $this->compteModel->getIdCompteByIdEglise($_POST['eglise']),
					'montant'            => $_POST['vola'],
					'date'               => time(),
					'ordre_paiement'     => $apiInfo['orderId'],
					'status'             => 'INITIATED',
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
