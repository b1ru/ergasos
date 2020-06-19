<?php
  if(isset($_COOKIE['application_delete_success'])) {
    if($_COOKIE['application_delete_success'] == 'true') {
      echo '<!-- ALERT -->
      <div class="alert alert-success fade" role="alert">
      <strong>Your application has been deleted.</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    else {
      echo '<!-- ALERT -->
      <div class="alert alert-danger fade" role="alert">
      <strong>Something went wrong while deleting your application.Please try again.</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    setcookie("application_delete_success","",time() - 3600,'/');
  }
?>