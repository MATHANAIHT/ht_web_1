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
									<label for="inputCountryName1">Country Name</label>
									<input type="text" class="form-control" id="inputCountryName1" placeholder="Country Name">
								</div>
								<div class="form-group">
									<label for="inputShortName1">Short Name</label>
									<input type="text" class="form-control" id="inputShortName1" placeholder="Short Name">
								</div>
								<div class="form-group">
									<label for="inputDialingCode1">Dialing Code</label>
									<input type="text" class="form-control" id="inputDialingCode1" placeholder="Dialing Code">
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
							<table id="countryTable" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>Country</th>
									<th>Short</th>
									<th>Dialing</th>
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
    var countryTable = $("#countryTable").DataTable({
        "responsive": true,
        "autoWidth": false,
        "pageLength": 5,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });

    $(function () {
        $("#masterName").html("Add "+masterName);
        $("#action").val("Add");

        getCountryList(countryTable);

        $('#countryTable').on("click", "button", function(){
            var rowId = $(this).attr("rowId")
			var that = this;
            $.get("/api/delete", {"id" : rowId, "tbl": "country"},  function(data, status) {
                if(data.responseMessage == "success"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-success alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Success!</h5>\n" +
                        "Country deleted successfully\n" +
                        "</div>"
                    );
                    countryTable.row($(that).parents('tr')).remove().draw(false);
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
        $.get("/api/country", {"dataId" : id}, function(data, status){
			if(data.length > 0){
			    var link = " <a href='javascript:void(0)' onclick='changeToAdd()'>New</a>"
                $("#masterName").html("Edit "+masterName + link);
                $("#editId").val(data[0].country_id);
                $("#action").val("Edit");
                $("#inputCountryName1").val(data[0].country_name);
                $("#inputShortName1").val(data[0].country_code);
                $("#inputDialingCode1").val(data[0].international_dialing)
            }
        });
    }

    function getCountryList(countryTable) {
        $.get("/api/country", {"dataId" : "All"}, function(data, status){
            countryTable.clear().draw();
            data.map(function (d,i) {
                countryTable.row.add( [
                    d.country_name,
                    d.country_code,
                    d.international_dialing,
                    "<td><a href='javascript:void(0)' onClick='fetchSingle("+d.country_id+")'>Edit</a></td>",
                    "<td><button rowId='"+d.country_id+"'>Delete</button></td>",
                ] ).draw( false );
            });
        });
    }

    function addOrUpdate() {
        let action = $("#action").val();
		if(action == "Add" || action == "Edit"){
            let editId = $("#editId").val();
			let inputCountryName1 = $("#inputCountryName1").val();
			let inputShortName1 = $("#inputShortName1").val();
			let inputDialingCode1 = $("#inputDialingCode1").val();
            let postJson = {
                "action" : action,
                "editId" : editId,
				"countryName" : inputCountryName1,
				"shortName" : inputShortName1,
				"dialingCode" : inputDialingCode1,
			};
            $.post("/api/save-country", postJson, function(data, status){
				if(data["responseMessage"] == "success"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-success alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Success!</h5>\n" +
                        "Submitted successfully\n" +
                        "</div>"
                    );
                    getCountryList(countryTable)
                } else if(data["responseMessage"] == "exist"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-danger alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Failure!</h5>\n" +
                        "Country already exist" +
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
            $("#inputCountryName1").val("");
            $("#inputShortName1").val("");
            $("#inputDialingCode1").val("");
            $("#masterName").html("Add "+masterName);
        }
    }

    function changeToAdd() {
        $("#action").val("Add");
        $("#editId").val("");
        $("#inputCountryName1").val("");
        $("#inputShortName1").val("");
        $("#inputDialingCode1").val("");
        $("#masterName").html("Add "+masterName);
    }
</script>
