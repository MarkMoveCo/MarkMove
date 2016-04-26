<?php
namespace site\Controllers;
use site\View;
use site\Repositories\UserRepository;
use site\Exceptions\UserNotFoundException;

class Controller
{

	protected $view;

	protected $controllerName;

	public function __construct(View $view, $controllerName){
		$this->view = $view;
		$this->controllerName = $controllerName;
	}

	public function getUser($id)
	{
		$user = UserRepository::create()->getOneById($id);
		if (!$user) 
		{
			if ($id == -1)
			{
				$user = $user = User::partialInitialise("Todor","1234","todor@email.bg","20","Male");
				$user->setRole(new Role("Admin",$id));
				return $user;
			}
			else
			{
				throw new UserNotFoundException();
			}
		}
		else
		{
			return $user;
		}
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