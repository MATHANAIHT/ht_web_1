<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function login()
	{
		$data['title'] = ucfirst("API Login"); // Capitalize the first letter
		$this->load->view('api_message');
	}
}
