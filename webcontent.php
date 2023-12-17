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
            <a href = "webcontent.php" class="nav-link active">
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
            <h1>Landing Page</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
    require 'connection.inc.php';

    $sql_content = "SELECT * FROM webcontent ORDER BY id ASC";
    $result_content = mysqli_query($conn, $sql_content);

    mysqli_close($conn);
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Home Content</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th></th>
                    <th>Heading</th>
                    <th>Subheading</th>
                    <th>Content</th>
                    <th width="12%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if (mysqli_num_rows($result_content) > 0) {
                    $i = 1;
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result_content)) { ?>
                      <tr id = <?php echo $row["id"]; ?>>
                        <td>About</td>
                        <td><?php echo $row["heading"]; ?></td>
                        <td><?php echo $row["subheading"]; ?></td>
                        <td><?php echo $row["content"]; ?></td>
                      </tr>
                      <tr id = <?php echo $row["id"]; ?>>
                        <td>Menu</td>
                        <td><?php echo $row["heading2"]; ?></td>
                        <td><?php echo $row["subheading2"]; ?></td>
                        <td><?php echo $row["content2"]; ?></td>
                      </tr>
                      <tr id = <?php echo $row["id"]; ?>>
                        <td>Reservation</td>
                        <td><?php echo $row["heading3"]; ?></td>
                        <td><?php echo $row["subheading3"]; ?></td>
                        <td><?php echo $row["content3"]; ?></td>
                        <td>
                          <button class="btn btn-info btn-sm btn-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit Content
                          </button></td>
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
        <form id = "form_edit">
          <div class="modal fade edit" id="modal-edit">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edit Home Content</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="type" id="type" value = "edit">
                  <input type="hidden" name="edit_content_id" id="edit_content_id">

                  <div class="form-group">
                    <label>About Heading</label>
                    <input type="text" class="form-control" name="edit_heading" id="edit_heading" placeholder="">
                  </div>
                  
                  <div class="form-group">
                    <label>About Subheading</label>
                    <input type="text" class="form-control" name="edit_subheading" id="edit_subheading" placeholder="">
                  </div>

                  <div class="form-group">
                    <label>About Content</label>
                    <input type="text" class="form-control" name="edit_content" id="edit_content" placeholder="">
                  </div>

                  <div class="form-group">
                    <label>Menu Heading</label>
                    <input type="text" class="form-control" name="edit_heading2" id="edit_heading2" placeholder="">
                  </div>
                  
                  <div class="form-group">
                    <label>Menu Subheading</label>
                    <input type="text" class="form-control" name="edit_subheading2" id="edit_subheading2" placeholder="">
                  </div>

                  <div class="form-group">
                    <label>Menu Content</label>
                    <input type="text" class="form-control" name="edit_content2" id="edit_content2" placeholder="">
                  </div>

                  <div class="form-group">
                    <label>Reservation Heading</label>
                    <input type="text" class="form-control" name="edit_heading3" id="edit_heading3" placeholder="">
                  </div>
                  
                  <div class="form-group">
                    <label>Reservation Subheading</label>
                    <input type="text" class="form-control" name="edit_subheading3" id="edit_subheading3" placeholder="">
                  </div>

                  <div class="form-group">
                    <label>Reservation Content</label>
                    <input type="text" class="form-control" name="edit_content3" id="edit_content3" placeholder="">
                  </div>
                  
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" id = "btnEditRecord" value = "Update Content">
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
        url: 'process_webcontent.php',
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
$('#example1 tbody').on('click', '.btn-edit', function () {

  document.getElementById("edit_content_id").value = $(this).closest("tr").attr('id');

  $('#modal-edit').modal('show');

});
});
</script>
<div class="preloader flex-column justify-content-center align-items-center" background="#163832">
    <img class="animation__shake" src="6.png" alt="K&RLogo">
  </div>
</body>
</html>
