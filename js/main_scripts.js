/*
  Alert banner events
*/
function toggleAlert () {
  $('#alertbanner').addClass('show');
  setTimeout(function () {
    $('#alertbanner').removeClass('show');
  }, 2000);
  return false;
}

$('#closeAlertBtn').on('click', function () {
  $('#alertbanner').removeClass('show');
});

/*
  Modal events
*/
$('#myModal').on('hidden.bs.modal', function () {
  $('#confirmbtn').off('click');
});
