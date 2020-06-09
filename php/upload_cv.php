<?php
  $target_dir = "../uploads/";
  $newfilename = "cv_1.pdf";
  $target_file = $target_dir . $newfilename;
  move_uploaded_file($_FILES["cvfile"]["tmp_name"],$target_file);
  $con = mysqli_connect("localhost","root","","ergasos");
  $query = "UPDATE account_details SET cv='uploads/cv_1.pdf' WHERE userID = 1";
  mysqli_query($con,$query);
  header("Location: {$_SERVER["HTTP_REFERER"]}");
?>
