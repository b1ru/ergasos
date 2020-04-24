function change_nav() {
	// delete buttons 
	var buttons = document.getElementById("right-buttons")
	buttons.parentElement.removeChild(buttons);

	// create dropdown
	var new_div = document.createElement("DIV")
	new_div.setAttribute('class', 'dropdown')
	new_div.innerHTML = `
		<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
	`
	document.getElementById("navbarSupportedContent").appendChild(new_div)
}

document.getElementById("toggle-nav").addEventListener("click", change_nav);
