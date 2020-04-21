document.getElementById('addtagbtn').addEventListener('click', function () {
  var addbtn = document.getElementById('addtagbtn');
  if (addbtn.previousElementSibling.value) {
    var tag = addbtn.previousElementSibling.value

    var newbtn = document.createElement('button')
    newbtn.setAttribute('type', 'button')
    newbtn.setAttribute('class', 'btn btn-info btn-sm tag')
    newbtn.setAttribute('id', tag)
    newbtn.innerHTML = tag
    addbtn.nextElementSibling.appendChild(newbtn)
    addbtn.previousElementSibling.value = null
  }
})

$('#tagspan').on('mouseover', '.tag', function () {
  $(this).css('text-decoration', 'line-through')
})

$('#tagspan').on('mouseout', '.tag', function () {
  $(this).css('text-decoration', 'none')
})

$('#tagspan').on('click', '.tag', function () {
  this.parentNode.removeChild(this)
})
