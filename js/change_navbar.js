function change_nav() {
	// delete buttons 
	var buttons = document.getElementById("right-buttons")
	buttons.parentElement.removeChild(buttons);

	// create dropdown
	var new_div = document.createElement("DIV")
	new_div.setAttribute('class', 'dropdown')
	new_div.innerHTML = `
		<button class="btn btn-secondary  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">My Applications</a>
    <a class="dropdown-item" href="#">My Listings</a>
    <a class="dropdown-item" href="#">My Profile</a>
    <a class="dropdown-item" href="#">Settings</a>
  </div>
	`
	document.getElementById("navbarSupportedContent").appendChild(new_div)
}

document.getElementById("toggle-nav").addEventListener("click", change_nav);
