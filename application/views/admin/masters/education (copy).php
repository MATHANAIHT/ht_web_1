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

				<!-- /.col-md-6 -->
				<div class="col-lg-6">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h5 class="m-0" id="masterName"></h5>
						</div>
						<form role="form">
							<div class="card-body">
								<div id="messageDisplay"></div>
								<input type="hidden" id="action" value="Add">
								<input type="hidden" id="editId" value="">
								<div class="form-group">
									<label for="EducationCategory1">Education Category Name</label>
									<select name="inputEducationCategoryName1" id="inputEducationCategoryName1" class="form-control">
										<option value="">Select Education Category</option>
									</select>
								</div>
								<div class="form-group">
									<label for="inputEducationName1">Education Name</label>
									<input type="text" class="form-control" id="inputEducationName1" placeholder="Education Name">
								</div>
								<br />
							</div>
							<div class="card-footer">
								<button type="button" class="btn btn-primary" onclick="addOrUpdate()">Submit</button>
							</div>
						</form>
					</div>
				</div>
				<!-- /.col-md-6 -->
				<div class="col-lg-6">
					<div class="card">
						<div class="card-body">
							<table id="educationTable" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>Education</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
								</thead>
								<tbody></tbody>
							</table>
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
    var masterName = "<?php echo $title; ?>";
    var educationTable = $("#educationTable").DataTable({
        "responsive": true,
        "autoWidth": false,
        "pageLength": 5,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });

    $(function () {
        $("#masterName").html("Add "+masterName);
        $("#action").val("Add");

        getEducationCategoryList();

        $('#inputEducationCategoryName1').change(function() {
            getEducationList();
        });



        $('#educationTable').on("click", "button", function(){
            var rowId = $(this).attr("rowId")
            var that = this;
            $.get("/api/delete", {"id" : rowId, "tbl": "education"},  function(data, status) {
                if(data.responseMessage == "success"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-success alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Success!</h5>\n" +
                        "Education deleted successfully\n" +
                        "</div>"
                    );
                    educationTable.row($(that).parents('tr')).remove().draw(false);
                } else {
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-danger alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Failure!</h5>\n" +
                        "Could not perform this delete action." +
                        "</div>"
                    );
                }
                setTimeout(function () {
                    $("#messageDisplay").html("");
                }, 3000)
            });
        });
    });

    function getEducationList() {
        $.get("/api/education", {educationCategory : $('#inputEducationCategoryName1').val()}, function(data, status){
            educationTable.clear().draw();
            data.map(function (d,i) {
                educationTable.row.add( [
                    d.education_name,
                    "<td><a href='javascript:void(0)' onClick='fetchSingle("+d.education_id+")'>Edit</a></td>",
                    "<td><button rowId='"+d.education_id+"'>Delete</button></td>",
                ] ).draw( false );
            });
        });
    }

    function fetchSingle(id) {
        $.get("/api/education", {"dataId" : id}, function(data, status){
            if(data.length > 0){
                var link = " <a href='javascript:void(0)' onclick='changeToAdd(1)'>New</a>"
                $("#masterName").html("Edit "+masterName + link);
                $("#editId").val(data[0].education_id);
                $("#action").val("Edit");
                $("#inputEducationName1").val(data[0].education_name);
                $("#inputEducationCategoryName1").val(data[0].education_category_id);
            }
        });
    }

    function getEducationCategoryList() {
        $.get("/api/educationCategory",  {"dataId" : "All"}, function(data, status){
            data.map(function (d,i) {
                $("#inputEducationCategoryName1").append("<option value=\""+d.education_category_id+"\">"+d.education_category_name+"</option>");
            });
        });
    }

    function addOrUpdate() {
        let action = $("#action").val();
        if(action == "Add" || action == "Edit"){
            let editId = $("#editId").val();
            let inputEducationName1 = $("#inputEducationName1").val();
            let inputEducationCategoryName1 = $("#inputEducationCategoryName1").val();
            let postJson = {
                "action" : action,
                "editId" : editId,
                "educationName" : inputEducationName1,
                "educationCategory" : inputEducationCategoryName1
            };
            $.post("/api/save-education", postJson, function(data, status){
                if(data["responseMessage"] == "success"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-success alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Success!</h5>\n" +
                        "Submitted successfully\n" +
                        "</div>"
                    );
                    getEducationList(educationTable)
                } else if(data["responseMessage"] == "exist"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-danger alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Failure!</h5>\n" +
                        "Education already exist" +
                        "</div>"
                    );
                } else if(data["responseMessage"] == "error"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-danger alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Failure!</h5>\n" +
                        "Could not perform this delete action." +
                        "</div>"
                    );
                }
                setTimeout(function () {
                    $("#messageDisplay").html("");
                }, 3000)
            });
            getEducationList();
            changeToAdd(2)
        }
    }

    function changeToAdd(k) {
        $("#action").val("Add");
        $("#editId").val("");
        $("#inputEducationName1").val("");
        if(k == 1)
            $("#inputEducationCategoryName1").val("");
        $("#masterName").html("Add "+masterName);
    }
</script>
