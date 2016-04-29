<?php
namespace site;
use site\Db;
use site\Repositories\UserRepository;
use site\View;
use site\Exceptions\UnauthorizedException;
use site\Repositories\FriendshipRepository;

spl_autoload_register(function($className){
	$classPathSplitted = explode('\\', $className);
	$vendor = $classPathSplitted[0];
	$classPath = str_replace($vendor."\\", "", $className);
	$classPath = str_replace("\\", "/", $classPath);
	$classPath = str_replace("//", "/", $classPath);
	require_once $classPath . '.php';
});

ini_set('display_errors', 1);
session_start();
$configName = getenv('CONFIG_NAME');
/**
* @var site\Configs\DbConfig $dbConfigClass
**/
$dbConfigClass = '\\site\\Configs\\' . $configName . '\\DbConfig';
Db::setInstance(
	$dbConfigClass::HOST,
	$dbConfigClass::USER,
	$dbConfigClass::PASSWORD,
	$dbConfigClass::DBNAME
	);

$scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
$requestUri = preg_split('@/@', $_SERVER['REQUEST_URI'], NULL, PREG_SPLIT_NO_EMPTY);
$costumUri = [];
$controllerIndex = 0;
foreach ($scriptName as $key => $value) {
	if($value == 'index.php'){
		$controllerIndex = $key-1;
	}
}
$actionIndex = $controllerIndex + 1;
$paramsStartIndex = $actionIndex + 1;
$params = [];
if (array_key_exists($controllerIndex, $requestUri)) 
{
	$controllerName = $requestUri[$controllerIndex];
	if (array_key_exists($actionIndex, $requestUri))
	{
		$actionName = $requestUri[$actionIndex];
		while (array_key_exists($paramsStartIndex, $requestUri)) {
			$params [] = $requestUri[$paramsStartIndex];
			$paramsStartIndex++;
		}
	}
	else
	{
		$actionName = $controllerName;
		$controllerName = "main";
	}

}
else
{
	$controllerName = "main";
	$actionName = "index";
}
$view = new View($controllerName, $actionName);
$controllerClassName = '\\site\\Controllers\\'.ucfirst($controllerName).'Controller';
$controller = new $controllerClassName($view, $controllerName);
try{
	if (count($params) == 0) {
		$controller->$actionName();
	}
	else{
		$controller->$actionName($params);
	}

}
catch(UnauthorizedException $unauthorizedException){
echo "Access denied";
die;
}


$view->render();


?>