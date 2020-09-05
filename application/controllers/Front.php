<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function login()
	{

		$data['title'] = ucfirst("Front Login"); // Capitalize the first letter
		$this->load->view('front/templates/header', $data);
		$this->load->view('front/auth/login');
		$this->load->view('front/templates/footer', $data);
	}

	public function register()
	{
		$data['title'] = ucfirst("front register"); // Capitalize the first letter
		$this->load->view('front/templates/header', $data);
		$this->load->view('front/auth/register');
		$this->load->view('front/templates/footer', $data);
	}

	public function forgotPassword()
	{
		$data['title'] = ucfirst("front forgotPassword"); // Capitalize the first letter
		$this->load->view('front/templates/header', $data);
		$this->load->view('front/auth/forgotPassword');
		$this->load->view('front/templates/footer', $data);
	}

	public function updatePassword()
	{
		$data['title'] = ucfirst("Frontend updatePassword"); // Capitalize the first letter
		$this->load->view('front/templates/header', $data);
		$this->load->view('front/auth/updatePassword');
		$this->load->view('front/templates/footer', $data);
	}

	public function changePassword()
	{
		$data['title'] = ucfirst("front changePassword"); // Capitalize the first letter
		$this->load->view('front/templates/header', $data);
		$this->load->view('front/auth/login');
		$this->load->view('front/templates/footer', $data);
	}

	public function verify()
	{
		$data['title'] = ucfirst("front verify"); // Capitalize the first letter
		$this->load->view('front/templates/header', $data);
		$this->load->view('front/auth/login');
		$this->load->view('front/templates/footer', $data);
	}

}
