<?php
	$con = mysqli_connect("localhost","root","","ergasos");
	if($con === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$error="";
	if(isset($_POST['submit'])){
		$username= $_POST['username'];
		$password = $_POST['password'];
		if(empty($_POST['username']) or empty($_POST['password'])){
			$error="Fill in Username and Password";
		}
		if($error!=""){

		}
		else{

			$query = "SELECT * FROM login WHERE username = '$username'";
			$result = mysqli_query ( $con, $query );
			$row = mysqli_fetch_assoc($result);
			if(mysqli_num_rows ( $result )>=1){
				$hashed_password=$row['password'];
			}
			else{
				$hashed_password=NULL;
			}
			if ( mysqli_num_rows ( $result )>=1 AND password_verify($password, $hashed_password)) {
				session_start();
				$_SESSION['id']=$row['userID'];
				mysqli_close($con);
			    header('Location: index.php');

					// change navbar
					$_SESSION['logged_in'] = true;
			}
			else{
				$error="Wrong combination of Username and Password";
			}
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<!-- My CSS file -->
		<link rel="stylesheet" type="text/css" href="css/sign-in.css">
		<title>Sign In - ErgaSOS</title>
	</head>
	<body>
		<!-- NAVIGATION BAR -->
		<?php require("php/navbar.php"); ?>

		<!-- LOGIN FORM -->
		<div class="container">
			<div class="row justify-content-center">
					<div id="login-box" class="col-md-6">
						<form id="login-form" class="form" action="sign-in.php" method="POST">
							<h3 class="text-center text-dark">Sign In</h3>
							<div class="form-group">
								<label for="username" class="text-dark">Username:</label><br>
								<input type="text" name="username" id="username" class="form-control">
							</div>
							<div class="form-group">
								<label for="password" class="text-dark">Password:</label><br>
								<input type="password" name="password" id="password" class="form-control">
							</div>
							<p style="color:red; margin-bottom: 0px; margin-top:-15px;"><?php echo $error;?></p>

							<div class="form-group">
								<input id="log-in-btn" type="submit" name="submit" class="btn btn-success btn-md " value="Log In">
							</div>
							<div id="register-link" class="text-right">
								<a href="./register.php" class="text-dark">Register now</a>
							</div>
						</form>
					</div>
			</div>
		</div>


			<!-- Footer -->
			<footer>
				<div style="float: left"><a class="footer-link" href="./contact.php">Contact Us</a> </div> <div style="position: absolute; right:30px"><a href="https://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tourhttps://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tour" style="padding-left: 5px"><i class="fa fa-facebook-f" style="font-size:20px"></i></a> </div>
			</footer>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
