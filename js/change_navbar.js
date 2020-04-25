function toggle_layout() {
	
	if ( layout === 1 )
	{
		layout = 2;
		// delete the sign-in and register buttons 
		buttons.parentElement.removeChild(buttons);

		// create dropdown
		new_div = document.createElement("DIV")
		new_div.setAttribute('class', 'dropdown')
		new_div.innerHTML = `
			<button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="./images/user.svg" alt="user icon"></button>
  	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
  	  <a class="dropdown-item" href="./my_profile.html">Profile</a>
  	  <a class="dropdown-item" href="./my_applications.html">My Applications</a>
  	  <a class="dropdown-item" href="./my_listings.html">My Listings</a>
  	  <a class="dropdown-item" href="./settings.html">Settings</a>
			<div class="dropdown-divider"></div>
  	  <a id="logout-link" class="dropdown-item" href="#">Logout</a>
  	</div>
		`
		// add the dropdown
		document.getElementById("navbarSupportedContent").appendChild(new_div)

		// when the user clicks 'logout' switch layout
		document.getElementById("logout-link").addEventListener("click", toggle_layout);
	} else if (layout === 2) {
		layout = 1;
		// delete the dropdown
		new_div.parentElement.removeChild(new_div);

		// add the sign-in and register buttons
		document.getElementById("navbarSupportedContent").appendChild(buttons);	
	}
}

// the sign-in and register buttons
var buttons = document.getElementById("right-buttons")

// the dropdown
var new_div;

// which layout is currently shown
var layout = 1;

// when the user clicks "toggle navbar layout', switch layout
document.getElementById("toggle-nav").addEventListener("click", toggle_layout);
