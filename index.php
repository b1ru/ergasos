<?php
	if (isset($_POST['delete_user']))
	{
		header('location: php/delete_user.php?username='.$_POST['usenramedelete']);
	}
?>

<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Ergasos</title>

		<!-- My CSS file -->
		<link rel="stylesheet" type="text/css" href="css/main_style.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>

		<!-- NAVIGATION BAR -->
		<?php require("php/navbar.php");
		include("php/index_alert.php");
		?>

		<!-- Jumbotron -->
		<div class="jumbotron jumbotron-fluid">
			<div class="container-fluid">
		  	<h1 class="display-4" style="text-align: center;">Find the Best Jobs!</h1>
				<br>
				<br>
				<div class = "row">
					<div class = "col">
						<img style="margin: 0 auto; display: block;" src="images/magnifier.png">
					</div>
					<div class = "col">
						<img  style="margin: 0 auto; display: block;"src="images/fillform.png">
					</div>
					<div class = "col">
						<img style="margin: 0 auto; display: block;" src="images/education.png">
					</div>
				</div>
				<div class = "row justify-content-md-center">
					<div class = "col text-center">
						<a class="job-link" href="search.php?name=&location=&type=2">Find a Job - Find your dream job in a matter of seconds</a>
					</div>
					<div class = "col text-center">
						<a href="./create_listing.php" class="job-link">Post a Job - Evaluate potential employees and pick the best one for your job opening</a>
					</div>
					<div class = "col text-center">
						<a href="./seminaria.php" class="job-link">Seminars - View available seminars near you</a>
					</div>
				</div>
			</div>
				<?php if (isset($_SESSION['id'])){if($_SESSION['id']==1){?>
				<form action="" method="POST">
					<a style="color: red">
					<label> Delete user (Admin only Option):</label></a>
					<input type="text" name="usenramedelete" placeholder="username">
					<input class="button" type="submit" name="delete_user" value="Delete">
				</form>
				<?php }}?>
			</div>
			<!-- Footer -->
			<footer>
				<div style="float: left"><a class="footer-link" href="./contact.php">Contact Us</a> </div> <div style="position: absolute; right:30px"><a href="https://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tourhttps://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tour" style="padding-left: 5px"><i class="fa fa-facebook-f" style="font-size:20px"></i></a> </div>
			</footer>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script src="./js/change_navbar.js"></script>
		<script type="text/javascript" src="js/main_scripts.js"></script>
		<script type="text/javascript" src="js/my_stuff.js"></script>
	</body>
</html>
