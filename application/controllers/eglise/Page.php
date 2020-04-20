<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->templates = 'include/eglise-template';
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

}
