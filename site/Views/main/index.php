<?php 
namespace site\Views\main;?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0">

	<title>MarkMove</title>
	<link href="images/logo.png" />
	<link rel="stylesheet" type="text/css" href="http://localhost/site/style/reset.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/site/style/bootstrap-style.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/site/style/header-footer-style.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/site/style/default.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/site/style/index.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<meta name="title" content="MarkMove" />
    <meta name="description" content="MarkMove - the tourists' site." />
    <meta name="Keywords" content="mark, move, tourist, site" />

</head>

<body>
	<div id="wrapper">
		<header>
			<?php require_once 'Views/header.php';?>
		</header>

		<main>
			<div class="container">
				<div class="story">
					<p>“Traveling – it leaves you speechless, then turns you into a storyteller.” – Ibn Battuta</p>
					<div class="message">
						<p>Tell your story to us</p>
						<a href="<?=$this->url(null,'register');?>">Sign up</a>
					</div>
				</div>
			</div>
		</main> 

		<footer>
			<?php require_once 'Views/footer.php';?>
		</footer>
	</div>
</body>
</html>