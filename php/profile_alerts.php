<?php
  if(isset($_COOKIE['info_change_success'])) {
    if($_COOKIE['info_change_success'] == 'true') {
      echo '<!-- ALERT -->
      <div class="alert alert-success fade" role="alert">
      <strong>Your personal information has been updated</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    else {
      echo '<!-- ALERT -->
      <div class="alert alert-danger fade" role="alert">
      <strong>Something went wrong while updating your personal information.Please try again.</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    setcookie("info_change_success","",time() - 3600,'/');
  }

  if(isset($_COOKIE['upload_cv_success'])) {
    if($_COOKIE['upload_cv_success'] == 'true') {
      echo '<!-- ALERT -->
      <div class="alert alert-success fade" role="alert">
      <strong>Your CV has been uploaded successfully</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    else if($_COOKIE['upload_cv_success'] == 'false'){
      echo '<!-- ALERT -->
      <div class="alert alert-danger fade" role="alert">
      <strong>Something went wrong while uploading your CV.Please try again.</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    else {
      echo '<!-- ALERT -->
      <div class="alert alert-danger fade" role="alert">
      <strong>Please upload your CV in pdf format.</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    setcookie("upload_cv_success","",time() - 3600,'/');
  }

  if(isset($_COOKIE['delete_cv_success'])) {
    if($_COOKIE['delete_cv_success'] == 'true') {
      echo '<!-- ALERT -->
      <div class="alert alert-success fade" role="alert">
      <strong>Your CV has been deleted successfully</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    else {
      echo '<!-- ALERT -->
      <div class="alert alert-danger fade" role="alert">
      <strong>Something went wrong while deleting your CV.Please try again.</strong>
      <button type="button" class="close closeAlertBtn" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    setcookie("delete_cv_success","",time() - 3600,'/');
  }
?>
