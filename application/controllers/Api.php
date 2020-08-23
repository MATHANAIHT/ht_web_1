<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function login()
	{
		$password = $this->input->get('password');
		$email = $this->input->get('email');

		$query = $this->db->query('SELECT * FROM tbl_city') ;
		$row = $query->row_array();
		header('Content-Type: application/json');
		echo json_encode( $row );
	}
	public function adminUser()
	{
		header('Content-Type: application/json');
		$query = $this->db->query('SELECT * FROM tbl_admin_user') ;
		$row = $query->row_array();
		echo json_encode( $row );
	}
	public function userType()
	{
		header('Content-Type: application/json');
		$query = $this->db->query('SELECT * FROM tbl_user_type') ;
		$row = $query->row_array();
		echo json_encode( $row );
	}
	public function motherTongue()
	{
		header('Content-Type: application/json');
		$query = $this->db->query('SELECT * FROM tbl_mother_tongue') ;
		$row = $query->row_array();
		echo json_encode( $row );
	}
	public function country()
	{
		header('Content-Type: application/json');
		$query = $this->db->query('SELECT * FROM tbl_country') ;
		$row = $query->row_array();
		echo json_encode( $row );
	}
	public function state()
	{
		header('Content-Type: application/json');
		$query = $this->db->query('SELECT * FROM tbl_state') ;
		$row = $query->row_array();
		echo json_encode( $row );
	}
	public function city()
	{
		header('Content-Type: application/json');
		$query = $this->db->query('SELECT * FROM tbl_city') ;
		$row = $query->row_array();
		echo json_encode( $row );
	}
	public function religion()
	{
		header('Content-Type: application/json');
		$query = $this->db->query('SELECT * FROM tbl_religion') ;
		$row = $query->row_array();
		echo json_encode( $row );
	}
	public function caste()
	{
		header('Content-Type: application/json');
		$query = $this->db->query('SELECT * FROM tbl_caste') ;
		$row = $query->row_array();
		echo json_encode( $row );
	}
	public function subCaste()
	{
		header('Content-Type: application/json');
		$query = $this->db->query('SELECT * FROM tbl_sub_caste') ;
		$row = $query->row_array();
		echo json_encode( $row );
	}
	public function raasi()
	{
		header('Content-Type: application/json');
		$query = $this->db->query('SELECT * FROM tbl_raasi') ;
		$row = $query->row_array();
		echo json_encode( $row );
	}
	public function star()
	{
		header('Content-Type: application/json');
		$query = $this->db->query('SELECT * FROM tbl_star') ;
		$row = $query->row_array();
		echo json_encode( $row );
	}
	public function occupation()
	{
		header('Content-Type: application/json');
		$queryStr = "SELECT tbl_occupation.occupation_id as id, tbl_occupation.occupation_name as name, tbl_occupation_category.occupation_category_name as category_name, tbl_occupation.occupation_category_id as category_id, tbl_occupation.created_at FROM tbl_occupation INNER JOIN tbl_occupation_category ON tbl_occupation_category.occupation_category_id=tbl_occupation.occupation_category_id;";
		$query = $this->db->query($queryStr) ;
		$row = $query->row_array();
		echo json_encode( $row );
	}
	public function education()
	{
		header('Content-Type: application/json');
		$queryStr = "SELECT tbl_education.education_id as id, tbl_education.education_name as name, tbl_education.education_category_id  as category_id, tbl_education_category.education_category_name as category_name , tbl_education.created_at FROM tbl_education INNER JOIN tbl_education_category ON tbl_education.education_category_id=tbl_education_category.education_category_id;";
		$query = $this->db->query($queryStr);
		$row = $query->row_array();
		echo json_encode( $row );
	}
	public function educationCategory()
	{
		header('Content-Type: application/json');
		$queryStr = "select * from tbl_education_category;";
		$query = $this->db->query($queryStr) ;
		$row = $query->row_array();
		echo json_encode( $row );
	}
	public function occupationCategory()
	{
		header('Content-Type: application/json');
		$queryStr = "select * from tbl_occupation_category;";
		$query = $this->db->query($queryStr);
		$row = $query->row_array();
		echo json_encode( $row );
	}
	public function annualIncome()
	{
		header('Content-Type: application/json');
		$queryStr = "select * from tbl_occupation_category;";
		$query = $this->db->query($queryStr);
		$row = $query->row_array();
		echo json_encode( $row );
	}
	public function employedIn()
	{
		header('Content-Type: application/json');
		$queryStr = "select * from tbl_occupation_category;";
		$query = $this->db->query($queryStr);
		$row = $query->row_array();
		echo json_encode( $row );
	}
}
