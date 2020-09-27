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
			"state" => array("name" =>"tbl_state", "id"=> "state_id"),
			"caste" => array("name" =>"tbl_caste", "id"=> "caste_id"),
			"occupation" => array("name" =>"tbl_occupation", "id"=> "occupation_id"),
			"education" => array("name" =>"tbl_education", "id"=> "education_id"),
			"city" => array("name" =>"tbl_city", "id"=> "city_id"),
			"subCaste" => array("name" =>"tbl_sub_caste", "id"=> "sub_caste_id"),
			"raasi" => array("name" =>"tbl_raasi", "id"=> "raasi_id"),
			"star" => array("name" =>"tbl_star", "id"=> "star_id"),
			"annualIncome" => array("name" =>"tbl_annual_income", "id"=> "annual_income_id"),
		);
		return $tableNames[$tbl];
	}

	function isValidToUpdate($dataArray, $index, $existValue){
		if(array_key_exists($index, $dataArray)){
			if($dataArray[$index] != "" && $dataArray[$index] != null && $dataArray[$index] != $existValue){
				return true;
			}
		}
		return false;
	}
	function isValidToUpdateArray($dataArray, $index, $existValue){
		if(array_key_exists($index, $dataArray)){
			if($dataArray[$index] != "" && $dataArray[$index] != null && count($dataArray[$index]) > 0){
				$string = join(',', $dataArray[$index]);
				if($string != $existValue){
					return $string;
				}
			}
		}
		return "";
	}

	function checkEmptyValue($data){
		if($data != ""){
			return $data;
		}
		return null;
	}

	function updateUser($formId, $matrimonyId, $data){
		$responseCode = "0";
		$responseMessage = "No data updated";
		if($matrimonyId != ""){
			date_default_timezone_set("Asia/Calcutta");
			$currentDate = date('Y-m-d H:i:s');

			if($formId == 6){
				$queryStr = "select password, user_id from tbl_user_login u where u.matrimony_id = '".$matrimonyId."'";
				$query = $this->db->query($queryStr);
				$row = $query->result();
				if(count($row) == 1){
					$rData = $row[0];
					if($rData->password == $data["OldPassword"]){
						if($data["NewPassword"] != $rData->password){
							if($data["NewPassword"] != "" && $data["NewPassword"] != null && $data["ConfirmNewPassword"] != "" && $data["ConfirmNewPassword"] != null){
								if($data["NewPassword"] == $data["ConfirmNewPassword"] ){
									$updateQueryStr = "Update tbl_user_login  set password= '".$data["NewPassword"]."' where matrimony_id ='".$matrimonyId."'; ";
									$this->db->query($updateQueryStr);
									$responseCode = "1";
									$responseMessage = "Successfully updated!.";
								} else {
									$responseMessage = "New Password and Confirm New Password Miss Matched!";
								}
							} else {
								$responseMessage = "Provide valid New Password and Confirm New Password";
							}
						} else {
							$responseMessage = "Your password is used in previous!";
						}
					} else {
						$responseMessage = "OldPassword is InCorrect!";
					}
				}
			}
			else {
				$queryStr = "select * from tbl_user u where u.matrimony_id = '".$matrimonyId."'";
				$query = $this->db->query($queryStr);
				$row = $query->result();
				if(count($row) == 1){
					$rData = $row[0];
					if($formId == 1){
						$updateStr = "";
						if(self::isValidToUpdate($data, "profileCreatedFor", $rData->profile_created_by)){
							$updateStr .= "profile_created_by=\"".$data["profileCreatedFor"]."\", ";
						}
						if(self::isValidToUpdate($data, "fullName", $rData->full_name)){
							$updateStr .= "full_name=\"".$data["fullName"]."\", ";
						}
						if(self::isValidToUpdate($data, "Height", $rData->height)){
							$updateStr .= "height=\"".$data["Height"]."\", ";
						}
						if(self::isValidToUpdate($data, "Weight", $rData->weight)){
							$updateStr .= "weight=\"".$data["Weight"]."\", ";
						}
						if(self::isValidToUpdate($data, "maritalStatus", $rData->marital_status)){
							$updateStr .= "marital_status=\"".$data["maritalStatus"]."\", ";
						}
						if(self::isValidToUpdate($data, "motherTongue", $rData->mother_tongue)){
							$updateStr .= "mother_tongue=\"".$data["motherTongue"]."\", ";
						}
						if(self::isValidToUpdate($data, "PhysicalStatus", $rData->physical_status)){
							$updateStr .= "physical_status=\"".$data["PhysicalStatus"]."\", ";
						}
						if(self::isValidToUpdate($data, "BodyType", $rData->body_type)){
							$updateStr .= "body_type=\"".$data["BodyType"]."\", ";
						}
						if(self::isValidToUpdate($data, "EatingHabits", $rData->eating_habits)){
							$updateStr .= "eating_habits=\"".$data["EatingHabits"]."\", ";
						}
						if(self::isValidToUpdate($data, "DrinkingHabits", $rData->drinking_habits)){
							$updateStr .= "drinking_habits=\"".$data["DrinkingHabits"]."\", ";
						}
						if(self::isValidToUpdate($data, "SmokingHabits", $rData->smoking_habits)){
							$updateStr .= "smoking_habits=\"".$data["SmokingHabits"]."\", ";
						}
						$existDOB = $rData->date_of_birth;
						$existDOBArray = explode("-", $existDOB);
						if(count($existDOBArray) > 0){
							$eDOB3 = ltrim($existDOBArray[0], "0");
							$eDOB2 = ltrim($existDOBArray[1], "0");
							$eDOB1 = ltrim($existDOBArray[2], "0");

							if(self::isValidToUpdate($data, "dateOfBirth3", $eDOB3) || self::isValidToUpdate($data, "dateOfBirth2", $eDOB2) || self::isValidToUpdate($data, "dateOfBirth1", $eDOB1)){
								$dob = $data['dateOfBirth3']."-".sprintf("%02d", $data['dateOfBirth2'])."-".sprintf("%02d", $data['dateOfBirth1']);
								$updateStr .= "date_of_birth=\"".$dob."\", ";
							}
						}

						if($updateStr != ""){
							$updateStr = rtrim($updateStr, ", ");
							$updateQueryStr = "Update tbl_user  set ".$updateStr." where matrimony_id ='".$matrimonyId."'; ";
							$this->db->query($updateQueryStr);
							$responseCode = "1";
							$responseMessage = "Successfully updated!.";
						}
					}
					if($formId == 2){
						$updateStr = "";
						if(self::isValidToUpdate($data, "HaveDosham", $rData->is_chevvai_dosham)){
							$updateStr .= "is_chevvai_dosham=\"".$data["HaveDosham"]."\", ";
						}
						if(self::isValidToUpdate($data, "Star", $rData->star)){
							$updateStr .= "star=\"".$data["Star"]."\", ";
						}
						if(self::isValidToUpdate($data, "Raasi", $rData->raasi)){
							$updateStr .= "raasi=\"".$data["Raasi"]."\", ";
						}
						if(self::isValidToUpdate($data, "Gothram", $rData->gothra)){
							$updateStr .= "gothra=\"".$data["Gothram"]."\", ";
						}
						if(self::isValidToUpdate($data, "SubCaste", $rData->sub_caste)){
							$updateStr .= "sub_caste=\"".$data["SubCaste"]."\", ";
						}
						if(self::isValidToUpdate($data, "caste", $rData->caste)){
							$updateStr .= "caste=\"".$data["caste"]."\", ";
						}
						if(self::isValidToUpdate($data, "religion", $rData->religion)){
							$updateStr .= "religion=\"".$data["religion"]."\", ";
						}
						if($updateStr != ""){
							$updateStr = rtrim($updateStr, ", ");
							$updateQueryStr = "Update tbl_user  set ".$updateStr." where matrimony_id ='".$matrimonyId."'; ";
							$this->db->query($updateQueryStr);
							$responseCode = "1";
							$responseMessage = "Successfully updated!.";
						}
					}
					else if($formId == 3){
						$updateStr = "";
						if(self::isValidToUpdate($data, "country", $rData->country)){
							$updateStr .= "country=\"".$data["country"]."\", ";
						}
						if(self::isValidToUpdate($data, "state", $rData->state)){
							$updateStr .= "state=\"".$data["state"]."\", ";
						}
						if(self::isValidToUpdate($data, "city", $rData->city)){
							$updateStr .= "city=\"".$data["city"]."\", ";
						}
						if($updateStr != ""){
							$updateStr = rtrim($updateStr, ", ");
							$updateQueryStr = "Update tbl_user  set ".$updateStr." where matrimony_id ='".$matrimonyId."'; ";
							$this->db->query($updateQueryStr);
							$responseCode = "1";
							$responseMessage = "Successfully updated!.";
						}
					}
					else if($formId == 4){
						$user_id = $rData->user_id;
						$queryStr1 = "select * from tbl_user_education e where e.user_id = '".$user_id."'";
						$query1 = $this->db->query($queryStr1);
						$row1 = $query1->result();
						if(count($row1) == 1){
							$rData1 = $row1[0];
							$updateStr = "";
							if(self::isValidToUpdate($data, "HighestEducation", $rData1->education)){
								$updateStr .= "education=\"".$data["HighestEducation"]."\", ";
							}
							if(self::isValidToUpdate($data, "EducationInDetail", $rData1->edu_details)){
								$updateStr .= "edu_details=\"".$data["EducationInDetail"]."\", ";
							}
							if(self::isValidToUpdate($data, "CollegeOrInstitution", $rData1->edu_collage)){
								$updateStr .= "edu_collage=\"".$data["CollegeOrInstitution"]."\", ";
							}
							if(self::isValidToUpdate($data, "EmployedIn", $rData1->employed_in)){
								$updateStr .= "employed_in=\"".$data["EmployedIn"]."\", ";
							}
							if(self::isValidToUpdate($data, "Occupation", $rData1->occupation)){
								$updateStr .= "occupation=\"".$data["Occupation"]."\", ";
							}
							if(self::isValidToUpdate($data, "OccupationInDetail", $rData1->occu_details)){
								$updateStr .= "occu_details=\"".$data["OccupationInDetail"]."\", ";
							}
							if(self::isValidToUpdate($data, "AnnualIncome", $rData1->annual_income)){
								$updateStr .= "annual_income=\"".$data["AnnualIncome"]."\", ";
							}
							if(self::isValidToUpdate($data, "Organization", $rData1->organization)){
								$updateStr .= "organization=\"".$data["Organization"]."\", ";
							}
							if($updateStr != ""){
								$updateStr .= "modified_at=\"".$currentDate."\", ";
								$updateStr = rtrim($updateStr, ", ");
								$updateQueryStr = "Update tbl_user_education  set ".$updateStr." where user_id ='".$user_id."'; ";
								$this->db->query($updateQueryStr);
								$responseCode = "1";
								$responseMessage = "Successfully updated!.";
							}
						}
						else {
							$data = array(
								'user_id' => $user_id,
								'education' => self::checkEmptyValue($data['HighestEducation']),
								'edu_collage' => self::checkEmptyValue($data['CollegeOrInstitution']),
								'edu_details' => self::checkEmptyValue($data['EducationInDetail']),
								'employed_in' => self::checkEmptyValue($data['EmployedIn']),
								'occupation' => self::checkEmptyValue($data['Occupation']),
								'occu_details' => self::checkEmptyValue($data['OccupationInDetail']),
								'annual_income' => self::checkEmptyValue($data['AnnualIncome']),
								'organization' => self::checkEmptyValue($data["Organization"]),
								'modified_at' => $currentDate
							);
							$this->db->insert('tbl_user_education', $data);
							$responseCode = "1";
							$responseMessage = "Successfully updated!.";
						}
					}
					else if($formId == 5){
						$user_id = $rData->user_id;
						$queryStr5 = "select * from tbl_user_family e where e.user_id = '".$user_id."'";
						$query5 = $this->db->query($queryStr5);
						$row5 = $query5->result();
						if(count($row5) == 1){
							$rData1 = $row5[0];
							$updateStr = "";
							if(self::isValidToUpdate($data, "ParentsNo", $rData1->parents_no)){
								$updateStr .= "parents_no=\"".$data["ParentsNo"]."\", ";
							}
							if(self::isValidToUpdate($data, "NativePlace", $rData1->native_place)){
								$updateStr .= "native_place=\"".$data["NativePlace"]."\", ";
							}
							if(self::isValidToUpdate($data, "FamilyValue", $rData1->family_value)){
								$updateStr .= "family_value=\"".$data["FamilyValue"]."\", ";
							}
							if(self::isValidToUpdate($data, "FamilyType", $rData1->family_type)){
								$updateStr .= "family_type=\"".$data["FamilyType"]."\", ";
							}
							if(self::isValidToUpdate($data, "FamilyStatus", $rData1->family_status)){
								$updateStr .= "family_status=\"".$data["FamilyStatus"]."\", ";
							}
							if(self::isValidToUpdate($data, "FathersOccupation", $rData1->father_occupation)){
								$updateStr .= "father_occupation=\"".$data["FathersOccupation"]."\", ";
							}
							if(self::isValidToUpdate($data, "MothersOccupation", $rData1->mother_occupation)){
								$updateStr .= "mother_occupation=\"".$data["MothersOccupation"]."\", ";
							}
							if(self::isValidToUpdate($data, "NoOfBrothers", $rData1->no_of_bro)){
								$updateStr .= "no_of_bro=\"".$data["NoOfBrothers"]."\", ";
							}
							if(self::isValidToUpdate($data, "BrothersMarried", $rData1->bro_married)){
								$updateStr .= "bro_married=\"".$data["BrothersMarried"]."\", ";
							}
							if(self::isValidToUpdate($data, "NoOfSisters", $rData1->no_of_sis)){
								$updateStr .= "no_of_sis=\"".$data["NoOfSisters"]."\", ";
							}
							if(self::isValidToUpdate($data, "SistersMarried", $rData1->sis_married)){
								$updateStr .= "sis_married=\"".$data["SistersMarried"]."\", ";
							}
							if(self::isValidToUpdate($data, "AboutMyFamily", $rData1->about_family)){
								$updateStr .= "about_family=\"".$data["AboutMyFamily"]."\", ";
							}
							if($updateStr != ""){
								$updateStr .= "modified_at=\"".$currentDate."\", ";
								$updateStr = rtrim($updateStr, ", ");
								$updateQueryStr = "Update tbl_user_family  set ".$updateStr." where user_id ='".$user_id."'; ";
								$this->db->query($updateQueryStr);
								$responseCode = "1";
								$responseMessage = "Successfully updated!.";
							}
						}
						else {
							$data = array(
								'user_id' => $user_id,
								'parents_no' => self::checkEmptyValue($data['ParentsNo']),
								'native_place' => self::checkEmptyValue($data['NativePlace']),
								'family_value' => self::checkEmptyValue($data['FamilyValue']),
								'family_type' => self::checkEmptyValue($data['FamilyType']),
								'family_status' => self::checkEmptyValue($data['FamilyStatus']),
								'father_occupation' => self::checkEmptyValue($data['FathersOccupation']),
								'mother_occupation' => self::checkEmptyValue($data['MothersOccupation']),
								'no_of_bro' => self::checkEmptyValue($data["NoOfBrothers"]),
								'bro_married' => self::checkEmptyValue($data["BrothersMarried"]),
								'no_of_sis' => self::checkEmptyValue($data["NoOfSisters"]),
								'sis_married' => self::checkEmptyValue($data["SistersMarried"]),
								'about_family' => self::checkEmptyValue($data["AboutMyFamily"]),
								'modified_at' => $currentDate
							);
							$this->db->insert('tbl_user_family', $data);
							$responseCode = "1";
							$responseMessage = "Successfully updated!.";
						}
					}
					else if($formId == 7 || $formId == 8 || $formId == 9 || $formId == 10){
						print_r($data);
						$user_id = $rData->user_id;
						$queryStr10 = "select * from tbl_user_partner e where e.user_id = '".$user_id."'";
						$query10 = $this->db->query($queryStr10);
						$row10 = $query10->result();
						if(count($row10) == 1){
							$rData10 = $row10[0];
							$updateStr = "";
							if(self::isValidToUpdate($data, "PReligion", $rData10->p_religion)){
								$updateStr .= "p_religion=\"".$data["PReligion"]."\", ";
							}
							if(self::isValidToUpdate($data, "PPhysicalStatus", $rData10->p_physical_status)){
								$updateStr .= "p_physical_status=\"".$data["PPhysicalStatus"]."\", ";
							}
							if(self::isValidToUpdate($data, "PDosham", $rData10->p_is_chevvai_dosham)){
								$updateStr .= "p_is_chevvai_dosham=\"".$data["PDosham"]."\", ";
							}
							if(self::isValidToUpdate($data, "PWhatIAmLookingFor", $rData10->p_about_my_partner)){
								$updateStr .= "p_about_my_partner=\"".$data["PWhatIAmLookingFor"]."\", ";
							}
							if(self::isValidToUpdate($data, "PStartAge", $rData10->p_start_age)){
								$updateStr .= "p_start_age=\"".$data["PStartAge"]."\", ";
							}
							if(self::isValidToUpdate($data, "PEndAge", $rData10->p_end_age)){
								$updateStr .= "p_end_age=\"".$data["PEndAge"]."\", ";
							}
							if(self::isValidToUpdate($data, "startPHeight", $rData10->p_start_height)){
								$updateStr .= "p_start_height=\"".$data["startPHeight"]."\", ";
							}
							if(self::isValidToUpdate($data, "endPHeight", $rData10->p_end_height)){
								$updateStr .= "p_end_height=\"".$data["endPHeight"]."\", ";
							}
							$PMaritalStatus = self::isValidToUpdateArray($data, "PMaritalStatus", $rData10->p_marital_status);
							if(strlen($PMaritalStatus) > 1){
								$updateStr .= "p_marital_status=\"".$PMaritalStatus."\", ";
							}
							$PSmokingHabits = self::isValidToUpdateArray($data, "PSmokingHabits", $rData10->p_smoking);
							if(strlen($PSmokingHabits) > 1){
								$updateStr .= "p_smoking=\"".$PSmokingHabits."\", ";
							}
							$PDrinkingHabits = self::isValidToUpdateArray($data, "PDrinkingHabits", $rData10->p_drinking);
							if(strlen($PDrinkingHabits) > 1){
								$updateStr .= "p_drinking=\"".$PDrinkingHabits."\", ";
							}
							$PEatingHabits = self::isValidToUpdateArray($data, "PEatingHabits", $rData10->p_eating);
							if(strlen($PEatingHabits) > 1){
								$updateStr .= "p_eating=\"".$PEatingHabits."\", ";
							}
							$PStar = self::isValidToUpdateArray($data, "PStar", $rData10->p_star);
							if(strlen($PStar) > 1){
								$updateStr .= "p_star=\"".$PStar."\", ";
							}
							$PMotherTongue = self::isValidToUpdateArray($data, "PMotherTongue", $rData10->p_mother_tongue);
							if(strlen($PMotherTongue) > 1){
								$updateStr .= "p_mother_tongue=\"".$PMotherTongue."\", ";
							}
							$PCaste = self::isValidToUpdateArray($data, "PCaste", $rData10->p_caste);
							if(strlen($PCaste) > 1){
								$updateStr .= "p_caste=\"".$PCaste."\", ";
							}
							$PSubCaste = self::isValidToUpdateArray($data, "PSubCaste", $rData10->p_sub_caste);
							if(strlen($PSubCaste) > 1){
								$updateStr .= "p_sub_caste=\"".$PSubCaste."\", ";
							}

							if($formId == 7){
								$index = "PMotherTongueAny";
								if(array_key_exists($index, $data)){
									if($data[$index] != "" && $data[$index] != null && $data[$index] != $rData10->p_mother_tongue_any){
										$updateStr .= "p_mother_tongue_any=\"".$data[$index]."\", p_mother_tongue='', ";
									}
								} else if($rData10->p_mother_tongue_any == "YES"){
									$updateStr .= "p_mother_tongue_any=\"NO\", ";
								}

								$index = "PReligionAny";
								if(array_key_exists($index, $data)){
									if($data[$index] != "" && $data[$index] != null && $data[$index] != $rData10->p_religion_any){
										$updateStr .= "p_religion_any=\"".$data[$index]."\", p_religion='', ";
									}
								} else if($rData10->p_religion_any == "YES"){
									$updateStr .= "p_religion_any=\"NO\", ";
								}

								$index = "PCasteAny";
								if(array_key_exists($index, $data)){
									if($data[$index] != "" && $data[$index] != null && $data[$index] != $rData10->p_caste_any){
										$updateStr .= "p_caste_any=\"".$data[$index]."\", p_caste='', ";
									}
								} else if($rData10->p_caste_any == "YES"){
									$updateStr .= "p_caste_any=\"NO\", ";
								}

								$index = "PSubCasteAny";
								if(array_key_exists($index, $data)){
									if($data[$index] != "" && $data[$index] != null && $data[$index] != $rData10->p_sub_caste_any){
										$updateStr .= "p_sub_caste_any=\"".$data[$index]."\", p_sub_caste='', ";
									}
								} else if($rData10->p_sub_caste_any == "YES"){
									$updateStr .= "p_sub_caste_any=\"NO\", ";
								}

								$index = "PStarAny";
								if(array_key_exists($index, $data)){
									if($data[$index] != "" && $data[$index] != null && $data[$index] != $rData10->p_star_any){
										$updateStr .= "p_star_any=\"".$data[$index]."\", p_star='', ";
									}
								} else if($rData10->p_star_any == "YES"){
									$updateStr .= "p_star_any=\"NO\", ";
								}
							}

							if($updateStr != ""){
								$updateStr .= "modified_at=\"".$currentDate."\", ";
								$updateStr = rtrim($updateStr, ", ");
								$updateQueryStr = "Update tbl_user_partner  set ".$updateStr." where user_id ='".$user_id."'; ";
								$this->db->query($updateQueryStr);
								$responseCode = "1";
								$responseMessage = "Successfully updated!.";
							}
						}
					}
				}
			}
		}
		return array(
			"responseCode" => $responseCode,
			"responseMessage" => $responseMessage
		);
	}

	function getUsers($postDataArray){
		$queryStr = "";
		if(array_key_exists("matrimony_id", $postDataArray) && $postDataArray['matrimony_id'] != null){
			$matrimony_id = $postDataArray['matrimony_id'];
			if($matrimony_id != null && $matrimony_id != ""){
				$queryStr = "select *, ue.*, uf.*, up.* from tbl_user u left join tbl_user_login ul on ul.user_id=u.user_id left join tbl_user_education ue on ue.user_id=u.user_id  left join tbl_user_family uf on uf.user_id=u.user_id left join tbl_user_partner up on up.user_id=u.user_id where u.matrimony_id = '".$matrimony_id."'";
			}
		} else {
			$queryStr = "select u.matrimony_id, u.user_id, u.full_name, u.date_of_birth, u.last_login, u.created_at, u.gender, u.religion, u.caste, ul.mobile_number, ul.email_id from tbl_user u left join tbl_user_login ul on ul.user_id=u.user_id";
		}
		$query = $this->db->query($queryStr);
		$row = $query->result();
		return $row;
	}

	function createUser($postDataArray){
		$dataType = "error";
		$message = "Please try again later.";

		date_default_timezone_set("Asia/Calcutta");
		$currentDate = date('Y-m-d H:i:s');

		$dob = new DateTime();
		$dob->setDate($postDataArray['dateOfBirth3'], $postDataArray['dateOfBirth2'], $postDataArray['dateOfBirth1']);
		$data = array(
			'profile_created_by' => $postDataArray['profileCreatedFor'],
			'gender' => $postDataArray['gender'],
			'full_name' => $postDataArray['fullName'],
			'date_of_birth' => $dob->format('Y-m-d'),
			'marital_status' => $postDataArray['maritalStatus'],
			'religion' => $postDataArray['religion'],
			'caste' => $postDataArray['caste'],
			'mother_tongue' => $postDataArray['motherTongue'],
			'created_at' => $currentDate
		);
		$this->db->insert('tbl_user', $data);
		$userId = $this->db->insert_id();

		$matrimony_id = 'M'. (10000 + $userId);
		$this->db->set('matrimony_id', $matrimony_id);
		$this->db->where('user_id', $userId);
		$this->db->update('tbl_user');

		if($userId > 0){
			$data1 = array(
				'user_id' => $userId,
				'matrimony_id' => $matrimony_id,
				'mobile_number' => $postDataArray['mobile'],
				'email_id' => $postDataArray['email'],
				'password' => $postDataArray['password'],
				'country' => $postDataArray['country'],
			);
			$this->db->insert('tbl_user_login', $data1);

			$data = array(
				'user_id' => $userId,
				'modified_at' => $currentDate
			);
			$this->db->insert('tbl_user_partner', $data);
			$this->db->insert('tbl_user_family', $data);
			$this->db->insert('tbl_user_education', $data);

			$dataType = "succcess";
			$message = "Success";
		}

		$array = array(
			'dataType' => $dataType,
			'message' => $message
		);
		return $array;
	}

	function getAnnualIncome($dataId){
		$tbl = $this->getTables("annualIncome");
		$tblName = $tbl["name"];
		if($dataId == "All"){
			$query = $this->db->get($tblName);
		} else {
			$query = $this->db->get_where($tblName, array($tbl["id"] => $dataId));
		}
		$row = $query->result();
		return $row;
	}

	function saveAnnualIncome($action, $editId, $annualIncome){
		$tblNameObj = $this->getTables("annualIncome");
		$tblName = $tblNameObj["name"];
		if($action == "Add") {
			$query = $this->db->get_where($tblName, array('annual_income' => $annualIncome));
			$row = $query->result();
			if(count($row) == 0){
				date_default_timezone_set("Asia/Calcutta");
				$date = date('Y-m-d H:i:s');
				$data = array();
				$data["annual_income"] = $annualIncome;
				$data["created_at"] = $date;
				$this->db->insert($tblName, $data);
				return "success";
			} else {
				return "exist";
			}
		} else if($action == "Edit") {
			$query = $this->db->get_where($tblName, array('annual_income' => $annualIncome));
			$insertValid = false;
			if ($query->num_rows() == 0){
				$insertValid = true;
			} else if ($query->num_rows() == 1){
				$row = $query->row();
				if($row->annual_income_id != $editId){
					return "exist";
				} else {
					$insertValid = true;
				}
			} else {
				$insertValid = true;
			}
			if($insertValid){
				$this->db->set('annual_income', $annualIncome);
				$this->db->where('annual_income_id', $editId);
				$this->db->update($tblName); // gi

				return "success";
			}
			return "exist";
		}
		return "error";
	}


	function getStar($dataId, $raasi){
		$tbl = $this->getTables("star");
		$tblName = $tbl["name"];
		if($raasi != ""){
			$query = $this->db->get_where($tblName, array('raasi_id' => $raasi));
		} else if($dataId != "") {
			$query = $this->db->get_where($tblName, array($tbl["id"] => $dataId));
		}
		$row = $query->result();
		return $row;
	}

	function saveStar($action, $editId, $starName, $raasi){
		$tbl = $this->getTables("star");
		$tblName = $tbl["name"];
		if($action == "Add") {
			$query = $this->db->get_where($tblName, array('star_name' => $starName, 'raasi_id'=> $raasi));
			$row = $query->result();
			if(count($row) == 0){
				date_default_timezone_set("Asia/Calcutta");
				$date = date('Y-m-d H:i:s');
				$data = array();
				$data["star_name"] = $starName;
				$data["raasi_id"] = $raasi;
				$data["created_at"] = $date;
				$this->db->insert($tblName, $data);
				return "success";
			} else {
				return "exist";
			}
		} else if($action == "Edit") {
			$query = $this->db->get_where($tblName, array('star_name' => $starName, 'raasi_id'=> $raasi));
			$insertValid = false;
			if ($query->num_rows() == 0){
				$insertValid = true;
			} else if ($query->num_rows() == 1){
				$row = $query->row();
				if($row->star_id != $editId){
					return "exist";
				} else {
					$insertValid = true;
				}
			} else {
				$insertValid = true;
			}
			if($insertValid){
				$this->db->set('star_name', $starName);
				$this->db->set('raasi_id', $raasi);
				$this->db->where($tbl["id"], $editId);
				$this->db->update($tblName); // gi

				return "success";
			}
			return "exist";
		}
		return "error";
	}


	function getRaasi($dataId){
		$tbl = $this->getTables("raasi");
		$tblName = $tbl["name"];
		if($dataId == "All"){
			$query = $this->db->get($tblName);
		} else {
			$query = $this->db->get_where($tblName, array($tbl["id"] => $dataId));
		}
		$row = $query->result();
		return $row;
	}

	function saveRaasi($action, $editId, $raasiName){
		$tblNameObj = $this->getTables("raasi");
		$tblName = $tblNameObj["name"];
		if($action == "Add") {
			$query = $this->db->get_where($tblName, array('raasi_name' => $raasiName));
			$row = $query->result();
			if(count($row) == 0){
				date_default_timezone_set("Asia/Calcutta");
				$date = date('Y-m-d H:i:s');
				$data = array();
				$data["raasi_name"] = $raasiName;
				$data["created_at"] = $date;
				$this->db->insert($tblName, $data);
				return "success";
			} else {
				return "exist";
			}
		} else if($action == "Edit") {
			$query = $this->db->get_where($tblName, array('raasi_name' => $raasiName));
			$insertValid = false;
			if ($query->num_rows() == 0){
				$insertValid = true;
			} else if ($query->num_rows() == 1){
				$row = $query->row();
				if($row->raasi_id != $editId){
					return "exist";
				} else {
					$insertValid = true;
				}
			} else {
				$insertValid = true;
			}
			if($insertValid){
				$this->db->set('raasi_name', $raasiName);
				$this->db->where('raasi_id', $editId);
				$this->db->update($tblName); // gi

				return "success";
			}
			return "exist";
		}
		return "error";
	}

	function getCity($dataId, $state){
		$tbl = $this->getTables("city");
		$tblName = $tbl["name"];
		if($state != ""){
			$query = $this->db->get_where($tblName, array('state_id' => $state));
		} else if($dataId != "") {
			$query = $this->db->get_where($tblName, array($tbl["id"] => $dataId));
		}
		$row = $query->result();
		return $row;
	}

	function saveCity($action, $editId, $state, $country, $cityName){
		$tbl = $this->getTables("city");
		$tblName = $tbl["name"];
		if($action == "Add") {
			$query = $this->db->get_where($tblName, array('city_name' => $cityName, 'country_id'=> $country, 'state_id'=> $state));
			$row = $query->result();
			if(count($row) == 0){
				date_default_timezone_set("Asia/Calcutta");
				$date = date('Y-m-d H:i:s');
				$data = array();
				$data["city_name"] = $cityName;
				$data["state_id"] = $state;
				$data["country_id"] = $country;
				$data["created_at"] = $date;
				$this->db->insert($tblName, $data);
				return "success";
			} else {
				return "exist";
			}
		} else if($action == "Edit") {
			$query = $this->db->get_where($tblName, array('city_name' => $cityName, 'country_id'=> $country, 'state_id'=> $state));
			$insertValid = false;
			if ($query->num_rows() == 0){
				$insertValid = true;
			} else if ($query->num_rows() == 1){
				$row = $query->row();
				if($row->city_id != $editId){
					return "exist";
				} else {
					$insertValid = true;
				}
			} else {
				$insertValid = true;
			}
			if($insertValid){
				$this->db->set('city_name', $cityName);
				$this->db->set('state_id', $state);
				$this->db->set('country_id', $country);
				$this->db->where($tbl["id"], $editId);
				$this->db->update($tblName); // gi

				return "success";
			}
			return "exist";
		}
		return "error";
	}

	function getSubCaste($dataId, $caste){
		$tbl = $this->getTables("subCaste");
		$tblName = $tbl["name"];
		if($caste != ""){
			if(strpos($caste, ',') !== false){
				$query = $this->db->query("select * from $tblName where caste_id in (".$caste.")");
			} else {
				$query = $this->db->get_where($tblName, array('caste_id' => $caste));
			}
		} else if($dataId == "All") {
			$query = $this->db->get_where($tblName);
		} else if($dataId != "") {
			$query = $this->db->get_where($tblName, array($tbl["id"] => $dataId));
		}
		$row = $query->result();
		return $row;
	}

	function saveSubCaste($action, $editId, $caste, $religion, $subCasteName){
		$tbl = $this->getTables("subCaste");
		$tblName = $tbl["name"];
		if($action == "Add") {
			$query = $this->db->get_where($tblName, array('sub_caste_name' => $subCasteName, 'religion_id'=> $religion, 'caste_id' => $caste));
			$row = $query->result();
			if(count($row) == 0){
				date_default_timezone_set("Asia/Calcutta");
				$date = date('Y-m-d H:i:s');
				$data = array();
				$data["sub_caste_name"] = $subCasteName;
				$data["caste_id"] = $caste;
				$data["religion_id"] = $religion;
				$data["created_at"] = $date;
				$this->db->insert($tblName, $data);
				return "success";
			} else {
				return "exist";
			}
		} else if($action == "Edit") {
			$query = $this->db->get_where($tblName, array('sub_caste_name' => $subCasteName, 'religion_id'=> $religion, 'caste_id' => $caste));
			$insertValid = false;
			if ($query->num_rows() == 0){
				$insertValid = true;
			} else if ($query->num_rows() == 1){
				$row = $query->row();
				if($row->sub_caste_id != $editId){
					return "exist";
				} else {
					$insertValid = true;
				}
			} else {
				$insertValid = true;
			}
			if($insertValid){
				$this->db->set('sub_caste_name', $subCasteName);
				$this->db->set('caste_id', $caste);
				$this->db->set('religion_id', $religion);
				$this->db->where($tbl["id"], $editId);
				$this->db->update($tblName); // gi

				return "success";
			}
			return "exist";
		}
		return "error";
	}

	function getOccupation($dataId, $occupationCategory){
		$tbl = $this->getTables("occupation");
		$tblName = $tbl["name"];
		if($occupationCategory != ""){
			$query = $this->db->get_where($tblName, array('occupation_category_id' => $occupationCategory));
		} else if($dataId != "") {
			$query = $this->db->get_where($tblName, array($tbl["id"] => $dataId));
		}  else if($dataId == "All"){
			$query = $this->db->get($tblName);
		}
		$row = $query->result();
		return $row;
	}

	function saveOccupation($action, $editId, $occupationName, $occupationCategory){
		$tbl = $this->getTables("occupation");
		$tblName = $tbl["name"];
		if($action == "Add") {
			$query = $this->db->get_where($tblName, array('occupation_name' => $occupationName, 'occupation_category_id' => $occupationCategory));
			$row = $query->result();
			if(count($row) == 0){
				date_default_timezone_set("Asia/Calcutta");
				$date = date('Y-m-d H:i:s');
				$data = array();
				$data["occupation_name"] = $occupationName;
				$data["occupation_category_id"] = $occupationCategory;
				$data["created_at"] = $date;
				$this->db->insert($tblName, $data);
				return "success";
			} else {
				return "exist";
			}
		} else if($action == "Edit") {
			$query = $this->db->get_where($tblName, array('occupation_name' => $occupationName, 'occupation_category_id' => $occupationCategory));
			$insertValid = false;
			if ($query->num_rows() == 0){
				$insertValid = true;
			} else if ($query->num_rows() == 1){
				$row = $query->row();
				if($row->occupation_id != $editId){
					return "exist";
				} else {
					$insertValid = true;
				}
			} else {
				$insertValid = true;
			}
			if($insertValid){
				$this->db->set('occupation_name', $occupationName);
				$this->db->set('occupation_category_id', $occupationCategory);
				$this->db->where($tbl["id"], $editId);
				$this->db->update($tblName); // gi

				return "success";
			}
			return "exist";
		}
		return "error";
	}

	function getEducation($dataId, $educationCategory){
		$tbl = $this->getTables("education");
		$tblName = $tbl["name"];
		if($educationCategory != ""){
			$query = $this->db->get_where($tblName, array('education_category_id' => $educationCategory));
		} else if($dataId != "") {
			$query = $this->db->get_where($tblName, array($tbl["id"] => $dataId));
		}  else if($dataId == "All"){
			$query = $this->db->get($tblName);
		}
		$row = $query->result();
		return $row;
	}

	function saveEducation($action, $editId, $educationName, $educationCategory){
		$tbl = $this->getTables("education");
		$tblName = $tbl["name"];
		if($action == "Add") {
			$query = $this->db->get_where($tblName, array('education_name' => $educationName, 'education_category_id' => $educationCategory));
			$row = $query->result();
			if(count($row) == 0){
				date_default_timezone_set("Asia/Calcutta");
				$date = date('Y-m-d H:i:s');
				$data = array();
				$data["education_name"] = $educationName;
				$data["education_category_id"] = $educationCategory;
				$data["created_at"] = $date;
				$this->db->insert($tblName, $data);
				return "success";
			} else {
				return "exist";
			}
		} else if($action == "Edit") {
			$query = $this->db->get_where($tblName, array('education_name' => $educationName, 'education_category_id' => $educationCategory));
			$insertValid = false;
			if ($query->num_rows() == 0){
				$insertValid = true;
			} else if ($query->num_rows() == 1){
				$row = $query->row();
				if($row->education_id != $editId){
					return "exist";
				} else {
					$insertValid = true;
				}
			} else {
				$insertValid = true;
			}
			if($insertValid){
				$this->db->set('education_name', $educationName);
				$this->db->set('education_category_id', $educationCategory);
				$this->db->where($tbl["id"], $editId);
				$this->db->update($tblName); // gi

				return "success";
			}
			return "exist";
		}
		return "error";
	}

	function getCaste($dataId, $religion){
		$tbl = $this->getTables("caste");
		$tblName = $tbl["name"];
		if($religion != ""){
			$query = $this->db->get_where($tblName, array('religion_id' => $religion));
		}  else if($dataId == "All"){
			$query = $this->db->get($tblName);
		} else if($dataId != "") {
			$query = $this->db->get_where($tblName, array($tbl["id"] => $dataId));
		}
		$row = $query->result();
		return $row;
	}

	function saveCaste($action, $editId, $casteName, $religion){
		$tbl = $this->getTables("caste");
		$tblName = $tbl["name"];
		if($action == "Add") {
			$query = $this->db->get_where($tblName, array('caste_name' => $casteName, 'religion_id' => $religion));
			$row = $query->result();
			if(count($row) == 0){
				date_default_timezone_set("Asia/Calcutta");
				$date = date('Y-m-d H:i:s');
				$data = array();
				$data["caste_name"] = $casteName;
				$data["religion_id"] = $religion;
				$data["created_at"] = $date;
				$this->db->insert($tblName, $data);
				return "success";
			} else {
				return "exist";
			}
		} else if($action == "Edit") {
			$query = $this->db->get_where($tblName, array('caste_name' => $casteName, 'religion_id' => $religion));
			$insertValid = false;
			if ($query->num_rows() == 0){
				$insertValid = true;
			} else if ($query->num_rows() == 1){
				$row = $query->row();
				if($row->caste_id != $editId){
					return "exist";
				} else {
					$insertValid = true;
				}
			} else {
				$insertValid = true;
			}
			if($insertValid){
				$this->db->set('caste_name', $casteName);
				$this->db->set('religion_id', $religion);
				$this->db->where($tbl["id"], $editId);
				$this->db->update($tblName); // gi

				return "success";
			}
			return "exist";
		}
		return "error";
	}

	function getState($dataId, $country){
		$tbl = $this->getTables("state");
		$tblName = $tbl["name"];
		if($country != ""){
			$query = $this->db->get_where($tblName, array('country_id' => $country));
		} else if($dataId == "All"){
			$query = $this->db->get($tblName);
		} else if($dataId != "") {
			$query = $this->db->get_where($tblName, array($tbl["id"] => $dataId));
		}
		$row = $query->result();
		return $row;
	}

	function saveState($action, $editId, $stateName, $country){
		$tbl = $this->getTables("state");
		$tblName = $tbl["name"];
		if($action == "Add") {
			$query = $this->db->get_where($tblName, array('state_name' => $stateName, 'country_id'=> $country));
			$row = $query->result();
			if(count($row) == 0){
				date_default_timezone_set("Asia/Calcutta");
				$date = date('Y-m-d H:i:s');
				$data = array();
				$data["state_name"] = $stateName;
				$data["country_id"] = $country;
				$data["created_at"] = $date;
				$this->db->insert($tblName, $data);
				return "success";
			} else {
				return "exist";
			}
		} else if($action == "Edit") {
			$query = $this->db->get_where($tblName, array('state_name' => $stateName, 'country_id'=> $country));
			$insertValid = false;
			if ($query->num_rows() == 0){
				$insertValid = true;
			} else if ($query->num_rows() == 1){
				$row = $query->row();
				if($row->state_id != $editId){
					return "exist";
				} else {
					$insertValid = true;
				}
			} else {
				$insertValid = true;
			}
			if($insertValid){
				$this->db->set('state_name', $stateName);
				$this->db->set('country_id', $country);
				$this->db->where($tbl["id"], $editId);
				$this->db->update($tblName); // gi

				return "success";
			}
			return "exist";
		}
		return "error";
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
