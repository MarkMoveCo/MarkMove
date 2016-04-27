<!DOCTYPE html>
<html>
<head>
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
