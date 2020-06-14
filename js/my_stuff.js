function getCard (button) {
  return button.parentNode.parentNode.parentNode;
}

function getCardTitle(card) {
  return card.getElementsByClassName('card-title')[0].innerHTML;
}

$('#myModal').on('shown.bs.modal', function (e) {
  $('#confirmbtn').on('click', function () {
    var card = getCard(e.relatedTarget);
    if (card == null) {
      return;
    }
    var title = getCardTitle(card);
    console.log(title);
    document.getElementById('listingname').value = title;

  });
});

$('#myModal').on('hidden.bs.modal', function () {
  $('#confirmbtn').off('click');
});
