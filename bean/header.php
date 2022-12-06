<?php
include "koneksi.php";
error_reporting(0);
session_start();
if (isset($_SESSION["ses_username"]) == "") {
  header("location: landingpage.php");
} else {
  $data_id = $_SESSION["ses_id"];
  $data_level = $_SESSION["ses_level"];
  $data_username = $_SESSION["ses_username"];
  $data_password = $_SESSION["ses_password"];
}


?>
<header class="main-header">
  <!-- Logo -->
  <a href="index.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>K</b>SP</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>Koperasi</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
            <span class="hidden-xs">
              <?php echo $data_username ?>
            </span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">

              <p>
                <?php echo $data_username ?>
                <small>
                  <?php

                  if ($data_level == 1) {
                    echo 'Admin';
                  } else {
                    echo 'Petugas';
                  }
                  $data_level

                    ?>
                </small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div style="text-align:center;">
                <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>