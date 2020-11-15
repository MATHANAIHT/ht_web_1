<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
	.dropbtn {
		background-color: #4CAF50;
		color: white;
		padding: 16px;
		font-size: 16px;
		border: none;
	}

	.dropdown {
		position: relative;
		display: inline-block;
	}

	.dropdown-content {
		display: none;
		position: absolute;
		background-color: #f1f1f1;
		min-width: 100px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
	}

	.dropdown-content a {
		color: black;
		padding: 6px 6px;
		text-decoration: none;
		display: block;
	}

	.dropdown-content a:hover {background-color: #ddd;}

	.dropdown:hover .dropdown-content {display: block;}

	.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
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
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<table id="galleryTable" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>Image</th>
									<th>Matrimony Id</th>
									<th>Status</th>
									<th>Primary</th>
									<th>Approved By</th>
									<th>Approved At</th>
									<th>Create At</th>
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
    var galleryTable = $("#galleryTable").DataTable({
        "responsive": true,
        "autoWidth": false,
        "pageLength": 5,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });

    $(function () {
        getGalleryList(galleryTable);

        $('#galleryTable').on("click", "button", function(){
            var rowId = $(this).attr("rowId")
            var that = this;
            $.get("/api/delete", {"id" : rowId, "tbl": "users"},  function(data, status) {
                if(data.responseMessage == "success"){
                    $("#messageDisplay").html(
                        "<div class=\"alert alert-success alert-dismissible\">\n" +
                        "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                        "<h5><i class=\"icon fas fa-check\"></i> Success!</h5>\n" +
                        "Gallery deleted successfully\n" +
                        "</div>"
                    );
                    galleryTable.row($(that).parents('tr')).remove().draw(false);
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

    function getGalleryList(galleryTable) {
        $.get("/api/gallery", {"dataId" : "All"}, function(data, status){
            galleryTable.clear().draw()
            data.map(function (d,i) {
                var im = "profile/"+d.matrimony_id+"/"+d.image
                var img = '<?php echo base_url("'+im+'"); ?>';
                let dropDown = '<div class="dropdown">' +
                    '<span class="fa fa-xs fa-edit"></span>' +
                    '<div class="dropdown-content">' +
                    '<a href="#" style="color: blue" onclick="managePhoto(\''+d.image+'\', \'Approve\', \''+d.matrimony_id+'\')">Approve</a>' +
                    '<a href="#" style="color: red" onclick="managePhoto(\''+d.image+'\', \'Rejected\', \''+d.matrimony_id+'\')">Reject</a>' +
                    '</div>' +
                    '</div>';
                galleryTable.row.add( [
                    "<img src='"+img+"' style='width: 100px; height: 100px;'/>",
                    d.matrimony_id,
                    d.status,
                    d.is_primary,
                    d.approved_by,
                    d.approved_at,
                    d.created_at,
                    dropDown,
                    // "<td><button rowId='"+d.id+"'>Delete</button></td>",
                ] ).draw( false );
            });
        });
    }

    function managePhoto(img, action, matrimony_id) {
        $.post('/api/photos', {matrimony: matrimony_id, photo: img, action: action},  function(data, status){
			if(data.responseCode == "success") {
                toastr.success(data.responseMessage)
            } else {
                toastr.error(data.responseMessage)
            }
        })
    }

</script>

