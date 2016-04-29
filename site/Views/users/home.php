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
				<div class="sidebar">
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

              	<div class="newsfeed">
			    	<div class="add-post">
				    	<div class="general">
				    		<div class="post-element user">
				    			<a href="#" class="profile-picture">
				    				<img class="profile-picture" align="left" src="<?php
									$filePath = $_SERVER['DOCUMENT_ROOT'].'/site/images/profile/'.$this->user->getNickname().'.jpg';
									if (file_exists($filePath)) {
									 	echo '../images/profile/'.$this->user->getNickname().'.jpg';
									}
									else
									{
									 	echo 'http://localhost/site/images/profile/default.jpg';
									} 
									?>"/>
				    			</a>
				    		</div>

				    		<div class="post-element content">
				    			<div class="input-group">
									<textarea placeholder="What do you want to say?"required></textarea>
								</div>	
				    		</div>
				    	</div>

				    	<div class="sufix">
				    		<div class="post-element icons">
				    			<a href="#">
				    				<i class="glyphicon glyphicon-picture"></i>
				    			</a>
				    			<a href="#">
				    				<i class="fa fa-map-marker"></i>
				    			</a>
				    		</div>

				    		<div class="post-element action">
				    			<input class="commit" name="commit" type="submit" value="Post"></input>
				    		</div>
				    	</div>	  
			    	</div> <!-- add-post  -->

			    	<div class="feed">
			    		<div class="post-element user">
			    			<a href="#" class="post-element">
			    				<img class="profile-picture" align="left" src="<?php
								$filePath = $_SERVER['DOCUMENT_ROOT'].'/site/images/profile/'.$this->user->getNickname().'.jpg';
								if (file_exists($filePath)) {
								 	echo '../images/profile/'.$this->user->getNickname().'.jpg';
								}
								else
								{
								 	echo 'http://localhost/site/images/profile/default.jpg';
								} 
								?>"/>
			    			</a>
			    			<a href="#" class="post-element profile-picture">
			    				<h4 class="name">Pesho Petrov</h4>
		    				</a>
		    				<p>from 12:37 17.11.1721 at <a href="#">Moscow, Russia</a><p>
			    		</div>

			    		<div class="photo-box">
			    			<a href="#">
			    				<img src="http://i.dailymail.co.uk/i/pix/2015/09/28/08/2CD1E26200000578-0-image-a-312_1443424459664.jpg">
			    			</a>
			    		</div>

			    		<div class="actions">
			    			<button class="post-element">
			    				<i class="fa fa-thumbs-o-up">Like</i>
			    			</button>

			    			<button class="post-element">
			    				<i class="fa fa-comments-o">Comment</i>
			    			</button>

			    			<button class="post-element">
			    				<i class="fa fa-share">Share</i>
			    			</button>
			    		</div>

			    		<div class="comments">
			    			<div>
			    				<a href="#" class="post-element profile-picture">
			    					<img class="profile-picture" src="http://img.wennermedia.com/social/justin-bieber-zoom-04b2591a-ffa1-4a8e-a4bf-50d03a59e826.jpg">
			    				</a>

			    				<div class="post-element content">
					    			<div class="input-group">
										<p>You know you love me, I know you care. Just shout whenever,and I'll be there. You are my love, you are my heart. And we will never, ever , ever be apart. Read more: Justin Bieber - Baby Lyrics | MetroLyrics </p>
									</div>	
					    		</div>
			    			</div>

			    			<div class="general">
					    		<div class="post-element user">
					    			<a href="#">
					    				<img class="profile-picture" align="left" src="<?php
										$filePath = $_SERVER['DOCUMENT_ROOT'].'/site/images/profile/'.$this->user->getNickname().'.jpg';
										if (file_exists($filePath)) {
										 	echo '../images/profile/'.$this->user->getNickname().'.jpg';
										}
										else
										{
										 	echo 'http://localhost/site/images/profile/default.jpg';
										} 
										?>"/>
					    			</a>
					    		</div>

					    		<div class="post-element content">
					    			<div class="input-group">
										<textarea placeholder="What do you want to say?"required></textarea>
									</div>	
					    		</div>
					    	</div>
			    		</div>
			    	</div>
		    	</div> <!-- newsfeed -->
			</div>
		</main>

		<footer>
			<?php require_once 'Views/footer.php';?>
		</footer>
	</div>
</body>
</html>