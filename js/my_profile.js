function saveButtonIsShown () {
  return document.getElementById('savebtn').style.display == 'inline'
}


function toggleButtons () {
  if(saveButtonIsShown()) {
    document.getElementById('savebtn').style.display = 'none'
    document.getElementById('editbtn').style.display = 'inline'
    document.getElementById('pen_icon').style.display = 'inline'
  } else {
    document.getElementById('savebtn').style.display = 'inline'
    document.getElementById('editbtn').style.display = 'none'
    document.getElementById('pen_icon').style.display = 'none'
  }
}

function createInput (value) {
  var newtag = document.createElement('input')
  newtag.setAttribute('type', 'text')
  newtag.setAttribute('class', 'input_text')
  newtag.setAttribute('placeholder', value)
  newtag.setAttribute('value', value)
  return newtag
}

function createInputBoxes () {
  var elements = [].slice.call(document.getElementsByClassName('desc'))
  for (var i = 0; i < 4; i++) {
    var newtag = createInput(elements[i].innerHTML)
    elements[i].innerHTML = ''
    elements[i].appendChild(newtag)
  }
}

function removeInputBoxes () {
  var elements = [].slice.call(document.getElementsByClassName('desc'))
  var changes = [].slice.call(document.getElementsByClassName('input_text'))
  var text
  for (var i = 0; i < 4; i++) {
    if (changes[i].value) {
      text = changes[i].value
    } else {
      text = changes[i].placeholder
    }
    elements[i].appendChild(document.createTextNode(text))
    changes[i].parentNode.removeChild(changes[i])
  }
}

/*
  Button events
*/
$('#editbtn').on('click', function () {
  createInputBoxes()
  toggleButtons()
})

$('#savebtn').on('click', function () {
  toggleButtons()
  removeInputBoxes()
  toggleAlert()
})

$('#uploadbtn').on('click', function () {
  document.getElementById('uploadfile').click()
})
