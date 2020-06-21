<?php
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}

	if (! isset($_SESSION['logged_in'])) {
		$_SESSION['logged_in'] = false;
	}


	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['changeNavbar']))
  {
    $_SESSION['logged_in'] = false;
  }
  if(isset($_POST['submitsearchio']))
  {
  	$name=$_POST['searchio'];
  	header('Location: search.html?name='.$name."&location=&type=2");
  }

	if ($_SESSION['logged_in'] == false) {

		echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a href="./index.html">
				<img src="images/bottlemsg.png">
			</a>
  		<a class="navbar-brand" href="./index.html">ErgaSOS</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  		  <span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
  		  <ul class="navbar-nav mr-auto">
  		    <li class="nav-item active">
						<form class="form-inline my-2 my-lg-0" action="" method="POST">
		    		  <input class="form-control mr-sm-2" type="text" name="searchio" placeholder="Search" aria-label="Search">
		    		  	<button id="search-button" name="submitsearchio" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		    		</form>
  		    </li>
  		  </ul>
				<div id="right-buttons">
					<a id="sign-in-link" href="./sign-in.html">
						<button id="sign-in-btn" type="button" class="btn btn-success">Sign In</button>
					</a>
					<a href="./register.html">
						<button type="button" id="register-btn"  class="btn btn-success">Join Now</button>
					</a>
				</div>
  		</div>
		</nav>';

	}
	else
	{
		echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a href="./index.html">
				<img src="images/bottlemsg.png">
			</a>
  		<a class="navbar-brand" href="./index.html">ErgaSOS</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  		  <span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
  		  <ul class="navbar-nav mr-auto">
  		    <li class="nav-item active">
						<form class="form-inline my-2 my-lg-0" action="" method="POST">
		    		  <input class="form-control mr-sm-2" type="text" name="searchio" placeholder="Search" aria-label="Search">
		    		  	<button id="search-button" name="submitsearchio" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		    		</form>
  		    </li>
  		  </ul>
			<div>
				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="./images/user.svg" alt="user icon"></button>
  		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
  	  	<a class="dropdown-item" href="./my_profile.html">Profile</a>
  	  	<a class="dropdown-item" href="./my_applications.html">My Applications</a>
  	  	<a class="dropdown-item" href="./my_listings.html">My Listings</a>
  	  	<a class="dropdown-item" href="./settings.html">Settings</a>
				<div class="dropdown-divider"></div>

			<form id="logout-link" action="php/logout.php" method="post" >
    		<input type="submit" class="dropdown-item" name="changeNavbar" value="Logout"/>
			</form>
  		</div>
			</div>
  		</div>
		</nav>';
}
?>
