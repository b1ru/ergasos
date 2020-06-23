function getCard (button) {
  return button.parentNode.parentNode.parentNode;
}

function getCardID(card) {
  return card.getElementsByClassName('card-header')[0].id;
}

$('#myModal').on('shown.bs.modal', function (e) {
  $('#confirmbtn').on('click', function () {
    var card = getCard(e.relatedTarget);
    if (card == null) {
      return;
    }
    var id = getCardID(card);
    document.getElementById('listingID').value = id;
  });
});

$('#myModal').on('hidden.bs.modal', function () {
  $('#confirmbtn').off('click');
});

$("#applicantsModal").on('shown.bs.modal', function(e){
  var card = getCard(e.relatedTarget).parentNode;
  if (card == null) {
    return;
  }
  var id = getCardID(card);
  $("#applicants").load("php/generate_applicants.php",{listingid : id});
});
