<?php 
	session_start();
	$applicationid=$_SESSION['applyID'];
	$userID=$_SESSION['id'];
	unset($_SESSION['applyID']);
	$con = mysqli_connect("localhost","root","","ergasos");
	$query="INSERT INTO applications (userID,listingID) VALUES ('$userID','$applicationid')";
	$dupecheck="SELECT * FROM applications WHERE userID = '$userID'";
	$res=mysqli_query ( $con, $dupecheck );
	if(mysqli_num_rows ( $res )>=1)
	{
		setcookie("application_dupe","true",time() + 10,"/");
		header("Location: ../my_applications.html");
	}
	else
	{
		mysqli_query($con,$query);
		if (mysqli_affected_rows($con) == 0 ) {
	    	$ok = 0;
	  	}
	  	if($ok == 1) {
	    	setcookie("application_submit_success","true",time() + 10,"/");
		}
		else {
			setcookie("application_submit_success","false",time() + 10,"/");
		}
			header("Location: ../my_applications.html");
	}
 ?>