<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header("Location: ./sign-in.html");
  }
  else {
    $id = $_SESSION['id'];
  }
  $con = mysqli_connect("localhost","root","","ergasos");
  $name = mysqli_real_escape_string($con,$_POST['name']);
  $address = mysqli_real_escape_string($con,$_POST['address']);
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $telephone = mysqli_real_escape_string($con,$_POST['telephone']);
  $query = "UPDATE account_details SET name='$name',address='$address',email='$email',telephone='$telephone' WHERE userID = '$id'";
  if(mysqli_query($con,$query)) {
    setcookie("info_change_success","true",time() + 10,"/");
  }
  else {
    setcookie("info_change_success","false",time() + 10,"/");
  }
  header("Location: {$_SERVER["HTTP_REFERER"]}");
?>
