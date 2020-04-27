<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eglise extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->templates = 'include/admin-template';
		$this->views     = 'admin/eglise/';
		$this->load->model('egliseModel');	
		$this->load->model('fideleModel');	
		$this->load->model('compteModel');	

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
			$this->data['eglise'] = $this->egliseModel->getAll()->result();
			$this->template->set('title','Eglise');
			$this->template->load($this->templates,$this->views.'list',$this->data);
		}
	}


}
