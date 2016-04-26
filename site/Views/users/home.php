<?php 
namespace site\Views\users;?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0">

	<title>MarkMove</title>
	<link href="images/logo.png" />
	<link rel="stylesheet" type="text/css" href="../style/reset.css">
	<link rel="stylesheet" type="text/css" href="../style/bootstrap-style.css">
	<link rel="stylesheet" type="text/css" href="../style/header-footer-style.css">
	<link rel="stylesheet" type="text/css" href="../style/default.css">
	<link rel="stylesheet" type="text/css" href="../style/home.css">
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
              	<div class="list-group">
              	 	<a href="#" class="list-group-item">
			            <i class="fa fa-users"></i>
			        </a>
			        <a href="#" class="list-group-item">
			            <i class="fa fa-comment-o"></i>
			        </a>
			        <a href="#" class="list-group-item" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			            <?php if(!empty($this->user)): ?>
    				            <i class="fa fa-globe"></i>
    				            <?php if(count($this->user->getNotifications()) != 0):?>
								<span class="badge"><?= count($this->user->getNotifications());?></span>
								<ul class="dropdown-menu">
								<?php if($this->user->getNotifications() != null):?>
								<?php foreach($this->user->getNotifications() as $notification):?>
									<li><a href="#"><?= $notification->getNotification();?></a></li>
									<li role="separator" class="divider"></li>
								<?php endforeach;?>
							<?php endif;?>
								</ul>
							<?php endif;?>
							<?php endif;?>
			        </a>
			        <a href="#" class="list-group-item">
			            <i class="fa fa-bar-chart-o"></i>
			        </a>
			    </div>        
			</div>
		</main>

		<footer>
			<?php require_once 'Views/footer.php';?>
		</footer>
	</div>
</body>
</html>