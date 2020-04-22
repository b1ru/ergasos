/*
  Alert banner events
*/
function toggleAlert () {
  $('.alert').addClass('show');
  setTimeout(function () {
    $('.alert').removeClass('show');
  }, 2000);
  return false;
}

$('.closeAlertBtn').on('click', function () {
  $('.alert').removeClass('show');
});

/*
  Modal events
*/
$('#myModal').on('hidden.bs.modal', function () {
  $('#confirmbtn').off('click');
});
