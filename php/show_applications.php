<?php
  $con = mysqli_connect("localhost","root","","ergasos");
  $query =
  "SELECT listing_details.title,listing_details.creator
  FROM applications INNER JOIN listing_details ON applications.listingID = listing_details.listingID
  WHERE applications.userID = 1";
  $result = mysqli_query($con,$query);
  $num = mysqli_num_rows($result);
  for($i = 0; $i < $num; $i++){
    $row = mysqli_fetch_row($result);

    echo '<div class="card">
      <div class="card-header" id="app'.($i+1).'">
        Application '.($i+1).'
      </div>
      <div class="card-body">
        <h5 class="card-title">'.$row[0].'</h5>
        <p class="card-text">
          <ul>
            <li>Posted by: '.$row[1].'</li>
          </ul>
        </p>
        <span class="left"> <a href="./aggelia.html" class="btn btn-primary">View Details</a> </span>
        <span class="right"> <button type = "button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Remove application</button> </span>
      </div>
    </div>';

  }
 ?>
