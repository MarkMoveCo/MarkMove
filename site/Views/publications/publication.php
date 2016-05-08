<?php
namespace site\Views\publications;
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$this->publication->getTitle();?></title>
</head>
<body>
	<div id="wrapper">
		<header>
			<?php require_once 'Views/header.php';?>
		</header>

		<main>
			<div class="container">
				<?=$this->publication->getBody();?>
			</div>
		</main>

		<footer>
		  <?php require_once 'Views/footer.php';?>
		</footer>
	</div>
</body>
</html>