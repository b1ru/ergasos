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
  $newusername = mysqli_real_escape_string($con,$_POST['newusername']);
  $currentpassword = mysqli_real_escape_string($con,$_POST['currentpassword']);
  $passwordquery = "SELECT password FROM login WHERE userID = '$id'";
  $usernamexistsquery = "SELECT username FROM login WHERE username= '$newusername'";
  $dupename = mysqli_query($con,$usernamexistsquery);
  $results = mysqli_query($con,$passwordquery);
  $row = mysqli_fetch_row($results);
  if (mysqli_num_rows($dupename)>=1) {
  	setcookie('username_taken','true',time() + 10,'/');
  }
  else{
	  if(password_verify($currentpassword, $row[0])){
	    $changeusername = "UPDATE login SET username='$newusername' WHERE userID = '$id'";
	    if (mysqli_query($con,$changeusername)) {
	      setcookie('username_change_success','true',time() + 10,'/');
	    }
	    else {
	      setcookie('username_change_success','false',time() + 10,'/');
	    }
	  }
	  else {
	    setcookie('username_change_success','false',time() + 10,'/');
	  }
	}

  header("Location: {$_SERVER["HTTP_REFERER"]}");
?>
