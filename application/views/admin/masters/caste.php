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
									<label for="inputCasteName1">Caste Name</label>
									<input type="text" class="form-control" id="inputCasteName1" placeholder="Caste Name">
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
							<table id="casteTable" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>Caste</th>
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
    var casteTable = $("#casteTable").DataTable({
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
            getCasteList();
        });



        $('#casteTable').on("click", "button", function(){
            var rowId = $(this).attr("rowId")
            var that = this;
            $.get("/api/delete", {"id" : rowId, "tbl": "caste"},  function(data, status) {
                if(data.responseMessage == "success"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-success alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Success!</h5>\n" +
                        "Caste deleted successfully\n" +
                        "</div>"
                    );
                    casteTable.row($(that).parents('tr')).remove().draw(false);
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

    function getCasteList() {
        $.get("/api/caste", {religion : $('#inputReligionName1').val()}, function(data, status){
            casteTable.clear().draw();
            data.map(function (d,i) {
                casteTable.row.add( [
                    d.caste_name,
                    "<td><a href='javascript:void(0)' onClick='fetchSingle("+d.caste_id+")'>Edit</a></td>",
                    "<td><button rowId='"+d.caste_id+"'>Delete</button></td>",
                ] ).draw( false );
            });
        });
    }

    function fetchSingle(id) {
        $.get("/api/caste", {"dataId" : id}, function(data, status){
            if(data.length > 0){
                var link = " <a href='javascript:void(0)' onclick='changeToAdd(1)'>New</a>"
                $("#masterName").html("Edit "+masterName + link);
                $("#editId").val(data[0].caste_id);
                $("#action").val("Edit");
                $("#inputCasteName1").val(data[0].caste_name);
                $("#inputReligionName1").val(data[0].religion_id);
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
            let inputReligionName1 = $("#inputReligionName1").val();
            let postJson = {
                "action" : action,
                "editId" : editId,
                "casteName" : inputCasteName1,
                "religion" : inputReligionName1
            };
            $.post("/api/save-caste", postJson, function(data, status){
                if(data["responseMessage"] == "success"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-success alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Success!</h5>\n" +
                        "Submitted successfully\n" +
                        "</div>"
                    );
                    getCasteList(casteTable)
                } else if(data["responseMessage"] == "exist"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-danger alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Failure!</h5>\n" +
                        "Caste already exist" +
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
            getCasteList();
            changeToAdd(2)
        }
    }

    function changeToAdd(k) {
        $("#action").val("Add");
        $("#editId").val("");
        $("#inputCasteName1").val("");
        if(k == 1)
            $("#inputReligionName1").val("");
        $("#masterName").html("Add "+masterName);
    }
</script>
