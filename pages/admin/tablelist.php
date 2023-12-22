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
            <a href = "tablelist.php" class="nav-link active">
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
            <h1>Tables</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
    require 'connection.inc.php';

    $sql_tables = "SELECT * FROM tables ORDER BY id ASC";
    $result_tables = mysqli_query($conn, $sql_tables);

    mysqli_close($conn);
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Tables</h3>
                <div class="float-right">
                  <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-add-new"><i class="fas fa-user-plus"></i> Add New Record</button>
              </div>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width = "5%">No.</th>
                    <th>Table Name</th>
                    <th>Description</th>
                    <th width = "10%">Status</th>
                    <th width = "23%">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if (mysqli_num_rows($result_tables) > 0) {
                    $i = 1;
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result_tables)) { ?>
                      <tr id = <?php echo $row["id"]; ?>>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["description"]; ?></td>
                        <td>
                          <?php
                            if($row["status"])
                            {
                              echo '<span class="badge badge-success">Vacant</span>';
                            }
                            else
                            {
                              echo '<span class="badge badge-danger">Occupied</span>';
                            }
                          ?>
                        </td>
                        <td>
                          <?php
                            if($row["status"])
                            { ?>
<button class="btn btn-primary btn-sm btn-deactivate" style = "width: 100px;"><i class="fas fa-user-slash"></i>Vacant</button>
                            <?php
                            }
                            else
                            { ?>
                              <button class="btn btn-primary btn-sm btn-activate" style = "width: 100px;">
                              <i class="fas fa-user-check"></i>
                              Occupied
                              </button>
                        <?php
                           }
                          ?>
                          <button class="btn btn-info btn-sm btn-edit">
                              <i class="fas fa-pencil-alt"></i>
                              Edit
                          </button>
                          <button class="btn btn-danger btn-sm btn-delete" >
                              <i class="fas fa-trash"></i>
                              Delete
                          </button>
                        </td>
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
        <form id = "form_new">
            <div class="modal fade" id="modal-add-new">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">New Table</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="type" id="type" value = "insert">
                    <div class="form-group">
                      <label>Table Name</label>
                      <input type="text" class="form-control" name="new_course_code" id="new_course_code" placeholder="Table Name">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" class="form-control" name="new_course_description" id="new_course_description" placeholder="Description ">
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" id = "btnAddNewRecord" value = "Add New Table">
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
                  <h4 class="modal-title">Edit Table</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="type" id="type" value = "edit">
                  <input type="hidden" name="edit_course_id" id="edit_course_id">

                  <div class="form-group">
                    <label>Table Name</label>
                    <input type="text" class="form-control" name="edit_course_code" id="edit_course_code" placeholder="Table Name">
                  </div>
                  
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="edit_course_description" id="edit_course_description" placeholder="Description">
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
<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
$(function () {
  $('#form_new').validate({
    rules: {
      new_course_code: {
        required: true
      },
      new_course_description: {
        required: true
      },

    },
    messages: {
      new_course_code: {
        required: "Please provide a table",
      },
      new_course_description: {
        required: "Please provide a table description",
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

$('#form_edit').validate({
    rules: {
      edit_course_code: {
        required: true
      },
      edit_course_description: {
        required: true
      },

    },
    messages: {
      edit_course_code: {
        required: "Please provide a table",
      },
      edit_course_description: {
        required: "Please provide a table description",
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
<script>
$(document).ready(function() {
$("#form_new").submit(function(event) {
  event.preventDefault(); //prevent submit
  var form = $(this);

  if(form.valid() == true){
    $.ajax({
        type: "POST",
        cache: false,
        url: 'process_tables.php',
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
  } else {
    Swal.fire('Error!', response_data.message, 'error');
  }

});

$("#form_edit").submit(function(event) {
  event.preventDefault(); //prevent submit
  var form = $(this);

  if(form.valid() == true){
    $.ajax({
        type: "POST",
        cache: false,
        url: 'process_tables.php',
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
  } else {
    Swal.fire('Error!', response_data.message, 'error');
  }

});
});

$(document).ready(function() {

$('#example1 tbody').on('click', '.btn-activate', function () {

  var course_id = $(this).closest("tr").attr('id');

  var $status = $(this).closest("tr").children(":eq(3)");
  var $actions = $(this).closest("tr").children(":eq(4)");


  $.ajax({
        type: "POST",
        cache: false,
        url: 'process_tables.php',
        data: {type:'activate',course_id:course_id},
        success:function(data){
          var response_data = JSON.parse(data);

          if(response_data.title == 'Success')
          {
            $status.html('<span class="badge badge-success">Active</span>');
            $actions.html($actions.html().toString().replace('btn-activate','btn-deactivate').replace('fas fa-user-check', 'fas fa-user-slash').replace('Activate', 'Deactivate'));

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

$('#example1 tbody').on('click', '.btn-deactivate', function () {

var course_id = $(this).closest("tr").attr('id');

var $status = $(this).closest("tr").children(":eq(3)");
var $actions = $(this).closest("tr").children(":eq(4)");

$.ajax({
      type: "POST",
      cache: false,
      url: 'process_tables.php',
      data: {type:'deactivate',course_id:course_id},
      success:function(data){
        var response_data = JSON.parse(data);
        

      if(response_data.title == 'Success')
      {
        $status.html('<span class="badge badge-danger">Inactive</span>');
        $actions.html($actions.html().toString().replace('btn-deactivate','btn-activate').replace('fas fa-user-slash', 'fas fa-user-check').replace('Deactivate', 'Activate'));

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

$('#example1 tbody').on('click', '.btn-edit', function () {

  document.getElementById("edit_course_id").value = $(this).closest("tr").attr('id');
  document.getElementById("edit_course_code").value = $(this).closest("tr").children(":eq(1)").text();
  document.getElementById("edit_course_description").value = $(this).closest("tr").children(":eq(2)").text();

  $('#modal-edit').modal('show');

});

$('#example1 tbody').on('click', '.btn-delete', function () {
    var course_id = $(this).closest("tr").attr('id');
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
                url: 'process_tables.php',
                data: { type: 'delete', course_id: course_id }, // Sending type and course_id
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
