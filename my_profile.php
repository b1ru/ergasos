<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>My Profile - ErgaSOS</title>

		<!-- My CSS files -->
		<link rel="stylesheet" type="text/css" href="css/main_style.css">
		<link rel="stylesheet" type="text/css" href="css/my_profile.css">
	</head>

  <body>
		<?php
			session_start();
			if(!isset($_SESSION['id'])){
				header("Location: ./sign-in.php");
			}
			else {
				$id = $_SESSION['id'];
			}
			$con = mysqli_connect("localhost","root","","ergasos");
			$results = mysqli_query($con, "SELECT * FROM account_details WHERE userID = $id");
			$row = mysqli_fetch_row($results);
			$name = $row[1];
			$address = $row[2];
			$email = $row[3];
			$telephone = $row[4];
			$cv = $row[5];
			if($cv === NULL) {
				$href = '';
			}
			else {
				$href = 'href=' . $cv;
			}
		?>

		<!-- NAVIGATION BAR -->

		<?php
			require "php/navbar.php";
		?>

		<!-- MAIN PAGE -->
		<div>

			<?php
				include "php/profile_alerts.php";
			?>

    <div class="tab-content" id="tabContent">

			<!-- ACCOUNT DETAILS -->
			<form action="php/save_profile.php" method="post" enctype="multipart/form-data">
      <div>
        <h1> <b id="head"> My Profile </b> <img src="images/user.png" alt=""></h1>
        <p id="edit_par">
					<img src="images/pencil.png" id="pen_icon" >
					<button type="button" class="btn btn-primary" id="editbtn">Edit</button>
				 		<button type="submit button" class = "btn btn-success" id="savebtn">Save changes</button>
				</p>
      </div>
      <div>
        <h4> <b> <u> Personal Info: </u> </b> </h4>
        <p>
					<span class="title">Full Name:</span>
					<span class="desc"><?php echo $name; ?></span>
				</p>
        <p>
					<span class="title">Address:</span>
					<span class="desc"><?php echo $address; ?></span>
				</p>
      </div>
      <hr>
      <div>
        <h4> <b> <u> Contact Info: </u> </b> </h4>
        <p>
					<span class="title">Email:</span>
					<span class="desc"><?php echo $email; ?></span>
				</p>
        <p>
					<span class="title">Phone Number:</span>
					<span class="desc"><?php echo $telephone; ?></span>
				</p>
      </div>
		</form>
      <hr>
      <div>
        <p id="CV">
					<span class="left">
						<img src="images/CV.png">
						<a download="CV.pdf" <?php echo $href ?>>Download CV</a>
						<?php
						 if($cv!=NULL){?>
						<br><a href="php/delete_cv.php" style="color: rgb(97, 97, 97);">Remove</a>
						<?php }?>
					</span>
					<span class="right">
						<img src="images/upload.png">
						<button type="button" class="btn btn-primary" id="uploadbtn">Upload your CV</button>
						<form action="php/upload_cv.php" method="post" enctype="multipart/form-data">
							<input type="file" id="uploadfile" onchange="this.form.submit()" name="cvfile">
						</form>
					</span>
				</p>
    	</div>
    	<?php
		 if($cv!=NULL){?>
		<br>
		<?php }?>
    </div>
	</div>

			<!-- Footer -->
			<footer>
				<div style="float: left"><a class="footer-link" href="./contact.php">Contact Us</a> </div> <div style="position: absolute; right:30px"><a href="https://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tourhttps://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tour" style="padding-left: 5px"><i class="fa fa-facebook-f" style="font-size:20px"></i></a> </div>
			</footer>
		<!-- JavaScript Scripts -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/main_scripts.js"></script>
		<script type="text/javascript" src="js/my_profile.js"></script>
  </body>
</html>
