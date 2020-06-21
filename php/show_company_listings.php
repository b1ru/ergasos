<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$name=filter_input(INPUT_GET, 'name');
$con = mysqli_connect("localhost","root","","ergasos");
$query =
"SELECT title,description,listingID
FROM listing_details
WHERE creator = '$name'
ORDER BY listingID DESC";
$result = mysqli_query($con,$query);
$num = mysqli_num_rows($result);
if(mysqli_num_rows($result)==0){
    echo '<h1 style="text-align:center"> <br><br> This company has no listings. </h1>';
  }
else{
for($i = 0; $i < mysqli_num_rows($result); $i++){
  $row = mysqli_fetch_row($result);

  echo '<div class="card">
    <div class="card-header" id="listing'.($i+1).'">
      Listing #'.($i+1).'
    </div>
    <div class="card-body">
      <h5 class="card-title">'.$row[0].'</h5>
      <p class="card-text">
         '.$row[1].'
      </p>
      <span class="left"> <a href="./aggelia.html?id='.$row[2].'" class="btn btn-primary">View Details</a> </span>
    </div>
  </div>';

  }
}
?>
