<?php 
namespace site\Views\users;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link href="../images/logo.png"/>
	<link rel="stylesheet" type="text/css" href="../style/reset.css">
	<link rel="stylesheet" type="text/css" href="../style/bootstrap-style.css">
	<link rel="stylesheet" type="text/css" href="../style/header-footer-style.css">
	<link rel="stylesheet" type="text/css" href="../style/default.css">
	<link rel="stylesheet" type="text/css" href="../style/register-form.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="../scripts/validate-inputs.js"></script>
</head>
<body>
	<header>
	<?php 
	require_once 'Views/header.php';?>
	</header>

	<main>
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-body">
					<form action="register" method="post">	
						<div class="form-group">
							<h2>Create account</h2>
						</div>

						<div class="form-group">
							<label class="control-label">Nickname :</label>
							<div class="input-group">
								<input id="nickname-input" class="form-control" type="text" name="nickname" required></input>
								<div class="input-group-addon">
									<span id="ok-nickname-sign" class="glyphicon glyphicon-ok ok" aria-hidden="true"></span>
								</div>
							</div>							
							<div id="taken-nickname-alert" class="alert alert-danger error-message" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<label class="sr-only">Error:</label>
									There is already user with that nickname
							</div>
						</div>

						<div class="form-group">
							<label class="control-label">Email: </label>
							<div class="input-group">
								<input id="email-input" class="form-control" type="text" name="email" required></input>
								<div class="input-group-addon">
									<span id="ok-email-sign" class="glyphicon glyphicon-ok ok" aria-hidden="true"></span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label  class="control-label">Password :</label>
							<div class="input-group">
								<input id="password" class="form-control" type="password" name="password" placeholder="at least 6 characters" required>
									<div class="input-group-addon"><span id="ok-password-sign" class="glyphicon glyphicon-ok ok"></span>
									</div>
							</div>	
							<div id="invalid-password-alert" class="alert alert-danger error-message" role="alert">
								<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								<label class="sr-only">Error:</label>
								Passowrd should be at least 6 symbols long
							</div>	
						</div>

						<div class="form-group">
							<label class="control-label">Confirm Password :</label>
							<div class="input-group">
							<input id="confirm-password" class="form-control" type="password" name="password" required>
							<div class="input-group-addon"><span id="ok-confirm-password-sign" class="glyphicon glyphicon-ok ok"></span></div>
							</div>

							<div id="invalid-confirm-password-alert" class="alert alert-danger error-message" role="alert">
								<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								<label class="sr-only">Error:</label>
								Passwords do not match
							</div>	
						</div>

						<div class="form-group">
							<label class="control-label">Age :</label>
							<input id="age" class="form-control" type="text" name="age">
							<div id="invalid-age-alert" class="alert alert-danger error-message" role="alert">
								<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								<label class="sr-only">Error:</label>
								Age under 7 is not valid
							</div>	
						</div>

						<div class="form-group">
							<label class="control-label">Gender :</label>
							<input type="radio" name="gender" value="Male" required> Male
							<input type="radio" name="gender" value="Female" required> Female  
						</div>

						<div class="form-group">
							<button id="signupSubmit" type="submit" name="submit" class="btn btn-info btn-block">Create your account</button>				
						</div>

						<p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.
						</p>
					</form>
				</div>
			</div>
		</div>
	</main>
</body>
</html>