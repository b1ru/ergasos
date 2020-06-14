<?php
  if(isset($_COOKIE['listing_delete_success'])) {
    if($_COOKIE['listing_delete_success'] == 'true') {
      echo '<!-- ALERT -->
      <div class="alert alert-success fade" role="alert">
      <strong>Your listing has been deleted.</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    else {
      echo '<!-- ALERT -->
      <div class="alert alert-danger fade" role="alert">
      <strong>Something went wrong while deleting your listing.Please try again.</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    setcookie("listing_delete_success","",time() - 3600,'/');
  }
?>
