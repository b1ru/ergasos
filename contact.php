<?php
	if(isset($_POST['submit'])){
		$error=0;
		$name=$_POST['firstname'];
		$email=$_POST['email'];
		$subject=$_POST['subject'];
		$complaint=$_POST['complaint'];
		if(empty($_POST['firstname'])){
			$name='anonymous';
		}
		if(empty($_POST['complaint'])){
			$error=1;
			setcookie("no_complaint","true",time() + 10,"/");
		}
		else{
			$message="From ".$name.", ".$email.": ".$subject."\n ".$complaint;
			$con = mysqli_connect("localhost","root","","ergasos");
			if($con === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
			}
			$query="INSERT INTO contact_forms (messages) VALUES ('$message')";
			if(mysqli_query($con, $query)){
					mysqli_close($con);
					setcookie("successful_complaint","true",time() + 10,"/");
			}
			else{
				setcookie("successful_complaint","false",time() + 10,"/");
			}
			header('Location: contact.php');
		}
	}
	else{
		$error=0;
	}
?>



<!DOCTYPE html>
<html lang='en'>
<head>
	<title> Contact - ErgaSOS </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/seminaria.css">
	<link rel="stylesheet" type="text/css" href="css/main_style.css">
</head>

<body>
	<div class="maincontainer">
		<div class="content">

			<!-- NAVIGATION BAR -->
			<?php require("php/navbar.php"); ?>

		<?php
			include "php/contact_alerts.php";
		?>
	<div class="box2">

			<br>
		<p style="color:black; font: 28px normal Arial, Helvetica, sans-serif; text-align:center;"> Contact Information</p><br>
		<p style="border:3px; border-style:solid; border-radius: 15px; border-color:white; padding: 10px; margin-top:-30px; margin-left:-5px; font-size:18px; background: white;width:60%; text-align: center; margin:auto; ">
			E-mail: ergasos@gmail.com<br>
			Contact Number: 23920000000<br>
			Website developed by: <ul style="border:3px; border-style:solid; border-radius: 15px; border-color:white; padding: 10px; margin-top:-30px; margin-left:-5px; font-size:18px; background: white;width:60%; margin:0 auto; margin-top:-25px; list-style: inside; display: table; padding-left: 23.5%"><li>Andreas Skolidis</li><li>Axilleas Toumpas</li><li>Basilis Tsekouras</li><li>Nikos Tsioumanis</li></ul>
		</p>
		<p style="color:black; font: 28px normal Arial, Helvetica, sans-serif; text-align:center;"> Contact Us</p>

		<form action="" method="POST">
		<p style="border:3px; border-style:solid; border-radius: 15px; border-color:white; padding: 10px; margin-top:-30px; margin-left:-5px; font-size:18px; background: white;width:60%; text-align: left; margin:auto; ">
			<label for="fname">First Name</label>
    		<input type="texti" id="fname" name="firstname" placeholder="Your name.."><br>
    		<label for="email">Email</label>
    		<input type="texti" id="email" name="email" placeholder="Your email..">
    		<label for="subject">Subject</label>
    		<input type="texti" id="subject" name="subject" placeholder="Line of Inquiry">
    		<label for="Complaint">Complaint or Suggestion</label>
    		<textarea id="Complaint" name="complaint" placeholder="Write something.." style="height:200px"></textarea>
    		<?php if($error==1){?>
    		<label style="color:red"for="error"><?php echo 'You have to fill out a complaint';?></label><br>
    		<?php }?>
    		<input class="submit submitbutton" name="submit" type="submit" value="Submit">
    	</p>
    	</form>
	</div>
</div>

	<!-- Footer -->
	<footer>
		<div style="float: left"><a class="footer-link" href="./contact.php">Contact Us</a> </div> <div style="position: absolute; right:30px"><a href="https://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tourhttps://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tour" style="padding-left: 5px"><i class="fa fa-facebook-f" style="font-size:20px"></i></a> </div>
	</footer>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="./js/change_navbar.js"></script>
<script type="text/javascript" src="js/main_scripts.js"></script>
<script type="text/javascript" src="js/my_stuff.js"></script>

</body>
</html>
