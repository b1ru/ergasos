<?php
  $id = $_POST['listingid'];
  $con = mysqli_connect("localhost","root","","ergasos");
  $query = "SELECT account_details.name,account_details.email,account_details.telephone,account_details.cv
  FROM applications INNER JOIN account_details ON applications.userID = account_details.userID
  WHERE applications.listingID = '$id'";
  $result = mysqli_query($con,$query);
  $num = mysqli_num_rows($result);
  if($num > 0) {
    echo '<table>';
    echo '<tr>';
    echo '<th>Name</th>';
    echo '<th>Email</th>';
    echo '<th>Telephone</th>';
    echo '<th>CV</th>';
    echo '</tr>';

    for($i = 0; $i < $num; $i++){
      $row = mysqli_fetch_row($result);
      if($row[2] == NULL){
        $row[2] = 'None';
      }
      if($row[3] == NULL){
        $row[3] = 'None';
      }
      else{
        $row[3] = '<a download="CV.pdf" href="'.$row[3].'">Download</a>';
      }
      echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td></tr>';
    }
    echo '</table>';
  }

?>
