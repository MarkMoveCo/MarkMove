<?php
namespace site;
use site\Db;
use site\Repositories\UserRepository;
use site\View;
use site\Exceptions;

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
if (array_key_exists($controllerIndex, $requestUri)) 
{
	$controllerName = $requestUri[$controllerIndex];
	if (array_key_exists($actionIndex, $requestUri))
	{
		$actionName = $requestUri[$actionIndex];
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
	$controller->$actionName();
}
catch(UnauthorizedException $unauthorizedException){
echo "Access denied";
die;
}


$view->render();


?>