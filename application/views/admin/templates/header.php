<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url("assets/plugins/fontawesome-free/css/all.min.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/dist/css/adminlte.min.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/plugins/toastr/toastr.min.css"); ?>">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<script src="<?php echo base_url("assets/plugins/jquery/jquery.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/plugins/toastr/toastr.min.js"); ?>"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="index3.html" class="nav-link">Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">Contact</a>
				</li>
			</ul>

			<!-- SEARCH FORM -->
			<form class="form-inline ml-3">
				<div class="input-group input-group-sm">
					<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
					<div class="input-group-append">
						<button class="btn btn-navbar" type="submit">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</form>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Messages Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-comments"></i>
						<span class="badge badge-danger navbar-badge">3</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="<?php echo base_url("assets/dist/img/user1-128x128.jpg"); ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										Brad Diesel
										<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">Call me whenever you can...</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="<?php echo base_url("assets/dist/img/user8-128x128.jpg"); ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										John Pierce
										<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">I got your message bro</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="<?php echo base_url("assets/dist/img/user3-128x128.jpg"); ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										Nora Silvester
										<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">The subject goes here</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
					</div>
				</li>
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-bell"></i>
						<span class="badge badge-warning navbar-badge">15</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<span class="dropdown-header">15 Notifications</span>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-envelope mr-2"></i> 4 new messages
							<span class="float-right text-muted text-sm">3 mins</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-users mr-2"></i> 8 friend requests
							<span class="float-right text-muted text-sm">12 hours</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-file mr-2"></i> 3 new reports
							<span class="float-right text-muted text-sm">2 days</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
							class="fas fa-th-large"></i></a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index3.html" class="brand-link">
				<img src="<?php echo base_url("assets/dist/img/AdminLTELogo.png"); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
					 style="opacity: .8">
				<span class="brand-text font-weight-light">JoNam Matrimony</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?php echo base_url("assets/dist/img/photo.jpg"); ?>" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block">Mathan Kumar</a>
					</div>
				</div>
				<?php
					$currentUrl = uri_string();
				?>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
							 with font-awesome or any other icon font library -->

						<li class="nav-item">
							<a href="/admin/dashboard" class="nav-link <?php if($currentUrl == 'admin/dashboard') echo "active"; ?>">
								<i class="nav-icon fas fa-th"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<li class="nav-item has-treeview <?php if($currentUrl == 'admin/users/add' || $currentUrl == 'admin/users/list' || $currentUrl == 'admin/users/gallery' || $currentUrl == 'admin/height') echo 'menu-open' ?>">
							<a href="#" class="nav-link <?php if($currentUrl == 'admin/users/add' || $currentUrl == 'admin/users/list'  ||$currentUrl == 'admin/users/gallery'  || $currentUrl == 'admin/height') echo 'active' ?>">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Users
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="/admin/users/list" class="nav-link <?php if($currentUrl == 'admin/users/list') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>List</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="/admin/users/add" class="nav-link <?php if($currentUrl == 'admin/users/add') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Add</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="/admin/users/gallery" class="nav-link <?php if($currentUrl == 'admin/users/gallery') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Gallery</p>
									</a>
								</li>
<!--								<li class="nav-item">
									<a href="/admin/marital-status" class="nav-link <?php /*if($currentUrl == 'admin/marital-status') echo "active"; */?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Marital Status</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="/admin/height" class="nav-link <?php /*if($currentUrl == 'admin/height') echo "active"; */?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Height</p>
									</a>
								</li>-->
							</ul>
						</li>
						<li class="nav-item has-treeview <?php if($currentUrl == 'admin/country' || $currentUrl =='admin/state' || $currentUrl == 'admin/city') echo 'menu-open' ?>">
							<a href="#" class="nav-link <?php if($currentUrl == 'admin/country' || $currentUrl =='admin/state' || $currentUrl == 'admin/city') echo 'active' ?>">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Location Info
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="/admin/country" class="nav-link <?php if($currentUrl == 'admin/country') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Country</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="/admin/state" class="nav-link <?php if($currentUrl == 'admin/state') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>State</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="/admin/city" class="nav-link <?php if($currentUrl ==  'admin/city') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>City</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview <?php if($currentUrl == 'admin/religion' || $currentUrl =='admin/caste' || $currentUrl == 'admin/sub-caste' || $currentUrl == 'admin/raasi' || $currentUrl == 'admin/star') echo 'menu-open' ?>">
							<a href="#" class="nav-link <?php if($currentUrl == 'admin/religion' || $currentUrl =='admin/caste' || $currentUrl == 'admin/sub-caste' || $currentUrl == 'admin/raasi' || $currentUrl == 'admin/star') echo 'active' ?>">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Religion Info
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="/admin/religion" class="nav-link <?php if($currentUrl == 'admin/religion') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Religion</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="/admin/caste" class="nav-link <?php if($currentUrl == 'admin/caste') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Caste</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="/admin/sub-caste" class="nav-link <?php if($currentUrl == 'admin/sub-caste') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Sub Caste</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="/admin/raasi" class="nav-link <?php if($currentUrl == 'admin/raasi') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Raasi</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="/admin/star" class="nav-link <?php if($currentUrl == 'admin/star') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Star</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item has-treeview <?php if($currentUrl == 'admin/education-category' || $currentUrl == 'admin/mother-tongue' || $currentUrl =='admin/education' || $currentUrl == 'admin/occupation' || $currentUrl == 'admin/occupation-category' || $currentUrl == 'admin/annual-income' || $currentUrl == 'admin/employed-in'  || $currentUrl == 'admin/annual-income') echo 'menu-open' ?>">
							<a href="#" class="nav-link <?php if($currentUrl == 'admin/education-category' || $currentUrl == 'admin/mother-tongue' || $currentUrl =='admin/education' || $currentUrl == 'admin/occupation' || $currentUrl == 'admin/occupation-category' || $currentUrl == 'admin/annual-income' || $currentUrl == 'admin/employed-in' || $currentUrl == 'admin/annual-income') echo 'active' ?>">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Professional Info
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="/admin/mother-tongue" class="nav-link <?php if($currentUrl == 'admin/mother-tongue') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Mother Tongue</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="/admin/education-category" class="nav-link <?php if($currentUrl == 'admin/education-category') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Education Category</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="/admin/education" class="nav-link <?php if($currentUrl == 'admin/education') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Education</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="/admin/occupation-category" class="nav-link <?php if($currentUrl == 'admin/occupation-category') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Occupation Category</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="/admin/occupation" class="nav-link <?php if($currentUrl == 'admin/occupation') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Occupation</p>
									</a>
								</li>
								<!--<li class="nav-item">
									<a href="/admin/annual-income" class="nav-link <?php /*if($currentUrl == 'admin/annual-income') echo "active"; */?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Annual Income</p>
									</a>
								</li>-->
								<li class="nav-item">
									<a href="/admin/employed-in" class="nav-link <?php if($currentUrl == 'admin/employed-in') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Employed In</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="/admin/annual-income" class="nav-link <?php if($currentUrl == 'admin/annual-income') echo "active"; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Annual Income</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="/admin/logout" class="nav-link <?php if($currentUrl == 'admin/logout') echo "active"; ?>">
								<i class="nav-icon fas fa-th"></i>
								<p>
									Logout
								</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

