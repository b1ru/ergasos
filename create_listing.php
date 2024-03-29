<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Post a job listing</title>

		<!-- My CSS files -->
		<link rel="stylesheet" type="text/css" href="css/main_style.css">
		<link rel="stylesheet" type="text/css" href="css/create_listing.css">
	</head>

	<body>
		<?php
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
			if($_SESSION['logged_in'] == false) {
				header("Location: ./sign-in.php");
			}
		?>
		<script type="text/javascript">
    	function copyTags() {
				var tagstring = "";
				var tags = document.getElementsByClassName('tag');
				for (var i = 0; i < tags.length; i++) {
					tagstring += tags[i].innerHTML + " ";
				}

				document.getElementById('tags').value = tagstring;
    }
		</script>

		<div class="maincontainer">

			<div class="content">
		<!-- NAVIGATION BAR -->

		<?php
			require "php/navbar.php";
		?>

		<div class="jumbotron" id="jumbo">
			<div>
				<h1>Looking for new employees?</h1>
				<br>
				<h2>Please fill out the form below</h2>
			</div>
			<hr>

			<form action="php/submit_listing.php" onsubmit="copyTags()" method="post" enctype="multipart/form-data">
				<h3 id="CInfo"> Company Info </h3>
				<div class="form-row">
					<div class="col text-center">
						<h4>Your company's main attributes</h4>
					</div>
					<div class="col text-center">
						<h4>Your company is situated in</h4>
					</div>
					<div class="col text-center">
						<h4>Applicants can reach you at</h4>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col">
						<label for="name" >Company Name</label>
						<input type="text" class="form-control" placeholder="Name" name="name" required>
					</div>
					<div class="form-group col">
						<label for="city" >City</label>
						<input type="text" class="form-control" placeholder="City" name="city" required>
					</div>
					<div class="form-group col">
						<label for="email">Email</label>
						<input type="email" class="form-control" placeholder="email@address.com" name="email" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col">
						<label for="address">Company Address</label>
						<input type="text" class="form-control" placeholder="Address" name="address" required>
					</div>
					<div class="form-group col">
						<label for="country">Country</label>
						<input type="text" class="form-control" placeholder="Country" name="country" required>
					</div>
					<div class="form-group col">
						<label for="telephone">Telephone Number</label>
						<input type="number" class="form-control" placeholder="Number" name="telephone" required>
					</div>
				</div>

				<h3 id="CInfo">Listing Info</h3>
				<div class="form-group"
					<label for="title">Job Title</label>
					<input type="text" class="form-control" placeholder="eg. Software Engineer" name="title" required>
				</div>
				<div class="form-group"
					<label for="description">Job Description</label>
					<textarea class="form-control" rows="4" placeholder="Please describe what the job offer entails" name="description"></textarea>
				</div>
				<br>
				<div class="form-inline">
					<label for="hours" id="hours">Applicants are required to work</label>
					<select name="hours">
						<option selected>Full Time</option>
						<option value="2">Part Time</option>
					</select>
				</div>
				<div class="form-group">
					<label for="JobTags">Please use some tags to help applicants find your listing</label>
					<input type="text" class="form-control" id="taginput" placeholder="Tag">
					<button type="button" class="btn btn-dark" id="addtagbtn">Add</button>
					<!-- span for tags -->
					<span id="tagspan"></span>
					<input type="hidden" name="tags" id="tags">
				</div>
				<button type="submit" class="btn btn-primary my-1">Submit Listing</button>
			</form>
		</div>
	</div>
			<!-- Footer -->
			<footer>
				<div style="float: left"><a class="footer-link" href="./contact.php">Contact Us</a> </div> <div style="position: absolute; right:30px"><a href="https://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tourhttps://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tour" style="padding-left: 5px"><i class="fa fa-facebook-f" style="font-size:20px"></i></a> </div>
			</footer>

</div>
		<!-- JavaScript Scripts -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/main_scripts.js"></script>
		<script type="text/javascript" src="js/create_listing.js"></script>
	</body>
</html>
