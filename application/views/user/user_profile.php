<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>User - Profile</title>

	<!-- Bootstrap core CSS-->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('resources/vendor/bootstrap/css/bootstrap.min.css'); ?>"/>
	<!-- Custom fonts for this template-->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('resources/vendor/fontawesome-free/css/all.min.css'); ?>"/>

	<!-- Page level plugin CSS-->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('resources/vendor/datatables/dataTables.bootstrap4.css'); ?>"/>

	<!-- Custom styles for this template-->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('resources/css/sb-admin.css'); ?>"/>

</head>

<body id="page-top">
<?php include APPPATH.'views/user/includes/header.php';?>

<div id="wrapper">

	<?php include APPPATH.'views/user/includes/sidebar.php';?>

	<div id="content-wrapper">

		<div class="container-fluid">

			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo site_url('user/Dashboard'); ?>">User</a>
				</li>
				<li class="breadcrumb-item active">User Profile</li>
			</ol>

			<!-- DataTables Example -->
			<div class="card mb-3">
				<div class="card-header">
				<span style="float: left">
              <i class="fas fa-table"></i>
             Profile</span>

				</div>



				<div class="card-body">
					<div class="table-responsive">
						<!---- Success Message ---->
						<?php if($this->session->flashdata('success')): ?>
							<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<?php echo $this->session->flashdata('success'); ?>
							</div>
						<?php elseif($this->session->flashdata('error')): ?>
							<div class="alert alert-error alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<?php echo $this->session->flashdata('error'); ?>
							</div>
						<?php endif; ?>

						<form role="form" action="<?php echo base_url('user/edit') ?>" method="post" enctype="multipart/form-data">
							<div class="box-body">

								<div class="form-group">
									<label for="email">Email</label>
									<input readonly="true" type="email" class="form-control" id="email" name="email" placeholder="Email"
										   value="<?php echo $user_data['email'] ?>" autocomplete="off" required>
									<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_data['id'] ?>" >
								</div>

								<div class="form-group">
									<label for="fname">First name</label>
									<input type="text" class="form-control" id="fname" name="fname" placeholder="First name"
										   value="<?php echo $user_data['first_name'] ?>" autocomplete="off">
								</div>

								<div class="form-group">
									<label for="lname">Last name</label>
									<input type="text" class="form-control" id="lname" name="lname" placeholder="Last name"
										   value="<?php echo $user_data['last_name'] ?>"   autocomplete="off">
								</div>

								<div class="form-group">
									<label for="phone">Phone</label>
									<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone"
										   value="<?php echo $user_data['phone'] ?>"  autocomplete="off">
								</div>


							</div>
							<!-- /.box-body -->

							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Save Changes</button>
							</div>
						</form>
					</div>
				</div>

			</div>


		</div>
		<!-- /.container-fluid -->

		<!-- Sticky Footer -->
		<?php include APPPATH.'views/user/includes/footer.php';?>

	</div>
	<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>



<script src="<?php echo base_url('resources/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('resources/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url('resources/vendor/chart.js/Chart.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/vendor/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('resources/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('resources/js/sb-admin.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/demo/datatables-demo.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/demo/chart-area-demo.js'); ?>"></script>

</body>

</html>
<script type="text/javascript">

$("#my_profile").addClass('active');
</script>
