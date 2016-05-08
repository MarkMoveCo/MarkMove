<?php
namespace site\Views\publications;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Publications</title>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0">

	<title>MarkMove</title>
	<link href="images/logo.png" />
	<link rel="stylesheet" type="text/css" href="../style/reset.css">
	<link rel="stylesheet" type="text/css" href="../style/bootstrap-style.css">
	<link rel="stylesheet" type="text/css" href="../style/header-footer-style.css">
	<link rel="stylesheet" type="text/css" href="../style/default.css">
	<link rel="stylesheet" type="text/css" href="../style/manage-publications.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="wrapper">
		<header>
			<?php require_once 'Views/header.php';?>
		</header>

		<main>
			<div class="container">
				<a href="<?=$this->url('publications','create');?>"><button type="button">Create publication</button></a>
				<table border="1">
					<tr>
					<td>
						Publication
					</td>
					</tr>
					<?php foreach($this->publicationsCollection as $publication):?>
						<tr>
							<td>
							<a href="<?=$this->url('publications','publication',$params = ['id'=>$publication->getId()]);?>">
							<button type="button">						
							<?= $publication->getTitle();?>
							</button>
							</a>	
							</td>				
						</tr>
					<?php endforeach;?>
				</table>
			</div>
		</main>

		<footer>
			<?php require_once 'Views/footer.php';?>
		</footer>
	</div>

</body>
</html>