<?php
namespace site;
use site\Db;

spl_autoload_register(function($className){
	$classPathSplitted = explode('\\', $className);
	$vendor = $classPathSplitted[0];
	$classPath = str_replace($vendor."\\", "", $className);
	$classPath = str_replace("\\", "/", $classPath);
	$classPath = str_replace("//", "/", $classPath);
	echo $classPath;
	require_once $classPath . '.php';
	//require_once 'Db.php';
});

var_dump(file_exists('Db.php'));

ini_set('display_errors', 1);
$configName = getenv('CONFIG_NAME');
/**
* @var site\Configs\DbConfig $dbConfigClass
**/
$dbConfigClass = '\\site\\Configs\\' . $configName . '\\DbConfig';
Db::setInstance(
	$dbConfigClass::HOST,
	$dbConfigClass::USER,
	$dbConfigClass::PASSWORD,
	$dbConfigClass::DBNAME);
	$sql = ""; 
	try{
		$connection = Db::getInstance();
		$name = htmlentities($_POST['nickname']);
		$age = htmlentities($_POST['age']);
		$userPassword = md5(htmlentities($_POST['password']));
		$gender = $_POST['gender'];
		$role = "Admin";
		$sql ="INSERT INTO users(nickname, password, age, gender) VALUES(?, ?, ?, ?)";
		$connection->query($sql, [$name, $userPassword, $age, $gender]);			
	}
	catch(PDOException $e){
		echo $sql."<br>".$e->getMessage();
		exit;
	}finally{
		$connection = null;
	}

	

?>