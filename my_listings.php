<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>My Listings - ErgasSOS</title>

		<!-- My CSS files -->
		<link rel="stylesheet" type="text/css" href="css/main_style.css">
		<link rel="stylesheet" type="text/css" href="css/my_stuff.css">
	</head>

  <body>
	<div class="maincontainer">
		<div class="content">

		<!-- NAVIGATION BAR -->

		<?php
			require "php/navbar.php";
		?>

		<div>

			<?php
				include "php/listings_alerts.php";
			?>
    <!-- MAIN PAGE -->
    <div  class="tab-content" id="tabContent">

			<?php
				include 'php/show_listings.php';
			?>

    <!-- CLOSE LISTING MODAL -->
    <div class="modal" id="myModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Warning!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h6>You are about to delete this listing.</h6>
						<p>Applicants will be notified that the position has been filled.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<form action="php/delete_listing.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="listingID" id="listingID">
            	<button type="submit button" class="btn btn-danger" id="confirmbtn">Confirm</button>
						</form>
          </div>
        </div>
      </div>
    </div>

		<div class="modal" id="applicantsModal" tabindex="-1" role="dialog">
  		<div class="modal-dialog modal-lg" role="document">
    		<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title">People that have applied for this listing:</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      	<div class="modal-body">
        	<p id="applicants"></p>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      	</div>
    	</div>
  	</div>
	</div>

	</div>
</div>

			<!-- Footer -->
			<footer>
				<div style="float: left"><a class="footer-link" href="./contact.php">Contact Us</a> </div> <div style="position: absolute; right:30px"><a href="https://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tourhttps://www.facebook.com/Ergasos-107559361009649/?modal=admin_todo_tour" style="padding-left: 5px"><i class="fa fa-facebook-f" style="font-size:20px"></i></a> </div>
			</footer>
		</div>
		<!-- JavaScript Scripts -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/main_scripts.js"></script>
		<script type="text/javascript" src="js/my_stuff.js"></script>
  </body>
</html>
