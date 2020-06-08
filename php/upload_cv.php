<?php
  $target_dir = "C:/xampp/uploads/";
  $newfilename = "cv_1.pdf";
  $target_file = $target_dir . $newfilename;
  move_uploaded_file($_FILES["cvfile"]["tmp_name"],$target_file);
  header("Location: {$_SERVER["HTTP_REFERER"]}");
?>
