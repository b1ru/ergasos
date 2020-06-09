<?php 
	$con = mysqli_connect("localhost","root","","ergasos");
	if($con === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$fname = mysqli_real_escape_string($con, $_REQUEST['firstName']);
	$lname = mysqli_real_escape_string($con, $_REQUEST['lastName']);
	$name = $fname." ".$lname;
	$email = mysqli_real_escape_string($con, $_REQUEST['email']);
	$username = mysqli_real_escape_string($con, $_REQUEST['userName']);
	$password = mysqli_real_escape_string($con, $_REQUEST['password']);
	$sql1 = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
	$sql2 = "INSERT INTO account_details (name, email) VALUES ('$name', '$email')";
	if(mysqli_query($con, $sql1) and mysqli_query($con, $sql2)){
	    echo "Records added successfully.";
	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	}
	mysqli_close($con);
?>