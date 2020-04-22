function getCard (button) {
  return button.parentNode.parentNode.parentNode;
}

function getCardNumber (card) {
  return card.getElementsByClassName('card-header')[0].id.slice(-1);
}

function deleteCardChildren (card) {
  while (card.firstChild) {
    card.removeChild(card.firstChild);
  }
}

function deleteCard (card) {
  card.parentNode.removeChild(card);

}

function getNextCard (card) {
  return card.nextElementSibling;
}

function notLastCard (card) {
  return getNextCard (card) != null;
}

function getCardHeader (card) {
  return card.getElementsByClassName('card-header')[0];
}

function cardIsApplication (header) {
  return header.id.substring(0,header.id.length-1) == 'app';
}

function replaceCardText (card,number) {
  var header = getCardHeader(card);
  if(cardIsApplication(header)) {
    header.id = 'app' + number;
    header.innerHTML = 'Application #' + number;
  } else {
    header.id = 'listing' + number;
    header.innerHTML = 'Listing #' + number;
  }
}

$('#myModal').on('shown.bs.modal', function (e) {
  $('#confirmbtn').on('click', function () {
    var card = getCard(e.relatedTarget);
    if (card == null) {
      return;
    }

    var number = getCardNumber(card);
    deleteCardChildren(card);

    var originalcard = card;
    while (notLastCard(card)) {
      card = getNextCard(card);
      replaceCardText(card,number);
      number++;
    }

    deleteCard(originalcard);
    toggleAlert();
  });
});

$('#myModal').on('hidden.bs.modal', function () {
  $('#confirmbtn').off('click');
});
