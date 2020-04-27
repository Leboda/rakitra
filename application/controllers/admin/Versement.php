<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Versement extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->templates = 'include/admin-template';
		$this->views     = 'admin/versement/';
		$this->load->model('egliseModel');	
		$this->load->model('compteModel');	
		$this->load->model('versementModel');	

		$this->load->library(['ion_auth', 'form_validation']);
	}

	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('user-login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{			
			redirect('access-denied', 'refresh');
		}
		else{
			$this->data['versement'] = $this->versementModel->getAll()->result();
			$this->template->set('title','Administration');
			$this->template->load($this->templates,$this->views.'list',$this->data);
		}
	}

	public function add(){
		if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{			
			redirect('access-denied', 'refresh');
		}
		else{
			if (isset($_POST)) {
				$modeVersement = $_POST['choix_versement'];
				$data = array(
					'id_eglise'       => $_POST['idEglise'], 
					'montant_initial' => $_POST['amountInit'], 
					'date'            => time()
				);
				if ($modeVersement == "all") {
					$data['montant_verser'] = $_POST['amountInit'];
				}
				else{
					$data['montant_verser'] = $_POST['amount_partial'];
				}
				$this->versementModel->add($data);
				$data_amount_total = array(
					'montant_total'       => $_POST['amountInit'] - $data['montant_verser']
				);
				$this->compteModel->updateByIdEglise($data_amount_total,$_POST['idEglise']);
				redirect('admin-page', 'refresh');
			}
		}
	}

}
