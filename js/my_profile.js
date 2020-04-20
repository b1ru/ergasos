$('#uploadbtn').on('click', function () {
  document.getElementById('uploadfile').click()
})

$('#editbtn').on('click', function () {
  // Replace text with input boxes
  var elements = [].slice.call(document.getElementsByClassName('desc'))
  var i, newtag
  for (i = 0; i < 4; i++) {
    newtag = document.createElement('input')
    newtag.setAttribute('type', 'text')
    newtag.setAttribute('class', 'input_text')
    newtag.setAttribute('placeholder', elements[i].innerHTML)
    elements[i].innerHTML = ''
    elements[i].appendChild(newtag)
  }

  // hide edit link and icon
  document.getElementById('editbtn').style.display = 'none'
  document.getElementById('pen_icon').style.display = 'none'

  // show save changes button
  document.getElementById('savebtn').style.display = 'inline'
})

$('#savebtn').on('click', function () {
  // hide save changes button
  document.getElementById('savebtn').style.display = 'none'

  // hide edit link and icon
  document.getElementById('editbtn').style.display = 'inline'
  document.getElementById('pen_icon').style.display = 'inline'

  // remove input boxes
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

  // display alert
  toggleAlert()
})

function toggleAlert () {
  $('#alertbanner').addClass('show')
  setTimeout(function () {
    $('#alertbanner').removeClass('show')
  }, 3000)
  return false
}
