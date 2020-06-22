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
		?>

		<!-- Jumbotron -->
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
		  	<h1 class="display-4">Find the Best Jobs!</h1>
				<br>
				<p>
					<a class="job-link" href="search.php?name=&location=&type=2">Find a Job</a>
					<span> - Find your dream job in a matter of seconds</span>
				</p>
				<p>
					<a href="./create_listing.php" class="job-link">Post a Job</a>
					<span> - Evaluate potential employees and pick the best one for your job opening</span>
				</p>
				<p>
					<a href="./seminaria.php" class="job-link">Seminars</a>
					<span> - View available seminars near you</span>
				</p>
			</div>

			<!-- Footer -->
			<footer>
				<a class="footer-link" href="./contact.php">Contact Us</a><a href="https://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tourhttps://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tour" style="padding-left: 5px"><i class="fa fa-facebook-f" style="font-size:20px"></i></a>
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
