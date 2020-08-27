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
}

?>
