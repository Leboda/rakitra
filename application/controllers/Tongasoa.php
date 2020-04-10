<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tongasoa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->templates = 'include/simple-utilisateur';
		$this->views     = 'simple-utilisateur/';
	}

	public function index()
	{
		$this->template->set('title','Tongasoa');
		$this->template->load($this->templates,$this->views.'dashbord');
	}
}
