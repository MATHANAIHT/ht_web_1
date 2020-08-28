<?php
class Api_model extends CI_Model
{
	function getTables($tbl){
		$tableNames = array(
			"raasi" => array("name" =>"tbl_raasi", "id"=> "raasi_id"),
			"star" => array("name" =>"tbl_star", "id"=> "star_id"),
			"country" => array("name" =>"tbl_country", "id"=> "country_id"),
			"state" => array("name" =>"tbl_state", "id"=> "state_id"),
			"city" => array("name" =>"tbl_city", "id"=> "city_id"),
		);
		return $tableNames[$tbl];
	}

	function delete_from_table($id, $tbl)
	{
		$tblName = $this->getTables($tbl);
		$this -> db -> where($tblName['id'], $id);
		if(!$this -> db -> delete($tblName['name'])) {
			return false;
		}
		else {
			return true;
		}
	}

	function getCountry($dataId){
		$tbl = $this->getTables("country");
		$tblName = $tbl["name"];
		if($dataId == "All"){
			$query = $this->db->get($tblName);
		} else {
			$query = $this->db->get_where($tblName, array('country_id' => $dataId));
		}
		$row = $query->result();
		return $row;
	}

	function saveCountry($action, $editId, $countryName, $shortName, $dialingCode){
		$tblNameObj = $this->getTables("country");
		$tblName = $tblNameObj["name"];
		if($action == "Add") {
			$query = $this->db->get_where($tblName, array('country_name' => $countryName));
			$row = $query->result();
			if(count($row) == 0){
				date_default_timezone_set("Asia/Calcutta");
				$date = date('Y-m-d H:i:s');
				$data = array();
				$data["country_name"] = $countryName;
				$data["country_code"] = $shortName;
				$data["international_dialing"] = $dialingCode;
				$data["created_at"] = $date;
				$this->db->insert($tblName, $data);
				return "success";
			} else {
				return "exist";
			}
		} else if($action == "Edit") {
			$query = $this->db->get_where($tblName, array('country_name' => $countryName));
			$insertValid = false;
			if ($query->num_rows() == 0){
				$insertValid = true;
			} else if ($query->num_rows() == 1){
				$row = $query->row();
				if($row->country_id != $editId){
					return "exist";
				} else {
					$insertValid = true;
				}
			} else {
				$insertValid = true;
			}
			if($insertValid){
				$this->db->set('country_name', $countryName);
				$this->db->set('country_code', $shortName);
				$this->db->set('international_dialing', $dialingCode);
				$this->db->where('country_id', $editId);
				$this->db->update($tblName); // gi

				return "success";
			}
			return "exist";
		}
		return "error";
	}
}

?>
