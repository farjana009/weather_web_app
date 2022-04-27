<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin - Manage Users</title>

	<!-- Bootstrap core CSS-->
	<link type="text/css" rel="stylesheet"
		  href="<?php echo base_url('resources/vendor/bootstrap/css/bootstrap.min.css'); ?>"/>
	<!-- Custom fonts for this template-->
	<link type="text/css" rel="stylesheet"
		  href="<?php echo base_url('resources/vendor/fontawesome-free/css/all.min.css'); ?>"/>

	<!-- Page level plugin CSS-->
	<link type="text/css" rel="stylesheet"
		  href="<?php echo base_url('resources/vendor/datatables/dataTables.bootstrap4.css'); ?>"/>

	<!-- Custom styles for this template-->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('resources/css/sb-admin.css'); ?>"/>

</head>

<body id="page-top">
<?php include APPPATH . 'views/admin/includes/header.php'; ?>

<div id="wrapper">

	<?php include APPPATH . 'views/admin/includes/sidebar.php'; ?>

	<div id="content-wrapper">

		<div class="container-fluid">

			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo site_url('admin/Dashboard'); ?>">Admin</a>
				</li>
				<li class="breadcrumb-item active">Manage Users</li>
			</ol>

			<!-- DataTables Example -->
			<div class="card mb-3">
				<div class="card-header">
				<span style="float: left">
              <i class="fas fa-table"></i>
             Users Details</span>
					<span style="float: right">
              <?php //if(in_array('createUser', $user_permission)): ?>
				  <a href="<?php echo base_url('admin/create') ?>" class="btn btn-primary btn-sm">Add User</a>
			  <?php //endif; ?>
             </span>
				</div>


				<div class="card-body">

					<div class="table-responsive">
						<!---- Success Message ---->
						<?php if ($this->session->flashdata('success')) { ?>

						<div class="alert alert-success col-sm-12"><?php echo $this->session->flashdata('success'); ?>
							<a href="<?php echo base_url('login/')?>" class="close" data-dismiss="alert" aria-label="close">×</a>
						</div>
						<?php } ?>

						<?php if ($this->session->flashdata('error')) { ?>

							<div class="alert alert-danger col-sm-12"><?php echo $this->session->flashdata('error'); ?>
								<a href="<?php echo base_url('login/')?>" class="close" data-dismiss="alert" aria-label="close">×</a>
							</div>
						<?php } ?>

					</div>

					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
						<tr>
							<th>#</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email id</th>
							<th>User Type</th>
							<th>Action</th>
						</tr>
						</thead>

						<tbody>

						<?php
						if (count($userdetails)) :
							$cnt = 1;
							foreach ($userdetails as $row) :
								?>
								<tr>
									<td><?php echo htmlentities($cnt); ?></td>
									<td><?php echo htmlentities($row->first_name) ?></td>
									<td><?php echo htmlentities($row->last_name) ?></td>
									<td><?php echo htmlentities($row->email) ?></td>
									<td><?php if ($row->is_admin == 1) echo "Admin"; else echo "User"; ?></td>
									<!--                      <td>--><?php //echo htmlentities($row->createdon)
									?><!--</td>-->
									<td>
										<a class="fa fa-edit" href="<?php echo base_url(); ?>admin/edit/<?php echo $row->id; ?>"></a>
										&nbsp;&nbsp;&nbsp;
											<a onclick="alert('Are you sure to delete data?');" class="fa fa-trash"
											   href="<?php echo base_url(); ?>admin/delete/<?php echo $row->id; ?>"></a>

									</td>
								</tr>
								<?php
								$cnt++;
							endforeach;
						else : ?>

							<tr>
								<td colspan="6">No Record found</td>
							</tr>
						<?php
						endif;
						?>


						</tbody>
					</table>
				</div>
			</div>

		</div>


	</div>
	<!-- /.container-fluid -->

	<!-- Sticky Footer -->
	<?php include APPPATH . 'views/admin/includes/footer.php'; ?>

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
setTimeout(function(){ $(".alert-success").hide('');$(".alert-error").hide(''); }, 3000);
</script>
