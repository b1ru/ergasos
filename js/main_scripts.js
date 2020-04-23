/*
  Alert banner events
*/
function toggleAlert () {
  console.log('1');
  $('.alert').addClass('show');
  setTimeout(function () {
    console.log('2');
    $('.alert').removeClass('show');
  }, 2000);
  return false;
}

$('.closeAlertBtn').on('click', function () {
  console.log('3');
  $('.alert').removeClass('show');
});

/*
  Modal events
*/
$('.modal').on('hidden.bs.modal', function () {
  $(this).find('input').val('');
});
