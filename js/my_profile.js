function saveButtonIsShown () {
  return document.getElementById('savebtn').style.display == 'inline';
}


function toggleButtons () {
  if(saveButtonIsShown()) {
    document.getElementById('savebtn').style.display = 'none';
    document.getElementById('editbtn').style.display = 'inline';
    document.getElementById('pen_icon').style.display = 'inline';
  } else {
    document.getElementById('savebtn').style.display = 'inline';
    document.getElementById('editbtn').style.display = 'none';
    document.getElementById('pen_icon').style.display = 'none';
  }
}

function createInput (value) {
  var newtag = document.createElement('input');
  newtag.setAttribute('type', 'text');
  newtag.setAttribute('class', 'input_text');
  newtag.setAttribute('placeholder', value);
  newtag.setAttribute('value', value);
  return newtag;
}

function createInputBoxes () {
  var elements = [].slice.call(document.getElementsByClassName('desc'));
  var newtag = new Array(4);
  for (var i = 0; i < 4; i++) {
    newtag[i] = createInput(elements[i].innerHTML);
  }
  newtag[0].setAttribute('name','name');
  newtag[1].setAttribute('name','address');
  newtag[2].setAttribute('name','email');
  newtag[3].setAttribute('name','telephone');
  for (var i = 0; i < 4; i++) {
    elements[i].innerHTML = '';
    elements[i].appendChild(newtag[i]);
  }
}

/*
  Button events
*/
$('#editbtn').on('click', function () {
  createInputBoxes();
  toggleButtons();
});

$('#uploadbtn').on('click', function () {
  document.getElementById('uploadfile').click();
});
