<?php
  $con = mysqli_connect("localhost","root","","ergasos");
  $ok = 1;
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
  mysqli_query($con,"INSERT INTO listings (userID) VALUES(1)");
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
