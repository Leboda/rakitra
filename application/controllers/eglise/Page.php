<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->templates = 'include/eglise-template';
		$this->templates_screen = 'include/eglise-screen-template';
		$this->views     = 'eglise/';
		$this->load->model('egliseModel');	
		$this->load->model('compteModel');	
		$this->load->model('fideleModel');	
		$this->load->model('transactionModel');	
	}

	public function index()
	{
		$this->template->set('title','Accueil');
		$this->template->load($this->templates,$this->views.'dashbord');
	}

	public function money()
	{
		$this->data['amount_total'] = $this->compteModel->getAllByIdEglise($this->session->userdata('idEglise'));
		$this->template->set('title','Mes soldes');
		$this->template->load($this->templates,$this->views.'soldes',$this->data);
	}


	public function fidele()
	{
		$this->data['fidele'] = $this->fideleModel->getAllByIdEglise($this->session->userdata('idEglise'))->result();
		$this->template->set('title','Mes fidèles');
		$this->template->load($this->templates,$this->views.'fideles',$this->data);
	}

	public function screen(){
		if (isset($_GET)) {
			$this->template->set('title','Mes depôts');
			$this->data['amount_total'] = $this->compteModel->getAllByIdEglise($this->session->userdata('idEglise'));
		}
		$this->template->load($this->templates_screen,$this->views.'screen',$this->data);
	}

	public function getactionfidele(){
		$this->data['amount_total'] = $this->compteModel->getAllByIdEglise($this->session->userdata('idEglise'));
		$this->data['transactionInfo'] = $this->transactionModel->getNewFidelSuccessOpersation($this->session->userdata('idEglise'))->result();
		echo json_encode($this->data);
	}
}
