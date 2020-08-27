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
						<li class="breadcrumb-item"><a href="#">Home</a></li>
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
							<h5 class="m-0">Add <?php echo $title; ?></h5>
						</div>
						<form role="form">
							<div class="card-body">
								<div id="messageDisplay"></div>
								<div class="form-group">
									<label for="exampleInputEmail1">Country Name</label>
									<input type="text" class="form-control" id="exampleInputCountryName1" placeholder="Country Name">
								</div>
								<div class="form-group">
									<label for="exampleInputShortName1">Short Name</label>
									<input type="text" class="form-control" id="exampleInputShortName1" placeholder="Short Name">
								</div>
								<div class="form-group">
									<label for="exampleInputDialingCode1">Dialing Code</label>
									<input type="text" class="form-control" id="exampleInputDialingCode1" placeholder="Dialing Code">
								</div>
								<br />
							</div>
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
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
        $.get("/api/country", function(data, status){
            data.map(function (d,i) {
                countryTable.row.add( [
                    d.name,
                    d.code,
                    d.dialing,
                    "<td><a href='javascript:void(0)' onClick='deleteData("+d.id+", this)'>Edit</a></td>",
                    "<td><button rowId='"+d.id+"'>Delete</button></td>",
                ] ).draw( false );
            });

        });

        $('#countryTable').on("click", "button", function(){
            var rowId = $(this).attr("rowId")
            $.get("/api/delete", {"id" : rowId, "tbl": "country"},  function(data, status) {
                if(data.responseMessage == "success"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-success alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Success!</h5>\n" +
                        "Country deleted successfully\n" +
                        "</div>"
                    );
                    countryTable.row($(this).parents('tr')).remove().draw(false);
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
    function deleteData(id, thisObj) {

    }

</script>
