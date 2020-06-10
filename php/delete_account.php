<?php
  $con = mysqli_connect("localhost","root","","ergasos");
  $query = "DELETE FROM login WHERE userID = 1";
  mysqli_query($con,$query);

  header('Location: ../index.html');
?>
