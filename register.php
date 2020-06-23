<?php
	$con = mysqli_connect("localhost","root","","ergasos");
	if($con === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	$errors = array('email'=>'', 'fname'=>'','lname'=>'','username'=>'','password'=>'','confirmpass'=>'');
	if(isset($_POST['submit'])){
		if(empty($fname = $_POST['firstName'])){
			$errors['fname']="Please insert a first name";
		}
		if(empty($lname = $_POST['lastName'])){
			$errors['lname']="Please insert a last name";
		}
		if(empty($email = $_POST['email'])){
			$errors['email']="Please insert an email";
		}
		else{
			$email = $_POST['email'];
			$query = "SELECT * FROM account_details WHERE email = '$email'";
		    $result = mysqli_query ( $con, $query );
			if ( mysqli_num_rows ( $result )>=1 ) {
				$errors['email']="Email already taken";
			}
		}
		if(empty($username = $_POST['userName'])){
			$errors['username']="Please insert a username";
		}
		else{
			$username = $_POST['userName'];
			$query = "SELECT * FROM login WHERE username = '$username'";
		    $result = mysqli_query ( $con, $query );
			if ( mysqli_num_rows ( $result )>=1 ) {
				$errors['username']="Username already taken";
			}
		}
		if(empty($password = $_POST['password'])){
			$errors['password']="Please insert a password";
		}
		if(empty($confirmpassword = $_POST['confirmpassword'])){
			$errors['confirmpass']="Please confirm password";
		}
		else{
			if($password!=$confirmpassword){
				$errors['confirmpass']="Passwords have to match";
			}
		}
		if(array_filter($errors))
		{

		}
		else
		{
			$fname = mysqli_real_escape_string($con, $_REQUEST['firstName']);
			$lname = mysqli_real_escape_string($con, $_REQUEST['lastName']);
			$name = $fname." ".$lname;
			$email = mysqli_real_escape_string($con, $_REQUEST['email']);
			$username = mysqli_real_escape_string($con, $_REQUEST['userName']);
			$password = mysqli_real_escape_string($con, $_REQUEST['password']);
			$password=password_hash($password, PASSWORD_DEFAULT);
			$sql1 = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
			$sql2 = "INSERT INTO account_details (name, email) VALUES ('$name', '$email')";
			if(mysqli_query($con, $sql1) and mysqli_query($con, $sql2)){
				$last_id = mysqli_insert_id($con);
				mysqli_close($con);
				if (session_status() == PHP_SESSION_NONE) {
    			session_start();
				}
				$_SESSION['logged_in'] = true;
				$_SESSION['id'] = $last_id;
				setcookie("successful_register","true",time() + 10,"/");
			    header('Location: my_profile.php');
			} else{
			    setcookie("successful_register","false",time() + 10,"/");
			    header('Location: my_profile.php');
			}
		}
	}
	else{
		$fname='';
		$lname='';
		$email='';
		$username='';
		$password='';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Register-ErgaSOS</title>
	<link rel="stylesheet" type="text/css" href="./css/rstyle.css">
</head>
<body>


	<!-- NAVIGATION BAR -->
	<?php require("php/navbar.php"); ?>

	<div class="box-1">
		<div>
			<h2 id="mainHeader">Register</h2>
		</div>
		<form action="register.php" method="POST">
		<div class="container">
			<div class="p">
				<label>First Name:</label>
				<input class="form" type="text" name="firstName" placeholder="Enter first name" value="<?php echo $fname ?>">
			</div>
			<p style="color:red; margin-bottom: 0px;"><?php echo $errors['fname'];?></p>

			<div class="p">
				<label>Last Name:</label>
				<input class="form" type="text" name="lastName" placeholder="Enter last name" value="<?php echo $lname ?>">
			</div>
			<p style="color:red; margin-bottom: 0px;"><?php echo $errors['lname'];?></p>

			<div class="p">
				<label>Email:</label>
				<input class="form" type="Email" name="email" placeholder="Enter email" value="<?php echo $email ?>">
			</div>
			<p style="color:red; margin-bottom: 0px;"><?php echo $errors['email'];?></p>

			<div class="p">
				<label>Username:</label>
				<input class="form" type="text" name="userName" placeholder="Enter username" value="<?php echo $username ?>">
			</div>
			<p style="color:red; margin-bottom: 0px;"><?php echo $errors['username'];?></p>

			<div class="p">
				<label>Password:</label>
				<input class="form" type="password" name="password" placeholder="Enter password" value="<?php echo $password ?>">
			</div>
			<p style="color:red; margin-bottom: 0px;"><?php echo $errors['password'];?></p>
			<div class="p">
				<label>Confirm Password:</label>
				<input class="form" type="password" name="confirmpassword" placeholder="Confirm password">
			</div>
			<p style="color:red; margin-bottom: 0px;"><?php echo $errors['confirmpass'];?></p>

		</div>
		<div>
			<input class="button" type="submit" name="submit" value="Register">
		</div>
		</form>
		<div id="signin">
		<a href="./sign-in.php">Sign In</a>
		</div>
	</div>

			<!-- Footer -->
			<footer>
				<div style="float: left"><a class="footer-link" href="./contact.php">Contact Us</a> </div> <div style="position: absolute; right:30px"><a href="https://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tourhttps://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tour" style="padding-left: 5px"><i class="fa fa-facebook-f" style="font-size:20px"></i></a> </div>
			</footer>

			<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
