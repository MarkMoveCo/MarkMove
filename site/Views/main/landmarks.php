<?php
namespace site\Views\main;
?>
<!DOCTYPE html>
<html>
<head>
	<link href="images/logo.png" />
	<link rel="stylesheet" type="text/css" href="http://localhost/site/style/reset.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/site/style/bootstrap-style.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/site/style/header-footer-style.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/site/style/default.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/site/style/index.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  	<title>Landmarks</title>
<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:8,
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
			<div id="googleMap" style="width:500px;height:380px;"></div>
		</main>

		<footer>
			<?php require_once 'Views/footer.php';?>
		</footer>
	</div>
</body>
</html>
