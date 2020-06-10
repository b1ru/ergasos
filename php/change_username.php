<?php
  $con = mysqli_connect("localhost","root","","ergasos");
  $newusername = $_POST['newusername'];
  $currentpassword = $_POST['currentpassword'];
  $passwordquery = "SELECT password FROM login WHERE userID = 1";
  $results = mysqli_query($con,$passwordquery);
  $row = mysqli_fetch_row($results);
  if($row[0] == $currentpassword){
    $changeusername = "UPDATE login SET username='$newusername' WHERE userID = 1";
    mysqli_query($con,$changeusername);
  }

  header("Location: {$_SERVER["HTTP_REFERER"]}");
?>
