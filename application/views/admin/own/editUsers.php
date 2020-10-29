<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="<?php echo base_url("assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/plugins/select2/css/select2.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"); ?>">
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
						<?php
							$user = $users[0];
//							print_r($user);
						?>
						<?php
						$date_of_birth = $user->date_of_birth;
						$dobA = mb_split("-", $date_of_birth);
						$dobY = "";
						$dobM = "";
						$dobD = "";
						if(count($dobA) == 3){
							$dobY = $dobA[0];
							$dobM = $dobA[1];
							$dobD = $dobA[2];
						} ?>
						<div class="card-body">
							<input type="hidden" name="formId" id="formId" value="1">
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
													<option value="Myself" <?php if($user->profile_created_by == "Myself") { echo "selected"; }?> >Myself</option>
													<option value="Son" <?php if($user->profile_created_by == "Son") { echo "selected"; }?>>Son</option>
													<option value="Daughter" <?php if($user->profile_created_by == "Daughter") { echo "selected"; }?>>Daughter</option>
													<option value="Brother" <?php if($user->profile_created_by == "Brother") { echo "selected"; }?>>Brother</option>
													<option value="Sister" <?php if($user->profile_created_by == "Sister") { echo "selected"; }?>>Sister</option>
													<option value="Relative" <?php if($user->profile_created_by == "Relative") { echo "selected"; }?>>Relative</option>
													<option value="Friend" <?php if($user->profile_created_by == "Friend") { echo "selected"; }?>>Friend</option>
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
												<input type="Name" class="form-control" id="fullName" name="fullName" class="form-control" value="<?php echo $user->full_name; ?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px;padding-top: 5px">Date of Birth</label>
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
													<?php echo  personHeightOptions($user->height); ?>
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
														if($user->weight == $i){
															echo "<option selected value=\"$i\">$i Kg</option>";
														} else {
															echo "<option value=\"$i\">$i Kg</option>";
														}
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
													<option value="NeverMarried" <?php if($user->marital_status == "NeverMarried") { echo "selected"; }?>>Never Married</option>
													<option value="Widowed" <?php if($user->marital_status == "Widowed") { echo "selected"; }?>>Widowed</option>
													<option value="Divorced" <?php if($user->marital_status == "Divorced") { echo "selected"; }?>>Divorced</option>
													<option value="AwaitingDivorce" <?php if($user->marital_status == "AwaitingDivorce") { echo "selected"; }?>>Awaiting divorce</option>
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
														if($user->mother_tongue == $motherTongueList[$i]['mother_tongue_id']) {
															echo "<option value=\"".$motherTongueList[$i]['mother_tongue_id']."\" selected>".$motherTongueList[$i]['mother_tongue_name']."</option>";
														} else {
															echo "<option value=\"".$motherTongueList[$i]['mother_tongue_id']."\">".$motherTongueList[$i]['mother_tongue_name']."</option>";
														}
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
														<input type="radio" id="BodyType1" name="BodyType" value="Slim" <?php if($user->body_type == "Slim"){ echo "checked"; } ?> >
														<label for="BodyType1">
															Slim&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="BodyType2" name="BodyType" <?php if($user->body_type == "Athletic"){ echo "checked"; } ?>
															   value="Athletic">
														<label for="BodyType2">
															Athletic&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="BodyType3" name="BodyType" <?php if($user->body_type == "Average"){ echo "checked"; } ?>
															   value="Average">
														<label for="BodyType3">
															Average&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="BodyType4" name="BodyType" <?php if($user->body_type == "Heavy"){ echo "checked"; } ?>
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
														<input type="radio" id="PhysicalStatus1" name="PhysicalStatus" <?php if($user->physical_status == "Normal"){ echo "checked"; } ?>
															   value="Normal">
														<label for="PhysicalStatus1">
															Normal&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="PhysicalStatus2" name="PhysicalStatus" <?php if($user->physical_status == "Physically Challenged"){ echo "checked"; } ?>
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
														<input type="radio" id="EatingHabits1" name="EatingHabits" <?php if($user->eating_habits == "Vegetarian"){ echo "checked"; } ?>
															   value="Vegetarian">
														<label for="EatingHabits1">
															Vegetarian&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="EatingHabits2" name="EatingHabits" <?php if($user->eating_habits == "Non Vegetarian"){ echo "checked"; } ?>
															   value="Non Vegetarian">
														<label for="EatingHabits2">
															Non Vegetarian&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="EatingHabits3" name="EatingHabits" <?php if($user->eating_habits == "Eggetarian"){ echo "checked"; } ?>
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
														<input type="radio" id="DrinkingHabits1" name="DrinkingHabits" <?php if($user->drinking_habits == "No"){ echo "checked"; } ?>
															   value="No">
														<label for="DrinkingHabits1">
															No&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="DrinkingHabits3" name="DrinkingHabits" <?php if($user->drinking_habits == "Yes"){ echo "checked"; } ?>
															   value="Yes">
														<label for="DrinkingHabits3">
															Yes&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="DrinkingHabits2" name="DrinkingHabits" <?php if($user->drinking_habits == "Drinks Socially"){ echo "checked"; } ?>
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
														<input type="radio" id="SmokingHabits1" name="SmokingHabits" <?php if($user->smoking_habits == "No"){ echo "checked"; } ?>
															   value="No">
														<label for="SmokingHabits1">
															No&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="SmokingHabits3" name="SmokingHabits" <?php if($user->smoking_habits == "Yes"){ echo "checked"; } ?>
															   value="Yes">
														<label for="SmokingHabits3">
															Yes&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="SmokingHabits2" name="SmokingHabits" <?php if($user->smoking_habits == "Occasionally"){ echo "checked"; } ?>
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
													   style="padding-left: 10px;padding-top: 5px">Religion <?php echo $user->religion; ?></label>
											</div>
											<div class="col-8">
												<select name="religion" id="religion" class="form-control select2"
														style="width: 100%;">
													<option value="">Select</option>
													<?php
													for($i=0; $i<count($religionList); $i++){
														$selected = "";
														if($user->religion == $religionList[$i]['religion_id']){
															$selected = "selected";
														}
														echo "<option $selected value=\"".$religionList[$i]['religion_id']."\">".$religionList[$i]['religion_name']."</option>";
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
												<input value="<?php echo $user->gothra; ?>" type="text" name="Gothram" class="form-control" id="Gothram" class="form-control">
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
														$selected = "";
														if ($user->raasi == $rassiList[$i]['raasi_id']){
															$selected = "selected";
														}
														echo "<option $selected value=\"".$rassiList[$i]['raasi_id']."\">".$rassiList[$i]['raasi_name']."</option>";
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
														<input type="radio" id="HaveDosham1" name="HaveDosham"  <?php if($user->is_chevvai_dosham == "No"){ echo "checked"; } ?>
															   value="No">
														<label for="HaveDosham1">
															No
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="HaveDosham3" name="HaveDosham" <?php if($user->is_chevvai_dosham == "Yes"){ echo "checked"; } ?>
															   value="Yes">
														<label for="HaveDosham3">
															Yes
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="HaveDosham2" name="HaveDosham" <?php if($user->is_chevvai_dosham == "DontKnow"){ echo "checked"; } ?>
															   value="DontKnow">
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
														$selected = "";
														if($user->country == $countryList[$i]['country_id']){
															$selected = "selected";
														}
														echo "<option ".$selected." value=\"".$countryList[$i]['country_id']."\">".$countryList[$i]['country_name']."</option>";
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

												function getEducation($educationList, $selectedId, $type){
													$r = "";
													$headerEduArray = array();
													for($i=0; $i<count($educationList); $i++){
														$selected = "";
														if($selectedId != "" && $selectedId != null && $type == 1){
															if($selectedId==$educationList[$i]['education_id']){
																$selected = "selected";
															}
														} else if($selectedId != "" && $selectedId != null && $type == 2) {
															if(in_array($educationList[$i]['education_id'], $selectedId)) {
																$selected = "selected";
															}
														}


														if(in_array( $educationList[$i]['education_category_name'], $headerEduArray)){
															$r.="<option ".$selected." value=\"".$educationList[$i]['education_id']."\">".$educationList[$i]['education_name']."</option>";
														} else {
															$r.="<option disabled>".$educationList[$i]['education_category_name']."</option>";
															$r.="<option ".$selected." value=\"".$educationList[$i]['education_id']."\">".$educationList[$i]['education_name']."</option>";
															array_push($headerEduArray, $educationList[$i]['education_category_name']);
														}
													}
													return $r;
												}
												?>

												<select name="HighestEducation" id="HighestEducation"
														class="form-control select2" style="width: 100%;">
													<option value="">Select Education</option>
													<?php echo getEducation($educationList, $user->education, "1"); ?>
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
												<input type="text" name="EducationInDetail" class="form-control" value="<?php echo $user->edu_details; ?>"
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
												<input type="text" name="CollegeOrInstitution" class="form-control" value="<?php echo $user->edu_collage; ?>"
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
														$selected = "";
														if($user->employed_in == $employedInList[$i]['employed_in_id']){
															$selected = "selected";
														}
														echo "<option ".$selected." value=\"".$employedInList[$i]['employed_in_id']."\">".$employedInList[$i]['employed_in_name']."</option>";
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
												function getOccupation($occupationList, $selectedId, $type){
													$headerOccuArray = array();
													$r = "";
													for($i=0; $i<count($occupationList); $i++){
														$selected = "";
														if($type == 1 && $selectedId != "" && $selectedId != null){
															if($selectedId == $occupationList[$i]['occupation_id']){
																$selected = "selected";
															}
														} else if($type == 2 && $selectedId != "" && $selectedId != null){
															if(in_array($occupationList[$i]['occupation_id'], $selectedId)) {
																$selected = "selected";
															}
														}

														if(in_array( $occupationList[$i]['occupation_category_name'], $headerOccuArray)){
															$r.="<option ".$selected." value=\"".$occupationList[$i]['occupation_id']."\">".$occupationList[$i]['occupation_name']."</option>";
														} else {
															$r.="<option disabled>".$occupationList[$i]['occupation_category_name']."</option>";
															$r.="<option ".$selected." value=\"".$occupationList[$i]['occupation_id']."\">".$occupationList[$i]['occupation_name']."</option>";
															array_push($headerOccuArray, $occupationList[$i]['occupation_category_name']);
														}
													}
													return $r;
												}
												?>
												<select name="Occupation" id="Occupation" class="form-control select2"
														style="width: 100%;">
													<option value="">Select Occupation</option>
													<?php echo getOccupation($occupationList, $user->occupation, "1"); ?>
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
												<input type="text" name="OccupationInDetail" class="form-control" value="<?php echo $user->occu_details; ?>"
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
												<input type="text" name="Organization" class="form-control" value="<?php echo $user->organization; ?>"
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
														$selected = "";
														if($user->annual_income == $annualIncomeList[$i]['annual_income_id']){
															$selected = "selected";
														}

														echo "<option ".$selected." value=\"".$annualIncomeList[$i]['annual_income_id']."\">".$annualIncomeList[$i]['annual_income']."</option>";
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
														<input type="radio" id="FamilyValue1" name="FamilyValue" <?php if($user->family_value == "Orthodox"){ echo "checked"; } ?> value="Orthodox">
														<label for="FamilyValue1">
															Orthodox&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyValue2" name="FamilyValue" <?php if($user->family_value == "Traditional"){ echo "checked"; } ?> value="Traditional">
														<label for="FamilyValue2">
															Traditional&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyValue3" name="FamilyValue" <?php if($user->family_value == "Moderate"){ echo "checked"; } ?> value="Moderate">
														<label for="FamilyValue3">
															Moderate&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyValue4" name="FamilyValue" <?php if($user->family_value == "Liberal"){ echo "checked"; } ?> value="Liberal">
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
														<input type="radio" id="FamilyType1" name="FamilyType" value="Joint Family" <?php if($user->family_type == "Joint Family"){ echo "checked"; } ?> >
														<label for="FamilyType1">
															Joint Family&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyType2" name="FamilyType" value="Nuclear Family" <?php if($user->family_type == "Nuclear Family"){ echo "checked"; } ?> >
														<label for="FamilyType2">
															Nuclear Family&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyType3" name="FamilyType" value="Others" <?php if($user->family_type == "Others"){ echo "checked"; } ?> >
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
														<input type="radio" id="FamilyStatus1" name="FamilyStatus" value="Middle Class" <?php if($user->family_status == "Middle Class"){ echo "checked"; } ?> >
														<label for="FamilyStatus1">
															Middle Class&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyStatus2" name="FamilyStatus" value="Upper Middle Class" <?php if($user->family_status == "Upper Middle Class"){ echo "checked"; } ?> >
														<label for="FamilyStatus2">
															Upper Middle Class&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyStatus3" name="FamilyStatus" value="Rich" <?php if($user->family_status == "Rich"){ echo "checked"; } ?>>
														<label for="FamilyStatus3">
															Rich&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyStatus4" name="FamilyStatus" value="Affluent" <?php if($user->family_status == "Affluent"){ echo "checked"; } ?> >
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
													<?php echo getOccupation($occupationList, $user->father_occupation, "1"); ?>
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
													<?php echo getOccupation($occupationList, $user->mother_occupation, "1"); ?>
												</select>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-3">
												<label for="Name" style="padding-left: 10px; padding-top: 5px">No.of Brothers</label>
											</div>
											<div class="col-3">
												<label for="BrothersMarried" style="padding-left: 10px; padding-top: 5px">Brothers Married</label>
											</div>
											<div class="col-3">
												<label for="Name" style="padding-left: 10px; padding-top: 5px">No.of Sisters</label>
											</div>
											<div class="col-3">
												<label for="SistersMarried" style="padding-left: 10px; padding-top: 5px">Sisters Married</label>
											</div>
											<div class="col-8">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-3">
												<select name="NoOfBrothers" id="NoOfBrothers" class="form-control select2" style="width: 100%;">
													<option value="">Select</option>
													<?php
													for($i=0; $i<8; $i++){
														$selected = "";
														if($i == $user->no_of_bro){
															$selected = "selected";
														}
														echo "<option ".$selected." value=\"".$i."\">".$i."</option>";
													}
													?>
													<option value="7+" <?php if($user->no_of_bro == "7+"){ echo "selected"; } ?> >7+</option>
												</select>
											</div>
											<div class="col-3">
												<select name="BrothersMarried" id="BrothersMarried" class="form-control select2" style="width: 100%;">
													<option value="">Select</option>
													<option value="None" <?php if($user->bro_married == "None"){ echo "selected"; } ?> >None</option>
													<?php
													for($i=1; $i<8; $i++){
														$selected = "";
														if($i == $user->bro_married){
															$selected = "selected";
														}
														echo "<option ".$selected." value=\"".$i."\">".$i."</option>";
													}
													?>
													<option value="7+" <?php if($user->bro_married == "7+"){ echo "selected"; } ?> >7+</option>
												</select>
											</div>
											<div class="col-3">
												<select name="NoOfSisters" id="NoOfSisters" class="form-control select2" style="width: 100%;">
													<option value="">Select</option>
													<?php
													for($i=0; $i<8; $i++){
														$selected = "";
														if($i == $user->no_of_sis){
															$selected = "selected";
														}
														echo "<option ".$selected." value=\"".$i."\">".$i."</option>";
													}
													?>
													<option value="7+" <?php if($user->no_of_sis == "7+"){ echo "selected"; } ?> >7+</option>
												</select>
											</div>
											<div class="col-3">
												<select name="SistersMarried" id="SistersMarried" class="form-control select2" style="width: 100%;">
													<option value="">Select</option>
													<option value="None" <?php if($user->sis_married == "None"){ echo "selected"; } ?> >None</option>
													<?php
													for($i=1; $i<8; $i++){
														$selected = "";
														if($i == $user->sis_married){
															$selected = "selected";
														}
														echo "<option ".$selected." value=\"".$i."\">".$i."</option>";
													}
													?>
													<option value="7+" <?php if($user->sis_married == "7+"){ echo "selected"; } ?> >7+</option>
												</select>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="AboutMyFamily" style="padding-left: 10px; padding-top: 5px">About My Family</label>
											</div>
											<div class="col-8">
												<textarea name="AboutMyFamily" class="form-control" id="AboutMyFamily" class="form-control"><?php echo $user->about_family; ?></textarea>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="ParentsNo" style="padding-left: 10px; padding-top: 5px">Parents No</label>
											</div>
											<div class="col-8">
												<input type="text" name="ParentsNo" class="form-control" id="ParentsNo" class="form-control" value="<?php echo $user->parents_no; ?>" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="NativePlace" style="padding-left: 10px; padding-top: 5px">Native Place</label>
											</div>
											<div class="col-8">
												<input type="text" name="NativePlace" class="form-control" id="NativePlace" class="form-control" value="<?php echo $user->native_place; ?>"/>
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
												<select style="width:80px;" name="PStartAge" id="PStartAge" >
													<option value="">From Age</option>
													<?php
													for($i=18; $i<71; $i++){
														$selected = "";
														if($i == $user->p_start_age){
															$selected = "selected";
														}
														echo "<option $selected value=\"".$i."\">".$i."</option>";
													}
													?>
												</select>
												&nbsp;-&nbsp;
												<select style="width:80px;" name="PEndAge" id="PEndAge" >
													<option value="">To Age</option>
													<?php
													for($i=21; $i<71; $i++){
														$selected = "";
														if($i == $user->p_end_age){
															$selected = "selected";
														}
														echo "<option $selected value=\"".$i."\">".$i."</option>";
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
													<?php
														$p_marital_status = $user->p_marital_status;
														$p_marital_statusArray = array();
														if($p_marital_status != "" && $p_marital_status != null){
															$p_marital_statusArray = explode("," , $p_marital_status);
														}
													?>
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PMaritalStatus2" name="PMaritalStatus[]"
															   <?php if(in_array("NeverMarried", $p_marital_statusArray)) { echo "checked"; } ?>
															   value="NeverMarried">
														<label for="PMaritalStatus2">
															Never Married&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PMaritalStatus3" name="PMaritalStatus[]"
															<?php if(in_array("Divorced", $p_marital_statusArray)) { echo "checked"; } ?>
															   value="Divorced">
														<label for="PMaritalStatus3">
															Divorced
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PMaritalStatus5" name="PMaritalStatus[]"
															<?php if(in_array("AwaitingDivorce", $p_marital_statusArray)) { echo "checked"; } ?>
															   value="AwaitingDivorce">
														<label for="PMaritalStatus5">
															Awaiting divorce
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PMaritalStatus4" name="PMaritalStatus[]"
															<?php if(in_array("Widowed", $p_marital_statusArray)) { echo "checked"; } ?>
															   value="Widowed">
														<label for="PMaritalStatus4">
															Widowed
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
										function personHeightOptions($height){
											$r = '';
											for($foot=4;$foot<=7;$foot++){
												for($inches=0;$inches<=($foot==7? 0 : 11);$inches++){
													$cm = convert_to_cm($foot, $inches);
													if($inches==0){
														if($height == $cm)
															$r .= "<option selected value='$cm'> $foot ft / ".convert_to_cm($foot, $inches)." cm</option>";
														else
															$r .= "<option value='$cm'> $foot ft / ".convert_to_cm($foot, $inches)." cm</option>";
													}else{
														if($height == $cm)
															$r .= "<option selected value='$cm'> $foot ft $inches ins / ".convert_to_cm($foot, $inches)." cm </option>";
														else
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
												<select name="startPHeight" id="startPHeight">
													<option value="">From Height</option>
													<?php echo  personHeightOptions($user->p_start_height); ?>
												</select>
												&nbsp;-&nbsp;
												<select name="endPHeight" id="endPHeight">
													<option value="">To Height</option>
													<?php echo  personHeightOptions($user->p_end_height); ?>
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
															<?php if($user->p_physical_status == "Normal") { echo "checked"; } ?>
															   value="Normal">
														<label for="PPhysicalStatus1">
															Normal
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="PPhysicalStatus4" name="PPhysicalStatus"
															<?php if($user->p_physical_status == "PhysicallyChallenged") { echo "checked"; } ?>
															   value="PhysicallyChallenged">
														<label for="PPhysicalStatus4">
															Physically challenged
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="PPhysicalStatus3" name="PPhysicalStatus"
															<?php if($user->p_physical_status == "DoesNotMatter") { echo "checked"; } ?>
															   value="DoesNotMatter">
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
													<?php
														$p_eating = $user->p_eating;
														$p_eatingArray = array();
														if($p_eating != "" && $p_eating != null){
															$p_eatingArray = explode("," , $p_eating);
														}
													?>
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PEatingHabits1" name="PEatingHabits[]"
															<?php if(in_array("DoesNotMatter", $p_eatingArray)) { echo "checked"; } ?>
															   value="DoesNotMatter">
														<label for="PEatingHabits1">
															Doesn't matter
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PEatingHabits2" name="PEatingHabits[]"
															<?php if(in_array("Vegetarian", $p_eatingArray)) { echo "checked"; } ?>
															   value="Vegetarian">
														<label for="PEatingHabits2">
															Vegetarian
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PEatingHabits3" name="PEatingHabits[]"
															<?php if(in_array("NonVegetarian", $p_eatingArray)) { echo "checked"; } ?>
															   value="NonVegetarian">
														<label for="PEatingHabits3">
															Non Vegetarian
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PEatingHabits4" name="PEatingHabits[]"
															<?php if(in_array("Eggetarian", $p_eatingArray)) { echo "checked"; } ?>
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
													<?php
														$p_drinking = $user->p_drinking;
														$p_drinkingArray = array();
														if($p_drinking != "" && $p_drinking != null){
															$p_drinkingArray = explode("," , $p_drinking);
														}
													?>
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PDrinkingHabits1" name="PDrinkingHabits[]"
															<?php if(in_array("DoesNotMatter", $p_drinkingArray)) { echo "checked"; } ?>
															   value="DoesNotMatter">
														<label for="PDrinkingHabits1">
															Doesn't matter
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PDrinkingHabits2" name="PDrinkingHabits[]"
															<?php if(in_array("NeverDrinks", $p_drinkingArray)) { echo "checked"; } ?>
															   value="NeverDrinks">
														<label for="PDrinkingHabits2">
															Never drinks
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PDrinkingHabits3" name="PDrinkingHabits[]"
															<?php if(in_array("DrinksSocially", $p_drinkingArray)) { echo "checked"; } ?>
															   value="DrinksSocially">
														<label for="PDrinkingHabits3">
															Drinks socially
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PDrinkingHabits4" name="PDrinkingHabits[]"
															<?php if(in_array("DrinksRegularly", $p_drinkingArray)) { echo "checked"; } ?>
															   value="DrinksRegularly">
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
													<?php
														$p_smoking = $user->p_smoking;
														$p_smokingArray = array();
														if($p_smoking != "" && $p_smoking != null){
															$p_smokingArray = explode("," , $p_smoking);
														}
													?>
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PSmokingHabits1" name="PSmokingHabits[]"
															<?php if(in_array("DoesNotMatter", $p_smokingArray)) { echo "checked"; } ?>
															   value="DoesNotMatter">
														<label for="PSmokingHabits1">
															Doesn't matter
														</label>
													</div>
													<br>
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PSmokingHabits2" name="PSmokingHabits[]"
															<?php if(in_array("NeverSmokes", $p_smokingArray)) { echo "checked"; } ?>
															   value="NeverSmokes">
														<label for="PSmokingHabits2">
															Never smokes
														</label>
													</div>
													<br>
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PSmokingHabits3" name="PSmokingHabits[]"
															<?php if(in_array("SmokesOccasionally", $p_smokingArray)) { echo "checked"; } ?>
															   value="SmokesOccasionally">
														<label for="PSmokingHabits3">
															Smokes occasionally
														</label>
													</div>
													<br>
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="PSmokingHabits4" name="PSmokingHabits[]"
															<?php if(in_array("SmokesRegularly", $p_smokingArray)) { echo "checked"; } ?>
															   value="SmokesRegularly">
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
											<div class="col-6" id="PMotherTongueDiv">
												<?php
												$p_mother_tongue = $user->p_mother_tongue;
												$p_mother_tongueArray = array();
												if($p_mother_tongue != "" && $p_mother_tongue != null){
													$p_mother_tongueArray = explode("," , $p_mother_tongue);
												}
												?>
												<select name="PMotherTongue[]" id="PMotherTongue" class="form-control select2" multiple style="width: 100%">
													<option value="">Select</option>
													<?php
													for($i=0; $i<count($motherTongueList); $i++){
														$selected = "";
														if(in_array($motherTongueList[$i]['mother_tongue_id'], $p_mother_tongueArray)) {
															$selected = "selected";
														}
														echo "<option $selected value=\"".$motherTongueList[$i]['mother_tongue_id']."\">".$motherTongueList[$i]['mother_tongue_name']."</option>";
													}
													?>
												</select>
											</div>
											<div class="col-2 align-middle">
												<div class="icheck-success d-inline">
													<input type="checkbox"
														   value="YES"
														<?php if($user->p_mother_tongue_any == "YES") { echo "checked"; } ?>
														   id="PMotherTongueAny" name="PMotherTongueAny">
													<label for="PMotherTongueAny">
														Any
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="PReligion" style="padding-left: 10px;">Religion</label>
											</div>
											<div class="col-6 align-middle" id="PReligionDiv">
												<select name="PReligion" id="PReligion" class="form-control select2" style="width: 100%">
													<option value="">Select</option>
													<?php
													for($i=0; $i<count($religionList); $i++){
														$selected = "";
														if($user->p_religion == $religionList[$i]['religion_id']){
															$selected = "selected";
														}
														echo "<option $selected value=\"".$religionList[$i]['religion_id']."\">".$religionList[$i]['religion_name']."</option>";
													}
													?>
												</select>
											</div>
											<div class="col-2 align-middle">
												<div class="icheck-success d-inline">
													<input type="checkbox"
														   value="YES"
														<?php if($user->p_religion_any == "YES") { echo "checked"; } ?>
														   id="PReligionAny" name="PReligionAny">
													<label for="PReligionAny">
														Any
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="PCaste" style="padding-left: 10px;">Caste</label>
											</div>
											<div class="col-6" id="PCasteDiv">
												<select multiple name="PCaste[]" id="PCaste" class="form-control select2" style="width: 100%">
													<option value="">Select</option>
												</select>
											</div>
											<div class="col-2 align-middle" >
												<div class="icheck-success d-inline">
													<input type="checkbox"
														   value="YES"
														<?php if($user->p_caste_any == "YES") { echo "checked"; } ?>
														   id="PCasteAny" name="PCasteAny">
													<label for="PCasteAny">
														Any
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="PSubCaste" style="padding-left: 10px;padding-top: 5px;">Sub Caste</label>
											</div>
											<div class="col-6"  id="PSubCasteDiv">
												<select multiple name="PSubCaste[]" id="PSubCaste" class="form-control select2" style="width: 100%">
													<option value="">Select</option>
												</select>
											</div>
											<div class="col-2 align-middle">
												<div class="icheck-success d-inline">
													<input type="checkbox"
														   value="YES"
														<?php if($user->p_sub_caste_any == "YES") { echo "checked"; } ?>
														   id="PSubCasteAny" name="PSubCasteAny">
													<label for="PSubCasteAny">
														Any
													</label>
												</div>
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
														<input type="radio" id="PDosham1" name="PDosham"
															<?php if($user->p_is_chevvai_dosham == "Yes") { echo "checked"; } ?>
															   value="Yes">
														<label for="PDosham1">
															Yes
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="PDosham2" name="PDosham"
															<?php if($user->p_is_chevvai_dosham == "No") { echo "checked"; } ?>
															   value="No">
														<label for="PDosham2">
															No
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="PDosham3" name="PDosham"
															<?php if($user->p_is_chevvai_dosham == "DoesNotMatter") { echo "checked"; } ?>
															   value="DoesNotMatter">
														<label for="PDosham3">
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
											<div class="col-6" id="PStarDiv">
												<?php
													$p_star = $user->p_star;
													$p_starArray = array();
													if($p_star != "" && $p_star != null){
														$p_starArray = explode("," , $p_star);
													}
												?>
												<select name="PStar[]" id="PStar" class="form-control select2" style="width: 100%" multiple>
													<option value="">Select</option>
													<?php
													for($i=0; $i<count($starList); $i++){
														$selected = "";
														if(in_array($starList[$i]['star_id'], $p_starArray)) {
															$selected = "selected";
														}
														echo "<option $selected value=\"".$starList[$i]['star_id']."\">".$starList[$i]['star_name']."</option>";
													}
													?>
												</select>
											</div>
											<div class="col-2 align-middle">
												<div class="icheck-success d-inline">
													<input type="checkbox"
														   value="YES"
														<?php if($user->p_star_any == "YES") { echo "checked"; } ?>
														   id="PStarAny" name="PStarAny">
													<label for="PStarAny">
														Any
													</label>
												</div>
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
											<div class="col-6" id="PEducationDiv">
												<?php
												$p_education = $user->p_edu;
												$p_educationArray = array();
												if($p_education != "" && $p_education != null){
													$p_educationArray = explode("," , $p_education);
												}
												?>
												<select name="PEducation[]" id="PEducation" class="form-control select2" multiple style="width: 100%">
													<option value="">Select</option>
													<?php echo getEducation($educationList, $p_educationArray, 2); ?>
												</select>
											</div>
											<div class="col-2 align-middle">
												<div class="icheck-success d-inline">
													<input type="checkbox"
														   value="YES"
														<?php if($user->p_education_any == "YES") { echo "checked"; } ?>
														   id="PEducationAny" name="PEducationAny">
													<label for="PEducationAny">
														Any
													</label>
												</div>
											</div>

										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="PEmployedIn" style="padding-left: 10px;">Employed In</label>
											</div>
											<div class="col-8">
												<?php
													$p_employed_in = $user->p_employed_in;
													$p_employed_inArray = array();
													if($p_employed_in != "" && $p_employed_in != null){
														$p_employed_inArray = explode("," , $p_employed_in);
													}
												?>
												<select name="PEmployedIn[]" id="PEmployedIn" class="form-control select2" style="width: 100%" multiple>
													<option value="">Select</option>
													<?php
														for($i=0; $i<count($employedInList); $i++){
															$selected = "";
															if(in_array($employedInList[$i]['employed_in_id'], $p_employed_inArray)) {
																$selected = "selected";
															}
															echo "<option $selected value=\"".$employedInList[$i]['employed_in_id']."\">".$employedInList[$i]['employed_in_name']."</option>";
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
											<div class="col-6" id="POccupationDiv">
												<?php
													$p_occupation = $user->p_occu;
													$p_occupationArray = array();
													if($p_occupation != "" && $p_occupation != null){
														$p_occupationArray = explode("," , $p_occupation);
													}
												?>
												<select name="POccupation[]" id="POccupation" class="form-control select2" style="width: 100%" multiple>
													<option value="">Select</option>
													<?php echo  getOccupation($occupationList, $p_occupationArray, 2);?>
												</select>
											</div>
											<div class="col-2 align-middle">
												<div class="icheck-success d-inline">
													<input type="checkbox"
														   value="YES"
														<?php if($user->p_occupation_any == "YES") { echo "checked"; } ?>
														   id="POccupationAny" name="POccupationAny">
													<label for="POccupationAny">
														Any
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="PAnnualIncomeStart" style="padding-left: 10px;">Annual Income</label>
											</div>
											<div class="col-8 row">
												<div class="col-md-6 col-sm-12">
													<?php /*echo $user->p_annual_income_start . "ddduhasud";  print_r($user); */?>
													<select name="PAnnualIncomeStart" id="PAnnualIncomeStart" class="form-control select2">
														<option value="">Select</option>
														<option value="Any" <?php if($user->p_annual_income_start == "Any") { echo "selected"; } ?> >Any</option>
														<option value="LessThan1Lakh" <?php if($user->p_annual_income_start == "LessThan1Lakh") { echo "selected"; } ?>>Less than Rs. 1 Lakh</option>
														<?php
														for($i=1; $i<51; $i++){
															if($i<10 || ($i%2 == 0 && $i <= 20) || ($i%10 == 0)) {
																$selected = "";
																if($user->p_annual_income_start == $i) {
																	$selected = "selected";
																}
																echo "<option $selected value=\"".$i."\">Rs. ".$i." Lakh</option>";
															}
														}
														?>
														<option value="50LakhsAndAbove" <?php if($user->p_annual_income_start == "50LakhsAndAbove") { echo "selected"; } ?>>Rs. 50 Lakhs & Above</option>
													</select>
												</div>
												<div class="col-md-6 col-sm-12" id="PAnnualIncomeEndDiv">
													<select name="PAnnualIncomeEnd" id="PAnnualIncomeEnd" class="form-control select2">
														<option value="">Select</option>
														<option value="Any" <?php if($user->p_annual_income_end == "Any") { echo "selected"; } ?> >Any</option>
														<?php
														$sLoop = 2;
														if($user->p_annual_income_start != "" && $user->p_annual_income_start != null && $user->p_annual_income_start != "Any" && $user->p_annual_income_start != "LessThan1Lakh" && $user->p_annual_income_start != "50LakhsAndAbove"){
															$sLoop = $user->p_annual_income_start + 1;
														}
														for($i=$sLoop; $i<51; $i++){
															if($i<10 || ($i%2 == 0 && $i <= 20) || ($i%10 == 0)) {
																$selected = "";
																if($user->p_annual_income_end == $i) {
																	$selected = "selected";
																}
																echo "<option $selected value=\"".$i."\">Rs. ".$i." Lakh</option>";
															}
														}
														?>
													</select>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div id="edit9">
								<form name="formId9" id="formId9">
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="PCountryLivingIn" style="padding-left: 10px;">Country Living In</label>
											</div>
											<div class="col-6" id="PCountryLivingInDiv">
												<?php
												$p_living_in = $user->p_living_in;
												$p_living_inArray = array();
												if($p_living_in != "" && $p_living_in != null){
													$p_living_inArray = explode("," , $p_living_in);
												}
												?>

												<select multiple name="PCountryLivingIn[]" id="PCountryLivingIn" class="form-control select2" style="width: 100%">
													<option value="">Select</option>
													<?php
													for($i=0; $i<count($countryList); $i++){
														$selected = "";
														if(in_array($countryList[$i]['country_id'], $p_living_inArray)) {
															$selected = "selected";
														}

														echo "<option $selected value=\"".$countryList[$i]['country_id']."\">".$countryList[$i]['country_name']."</option>";
													}
													?>
												</select>
											</div>
											<div class="col-2 align-middle" >
												<div class="icheck-success d-inline">
													<input type="checkbox"
														   value="YES"
														<?php if($user->p_country_any == "YES") { echo "checked"; } ?>
														   id="PCountryLivingInAny" name="PCountryLivingInAny">
													<label for="PCountryLivingInAny">
														Any
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="PResidingState" style="padding-left: 10px;">Residing State</label>
											</div>
											<div class="col-6" id="PResidingStateDiv">
												<select multiple name="PResidingState[]" id="PResidingState" class="form-control select2" style="width: 100%">
													<option value="">Select</option>
												</select>
											</div>
											<div class="col-2 align-middle" >
												<div class="icheck-success d-inline">
													<input type="checkbox"
														   value="YES"
														<?php if($user->p_state_any == "YES") { echo "checked"; } ?>
														   id="PResidingStateAny" name="PResidingStateAny">
													<label for="PResidingStateAny">
														Any
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="PCity" style="padding-left: 10px;">Residing City</label>
											</div>
											<div class="col-6" id="PCityDiv">
												<select multiple name="PCity[]" id="PCity" class="form-control select2" style="width: 100%">
													<option value="">Select</option>
												</select>
											</div>
											<div class="col-2 align-middle" >
												<div class="icheck-success d-inline">
													<input type="checkbox"
														   value="YES"
														<?php if($user->p_city_any == "YES") { echo "checked"; } ?>
														   id="PCityAny" name="PCityAny">
													<label for="PCityAny">
														Any
													</label>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div id="edit10">
								<form name="formId10" id="formId10">
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="PWhatIAmLookingFor" style="padding-left: 10px;">What I am looking for</label>
											</div>
											<div class="col-8">
												<textarea name="PWhatIAmLookingFor" id="PWhatIAmLookingFor" class="form-control" rows="5"><?php echo $user->p_about_my_partner; ?></textarea>
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
										   onclick="saveAction('<?php echo $user->matrimony_id;?>')">
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

        let country = "<?php echo $user->country; ?>"
        let state = "<?php echo $user->state; ?>"
        let city = "<?php echo $user->city; ?>"

        let religion = "<?php echo $user->religion; ?>"
        let caste = "<?php echo $user->caste; ?>"
        let sub_caste = "<?php echo $user->sub_caste; ?>"
        let star = "<?php echo $user->star; ?>"
        let raasi = "<?php echo $user->raasi; ?>"

        let p_religion_any = "<?php echo $user->p_religion_any; ?>"
        let p_caste_any = "<?php echo $user->p_caste_any; ?>"
        let p_sub_caste_any = "<?php echo $user->p_sub_caste_any; ?>"

        let p_city_any = "<?php echo $user->p_city_any; ?>"
        let p_state_any = "<?php echo $user->p_state_any; ?>"
        let p_country_any = "<?php echo $user->p_country_any; ?>";


        let dob = "<?php echo $user->date_of_birth; ?>"
        let dobA = dob.split("-");
        let dobY = dobA[0];
        let dobM = parseInt(dobA[1]);
        let dobD = parseInt(dobA[2]);
        for (j = y-18; j >1950; j--) {
            if(dobY == j) {
                $("#dateOfBirth3").append("<option selected value=\""+(j)+"\">"+(j)+"</option>")
                $("#dateOfBirth2").val(dobM);
                onChangeMonth(dobM);

                setTimeout(function () {
                    $("#dateOfBirth1").val(dobD);
                }, 500);

            } else {
                $("#dateOfBirth3").append("<option value=\""+(j)+"\">"+(j)+"</option>")
            }
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

        function onChangeMonth(input){
            let setYear = $("#dateOfBirth3").val();
            $("#dateOfBirth1").empty().append("<option value=\"\">Day</option>");
            if(setYear != ""){
                if(setYear%4==0 && input==2) {
                    for(var i=1;i<=parseInt((dayArray[input-1]))+1;i++)  {
                        $("#dateOfBirth1").append("<option value=\""+i+"\">"+i+"</option>");
                    }
                }else{
                    for(var i=1;i<=(dayArray[input-1]);i++)  {
                        $("#dateOfBirth1").append("<option value=\""+i+"\">"+i+"</option>");
                    }
                }
            }else{
                for(var i=1;i<=dayArray[input-1];i++)  {
                    $("#dateOfBirth1").append("<option value=\""+i+"\">"+i+"</option>");
                }
            }
        }

        $(function () {
            editAction(1);
            onChangeMonth(1);
            getStateList(country, state, "1", "state", "");
            // alert(state +" - " + city+ " - "+ "1"+", "+"city"+", "+"")
            getCityList(state, city, "1", "city", "");
            getCasteList(religion, caste, "caste", "")
            getSubCasteList(caste, sub_caste, "SubCaste", "");
            getStarList(raasi, star);

            // Partner
            getStateList("<?php echo $user->p_living_in; ?>", "<?php echo $user->p_state; ?>", "2", "PResidingState", "All");
            getCityList("<?php echo $user->p_state; ?>", "<?php echo $user->p_city; ?>", "2", "PCity", "All");
            //alert("<?php //echo $user->p_state; ?>//" +" - " + "<?php //echo $user->p_city; ?>//"+ " - "+ "2"+", "+"PCity"+", "+"All")

            $('#dateOfBirth3').change(function() {
                onChangeYear($('#dateOfBirth3').val())
            });

            $('#dateOfBirth2').change(function() {
                onChangeMonth($('#dateOfBirth2').val())
            });

            $('#religion').change(function() {
                getCasteList($('#religion').val(), "", "caste", "");
            });

            $('#PReligion').change(function() {
                getCasteList($('#PReligion').val(), "", "PCaste", "");
            });

            $('#PCaste').change(function() {
                getSubCasteList($('#PCaste').val().toString(), $("#PSubCaste").val().toString(), "PSubCaste", "");
            });

            $('#PResidingState').change(function() {
                getCityList($("#PResidingState").val().toString(), $("#PCity").val().toString(), "2", "PCity", "");
			});

            $('#caste').change(function() {
                getSubCasteList($('#caste').val(), "", "SubCaste", "");
            });

            $('#Raasi').change(function() {
                getStarList($('#Raasi').val(), "");
            });

            $('#country').change(function() {
                getStateList($('#country').val(), "",  "1", "state", "");
            });

            $('#state').change(function() {
                getCityList($('#state').val(), "", "1", "city", "");
            });

            $('.select2').select2();

            $('#PMotherTongueAny').click(function() {
                if(this.checked){
                    $('#PMotherTongue').val([])
                    $('#PMotherTongueDiv').hide()
				} else {
                    $('#PMotherTongueDiv').show()
                }
            });

            $('#POccupationAny').click(function() {
                if(this.checked){
                    $('#POccupation').val([])
                    $('#POccupationDiv').hide()
				} else {
                    $('#POccupationDiv').show()
                }
            });

            $('#PEducationAny').click(function() {
                if(this.checked){
                    $('#PEducation').val([])
                    $('#PEducationDiv').hide()
				} else {
                    $('#PEducationDiv').show()
                }
            });

            $('#PReligionAny').click(function() {
                if(this.checked){
                    $('#PReligion').val()
                    $('#PReligionDiv').hide();
                    getCasteList("", "", "PCaste", "All");
                    $("#PSubCaste").empty().append("<option value=\"\">Select</option>");
                } else {
                    $("#PSubCaste").empty().append("<option value=\"\">Select</option>");
                    $("#PCaste").empty().append("<option value=\"\">Select</option>");
                    getCasteList($("#PReligion").val(), "", "PCaste", "");
                    $('#PReligionDiv').show()
                }
            });

            $('#PCountryLivingInAny').click(function() {
                if(this.checked){
                    $('#PCountryLivingInDiv').hide()
                    getStateList("", $("#PResidingState").val(), "2", "PResidingState", "All");
				} else {
                    getStateList($("#PCountryLivingIn").val(), $("#PResidingState").val(), "2", "PResidingState", "All");
                    $('#PCountryLivingInDiv').show()
                }
            });

            $('#PResidingStateAny').click(function() {
                if(this.checked){
                    $('#PResidingStateDiv').hide()
                    getCityList($("#PResidingState").val().toString(), $("#PCity").val().toString(), "2", "PCity", "All");
				} else {
                    getCityList($("#PResidingState").val().toString(), $("#PCity").val().toString(), "2", "PCity", "All");
                    $('#PResidingStateDiv').show()
                }
            });

            $('#PCityAny').click(function() {
                if(this.checked){
                    $('#PCityDiv').hide()
				} else {
                    $('#PCityDiv').show()
                }
            });

            $('#PCasteAny').click(function() {
                if(this.checked){
                    $('#PCaste').val([])
                    $('#PCasteDiv').hide()
                    getSubCasteList("", "", "PSubCaste", "All");
                } else {
                    getCasteList($("#PReligion").val(), "", "PCaste", "All");
                    $('#PCasteDiv').show()
                }
            });

            $('#PSubCasteAny').click(function() {
                if(this.checked){
                    $('#PSubCaste').val([])
                    $('#PSubCasteDiv').hide()
                } else {
                    getSubCasteList($("#PCaste").val().toString(), "", "PSubCaste", "");
                    $('#PSubCasteDiv').show()
                }
            });

            $('#PStarAny').click(function() {
                if(this.checked){
                    $('#PStar').val([])
                    $('#PStarDiv').hide()
                } else {
                    $('#PStarDiv').show()
                }
            });

            $('#PCountryLivingIn').change(function() {
                getStateList($("#PCountryLivingIn").val().toString(), $("#PResidingState").val().toString(), "2", "PResidingState", "All");
            });

            $('#PResidingState').change(function() {
                getCityList($("#PResidingState").val().toString(), $("#PResidingState").val().toString(), "2", "PCity", "All");
            });

            $('#PAnnualIncomeStart').change(function() {
                let PAnnualIncomeStart = $('#PAnnualIncomeStart').val()
                if(PAnnualIncomeStart == "Any" || PAnnualIncomeStart == "LessThan1Lakh" || PAnnualIncomeStart == "50LakhsAndAbove"){
                    $("#PAnnualIncomeEndDiv").hide()
                    $("#PAnnualIncomeEnd").val("")
				} else {
                    $("#PAnnualIncomeEnd").empty().append("<option value=\"\">Select</option>").append("<option value=\"Any\">Any</option>");
					for(var k= (parseInt(PAnnualIncomeStart) + 1); k < 51; k++) {
                        if (k < 10) {
                            $("#PAnnualIncomeEnd").append("<option value=\""+k+"\">Rs. "+k+" Lakh</option>");
                        }
                        else if (k % 2 == 0 && k <= 20) {
                            $("#PAnnualIncomeEnd").append("<option value=\""+k+"\">Rs. "+k+" Lakh</option>");
                        } else if (k % 10 == 0) {
                            $("#PAnnualIncomeEnd").append("<option value=\""+k+"\">Rs. "+k+" Lakh</option>");
                        }
                    }
                    $("#PAnnualIncomeEndDiv").show()
				}
            });

            $('#PAnnualIncomeEnd').change(function() {
                console.log($('#PAnnualIncomeEnd').val())
            });
        });

        function getCityList(state, city, type, cityId, dataId) {

            $.get("/api/city", {state : state, dataId: dataId}, function(data, status){
                $("#"+cityId).empty().append("<option value=\"\">Select</option>");
                data.map(function (d,i) {
                    if(type == 1){
                        if(city == d.city_id){
                            $("#"+cityId).append("<option selected value=\""+d.city_id+"\">"+d.city_name+"</option>");
                        } else {
                            $("#"+cityId).append("<option value=\""+d.city_id+"\">"+d.city_name+"</option>");
                        }
                    } else if(type == 2){
                        var selected = "";
                        if(city != ""){
                            var cityArray = city.split(",")
                            if(cityArray.length > 0 && cityArray.includes(d.city_id))
                                selected = "selected";
                        }
                        $("#"+cityId).append("<option "+selected+" value=\""+d.city_id+"\">"+d.city_name+"</option>");
                    }
                });
            });
        }

        function getStateList(country, state, type, stateId, dataId) {
            $.get("/api/state", {country : country, dataId: dataId}, function(data, status){
                $("#"+stateId).empty().append("<option value=\"\">Select</option>");
                data.map(function (d,i) {
                    if(type == 1){
                        if(state == d.state_id){
                            $("#"+stateId).append("<option selected value=\""+d.state_id+"\">"+d.state_name+"</option>");
                        } else {
                            $("#"+stateId).append("<option value=\""+d.state_id+"\">"+d.state_name+"</option>");
                        }
					} else if(type == 2){
                        var selected = "";
                        if(state != ""){
                            var stateArray = state.split(",")
                            if(stateArray.length > 0 && stateArray.includes(d.state_id))
                                selected = "selected";
						}
                        $("#"+stateId).append("<option "+selected+" value=\""+d.state_id+"\">"+d.state_name+"</option>");


					}
                });
            });
        }

        function getStarList(raasi, star) {
            $.get("/api/star", { raasi : raasi}, function(data, status){
                $("#Star").empty().append("<option value=\"\">Select</option>");
                data.map(function (d,i) {
                    var selected = "";
                    if(star == d.star_id){
                        selected = "selected";
                    }
                    $("#Star").append("<option "+selected+" value=\""+d.star_id+"\">"+d.star_name+"</option>");
                });
            });
        }

        function editAction(id) {
            let idList = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
            idList.map(i => {
				if (id == i) {
                    $("#edit" + i).show();
                    $("#formId").val(i);
                    $("#EditActionHeader").html(headerNames[i-1])

					if(id == 7){
                        let p_religion_any = "<?php echo $user->p_religion_any; ?>"
                        if(p_religion_any == "YES"){
                            $("#PReligionDiv").hide();
						}

                        let p_caste_any = "<?php echo $user->p_caste_any; ?>"
                        if(p_caste_any == "YES"){
                            $("#PCasteDiv").hide();
                        }

                        let p_sub_caste_any = "<?php echo $user->p_sub_caste_any; ?>"
                        if(p_sub_caste_any == "YES"){
                            $("#PSubCasteDiv").hide();
                        }

                        let p_mother_tongue_any = "<?php echo $user->p_mother_tongue_any; ?>"
                        if(p_mother_tongue_any == "YES"){
                            $("#PMotherTongueDiv").hide();
                        }

                        let p_star_any = "<?php echo $user->p_star_any; ?>"
                        if(p_star_any == "YES"){
                            $("#PStarDiv").hide();
                        }

                        if(p_religion_any == "NO"){
                            getCasteList($("#PReligion").val(), "<?php echo $user->p_caste; ?>", "PCaste", "");
						}
                        else if(p_religion_any == "YES" && p_caste_any == "NO"){
                            getCasteList("", "<?php echo $user->p_caste; ?>", "PCaste", "All");
                        }
                        if(p_caste_any == "NO"){
                            getSubCasteList("<?php echo $user->p_caste; ?>", "<?php echo $user->p_sub_caste; ?>", "PSubCaste", "");
                        } else if(p_caste_any == "YES" && p_sub_caste_any == "NO") {
                            getSubCasteList("<?php echo $user->p_caste; ?>", "<?php echo $user->p_sub_caste; ?>", "PSubCaste", "All");
                        }
                    }
					else if(id == 8){
									let p_education_any = "<?php echo $user->p_education_any; ?>"
									if(p_education_any == "YES"){
										$("#PEducationDiv").hide();
									}

									let p_occupation_any = "<?php echo $user->p_occupation_any; ?>"
									if(p_occupation_any == "YES"){
										$("#POccupationDiv").hide();
									}
								}
					else if(id == 9){
                        if(p_country_any == "YES"){
                            $("#PCountryLivingInDiv").hide();
                        }
                        if(p_state_any == "YES"){
                            $("#PResidingStateDiv").hide();
                        }
                        if(p_city_any == "YES"){
                            $("#PCityDiv").hide();
                        }
					}
                }
                else
                    $("#edit" + i).hide()
            })
        }

        function saveAction(matrimonyId) {
            var formId = $("#formId").val();
            $.post("/api/users/update/"+formId+"/"+matrimonyId, $("#formId"+formId).serialize(), function(data, status){
                // alert(JSON.stringify(data))
                alert(data)
            });
        }

        function getCasteList(religion, caste, casteId, dataId) {
                $("#"+casteId).empty().append("<option disabled value=\"\">Select</option>");
                $.get("/api/caste", {religion : religion, dataId : dataId}, function(data, status){
                    data.map(function (d,i) {
                        var selected = "";
                        if(casteId == "caste"){
                            if(caste == d.caste_id){
                                selected = "selected";
                            }
						} else {
                            if(caste != ""){
                                var casteArray = caste.split(",")
								if(casteArray.includes(d.caste_id))
                                    selected = "selected";
                            }
						}
                        $("#"+casteId).append("<option "+selected+" value=\""+d.caste_id+"\">"+d.caste_name+"</option>");
                    });
                });
        }

		function getSubCasteList(caste, subCaste, subCasteId, dataId) {
            $.get("/api/subCaste", { caste : caste, dataId: dataId}, function(data, status){
                $("#"+subCasteId).empty().append("<option disabled value=\"\">Select</option>");
                data.map(function (d,i) {
                    var selected = "";
                    if(subCasteId == "SubCaste"){
                        if(subCaste == d.sub_caste_id){
                            selected = "selected";
                        }
					} else {
                        if(subCaste != ""){
                            var subCasteArray = subCaste.split(",")
                            if(subCasteArray.includes(d.sub_caste_id))
                                selected = "selected";
                        }
					}
                    $("#"+subCasteId).append("<option "+selected+" value=\""+d.sub_caste_id+"\">"+d.sub_caste_name+"</option>");
                });
            });
        }

	</script>

