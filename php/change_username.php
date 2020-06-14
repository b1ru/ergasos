<?php
  $con = mysqli_connect("localhost","root","","ergasos");
  $newusername = $_POST['newusername'];
  $currentpassword = $_POST['currentpassword'];
  $passwordquery = "SELECT password FROM login WHERE userID = 1";
  $results = mysqli_query($con,$passwordquery);
  $row = mysqli_fetch_row($results);
  if($row[0] == $currentpassword){
    $changeusername = "UPDATE login SET username='$newusername' WHERE userID = 1";
    if (mysqli_query($con,$changeusername)) {
      setcookie('username_change_success','true',time() + 10,'/');
    }
    else {
      setcookie('username_change_success','false',time() + 10,'/');
    }
  }
  else {
    setcookie('username_change_success','false',time() + 10,'/');
  }

  header("Location: {$_SERVER["HTTP_REFERER"]}");
?>
