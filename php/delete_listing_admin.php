<?php
	if (session_status() == PHP_SESSION_NONE) {
	session_start();
	}
	if (!isset($_SESSION['id']) || $_SESSION['id']!=1){
		header('Location: ../index.php');
	}
	else{
		$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
		$con = mysqli_connect("localhost","root","","ergasos");
		$query = "DELETE FROM listing_details WHERE listingID = '$id'";
    	mysqli_query($con,$query);
    	
    	$query = "DELETE FROM listings WHERE listingID = '$id'";
    	mysqli_query($con,$query);
    	
    	$query = "DELETE FROM applications WHERE listingID = '$id'";
    	mysqli_query($con,$query);
    	header('Location: ../index.php');
	}
?>