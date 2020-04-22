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

$('.modal').on('hidden.bs.modal', function () {
  $(this).find('input').val('');
});
