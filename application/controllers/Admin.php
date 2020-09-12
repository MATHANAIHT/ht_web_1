<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function login()
	{
		$data['title'] = ucfirst("Admin Login"); // Capitalize the first letter
		$this->load->view('admin/auth/login', $data);
	}

	public function editUsers($id)
	{
		$data['title'] = ucfirst("User's Edit");
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/own/editUsers');
		$this->load->view('admin/templates/footer', $data);
	}

	public function listUsers()
	{
		$data['title'] = ucfirst("User's List");
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/own/usersList');
		$this->load->view('admin/templates/footer', $data);
	}

	public function users()
	{
		$data['title'] = ucfirst("User");
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/own/user');
		$this->load->view('admin/templates/footer', $data);
	}

	public function dashboard()
	{
		$data['title'] = ucfirst("Admin dashboard"); // Capitalize the first letter
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/own/dashboard');
		$this->load->view('admin/templates/footer', $data);
	}

	public function logout()
	{
		redirect(base_url('/admin/login'));
	}

	public function forgotPassword()
	{
		$data['title'] = ucfirst("Admin forgotPassword"); // Capitalize the first letter
		$this->load->view('admin/auth/forgotPassword', $data);
	}

	public function updatePassword()
	{
		$data['title'] = ucfirst("Admin updatePassword"); // Capitalize the first letter
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/auth/updatePassword');
		$this->load->view('admin/templates/footer', $data);
	}

	public function changePassword()
	{
		$data['title'] = ucfirst("Admin changePassword"); // Capitalize the first letter
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/auth/changePassword');
		$this->load->view('admin/templates/footer', $data);
	}

	//Masters
	public function motherTongue()
	{
		$data['title'] = ucfirst("Admin motherTongue"); // Capitalize the first letter
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/masters/motherTongue');
		$this->load->view('admin/templates/footer', $data);
	}

	// Location info
	public function country()
	{
		$data['title'] = ucfirst("country");
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/masters/country');
		$this->load->view('admin/templates/footer', $data);
	}

	public function state()
	{
		$data['title'] = ucfirst("state");
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/masters/state');
		$this->load->view('admin/templates/footer', $data);
	}

	public function city()
	{
		$data['title'] = ucfirst("city");
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/masters/city');
		$this->load->view('admin/templates/footer', $data);
	}

	// Religion info
	public function religion()
	{
		$data['title'] = ucfirst("Admin religion");
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/masters/religion');
		$this->load->view('admin/templates/footer', $data);
	}

	public function caste()
	{
		$data['title'] = ucfirst("Admin caste");
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/masters/caste');
		$this->load->view('admin/templates/footer', $data);
	}

	public function subCaste()
	{
		$data['title'] = ucfirst("Admin subCaste");
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/masters/subCaste');
		$this->load->view('admin/templates/footer', $data);
	}

	public function star()
	{
		$data['title'] = ucfirst("Admin star");
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/masters/star');
		$this->load->view('admin/templates/footer', $data);
	}

	public function raasi()
	{
		$data['title'] = ucfirst("Admin raasi");
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/masters/raasi');
		$this->load->view('admin/templates/footer', $data);
	}

	// Professional Info
	public function education()
	{
		$data['title'] = ucfirst("Admin education");
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/masters/education');
		$this->load->view('admin/templates/footer', $data);
	}

	public function educationCategory()
	{
		$data['title'] = ucfirst("Education Category");
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/masters/educationCategory');
		$this->load->view('admin/templates/footer', $data);
	}

	public function occupation()
	{
		$data['title'] = ucfirst("Occupation");
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/masters/occupation');
		$this->load->view('admin/templates/footer', $data);
	}

	public function occupationCategory()
	{
		$data['title'] = ucfirst("Occupation Category");
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/masters/occupationCategory');
		$this->load->view('admin/templates/footer', $data);
	}

	public function annualIncome()
	{
		$data['title'] = ucfirst("Admin annualIncome");
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/masters/annualIncome');
		$this->load->view('admin/templates/footer', $data);
	}

	public function employedIn()
	{
		$data['title'] = ucfirst("Admin employedIn");
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/masters/employedIn');
		$this->load->view('admin/templates/footer', $data);
	}

}
