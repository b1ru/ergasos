document.getElementById('addtagbtn').addEventListener('click', function () {
  var addbtn = document.getElementById('addtagbtn');
  if (addbtn.previousElementSibling.value) {
    var tag = addbtn.previousElementSibling.value

    var newbtn = document.createElement('button')
    newbtn.setAttribute('type', 'button')
    newbtn.setAttribute('class', 'btn btn-info btn-sm tag')
    newbtn.innerHTML = tag
    addbtn.nextElementSibling.appendChild(newbtn)
    addbtn.previousElementSibling.value = null
  }
})
