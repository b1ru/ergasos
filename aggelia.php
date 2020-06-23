<!DOCTYPE html>
<html>
	<head>
		<title> Listing - ErgaSOS </title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/aggelia.css">
	</head>
	<body>

		<div class="maincontainer">
			<div class="content">

		<!-- NAVIGATION BAR -->
		<?php require("php/navbar.php"); ?>

		<?php
		$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
		if (is_null($id)) {?>
			<br>
			<p class="Titlos"> Oops, looks like this page doesn't exist!</p>
			<span class="category">You can maybe create it if you post a listing. No promises that you'll get this url though!</span><br>
		<?php
		}
		else if (false === $id) {

		}
		else{
		$con = mysqli_connect("localhost","root","","ergasos");
		$query="SELECT * FROM listing_details WHERE listingID=$id";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_assoc($result);

		if(mysqli_num_rows ( $result )>=1){
		?>

		<div class="box2"><br>
			<p class="Titlos"> Application Information</p><br><br>
			<p style="border:3px; border-style:solid; border-radius: 15px; border-color:white; padding: 10px; margin-top:-30px; margin-left:-5px; font-size:18px; background: white; width: 90vw;">
				<span style="font-size: 30px;"><?php echo $row["title"];?></span><br>
				<span class="category"><?php echo $row["date_added"];?></span><br>
				<span class="category">Country:</span> <?php echo $row["country"];?><br>
				<span class="category">City:</span> <?php echo $row["city"];?><br>
				<span class="category">Address:</span> <?php echo $row["address"];?><br>
				<span class="category">Phone Number:</span> <?php echo $row["telephone"];?><br>
				<span class="category">Email:</span> <?php echo $row["email"];?><br>
				<span class="category">Work Time:</span> <?php if($row["full_time"]==1) echo "Full Time"; else echo "Part Time";?><br>
				<span style="font-size: 20px;">
				<span class="category">Description:</span> <?php echo $row["description"];?>
				</span><br>
				<span style="font-size: 16px;">
				<span class="category">Tagged as:</span><?php if($row["tags"]!=NULL){?><span style="color: blue;"> <?php echo $row["tags"];?></span><?php }else{ echo ' <u>No Tags</u>';}?>
				<?php if (isset($_SESSION['id'])){if($_SESSION['id']==1){ echo'<br><a style="color: red; font-size:20px;" href="php/delete_listing_admin.php?id='.$id.'"> Delete this listing!(Admin only option)</a>';}}?>
				</span>
			</p>
			<?php
			$con = mysqli_connect("localhost","root","","ergasos");
			if(isset($_SESSION['id'])){
			$userID=$_SESSION['id'];
			}
			else
			{
				$userID=0;
			}
			$query1="SELECT * FROM applications WHERE listingID='$id' AND userID='$userID'";
			$result1=mysqli_query($con,$query1);
			$query2="SELECT * FROM listings WHERE listingID='$id' AND userID='$userID'";
			$result2=mysqli_query($con,$query2);
			if(mysqli_num_rows ( $result1)>=1){?>
			<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter" disabled>
  				You've already applied for this job!
			</button>
			<?php } elseif(mysqli_num_rows ( $result2)>=1){?>
				<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter" disabled>
  				This is a listing you've created!
			</button>
			<?php } elseif($userID!=0){?>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  				Apply Now!
			</button>
			<?php }else{?>
			<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter" disabled>
  				Sign in to apply for this job!
			</button>
			<?php }?>
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Confirm Application</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <span style="font-size:18px;">Do you want to apply for this position?</span>
		      </div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		        	<form action="php/listing_apply.php" method="post">
		        		<?php $_SESSION['applyID']=$id;?>
		        		<input class="btn btn-primary" type="submit" value="Submit">
					</form>
			      </div>
			    </div>
			  </div>
			</div>
	</div>
	<div class="bgcol"></style>
	</div>
	<?php }else{?>
		<br>
		<p class="Titlos"> Oops, looks like this page doesn't exist!</p>
		<span class="category">You can maybe create it if you post a listing. No promises that you'll get this url though!</span><br>
	<?php }}?>
	<!-- Footer -->
	<footer>
		<div style="float: left"><a class="footer-link" href="./contact.php">Contact Us</a> </div> <div style="position: absolute; right:30px"><a href="https://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tourhttps://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tour" style="padding-left: 5px"><i class="fa fa-facebook-f" style="font-size:20px"></i></a> </div>
	</footer>
</div>
</body>

</script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
