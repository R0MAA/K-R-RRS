<?php

   if(!isset($_SESSION["user"]))
   {
   session_start();
   }

   if($_SESSION['name'] == ''){
    header("Location: /DREAMER/pages/admin/adminlogin.php");
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TABLES</title>
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="sidebar-mini layout-fixed" style="height: auto;">

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="3.1.png" alt="K&R Logo" height="50px" style="opacity: .8">
      <span class="brand-text font-weight-heavy">K&R</span><span class="brand-text font-weight-light"> RRS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">System Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
            <a href = "dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">MANAGE</li>
          <li class="nav-item">
            <a href = "reservationlist.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Reservations</p>
            </a>
            </li>
          <li class="nav-item">
            <a href = "tablelist.php" class="nav-link">
              <i class="nav-icon fas fa-utensils"></i>
              <p>Table List</p>
            </a>
          </li>
          <li class="nav-item">
            <a href = "userlist.php" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href = "webcontent.php" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Home Content</p>
            </a>
          </li>
          <li class="nav-item">
            <a href = "menulist.php" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Menu List</p>
            </a>
          </li>
          <li class="nav-header">VIEW</li>
          <li class="nav-item">
            <a href = "reviews.php" class="nav-link active">
              <i class="nav-icon fas fa-comments"></i>
              <p>Reviews</p>
            </a>
          </li>
          <li class="nav-header">ACCOUNT</li>
            <li class="nav-item">
            <a href="adminlogin.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reviews</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
    require 'connection.inc.php';

    $sql_reviews = "SELECT * FROM reviews ORDER BY id ASC";
    $result_reviews = mysqli_query($conn, $sql_reviews);

    mysqli_close($conn);
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Restaurant Reviews</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width = "5%">No.</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Contact</th>
                    <th width = "50%">Message</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if (mysqli_num_rows($result_reviews) > 0) {
                    $i = 1;
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result_reviews)) { ?>
                      <tr id = <?php echo $row["id"]; ?>>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["contact"]; ?></td>
                        <td><?php echo $row["message"]; ?></td>
                      </tr>
                    <?php $i++; }
                  }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
include "template/footer.php"; 
?>
<!-- Page specific script -->
<script>
  $(function () {

    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>
<div class="preloader flex-column justify-content-center align-items-center" background="#163832">
    <img class="animation__shake" src="6.png" alt="K&RLogo">
  </div>
</body>
</html>
