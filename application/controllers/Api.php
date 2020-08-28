<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('api_model');
	}

	public function delete(){
		header('Content-Type: application/json');
		$id = $this->input->get('id');
		$tbl = $this->input->get('tbl');
		$responseMessage = "error";
		if($this->api_model->delete_from_table($id, $tbl)){
			$responseMessage = "success";
		}
		$array = array(
			'responseMessage' => $responseMessage
		);
		echo json_encode($array);
	}

	public function country() {
		header('Content-Type: application/json');
		$dataId = $this->input->get('dataId');
		$row = $this->api_model->getCountry($dataId);
		echo json_encode($row);
	}

	public function saveCountry() {
		header('Content-Type: application/json');
		$action = $this->input->post('action');
		$editId = $this->input->post('editId');
		$countryName = $this->input->post('countryName');
		$shortName = $this->input->post('shortName');
		$dialingCode = $this->input->post('dialingCode');
		$responseMessage = $this->api_model->saveCountry($action, $editId, $countryName, $shortName, $dialingCode);
		$array = array(
			'responseMessage' => $responseMessage
		);
		echo json_encode($array);
	}


	public function login()
	{
		$password = $this->input->get('password');
		$email = $this->input->get('email');

		$query = $this->db->query('SELECT * FROM tbl_city') ;
		$row = $query->result();
		header('Content-Type: application/json');
		echo json_encode( $row );
	}
	public function adminUser()
	{
		header('Content-Type: application/json');
		$query = $this->db->query('SELECT * FROM tbl_admin_user') ;
		$row = $query->result();
		echo json_encode( $row );
	}
	public function userType()
	{
		header('Content-Type: application/json');
		$query = $this->db->query('SELECT * FROM tbl_user_type') ;
		$row = $query->result();
		echo json_encode( $row );
	}
	public function motherTongue()
	{
		header('Content-Type: application/json');
		$query = $this->db->query('SELECT * FROM tbl_mother_tongue') ;
		$row = $query->result();
		echo json_encode( $row );
	}
	public function state()
	{
		header('Content-Type: application/json');

		$country = $this->input->get('country');
		if($country != ""){
			$queryStr = "SELECT ts.state_id as id, ts.state_name as name, ts.country_id FROM tbl_state ts where ts.country_id =".$country."; ";
			$query = $this->db->query($queryStr) ;
			$row = $query->result();
			echo json_encode( $row );
		} else {
			echo json_encode( "[]" );
		}
	}
	public function city()
	{
		header('Content-Type: application/json');
		$country = $this->input->get('country');
		$state = $this->input->get('state');
		if($country != "" && $state != "") {
			$query = $this->db->query("SELECT * FROM tbl_city where country_id='".$country."' and state_id='".$state."'; ") ;
			$row = $query->result();
			echo json_encode( $row );
		} else {
			echo json_encode( "[]" );
		}

	}
	public function religion()
	{
		header('Content-Type: application/json');
		$query = $this->db->query('SELECT religion_id as rid, religion_name as rname FROM tbl_religion') ;
		$row = $query->result();
		echo json_encode( $row );
	}
	public function caste()
	{
		header('Content-Type: application/json');
		$religion = $this->input->get('religion');
		if($religion != ""){
			$query = $this->db->query("SELECT caste_id as id, caste_name as cname FROM tbl_caste where religion_id='".$religion."'") ;
			$row = $query->result();
			echo json_encode( $row );
		} else {
			echo json_encode( "[]" );
		}
	}
	public function subCaste()
	{
		header('Content-Type: application/json');
		$religion = $this->input->get('religion');
		$caste = $this->input->get('caste');
		if($religion != "" && $caste != ""){
			$query = $this->db->query("SELECT sub_caste_id as scid, sub_caste_name as scname FROM tbl_sub_caste where caste_id='".$caste."'; ") ;
			$row = $query->result();
			echo json_encode( $row );
		} else {
			echo json_encode( "[]" );
		}
	}
	public function raasi()
	{
		header('Content-Type: application/json');
		$query = $this->db->query('SELECT raasi_name as rname, raasi_id as id FROM tbl_raasi') ;
		$row = $query->result();
		echo json_encode( $row );
	}
	public function star()
	{
		header('Content-Type: application/json');

		$raasi = $this->input->get('raasi');
		if($raasi != ""){
			$query = $this->db->query('SELECT star_name as sname, star_id as id FROM tbl_star ') ;
			$row = $query->result();
			echo json_encode( $row );
		} else {
			echo json_encode( "[]" );
		}
	}
	public function occupation()
	{
		header('Content-Type: application/json');
		$queryStr = "SELECT tbl_occupation.occupation_id as id, tbl_occupation.occupation_name as name, tbl_occupation_category.occupation_category_name as category_name, tbl_occupation.occupation_category_id as category_id, tbl_occupation.created_at FROM tbl_occupation INNER JOIN tbl_occupation_category ON tbl_occupation_category.occupation_category_id=tbl_occupation.occupation_category_id;";
		$query = $this->db->query($queryStr) ;
		$row = $query->result();
		echo json_encode( $row );
	}
	public function education()
	{
		header('Content-Type: application/json');
		$queryStr = "SELECT tbl_education.education_id as id, tbl_education.education_name as name, tbl_education.education_category_id  as category_id, tbl_education_category.education_category_name as category_name , tbl_education.created_at FROM tbl_education INNER JOIN tbl_education_category ON tbl_education.education_category_id=tbl_education_category.education_category_id;";
		$query = $this->db->query($queryStr);
		$row = $query->result();
		echo json_encode( $row );
	}
	public function educationCategory()
	{
		header('Content-Type: application/json');
		$queryStr = "select * from tbl_education_category;";
		$query = $this->db->query($queryStr) ;
		$row = $query->result();
		echo json_encode( $row );
	}
	public function occupationCategory()
	{
		header('Content-Type: application/json');
		$queryStr = "select * from tbl_occupation_category;";
		$query = $this->db->query($queryStr);
		$row = $query->result();
		echo json_encode( $row );
	}
	public function annualIncome()
	{
		header('Content-Type: application/json');
		$queryStr = "select * from tbl_occupation_category;";
		$query = $this->db->query($queryStr);
		$row = $query->result();
		echo json_encode( $row );
	}
	public function employedIn()
	{
		header('Content-Type: application/json');
		$queryStr = "select * from tbl_occupation_category;";
		$query = $this->db->query($queryStr);
		$row = $query->result();
		echo json_encode( $row );
	}
}
