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
									<label for="inputEmployedInName1">EmployedIn Name</label>
									<input type="text" class="form-control" id="inputEmployedInName1" placeholder="EmployedIn Name">
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
							<table id="employedInTable" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>EmployedIn</th>
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
    var employedInTable = $("#employedInTable").DataTable({
        "responsive": true,
        "autoWidth": false,
        "pageLength": 5,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });

    $(function () {
        $("#masterName").html("Add "+masterName);
        $("#action").val("Add");

        getEmployedInList(employedInTable);

        $('#employedInTable').on("click", "button", function(){
            var rowId = $(this).attr("rowId")
            var that = this;
            $.get("/api/delete", {"id" : rowId, "tbl": "employedIn"},  function(data, status) {
                if(data.responseMessage == "success"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-success alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Success!</h5>\n" +
                        "EmployedIn deleted successfully\n" +
                        "</div>"
                    );
                    employedInTable.row($(that).parents('tr')).remove().draw(false);
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

    function fetchSingle(id) {
        $.get("/api/employedIn", {"dataId" : id}, function(data, status){
            if(data.length > 0){
                var link = " <a href='javascript:void(0)' onclick='changeToAdd()'>New</a>"
                $("#masterName").html("Edit "+masterName + link);
                $("#editId").val(data[0].employed_in_id);
                $("#action").val("Edit");
                $("#inputEmployedInName1").val(data[0].employed_in_name);
            }
        });
    }

    function getEmployedInList(employedInTable) {
        $.get("/api/employedIn", {"dataId" : "All"}, function(data, status){
            employedInTable.clear().draw();
            data.map(function (d,i) {
                employedInTable.row.add( [
                    d.employed_in_name,
                    "<td><a href='javascript:void(0)' onClick='fetchSingle("+d.employed_in_id+")'>Edit</a></td>",
                    "<td><button rowId='"+d.employed_in_id+"'>Delete</button></td>",
                ] ).draw( false );
            });
        });
    }

    function addOrUpdate() {
        let action = $("#action").val();
        if(action == "Add" || action == "Edit"){
            let editId = $("#editId").val();
            let inputEmployedInName1 = $("#inputEmployedInName1").val();
            let postJson = {
                "action" : action,
                "editId" : editId,
                "employedInName" : inputEmployedInName1
            };
            $.post("/api/save-employed-in", postJson, function(data, status){
                if(data["responseMessage"] == "success"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-success alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Success!</h5>\n" +
                        "Submitted successfully\n" +
                        "</div>"
                    );
                    getEmployedInList(employedInTable)
                } else if(data["responseMessage"] == "exist"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-danger alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Failure!</h5>\n" +
                        "EmployedIn already exist" +
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
            $("#action").val("Add");
            $("#editId").val("");
            $("#inputEmployedInName1").val("");
            $("#masterName").html("Add "+masterName);
        }
    }

    function changeToAdd() {
        $("#action").val("Add");
        $("#editId").val("");
        $("#inputEmployedInName1").val("");
        $("#masterName").html("Add "+masterName);
    }
</script>
