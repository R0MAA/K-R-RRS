<?php

require('connection.inc.php');

//add reservation
if(isset($_POST['type']) != ''){

  if($_POST['type']=='insert'){

    $user_username=$POST['user_username'];
    $user_email=$POST['user_email'];
    $user_postion=$POST['user_position'];
    $user_password=$POST['user_password'];
    $conf_user_password=$POST['conf_user_password'];
    $user_address=$POST['user_address'];
    $user_contact=$POST['user_contact'];

    //Back-end Validation.
    if($user_username == "" || $user_email == "" || $user_postion == "" || $user_password == "" || $conf_user_password == "" || $user_address == "" || $user_contact == "")
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "INSERT INTO users (username, user_email, user_password, user_image, user_position, user_address, user_mobile)
    VALUES ('$user_username', '$user_email', '$user_password', '0', '$user_postion', '$user_address', '$user_contact')";

    if ($conn->query($sql) === TRUE) {
      $response = array('title' => 'Success', 'message' => 'Registration successful.');

    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please try again or contact the administrator.');
    }

    $conn->close();
  }
}

  //update status
  if($_POST['type']=='edit'){

    $reserv_id = $_POST['edit_reserv_id'];
    $status = $_POST['edit_status'];

    if($reserv_id == "" || $status == "" )
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }
    $sql = "UPDATE reservations SET status = '$status' WHERE id = '$reserv_id'";

    if ($conn->query($sql) === TRUE) {
      $response = array('title' => 'Success', 'message' => 'Status has been successfully updated.');

    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
    }

    $conn->close();
  }
  
  //delete
  if ($_POST['type'] == 'delete') {
    $reserv_id = $_POST['reserv_id'];

    if ($reserv_id == "") {
        $response = array('title' => 'Warning', 'message' => 'Data is invalid');
    } else {
        $sql = "DELETE FROM reservations WHERE id ='$reserv_id'";

        if ($conn->query($sql) === TRUE) {
            $response = array('title' => 'Success', 'message' => 'Reservation is now deleted.');
        } else {
            $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
        }
    }
    $conn->close();
  }

  //view
  if ($_POST['type'] == 'view') {
    $reserv_id = $_POST['view_reserv_id'];
    
    $conn->close();
  }
  
  echo json_encode($response);
?>
