<?php

require('connection.inc.php');

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

        $stmt = $conn->prepare("Insert into users(name, username, email, phone, position, password) 
        values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiss" ,$name, $username, $email, $phone, $position, $password);
        $stmt->execute();
        echo "Registration Success";
        $stmt->close();
        $conn->close();
    

?>