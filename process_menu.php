<?php

require('connection.inc.php');

if(isset($_POST['type']) != ''){

  if($_POST['type']=='insert'){

    $food = $_POST['new_food'];
    $price = $_POST['new_price'];
    $description = $_POST['new_description'];

    //Back-end Validation.
    if($food == "" || $price == "" || $description == "")
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "INSERT INTO maincourse (name, price, description)
    VALUES ('$food', '$price', '$description')";

    if ($conn->query($sql) === TRUE) {
      $response = array('title' => 'Success', 'message' => 'Table has been successfully added.');

    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
    }

    $conn->close();
  }

  if($_POST['type']=='edit'){

    $course_id = $_POST['edit_course_id'];
    $food = $_POST['edit_food'];
    $price = $_POST['edit_price'];
    $description = $_POST['edit_description'];

    if($course_id == "" || $food == "" || $price == "" || $description == "")
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "UPDATE maincourse SET name = '$food', price = '$price', description = '$description' WHERE id = '$course_id'";

    if ($conn->query($sql) === TRUE) {
      $response = array('title' => 'Success', 'message' => 'Table has been successfully updated.');

    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
    }

    $conn->close();
  }
  
  //delete
  if ($_POST['type'] == 'delete') {
    $course_id = $_POST['course_id'];

    if ($course_id == "") {
        $response = array('title' => 'Warning', 'message' => 'Data is invalid');
    } else {
        $sql = "DELETE FROM maincourse WHERE id ='$course_id'";

        if ($conn->query($sql) === TRUE) {
            $response = array('title' => 'Success', 'message' => 'Table is now deleted.');
        } else {
            $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
        }
    }
    $conn->close();
  }
  
  echo json_encode($response);

}
?>
