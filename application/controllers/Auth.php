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
		if( $this->session->id_user ) {
			redirect('welcome');
		}

		$data['title'] = 'Login';

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/login', $data);
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $this->auth_model->findByUsername($username);

			if( isset( $user ) ) {
				if( password_verify($password, $user['password']) ) {
					$this->session->set_userdata('id_user', $user['id_user']);
					$this->session->set_userdata('name', $user['name']);
					$this->session->set_userdata('username', $user['username']);

					redirect('welcome');
				} else {
					$this->session->set_flashdata('msg', 'Wrong Password!');

					redirect('login');
				}
			} else {
				$this->session->set_flashdata('msg', 'Wrong Username!');

				redirect('login');
			}
		}
	}

	public function register()
	{
		if( $this->session->id_user ) {
			redirect('welcome');
		}
		
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
		session_destroy();

		redirect('login');
	}

}
