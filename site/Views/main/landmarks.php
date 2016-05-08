<?php
namespace site\Views\main;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Landmarks</title>
	<link href="images/logo.png" />
	<link rel="stylesheet" type="text/css" href="http://localhost/site/style/reset.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/site/style/bootstrap-style.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/site/style/header-footer-style.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/site/style/default.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/site/style/landmarks.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<script
	src="http://maps.googleapis.com/maps/api/js">
	</script>
	<script>
	function initialize() {
	  var mapProp = {
	    center:new google.maps.LatLng(42.775141,25.1925713),
	    zoom:6,
	    mapTypeId:google.maps.MapTypeId.TERRAIN
	  };
	  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
	}
	google.maps.event.addDomListener(window, 'load', initialize);
	</script>
</head>

<body>
	<div id="wrapper">
		<header>
			<?php require_once 'Views/header.php';?>
		</header>

		<main>
			<div class="container">
				<div class="left-side">
					<div class="category">
						<h3 class="category-name">Recent posted</h3>
						<div class="carousel slide" data-ride="carousel">
							<ul class="carousel-inner" role="listbox">
								<li class="landmark panel">
									<a href="#">
										<img class="landmark-photo" src="http://www.smeshni7.com/wp-content/uploads/2012/09/%D1%8F%D0%BA%D0%B8-%D0%BA%D0%B0%D1%80%D1%82%D0%B8%D0%BD%D0%BA%D0%B8-1.jpg">
										<h4 class="landmark-name">The best place</h4>
									</a>

									<p class="landmark-info">Do you want to try my reflex?</p>

									<div class="stars">
									  <form action="">
									    <input class="star star-5" id="star-5" type="radio" name="star"/>
									    <label class="star star-5" for="star-5"></label>
									    <input class="star star-4" id="star-4" type="radio" name="star"/>
									    <label class="star star-4" for="star-4"></label>
									    <input class="star star-3" id="star-3" type="radio" name="star"/>
									    <label class="star star-3" for="star-3"></label>
									    <input class="star star-2" id="star-2" type="radio" name="star"/>
									    <label class="star star-2" for="star-2"></label>
									    <input class="star star-1" id="star-1" type="radio" name="star"/>
									    <label class="star star-1" for="star-1"></label>
									  </form>
									</div>
								</li>

								<li class="landmark panel">
									<a href="#">
										<img class="landmark-photo" src="http://www.smeshni7.com/wp-content/uploads/2012/09/%D1%8F%D0%BA%D0%B8-%D0%BA%D0%B0%D1%80%D1%82%D0%B8%D0%BD%D0%BA%D0%B8-1.jpg">
										<h4 class="landmark-name">The best place</h4>
									</a>

									<p class="landmark-info">Do you want to try my reflex?</p>

									<div class="stars">
									  <form action="">
									    <input class="star star-5" id="star-5" type="radio" name="star"/>
									    <label class="star star-5" for="star-5"></label>
									    <input class="star star-4" id="star-4" type="radio" name="star"/>
									    <label class="star star-4" for="star-4"></label>
									    <input class="star star-3" id="star-3" type="radio" name="star"/>
									    <label class="star star-3" for="star-3"></label>
									    <input class="star star-2" id="star-2" type="radio" name="star"/>
									    <label class="star star-2" for="star-2"></label>
									    <input class="star star-1" id="star-1" type="radio" name="star"/>
									    <label class="star star-1" for="star-1"></label>
									  </form>
									</div>
								</li>

								<li class="landmark panel">
									<a href="#">
										<img class="landmark-photo" src="http://www.smeshni7.com/wp-content/uploads/2012/09/%D1%8F%D0%BA%D0%B8-%D0%BA%D0%B0%D1%80%D1%82%D0%B8%D0%BD%D0%BA%D0%B8-1.jpg">
										<h4 class="landmark-name">The best place</h4>
									</a>

									<p class="landmark-info">Do you want to try my reflex?</p>

									<div class="stars">
									  <form action="">
									    <input class="star star-5" id="star-5" type="radio" name="star"/>
									    <label class="star star-5" for="star-5"></label>
									    <input class="star star-4" id="star-4" type="radio" name="star"/>
									    <label class="star star-4" for="star-4"></label>
									    <input class="star star-3" id="star-3" type="radio" name="star"/>
									    <label class="star star-3" for="star-3"></label>
									    <input class="star star-2" id="star-2" type="radio" name="star"/>
									    <label class="star star-2" for="star-2"></label>
									    <input class="star star-1" id="star-1" type="radio" name="star"/>
									    <label class="star star-1" for="star-1"></label>
									  </form>
									</div>
								</li>
							</ul>

						    <!-- Left and right controls -->
						    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						      <span class="sr-only">Previous</span>
						    </a>
						    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						      <span class="sr-only">Next</span>
						    </a>
						</div>
					</div>

					<div class="category">
						<h3 class="category-name">Most popular</h3>
						<ul>
							<li class="landmark panel">
								<a href="#">
									<img class="landmark-photo" src="http://www.smeshni7.com/wp-content/uploads/2012/09/%D1%8F%D0%BA%D0%B8-%D0%BA%D0%B0%D1%80%D1%82%D0%B8%D0%BD%D0%BA%D0%B8-1.jpg">
									<h4 class="landmark-name">The best place</h4>
								</a>

								<p class="landmark-info">Do you want to try my reflex?</p>

								<div class="stars">
								  <form action="">
								    <input class="star star-5" id="star-5" type="radio" name="star"/>
								    <label class="star star-5" for="star-5"></label>
								    <input class="star star-4" id="star-4" type="radio" name="star"/>
								    <label class="star star-4" for="star-4"></label>
								    <input class="star star-3" id="star-3" type="radio" name="star"/>
								    <label class="star star-3" for="star-3"></label>
								    <input class="star star-2" id="star-2" type="radio" name="star"/>
								    <label class="star star-2" for="star-2"></label>
								    <input class="star star-1" id="star-1" type="radio" name="star"/>
								    <label class="star star-1" for="star-1"></label>
								  </form>
								</div>
							</li>

							<li class="landmark panel">
								<a href="#">
									<img class="landmark-photo" src="http://www.smeshni7.com/wp-content/uploads/2012/09/%D1%8F%D0%BA%D0%B8-%D0%BA%D0%B0%D1%80%D1%82%D0%B8%D0%BD%D0%BA%D0%B8-1.jpg">
									<h4 class="landmark-name">The best place</h4>
								</a>

								<p class="landmark-info">Do you want to try my reflex?</p>

								<div class="stars">
								  <form action="">
								    <input class="star star-5" id="star-5" type="radio" name="star"/>
								    <label class="star star-5" for="star-5"></label>
								    <input class="star star-4" id="star-4" type="radio" name="star"/>
								    <label class="star star-4" for="star-4"></label>
								    <input class="star star-3" id="star-3" type="radio" name="star"/>
								    <label class="star star-3" for="star-3"></label>
								    <input class="star star-2" id="star-2" type="radio" name="star"/>
								    <label class="star star-2" for="star-2"></label>
								    <input class="star star-1" id="star-1" type="radio" name="star"/>
								    <label class="star star-1" for="star-1"></label>
								  </form>
								</div>
							</li>

							<li class="landmark panel">
								<a href="#">
									<img class="landmark-photo" src="http://www.smeshni7.com/wp-content/uploads/2012/09/%D1%8F%D0%BA%D0%B8-%D0%BA%D0%B0%D1%80%D1%82%D0%B8%D0%BD%D0%BA%D0%B8-1.jpg">
									<h4 class="landmark-name">The best place</h4>
								</a>

								<p class="landmark-info">Do you want to try my reflex?</p>

								<div class="stars">
								  <form action="">
								    <input class="star star-5" id="star-5" type="radio" name="star"/>
								    <label class="star star-5" for="star-5"></label>
								    <input class="star star-4" id="star-4" type="radio" name="star"/>
								    <label class="star star-4" for="star-4"></label>
								    <input class="star star-3" id="star-3" type="radio" name="star"/>
								    <label class="star star-3" for="star-3"></label>
								    <input class="star star-2" id="star-2" type="radio" name="star"/>
								    <label class="star star-2" for="star-2"></label>
								    <input class="star star-1" id="star-1" type="radio" name="star"/>
								    <label class="star star-1" for="star-1"></label>
								  </form>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="right-side">
					<div class="map panel">
						<a class="map-text" href="#"><h3 class="category-name">Virtual Map</h3></a>

						<div id="googleMap"></div>
					</div>
				</div>
			</div> <!-- container -->

		</main>

		<footer>
			<?php require_once 'Views/footer.php';?>
		</footer>
	</div>
</body>
</html>
