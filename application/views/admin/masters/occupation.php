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
									<label for="OccupationCategory1">OccupationCategory Name</label>
									<select name="inputOccupationCategoryName1" id="inputOccupationCategoryName1" class="form-control">
										<option value="">Select Occupation Category</option>
									</select>
								</div>
								<div class="form-group">
									<label for="inputOccupationName1">Occupation Name</label>
									<input type="text" class="form-control" id="inputOccupationName1" placeholder="Occupation Name">
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
							<table id="occupationTable" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>Occupation</th>
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
    var occupationTable = $("#occupationTable").DataTable({
        "responsive": true,
        "autoWidth": false,
        "pageLength": 5,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });

    $(function () {
        $("#masterName").html("Add "+masterName);
        $("#action").val("Add");

        getOccupationCategoryList();

        $('#inputOccupationCategoryName1').change(function() {
            getOccupationList();
        });



        $('#occupationTable').on("click", "button", function(){
            var rowId = $(this).attr("rowId")
            var that = this;
            $.get("/api/delete", {"id" : rowId, "tbl": "occupation"},  function(data, status) {
                if(data.responseMessage == "success"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-success alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Success!</h5>\n" +
                        "Occupation deleted successfully\n" +
                        "</div>"
                    );
                    occupationTable.row($(that).parents('tr')).remove().draw(false);
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

    function getOccupationList() {
        $.get("/api/occupation", {occupationCategory : $('#inputOccupationCategoryName1').val()}, function(data, status){
            occupationTable.clear().draw();
            data.map(function (d,i) {
                occupationTable.row.add( [
                    d.occupation_name,
                    "<td><a href='javascript:void(0)' onClick='fetchSingle("+d.occupation_id+")'>Edit</a></td>",
                    "<td><button rowId='"+d.occupation_id+"'>Delete</button></td>",
                ] ).draw( false );
            });
        });
    }

    function fetchSingle(id) {
        $.get("/api/occupation", {"dataId" : id}, function(data, status){
            if(data.length > 0){
                var link = " <a href='javascript:void(0)' onclick='changeToAdd(1)'>New</a>"
                $("#masterName").html("Edit "+masterName + link);
                $("#editId").val(data[0].occupation_id);
                $("#action").val("Edit");
                $("#inputOccupationName1").val(data[0].occupation_name);
                $("#inputOccupationCategoryName1").val(data[0].occupation_category_id);
            }
        });
    }

    function getOccupationCategoryList() {
        $.get("/api/occupationCategory",  {"dataId" : "All"}, function(data, status){
            data.map(function (d,i) {
                $("#inputOccupationCategoryName1").append("<option value=\""+d.occupation_category_id+"\">"+d.occupation_category_name+"</option>");
            });
        });
    }

    function addOrUpdate() {
        let action = $("#action").val();
        if(action == "Add" || action == "Edit"){
            let editId = $("#editId").val();
            let inputOccupationName1 = $("#inputOccupationName1").val();
            let inputOccupationCategoryName1 = $("#inputOccupationCategoryName1").val();
            let postJson = {
                "action" : action,
                "editId" : editId,
                "occupationName" : inputOccupationName1,
                "occupationCategory" : inputOccupationCategoryName1
            };
            $.post("/api/save-occupation", postJson, function(data, status){
                if(data["responseMessage"] == "success"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-success alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Success!</h5>\n" +
                        "Submitted successfully\n" +
                        "</div>"
                    );
                    getOccupationList(occupationTable)
                } else if(data["responseMessage"] == "exist"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-danger alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Failure!</h5>\n" +
                        "Occupation already exist" +
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
            getOccupationList();
            changeToAdd(2)
        }
    }

    function changeToAdd(k) {
        $("#action").val("Add");
        $("#editId").val("");
        $("#inputOccupationName1").val("");
        if(k == 1)
            $("#inputOccupationCategoryName1").val("");
        $("#masterName").html("Add "+masterName);
    }
</script>
