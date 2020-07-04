<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontEnd extends CI_Controller {

	public function index()
	{
		$data['title'] = ucfirst("Frontend index"); // Capitalize the first letter
		$this->load->view('frontend/templates/header', $data);
		$this->load->view('frontend/index');
		$this->load->view('frontend/templates/footer', $data);
	}

	public function login()
	{
		$data['title'] = ucfirst("Frontend Login"); // Capitalize the first letter
		$this->load->view('frontend/templates/header', $data);
		$this->load->view('frontend/login');
		$this->load->view('frontend/templates/footer', $data);
	}

	public function register()
	{
		$data['title'] = ucfirst("Frontend register"); // Capitalize the first letter
		$this->load->view('frontend/templates/header', $data);
		$this->load->view('frontend/register');
		$this->load->view('frontend/templates/footer', $data);
	}

	public function forgotPassword()
	{
		$data['title'] = ucfirst("Frontend forgotPassword"); // Capitalize the first letter
		$this->load->view('frontend/templates/header', $data);
		$this->load->view('frontend/forgotPassword');
		$this->load->view('frontend/templates/footer', $data);
	}

	public function updatePassword()
	{
		$data['title'] = ucfirst("Frontend updatePassword"); // Capitalize the first letter
		$this->load->view('frontend/templates/header', $data);
		$this->load->view('frontend/updatePassword');
		$this->load->view('frontend/templates/footer', $data);
	}

	public function changePassword()
	{
		$data['title'] = ucfirst("Frontend changePassword"); // Capitalize the first letter
		$this->load->view('frontend/templates/header', $data);
		$this->load->view('frontend/login');
		$this->load->view('frontend/templates/footer', $data);
	}

	public function verify()
	{
		$data['title'] = ucfirst("Frontend verify"); // Capitalize the first letter
		$this->load->view('frontend/templates/header', $data);
		$this->load->view('frontend/login');
		$this->load->view('frontend/templates/footer', $data);
	}
}
