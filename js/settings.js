window.setInterval(function ToggleButton () {
  if($('#inputcaptcha').val() == 'Delete Account') {
    $('#deletebtn').removeClass('disabled');
  } else {
    $('#deletebtn').addClass('disabled');
  }
},200);

$('#myform').submit(function () {
  toggleAlert();
  $('#PasswordModal').modal('hide');
  return false;
});
