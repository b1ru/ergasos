<?php
  if(isset($_COOKIE['username_change_success'])) {
    if($_COOKIE['username_change_success'] == 'true') {
      echo '<!-- ALERT -->
      <div class="alert alert-success fade" role="alert">
      <strong>Your username has changed successfully</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    else {
      echo '<!-- ALERT -->
      <div class="alert alert-danger fade" role="alert">
      <strong>Something went wrong while updating your username.Please try again.</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    setcookie("username_change_success","",time() - 3600,'/');
  }

  if(isset($_COOKIE['password_change_success'])) {
    if($_COOKIE['password_change_success'] == 'true') {
      echo '<!-- ALERT -->
      <div class="alert alert-success fade" role="alert">
      <strong>Your password has changed successfully</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    else {
      echo '<!-- ALERT -->
      <div class="alert alert-danger fade" role="alert">
      <strong>Something went wrong while updating your password.Please try again.</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    setcookie("password_change_success","",time() - 3600,'/');
  }

  if(isset($_COOKIE['username_taken'])) {
    if($_COOKIE['username_taken'] == 'true') {
      echo '<!-- ALERT -->
      <div class="alert alert-danger fade" role="alert">
      <strong>Username already taken.</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    setcookie('username_taken',"",time() - 3600,'/');
  }
?>
