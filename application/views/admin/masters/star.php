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
									<label for="RaasiName1">Rassi Name</label>
									<select name="RaasiName1" id="RaasiName1" class="form-control">
										<option value="">Select Raasi</option>
									</select>
								</div>
								<div class="form-group">
									<label for="StarName1">Star Name</label>
									<input type="text" class="form-control" id="StarName1" placeholder="Star Name">
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
							<table id="starTable" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>Star</th>
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
        var starTable = $("#starTable").DataTable({
            "responsive": true,
            "autoWidth": false,
            "pageLength": 5,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
        });

        $.get("/api/raasi", function(data, status){
            data.map(function (d,i) {
                $("#RaasiName1").append("<option value=\""+d.id+"\">"+d.rname+"</option>");
            });
        });
        $('#RaasiName1').change(function() {
            $.get("/api/star", {raasi : $('#RaasiName1').val()},function(data, status){
                starTable.clear().draw();
                data.map(function (d,i) {
                    starTable.row.add( [
                        d.sname,
                        'Edit',
                        'Delete',
                    ] ).draw( false );
                });
            });
        });
    });
</script>
