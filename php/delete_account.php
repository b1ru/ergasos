<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if(!isset($_SESSION['id'])){
    header("Location: ./sign-in.php");
  }
  else {
    $id = $_SESSION['id'];
  }
  $con = mysqli_connect("localhost","root","","ergasos");
  $query = "DELETE FROM login WHERE userID = '$id'";
  mysqli_query($con,$query);

  $query = "DELETE FROM account_details WHERE userID = '$id'";
  mysqli_query($con,$query);

  $query = "DELETE FROM applications WHERE userID = '$id'";
  mysqli_query($con,$query);

  $query = "DELETE listings,listing_details FROM
  listings INNER JOIN listing_details ON listings.listingID= listing_details.listingID
  WHERE listings.userID = '$id'";
  mysqli_query($con,$query);

  require("logout.php");
?>
