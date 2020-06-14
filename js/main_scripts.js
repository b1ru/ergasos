/*
  Alert banner events
*/
$(document).ready( function toggleAlert () {
  $('.alert').addClass('show');
  setTimeout(function () {
    $('.alert').removeClass('show');
  }, 2000);
  return false;
});

$('.closeAlertBtn').on('click', function () {
  $('.alert').removeClass('show');
});

/*
  Modal events
*/
$('.modal').on('hidden.bs.modal', function () {
  $(this).find('input').val('');
});
