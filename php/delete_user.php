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
		$ok=1;

		$query = "DELETE FROM login WHERE userID = '$id'";
    	mysqli_query($con,$query);
    	if (mysqli_affected_rows($con) == 0 ) {
	      $ok = 0;
	    }

    	$query = "DELETE FROM account_details WHERE userID = '$id'";
    	mysqli_query($con,$query);
    	if (mysqli_affected_rows($con) == 0 ) {
	      $ok = 0;
	    }

    	$query = "DELETE FROM applications WHERE userID = '$id'";
    	mysqli_query($con,$query);
    	if (mysqli_affected_rows($con) == 0 ) {
	      $ok = 0;
	    }

    	$query = "DELETE listing_details,listings FROM listing_details INNER JOIN listings ON listing_details.listingID=listings.listingID WHERE listings.userID = '$id'";
    	mysqli_query($con,$query);
    	if (mysqli_affected_rows($con) == 0 ) {
	      $ok = 0;
	    }
	    if($ok == 1) {
	      setcookie("user_delete_success","true",time() + 10,"/");
	    }
	    else {
	      setcookie("user_delete_success","false",time() + 10,"/");
	    }
	    header('Location: ../index.php');
	}

?>
