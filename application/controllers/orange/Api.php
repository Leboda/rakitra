<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		
		parent::__construct();
		$this->templates = 'include/api-template';
		$this->views     = 'api/';		
		$this->load->model('transactionModel');			
		$this->load->model('fideleModel');	
		$this->load->model('compteModel');	
		$this->load->model('egliseModel');
	}

	public function index() {

	}

	public function cancel(){
		redirect('/',"refresh");
	}

	public function status(){
		$this->setStatusShopping();
	}

	public function setstatus(){
		$data = json_decode(file_get_contents('php://input'), true);
		$this->addLog('date : '.date('y-m-d'));
		$this->addLog('status : '.$data['status']);
		$this->addLog('notif_token : '.$data['notif_token']);
		$this->addLog('txnid : '.$data['txnid']);
		$this->addLog('order : '.$_GET['order']);
		$data_update = array(
			'status'      => $data['status'],
			'notif_token' => $data['notif_token'],
			'txnid'       => $data['txnid']
		);
		$data_compte = array(
			'montant_total'      => $this->transactionModel->getAmountByOrderPaiement($_GET['order']) + $this->compteModel->getAmountByIdCompte($this->transactionModel->getIdCompteByOrderPaiement($_GET['order']))
		);

		$this->transactionModel->update($data_update,$_GET['order']);
		if ($data['status'] == "SUCCESS") {			
			$this->compteModel->update($data_compte,$this->transactionModel->getIdCompteByOrderPaiement($_GET['order']));
		}
	}

	public function returnstatus(){		
		if (isset($_GET)) {
			$this->data = array(
				'title' => "Rakitra - Retour",
				'orderId' => $_GET['order']
			);
			$this->data['paiementInfo']   = $this->transactionModel->getByOrderPaiement($_GET['order'])->result();
			$this->data['fideleInfo'] = $this->fideleModel->getByOrderPaiement($_GET['order'])->result();		
			$this->data['egliseInfo']     = $this->egliseModel->getByOrderPaiement($_GET['order'])->result();		
		}
		$this->template->load($this->templates,$this->views.'status',$this->data);
	}
	public function addLog($txt) {
	    if (!file_exists("log.txt")) file_put_contents("log.txt", "");
	    file_put_contents("log.txt",date("[j/m/y H:i:s]")." - $txt \r\n".file_get_contents("log.txt"));
	}
}
