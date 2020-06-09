<?php
  $con = mysqli_connect("localhost","root","","ergasos");
  $title = $_POST['title'];
  $creator = $_POST['name'];
  $country = $_POST['country'];
  $city = $_POST['city'];
  $address = $_POST['address'];
  $telephone = $_POST['telephone'];
  $email = $_POST['email'];
  if($_POST['hours'] == 2){
    $full_time = 0;
  }
  else {
    $full_time = 1;
  }
  $description = $_POST['description'];
  $maxID = mysqli_query($con,"SELECT MAX(listingID) FROM listing_details");
  $row = mysqli_fetch_row($maxID);
  $ID = $row[0] + 1;
  $query = "INSERT INTO listing_details (listingID,title,date_added,creator,country,city,address,telephone,email,full_time,description)
            VALUES($ID,'$title',CURRENT_DATE(),'$creator','$country','$city','$address','$telephone','$email',$full_time,'$description')";

  mysqli_query($con,$query);
  mysqli_query($con,"INSERT INTO listings (listingID,userID) VALUES($ID,1)");
  header("Location: ../my_listings.html");
?>
