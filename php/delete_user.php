<?php
	if (session_status() == PHP_SESSION_NONE) {
	session_start();
	}
	if (!isset($_SESSION['id']) || $_SESSION['id']!=1){
		header('Location: ../index.php');
	}
	else{
		$username = filter_input(INPUT_GET, 'username');
		$con = mysqli_connect("localhost","root","","ergasos");
		$query = "SELECT userID FROM login WHERE username = '$username'";
		$res=mysqli_query($con,$query);
		$row = mysqli_fetch_assoc($res);
		$id=$row['userID'];

		$query = "DELETE FROM login WHERE userID = '$id'";
    	mysqli_query($con,$query);

    	$query = "DELETE FROM account_details WHERE userID = '$id'";
    	mysqli_query($con,$query);

    	$query = "DELETE FROM applications WHERE userID = '$id'";
    	mysqli_query($con,$query);

    	$query = "DELETE listing_details,listings FROM listing_details INNER JOIN listings ON listing_details.listingID=listings.listingID WHERE listings.userID = '$id'";
    	mysqli_query($con,$query);
	}
?>