<?php 
	session_start();
	$ok=1;
	$applicationid=$_SESSION['applyID'];
	$userID=$_SESSION['id'];
	unset($_SESSION['applyID']);
	$con = mysqli_connect("localhost","root","","ergasos");
	$query="INSERT INTO applications (userID,listingID) VALUES ('$userID','$applicationid')";
	$dupecheck="SELECT * FROM applications WHERE userID = '$userID' AND listingID=$applicationid";
	$res=mysqli_query ( $con, $dupecheck );
	if(mysqli_num_rows ( $res )>=1)
	{
		header("Location: ../my_applications.php");
	}
	else
	{
		
		if (!mysqli_query($con,$query) ) {
	    	$ok = 0;
	  	}
	  	if($ok == 1) {
	    	setcookie("application_submit_success","true",time() + 10,"/");
		}
		else {
			setcookie("application_submit_success","false",time() + 10,"/");
		}
			header("Location: ../my_applications.php");
	}
 ?>
