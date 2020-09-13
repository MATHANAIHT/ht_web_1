<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="<?php echo base_url("assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/plugins/select2/css/select2.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/select2-bootstrap4-theme/select2-bootstrap4.min.css"); ?>">
<style>
	.select2-container .select2-selection--single{
		height: auto;
	}
	.select2-container--default .select2-selection--single .select2-selection__arrow b {
		margin-top : 4px
	}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?php echo $title; ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
						<li class="breadcrumb-item active"><?php echo $title; ?></li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Personal Info</h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i
										class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="card-body p-0">
							<ul class="nav nav-pills flex-column">
								<li class="nav-item active">
									<a href="#" class="nav-link" onclick="editAction(1)">
										<i class="fas fa-inbox"></i> Basic Details
										<span class="badge bg-primary float-right">12</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link" onclick="editAction(2)">
										<i class="far fa-envelope"></i> Religion Information
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link" onclick="editAction(3)">
										<i class="far fa-file-alt"></i> Location
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link" onclick="editAction(4)">
										<i class="fas fa-filter"></i> Professional Information
										<span class="badge bg-warning float-right">65</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link" onclick="editAction(5)">
										<i class="far fa-trash-alt"></i> Family Details
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link" onclick="editAction(6)">
										<i class="far fa-trash-alt"></i> Change Password
									</a>
								</li>
							</ul>
						</div>
						<!-- /.card-body -->
					</div>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Partner Preference</h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i
										class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="card-body p-0">
							<ul class="nav nav-pills flex-column">
								<li class="nav-item active">
									<a href="#" class="nav-link" onclick="editAction(7)">
										<i class="fas fa-inbox"></i> Basic & Religion Preferences
										<span class="badge bg-primary float-right">12</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link" onclick="editAction(8)">
										<i class="far fa-envelope"></i> Professional Preferences
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link" onclick="editAction(9)">
										<i class="far fa-file-alt"></i> Location Preferences
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link" onclick="editAction(10)">
										<i class="fas fa-filter"></i> What I am looking for
										<span class="badge bg-warning float-right">65</span>
									</a>
								</li>
							</ul>
						</div>
						<!-- /.card-body -->
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card card-primary card-outline">
						<div class="card-header" id="EditActionHeader">
						</div>
						<div class="card-body">
							<input type="hidden" name="formId" value="1">
							<div id="edit1">
								<form name="formId1" id="formId1">
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px;padding-top: 5px">Profile
													created for</label>
											</div>
											<div class="col-8">
												<select name="profileCreatedFor" id="profileCreatedFor"
														class="form-control select2" style="width: 100%;">
													<option value="">Profile created for</option>
													<option value="Myself">Myself</option>
													<option value="Son">Son</option>
													<option value="Daughter">Daughter</option>
													<option value="Brother">Brother</option>
													<option value="Sister">Sister</option>
													<option value="Relative">Relative</option>
													<option value="Friend">Friend</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Name"
													   style="padding-left: 10px;padding-top: 5px">Name:</label>
											</div>
											<div class="col-8">
												<input type="Name" class="form-control" id="fullName" name="fullName"
													   class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px;padding-top: 5px">Date of
													Birth</label>
											</div>
											<div class="col-8">
												<div class="row">
													<div class="col-4 text-center">
														<select name="dateOfBirth3" id="dateOfBirth3"
																class="form-control">
															<option value="">Year</option>
														</select>
													</div>
													<div class="col-4 text-center">
														<select name="dateOfBirth2" id="dateOfBirth2"
																class="form-control">
															<option value="">Month</option>
															<option value="1">Jan</option>
															<option value="2">Feb</option>
															<option value="3">Mar</option>
															<option value="4">Apr</option>
															<option value="5">May</option>
															<option value="6">Jun</option>
															<option value="7">Jul</option>
															<option value="8">Aug</option>
															<option value="9">Sep</option>
															<option value="10">Oct</option>
															<option value="11">Nov</option>
															<option value="12">Dec</option>
														</select>
													</div>
													<div class="col-4 text-center">
														<select name="dateOfBirth1" id="dateOfBirth1"
																class="form-control">
															<option value="">Date</option>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Height"
													   style="padding-left: 10px;padding-top: 5px">Height</label>
											</div>
											<div class="col-8">
												<select name="Height" id="Height" class="form-control select2"
														style="width: 100%;">
													<option value="">Select</option>
													<?php echo  personHeightOptions(); ?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Weight"
													   style="padding-left: 10px;padding-top: 5px">Weight</label>
											</div>
											<div class="col-8">
												<select name="Weight" id="Weight" class="form-control select2"
														style="width: 100%;">
													<option value="">Select</option>
													<?php
														for($i=40; $i<150; $i++){
															echo "<option value=\"$i\">$i Kg</option>";
														}
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px;padding-top: 5px">Marital
													Status</label>
											</div>
											<div class="col-8">
												<select name="maritalStatus" id="maritalStatus"
														class="form-control select2" style="width: 100%;">
													<option value="">Select</option>
													<option value="NeverMarried">Never Married</option>
													<option value="Widowed">Widowed</option>
													<option value="Divorced">Divorced</option>
													<option value="AwaitingDivorce">Awaiting divorce</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px; padding-top: 5px">Mother
													Tongue</label>
											</div>
											<div class="col-8">
												<select name="motherTongue" id="motherTongue"
														class="form-control select2" style="width: 100%;">
													<option value="">Select</option>
													<?php
													for($i=0; $i<count($motherTongueList); $i++){
														echo "<option value=\"".$motherTongueList[$i]['mother_tongue_id']."\">".$motherTongueList[$i]['mother_tongue_name']."</option>";
													}
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group" style="margin-top: 1rem;">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px;"> Body Type</label>
											</div>
											<div class="col-8">
												<div class="clearfix">
													<div class="icheck-primary d-inline">
														<input type="radio" id="BodyType1" name="BodyType" value="Slim">
														<label for="BodyType1">
															Slim&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="BodyType2" name="BodyType"
															   value="Athletic">
														<label for="BodyType2">
															Athletic&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="BodyType3" name="BodyType"
															   value="Average">
														<label for="BodyType3">
															Average&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="BodyType4" name="BodyType"
															   value="Heavy">
														<label for="BodyType4">
															Heavy
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group" style="margin-top: 1rem;">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px;">Physical Status</label>
											</div>
											<div class="col-8">
												<div class="clearfix">
													<div class="icheck-primary d-inline">
														<input type="radio" id="PhysicalStatus1" name="PhysicalStatus"
															   value="Normal">
														<label for="PhysicalStatus1">
															Normal&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="PhysicalStatus2" name="PhysicalStatus"
															   value="Physically Challenged">
														<label for="PhysicalStatus2">
															Physically Challenged
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group" style="margin-top: 1rem;">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px;"> Eating Habits</label>
											</div>
											<div class="col-8">
												<div class="clearfix">
													<div class="icheck-primary d-inline">
														<input type="radio" id="EatingHabits1" name="EatingHabits"
															   value="Vegetarian">
														<label for="EatingHabits1">
															Vegetarian&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="EatingHabits2" name="EatingHabits"
															   value="Non Vegetarian">
														<label for="EatingHabits2">
															Non Vegetarian&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="EatingHabits3" name="EatingHabits"
															   value="Eggetarian">
														<label for="EatingHabits3">
															Eggetarian
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group" style="margin-top: 1rem;">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px;"> Drinking Habits</label>
											</div>
											<div class="col-8">
												<div class="clearfix">
													<div class="icheck-primary d-inline">
														<input type="radio" id="DrinkingHabits1" name="DrinkingHabits"
															   value="No">
														<label for="DrinkingHabits1">
															No&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="DrinkingHabits3" name="DrinkingHabits"
															   value="Yes">
														<label for="DrinkingHabits3">
															Yes&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="DrinkingHabits2" name="DrinkingHabits"
															   value="Drinks Socially">
														<label for="DrinkingHabits2">
															Drinks Socially
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group" style="margin-top: 1rem;">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px;"> Smoking Habits </label>
											</div>
											<div class="col-8">
												<div class="clearfix">
													<div class="icheck-primary d-inline">
														<input type="radio" id="SmokingHabits1" name="SmokingHabits"
															   value="No">
														<label for="SmokingHabits1">
															No&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="SmokingHabits3" name="SmokingHabits"
															   value="Yes">
														<label for="SmokingHabits3">
															Yes&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="SmokingHabits2" name="SmokingHabits"
															   value="Occasionally">
														<label for="SmokingHabits2">
															Occasionally
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div id="edit2">
								<form name="formId2" id="formId2">
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Name"
													   style="padding-left: 10px;padding-top: 5px">Religion</label>
											</div>
											<div class="col-8">
												<select name="religion" id="religion" class="form-control select2"
														style="width: 100%;">
													<option value="">Select</option>
													<?php
														for($i=0; $i<count($religionList); $i++){
															echo "<option value=\"".$religionList[$i]['religion_id']."\">".$religionList[$i]['religion_name']."</option>";
														}
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Caste"
													   style="padding-left: 10px; padding-top: 5px">Caste</label>
											</div>
											<div class="col-8">
												<select name="caste" id="caste" class="form-control select2"
														style="width: 100%;">
													<option value="">Select</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="SubCaste" style="padding-left: 10px; padding-top: 5px">Sub
													Caste</label>
											</div>
											<div class="col-8">
												<select name="SubCaste" id="SubCaste" class="form-control select2"
														style="width: 100%;">
													<option value="">Select</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Name"
													   style="padding-left: 10px; padding-top: 5px">Gothra(m)</label>
											</div>
											<div class="col-8">
												<input type="text" name="Gothram" class="form-control" id="Gothram"
													   class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Raasi"
													   style="padding-left: 10px; padding-top: 5px">Raasi</label>
											</div>
											<div class="col-8">
												<select name="Raasi" id="Raasi" class="form-control select2"
														style="width: 100%;">
													<option value="">Select</option>
													<?php
													for($i=0; $i<count($rassiList); $i++){
														echo "<option value=\"".$rassiList[$i]['raasi_id']."\">".$rassiList[$i]['raasi_name']."</option>";
													}
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Star"
													   style="padding-left: 10px; padding-top: 5px">Star</label>
											</div>
											<div class="col-8">
												<select name="Star" id="Star" class="form-control select2" style="width: 100%;">
													<option value="">Select</option>

												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px;padding-top: 5px"> Have
													Dosham? : </label>
											</div>
											<div class="col-8">
												<div class="form-group clearfix" style="padding-top: 10px">
													<div class="icheck-primary d-inline">
														<input type="radio" id="HaveDosham1" name="HaveDosham"
															   value="No">
														<label for="HaveDosham1">
															No
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="HaveDosham3" name="HaveDosham"
															   value="Yes">
														<label for="HaveDosham3">
															Yes
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="HaveDosham2" name="HaveDosham"
															   value="Don't Know">
														<label for="HaveDosham2">
															Don't Know
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div id="edit3">
								<form name="formId3" id="formId3">
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Country" style="padding-left: 10px; padding-top: 5px">Country</label>
											</div>
											<div class="col-8">
												<select name="country" id="country" class="form-control select2"
														style="width: 100%;">
													<option value="">Select</option>
													<?php
													for($i=0; $i<count($countryList); $i++){
														echo "<option value=\"".$countryList[$i]['country_id']."\">".$countryList[$i]['country_name']."</option>";
													}
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="State"
													   style="padding-left: 10px; padding-top: 5px">State</label>
											</div>
											<div class="col-8">
												<select name="state" id="state" class="form-control select2"
														style="width: 100%;">
													<option value="">Select</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="City"
													   style="padding-left: 10px; padding-top: 5px">City</label>
											</div>
											<div class="col-8">
												<select name="city" id="city" class="form-control select2"
														style="width: 100%;">
													<option value="">Select</option>
												</select>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div id="edit4">
								<form name="formId4" id="formId4">
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="HighestEducation"
													   style="padding-left: 10px;padding-top: 5px"> Highest Education:
													* </label>
											</div>
											<div class="col-8">
												<?php

												function getEducation($educationList){
													$r = "";
													$headerEduArray = array();
													for($i=0; $i<count($educationList); $i++){
														if(in_array( $educationList[$i]['education_category_name'], $headerEduArray)){
															$r.="<option value=\"".$educationList[$i]['education_id']."\">&nbsp;&nbsp;&nbsp;".$educationList[$i]['education_name']."</option>";
														} else {
															$r.="<option disabled>".$educationList[$i]['education_category_name']."</option>";
															$r.="<option value=\"".$educationList[$i]['education_id']."\">&nbsp;&nbsp;&nbsp;".$educationList[$i]['education_name']."</option>";
															array_push($headerEduArray, $educationList[$i]['education_category_name']);
														}
													}
													return $r;
												}
												?>

												<select name="HighestEducation" id="HighestEducation"
														class="form-control select2" style="width: 100%;">
													<option value="">Select Education</option>
													<?php echo getEducation($educationList); ?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="EducationInDetail"
													   style="padding-left: 10px; padding-top: 5px"> Education in Detail
													: </label>
											</div>
											<div class="col-8">
												<input type="text" name="EducationInDetail" class="form-control"
													   id="EducationInDetail" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="CollegeOrInstitution"
													   style="padding-left: 10px; padding-top: 5px"> College /
													Institution : </label>
											</div>
											<div class="col-8">
												<input type="text" name="CollegeOrInstitution" class="form-control"
													   id="CollegeOrInstitution" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="EmployedIn" style="padding-left: 10px;padding-top: 5px">
													Employed in: * </label>
											</div>
											<div class="col-8">
												<select name="EmployedIn" id="EmployedIn" class="form-control select2"
														style="width: 100%;">
													<option value="">Select EmployedIn</option>
													<?php
														for($i=0; $i<count($employedInList); $i++){
															echo "<option value=\"".$employedInList[$i]['employed_in_id']."\">".$employedInList[$i]['employed_in_name']."</option>";
														}
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Occupation" style="padding-left: 10px;padding-top: 5px">
													Occupation: * </label>
											</div>
											<div class="col-8">
												<?php
												function getOccupation($occupationList){
													$headerOccuArray = array();
													$r = "";
													for($i=0; $i<count($occupationList); $i++){
														if(in_array( $occupationList[$i]['occupation_category_name'], $headerOccuArray)){
															$r.="<option value=\"".$occupationList[$i]['occupation_id']."\">&nbsp;&nbsp;&nbsp;".$occupationList[$i]['occupation_name']."</option>";
														} else {
															$r.="<option disabled>".$occupationList[$i]['occupation_category_name']."</option>";
															$r.="<option value=\"".$occupationList[$i]['occupation_id']."\">&nbsp;&nbsp;&nbsp;".$occupationList[$i]['occupation_name']."</option>";
															array_push($headerOccuArray, $occupationList[$i]['occupation_category_name']);
														}
													}
													return $r;
												}
												?>
												<select name="Occupation" id="Occupation" class="form-control select2"
														style="width: 100%;">
													<option value="">Select Occupation</option>
													<?php echo getOccupation($occupationList); ?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="OccupationInDetail"
													   style="padding-left: 10px; padding-top: 5px"> Occupation in
													Detail : </label>
											</div>
											<div class="col-8">
												<input type="text" name="OccupationInDetail" class="form-control"
													   id="OccupationInDetail" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Organization" style="padding-left: 10px; padding-top: 5px">
													Organization : </label>
											</div>
											<div class="col-8">
												<input type="text" name="Organization" class="form-control"
													   id="Organization" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="AnnualIncome" style="padding-left: 10px;padding-top: 5px">
													Annual Income : * </label>
											</div>
											<div class="col-8">
												<select name="AnnualIncome" id="AnnualIncome"
														class="form-control select2" style="width: 100%;">
													<option value="">Select AnnualIncome</option>
													<?php
														for($i=0; $i<count($annualIncomeList); $i++){
															echo "<option value=\"".$annualIncomeList[$i]['annual_income_id']."\">".$annualIncomeList[$i]['annual_income']."</option>";
														}
													?>
												</select>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div id="edit5">
								<form name="formId5" id="formId5">
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="FamilyValue" style="padding-left: 10px;padding-top: 5px">Family Value *</label>
											</div>
											<div class="col-8">
												<div class="clearfix">
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyValue1" name="FamilyValue"
															   value="Orthodox">
														<label for="FamilyValue1">
															Orthodox&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyValue2" name="FamilyValue"
															   value="Traditional">
														<label for="FamilyValue2">
															Traditional&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyValue3" name="FamilyValue"
															   value="Moderate">
														<label for="FamilyValue3">
															Moderate&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyValue4" name="FamilyValue"
															   value="Liberal">
														<label for="FamilyValue4">
															Liberal
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="FamilyType" style="padding-left: 10px;padding-top: 5px">Family Type *</label>
											</div>
											<div class="col-8">
												<div class="clearfix">
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyType1" name="FamilyType"
															   value="Joint Family">
														<label for="FamilyType1">
															Joint Family&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyType2" name="FamilyType"
															   value="Nuclear Family">
														<label for="FamilyType2">
															Nuclear Family&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyType3" name="FamilyType"
															   value="Others">
														<label for="FamilyType3">
															Others
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="FamilyStatus" style="padding-left: 10px;padding-top: 5px">Family Status *</label>
											</div>
											<div class="col-8">
												<div class="clearfix">
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyStatus1" name="FamilyStatus"
															   value="Middle Class">
														<label for="FamilyStatus1">
															Middle Class&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyStatus2" name="FamilyStatus"
															   value="Upper Middle Class">
														<label for="FamilyStatus2">
															Upper Middle Class&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyStatus3" name="FamilyStatus"
															   value="Rich">
														<label for="FamilyStatus3">
															Rich&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyStatus4" name="FamilyStatus"
															   value="Affluent">
														<label for="FamilyStatus4">
															Affluent
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px; padding-top: 5px">Father's
													Occupation</label>
											</div>
											<div class="col-8">
												<select name="FathersOccupation" id="FathersOccupation" class="form-control select2" style="width: 100%;">
													<option value="">Select</option>
													<?php echo getOccupation($occupationList); ?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px; padding-top: 5px">Mother's
													Occupation</label>
											</div>
											<div class="col-8">
												<select name="MothersOccupation" id="MothersOccupation" class="form-control select2" style="width: 100%;">
													<option value="">Select</option>
													<?php echo getOccupation($occupationList); ?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-3">
												<label for="Name" style="padding-left: 10px; padding-top: 5px">No.of
													Brothers</label>
											</div>
											<div class="col-3">
												<label for="Name" style="padding-left: 10px; padding-top: 5px">Brothers
													Married</label>
											</div>
											<div class="col-3">
												<label for="Name" style="padding-left: 10px; padding-top: 5px">No.of
													Sisters</label>
											</div>
											<div class="col-3">
												<label for="Name" style="padding-left: 10px; padding-top: 5px">Sisters
													Married</label>
											</div>
											<div class="col-8">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-3">
												<select name="NoOfBrothers" id="NoOfBrothers" class="form-control select2" style="width: 100%;">
													<option value="0">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3 </option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="7+">7+</option>
												</select>
											</div>
											<div class="col-3">
												<select name="BrothersMarried" id="BrothersMarried" class="form-control select2" style="width: 100%;">
													<option value="None">None</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3 </option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="7+">7+</option>
												</select>
											</div>
											<div class="col-3">
												<select name="NoOfSisters" id="NoOfSisters" class="form-control select2" style="width: 100%;">
													<option value="0">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3 </option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="7+">7+</option>
												</select>
											</div>
											<div class="col-3">
												<select name="SistersMarried" id="SistersMarried" class="form-control select2" style="width: 100%;">
													<option value="None">None</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3 </option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="7+">7+</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px; padding-top: 5px">About My
													Family</label>
											</div>
											<div class="col-8">
												<textarea name="AboutMyFamily" class="form-control" id="AboutMyFamily"
														  class="form-control"></textarea>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div id="edit6">
								<form name="formId6" id="formId6">
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="OldPassword" style="padding-left: 10px; padding-top: 5px">Old Password</label>
											</div>
											<div class="col-8">
												<input type="password" name="OldPassword" class="form-control"
													   id="OldPassword" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="NewPassword" style="padding-left: 10px; padding-top: 5px">New Password</label>
											</div>
											<div class="col-8">
												<input type="password" name="NewPassword" class="form-control"
													   id="NewPassword" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="ConfirmNewPassword" style="padding-left: 10px; padding-top: 5px">Confirm New Password</label>
											</div>
											<div class="col-8">
												<input type="password" name="ConfirmNewPassword" class="form-control"
													   id="ConfirmNewPassword" class="form-control">
											</div>
										</div>
									</div>
								</form>
							</div>
							<div id="edit7">
								<form name="formId7" id="formId7">
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="OldPassword" style="padding-left: 10px;">Preferred Age</label>
											</div>
											<div class="col-8">
												From <select style="width:80px;" name="PStartAge" id="PStartAge" >
													<option value="">From</option>
													<?php
														for($i=18; $i<71; $i++){
															echo "<option value=\"".$i."\">".$i."</option>";
														}
													?>
												</select>
												To <select style="width:80px;" name="PEndAge" id="PEndAge" >
													<option value="">To</option>
													<?php
													for($i=21; $i<71; $i++){
														echo "<option value=\"".$i."\">".$i."</option>";
													}
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="OldPassword" style="padding-left: 10px;">Marital Status</label>
											</div>
											<div class="col-8">
												<div class="clearfix" >
													<div class="icheck-primary d-inline" style="padding-right: 38px">
														<input type="checkbox" id="PMaritalStatus1" name="PMaritalStatus"
															   value="Any">
														<label for="PMaritalStatus1">
															Any
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PMaritalStatus2" name="PMaritalStatus"
															   value="Never Married">
														<label for="PMaritalStatus2">
															Never Married
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PMaritalStatus3" name="PMaritalStatus"
															   value="Divorced">
														<label for="PMaritalStatus3">
															Divorced&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PMaritalStatus4" name="PMaritalStatus"
															   value="Widowed">
														<label for="PMaritalStatus4">
															Widowed
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PMaritalStatus5" name="PMaritalStatus"
															   value="Awaiting divorce">
														<label for="PMaritalStatus5">
															Awaiting divorce
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<?php
										function convert_to_cm($feet, $inches = 0) {
											$inches = ($feet * 12) + $inches;
											return (int) round($inches / 0.393701);
										}
										function personHeightOptions(){
											$r = '';
											for($foot=4;$foot<=7;$foot++){
												for($inches=0;$inches<=($foot==7? 0 : 11);$inches++){
													$cm = convert_to_cm($foot, $inches);
													if($inches==0){
														$r .= "<option value='$cm'> $foot ft / ".convert_to_cm($foot, $inches)." cm</option>";
													}else{
														$r .= "<option value='$cm'> $foot ft $inches ins / ".convert_to_cm($foot, $inches)." cm </option>";
													}
												}
											}
											return $r;
										}
										?>
										<div class="row">
											<div class="col-4">
												<label for="Height" style="padding-left: 10px;">Height</label>
											</div>
											<div class="col-8">
												<select name="fromPHeight" id="fromPHeight">
													<option value="">Height</option>
													<?php echo  personHeightOptions(); ?>
												</select>
												To&nbsp;
												<select name="toPHeight" id="toPHeight">
													<option value="">Height</option>
													<?php echo  personHeightOptions(); ?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="PPhysicalStatus" style="padding-left: 10px;">Physical Status</label>
											</div>
											<div class="col-8">
												<div class="clearfix">
													<div class="icheck-primary d-inline">
														<input type="radio" id="PPhysicalStatus1" name="PPhysicalStatus"
															   value="Normal">
														<label for="PPhysicalStatus1">
															Normal
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="radio" id="PhysicalStatus2" name="PPhysicalStatus"
															   value="PPhysically challenged">
														<label for="PPhysicalStatus2">
															Physically challenged
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="radio" id="PPhysicalStatus3" name="PPhysicalStatus"
															   value="Doesn't matter">
														<label for="PPhysicalStatus3">
															Doesn't matter
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="PEatingHabits" style="padding-left: 10px;">Eating Habits</label>
											</div>
											<div class="col-8">
												<div class="clearfix">

													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PEatingHabits1" name="PEatingHabits"
															   value="Doesn't matter">
														<label for="PEatingHabits1">
															Doesn't matter
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PEatingHabits2" name="PEatingHabits"
															   value="Vegetarian">
														<label for="PEatingHabits2">
															Vegetarian
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PEatingHabits3" name="PEatingHabits"
															   value="Non Vegetarian">
														<label for="PEatingHabits3">
															Non Vegetarian
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PEatingHabits4" name="PEatingHabits"
															   value="Eggetarian">
														<label for="PEatingHabits4">
															Eggetarian
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Height" style="padding-left: 10px;">Drinking Habits</label>
											</div>
											<div class="col-8">
												<div class="clearfix">
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PDrinkingHabits1" name="PDrinkingHabits"
															   value="Doesn't matter">
														<label for="PDrinkingHabits1">
															Doesn't matter
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PDrinkingHabits2" name="PDrinkingHabits"
															   value="Never drinks">
														<label for="PDrinkingHabits2">
															Never drinks
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PDrinkingHabits3" name="PDrinkingHabits"
															   value="Drinks socially">
														<label for="PDrinkingHabits3">
															Drinks socially
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PDrinkingHabits4" name="PDrinkingHabits"
															   value="Drinks regularly">
														<label for="PDrinkingHabits4">
															Drinks regularly
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Height" style="padding-left: 10px;">Smoking Habits</label>
											</div>
											<div class="col-8">
												<div class="clearfix">
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PSmokingHabits1" name="PSmokingHabits"
															   value="Doesn't matter">
														<label for="PSmokingHabits1">
															Doesn't matter
														</label>
													</div>
													<br>
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PSmokingHabits2" name="PSmokingHabits"
															   value="Never smokes">
														<label for="PSmokingHabits2">
															Never smokes
														</label>
													</div>
													<br>
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="SmokingHabits3" name="SmokingHabits"
															   value="Smokes occasionally">
														<label for="SmokingHabits3">
															Smokes occasionally
														</label>
													</div>
													<br>
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PSmokingHabits4" name="PSmokingHabits"
															   value="Smokes regularly">
														<label for="PSmokingHabits4">
															Smokes regularly
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="PMotherTongue" style="padding-left: 10px;">Mother Tongue</label>
											</div>
											<div class="col-8">
												<select name="PMotherTongue" id="PMotherTongue" class="form-control select2" multiple style="width: 100%">
													<option value="">Select</option>
													<option value="Any">Any</option>
													<?php
														for($i=0; $i<count($motherTongueList); $i++){
															echo "<option value=\"".$motherTongueList[$i]['mother_tongue_id']."\">".$motherTongueList[$i]['mother_tongue_name']."</option>";
														}
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="PReligion" style="padding-left: 10px;">Religion</label>
											</div>
											<div class="col-8 align-middle">
												<select name="PReligion" id="PReligion" class="form-control select2" style="width: 100%">
													<option value="">Select</option>
													<option value="Any">Any</option>
													<?php
													for($i=0; $i<count($religionList); $i++){
														echo "<option value=\"".$religionList[$i]['religion_id']."\">".$religionList[$i]['religion_name']."</option>";
													}
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="PCaste" style="padding-left: 10px;">Caste</label>
											</div>
											<div class="col-8">
												<select name="PCaste" id="PCaste" class="form-control select2" style="width: 100%">
													<option value="">Select</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="PSubCaste" style="padding-left: 10px;padding-top: 5px;">Sub Caste</label>
											</div>
											<div class="col-8">
												<select name="PSubCaste" id="PSubCaste" class="form-control select2" style="width: 100%">
													<option value="">Select</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="Dosham" style="padding-left: 10px;">Dosham</label>
											</div>
											<div class="col-8">
												<div class="clearfix">
													<div class="icheck-primary d-inline">
														<input type="radio" id="Dosham1" name="Dosham"
															   value="Yes">
														<label for="Dosham1">
															Yes
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="Dosham2" name="Dosham"
															   value="No">
														<label for="Dosham2">
															No
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="Dosham3" name="Dosham"
															   value="Doesn't matter">
														<label for="Dosham3">
															Doesn't matter
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="PStar" style="padding-left: 10px;">Star</label>
											</div>
											<div class="col-8">
												<select name="PStar" id="PStar" class="form-control select2" style="width: 100%" multiple>
													<option value="">Select</option>
													<option value="Any">Any</option>
													<?php
													for($i=0; $i<count($starList); $i++){
														echo "<option value=\"".$starList[$i]['star_id']."\">".$starList[$i]['star_name']."</option>";
													}
													?>
												</select>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div id="edit8">
								<form name="formId8" id="formId8">
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="PEducation" style="padding-left: 10px;">Education</label>
											</div>
											<div class="col-8">
												<select name="PEducation" id="PEducation" class="form-control select2" style="width: 100%" multiple>
													<option value="">Select</option>
													<option value="Any">Any</option>
													<?php echo getEducation($educationList); ?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="PEmployedIn" style="padding-left: 10px;">Employed In</label>
											</div>
											<div class="col-8">
												<select name="PEmployedIn" id="PEmployedIn" class="form-control select2" style="width: 100%" multiple>
													<option value="">Select</option>
													<?php
													for($i=0; $i<count($employedInList); $i++){
														echo "<option value=\"".$employedInList[$i]['employed_in_id']."\">".$employedInList[$i]['employed_in_name']."</option>";
													}
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="POccupation" style="padding-left: 10px;">Occupation</label>
											</div>
											<div class="col-8">
												<select name="POccupation" id="POccupation" class="form-control select2" style="width: 100%" multiple>
													<option value="">Select</option>
													<option value="Any">Any</option>
													<?php echo  getOccupation($occupationList); ?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="PAnnualIncome" style="padding-left: 10px;">Annual Income</label>
											</div>
											<div class="col-8">
												<select name="PAnnualIncome" id="PAnnualIncome" class="form-control">
													<option value="">Select</option>
													<?php
														for($i=0; $i<count($annualIncomeList); $i++){
															echo "<option value=\"".$annualIncomeList[$i]['annual_income_id']."\">".$annualIncomeList[$i]['annual_income']."</option>";
														}
													?>
												</select>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div id="edit9">
								<form name="formId9" id="formId9"></form>
								<div class="form-group">
									<div class="row">
										<div class="col-4 align-middle">
											<label for="PCountryLivingIn" style="padding-left: 10px;">Country Living In</label>
										</div>
										<div class="col-8">
											<select name="PCountryLivingIn" id="PCountryLivingIn" class="form-control" multiple>
												<option value="">Select</option>
												<option value="Any">Any</option>
												<?php
													for($i=0; $i<count($countryList); $i++){
														echo "<option value=\"".$countryList[$i]['country_id']."\">".$countryList[$i]['country_name']."</option>";
													}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-4 align-middle">
											<label for="PResidingState" style="padding-left: 10px;">Residing State</label>
										</div>
										<div class="col-8">
											<select name="PResidingState" id="PResidingState" class="form-control">
												<option value="">Select</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-4 align-middle">
											<label for="PDistrict" style="padding-left: 10px;">District</label>
										</div>
										<div class="col-8">
											<select name="PDistrict" id="PDistrict" class="form-control">
												<option value="">Select</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-4 align-middle">
											<label for="PCitizenship" style="padding-left: 10px;">Citizenship</label>
										</div>
										<div class="col-8">
											<select name="PCitizenship" id="PCitizenship" class="form-control" multiple>
												<option value="">Select</option>
												<option value="Any">Any</option>
												<?php
												for($i=0; $i<count($countryList); $i++){
													echo "<option value=\"".$countryList[$i]['country_id']."\">".$countryList[$i]['country_name']."</option>";
												}
												?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div id="edit10">
								<form name="formId10" id="formId10">
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="PWhatIAmLookingFor" style="padding-left: 10px;">What I am looking for</label>
											</div>
											<div class="col-8">
												<textarea name="PWhatIAmLookingFor" id="PWhatIAmLookingFor" class="form-control" rows="5"></textarea>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col-10">
								</div>
								<div class="col-2 text-right">
									<input type="button" class="btn btn-primary" value="Save"
										   onclick="saveAction()">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<script src="<?php echo base_url("assets/plugins/select2/js/select2.full.min.js"); ?>"></script>

	<script>
		var headerNames = ["Basic Details", "Religion Information", "Location", "Professional Information", "Family Details", "Change Password", "Basic & Religion Preferences", "Professional Preferences", "Location Preferences", "What I am looking for"]

        let d = new Date();
        let y = d.getFullYear();
        let dayArray=new Array("31","28","31","30","31","30","31","31","30","31","30","31");

        for (j = y-18; j >1950; j--) {
            $("#dateOfBirth3").append("<option value=\""+(j)+"\">"+(j)+"</option>")
        }

        function onChangeYear(val){
            let setMonth = $("#dateOfBirth2").val();
            if(setMonth != ""){
                $("#dateOfBirth1").empty().append("<option value=\"\">Day</option>");
                if(val%4==0 && setMonth==2) {
                    for(var i=1;i<=parseInt((dayArray[setMonth-1]))+1;i++)  {
                        $("#dateOfBirth1").append("<option value=\""+i+"\">"+i+"</option>");
                    }
                }else{
                    for(var i=1;i<=parseInt(dayArray[setMonth-1]);i++)  {
                        $("#dateOfBirth1").append("<option value=\""+i+"\">"+i+"</option>");
                    }
                }
            }else{
                $("#dateOfBirth1").empty().append("<option value=\"\">Day</option>");
                for(var i=1;i<=31;i++)  {
                    $("#dateOfBirth1").append("<option value=\""+i+"\">"+i+"</option>");
                }
            }
        }

        function onChangeMonth(val){
            let setYear = $("#dateOfBirth3").val();
            $("#dateOfBirth1").empty().append("<option value=\"\">Day</option>");
            if(setYear != ""){
                if(setYear%4==0 && val==2) {
                    for(var i=1;i<=parseInt((dayArray[val-1]))+1;i++)  {
                        $("#dateOfBirth1").append("<option value=\""+i+"\">"+i+"</option>");
                    }
                }else{
                    for(var i=1;i<=(dayArray[val-1]);i++)  {
                        $("#dateOfBirth1").append("<option value=\""+i+"\">"+i+"</option>");
                    }
                }
            }else{
                for(var i=1;i<=dayArray[val-1];i++)  {
                    $("#dateOfBirth1").append("<option value=\""+i+"\">"+i+"</option>");
                }
            }
        }

        $(function () {
            editAction(1);

            onChangeMonth(1);

            $('#dateOfBirth3').change(function() {
                onChangeYear($('#dateOfBirth3').val())
            });

            $('#dateOfBirth2').change(function() {
                onChangeMonth($('#dateOfBirth2').val())
            });

            $('#religion').change(function() {
                getCasteList();
            });

            $('#caste').change(function() {
                getSubCasteList();
            });

            $('#Raasi').change(function() {
                getStarList();
            });

            $('#country').change(function() {
                getStateList();
            });

            $('#state').change(function() {
                getCityList();
            });

            $('.select2').select2();

        });

        function getCityList() {
            $.get("/api/city", {state : $('#state').val()}, function(data, status){
                $("#city").empty().append("<option value=\"\">Select</option>");
                data.map(function (d,i) {
                    $("#city").append("<option value=\""+d.city_id+"\">"+d.city_name+"</option>");
                });
            });
        }

        function getStateList() {
            $.get("/api/state", {country : $('#country').val()}, function(data, status){
                $("#state").empty().append("<option value=\"\">Select</option>");
                data.map(function (d,i) {
                    $("#state").append("<option value=\""+d.state_id+"\">"+d.state_name+"</option>");
                });
            });
        }

        function getSubCasteList() {
            $.get("/api/subCaste", { caste : $('#caste').val()}, function(data, status){
                $("#SubCaste").empty().append("<option value=\"\">Select</option>");
                data.map(function (d,i) {
                    $("#SubCaste").append("<option value=\""+d.sub_caste_id+"\">"+d.sub_caste_name+"</option>");
                });
            });
        }

        function getStarList() {
            $.get("/api/star", { raasi : $('#Raasi').val()}, function(data, status){
                $("#Star").empty().append("<option value=\"\">Select</option>");
                data.map(function (d,i) {
                    $("#Star").append("<option value=\""+d.star_id+"\">"+d.star_name+"</option>");
                });
            });
        }

        function editAction(id) {
            let idList = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
            idList.map(i => {
                console.log("id -> " + id + " , i -> " + i)

                if (id == i) {
					$("#edit" + i).show()
					$("#EditActionHeader").html(headerNames[i-1])
                }
                else
                    $("#edit" + i).hide()
            })
        }

        function saveAction(id) {
            let idList = [1, 2, 3, 4, 5, 6];
            idList.map(i => {
                console.log("id -> " + id + " , i -> " + i)

                if (id == i)
                    $("#edit" + i).show()
                else
                    $("#edit" + i).hide()
            })
        }

        function getCasteList() {
            var religion = $('#religion').val();
            if(religion != ""){
                $("#caste").empty().append("<option value=\"\">Select</option>");
                $.get("/api/caste", {religion : religion}, function(data, status){
                    data.map(function (d,i) {
                        $("#caste").append("<option value=\""+d.caste_id+"\">"+d.caste_name+"</option>");
                    });
                });
            }
        }

	</script>

