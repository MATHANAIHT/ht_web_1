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
									<label for="ReligionName1">Religion Name</label>
									<select name="ReligionName1" id="ReligionName1" class="form-control">
										<option value="">Select Religion</option>
									</select>
								</div>
								<div class="form-group">
									<label for="casteName1">Caste Name</label>
									<input type="text" class="form-control" id="casteName1" placeholder="Caste Name">
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
							<table id="religionTable" class="table table-bordered table-striped">
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
    console.log("HI error " + masterName)
    $(function () {
        var religionTable = $("#religionTable").DataTable({
            "responsive": true,
            "autoWidth": false,
            "pageLength": 5,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
        });

        $.get("/api/religion", function(data, status){
            data.map(function (d,i) {
                $("#ReligionName1").append("<option value=\""+d.rid+"\">"+d.rname+"</option>");
            });
        });
        $('#ReligionName1').change(function() {
            $.get("/api/caste", {religion : $('#ReligionName1').val()},function(data, status){
                religionTable.clear().draw();
                data.map(function (d,i) {
                    religionTable.row.add( [
                        d.cname,
                        'Edit',
                        'Delete',
                    ] ).draw( false );
                });
            });
        });
    });
</script>
