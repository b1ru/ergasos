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

    $ok = 1;
    $listingid = $_POST['listingID'];
    echo $listingid;

    $query = "DELETE FROM applications WHERE listingID = '$listingid' AND userID = '$id'";
    mysqli_query($con,$query);
    if (mysqli_affected_rows($con) == 0 ) {
      $ok = 0;
    }

    if($ok == 1) {
      setcookie("application_delete_success","true",time() + 10,"/");
    }
    else {
      setcookie("application_delete_success","false",time() + 10,"/");
    }

    header("Location: {$_SERVER["HTTP_REFERER"]}");
?>
