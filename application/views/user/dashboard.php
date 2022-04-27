<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User dashboard</title>

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

 <?php include APPPATH.'views/User/includes/header.php';?>

    <div id="wrapper">

      <!-- Sidebar -->
 <?php include APPPATH.'views/User/includes/sidebar.php';?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo site_url('user/Dashboard'); ?>">User</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-12 col-sm-6 mb-3">
   <h3>Welcome : <?php echo $profile->first_name;?> <?php echo $profile->last_name;?>  </h3>
            </div>
 
  
          </div>



        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
   <?php include APPPATH.'views/User/includes/footer.php';?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->


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
	$(document).ready(function () {
	$("#user_dashboard").addClass('active');
	});

</script>
