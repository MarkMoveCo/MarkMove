<?php
namespace site\Views\publications;
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$this->publication->getTitle();?></title>
</head>
<body>
<?=$this->publication->getBody();?>
</body>
</html>