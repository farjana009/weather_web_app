      <ul class="sidebar navbar-nav">
        <li id="user_dashboard" class="nav-item">
          <a class="nav-link" href="<?php echo base_url('login/home'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
		  <li id="" class="nav-item">
			  <a class="nav-link" href="<?php echo base_url('/'); ?>">
				  <i class="fa fa-home" aria-hidden="true"></i>
				  <span>Home</span>
			  </a>
		  </li>

         <li id="my_profile" class="nav-item">
          <a class="nav-link" href="<?php echo base_url('user/user_profile'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
        </li>
        <li id="change_password" class="nav-item">
          <a class="nav-link" href="<?php echo base_url('user/change_password'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Change Pasword</span></a>
        </li>

    <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('login/logout'); ?>">
      <i class="fas fa-sign-out-alt"></i>
            <span>Log Out</span></a>
        </li>

      </ul>
<!--	  <script src="--><?php //echo base_url('resources/vendor/jquery/jquery.min.js'); ?><!--"></script>-->

	  <script type="text/javascript">

		//   $('ul.navbar-nav li').click(function(e) {
		// 	  // alert();
	  // $('.navbar-nav li.active').removeClass('active');
	  // var $this = $(this);
	  // if (!$this.hasClass('active')) {
	  // $this.addClass('active');
	  // }
	  // e.preventDefault();
	  // });
	  </script>
