<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Weather Web App :: Search Page</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url('resources/css/style.css'); ?>">
</head>
<body>

<div class="container">
	<?php include APPPATH.'views/navbar_home.php';?>

	<div class="current-info" style="float: left">

		<div class="date-container">
			<div class="place-container">
				<div class="time-zone" id="time-zone">Asia/Dhaka</div>
				<div id="country" class="country">BD</div>
			</div>

			<div class="date" id="date">
				Monday, 25 May
			</div>
			<div class="time" id="time">
				12:30 <span id="am-pm">PM</span>
			</div>

			<div class="others" id="current-weather-items">


			</div>
		</div>


	</div>


	<?php if($weather_info && $city_name){ ?>
		<div class="row">
			<div id="weather_info_div" class="col-lg-12 col-md-12 col-xl-12 col-sm-12" style=" display: flex;
  justify-content: center;">
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
	<?php } else if($city_name==''){ ?>
		<div class="row">
			<div id="" class="col-lg-12 col-md-12 col-xl-12 col-sm-12">
				<h5 style="text-align: center; color:darkslateblue; ">&nbsp;</h5>

			</div>

		</div>
	<?php } else{
		?>
		<div class="row">
			<div id="" class="col-lg-12 col-md-12 col-xl-12 col-sm-12">
				<h4 style="text-align: center; color:white; "><?php if(isset($city_name))echo ucfirst($city_name); ?> City Not Found.</h4>

			</div>

		</div>
		<?php
	}?>


</div>




<div class="modal fade" id="modalReviewForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">	 aria-hidden="true">
	<div class="modal-dialog modal-review" role="document">
		<div class="modal-content bg-dark">
			<div class="modal-header">
				<h5 class="modal-title text-light" id="exampleModalLabel">Please Review Our Website!!</h5> <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<div id="show_message_div" class="alert alert-success alert-dismissible" role="alert" style="display: none;">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span id="message_span">&nbsp;</span>

			</div>
			<div class="modal-body">
				<form class="form my-3 mr-2 ml-2">
					<div class="form-row">
						<div class="form-group col-sm"> <label for="exampleInputEmail1" style="color: #fff;">Name <span class="mandatory_marks">*</span></label> <input type="text" name="review_name" class="form-control" id="review_name" aria-describedby="emailHelp" placeholder="Please enter your name" required> </div>
					</div>
					<div class="form-group"> <label for="exampleInputEmail1" style="color: #fff;">Enter Email <span class="mandatory_marks">*</span></label> <input type="email"  name="review_email" class="form-control" id="review_email" aria-describedby="emailHelp" placeholder="Please enter your email" required> </div>
					<div class="form-group"> <label for="exampleFormControlTextarea1" style="color: #fff;">Leave Your Review Here</label> <textarea name="review_details" class="form-control" id="review_details" rows="2"></textarea> </div>
				</form>
			</div>
			<div class="modal-footer">
				<button id="submitReview" type="button" class="btn btn-outline-light ml-sm-2" style="border-radius: 50px; width: 100%"  aria-label="Close">Submit</button>
				<button type="button" class="btn btn-default" style="border-radius: 50px; width: 100%; margin-top: 7px;" data-dismiss="modal">Close</button>
				<input type="hidden" name="base_url" id="base_url" class="form-control" value="<?php echo base_url();?>">
			</div>
		</div>
	</div>
</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
		integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="<?php echo base_url('resources/js/script.js'); ?>"></script>
</body>
</html>
<script></script>
