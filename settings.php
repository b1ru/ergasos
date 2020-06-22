<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Settings - ErgaSOS</title>

		<!-- My CSS files -->
		<link rel="stylesheet" type="text/css" href="css/main_style.css">
    <link rel="stylesheet" type="text/css" href="css/settings.css">
	</head>
	<body>

		<?php
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
			if($_SESSION['logged_in'] == false) {
				header("Location: ./sign-in.php");
			}
			else {
				$id = $_SESSION['id'];
			}
			$con = mysqli_connect("localhost","root","","ergasos");
			$results = mysqli_query($con, "SELECT username FROM login WHERE userID = '$id'");
			$row = mysqli_fetch_row($results);
			$username = $row[0];
		?>


		<!-- NAVIGATION BAR -->

		<?php
			require "php/navbar.php";
		?>

    <!-- MAIN PAGE -->
    <div>
			<?php
				include "php/settings_alerts.php";
			?>

			<!-- NAVIGATION -->
			<div class="navcontainer">
				<div class="nav flex-column nav-pills" id="tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">Account</a>
  				<a class="nav-link" id="preferences-tab" data-toggle="pill" href="#preferences" role="tab" aria-controls="preferences" aria-selected="false">Preferences</a>
				</div>
			</div>

			<!-- CONTENT -->
			<div class="tab-content" id="tabContent">
      	<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account">
					<h3>Username</h3>
					<hr>
					<div>
						<p class="label"><strong>Current username:</strong> <?php echo $username ?></p>
						<button type="button" class="btn btn-primary changebtn" data-toggle="modal" data-target="#UsernameModal">Change Username</button>
					</div>

					<h3>Password</h3>
					<hr>
					<div>
						<p class="label"><strong>Current password:</strong> ******** </p>
        		<button type="button" class="btn btn-primary changebtn" data-toggle="modal" data-target="#PasswordModal">Change Password</button>
					</div>

					<h3>Account</h3>
					<hr>
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal">Delete Account</button>
      	</div>

      	<div class="tab-pane fade" id="preferences" role="tabpanel" aria-labelledby="preferences">
      	</div>
    	</div>


			<!-- CHANGE USERNAME MODAL -->
			<div class="modal" id="UsernameModal" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header text-center d-block">
							<h5 class="modal-title d-inline-block">Change Username</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="php/change_username.php" method="post" enctype="multipart/form-data" id="usernameform">
								<div class="form-group">
									<label for="newusername">New Username</label>
									<input type="text" class="form-control" placeholder="Enter your new username" name="newusername" required>
								</div>
								<div class="form-group">
									<label for="currentpassword">Password</label>
									<input type="password" class="form-control" placeholder="Enter your password" name="currentpassword" required>
								</div>
								<button type="submit" class="btn btn-success btn-lg btn-block" id="confirmbtn">Update Username</button>
							</form>
						</div>
					</div>
				</div>
			</div>

    	<!-- CHANGE PASSWORD MODAL -->
    	<div class="modal" id="PasswordModal" tabindex="-1" role="dialog">
      	<div class="modal-dialog modal-dialog-centered" role="document">
        	<div class="modal-content">
          	<div class="modal-header text-center d-block">
            	<h5 class="modal-title d-inline-block">Change Password</h5>
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              	<span aria-hidden="true">&times;</span>
            	</button>
          	</div>
          	<div class="modal-body">
            	<form action="php/change_password.php" onsubmit="return validateForm()" method="post" enctype="multipart/form-data" id="passwordform" name="passwordform">
              	<div class="form-group">
                	<label for="oldpassword">Old Password</label>
	                <input type="password" class="form-control" placeholder="Enter your old password" name="oldpassword" required>
	              </div>
              	<div class="form-group">
                	<label for="newpassword">New Password</label>
                	<input type="password" class="form-control" placeholder="Enter your new password" name="newpassword" required>
              	</div>
              	<div class="form-group">
                	<label for="newpasswordrepeat">Repeat New Password</label>
                	<input type="password" class="form-control" placeholder="Enter your new password again" name="newpasswordrepeat" required>
              	</div>
              	<button type="submit" class="btn btn-success btn-lg btn-block" id="confirmbtn">Update Password</button>
            	</form>
          	</div>
        	</div>
      	</div>
    	</div>

    	<!-- DELETE ACCOUNT MODAL -->
    	<div class="modal" id="DeleteModal" tabindex="-1" role="dialog">
      	<div class="modal-dialog modal-dialog-centered" role="document">
        	<div class="modal-content">
          	<div class="modal-header text-center d-block">
            	<h5 class="modal-title d-inline-block" id="ultradangertext">Warning!</h5>
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              	<span aria-hidden="true">&times;</span>
            	</button>
          	</div>
          	<div class="modal-body">
							<form action="php/delete_account.php" method="post" enctype="multipart/form-data">
            		<h5 class="dangertext center">You are about to delete your account</h5>
            		<br>
            		<ul class="list">
									<li><h6>This action is <span class="dangertext">irreversible</span></h6></li>
            			<li><h6>If you wish to continue,please type the following phrase: </h6></li>
            		</ul>
            		<p id="captcha">Delete Account</p>
            		<input type="text" class="form-control" id="inputcaptcha" placeholder="Enter the text above">
          		</div>
          		<div class="modal-footer">
            		<button role="sumbit" class="btn btn-danger btn-lg btn-block" id="deletebtn" disabled="true">Confirm</a>
          		</div>
						</form>
        	</div>
      	</div>
    	</div>
		</div>

			<!-- Footer -->
			<footer>
				<a class="footer-link" href="./contact.php">Contact Us</a><a href="https://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tourhttps://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tour" style="padding-left: 5px"><i class="fa fa-facebook-f" style="font-size:20px"></i></a>
			</footer>
    <!-- JavaScript Scripts -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main_scripts.js"></script>
		<script type="text/javascript" src="js/settings.js"></script>
  </body>
</html>
