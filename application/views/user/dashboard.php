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

	  <style>
		  body {
			  font-family: Arial;
			  font-size: 0.95em;
			  color: #929292;
		  }

		  .report-container {
			  border: #E0E0E0 1px solid;
			  padding: 20px 40px 40px 40px;
			  border-radius: 2px;
			  width: 550px;
			  margin: 0 auto;
		  }

		  .weather-icon {
			  vertical-align: middle;
			  margin-right: 20px;
		  }

		  .weather-forecast {
			  color: #212121;
			  font-size: 1.2em;
			  font-weight: bold;
			  margin: 20px 0px;
		  }

		  span.min-temperature {
			  margin-left: 15px;
			  color: #929292;
		  }

		  .time {
			  line-height: 25px;
		  }
	  </style>
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
            <div class="col-xl-8 col-sm-6 mb-3">
   <h3>Welcome : <?php echo $profile->first_name;?> <?php echo $profile->last_name;?>  </h3>
				<h6>Last SignedIn : <?php echo $profile->lastsignedinon;?>   </h6>

			</div>

			  <div class="col-xl-4 col-sm-6 mb-3">
				  <form class="navbar-form navbar-left" method="post" action="<?php echo base_url('login/home') ?>">
					  <div class="input-group">
						  <input type="text" class="form-control" name="search_by_city" placeholder="Search by city name">
						  <div class="input-group-append">
							  <button class="btn btn-secondary" type="submit">
								  <i class="fa fa-search"></i>
							  </button>
						  </div>
					  </div>
				  </form>
			  </div>
          </div>

			<?php if($weather_info){ ?>
				<div class="row">
					<div id="weather_info_div" class="col-lg-12 col-md-12 col-xl-12 col-sm-12">
						<div class="report-container">
							<h2><?php $currentTime = time();echo $weather_info->name; ?> Weather Status</h2>
							<div class="time">
								<div><?php echo date("l g:i a", $currentTime); ?></div>
								<div><?php echo date("jS F, Y",$currentTime); ?></div>
								<div><?php echo ucwords($weather_info->weather[0]->description); ?></div>
							</div>
							<div class="weather-forecast">
								<img
									src="http://openweathermap.org/img/w/<?php echo $weather_info->weather[0]->icon; ?>.png"
									class="weather-icon" /> <?php echo $weather_info->main->temp_max; ?>&deg;C<span
									class="min-temperature"><?php echo $weather_info->main->temp_min; ?>&deg;C</span>
							</div>
							<div class="time">
								<div>Humidity: <?php echo $weather_info->main->humidity; ?> %</div>
								<div>Wind: <?php echo $weather_info->wind->speed; ?> km/h</div>
							</div>
						</div>

					</div>

				</div>
			<?php } else{
				?>
				<div class="row">
					<div id="" class="col-lg-12 col-md-12 col-xl-12 col-sm-12">
						<h5 style="text-align: center; color:darkslateblue; "><?php echo ucfirst($city_name); ?> City Not Found.</h5>

					</div>

				</div>
			<?php
			}?>



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
