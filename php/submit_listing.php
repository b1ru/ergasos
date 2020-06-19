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
  $title = mysqli_real_escape_string($con,$_POST['title']);
  $creator = mysqli_real_escape_string($con,$_POST['name']);
  $country = mysqli_real_escape_string($con,$_POST['country']);
  $city = mysqli_real_escape_string($con,$_POST['city']);
  $address = mysqli_real_escape_string($con,$_POST['address']);
  $telephone = mysqli_real_escape_string($con,$_POST['telephone']);
  $email = mysqli_real_escape_string($con,$_POST['email']);
  if($_POST['hours'] == 2){
    $full_time = 0;
  }
  else {
    $full_time = 1;
  }
  $description = $_POST['description'];
  $tags = $_POST['tags'];
  if($tags == '') {
    $query = "INSERT INTO listing_details (title,date_added,creator,country,city,address,telephone,email,full_time,description,tags)
              VALUES('$title',CURRENT_DATE(),'$creator','$country','$city','$address','$telephone','$email',$full_time,'$description',NULL)";
  }

  else {
  $query = "INSERT INTO listing_details (title,date_added,creator,country,city,address,telephone,email,full_time,description,tags)
            VALUES('$title',CURRENT_DATE(),'$creator','$country','$city','$address','$telephone','$email',$full_time,'$description','$tags')";
  }

  mysqli_query($con,$query);
  if (mysqli_affected_rows($con) == 0 ) {
    $ok = 0;
  }
  mysqli_query($con,"INSERT INTO listings (userID) VALUES('$id')");
  if (mysqli_affected_rows($con) == 0 ) {
    $ok = 0;
  }

  if($ok == 1) {
    setcookie("listing_submit_success","true",time() + 10,"/");
  }
  else {
    setcookie("listing_submit_success","false",time() + 10,"/");
  }
  header("Location: ../my_listings.html");
?>
