<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Weather Web App</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url('resources/css/style.css'); ?>">
</head>
<body>

<div class="container">
	<nav class="navbar" style="float: right">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<?php if ($this->session->userdata('user_email')) { ?>
					<li class=""><a href="<?php echo base_url('login/logout'); ?>">Logout</a></li>
					<li class=""><a href="<?php echo base_url('user/user_profile'); ?>">User Profile</a></li>
					<li class=""><a href="<?php echo base_url('/'); ?>">Home Page</a></li>

				<?php } else { ?>
					<li class=""><a href="<?php echo base_url('login/'); ?>">Login</a></li>
					<li class=""><a href="<?php echo base_url('user/review'); ?>">Review Page</a></li>

				<?php } ?>
			</ul>
			<form class="navbar-form navbar-left" action="/action_page.php">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search by city name" name="search">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</nav>
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
</div>


<div class="future-forecast">
	<div class="today" id="current-temp">
		<img src="http://openweathermap.org/img/wn/10d@2x.png" alt="weather icon" class="w-icon">
		<div class="other">
			<div class="day">Monday</div>
			<div class="temp">Night - 25.6&#176; C</div>
			<div class="temp">Day - 35.6&#176; C</div>
		</div>
	</div>

	<div class="weather-forecast" id="weather-forecast">
		<div class="weather-forecast-item">
			<div class="day">Tue</div>
			<img src="http://openweathermap.org/img/wn/10d@2x.png" alt="weather icon" class="w-icon">
			<div class="temp">Night - 25.6&#176; C</div>
			<div class="temp">Day - 35.6&#176; C</div>
		</div>
		<div class="weather-forecast-item">
			<div class="day">Wed</div>
			<img src="http://openweathermap.org/img/wn/10d@2x.png" alt="weather icon" class="w-icon">
			<div class="temp">Night - 25.6&#176; C</div>
			<div class="temp">Day - 35.6&#176; C</div>
		</div>
		<div class="weather-forecast-item">
			<div class="day">Thur</div>
			<img src="http://openweathermap.org/img/wn/10d@2x.png" alt="weather icon" class="w-icon">
			<div class="temp">Night - 25.6&#176; C</div>
			<div class="temp">Day - 35.6&#176; C</div>
		</div>
		<div class="weather-forecast-item">
			<div class="day">Fri</div>
			<img src="http://openweathermap.org/img/wn/10d@2x.png" alt="weather icon" class="w-icon">
			<div class="temp">Night - 25.6&#176; C</div>
			<div class="temp">Day - 35.6&#176; C</div>
		</div>
		<div class="weather-forecast-item">
			<div class="day">Sat</div>
			<img src="http://openweathermap.org/img/wn/10d@2x.png" alt="weather icon" class="w-icon">
			<div class="temp">Night - 25.6&#176; C</div>
			<div class="temp">Day - 35.6&#176; C</div>
		</div>

	</div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
		integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="<?php echo base_url('resources/js/script.js'); ?>"></script>
</body>
</html>
