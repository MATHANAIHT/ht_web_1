<?php

require APPPATH . 'libraries/REST_Controller.php';

class Users extends REST_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function index_get($id = 0){
		if(!empty($id)){
			$data = $this->db->get_where("tbl_user", ['user_id' => $id])->row_array();
		}else{
			$data = $this->db->get("tbl_user")->result();
		}
		$this->response($data, REST_Controller::HTTP_OK);
	}

	public function index_put(){
		$id = $this->uri->segment(3);
		$data = array(
			'name' => $this->input->get('name'),
			'pass' => $this->input->get('pass'),
			'id' => $id,
			'type' => $this->input->get('type')
		);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	public function index_post(){
		$data = array(
			'name' => $this->input->post('name'),
			'pass' => $this->input->post('pass'),
			'type' => $this->input->post('type'),
			'post' => 'ok'
		);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	public function index_delete(){
		$data = array(
			'name' => $this->input->post('name'),
			'pass' => $this->input->post('pass'),
			'type' => $this->input->get('type'),
			'delete' => 'ok'
		);
		$this->response($data, REST_Controller::HTTP_OK);
	}

}
