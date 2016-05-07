<!DOCTYPE html>
<html>
<head>
	<title>Change Profile Picture</title>

	<link rel="stylesheet" type="text/css" href="../style/reset.css">
	<link rel="stylesheet" type="text/css" href="../style/bootstrap-style.css">
	<link rel="stylesheet" type="text/css" href="../style/header-footer-style.css">
	<link rel="stylesheet" type="text/css" href="../style/default.css">
	<link rel="stylesheet" type="text/css" href="../style/change-picture.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<?php require_once 'Views/header.php';?>
	</header>

	<div class="container">
		<div class="change-profile panel">
			<header>
				<h2>Change profile picture</h2>
			</header>

			<table class="upload-picture">
				<th>
					<tr>
						<button type="button" class="btn btn-default btn-lg">
		  					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Upload Picture
						</button>
					</tr>
					<tr>
						<button type="button" class="btn btn-default btn-lg">
		  					<span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Take a Picture
						</button>
					</tr>
				</th>
			</table>

			<div class="my-pictures">
				<h3>My Pictures</h3>
				<table>
					<tbody>
						<tr>
							<td>
								<a href="#" rel="makeprofile">
									<div class="scaled-image">
										<img class="image" src="#" alt="I am handsome"></img>
									</div>
								</a>
							</td>
							<td>
								<a href="#" rel="makeprofile">
									<div class="scaled-image">
										<img class="image" src="#" alt="I am handsome"></img>
									</div>
								</a>
							</td>
							<td>
								<a href="#" rel="makeprofile">
									<div class="scaled-image">
										<img class="image" src="#" alt="I am handsome"></img>
									</div>
								</a>
							</td>
							<td>
								<a href="#" rel="makeprofile">
									<div class="scaled-image">
										<img class="image" src="#" alt="I am handsome"></img>
									</div>
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<footer>
		<?php require_once 'Views/footer.php';?>
	</footer>
</body>
</html>