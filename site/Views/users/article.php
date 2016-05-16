<?php 
namespace site\Views\users;?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0">

	<title>Article</title>
	<link href="images/logo.png" />
	<link rel="stylesheet" type="text/css" href="../style/reset.css">
	<link rel="stylesheet" type="text/css" href="../style/bootstrap-style.css">
	<link rel="stylesheet" type="text/css" href="../style/header-footer-style.css">
	<link rel="stylesheet" type="text/css" href="../style/default.css">
	<link rel="stylesheet" type="text/css" href="../style/index-logged-in.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
	<div id="wrapper">
		<header>
			<?php require_once 'Views\header.php';?>
		</header>

		<main>
			<div class="container">
				<div class="post-editor">
					<div class="content">
						
					</div>
					<div class="sidebar">
						<div class="data-react">
							<ul class="side-menu">
								<li>
									<i class="fa fa-cog"> New draft</i>
									<button class="previe-button">Preview</button>
									<button class="publish-button">Publish <i id="postpone" class="fa fa-calendar"></i></button>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa  fa-hashtag"></i>Categories and Tags</a>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-image"></i>Featured Images</a>
								<li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa  fa-share-alt"></i>Sharing</a>
								<li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa  fa-wrench"></i>More options</a>
								<li>
							</ul>

						</div>
					</div>
				</div>
			</div>
		</main>

		<footer>
			<?php require_once 'Views\footer.php';?>
		</footer>
	</div>
</body>