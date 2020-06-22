<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if(!isset($_SESSION['id'])){
    header("Location: ./sign-in.php");
  }
    $con = mysqli_connect("localhost","root","","ergasos");

    $ok = 1;
    $id = $_POST['listingID'];

    //delete from listing_details
    $query = "DELETE FROM listing_details WHERE listingID = '$id'";
    mysqli_query($con,$query);

    if (mysqli_affected_rows($con) == 0 ) {
      $ok = 0;
    }

    //delete from listings
    $query = "DELETE FROM listings WHERE listingID = '$id'";
    mysqli_query($con,$query);

    if (mysqli_affected_rows($con) == 0 ) {
      $ok = 0;
    }

    //delete from applications
    $query = "DELETE FROM applications WHERE listingID = '$id'";
    mysqli_query($con,$query);

    if($ok == 1) {
      setcookie("listing_delete_success","true",time() + 10,"/");
    }
    else {
      setcookie("listing_delete_success","false",time() + 10,"/");
    }

    header("Location: {$_SERVER["HTTP_REFERER"]}");
?>
