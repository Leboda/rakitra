<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->templates = 'include/admin-template';
		$this->views     = 'admin/api/';
		$this->load->model('orangeApiConfigModel');	

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
			$this->data['apiInfo'] = $this->orangeApiConfigModel->getAllApi();
			$this->template->set('title','Administration');
			$this->template->load($this->templates,$this->views.'list',$this->data);
		}
	}

	public function update(){
		if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{			
			redirect('access-denied', 'refresh');
		}
		else{
			$this->form_validation->set_rules('application_id', 'Id application', 'required');
			$this->form_validation->set_rules('client_id', 'Id client', 'required');
			$this->form_validation->set_rules('client_secret', 'Client secret', 'required');
			$this->form_validation->set_rules('basic_token', 'Jeton de base', 'required');
			$this->form_validation->set_rules('marchant_key', 'Clé marchant', 'required');
			$data = array(
				'application_id' => $this->input->post('application_id'),
				'client_id'      => $this->input->post('client_id'),
				'client_secret'  => $this->input->post('client_secret'),
				'basic_token'    => $this->input->post('basic_token'),
				'marchant_key'   => $this->input->post('marchant_key'),
				'date'           => time()
			);
			if ($this->form_validation->run() === TRUE && $this->orangeApiConfigModel->update($data,$this->input->post('id_api'))){
				redirect('api-manage', 'refresh');
			}
		}
	}

}
