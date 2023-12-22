<?php

require('connection.inc.php');

//add reservation
if(isset($_POST['type']) != ''){

  if($_POST['type']=='insert'){

 $araw = $_POST['bagong_araw'];  
 $oras = $_POST['bagong_oras'];
 $table_no = $_POST['table_id'];
 $name = $_POST['name'];
 $contact = $_POST['contact'];
 $email = $_POST['email'];

    //Back-end Validation.
    if($araw == "" || $oras == "" || $table_no == "" || $name == "" || $contact == "" || $email == "")
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "INSERT INTO reservations (date, time, table_id, name, contact, email, status)
    VALUES ('$araw', '$oras', '$table_no', '$name', '$contact', '$email', 'Pending')";

    if ($conn->query($sql) === TRUE) {
      $response = array('title' => 'Success', 'message' => 'Reservation has been successfully submitted. Please wait for the confirmation message from the administrator.');

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
    $rowId = $_GET['id'];

    $sql = "SELECT * FROM reservations WHERE id = $rowId";
    $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Display data in a format (e.g., HTML)
        $row = $result->fetch_assoc();
        echo "Column1: " . $row['date'] . "<br>";
        echo "Column2: " . $row['time'] . "<br>";
        echo "Column3: " . $row['table_id'] . "<br>";
        echo "Column4: " . $row['name'] . "<br>";
        echo "Column5: " . $row['contact'] . "<br>";
        echo "Column6: " . $row['enail'] . "<br>";
        echo "Column7: " . $row['status'] . "<br>";
        // Add more columns as needed
    } else {
        echo "No results found for the specified row ID";
    }

        $conn->close();
      }

  echo json_encode($response);
?>