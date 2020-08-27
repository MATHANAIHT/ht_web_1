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
								<div class="form-group">
									<label for="Country1">Country Name</label>
									<select name="CountryName1" id="CountryName1" class="form-control">
										<option value="">Select Country</option>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">State Name</label>
									<input type="text" class="form-control" id="exampleInputStateName1" placeholder="State Name">
								</div>
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
							<table id="stateTable" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>State</th>
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
    console.log("HI error " + masterName)
    $(function () {
        var stateTable = $("#stateTable").DataTable({
            "responsive": true,
            "autoWidth": false,
            "pageLength": 5,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
        });

        $.get("/api/country", function(data, status){
            data.map(function (d,i) {
                $("#CountryName1").append("<option value=\""+d.id+"\">"+d.name+"</option>");
            });
        });
        $('#CountryName1').change(function() {
            $.get("/api/state", {country : $('#CountryName1').val()},function(data, status){
                stateTable.clear().draw();
                data.map(function (d,i) {
                    stateTable.row.add( [
                        d.name,
                        "<td><a href='javascript:void(0)' onClick='deleteData("+d.id+")'>Edit</a></td>",
                        "<td><a href='javascript:void(0)' onClick='deleteData("+d.id+")'>Delete</a></td>",
                    ] ).draw( false );
                });
            });
        });
    });

    function deleteData(id) {
        $.get("/api/delete", {"id" : id, "tbl": "state"},  function(data, status) {
            alert(data)
        });
    }
</script>
