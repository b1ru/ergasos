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
  "SELECT listing_details.title,listing_details.creator,listing_details.listingID
  FROM applications INNER JOIN listing_details ON applications.listingID = listing_details.listingID
  WHERE applications.userID = '$id'";
  $result = mysqli_query($con,$query);
  $num = mysqli_num_rows($result);
  if($num==0){
    echo '<h3 style="text-align:center"> <br><br> <a href="search.php?name=&location=&type=2">You have not applied for any jobs yet. Get started by searching for some! </a></h3>';
  }
  else{
  for($i = 0; $i < $num; $i++){
    $row = mysqli_fetch_row($result);

    echo '<div class="card">
      <div class="card-header" id="'.$row[2].'">
        Application #'.($i+1).'
      </div>
      <div class="card-body">
        <h5 class="card-title">'.$row[0].'</h5>
        <p class="card-text">
          <ul>
            <li>Posted by: <a href="company_listings.php?name='.$row[1].'">'.$row[1].'</li>
          </ul>
        </p>
        <span class="left"> <a href="./aggelia.php?id='.$row[2].'" class="btn btn-primary">View Details</a> </span>
        <span class="right"> <button type = "button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Remove application</button> </span>
      </div>
    </div>';

  }
}
 ?>
