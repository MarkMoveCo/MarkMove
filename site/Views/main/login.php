<?php 
namespace site\Views\main;?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0">

	<title>Log in</title>
	<link href="images/logo.png" />
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/bootstrap-style.css">
	<link rel="stylesheet" type="text/css" href="style/header-footer-style.css">
	<link rel="stylesheet" type="text/css" href="style/default.css">
	<link rel="stylesheet" type="text/css" href="style/login-form.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
			<?php require_once 'Views/header.php';?>
	</header>

	<main>
		<div class="wrapper">		
			<div class="login">
				<h3>Login</h3>
				<div class="social-buttons">
					<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
					<a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
				</div>
				<form class="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
					<div class="form-group">
						<label class="sr-only" for="exampleInputEmail2">Email address</label>
						<input type="text" name="nickname" class="form-control" id="exampleInputEmail2" placeholder="Email address or nickname" required>
					</div>
					<div class="form-group">
						<label class="sr-only" for="exampleInputPassword2">Password</label>
						<input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
	                    <div class="help-block text-right"><a href="#">Forget the password?</a></div>
					</div>
					<div class="form-group">
						<button type="submit" name="login_button" class="btn btn-primary btn-block">Sign in</button>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox">Keep me logged-in
						</label>
					</div>
				</form>	
			</div>
		</div>	
	</main>

	<footer>
		<?php require_once 'Views/footer.php';?>
	</footer>
</body>
</html>