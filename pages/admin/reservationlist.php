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
  <title>RESERVATION</title>
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
      <img src="3.1.png" alt="K&R Logo" height = "50px" style="opacity: .8">
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
            <a href = "reservationlist.php" class="nav-link active">
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
            <a href = "reviews.php" class="nav-link">
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
            <h1>Reservations</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- /.pending -->

    <?php
    require 'connection.inc.php';

    $sql_reservations = "SELECT * FROM reservations WHERE status='Pending' ORDER BY id ASC";
    $result_reservations = mysqli_query($conn, $sql_reservations);

    mysqli_close($conn);
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pending Reservations</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width = "5%">No.</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Client</th>
                    <th>Pax</th>
                    <th>Status</th>
                    <th width = "26%">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if (mysqli_num_rows($result_reservations) > 0) {
                    $i = 1;
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result_reservations)) { ?>
                      <tr id = <?php echo $row["id"]; ?>>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <td><?php echo $row["time"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["table_id"]; ?></td>
                        <td><?php echo $row["status"]; ?></td>
                        <td>
                          <button class="btn btn-info btn-sm btn-view">
                              <i class="fas fa-eyes"></i>
                              View Details
                          </button>
                          <button class="btn btn-info btn-sm btn-edit">
                            <i class="fas fa-pencil-alt"></i>Edit Status
                          </button>
                          <button class="btn btn-danger btn-sm btn-delete" >
                            <i class="fas fa-trash"></i>Delete
                          </button>
                        </td>
                        <?php $i++; 
                        ?>
                      </tr>
                      <?php
                     }
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
        <form id = "form_view">
          <div class="modal fade edit" id="modal-view">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Reservation Details</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                
                <div class="modal-body">
                  <input type="hidden" name="type" id="type" value = "view">
                  <input type="hidden" name="view_reserv_id" id="view_reserv_id">

                <div class="form-group">
                  <label>Date:</label>
                  <input type="text" class="form-control" name="view_date" id="view_date" placeholder="">
                  </div>

                  <div class="form-group">
                  <label>Time:</label>
                  <input type="text" class="form-control" name="view_time" id="view_time" placeholder="">
                  </div>

                  <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="view_name" id="view_name" placeholder="">
                  </div>

                  <div class="form-group">
                    <label>No. of pax:</label>
                    <input type="text" class="form-control" name="view_pax" id="view_pax" placeholder="">
                  </div>

                  <div class="form-group">
                    <label>Status:</label>
                    <input type="text" class="form-control" name="view_status" id="view_status" placeholder="">
                  </div>
                  </div>

                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default"><i class="fas fa-mail"></i>Send Email</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
      </form>
        <form id = "form_edit">
          <div class="modal fade edit" id="modal-edit">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edit Status</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="type" id="type" value = "edit">
                  <input type="hidden" name="edit_reserv_id" id="edit_reserv_id">

                  <div class="form-group">
                    <label>Reservation Status</label>
                    <select type="text" class="form-control" name="edit_status" id="edit_status" placeholder="Edit Status">
                      <option value = "Pending">Pending</option>
                      <option value = "Confirmed">Confirmed</option>
                      <option value = "No Show">No Show</option>
                      <option value = "Cancelled">Cancelled</option>
                      <option value = "Done">Done</option>
                  </select>
                  </div>
                  
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" id = "btnEditRecord" value = "Update Record">
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
      </form>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<!-- /noshow/ cancelled-->

    <?php
    require 'connection.inc.php';

    $sql_reservations = "SELECT * FROM reservations WHERE status ='No Show' OR status = 'Cancelled' ORDER BY id ASC";
    $result_reservations = mysqli_query($conn, $sql_reservations);

    mysqli_close($conn);
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">No Show/Cancelled Reservations</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width = "5%">No.</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Client</th>
                    <th>Pax</th>
                    <th>Status</th>
                    <th width = "26%">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if (mysqli_num_rows($result_reservations) > 0) {
                    $i = 1;
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result_reservations)) { ?>
                      <tr id = <?php echo $row["id"]; ?>>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <td><?php echo $row["time"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["table_id"]; ?></td>
                        <td><?php echo $row["status"]; ?></td>
                        <td>
                          <button class="btn btn-info btn-sm btn-view">
                              <i class="fas fa-eyes"></i>
                              View Details
                          </button>
                          <button class="btn btn-info btn-sm btn-edit">
                            <i class="fas fa-pencil-alt"></i>Edit Status
                          </button>
                          <button class="btn btn-danger btn-sm btn-delete" >
                            <i class="fas fa-trash"></i>Delete
                          </button>
                        </td>
                        <?php $i++; 
                        ?>
                      </tr>
                      <?php
                     }
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

<!-- /.done reservations -->

    <?php
    require 'connection.inc.php';

    $sql_reservations = "SELECT * FROM reservations WHERE status='Done' ORDER BY id ASC";
    $result_reservations = mysqli_query($conn, $sql_reservations);

    mysqli_close($conn);
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Done Reservations</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width = "5%">No.</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Client</th>
                    <th>Pax</th>
                    <th>Status</th>
                    <th width = "26%">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if (mysqli_num_rows($result_reservations) > 0) {
                    $i = 1;
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result_reservations)) { ?>
                      <tr id = <?php echo $row["id"]; ?>>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <td><?php echo $row["time"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["table_id"]; ?></td>
                        <td><?php echo $row["status"]; ?></td>
                        <td>
                          <button class="btn btn-info btn-sm btn-view">
                              <i class="fas fa-eyes"></i>
                              View Details
                          </button>
                          <button class="btn btn-info btn-sm btn-edit">
                            <i class="fas fa-pencil-alt"></i>Edit Status
                          </button>
                          <button class="btn btn-danger btn-sm btn-delete" >
                            <i class="fas fa-trash"></i>Delete
                          </button>
                        </td>
                        <?php $i++; 
                        ?>
                      </tr>
                      <?php
                     }
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

<!-- Page specific script -->

<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<?php 
include "template/footer.php"; 
?>

<script>

$(document).ready(function() {
$("#form_edit").submit(function(event) {
  event.preventDefault(); //prevent submit
  var form = $(this);

    $.ajax({
        type: "POST",
        cache: false,
        url: 'process_reservations.php',
        data: form.serialize(),
        success:function(data){
          var response_data = JSON.parse(data);
     

          if (response_data.title == 'Success') {
                        Swal.fire({
                            title: response_data.title,
                            text: response_data.message,
                            icon: 'success',
                            timer: 2000,
                            timerProgressBar: true
                        })
                        setTimeout(function(){location.reload();},2000);
                    } else {
                        Swal.fire('Error!', response_data.message, 'error');
                    }

        }
    });

});
});

$(document).ready(function() {
$("#form_view").submit(function(event) {
  event.preventDefault(); //prevent submit
  var form = $(this);

    $.ajax({
        type: "POST",
        cache: false,
        url: 'process_reservations.php',
        data: form.serialize(),
        success:function(data){
          var response_data = JSON.parse(data);
     

          if (response_data.title == 'Success') {
                        Swal.fire({
                            title: response_data.title,
                            text: response_data.message,
                            icon: 'success',
                            timer: 2000,
                            timerProgressBar: true
                        })
                        setTimeout(function(){location.reload();},2000);
                    } else {
                        Swal.fire('Error!', response_data.message, 'error');
                    }

        }
    });

});
});

$(document).ready(function() {
$('#example1 tbody').on('click', '.btn-view', function () {

  document.getElementById("view_reserv_id").value = $(this).closest("tr").attr('id');
  document.getElementById("view_date").value = $(this).closest("tr").children(":eq(1)").text();
  document.getElementById("view_time").value = $(this).closest("tr").children(":eq(2)").text();
  document.getElementById("view_name").value = $(this).closest("tr").children(":eq(3)").text();
  document.getElementById("view_pax").value = $(this).closest("tr").children(":eq(4)").text();
  document.getElementById("view_status").value = $(this).closest("tr").children(":eq(5)").text();

  $('#modal-view').modal('show');

});
});

$(document).ready(function() {
$('#example1 tbody').on('click', '.btn-edit', function () {

  document.getElementById("edit_reserv_id").value = $(this).closest("tr").attr('id');
  document.getElementById("edit_status").value = $(this).closest("tr").children(":eq(5)").text();

  $('#modal-edit').modal('show');

});

$('#example1 tbody').on('click', '.btn-delete', function () {
    var reserv_id = $(this).closest("tr").attr('id');
    var row = $(this).closest('tr'); // Store the row element to be removed

    // Use SweetAlert2 for confirmation
    Swal.fire({
        title: 'Are you sure?',
        text: 'This action cannot be undone!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                cache: false,
                url: 'process_reservations.php',
                data: { type: 'delete', reserv_id: reserv_id }, // Sending type and course_id
                success: function (data) {
                    var response_data = JSON.parse(data);

                    if (response_data.title == 'Success') {
                        // Remove the row from the table upon successful deletion
                        row.remove();
                        Swal.fire({
                            title: response_data.title,
                            text: response_data.message,
                            icon: 'success',
                            timer: 2000,
                            timerProgressBar: true
                        })
                        setTimeout(function(){location.reload();},2000);
                    } else {
                        Swal.fire('Error!', response_data.message, 'error');
                    }
                }
            });
        }
    });
});
});
</script>
<div class="preloader flex-column justify-content-center align-items-center" background="#163832">
    <img class="animation__shake" src="6.png" alt="K&RLogo">
</div>
</body>
</html>
