<?php
class Api_model extends CI_Model
{
	function getTables($tbl){
		$tableNames = array(
			"country" => array("name" =>"tbl_country", "id"=> "country_id"),
			"religion" => array("name" =>"tbl_religion", "id"=> "religion_id"),
			"motherTongue" => array("name" =>"tbl_mother_tongue", "id"=> "mother_tongue_id"),
			"employedIn" => array("name" =>"tbl_employed_in", "id"=> "employed_in_id"),
			"educationCategory" => array("name" =>"tbl_education_category", "id"=> "education_category_id"),
			"occupationCategory" => array("name" =>"tbl_occupation_category", "id"=> "occupation_category_id"),

			"raasi" => array("name" =>"tbl_raasi", "id"=> "raasi_id"),
			"star" => array("name" =>"tbl_star", "id"=> "star_id"),
			"state" => array("name" =>"tbl_state", "id"=> "state_id"),
			"city" => array("name" =>"tbl_city", "id"=> "city_id"),
		);
		return $tableNames[$tbl];
	}

	function getEducationCategory($dataId){
		$tbl = $this->getTables("educationCategory");
		$tblName = $tbl["name"];
		if($dataId == "All"){
			$query = $this->db->get($tblName);
		} else {
			$query = $this->db->get_where($tblName, array($tbl["id"] => $dataId));
		}
		$row = $query->result();
		return $row;
	}

	function saveEducationCategory($action, $editId, $educationCategoryName){
		$tbl = $this->getTables("educationCategory");
		$tblName = $tbl["name"];
		if($action == "Add") {
			$query = $this->db->get_where($tblName, array('education_category_name' => $educationCategoryName));
			$row = $query->result();
			if(count($row) == 0){
				date_default_timezone_set("Asia/Calcutta");
				$date = date('Y-m-d H:i:s');
				$data = array();
				$data["education_category_name"] = $educationCategoryName;
				$data["created_at"] = $date;
				$this->db->insert($tblName, $data);
				return "success";
			} else {
				return "exist";
			}
		} else if($action == "Edit") {
			$query = $this->db->get_where($tblName, array('education_category_name' => $educationCategoryName));
			$insertValid = false;
			if ($query->num_rows() == 0){
				$insertValid = true;
			} else if ($query->num_rows() == 1){
				$row = $query->row();
				if($row->education_category_id != $editId){
					return "exist";
				} else {
					$insertValid = true;
				}
			} else {
				$insertValid = true;
			}
			if($insertValid){
				$this->db->set('education_category_name', $educationCategoryName);
				$this->db->where($tbl["id"], $editId);
				$this->db->update($tblName); // gi

				return "success";
			}
			return "exist";
		}
		return "error";
	}

	function getOccupationCategory($dataId){
		$tbl = $this->getTables("occupationCategory");
		$tblName = $tbl["name"];
		if($dataId == "All"){
			$query = $this->db->get($tblName);
		} else {
			$query = $this->db->get_where($tblName, array($tbl["id"] => $dataId));
		}
		$row = $query->result();
		return $row;
	}

	function saveOccupationCategory($action, $editId, $occupationCategoryName){
		$tbl = $this->getTables("occupationCategory");
		$tblName = $tbl["name"];
		if($action == "Add") {
			$query = $this->db->get_where($tblName, array('occupation_category_name' => $occupationCategoryName));
			$row = $query->result();
			if(count($row) == 0){
				date_default_timezone_set("Asia/Calcutta");
				$date = date('Y-m-d H:i:s');
				$data = array();
				$data["occupation_category_name"] = $occupationCategoryName;
				$data["created_at"] = $date;
				$this->db->insert($tblName, $data);
				return "success";
			} else {
				return "exist";
			}
		} else if($action == "Edit") {
			$query = $this->db->get_where($tblName, array('occupation_category_name' => $occupationCategoryName));
			$insertValid = false;
			if ($query->num_rows() == 0){
				$insertValid = true;
			} else if ($query->num_rows() == 1){
				$row = $query->row();
				if($row->occupation_category_id != $editId){
					return "exist";
				} else {
					$insertValid = true;
				}
			} else {
				$insertValid = true;
			}
			if($insertValid){
				$this->db->set('occupation_category_name', $occupationCategoryName);
				$this->db->where($tbl["id"], $editId);
				$this->db->update($tblName); // gi

				return "success";
			}
			return "exist";
		}
		return "error";
	}

	function getEmployedIn($dataId){
		$tbl = $this->getTables("employedIn");
		$tblName = $tbl["name"];
		if($dataId == "All"){
			$query = $this->db->get($tblName);
		} else {
			$query = $this->db->get_where($tblName, array($tbl["id"] => $dataId));
		}
		$row = $query->result();
		return $row;
	}

	function saveEmployedIn($action, $editId, $employedInName){
		$tbl = $this->getTables("employedIn");
		$tblName = $tbl["name"];
		if($action == "Add") {
			$query = $this->db->get_where($tblName, array('employed_in_name' => $employedInName));
			$row = $query->result();
			if(count($row) == 0){
				date_default_timezone_set("Asia/Calcutta");
				$date = date('Y-m-d H:i:s');
				$data = array();
				$data["employed_in_name"] = $employedInName;
				$data["created_at"] = $date;
				$this->db->insert($tblName, $data);
				return "success";
			} else {
				return "exist";
			}
		} else if($action == "Edit") {
			$query = $this->db->get_where($tblName, array('employed_in_name' => $employedInName));
			$insertValid = false;
			if ($query->num_rows() == 0){
				$insertValid = true;
			} else if ($query->num_rows() == 1){
				$row = $query->row();
				if($row->employed_in_id != $editId){
					return "exist";
				} else {
					$insertValid = true;
				}
			} else {
				$insertValid = true;
			}
			if($insertValid){
				$this->db->set('employed_in_name', $employedInName);
				$this->db->where($tbl["id"], $editId);
				$this->db->update($tblName); // gi

				return "success";
			}
			return "exist";
		}
		return "error";
	}

	function getMotherTongue($dataId){
		$tbl = $this->getTables("motherTongue");
		$tblName = $tbl["name"];
		if($dataId == "All"){
			$query = $this->db->get($tblName);
		} else {
			$query = $this->db->get_where($tblName, array($tbl["id"] => $dataId));
		}
		$row = $query->result();
		return $row;
	}

	function saveMotherTongue($action, $editId, $motherTongueName){
		$tbl = $this->getTables("motherTongue");
		$tblName = $tbl["name"];
		if($action == "Add") {
			$query = $this->db->get_where($tblName, array('mother_tongue_name' => $motherTongueName));
			$row = $query->result();
			if(count($row) == 0){
				date_default_timezone_set("Asia/Calcutta");
				$date = date('Y-m-d H:i:s');
				$data = array();
				$data["mother_tongue_name"] = $motherTongueName;
				$data["created_at"] = $date;
				$this->db->insert($tblName, $data);
				return "success";
			} else {
				return "exist";
			}
		} else if($action == "Edit") {
			$query = $this->db->get_where($tblName, array('mother_tongue_name' => $motherTongueName));
			$insertValid = false;
			if ($query->num_rows() == 0){
				$insertValid = true;
			} else if ($query->num_rows() == 1){
				$row = $query->row();
				if($row->mother_tongue_id != $editId){
					return "exist";
				} else {
					$insertValid = true;
				}
			} else {
				$insertValid = true;
			}
			if($insertValid){
				$this->db->set('mother_tongue_name', $motherTongueName);
				$this->db->where($tbl["id"], $editId);
				$this->db->update($tblName); // gi

				return "success";
			}
			return "exist";
		}
		return "error";
	}

	function getReligion($dataId){
		$tbl = $this->getTables("religion");
		$tblName = $tbl["name"];
		if($dataId == "All"){
			$query = $this->db->get($tblName);
		} else {
			$query = $this->db->get_where($tblName, array($tbl["id"] => $dataId));
		}
		$row = $query->result();
		return $row;
	}

	function saveReligion($action, $editId, $religionName){
		$tblNameObj = $this->getTables("religion");
		$tblName = $tblNameObj["name"];
		if($action == "Add") {
			$query = $this->db->get_where($tblName, array('religion_name' => $religionName));
			$row = $query->result();
			if(count($row) == 0){
				date_default_timezone_set("Asia/Calcutta");
				$date = date('Y-m-d H:i:s');
				$data = array();
				$data["religion_name"] = $religionName;
				$data["created_at"] = $date;
				$this->db->insert($tblName, $data);
				return "success";
			} else {
				return "exist";
			}
		} else if($action == "Edit") {
			$query = $this->db->get_where($tblName, array('religion_name' => $religionName));
			$insertValid = false;
			if ($query->num_rows() == 0){
				$insertValid = true;
			} else if ($query->num_rows() == 1){
				$row = $query->row();
				if($row->religion_id != $editId){
					return "exist";
				} else {
					$insertValid = true;
				}
			} else {
				$insertValid = true;
			}
			if($insertValid){
				$this->db->set('religion_name', $religionName);
				$this->db->where('religion_id', $editId);
				$this->db->update($tblName); // gi

				return "success";
			}
			return "exist";
		}
		return "error";
	}

	function getCountry($dataId){
		$tbl = $this->getTables("country");
		$tblName = $tbl["name"];
		if($dataId == "All"){
			$query = $this->db->get($tblName);
		} else {
			$query = $this->db->get_where($tblName, array($tbl["id"] => $dataId));
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

}

?>
