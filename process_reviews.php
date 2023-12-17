<?php

require('connection.inc.php');

if(isset($_POST['type']) != ''){

  if($_POST['type']=='insert'){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $message = $_POST['message'];

    $sql = "INSERT INTO reviews (name, email, contact, message)
    VALUES ('$name', '$email', '$contact', '$message')";

    if ($conn->query($sql) === TRUE) {
      $response = array('title' => 'Success', 'message' => 'Course has been successfully created.');

    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
    }

    $conn->close();
  }

  echo json_encode($response);
}
?>