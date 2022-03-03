<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/index" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->


      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <img src="../storage/user/{{ session('userphoto') }}" class="img-circle elevation-2" alt="User Image" height="33" width="33" style="margin-top: -5px;">
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
          <span class="dropdown-item dropdown-header" style="font-size: 17px;">{{ session('userfirstname') }} {{ session('userlastname') }}</span>
          <div class="dropdown-divider"></div>
          <a href="profile" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> My Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="change-password" class="dropdown-item">
            <i class="fas fa-key mr-2"></i> Change Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
        </div>
      </li> -->

      <li class="nav-item">
        <a class="nav-link" data-slide="true" href="../logout" role="button">
          <i class="fas fa-sign-out-alt" style="font-size: 18px;"></i>
        </a>
      </li>
    </ul>
  </nav>