<?php
  if(isset($_COOKIE['user_delete_success'])) {
    if($_COOKIE['user_delete_success'] == 'true') {
      echo '<!-- ALERT -->
      <div class="alert alert-success fade" role="alert">
      <strong>You have been successfuly removed the user!</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    else {
      echo '<!-- ALERT -->
      <div class="alert alert-danger fade" role="alert">
      <strong>Something went wrong while removing a user.Please try again.</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    setcookie("user_delete_success","",time() - 3600,'/');
  }
?>
