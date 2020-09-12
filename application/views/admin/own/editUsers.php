<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px;padding-top: 5px"> Body Type
													: </label>
											</div>
											<div class="col-8">
												<div class="form-group clearfix" style="padding-top: 10px">
													<div class="icheck-primary d-inline">
														<input type="radio" id="BodyType1" name="BodyType" value="Slim">
														<label for="BodyType1">
															Slim
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="BodyType2" name="BodyType"
															   value="Athletic">
														<label for="BodyType2">
															Athletic
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="BodyType3" name="BodyType"
															   value="Average">
														<label for="BodyType3">
															Average
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
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px;padding-top: 5px">Physical
													Status : </label>
											</div>
											<div class="col-8">
												<div class="form-group clearfix" style="padding-top: 10px">
													<div class="icheck-primary d-inline">
														<input type="radio" id="PhysicalStatus1" name="PhysicalStatus"
															   value="Normal">
														<label for="PhysicalStatus1">
															Normal
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
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px;padding-top: 5px"> Eating
													Habits : </label>
											</div>
											<div class="col-8">
												<div class="form-group clearfix" style="padding-top: 10px">
													<div class="icheck-primary d-inline">
														<input type="radio" id="EatingHabits1" name="EatingHabits"
															   value="Vegetarian">
														<label for="EatingHabits1">
															Vegetarian
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="EatingHabits2" name="EatingHabits"
															   value="Non Vegetarian">
														<label for="EatingHabits2">
															Non Vegetarian
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
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px;padding-top: 5px"> Drinking
													Habits : </label>
											</div>
											<div class="col-8">
												<div class="clearfix">
													<div class="icheck-primary d-inline">
														<input type="radio" id="DrinkingHabits1" name="DrinkingHabits"
															   value="No">
														<label for="DrinkingHabits1">
															No
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="DrinkingHabits2" name="DrinkingHabits"
															   value="Drinks Socially">
														<label for="DrinkingHabits2">
															Drinks Socially
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="DrinkingHabits3" name="DrinkingHabits"
															   value="Yes">
														<label for="DrinkingHabits3">
															Yes
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Name" style="padding-left: 10px;padding-top: 5px"> Smoking
													Habits : </label>
											</div>
											<div class="col-8">
												<div class="form-group clearfix" style="padding-top: 10px">
													<div class="icheck-primary d-inline">
														<input type="radio" id="SmokingHabits1" name="SmokingHabits"
															   value="No">
														<label for="SmokingHabits1">
															No
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="SmokingHabits2" name="SmokingHabits"
															   value="Occasionally">
														<label for="SmokingHabits2">
															Occasionally
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="SmokingHabits3" name="SmokingHabits"
															   value="Yes">
														<label for="SmokingHabits3">
															Yes
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
												<label for="Star"
													   style="padding-left: 10px; padding-top: 5px">Star</label>
											</div>
											<div class="col-8">
												<select name="Star" id="Star" class="form-control select2"
														style="width: 100%;">
													<option value="">Select</option>
												</select>
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
												<select name="HighestEducation" id="HighestEducation"
														class="form-control select2" style="width: 100%;">
													<option value="">Select Education</option>
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
												<select name="Occupation" id="Occupation" class="form-control select2"
														style="width: 100%;">
													<option value="">Select Occupation</option>
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
												<label for="AnnualIncome" style="padding-left: 10px;padding-top: 5px">Family
													Value *</label>
											</div>
											<div class="col-8">
												<div class="form-group clearfix" style="padding-top: 10px">
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyValue1" name="FamilyValue"
															   value="Orthodox">
														<label for="FamilyValue1">
															Orthodox
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyValue2" name="FamilyValue"
															   value="Traditional">
														<label for="FamilyValue2">
															Traditional
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyValue3" name="FamilyValue"
															   value="Moderate">
														<label for="FamilyValue3">
															Moderate
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
												<label for="AnnualIncome" style="padding-left: 10px;padding-top: 5px">Family
													Type *</label>
											</div>
											<div class="col-8">
												<div class="form-group clearfix" style="padding-top: 10px">
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyType1" name="FamilyType"
															   value="Joint Family">
														<label for="FamilyType1">
															Joint Family
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyType2" name="FamilyType"
															   value="Nuclear Family">
														<label for="FamilyType2">
															Nuclear Family
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
												<label for="AnnualIncome" style="padding-left: 10px;padding-top: 5px">Family
													Status *</label>
											</div>
											<div class="col-8">
												<div class="form-group clearfix" style="padding-top: 10px">
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyStatus1" name="FamilyStatus"
															   value="Middle Class">
														<label for="FamilyStatus1">
															Middle Class
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyStatus2" name="FamilyStatus"
															   value="Upper Middle Class">
														<label for="FamilyStatus2">
															Upper Middle Class
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="radio" id="FamilyStatus3" name="FamilyStatus"
															   value="Rich">
														<label for="FamilyStatus3">
															Rich
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
												<input type="text" name="FathersOccupation" class="form-control"
													   id="FathersOccupation" class="form-control">
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
												<input type="text" name="MothersOccupation" class="form-control"
													   id="MothersOccupation" class="form-control">
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
												<input type="text" name="NoOfBrothers" class="form-control"
													   id="NoOfBrothers" class="form-control">
											</div>
											<div class="col-3">
												<input type="text" name="BrothersMarried" class="form-control"
													   id="BrothersMarried" class="form-control">
											</div>
											<div class="col-3">
												<input type="text" name="NoOfSisters" class="form-control"
													   id="NoOfSisters" class="form-control">
											</div>
											<div class="col-3">
												<input type="text" name="SistersMarried" class="form-control"
													   id="SistersMarried" class="form-control">
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
												<label for="OldPassword" style="padding-left: 10px; padding-top: 5px">Old
													Password</label>
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
												<label for="NewPassword" style="padding-left: 10px; padding-top: 5px">New
													Password</label>
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
												<label for="ConfirmNewPassword"
													   style="padding-left: 10px; padding-top: 5px">Confirm New
													Password</label>
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
												From <select style="width:80px;" name="STAGE" id="STAGE" >
													<option value="">From</option>
												</select>
												To <select style="width:80px;" name="ENAGE" id="ENAGE" >
													<option value="">To</option>
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
														<input type="checkbox" id="MaritalStatus1" name="MaritalStatus"
															   value="Any">
														<label for="MaritalStatus1">
															Any
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="MaritalStatus2" name="MaritalStatus"
															   value="Never Married">
														<label for="MaritalStatus2">
															Never Married
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="MaritalStatus3" name="MaritalStatus"
															   value="Divorced">
														<label for="MaritalStatus3">
															Divorced&nbsp;
														</label>
													</div>
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="MaritalStatus4" name="MaritalStatus"
															   value="Widowed">
														<label for="MaritalStatus4">
															Widowed
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="MaritalStatus5" name="MaritalStatus"
															   value="Awaiting divorce">
														<label for="MaritalStatus5">
															Awaiting divorce
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Height" style="padding-left: 10px;">Height</label>
											</div>
											<div class="col-8">
												<select name="fromHeight" id="fromHeight">
													<option value="">Height</option>
												</select>
												To&nbsp;
												<select name="toHeight" id="toHeight">
													<option value="">Height</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="Height" style="padding-left: 10px;">Physical Status</label>
											</div>
											<div class="col-8">
												<div class="clearfix">
													<div class="icheck-primary d-inline">
														<input type="radio" id="PhysicalStatus1" name="PhysicalStatus"
															   value="Normal">
														<label for="PhysicalStatus1">
															Normal
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="radio" id="PhysicalStatus2" name="PhysicalStatus"
															   value="Physically challenged">
														<label for="PhysicalStatus2">
															Physically challenged
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="radio" id="PhysicalStatus3" name="PhysicalStatus"
															   value="Doesn't matter">
														<label for="PhysicalStatus3">
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
												<label for="Height" style="padding-left: 10px;">Eating Habits</label>
											</div>
											<div class="col-8">
												<div class="clearfix">

													<div class="icheck-primary d-inline">
														<input type="checkbox" id="EatingHabits4" name="EatingHabits"
															   value="Doesn't matter">
														<label for="BodyType4">
															Doesn't matter
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="EatingHabits1" name="EatingHabits"
															   value="Vegetarian">
														<label for="BodyType2">
															Vegetarian
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="EatingHabits2" name="EatingHabits"
															   value="Non Vegetarian">
														<label for="BodyType3">
															Non Vegetarian
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="EatingHabits3" name="EatingHabits"
															   value="Eggetarian">
														<label for="BodyType4">
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
														<input type="checkbox" id="DrinkingHabits1" name="DrinkingHabits"
															   value="Doesn't matter">
														<label for="DrinkingHabits1">
															Doesn't matter
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="DrinkingHabits2" name="DrinkingHabits"
															   value="Never drinks">
														<label for="DrinkingHabits2">
															Never drinks
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="DrinkingHabits3" name="DrinkingHabits"
															   value="Drinks socially">
														<label for="DrinkingHabits3">
															Drinks socially
														</label>
													</div>
													<br />
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="DrinkingHabits4" name="DrinkingHabits"
															   value="Drinks regularly">
														<label for="DrinkingHabits4">
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
														<input type="checkbox" id="SmokingHabits1" name="SmokingHabits"
															   value="Doesn't matter">
														<label for="SmokingHabits1">
															Doesn't matter
														</label>
													</div>
													<br>
													<div class="icheck-primary d-inline">
														<input type="checkbox" id="SmokingHabits2" name="SmokingHabits"
															   value="Never smokes">
														<label for="SmokingHabits2">
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
														<input type="checkbox" id="SmokingHabits4" name="SmokingHabits"
															   value="Smokes regularly">
														<label for="SmokingHabits4">
															Smokes regularly
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4">
												<label for="OldPassword" style="padding-left: 10px;">Religion</label>
											</div>
											<div class="col-8 align-middle">
												<select name="religion" id="religion" class="form-control">
													<option value="">Select</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="OldPassword" style="padding-left: 10px;">Mother Tongue</label>
											</div>
											<div class="col-8">
												<select name="MotherTongue" id="MotherTongue" class="form-control">
													<option value="">Select</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="OldPassword" style="padding-left: 10px;">Caste</label>
											</div>
											<div class="col-8">
												<select name="Caste" id="Caste" class="form-control">
													<option value="">Select</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="OldPassword" style="padding-left: 10px;padding-top: 5px;">Sub Caste</label>
											</div>
											<div class="col-8">
												<select name="SubCaste" id="SubCaste" class="form-control">
													<option value="">Select</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="OldPassword" style="padding-left: 10px;">Dosham</label>
											</div>
											<div class="col-8">
												<div class="clearfix">
													<div class="icheck-primary d-inline">
														<input type="radio" id="Dosham1" name="Dosham"
															   value="No">
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
												<label for="Star" style="padding-left: 10px;">Star</label>
											</div>
											<div class="col-8">
												<select name="Star" id="Star" class="form-control">
													<option value="">Select</option>
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
												<label for="Star" style="padding-left: 10px;">Education</label>
											</div>
											<div class="col-8">
												<select name="Star" id="Star" class="form-control">
													<option value="">Select</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="Star" style="padding-left: 10px;">Employed In</label>
											</div>
											<div class="col-8">
												<select name="Star" id="Star" class="form-control">
													<option value="">Select</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="Star" style="padding-left: 10px;">Occupation</label>
											</div>
											<div class="col-8">
												<select name="Star" id="Star" class="form-control">
													<option value="">Select</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-4 align-middle">
												<label for="Star" style="padding-left: 10px;">Annual Income</label>
											</div>
											<div class="col-8">
												<select name="Star" id="Star" class="form-control">
													<option value="">Select</option>
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
											<label for="Star" style="padding-left: 10px;">Country Living In</label>
										</div>
										<div class="col-8">
											<select name="CountryLivingIn" id="CountryLivingIn" class="form-control">
												<option value="">Select</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-4 align-middle">
											<label for="Star" style="padding-left: 10px;">Residing State</label>
										</div>
										<div class="col-8">
											<select name="ResidingState" id="ResidingState" class="form-control">
												<option value="">Select</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-4 align-middle">
											<label for="Star" style="padding-left: 10px;">District</label>
										</div>
										<div class="col-8">
											<select name="District" id="District" class="form-control">
												<option value="">Select</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-4 align-middle">
											<label for="Star" style="padding-left: 10px;">Citizenship</label>
										</div>
										<div class="col-8">
											<select name="Citizenship" id="Citizenship" class="form-control">
												<option value="">Select</option>
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
												<label for="WhatIAmLookingFor" style="padding-left: 10px;">What I am looking for</label>
											</div>
											<div class="col-8">
												<textarea name="WhatIAmLookingFor" id="WhatIAmLookingFor" class="form-control" rows="5"></textarea>
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
	<script>
		var headerNames = ["Basic Details", "Religion Information", "Location", "Professional Information", "Family Details", "Change Password", "Basic & Religion Preferences", "Professional Preferences", "Location Preferences", "What I am looking for"]
        var masterName = "<?php echo $title; ?>";
        var usersTable = $("#usersTable").DataTable({
            "responsive": true,
            "autoWidth": false,
            "pageLength": 5,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
        });

        $(function () {
            editAction(1)
        });

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

	</script>
