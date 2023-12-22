<?php

require('connection.inc.php');

if(isset($_POST['type']) != ''){

  if($_POST['type']=='insert'){

    $course_code = $_POST['new_course_code'];
    $course_description = $_POST['new_course_description'];

    //Back-end Validation.
    if($course_code == "" || $course_description == "")
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "INSERT INTO tables (name, description, status)
    VALUES ('$course_code', '$course_description', '1')";

    if ($conn->query($sql) === TRUE) {
      $response = array('title' => 'Success', 'message' => 'Table has been successfully added.');

    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
    }

    $conn->close();
  }

  if($_POST['type']=='edit'){

    $course_id = $_POST['edit_course_id'];
    $course_code = $_POST['edit_course_code'];
    $course_description = $_POST['edit_course_description'];

    if($course_id == "" || $course_code == "" || $course_description == "")
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "UPDATE tables SET name = '$course_code', description = '$course_description' WHERE id = '$course_id'";

    if ($conn->query($sql) === TRUE) {
      $response = array('title' => 'Success', 'message' => 'Table has been successfully updated.');

    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
    }

    $conn->close();
  }

   if($_POST['type']=='activate' || $_POST['type']=='deactivate'){

    $course_id = $_POST['course_id'];
    $status = ($_POST['type']=='activate') ? 1 : 0;

    //Back-end Validation.
    if($course_id == "")
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "UPDATE tables SET status=$status WHERE id ='$course_id'";

    if ($conn->query($sql) === TRUE) {
      if($_POST['type']=='activate')
      {
        $response = array('title' => 'Success', 'message' => 'Table is now vacant.');
      }
      else
      {
        $response = array('title' => 'Success', 'message' => 'Table is now occupied.');
      }
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
        $sql = "DELETE FROM tables WHERE id ='$course_id'";

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
