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
		if (isset($_POST)) {
			$dataPersonne = array(
				'nom'              => $_POST['dataPersonne']['nom'],
				'tel'              => $_POST['dataPersonne']['tel'],
				'email'            => $_POST['dataPersonne']['email'],
				'adresse'          => $_POST['dataPersonne']['adresse']
			);
			$idFidele = $this->fideleModel->add($dataPersonne);

			$apiInfo = $this->orangeApiConfigModel->getApiTokenSecond($this->input->post('rakitra'),$this->orangeApiConfigModel->getTokenApi(),$this->orangeApiConfigModel->getMarchantKeyApi());
			
			if ($apiInfo['message'] == 'OK') {		
				$dataTransaction = array(
					'id_fidele'          => $idFidele,
					'id_compte'          => $this->compteModel->getIdEgliseByIdCompte($this->input->post('id_compte')),
					'montant'            => $this->input->post('rakitra'),
					'date'               => time(),
					'ordre_paiement'     => $apiInfo['ordre_paiement'],
					'status'             => 'INITIATED',
					'token_paiement'     => $apiInfo['token_paiement'],
					'notif_token'        => NULL,
					'txnid'              => NULL,
					'token_paiement'     => $idPersonne
				);
				$this->transactionModel->add($dataTransaction); 
				redirect($apiInfo['redirecturl'],"refresh"); 					
			}
		}
	}
}
