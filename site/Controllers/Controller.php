<?php
namespace site\Controllers;
use site\View;

class Controller{

	protected $view;

	protected $controllerName;

	public function __construct(View $view, $controllerName){
		$this->view = $view;
		$this->controllerName = $controllerName;
	}

	public function redirect($controller = null, $action = null, $params = []){
		$requestUri = explode('/', $_SERVER['REQUEST_URI']);
		$url = "//" . $_SERVER['HTTP_HOST'] . "/";
		foreach ($requestUri as $key => $uri) {
			if ($uri == $this->controllerName) {
				break;
			}
			$url.="$uri";
			if ($uri == "site") {
				break;
			}
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

		header("Location:" . $url);
		exit;
	}
}
?>