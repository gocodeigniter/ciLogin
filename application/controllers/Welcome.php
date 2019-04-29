<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if( empty( $this->session->id_user ) ) {
			redirect('login');
		}

		$this->load->view('welcome_message');
	}
}
