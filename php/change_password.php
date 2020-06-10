<?php
  $con = mysqli_connect("localhost","root","","ergasos");
  $oldpassword = $_POST['oldpassword'];
  $newpassword = $_POST['newpassword'];
  $passwordquery = "SELECT password FROM login WHERE userID = 1";
  $results = mysqli_query($con,$passwordquery);
  $row = mysqli_fetch_row($results);
  if($row[0] == $oldpassword){
    $changepassword = "UPDATE login SET password='$newpassword' WHERE userID = 1";
    mysqli_query($con,$changepassword);
  }

  header("Location: {$_SERVER["HTTP_REFERER"]}");
?>
