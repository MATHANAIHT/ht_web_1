<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('api_model');

		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->helper('url', 'form');
	}

	public function profile(){
		header('Content-Type: application/json');
		$matrimony = $this->input->post('matrimony');
		$action = $this->input->post('action');
		$array = $this->api_model->actionForProfile($action, $matrimony);
		echo json_encode($array);
	}

	public function uploads(){
		$matrimony = $this->input->post('matrimony');
		$responseMessage = "";
		if($matrimony != "") {
			$queryStr = "select user_id from tbl_user_login u where u.matrimony_id = '".$matrimony."'";
			$query = $this->db->query($queryStr);
			$row = $query->result();
			if(count($row) == 1){
				$rData = $row[0];
				$user_id = $rData->user_id;

				$extraPath = "profile/";
				$extraPath .= $matrimony."/";
				if (!file_exists($extraPath)) {
					mkdir($extraPath, 0777, true);
				}
				$config['upload_path'] = $extraPath;
				$config['file_ext_tolower'] = true;
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 2000;
				$config['max_width'] = 1500;
				$config['max_height'] = 1500;
				$config['file_name'] = uniqid();
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('file')) {
					$responseMessage = $this->upload->display_errors();
				} else {
					$this->api_model->updateProfilePhoto($user_id, $this->upload->data('file_name'));
					$responseMessage = $this->upload->data('file_name');
				}
			}
		}
		$array = array(
			'responseMessage' => $responseMessage
		);
		echo json_encode($array);
	}

	public function photos(){
		header('Content-Type: application/json');
		$matrimony = $this->input->post('matrimony');
		$photo = $this->input->post('photo');
		$action = $this->input->post('action');
		$array = $this->api_model->actionForPhoto($action, $matrimony, $photo);
		echo json_encode($array);
	}

	public function gallery(){
		header('Content-Type: application/json');
		$row = $this->api_model->getGalleryList("");
		echo json_encode($row);
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

	public function updateUser($formId, $matrimonyId){
//		header('Content-Type: application/json');
		$array = $this->api_model->updateUser($formId, $matrimonyId, $this->input->post());
		print_r($array);
//		echo json_encode($array);
	}
	public function getUsers(){
		header('Content-Type: application/json');
		$row = $this->api_model->getUsers($this->input->post());
		echo json_encode($row);
	}

	public function createUser(){
		header('Content-Type: application/json');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('profileCreatedFor', 'Profile Created For', 'required');
		$this->form_validation->set_rules('fullName', 'Name', 'required');
		$this->form_validation->set_rules('dateOfBirth3', 'D.O.B Year', 'required');
		$this->form_validation->set_rules('dateOfBirth2', 'D.O.B Month', 'required');
		$this->form_validation->set_rules('dateOfBirth1', 'D.O.B Day', 'required');
		$this->form_validation->set_rules('religion', 'Religion', 'required');
		$this->form_validation->set_rules('caste', 'Caste', 'required');
		$this->form_validation->set_rules('maritalStatus', 'Marital Status', 'required');
		$this->form_validation->set_rules('motherTongue', 'Mother Tongue', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|min_length[10]|max_length[10]|is_unique[tbl_user_login.mobile_number]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_user_login.email_id]');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$array = array();
		$array["dataType"] = "";
		$array["message"] = "";
		if ($this->form_validation->run() != FALSE) {
			$array = $this->api_model->createUser($this->input->post());

		} else {
			$array["dataType"] = "error";
			$array["message"] = validation_errors(" ", "::::");
		}

		echo json_encode($array);
	}

	public function annualIncome()
	{
		header('Content-Type: application/json');
		$dataId = $this->input->get('dataId');
		$row = $this->api_model->getAnnualIncome($dataId);
		echo json_encode($row);
	}

	public function saveAnnualIncome() {
		header('Content-Type: application/json');
		$action = $this->input->post('action');
		$editId = $this->input->post('editId');
		$annualIncome = $this->input->post('annualIncomeName');
		$responseMessage = $this->api_model->saveAnnualIncome($action, $editId, $annualIncome);
		$array = array(
			'responseMessage' => $responseMessage
		);
		echo json_encode($array);
	}

	public function raasi() {
		header('Content-Type: application/json');
		$dataId = $this->input->get('dataId');
		$row = $this->api_model->getRaasi($dataId);
		echo json_encode($row);
	}

	public function saveRaasi() {
		header('Content-Type: application/json');
		$action = $this->input->post('action');
		$editId = $this->input->post('editId');
		$raasiName = $this->input->post('raasiName');
		$responseMessage = $this->api_model->saveRaasi($action, $editId, $raasiName);
		$array = array(
			'responseMessage' => $responseMessage
		);
		echo json_encode($array);
	}

	public function star() {

		header('Content-Type: application/json');
		$dataId = $this->input->get('dataId');
		$raasi = $this->input->get('raasi');
		$row = $this->api_model->getStar($dataId, $raasi);
		echo json_encode($row);
	}

	public function saveStar() {
		header('Content-Type: application/json');
		$action = $this->input->post('action');
		$editId = $this->input->post('editId');
		$starName = $this->input->post('starName');
		$raasi = $this->input->post('raasi');
		$responseMessage = $this->api_model->saveStar($action, $editId, $starName, $raasi);
		$array = array(
			'responseMessage' => $responseMessage
		);
		echo json_encode($array);
	}

	public function city()
	{
		header('Content-Type: application/json');
		$dataId = $this->input->get('dataId');
		$state = $this->input->get('state');
		$row = $this->api_model->getCity($dataId, $state);
		echo json_encode($row);
	}

	public function saveCity() {
		header('Content-Type: application/json');
		$action = $this->input->post('action');
		$editId = $this->input->post('editId');
		$country = $this->input->post('country');
		$state = $this->input->post('state');
		$cityName = $this->input->post('cityName');
		$responseMessage = $this->api_model->saveCity($action, $editId, $state, $country, $cityName);
		$array = array(
			'responseMessage' => $responseMessage
		);
		echo json_encode($array);
	}

	public function subCaste()
	{
		header('Content-Type: application/json');
		$dataId = $this->input->get('dataId');
		$caste = $this->input->get('caste');
		$row = $this->api_model->getSubCaste($dataId, $caste);
		echo json_encode($row);
	}

	public function saveSubCaste() {
		header('Content-Type: application/json');
		$action = $this->input->post('action');
		$editId = $this->input->post('editId');
		$religion = $this->input->post('religion');
		$caste = $this->input->post('caste');
		$subCasteName = $this->input->post('subCasteName');
		$responseMessage = $this->api_model->saveSubCaste($action, $editId, $caste, $religion, $subCasteName);
		$array = array(
			'responseMessage' => $responseMessage
		);
		echo json_encode($array);
	}

	public function occupation()
	{
		header('Content-Type: application/json');
		$dataId = $this->input->get('dataId');
		$occupationCategory = $this->input->get('occupationCategory');
		$row = $this->api_model->getOccupation($dataId, $occupationCategory);
		echo json_encode($row);
	}

	public function saveOccupation() {
		header('Content-Type: application/json');
		$action = $this->input->post('action');
		$editId = $this->input->post('editId');
		$occupationName = $this->input->post('occupationName');
		$occupationCategory = $this->input->post('occupationCategory');
		$responseMessage = $this->api_model->saveOccupation($action, $editId, $occupationName, $occupationCategory);
		$array = array(
			'responseMessage' => $responseMessage
		);
		echo json_encode($array);
	}

	public function education()
	{
		header('Content-Type: application/json');
		$dataId = $this->input->get('dataId');
		$educationCategory = $this->input->get('educationCategory');
		$row = $this->api_model->getEducation($dataId, $educationCategory);
		echo json_encode($row);
	}

	public function saveEducation() {
		header('Content-Type: application/json');
		$action = $this->input->post('action');
		$editId = $this->input->post('editId');
		$educationName = $this->input->post('educationName');
		$educationCategory = $this->input->post('educationCategory');
		$responseMessage = $this->api_model->saveEducation($action, $editId, $educationName, $educationCategory);
		$array = array(
			'responseMessage' => $responseMessage
		);
		echo json_encode($array);
	}

	public function caste()
	{
		header('Content-Type: application/json');
		$dataId = $this->input->get('dataId');
		$religion = $this->input->get('religion');
		$row = $this->api_model->getCaste($dataId, $religion);
		echo json_encode($row);
	}

	public function saveCaste() {
		header('Content-Type: application/json');
		$action = $this->input->post('action');
		$editId = $this->input->post('editId');
		$casteName = $this->input->post('casteName');
		$religion = $this->input->post('religion');
		$responseMessage = $this->api_model->saveCaste($action, $editId, $casteName, $religion);
		$array = array(
			'responseMessage' => $responseMessage
		);
		echo json_encode($array);
	}

	public function state()
	{
		header('Content-Type: application/json');
		$dataId = $this->input->get('dataId');
		$country = $this->input->get('country');
		$row = $this->api_model->getState($dataId, $country);
		echo json_encode($row);
	}

	public function saveState() {
		header('Content-Type: application/json');
		$action = $this->input->post('action');
		$editId = $this->input->post('editId');
		$stateName = $this->input->post('stateName');
		$country = $this->input->post('country');
		$responseMessage = $this->api_model->saveState($action, $editId, $stateName, $country);
		$array = array(
			'responseMessage' => $responseMessage
		);
		echo json_encode($array);
	}

	public function educationCategory()
	{
		header('Content-Type: application/json');
		$dataId = $this->input->get('dataId');
		$row = $this->api_model->getEducationCategory($dataId);
		echo json_encode($row);
	}

	public function saveEducationCategory() {
		header('Content-Type: application/json');
		$action = $this->input->post('action');
		$editId = $this->input->post('editId');
		$educationCategoryName = $this->input->post('educationCategoryName');
		$responseMessage = $this->api_model->saveEducationCategory($action, $editId, $educationCategoryName);
		$array = array(
			'responseMessage' => $responseMessage
		);
		echo json_encode($array);
	}

	public function occupationCategory()
	{
		header('Content-Type: application/json');
		$dataId = $this->input->get('dataId');
		$row = $this->api_model->getOccupationCategory($dataId);
		echo json_encode($row);
	}

	public function saveOccupationCategory() {
		header('Content-Type: application/json');
		$action = $this->input->post('action');
		$editId = $this->input->post('editId');
		$occupationCategoryName = $this->input->post('occupationCategoryName');
		$responseMessage = $this->api_model->saveOccupationCategory($action, $editId, $occupationCategoryName);
		$array = array(
			'responseMessage' => $responseMessage
		);
		echo json_encode($array);
	}

	public function employedIn()
	{
		header('Content-Type: application/json');
		$dataId = $this->input->get('dataId');
		$row = $this->api_model->getEmployedIn($dataId);
		echo json_encode($row);
	}

	public function saveEmployedIn() {
		header('Content-Type: application/json');
		$action = $this->input->post('action');
		$editId = $this->input->post('editId');
		$employedInName = $this->input->post('employedInName');
		$responseMessage = $this->api_model->saveEmployedIn($action, $editId, $employedInName);
		$array = array(
			'responseMessage' => $responseMessage
		);
		echo json_encode($array);
	}

	public function motherTongue() {
		header('Content-Type: application/json');
		$dataId = $this->input->get('dataId');
		$row = $this->api_model->getMotherTongue($dataId);
		echo json_encode($row);
	}

	public function saveMotherTongue() {
		header('Content-Type: application/json');
		$action = $this->input->post('action');
		$editId = $this->input->post('editId');
		$motherTongue = $this->input->post('motherTongueName');
		$responseMessage = $this->api_model->saveMotherTongue($action, $editId, $motherTongue);
		$array = array(
			'responseMessage' => $responseMessage
		);
		echo json_encode($array);
	}

	public function religion() {
		header('Content-Type: application/json');
		$dataId = $this->input->get('dataId');
		$row = $this->api_model->getReligion($dataId);
		echo json_encode($row);
	}

	public function saveReligion() {
		header('Content-Type: application/json');
		$action = $this->input->post('action');
		$editId = $this->input->post('editId');
		$religionName = $this->input->post('religionName');
		$responseMessage = $this->api_model->saveReligion($action, $editId, $religionName);
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
}
