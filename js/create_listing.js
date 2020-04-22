function createTagButton (tag) {
  var newbtn = document.createElement('button')
  newbtn.setAttribute('type', 'button')
  newbtn.setAttribute('class', 'btn btn-info btn-sm tag')
  newbtn.setAttribute('id', tag)
  newbtn.innerHTML = tag
  return newbtn
}

function tagInputHasText () {
  return document.getElementById('taginput').value
}

function eraseTagInput () {
  document.getElementById('taginput').value = null
}

$('#addtagbtn').on('click', function () {
  var addbtn = document.getElementById('addtagbtn');
  if (tagInputHasText()) {
    var tag = document.getElementById('taginput').value
    document.getElementById('tagspan').appendChild(createTagButton(tag))
    eraseTagInput()
  }
})

/*
  Tag button events
*/
$('#tagspan').on('mouseover', '.tag', function () {
  $(this).css('text-decoration', 'line-through')
})

$('#tagspan').on('mouseout', '.tag', function () {
  $(this).css('text-decoration', 'none')
})

$('#tagspan').on('click', '.tag', function () {
  this.parentNode.removeChild(this)
})
