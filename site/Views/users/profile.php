<?php 
namespace site\Views\users;?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?= $this->user->getNickname();?></title>
	<link rel="stylesheet" type="text/css" href="../style/reset.css">
	<link rel="stylesheet" type="text/css" href="../style/bootstrap-style.css">
	<link rel="stylesheet" type="text/css" href="../style/header-footer-style.css">
	<link rel="stylesheet" type="text/css" href="../style/default.css">
	<link rel="stylesheet" type="text/css" href="../style/profile.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
	<div id="wrapper">
		<header>
		<?php 
			require_once 'Views/header.php';?>
		</header>

		<main>
			<div class="container">
				<div class="fb-profile">
					<a href="#" class="profile-picture">
						<img align="left" class="fb-image-lg" src="http://localhost/site/images/wallpaper.jpg" alt="Profile image example"/>
					</a>
	 				<a href="#" class="profile-picture">
	 					<img align="left" class="fb-image-profile thumbnail" src="<?php
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

<!-- 							<form action="" method="post" enctype="multipart/form-data">
    							Select image to upload:
   								<input type="file" name="fileToUpload" id="fileToUpload">
								<input type="submit" value="Upload Image" name="upload_profile_picture">
							</form> -->

					<div class="profile-menu">
						<ul>
							<li><a href="#">Photos</a></li>
							<li><a href="#">Videos</a></li>
							<li><a href="#">Activities</a></li>
							<li><a href="#">Groups</a></li>
							<li><a href="#">Events</a></li>
							<li><a href="#">Friends</a></li>
						</ul>
						<div class="change-picture">
							<a href="<?=$this->url('users','profile_change_picture');?>" role="button">
								<i class="fa fa-edit"></i>
								<span id="change-text">Change picture</span>
							</a>
						</div>
					</div>
				</div> 
			    
			    <div class="content">
			    	<div class="sidebar">
			    		<div class="profile">
							<div class="profile-name">
								<?= $this->user->getNickname();?>
							</div>
							<div>
								<table class="profile-info">
									<tr>
										<td><i class="fa fa-pencil-square"></i></td>
										<td>Write something about you...</td>
									</tr>
									<tr>
									</tr>
									<tr>
										<td><i class="fa fa-home"></i></td>
										<td>Born from a boom-box</td>
									</tr>
								</table>
							</div>
						</div>
			    	</div>

	              	<div class="newsfeed">
				    	<div class="add-post panel">
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
					    		<div class="post-element">
									<textarea class="post-content" placeholder="What do you want to say?"required></textarea>
					    		</div>
					    	</div>
				    		
					    	<div class="sufix">
					    		<div class="post-element icons">
					    			<a href="#">
					    				<i class="fa fa-image">Add picture</i>
					    			</a>
					    			<a href="#">
					    				<i class="fa fa-map-marker">Add Location</i>
					    			</a>
					    		</div>
					    		<div class="post-element action">
					    			<input class="commit btn" name="commit" type="submit" value="Post"></input>
					    		</div>
					    	</div>	  
				    	</div> <!-- add-post  -->
			    	</div> <!-- newsfeed -->
			    </div>
			</div> <!-- /container -->
		</main>

		<footer>
			<?php 
			require_once 'Views/footer.php';?>
		</footer>
    </div>
</body>
</html>