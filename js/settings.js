window.setInterval(function ToggleButton () {
  if($('#inputcaptcha').val() == 'Delete Account') {
    $('#deletebtn').prop('disabled',false);
  } else {
    $('#deletebtn').prop('disabled',true);
  }
},200);

function validateForm() {
  var newpassword = document.forms["passwordform"]["newpassword"].value;
  var repeat = document.forms["passwordform"]["newpasswordrepeat"].value;
  if(newpassword === repeat) {
    return true;
  }
  else {
    alert("Please input your new password correctly");
    return false;
  }
}
