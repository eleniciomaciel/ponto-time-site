<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function recuperar_password()
	{
		$this->load->view('recuperar_senha');
	}

	public function admin_c8()
	{
		$this->load->view('admin-c8/panel_admin_geral');
	}

}
