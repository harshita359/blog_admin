<?php
require_once "db/config.php";
check_login();

include('includes/allfunction.php');

include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <?php
        if ($_SESSION['user_role'] == 'admin') {
        ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php

                $query = "SELECT * FROM users";
                $result = mysqli_query($conn, $query);
                if ($users_total = mysqli_num_rows($result)) {
                  echo '<h3 class="card-text">' . $users_total . '</h3>';
                } else {
                  echo '<p class="card-text">No Data</p>';
                }

                ?>

                <p>Total User</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-user-plus"></i>
              </div>
              <a href="user_menegment.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php   } ?>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              if ($_SESSION['user_role'] == 'admin') {
                $query = "SELECT * FROM category";
                $result = mysqli_query($conn, $query);
                if ($Receipts_total = mysqli_num_rows($result)) {
                  echo '<h3 class="card-text">' . $Receipts_total . '</h3>';
                } else {
                  echo '<p class="card-text">No Data</p>';
                }
              } else if ($_SESSION['user_role'] == 'user') {
                $user = $_SESSION['user'];
                $user_id = $_SESSION['user']['user_id'];
                $query = "SELECT * FROM category WHERE user_id='$user_id'";
                $result = mysqli_query($conn, $query);
                if ($Receipts_total = mysqli_num_rows($result)) {
                  echo '<h3 class="card-text">' . $Receipts_total . '</h3>';
                } else {
                  echo '<p class="card-text">No Data</p>';
                }
              }
              ?>

              <p>Total Categories</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-layer-group"></i>
            </div>
            <a href="categories.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              if ($_SESSION['user_role'] == 'admin') {
                $query = "SELECT * FROM post";
                $result = mysqli_query($conn, $query);
                if ($Receipts_total = mysqli_num_rows($result)) {
                  echo '<h3 class="card-text">' . $Receipts_total . '</h3>';
                } else {
                  echo '<p class="card-text">No Data</p>';
                }
              } else if ($_SESSION['user_role'] == 'user') {
                $user = $_SESSION['user'];
                $user_id = $_SESSION['user']['user_id'];
                $query = "SELECT * FROM post WHERE user_id='$user_id'";
                $result = mysqli_query($conn, $query);
                if ($Receipts_total = mysqli_num_rows($result)) {
                  echo '<h3 class="card-text">' . $Receipts_total . '</h3>';
                } else {
                  echo '<p class="card-text">No Data</p>';
                }
              }
              ?>

              <p>Total Posts</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-address-card"></i>
            </div>
            <a href="posts.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
            <?php
              if ($_SESSION['user_role'] == 'admin') {
                $query = "SELECT * FROM tags";
                $result = mysqli_query($conn, $query);
                if ($Receipts_total = mysqli_num_rows($result)) {
                  echo '<h3 class="card-text">' . $Receipts_total . '</h3>';
                } else {
                  echo '<p class="card-text">No Data</p>';
                }
              } else if ($_SESSION['user_role'] == 'user') {
                $user = $_SESSION['user'];
                $user_id = $_SESSION['user']['user_id'];
                $query = "SELECT * FROM tags WHERE user_id='$user_id'";
                $result = mysqli_query($conn, $query);
                if ($Receipts_total = mysqli_num_rows($result)) {
                  echo '<h3 class="card-text">' . $Receipts_total . '</h3>';
                } else {
                  echo '<p class="card-text">No Data</p>';
                }
              }
              ?>

              <p>Total Tags</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-user-tag"></i>
            </div>
            <a href="tags.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php
include('includes/footer.php');
?>