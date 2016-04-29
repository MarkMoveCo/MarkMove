<?php
namespace site;
class View
{

private $controllerName;

private $actionName;

public function __construct($controllerName, $actionName){
	$this->controllerName = $controllerName;
	$this->actionName = $actionName;

}

	public function render(){
		require_once 'Views/'.$this->controllerName.'/'.$this->actionName.'.php';
	}

	public function url($controller = null, $action = null, $params = []){
		$requestUri = explode('/', $_SERVER['REQUEST_URI']);
		$url = "//" . $_SERVER['HTTP_HOST'] . "/";
		foreach ($requestUri as $key => $uri) {
			if ($uri == $this->controllerName || $uri ==$this->actionName) {
				break;
			}
			$url.="$uri";
		}
		if ($controller) {
			$url.="/$controller";
		}

		if ($action) {
			$url.="/$action";
		}

		foreach ($params as $key => $param) {
			$url.="/$key" . "/$param";
		}

		return $url;
	}
}
?>