		<?php
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
						<form class="form-inline my-2 my-lg-0" action="./search.html">
		    		  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		    		  	<button id="search-button" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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
		</nav>

		<span id="toggle-nav-container">
			<a id="toggle-nav" href="#">Toggle NavBar Layout</a>
		</span>';
		?>
