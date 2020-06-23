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
    	$ok=1;
    	if (mysqli_affected_rows($con) == 0 ) {
	      $ok = 0;
	    }
    	
    	$query = "DELETE FROM listings WHERE listingID = '$id'";
    	mysqli_query($con,$query);
    	if (mysqli_affected_rows($con) == 0 ) {
	      $ok = 0;
	    }
    	
    	$query = "DELETE FROM applications WHERE listingID = '$id'";
    	mysqli_query($con,$query);

    	if($ok == 1) {
	      setcookie("listing_delete_success","true",time() + 10,"/");
	    }
	    else {
	      setcookie("listing_delete_success","false",time() + 10,"/");
	    }
    	header('Location: ../index.php');
	}
?>
