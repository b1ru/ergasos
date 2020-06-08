<?php
  $con = mysqli_connect("localhost","root","","ergasos");
  $name = $_POST['name'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $telephone = $_POST['telephone'];
  $query = "UPDATE account_details SET first_name='$name',last_name='$name',address='$address',email='$email',telephone='$telephone' WHERE userID = 1";
  mysqli_query($con,$query);
  header("Location: {$_SERVER["HTTP_REFERER"]}");
?>
