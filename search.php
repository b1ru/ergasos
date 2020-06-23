<?php
	$con= mysqli_connect("localhost","root","","ergasos");
	if($con === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	if (isset($_POST['search-button']))
	{
		$name=$_POST['name'];
		if(!isset($_POST['name'])){$name='';}
		$location=$_POST['location'];
		if(!isset($_POST['name'])){$location='';}
		$type=$_POST['jobType'];
		$link="search.php?name=".$name."&location=".$location."&type=".$type."";
		header('Location: '.$link);
	}
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Search-ErgaSOS</title>
	<link rel="stylesheet" type="text/css" href="./css/sstyle.css">
</head>
<body>



	<!-- NAVIGATION BAR -->
	<?php require("php/navbar.php"); ?>

	<?php
		$name=filter_input(INPUT_GET, 'name');
		$location=filter_input(INPUT_GET, 'location');
		$type=filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
	?>
	<div id="search">
		<form method="post">
			<label>Job Type</label>
					<select class="form" name="jobType">
						<option value="2" <?php if ($type==2) {echo "selected";} ?>>Both</option>
						<option value="1" <?php if ($type==1) {echo "selected";} ?>>Full Time</option>>
						<option value="0" <?php if ($type==0) {echo "selected";} ?>>Part Time</option>>
					</select>
					<input type="text" name="name" placeholder="Search.." value="<?php echo $name ?>">
					<input type="text" name="location" placeholder="Location.." value="<?php echo $location ?>">
					<input type="submit" name="search-button" value="Search">
		</form>
	</div>

	<?php
		if ($name=='' && $location=='') {
			if($type!=2){
				$sql = "SELECT * FROM listing_details WHERE full_time=$type";
			}
			else{
				$sql = "SELECT * FROM listing_details";
			}
		}
		elseif ($name!='' && $location!='') {
			$sql = "SELECT * FROM listing_details WHERE (title LIKE  '%$name%' OR tags LIKE '%$name%') AND city LIKE  '%$location%'";
		}
		elseif ($name!='' && $location=='') {
			$sql = "SELECT * FROM listing_details WHERE (title LIKE  '%$name%' OR tags LIKE '%$name%')";
		}
		elseif ($name=='' && $location!='') {
			$sql = "SELECT * FROM listing_details WHERE city LIKE '%$location%'";
		}
		if ($name!='' && $location!='' && $type!=2){
			$sql=$sql." AND full_time=$type ";
		}
		$sql=$sql." ORDER BY date_added DESC ";
		$r_query = mysqli_query($con,$sql);
		$q_results= mysqli_num_rows($r_query);

		if ($q_results > 0) {
			while ($row = mysqli_fetch_assoc($r_query)){
			?>

                <div class="container">
					<section id="main">
						<?php echo '<a id="aggelia" href="./aggelia.php?id='.$row['listingID'].'">';?> <?php echo $row['title']; ?> </a>
						<?php echo '<a id="etairia" href="./company_listings.php?name='.$row['creator'].'">';?> <?php echo $row['creator']; ?> </a>
						<p id="location">
							<?php echo $row['city']; ?>
							<?php echo $row['country']; ?>
						</p>
					</section>
					<?php echo '<form action="./aggelia.php?id='.$row['listingID'].'" method="post">'?>
						<div>
							<input class="button" type="submit" value="Read More">
						</div>
					</form>
				</div>

	<?php
			}
		}
			$ignore_fulltime=0;
			if($type==2){
				$url='https://jobs.github.com/positions.json?description=python&location='.$location;
			}
			elseif($type==1){
				$url='https://jobs.github.com/positions.json?description=python&full_time=true&location='.$location;
			}
			else{
				$url='https://jobs.github.com/positions.json?description=python&full_time=false&location='.$location;
				$ignore_fulltime=1;
			}
			$json = file_get_contents($url);
			$data = json_decode($json,true);
			$j=0;
			while($j<count($data)){
				if($name!=''){
					if(strpos($data[$j]['title'], $name)){if($ignore_fulltime==1 && $data[$j]['type']!="Full Time"){
			?>

					<div class="container">
						<section id="main">
							<?php echo '<a id="aggelia" href="'.$data[$j]['url'].'">';?> <?php echo $data[$j]['title']; ?> </a>
							<?php echo '<a id="etairia" href="'.$data[$j]['company_url'].'">';?> <?php echo $data[$j]['company']; ?> </a>
							<p id="location">
								<?php echo $data[$j]['location']; ?>
							</p>
						</section>
						<span style="float:right;"><i><br><br><br>Via Github Jobs</i></span>
					</div>
			
			<?php
					}}
				}
				else{if($ignore_fulltime==1 && $data[$j]['type']!="Full Time"){ ?>
					<div class="container">
						<section id="main">
							<?php echo '<a id="aggelia" href="'.$data[$j]['url'].'">';?> <?php echo $data[$j]['title']; ?> </a>
							<?php echo '<a id="etairia" href="'.$data[$j]['company_url'].'">';?> <?php echo $data[$j]['company']; ?> </a>
							<p id="location">
								<?php echo $data[$j]['location']; ?>
							</p>
						</section>
						<span style="float:right;"><i><br><br><br>Via Github Jobs</i></span>
					</div><?php
				}}			
				$j=$j+1;
			}

	?>
	<br><br>
			<!-- Footer -->
			<footer>
				<div style="float: left"><a class="footer-link" href="./contact.php">Contact Us</a> </div> <div style="position: absolute; right:30px"><a href="https://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tourhttps://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tour" style="padding-left: 5px"><i class="fa fa-facebook-f" style="font-size:20px"></i></a> </div>
			</footer>


			<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
