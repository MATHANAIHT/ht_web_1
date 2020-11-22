<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="<?php echo base_url("assets/plugins/select2/css/select2.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"); ?>">
<style>
	.dropbtn {
		background-color: #4CAF50;
		color: white;
		padding: 16px;
		font-size: 16px;
		border: none;
	}

	.dropdown {
		position: relative;
		display: inline-block;
	}

	.dropdown-content {
		display: none;
		position: absolute;
		background-color: #f1f1f1;
		min-width: 100px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
	}

	.dropdown-content a {
		color: black;
		padding: 6px 6px;
		text-decoration: none;
		display: block;
	}

	.dropdown-content a:hover {background-color: #ddd;}

	.dropdown:hover .dropdown-content {display: block;}

	.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

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
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-12 text-right">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
										Apply Filter
									</button>
									<br /><br />
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<table id="usersTable" class="table table-bordered table-striped">
										<thead>
										<tr>
											<th>Action</th>
											<th>ID</th>
											<th>Name</th>
											<th>Gender</th>
											<th>D.O.B</th>
											<th>Age</th>
											<th>Email</th>
											<th>Mobile</th>
											<th>Status</th>
											<th>Create At</th>
											<th>Last Login</th>
										</tr>
										</thead>
										<tbody></tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->

	<div class="modal fade" id="modal-default">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Search</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="card card-default card-tabs">
						<div class="card-header p-0 pt-1">
							<ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Basic Search</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Advanced Search</a>
								</li>
							</ul>
						</div>
						<div class="card-body">
							<form id="filterForm">
								<input type="text" name="dataId" id="dataId"value="A1ll">
								<div class="tab-content" id="custom-tabs-two-tabContent">
									<div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
										<div class="form-group">
											<div class="row">
												<div class="col-6">
													<input type="text" name="matrimony_id" placeholder="Search By Matrimony Id" class="form-control">
												</div>
												<div class="col-6">
													<input type="text" name="searchByName" placeholder="Search By Name" class="form-control">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-6">
													<input type="text" name="searchByMobile" placeholder="Search By Mobile" class="form-control">
												</div>
												<div class="col-6">
													<input type="text" name="searchByEmail" placeholder="Search By Email" class="form-control">
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
										<div class="form-group">
											<div class="row">
												<div class="col-4">
													<select name="profileStatus" id="profileStatus" class="form-control select2" style="width: 100%;">
														<option value="">Profile Status</option>
														<option value="UnVerified">UnVerified</option>
														<option value="Activated">Activated</option>
														<option value="Deactivated">Deactivated</option>
														<option value="Deleted">Deleted</option>
													</select>
												</div>
												<div class="col-4">
													<select name="gender" id="gender" class="form-control select2" style="width: 100%;">
														<option value="">Gender</option>
														<option value="Male">Male</option>
														<option value="FeMale">FeMale</option>
													</select>
												</div>
												<div class="col-4">
													<select name="lastLoginAt" id="lastLoginAt" class="form-control select2" style="width: 100%;">
														<option value="">Last Login At</option>
														<option value="1Day">1 Day</option>
														<option value="1Week">1 Week</option>
														<option value="1Month">1 Month</option>
														<option value="3Month">3 Month</option>
														<option value="6Month">6 Month</option>
														<option value="1Year">1 Year</option>
														<option value="MoreThan1Year">More than 1 Year</option>
														<option value="NeverLoggedIn">Never Logged In</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-4">
													<select name="fromAge" id="fromAge" class="form-control select2" style="width: 100%;">
														<option value="">From Age</option>
														<?php
														for($i=18; $i<71; $i++){
															$selected = "";
															echo "<option $selected value=\"".$i."\">".$i."</option>";
														}
														?>
													</select>
												</div>
												<div class="col-4">
													<select name="endAge" id="endAge" class="form-control select2" style="width: 100%;">
														<option value="">End Age</option>
														<?php
														for($i=18; $i<71; $i++){
															$selected = "";
															echo "<option $selected value=\"".$i."\">".$i."</option>";
														}
														?>
													</select>
												</div>
												<div class="col-4">
													<select name="profileCreatedAt" id="profileCreatedAt" class="form-control select2" style="width: 100%;">
														<option value="">Profile Created At</option>
														<option value="1Day">1 Day</option>
														<option value="1Week">1 Week</option>
														<option value="1Month">1 Month</option>
														<option value="3Month">3 Month</option>
														<option value="6Month">6 Month</option>
														<option value="1Year">1 Year</option>
														<option value="MoreThan1Year">More than 1 Year</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-4">
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
													<select name="fromHeight" id="fromHeight" class="form-control select2" style="width: 100%;">
														<option value="">From Height</option>

														<?php echo  personHeightOptions(""); ?>
													</select>
												</div>
												<div class="col-4">
													<select name="endHeight" id="endHeight" class="form-control select2" style="width: 100%;">
														<option value="">End Height</option>

														<?php echo  personHeightOptions(""); ?>
													</select>
												</div>
												<div class="col-4">
													<?php $marital_status = "" ; ?>
													<select name="maritalStatus" id="maritalStatus"
															class="form-control" style="width: 100%;" multiple>
														<option value="">Select</option>
														<option value="NeverMarried" <?php if($marital_status == "NeverMarried") { echo "selected"; }?>>Never Married</option>
														<option value="Widowed" <?php if($marital_status == "Widowed") { echo "selected"; }?>>Widowed</option>
														<option value="Divorced" <?php if($marital_status == "Divorced") { echo "selected"; }?>>Divorced</option>
														<option value="AwaitingDivorce" <?php if($marital_status == "AwaitingDivorce") { echo "selected"; }?>>Awaiting divorce</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<!-- /.card -->
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="getUsersList()">Save changes</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
<!-- /.content-wrapper -->
<script src="<?php echo base_url("assets/plugins/select2/js/select2.full.min.js"); ?>"></script>
<script>
    var masterName = "<?php echo $title; ?>";
    var usersTable = $("#usersTable").DataTable({
        "responsive": true,
        "autoWidth": false,
        "pageLength": 5,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });

    $(function () {
        $("#masterName").html("Add "+masterName);
        $("#action").val("Add");

        getUsersList();

        $('.select2').select2();

        $("#maritalStatus").select2({
            placeholder: "Marital Status"
        });

    });

    function manageProfile(mId, action) {
        $.post('/api/profile', {matrimony: mId, action: action},  function(data, status){
            if(data.responseCode == "success") {
                toastr.success(data.responseMessage)
			} else {
                toastr.error(data.responseMessage)
			}
        })
    }

    function getUsersList() {
        // alert()
        $.post("/api/search", $("#filterForm").serialize(), function(data, status){
            usersTable.clear().draw();
            data.map(function (d,i) {
                let dropDown = '<div class="dropdown">' +
                    '<span class="fa fa-xs fa-edit"></span>' +
                    '<div class="dropdown-content">' +
                    '<a href="/admin/users/edit/'+d.matrimony_id+'" style="color: blue" target="_blank" >Edit</a>' +
                    '<a href="#" style="color: blue" onclick="manageProfile(\''+d.matrimony_id+'\', \'Activate\')">Activate</a>' +
                    '<a href="#" style="color: blue" onclick="manageProfile(\''+d.matrimony_id+'\', \'Deactivate\')">DeActivate</a>' +
                    '<a href="#" style="color: red" onclick="manageProfile(\''+d.matrimony_id+'\', \'Delete\')">Delete</a>' +
                    '</div>' +
                    '</div>';

                usersTable.row.add( [
                    dropDown,
                    d.matrimony_id,
                    d.full_name,
                    d.gender,
                    d.date_of_birth,
                    d.age,
                    d.email_id,
                    d.mobile_number,
                    d.profile_status,
                    d.created_at,
                    d.last_login
				] ).draw( false );
            });
        });
    }

</script>

