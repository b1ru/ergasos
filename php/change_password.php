<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if(!isset($_SESSION['id'])){
    header("Location: ./sign-in.html");
  }
  else {
    $id = $_SESSION['id'];
  }
  $con = mysqli_connect("localhost","root","","ergasos");
  $oldpassword = mysqli_real_escape_string($con,$_POST['oldpassword']);
  $newpassword = mysqli_real_escape_string($con,$_POST['newpassword']);
  $passwordquery = "SELECT password FROM login WHERE userID = '$id'";
  $results = mysqli_query($con,$passwordquery);
  $row = mysqli_fetch_row($results);
  if($row[0] == $oldpassword){
    $changepassword = "UPDATE login SET password='$newpassword' WHERE userID = '$id'";
    if(mysqli_query($con,$changepassword)) {
      setcookie('password_change_success','true',time() + 10,'/');
    }
    else {
      setcookie('password_change_success','false',time() + 10,'/');
    }
  }
  else {
    setcookie('password_change_success','false',time() + 10,'/');
  }

  header("Location: {$_SERVER["HTTP_REFERER"]}");
?>
