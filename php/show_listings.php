<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(!isset($_SESSION['id'])){
  header("Location: ./sign-in.php");
}
else {
  $id = $_SESSION['id'];
}
$con = mysqli_connect("localhost","root","","ergasos");
$query =
"SELECT listing_details.title,COUNT(applications.id),listing_details.listingID
FROM listings INNER JOIN listing_details ON listings.listingID = listing_details.listingID
LEFT JOIN applications ON listing_details.listingID = applications.listingID
WHERE listings.userID = '$id'
GROUP BY listing_details.title
ORDER BY listing_details.listingID";
$result = mysqli_query($con,$query);
$num = mysqli_num_rows($result);
if($num==0){
    echo '<h3 style="text-align:center"> <br><br> <a href="create_listing.php">You have not listed any jobs yet. Get started by creating one! </a></h3>';
  }
else{
for($i = 0; $i < $num; $i++){
  $row = mysqli_fetch_row($result);

  echo '<div class="card">
    <div class="card-header" id="'.$row[2].'">
      Listing #'.($i+1).'
    </div>
    <div class="card-body">
      <h5 class="card-title">'.$row[0].'</h5>
      <p class="card-text">
         <ul>
            <li>Number of applicants: <a type="button" href="#" id="applicantstoggle" data-toggle="modal" data-target="#applicantsModal">'.$row[1].'</a></li>
        </ul>
      </p>
      <span class="left"> <a href="./aggelia.php?id='.$row[2].'" class="btn btn-primary">View Details</a> </span>
      <span class="right"> <button type = "button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Close listing</button> </span>
    </div>
  </div>';

  }
}
?>
