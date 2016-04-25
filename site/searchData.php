<?php
$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "mark_move";
	$sql = ""; 
	try{
		$connection = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if(isset($_POST['nickname'])){
		$name = htmlentities($_POST['nickname']);
		$sql ="SELECT nickname FROM users WHERE nickname = '$name'";
		$stmt = $connection->prepare($sql);
		$stmt-> execute();
	
		if ($stmt-> rowCount() > 0) {
			$connection = null;
			echo "true";
			exit;
		}		
				}	
	}
	catch(PDOException $e){
		echo $e-> getMessage();
	}

	$connection = null;
	echo "false";
	?>