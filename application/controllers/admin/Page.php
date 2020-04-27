<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->templates = 'include/admin-template';
		$this->views     = 'admin/';
		$this->load->model('egliseModel');	
		$this->load->model('compteModel');	
		$this->load->model('fideleModel');	
		$this->load->model('transactionModel');	

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
			$this->template->set('title','Administration');
			$this->template->load($this->templates,$this->views.'dashbord');
		}
	}

	public function getcode(){
		if (isset($_POST)) {
			if ($_POST['code'] == "1234superAdmin") {
				echo "OK";
			}
			else{
				echo "NONOK";
			}
		}
	}

}
