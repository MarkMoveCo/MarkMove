<?php
namespace site\Views\users;?>
<!DOCTYPE html>
<html>
<head>
	<title>Permissions</title>
	<link rel="stylesheet" type="text/css" href="../style/reset.css">
	<link rel="stylesheet" type="text/css" href="../style/bootstrap-style.css">
	<link rel="stylesheet" type="text/css" href="../style/header-footer-style.css">
	<link rel="stylesheet" type="text/css" href="../style/default.css">
	<link rel="stylesheet" type="text/css" href="../style/profile.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../scripts/edit-permissions.js"></script>
  	
</head>
<body>
	<div id="wrapper">
		<header>
		<?php 
			require_once 'Views/header.php';?>
		</header>

		<main>
			<div class="container">
				<table border="1">
					<tr>
					<td>Nickname</td>
					<td>Role</td>
					</tr>
					  <?php foreach($this->usersCollection as $sameRoleUsers): ?>
					  	<?php if($sameRoleUsers != null):?>
					  	<?php foreach($sameRoleUsers as $user):?>
					  <tr>
					    <td><?= $user->getUserNickname();?></td>
					    <td>
					    <select name="<?= $user->getId();?>">
					    	<?php foreach($this->rolesCollection as $role):?>
					    		<option 
					    		<?php if($user->getRole() == $role):?>
					    			selected
					    		<?php endif;?>
					    		><?=$role;?></option>
					    	<?php endforeach;?>
		    			</td>
					  </tr>
					<?php endforeach;?>
				<?php endif;?>
					  <?php endforeach;?>
				</table>
				<input type="submit" name="change_roles" value ="Save" onclick="saveChanges()"></input>
				</div>
		</main>

		<footer>
			<?php 
			require_once 'Views/footer.php';?>
		</footer>
    </div>
</body>
</html>