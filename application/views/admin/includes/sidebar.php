      <ul class="sidebar navbar-nav">
        <li class="nav-item active <?php ?>">
          <a class="nav-link" href="<?php echo base_url('login/home'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>

		  <li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url('admin'); ?>">
				  <i class="fas fa-fw fa-users"></i>
				  <span>User Management</span></a>
		  </li>
     
         <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('admin/profile'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('admin/change_password'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Change Pasword</span></a>
        </li>
		  <li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url('review/'); ?>">
				  <i class="fas fa-fw fa-table"></i>
				  <span>Review Management</span></a>
		  </li>
		  <li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url('review/weather_search_logs/'); ?>">
				  <i class="fas fa-fw fa-table"></i>
				  <span>Weather Search Logs</span></a>
		  </li>

    <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('login/logout'); ?>">
      <i class="fas fa-sign-out-alt"></i>
            <span>Log Out</span></a>
        </li>

      </ul>
