<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $id = $_SESSION['id'];
  $target_dir = "uploads/";
  $newfilename = 'cv_'.$id.'.pdf';
  $target_file = $target_dir . $newfilename;
  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  $imageFileType = finfo_file($finfo, $_FILES['cvfile']['tmp_name']);
  if($imageFileType == "application/pdf") {
    if(move_uploaded_file($_FILES["cvfile"]["tmp_name"],'../'.$target_file)) {
      $con = mysqli_connect("localhost","root","","ergasos");
      $query = "UPDATE account_details SET cv='$target_file' WHERE userID = '$id'";
      if(mysqli_query($con,$query)) {
        setcookie("upload_cv_success","true",time() + 10,"/");
      }
      else {
        setcookie("upload_cv_success","false",time() + 10,"/");
      }
    }
    else {
      setcookie("upload_cv_success","false",time() + 10,"/");
    }
  }
  else {
    setcookie("upload_cv_success","type_error",time() + 10,"/");
  }
  header("Location: {$_SERVER["HTTP_REFERER"]}");
?>
