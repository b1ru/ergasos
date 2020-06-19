<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header("Location: ./sign-in.html");
  }
  else {
    $id = $_SESSION['id'];
  }
    $con = mysqli_connect("localhost","root","","ergasos");

    $ok = 1;
    $title = $_POST['listingname'];
    $query = "SELECT listings.listingID
    FROM listings INNER JOIN listing_details ON listings.listingID = listing_details.listingID
    WHERE listings.userID = '1' AND listing_details.title = '$title'";

    $results = mysqli_query($con,$query);
    if(!$results) {
      $ok = 0;
    }
    $row = mysqli_fetch_row($results);
    $listingid = $row[0];

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
