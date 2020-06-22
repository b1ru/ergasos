<?php
  if(isset($_COOKIE['successful_complaint'])) {
    if($_COOKIE['successful_complaint'] == 'true') {
      echo '<!-- ALERT -->
      <div class="alert alert-success fade" role="alert">
      <strong>Your complaint has been filed and will be adressed.</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    else {
      echo '<!-- ALERT -->
      <div class="alert alert-danger fade" role="alert">
      <strong>Something went wrong while filing your complaint.Please try again.</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    setcookie("successful_complaint","",time() - 3600,'/');
  }
  if(isset($_COOKIE['no_complaint'])) {
    if($_COOKIE['no_complaint'] == 'true') {
      echo '<!-- ALERT -->
      <div class="alert alert-danger fade" role="alert">
      <strong>Please fill out a complaint before submiting.</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    setcookie('no_complaint',"",time() - 3600,'/');
  }
?>