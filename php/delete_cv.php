<?php
session_start();
	if(!isset($_SESSION['id'])){
		header("Location: ./sign-in.html");
	}
	else {
		$id = $_SESSION['id'];
	}
	$con = mysqli_connect("localhost","root","","ergasos");
	$query="UPDATE account_details SET cv=NULL WHERE userID='$id'";
	if (mysqli_query($con, $query)) {
		unlink("../uploads/cv_".$id.".pdf");
		setcookie("delete_cv_success","true",time() + 10,"/");
		header("Location: {$_SERVER["HTTP_REFERER"]}");
	} 
	else {
		setcookie("delete_cv_success","false",time() + 10,"/");
		echo "Error updating record: " . mysqli_error($con);
	}
?>
