<?php

require('connection.inc.php');

if(isset($_POST['type']) != ''){

  if($_POST['type']=='insert'){

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    $password = $_POST['password'];
    

    if($name == "" || $username == "" || $email == "" || $phone == "" || $position == "" || $password == "")
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "INSERT INTO users (name, username, email, phone, position, password)
    VALUES ('$name', '$username', '$email', '$phone', '$position', '$password')";

    if ($conn->query($sql) === TRUE) {
      $response = array('title' => 'Success', 'message' => 'Registration Successful.');

    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
    }

    $conn->close();
  }

  if($_POST['type']=='edit'){

    $user_id = $_POST['edit_user_id'];
    $username = $_POST['edit_username'];
    $pass = $_POST['edit_pass'];
    $position = $_POST['edit_position'];

    if($username == "" || $pass == "" || $position == "")
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "UPDATE users SET username = '$username', password = '$pass', position = '$position' WHERE id = '$user_id'";

    if ($conn->query($sql) === TRUE) {
      $response = array('title' => 'Success', 'message' => 'Information has been successfully updated.');

    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
    }

    $conn->close();
  }
  
  //delete
  if ($_POST['type'] == 'delete') {
    $user_id = $_POST['user_id'];

    if ($user_id == "") {
        $response = array('title' => 'Warning', 'message' => 'Data is invalid');
    } else {
        $sql = "DELETE FROM users WHERE id ='$user_id'";

        if ($conn->query($sql) === TRUE) {
            $response = array('title' => 'Success', 'message' => 'User is now deleted.');
        } else {
            $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
        }
    }
    $conn->close();
  }
  
  echo json_encode($response);

}
?>
