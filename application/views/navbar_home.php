<nav class="navbar" style="float: right">
	<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li class=""><a href="<?php echo base_url('/'); ?>">Home Page</a></li>
			<?php if ($this->session->userdata('user_email')) {
				if($user_data->is_admin==0){
				?>
				<li class=""><a href="<?php echo base_url('login/logout'); ?>">Logout</a></li>
				<li class=""><a href="<?php echo base_url('user/user_profile'); ?>">User Profile</a></li>

			<?php }} else { ?>
				<li class=""><a href="<?php echo base_url('login/'); ?>">Login</a></li>

			<?php } ?>
			<li class=""><a data-backdrop="static" data-keyboard="false" class="" data-toggle="modal" data-target="#modalReviewForm" href="#">Review Page</a></li>

		</ul>
		<form class="navbar-form navbar-left" method="post" action="<?php echo base_url('weather_app/search'); ?>">
			<div class="input-group">
				<input type="text" class="form-control" name="search_by_city" placeholder="Search by city name">
				<input type="hidden" class="form-control" name="page_id" id="page_id" value="home">
				<div class="input-group-btn">
					<button class="btn btn-default" type="submit">
						<i class="glyphicon glyphicon-search"></i>
					</button>
				</div>
			</div>
		</form>
	</div>
</nav>
