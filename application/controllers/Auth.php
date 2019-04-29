<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(
			array('auth_model')
		);
	}

	public function login()
	{
		$data['title'] = 'Login';

		$this->load->view('auth/login', $data);
	}

	public function register()
	{
		$data['title'] = 'Register';

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confpassword', 'Password Confirmation', 'required|matches[password]');

		if( $this->auth_model->countData() > 0 ) {
			$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');
		}

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/register', $data);
    } else {
			$this->auth_model->store();

			$this->session->set_flashdata('msg', 'Register Successfully! Please Login!');
			redirect('login');
		}
	}

	public function logout()
	{
		redirect('login');
	}

}
