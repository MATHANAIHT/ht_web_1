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
									<label for="Religion1">Religion Name</label>
									<select name="inputReligionName1" id="inputReligionName1" class="form-control">
										<option value="">Select Religion</option>
									</select>
								</div>
								<div class="form-group">
									<label for="Caste1">Caste Name</label>
									<select name="inputCasteName1" id="inputCasteName1" class="form-control">
										<option value="">Select Caste</option>
									</select>
								</div>
								<div class="form-group">
									<label for="inputSubCasteName1">Sub Caste Name</label>
									<input type="text" class="form-control" id="inputSubCasteName1" placeholder="SubCaste Name">
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
							<table id="subCasteTable" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>SubCaste</th>
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
    var subCasteTable = $("#subCasteTable").DataTable({
        "responsive": true,
        "autoWidth": false,
        "pageLength": 5,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });

    $(function () {
        $("#masterName").html("Add "+masterName);
        $("#action").val("Add");

        getReligionList();

        $('#inputReligionName1').change(function() {
            let religionId = $('#inputReligionName1').val()
            getCasteList(religionId);
        });

        $('#inputCasteName1').change(function() {
            getSubCasteList();
        });

        $('#subCasteTable').on("click", "button", function(){
            var rowId = $(this).attr("rowId")
            var that = this;
            $.get("/api/delete", {"id" : rowId, "tbl": "subCaste"},  function(data, status) {
                if(data.responseMessage == "success"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-success alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Success!</h5>\n" +
                        "Sub Caste deleted successfully\n" +
                        "</div>"
                    );
                    subCasteTable.row($(that).parents('tr')).remove().draw(false);
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

    function getCasteList(religionId) {
        $("#inputCasteName1").empty().append("<option value=\"\">Select Caste</option>");
        $.get("/api/caste", { religion : religionId }, function(data, status){
            data.map(function (d,i) {
                $("#inputCasteName1").append("<option value=\""+d.caste_id+"\">"+d.caste_name+"</option>");
            });
		});
    }

    function getSubCasteList() {
        $.get("/api/subCaste", { caste : $('#inputCasteName1').val()}, function(data, status){
            subCasteTable.clear().draw();
            data.map(function (d,i) {
                subCasteTable.row.add( [
                    d.sub_caste_name,
                    "<td><a href='javascript:void(0)' onClick='fetchSingle("+d.sub_caste_id+", "+d.religion_id+")'>Edit</a></td>",
                    "<td><button rowId='"+d.sub_caste_id+"'>Delete</button></td>",
                ] ).draw( false );
            });
        });
    }

    function fetchSingle(sub_caste_id, religion_id) {
        getCasteList(religion_id)
        $.get("/api/subCaste", {"dataId" : sub_caste_id}, function(data, status){
            if(data.length > 0){
                var link = " <a href='javascript:void(0)' onclick='changeToAdd(1)'>New</a>"
                $("#masterName").html("Edit "+masterName + link);
                $("#editId").val(data[0].sub_caste_id);
                $("#action").val("Edit");
                $("#inputSubCasteName1").val(data[0].sub_caste_name);
                $("#inputReligionName1").val(data[0].religion_id);
                $("#inputCasteName1").val(data[0].caste_id);
            }
        });
    }

    function getReligionList() {
        $.get("/api/religion",  {"dataId" : "All"}, function(data, status){
            data.map(function (d,i) {
                $("#inputReligionName1").append("<option value=\""+d.religion_id+"\">"+d.religion_name+"</option>");
            });
        });
    }

    function addOrUpdate() {
        let action = $("#action").val();
        if(action == "Add" || action == "Edit"){
            let editId = $("#editId").val();
            let inputCasteName1 = $("#inputCasteName1").val();
            let inputSubCasteName1 = $("#inputSubCasteName1").val();
            let inputReligionName1 = $("#inputReligionName1").val();
            let postJson = {
                "action" : action,
                "editId" : editId,
                "religion" : inputReligionName1,
                "caste" : inputCasteName1,
                "subCasteName" : inputSubCasteName1
            };
            $.post("/api/save-sub-caste", postJson, function(data, status){
                if(data["responseMessage"] == "success"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-success alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Success!</h5>\n" +
                        "Submitted successfully\n" +
                        "</div>"
                    );
                    getSubCasteList()
                } else if(data["responseMessage"] == "exist"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-danger alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Failure!</h5>\n" +
                        "SubCaste already exist" +
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
            getSubCasteList();
            changeToAdd(2)
        }
    }

    function changeToAdd(k) {
        $("#action").val("Add");
        $("#editId").val("");
        $("#inputSubCasteName1").val("");
        if(k == 1){
            $("#inputReligionName1").val("");
            $("#inputCasteName1").val("");
            $("#inputCasteName1").empty().append("<option value=\"\">Select Caste</option>");
        }
        $("#masterName").html("Add "+masterName);
    }
</script>
