<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="hold-transition sidebar-mini">
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
<div class="wrapper">
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1><?php echo $title; ?></h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Add <?php echo $title; ?></li>
						</ol>
					</div>
				</div>
			</div>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary card-outline">
						<!--<div class="card-header">
							<h3 class="card-title"><?php /*echo $title; */?></h3>
						</div>-->
						<div class="card-body">
							<form action="" id="addUserForm">
								<div id="messageDisplay"></div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<div class="row">
												<div class="col-4" >
													<label for="Name" style="padding-left: 10px;padding-top: 5px">Profile</label>
												</div>
												<div class="col-8">
													<select name="profileCreatedFor" id="profileCreatedFor" class="form-control select2" style="width: 100%;">
														<option value="" >Profile created for</option>
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
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<div class="row">
												<div class="col-4" >
													<label for="Name" style="padding-left: 10px;padding-top: 5px">Name:</label>
												</div>
												<div class="col-8">
													<input type="Name" class="form-control" id="fullName" name="fullName" class="form-control">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<div class="row">
												<div class="col-4" >
													<label for="Name" style="padding-left: 10px;padding-top: 5px">Gender</label>
												</div>
												<div class="col-8">
													<div class="form-group clearfix" style="padding-top: 10px">
														<div class="icheck-primary d-inline">
															<input type="radio" id="gender1" name="gender" value="Male">
															<label for="gender1">
																Male&nbsp;
															</label>
														</div>
														<div class="icheck-primary d-inline">
															<input type="radio" id="gender2" name="gender" value="Female">
															<label for="gender2">
																Female&nbsp;
															</label>
														</div>
														<div class="icheck-primary d-inline">
															<input type="radio" id="gender3" name="gender" value="Other">
															<label for="gender3">
																Other
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<div class="row">
												<div class="col-4" >
													<label for="Name" style="padding-left: 10px;padding-top: 5px">Date of Birth</label>
												</div>
												<div class="col-8">
													<div class="row">
														<div class="col-4 text-center">
															<select name="dateOfBirth3" id="dateOfBirth3" class="form-control">
																<option value="">Year</option>
															</select>
														</div>
														<div class="col-4 text-center">
															<select name="dateOfBirth2" id="dateOfBirth2" class="form-control">
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
															<select name="dateOfBirth1" id="dateOfBirth1" class="form-control">
																<option value="">Date</option>
															</select>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<div class="row">
												<div class="col-4" >
													<label for="Name" style="padding-left: 10px;padding-top: 5px">Religion</label>
												</div>
												<div class="col-8">
													<select name="religion" id="religion" class="form-control select2" style="width: 100%;">
														<option value="">Select</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<div class="row">
												<div class="col-4" >
													<label for="Name" style="padding-left: 10px; padding-top: 5px">Caste</label>
												</div>
												<div class="col-8">
													<select name="caste" id="caste" class="form-control select2" style="width: 100%;">
														<option value="">Select</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<div class="row">
												<div class="col-4" >
													<label for="Name" style="padding-left: 10px;padding-top: 5px">Marital Status</label>
												</div>
												<div class="col-8">
													<select name="maritalStatus" id="maritalStatus" class="form-control select2" style="width: 100%;">
														<option value="">Select</option>
														<option value="NeverMarried">Never Married</option>
														<option value="Widowed">Widowed</option>
														<option value="Divorced">Divorced</option>
														<option value="AwaitingDivorce">Awaiting divorce</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<div class="row">
												<div class="col-4" >
													<label for="Name" style="padding-left: 10px; padding-top: 5px">Mother Tongue</label>
												</div>
												<div class="col-8">
													<select name="motherTongue" id="motherTongue" class="form-control select2" style="width: 100%;">
														<option value="">Select</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<div class="row">
												<div class="col-4" >
													<label for="Name" style="padding-left: 10px; padding-top: 5px">Country</label>
												</div>
												<div class="col-8">
													<select name="country" id="country" class="form-control select2" style="width: 100%;">
														<option value="">Select</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<div class="row">
												<div class="col-4" >
													<label for="Name" style="padding-left: 10px;padding-top: 5px">Mobile</label>
												</div>
												<div class="col-8">
													<input type="text" name="mobile" class="form-control" id="mobileNumber" class="form-control" maxlength="10">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<div class="row">
												<div class="col-4" >
													<label for="Name" style="padding-left: 10px;padding-top: 5px">Email</label>
												</div>
												<div class="col-8">
													<input type="text" name="email" class="form-control" id="emailAddress" class="form-control">
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<div class="row">
												<div class="col-4" >
													<label for="Name" style="padding-left: 10px; padding-top: 5px">Password</label>
												</div>
												<div class="col-8">
													<input type="password" name="password" class="form-control" id="password" class="form-control">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">

									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<div class="row">
												<div class="col-4" >
												</div>
												<div class="col-8">
													<input type="button" id="createUser" class="btn btn-primary form-control" value="Create">
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<script src="<?php echo base_url("assets/plugins/select2/js/select2.full.min.js"); ?>"></script>

	<script>
        let d = new Date();
        let y = d.getFullYear();
        let dayArray=new Array("31","28","31","30","31","30","31","31","30","31","30","31");

        for (j = y-18; j >1950; j--) {
            $("#dateOfBirth3").append("<option value=\""+(j)+"\">"+(j)+"</option>")
        }

        function getReligionList() {
            $.get("/api/religion",  {"dataId" : "All"}, function(data, status){
                data.map(function (d,i) {
                    $("#religion").append("<option value=\""+d.religion_id+"\">"+d.religion_name+"</option>");
                });
            });
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

        function getMotherTongueList() {
            $.get("/api/motherTongue", {"dataId" : "All"}, function(data, status){
                $("#motherTongue").empty().append("<option value=\"\">Select</option>");
                data.map(function (d,i) {
                    $("#motherTongue").append("<option value=\""+d.mother_tongue_id+"\">"+d.mother_tongue_name+"</option>");
                });
            });
        }

        function getCountryList() {
            $.get("/api/country", {"dataId" : "All"}, function(data, status){
                $("#country").empty().append("<option value=\"\">Select</option>");
                data.map(function (d,i) {
                    $("#country").append("<option value=\""+d.country_id+"\">("+d.international_dialing+ ") " +d.country_name+"</option>");
                });
            });
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
            getReligionList();
            getMotherTongueList();
            getCountryList();
            $('.select2').select2();

            onChangeMonth(1);

            $('#religion').change(function() {
                getCasteList();
            });

            $('#dateOfBirth3').change(function() {
                onChangeYear($('#dateOfBirth3').val())
            });

            $('#dateOfBirth2').change(function() {
                onChangeMonth($('#dateOfBirth2').val())
            });

            $('#createUser').click(function () {
                $.post("/api/users/add", $('#addUserForm').serialize(), function(data, status){
					if(data["error"] != ""){
					    let dataType = data["dataType"];
					    let MESSAGE = data["message"];
                        if(dataType == "error"){
                            let msg = ""
							if(MESSAGE.includes("::::")){
                                let errArray = MESSAGE.split("::::");
                                msg = errArray[0]
							} else {
							    msg = MESSAGE
							}
                            $("#messageDisplay").html(
                                "<div class=\"alert alert-danger alert-dismissible\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                                "<h5><i class=\"icon fas fa-check\"></i> Failure!</h5>\n" +
                                msg +
                                "</div>"
                            );
						} else {
                            $("#messageDisplay").html(
                                "<div class=\"alert alert-success alert-dismissible\">\n" +
                                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                                "<h5><i class=\"icon fas fa-check\"></i> Success!</h5>\n" +
                                "Submitted successfully\n" +
                                "</div>"
                            );
                            $("#addUserForm").trigger("reset");
                            $('.select2').val("").trigger('change');
						}
						setTimeout(function () {
							$("#messageDisplay").html("");
						}, 3000)
					}
                });
            })
        });

	</script>
</div>

