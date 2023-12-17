<?php

require('connection.inc.php');

if(isset($_POST['type']) != ''){

  if($_POST['type']=='edit'){

    $content_id = $_POST['edit_content_id'];
    $heading = $_POST['edit_heading'];
    $subheading = $_POST['edit_subheading'];
    $content = $_POST['edit_content'];
    $heading2 = $_POST['edit_heading2'];
    $subheading2 = $_POST['edit_subheading2'];
    $content2 = $_POST['edit_content2'];
    $heading3 = $_POST['edit_heading3'];
    $subheading3 = $_POST['edit_subheading3'];
    $content3 = $_POST['edit_content3'];

    if($content_id == "" || $heading == "" || $subheading == "" || $content == "" || $heading2 == "" || $subheading2 == "" || $content2 == "" || $heading3 == "" || $subheading3 == "" || $content3 == "")
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "UPDATE webcontent SET heading = '$heading', subheading = '$subheading', content = '$content', heading2 = '$heading2', subheading2 = '$subheading2', content2 = '$content2', heading3 = '$heading3', subheading3 = '$subheading3', content3 = '$content3' WHERE id = '$content_id'";

    if ($conn->query($sql) === TRUE) {
      $response = array('title' => 'Success', 'message' => 'Content has been successfully updated.');

    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
    }
    $conn->close();
  }

  
  echo json_encode($response);

}
?>
