window.setInterval(function ToggleButton () {
  if($('#inputcaptcha').val() == 'Delete Account') {
    $('#deletebtn').removeClass('disabled');
  } else {
    $('#deletebtn').addClass('disabled');
  }
},200);

$('#passwordform').submit(function () {
  $('.alert').find('strong').html('Your password has changed successfully');
  toggleAlert();
  $('#PasswordModal').modal('hide');
  return false;
});

$('#usernameform').submit(function () {
  $('.alert').find('strong').html('Your username has changed successfully');
  toggleAlert();
  $('#UsernameModal').modal('hide');
  return false;
});
